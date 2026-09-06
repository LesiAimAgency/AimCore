<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Project;
use App\Services\CouponService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect(locale_route('cart.page'))->with('error', Lang('cart_empty_title', [], 'vi') == 'cart_empty_title' ? 'Giỏ hàng của bạn đang trống.' : Lang('cart_empty_title'));
        }

        // Lấy tồn kho thực tế cho từng sản phẩm trong giỏ hàng
        foreach ($cart as $key => $item) {
            if (! empty($item['variant_id'])) {
                $variant = ProductVariant::find($item['variant_id']);
                $cart[$key]['current_stock'] = $variant ? $variant->stock : 0;
            } else {
                $product = Product::find($item['id']);
                $cart[$key]['current_stock'] = $product ? $product->stock : 0;
            }
        }

        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        // Tính tổng tiền các sản phẩm ĐƯỢC PHÉP giảm giá (không phải combo)
        $discountableSubtotal = collect($cart)
            ->filter(fn ($i) => empty($i['is_combo']))
            ->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        $appliedCoupons = session('applied_coupons', []);
        $couponList = [];
        $totalDiscount = 0;

        foreach ($appliedCoupons as $couponId) {
            $coupon = Coupon::find($couponId);
            // Validate coupon dựa trên discountableSubtotal, không phải subtotal
            if ($coupon && $coupon->isValid($discountableSubtotal)) {
                $discount = $coupon->calculateDiscount($discountableSubtotal);
                $totalDiscount += $discount;
                $couponList[] = [
                    'code' => $coupon->code,
                    'discount' => $discount,
                ];
            }
        }

        $total = max(0, $subtotal - $totalDiscount);

        // Lấy TẤT CẢ voucher active (kể cả hết hạn hoặc chưa đủ điều kiện)
        // để hiển thị trong modal với trạng thái rõ ràng
        $availableCoupons = Coupon::where('is_active', true)
            ->orderBy('min_order_value', 'asc')
            ->get();

        return view('shop.checkout', compact('cart', 'subtotal', 'totalDiscount', 'total', 'couponList', 'availableCoupons'));
    }

    public function store(Request $request)
    {
        // VALIDATION ĐẦY ĐỦ VÀ CHẶT CHẼ
        $validated = $request->validate([
            'first_name' => 'required|string|max:100|regex:/^[\p{L}\s]+$/u',
            'last_name' => 'required|string|max:100|regex:/^[\p{L}\s]+$/u',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'required|string|regex:/^[0-9]{10,11}$/|max:20',
            'street_address' => 'required|string|max:500',
            'province_code' => 'required|string|max:10',
            'ward_code' => 'required|string|max:10',
            'province_name' => 'required|string|max:100',
            'district_name' => 'required|string|max:100',
            'ward_name' => 'required|string|max:100',
            'payment_method' => 'required|string|in:cod,bank_transfer,momo,vnpay',
            'notes' => 'nullable|string|max:1000',
        ], [
            'first_name.required' => 'Vui lòng nhập họ',
            'first_name.regex' => 'Họ chỉ được chứa chữ cái và khoảng trắng',
            'last_name.required' => 'Vui lòng nhập tên',
            'last_name.regex' => 'Tên chỉ được chứa chữ cái và khoảng trắng',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại phải có 10-11 chữ số',
            'street_address.required' => 'Vui lòng nhập địa chỉ chi tiết',
            'province_name.required' => 'Vui lòng chọn Tỉnh/Thành phố',
            'district_name.required' => 'Vui lòng chọn Quận/Huyện',
            'ward_name.required' => 'Vui lòng chọn Phường/Xã',
            'payment_method.required' => 'Vui lòng chọn phương thức thanh toán',
            'payment_method.in' => 'Phương thức thanh toán không hợp lệ',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect(locale_route('cart.page'))->with('error', Lang('cart_empty_title', [], 'vi') == 'cart_empty_title' ? 'Giỏ hàng của bạn đang trống.' : Lang('cart_empty_title'));
        }

        // SANITIZE INPUT
        $validated['first_name'] = strip_tags(trim($validated['first_name']));
        $validated['last_name'] = strip_tags(trim($validated['last_name']));
        $validated['email'] = filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL);
        $validated['phone'] = preg_replace('/[^0-9]/', '', $validated['phone']);
        $validated['street_address'] = strip_tags(trim($validated['street_address']));
        $validated['notes'] = strip_tags(trim($validated['notes'] ?? ''));

        // ATOMIC TRANSACTION - Đảm bảo không oversell
        return \DB::transaction(function () use ($validated, $cart) {
            $fullName = trim($validated['first_name'].' '.$validated['last_name']);
            $total = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

            // LOCK STOCK VÀ KIỂM TRA ATOMIC
            foreach ($cart as $item) {
                if (! empty($item['variant_id'])) {
                    $variant = ProductVariant::lockForUpdate()->find($item['variant_id']);
                    if (! $variant || $variant->stock < $item['qty']) {
                        throw new \Exception("Sản phẩm '{$item['name']}' ({$item['variant_label']}) đã hết hàng hoặc không đủ số lượng.");
                    }
                    // TRỪ STOCK NGAY LẬP TỨC
                    $variant->decrement('stock_quantity', $item['qty']);
                } else {
                    $product = Product::lockForUpdate()->find($item['id']);
                    if (! $product) {
                        throw new \Exception("Sản phẩm '{$item['name']}' không tồn tại.");
                    }
                    if ($product->manage_stock && $product->stock < $item['qty']) {
                        throw new \Exception("Sản phẩm '{$item['name']}' đã hết hàng hoặc không đủ số lượng.");
                    }
                    // TRỪ STOCK NGAY LẬP TỨC
                    if ($product->manage_stock) {
                        $product->decrement('stock_quantity', $item['qty']);
                    }
                }
            }

            $orderNumber = Order::generateOrderNumber();

            // Cấu hình phí vận chuyển từ hệ thống
            $threshold = (float) setting('free_shipping_threshold', 500000);
            $defaultFee = (float) setting('default_shipping_fee', 30000);
            $shippingFee = $total >= $threshold ? 0 : $defaultFee;

            $fullAddress = implode(', ', array_filter([
                $validated['street_address'],
                $validated['ward_name'],
                $validated['district_name'],
                $validated['province_name'],
            ]));

            $user = auth()->user();
            if ($user) {
                // Update basic profile if empty
                $user->update([
                    'phone' => $user->phone ?: $validated['phone'],
                    'email' => $user->email ?: $validated['email'],
                ]);

                // Save this address as a UserAddress if it doesn't exist
                $exists = $user->addresses()->where('province_code', $validated['province_code'])
                    ->where('ward_code', $validated['ward_code'])
                    ->where('address_detail', $validated['street_address'])
                    ->exists();
                if (! $exists) {
                    $user->addresses()->create([
                        'receiver_name' => $fullName,
                        'receiver_phone' => $validated['phone'],
                        'province_code' => $validated['province_code'],
                        'ward_code' => $validated['ward_code'],
                        'province_name' => $validated['province_name'],
                        'district_name' => $validated['district_name'],
                        'ward_name' => $validated['ward_name'],
                        'address_detail' => $validated['street_address'],
                        'full_address' => $fullAddress,
                        'is_default' => $user->addresses()->count() === 0,
                    ]);
                }
            }

            // XỬ LÝ COUPON ATOMIC
            $totalDiscount = 0;
            $appliedCouponCodes = [];
            $appliedCoupons = session('applied_coupons', []);

            $discountableSubtotal = collect($cart)
                ->filter(fn ($i) => empty($i['is_combo']))
                ->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

            if (! empty($appliedCoupons)) {
                $couponService = app(CouponService::class);
                try {
                    $couponResult = $couponService->applyMultipleCoupons($appliedCoupons, $discountableSubtotal);
                    $totalDiscount = $couponResult['total_discount'];
                    $appliedCouponCodes = $couponResult['applied_codes'];
                } catch (\Exception $e) {
                    throw new \Exception('Lỗi áp dụng mã giảm giá: '.$e->getMessage());
                }
            }

            $project = request()->attributes->get('project')
                ?? (function_exists('current_project') ? current_project() : null)
                ?? (session('current_project_id') ? Project::find(session('current_project_id')) : null);
            $projectId = $project ? $project->id : (session('current_project_id') ?: 10);
            $tenantId = session('current_tenant_id')
                ?? ($project?->tenant_id ?? null)
                ?? (function_exists('current_tenant') ? current_tenant()?->id : null)
                ?? 1;

            $order = Order::create([
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'order_number' => $orderNumber,
                'user_id' => $user?->id,
                'customer_name' => $fullName,
                'customer_email' => $validated['email'],
                'customer_phone' => $validated['phone'],
                'billing_address' => [
                    'full_address' => $fullAddress,
                    'street' => $validated['street_address'],
                    'ward' => $validated['ward_name'],
                    'district' => $validated['district_name'],
                    'province' => $validated['province_name'],
                ],
                'shipping_address' => [
                    'full_address' => $fullAddress,
                    'street' => $validated['street_address'],
                    'ward' => $validated['ward_name'],
                    'district' => $validated['district_name'],
                    'province' => $validated['province_name'],
                ],
                'subtotal' => $total,
                'discount_amount' => $totalDiscount,
                'shipping_amount' => $shippingFee,
                'total_amount' => max(0, $total - $totalDiscount + $shippingFee),
                'discount' => $totalDiscount,
                'shipping_fee' => $shippingFee,
                'total' => max(0, $total - $totalDiscount + $shippingFee),
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => $validated['payment_method'],
                'customer_notes' => $validated['notes'],
                'customer_note' => $validated['notes'],
                'internal_notes' => ! empty($appliedCouponCodes) ? 'Voucher: '.implode(', ', $appliedCouponCodes) : null,
                'coupon_code' => implode(', ', $appliedCouponCodes),
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_variation_id' => $item['variant_id'] ?? null,
                    'product_name' => $item['name'],
                    'product_sku' => $item['sku'] ?? ('SKU-'.$item['id']),
                    'product_attributes' => ! empty($item['variant_label']) ? ['variant' => $item['variant_label']] : null,
                    'unit_price' => $item['price'],
                    'quantity' => $item['qty'],
                    'total_price' => $item['price'] * $item['qty'],
                    'price' => $item['price'],
                    'total' => $item['price'] * $item['qty'],
                    'sku' => $item['sku'] ?? ('SKU-'.$item['id']),
                    'variant_id' => $item['variant_id'] ?? null,
                ]);
            }

            session()->forget(['cart', 'applied_coupons']);

            // Gửi Email thông báo NGAY LẬP TỨC tại đây để đảm bảo không bị bỏ sót
            try {
                Log::info("CLIENT CHECKOUT: Triggering mail for #{$orderNumber} to raw email: ".$validated['email']);
                $order->sendOrderPlacedNotifications();
            } catch (\Exception $e) {
                Log::error('Direct Mail Send Error for #'.$orderNumber.': '.$e->getMessage());
            }

            return redirect(locale_route('checkout.success', ['orderNumber' => $orderNumber]));
        });
    }

    public function success($projectCode, $orderNumber = null)
    {
        if ($orderNumber === null) {
            $orderNumber = $projectCode;
        }

        $order = Order::withoutGlobalScope('tenant')->where('order_number', $orderNumber)->firstOrFail();

        return view('shop.success', compact('order'));
    }

    public function trackOrder(Request $request)
    {
        $order = null;
        $orderNumber = $request->get('order_id');
        $email = $request->get('email');

        if ($orderNumber && $email) {
            // VALIDATE INPUT
            $request->validate([
                'order_id' => 'required|string|max:50|regex:/^[A-Z0-9\-]+$/',
                'email' => 'required|email|max:255',
            ]);

            // SANITIZE
            $orderNumber = strip_tags(trim($orderNumber));
            $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);

            // SỬ DỤNG ELOQUENT (KHÔNG CÓ SQL INJECTION)
            $order = Order::withoutGlobalScope('tenant')
                ->where('order_number', $orderNumber)
                ->where('customer_email', $email)
                ->with(['items'])
                ->first();

            if (! $order) {
                return view('pages.order-track')->with('error', 'Không tìm thấy đơn hàng với thông tin đã cung cấp. Vui lòng kiểm tra lại Mã đơn hàng và Email.');
            }
        }

        return view('pages.order-track', compact('order'));
    }

    public function trackOrderPost(Request $request)
    {
        // VALIDATION CHẶT CHẼ
        $validated = $request->validate([
            'order_number' => 'required|string|max:50|regex:/^[A-Z0-9\-]+$/',
            'email' => 'required|email:rfc,dns|max:255',
        ], [
            'order_number.required' => 'Vui lòng nhập mã đơn hàng',
            'order_number.regex' => 'Mã đơn hàng không hợp lệ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
        ]);

        // SANITIZE INPUT
        $orderNumber = strip_tags(trim($validated['order_number']));
        $email = filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL);

        // SỬ DỤNG ELOQUENT (AN TOÀN, KHÔNG CÓ SQL INJECTION)
        $order = Order::withoutGlobalScope('tenant')
            ->where('order_number', $orderNumber)
            ->where('customer_email', $email)
            ->with(['items'])
            ->first();

        if (! $order) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy đơn hàng với thông tin đã cung cấp. Vui lòng kiểm tra lại Mã đơn hàng và Email.'], 404);
            }

            return back()->with('error', 'Không tìm thấy đơn hàng với thông tin đã cung cấp. Vui lòng kiểm tra lại Mã đơn hàng và Email.');
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Tìm thấy đơn hàng!',
                'redirect' => locale_route('order.track', ['order_id' => $order->order_number, 'email' => $order->customer_email]),
            ]);
        }

        return view('pages.order-track', compact('order'));
    }
}
