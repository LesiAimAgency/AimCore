<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkOrder;
use App\Models\Wkcomputer\WkOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.page')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));
        $totalDiscount = 0;
        $total = max(0, $subtotal - $totalDiscount);
        $couponList = [];
        $availableCoupons = collect();

        return view('shop.checkout', compact(
            'cart',
            'subtotal',
            'totalDiscount',
            'total',
            'couponList',
            'availableCoupons'
        ));
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.page')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'street_address' => 'required|string|max:255',
            'province_name' => 'nullable|string|max:100',
            'district_name' => 'nullable|string|max:100',
            'ward_name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:150',
            'notes' => 'nullable|string|max:500',
            'payment_method' => 'nullable|string|max:50',
        ]);

        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));
        $shippingFee = 0;
        $total = $subtotal + $shippingFee;

        $fullName = trim($validated['first_name'].' '.$validated['last_name']);
        $fullAddress = implode(', ', array_filter([
            $validated['street_address'],
            $validated['ward_name'] ?? null,
            $validated['district_name'] ?? null,
            $validated['province_name'] ?? null,
        ]));

        $orderNumber = 'WKC-'.strtoupper(Str::random(8));

        $addressData = [
            'full_address' => $fullAddress,
            'street' => $validated['street_address'],
            'ward' => $validated['ward_name'] ?? null,
            'district' => $validated['district_name'] ?? null,
            'province' => $validated['province_name'] ?? null,
        ];

        $projectId = session('current_project_id')
            ?? (function_exists('current_project') && current_project() ? current_project()->id : 14);

        return DB::transaction(function () use ($validated, $fullName, $addressData, $subtotal, $shippingFee, $total, $orderNumber, $cart, $projectId, $request) {
            $order = WkOrder::create([
                'order_number' => $orderNumber,
                'status' => 'pending',
                'subtotal' => $subtotal,
                'shipping_amount' => $shippingFee,
                'discount_amount' => 0,
                'total_amount' => $total,
                'currency' => 'VND',
                'customer_name' => $fullName,
                'customer_email' => $validated['email'] ?? 'customer@wkcomputer.vn',
                'customer_phone' => $validated['phone'],
                'billing_address' => $addressData,
                'shipping_address' => $addressData,
                'payment_method' => $validated['payment_method'] ?? 'cod',
                'payment_status' => 'pending',
                'customer_notes' => $validated['notes'] ?? null,
                'user_id' => auth()->id(),
                'project_id' => $projectId,
            ]);

            foreach ($cart as $item) {
                $productId = $item['id'] ?? null;
                WkOrderItem::create([
                    'order_id' => $order->id,
                    'project_id' => $projectId,
                    'product_id' => $productId,
                    'product_name' => $item['name'] ?? 'Sản phẩm',
                    'product_sku' => ! empty($item['sku']) ? $item['sku'] : ('PROD-'.($productId ?? '0')),
                    'unit_price' => $item['price'] ?? 0,
                    'quantity' => $item['qty'] ?? 1,
                    'total_price' => ($item['price'] ?? 0) * ($item['qty'] ?? 1),
                ]);
            }

            // Clear cart
            session()->forget('cart');
            session()->forget('applied_coupons');

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'order_number' => $orderNumber,
                    'redirect' => route('checkout.success', ['orderNumber' => $orderNumber]),
                ]);
            }

            return redirect()->route('checkout.success', ['orderNumber' => $orderNumber]);
        });
    }

    public function success($orderNumber)
    {
        $order = WkOrder::where('order_number', $orderNumber)->firstOrFail();

        return view('shop.success', compact('order'));
    }

    public function trackOrder(Request $request)
    {
        $order = null;
        $orderNumber = $request->query('order_id');
        $email = $request->query('email');

        if ($orderNumber && $email) {
            $order = WkOrder::where('order_number', $orderNumber)
                ->where('customer_email', $email)
                ->with('items')
                ->first();
        }

        return view('pages.order-track', compact('order'));
    }

    public function trackOrderPost(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        $order = WkOrder::where('order_number', trim($validated['order_number']))
            ->where('customer_email', trim($validated['email']))
            ->with('items')
            ->first();

        if (! $order) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy đơn hàng với thông tin đã cung cấp.',
                ], 404);
            }

            return back()->with('error', 'Không tìm thấy đơn hàng với thông tin đã cung cấp. Vui lòng kiểm tra lại Mã đơn hàng và Email.');
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Tìm thấy đơn hàng!',
                'redirect' => route('order.track', ['order_id' => $order->order_number, 'email' => $order->customer_email]),
            ]);
        }

        return view('pages.order-track', compact('order'));
    }

    public function kredivoCalculate(Request $request)
    {
        return response()->json([
            'success' => false,
            'message' => 'Kredivo chưa được kích hoạt cho dự án này.',
        ]);
    }
}
