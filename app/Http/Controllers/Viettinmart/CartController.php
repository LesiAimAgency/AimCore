<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\Coupon;
use App\Models\Product;
use App\Services\CouponService;
use App\Services\PricingService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function page()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        $appliedCoupons = session('applied_coupons', []);
        $validCoupons = [];
        $totalDiscount = 0;

        foreach ($appliedCoupons as $couponId) {
            $coupon = Coupon::find($couponId);
            if ($coupon && $coupon->isValid($subtotal)) {
                $discount = $coupon->calculateDiscount($subtotal);
                $totalDiscount += $discount;
                $validCoupons[] = [
                    'id' => $coupon->id,
                    'code' => $coupon->code,
                    'discount' => $discount,
                ];
            }
        }

        // Keep only valid ones in session
        session(['applied_coupons' => collect($validCoupons)->pluck('id')->toArray()]);

        return view('shop.cart', compact('cart', 'subtotal', 'validCoupons', 'totalDiscount'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products_enhanced,id',
            'qty' => 'integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check product stock
        $currentStock = $product->stock ?? $product->stock_quantity ?? 0;
        if ($product->manage_stock && $currentStock < ($request->qty ?? 1)) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không đủ số lượng trong kho!',
            ], 422);
        }

        // SỬ DỤNG PRICING SERVICE - SINGLE SOURCE OF TRUTH
        $pricingService = app(PricingService::class);
        $pricing = $pricingService->calculatePrice($product);

        $cart = session('cart', []);
        $key = (string) $product->id;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += $request->qty ?? 1;
        } else {
            $cart[$key] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $pricing['final_price'],
                'original_price' => $pricing['original_price'],
                'image' => $this->normalizeImagePath($product->image ?? $product->featured_image),
                'slug' => $product->slug,
                'qty' => $request->qty ?? 1,
                'sku' => $product->sku,
                'discount_type' => $pricing['discount_type'],
                'savings' => $pricing['savings'],
            ];
        }

        session(['cart' => $cart]);

        return response()->json([
            'success' => true,
            'count' => array_sum(array_column($cart, 'qty')),
            'cart' => $cart,
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
        ]);
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);
        unset($cart[$request->rowId]);
        session(['cart' => $cart]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request)
    {
        $cart = session('cart', []);
        $itemSubtotalFormatted = '';

        if (isset($cart[$request->rowId])) {
            $cart[$request->rowId]['qty'] = max(1, (int) $request->qty);
            $itemSubtotalFormatted = number_format($cart[$request->rowId]['price'] * $cart[$request->rowId]['qty'], 0, ',', '.').setting('currency_symbol', 'đ');
            session(['cart' => $cart]);
        }

        return response()->json([
            'success' => true,
            'item_subtotal_formatted' => $itemSubtotalFormatted,
            'count' => array_sum(array_column($cart, 'qty')),
        ]);
    }

    public function count()
    {
        $cart = session('cart', []);

        return response()->json(['count' => array_sum(array_column($cart, 'qty'))]);
    }

    public function total()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        // Tính tổng tiền các sản phẩm ĐƯỢC PHÉP giảm giá (không phải combo)
        $discountableSubtotal = collect($cart)
            ->filter(fn ($i) => empty($i['is_combo']))
            ->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        $appliedCoupons = session('applied_coupons', []);
        $totalDiscount = 0;
        $validCouponIds = [];
        $validCoupons = [];

        foreach ($appliedCoupons as $couponId) {
            $coupon = Coupon::find($couponId);
            // Coupon chỉ áp dụng trên giá trị các sản phẩm KHÔNG PHẢI combo
            if ($coupon && $coupon->isValid($discountableSubtotal)) {
                $discount = $coupon->calculateDiscount($discountableSubtotal);
                $totalDiscount += $discount;
                $validCouponIds[] = $coupon->id;
                $validCoupons[] = [
                    'code' => $coupon->code,
                    'discount_formatted' => '-'.number_format($discount, 0, ',', '.').setting('currency_symbol', 'đ'),
                ];
            }
        }

        session(['applied_coupons' => $validCouponIds]);

        $totalValue = max(0, $subtotal - $totalDiscount);

        return response()->json([
            'subtotal' => $subtotal,
            'subtotal_formatted' => number_format($subtotal, 0, ',', '.').setting('currency_symbol', 'đ'),
            'discount' => $totalDiscount,
            'discount_formatted' => number_format($totalDiscount, 0, ',', '.').setting('currency_symbol', 'đ'),
            'total' => $totalValue,
            'total_formatted' => number_format($totalValue, 0, ',', '.').setting('currency_symbol', 'đ'),
            'coupons' => $validCoupons,
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $request->validate(['code' => 'required|string|max:50']);

        // Sanitize và uppercase coupon code
        $code = strtoupper(trim(strip_tags($request->code)));

        $appliedCoupons = session('applied_coupons', []);
        $coupon = Coupon::whereRaw('UPPER(code) = ?', [$code])->first();

        if (! $coupon) {
            return response()->json(['success' => false, 'message' => 'Mã giảm giá không tồn tại.']);
        }

        if (in_array($coupon->id, $appliedCoupons)) {
            return response()->json(['success' => false, 'message' => 'Mã giảm giá này đã được áp dụng.']);
        }

        $cart = session('cart', []);
        $discountableSubtotal = collect($cart)
            ->filter(fn ($i) => empty($i['is_combo']))
            ->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        $couponService = app(CouponService::class);
        $validation = $couponService->validateCoupon($code, $discountableSubtotal);

        if (! $validation['valid']) {
            return response()->json(['success' => false, 'message' => $validation['message']]);
        }

        $appliedCoupons[] = $coupon->id;
        session(['applied_coupons' => $appliedCoupons]);

        return response()->json([
            'success' => true,
            'message' => $validation['message'],
            'coupon' => $validation['coupon'],
        ]);
    }

    public function removeCoupon(Request $request)
    {
        $couponId = $request->coupon_id;
        $appliedCoupons = session('applied_coupons', []);

        if ($couponId) {
            $appliedCoupons = array_filter($appliedCoupons, fn ($id) => $id != $couponId);
            session(['applied_coupons' => array_values($appliedCoupons)]);

            return response()->json(['success' => true, 'message' => Lang('cart_coupon_removed', [], 'vi') == 'cart_coupon_removed' ? 'Đã gỡ mã giảm giá.' : Lang('cart_coupon_removed')]);
        }

        session()->forget('applied_coupons');

        return response()->json(['success' => true, 'message' => Lang('cart_coupon_cleared', [], 'vi') == 'cart_coupon_cleared' ? 'Đã gỡ tất cả mã giảm giá.' : Lang('cart_coupon_cleared')]);
    }

    public function clear()
    {
        session()->forget('cart');

        return response()->json(['success' => true]);
    }

    public function dropdown()
    {
        return response(view('layouts.partials.cart-dropdown')->render());
    }

    private function normalizeImagePath(?string $image): ?string
    {
        if (! $image) {
            return null;
        }

        // Full URL — extract relative path
        if (str_starts_with($image, 'http')) {
            // Extract media/ path from URL
            if (preg_match('#/(media/.+)$#', $image, $m)) {
                return $m[1];
            }

            return $image;
        }

        // Strip storage/ prefix if present
        if (str_starts_with($image, 'storage/')) {
            return substr($image, 8); // remove 'storage/'
        }

        return $image;
    }
}
