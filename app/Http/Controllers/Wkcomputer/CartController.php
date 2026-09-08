<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkProduct;
use App\Models\Wkcomputer\WkProductCombo;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function page()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));
        $validCoupons = session('valid_coupons', []);
        $totalDiscount = session('total_discount', 0);

        return view('shop.cart', compact('cart', 'subtotal', 'validCoupons', 'totalDiscount'));
    }

    public function count()
    {
        $cart = session('cart', []);
        $count = (int) collect($cart)->sum('qty');

        return response()->json(['count' => $count]);
    }

    public function total()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        return response()->json([
            'total' => $subtotal,
            'formatted_total' => number_format($subtotal, 0, ',', '.').'₫',
        ]);
    }

    public function dropdown()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

        return response()->json([
            'count' => (int) collect($cart)->sum('qty'),
            'subtotal' => $subtotal,
            'items' => array_values($cart),
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'nullable|integer|min:1',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = WkProduct::findOrFail($request->product_id);
        $qty = (int) ($request->input('qty') ?: $request->input('quantity', 1));
        if ($qty < 1) {
            $qty = 1;
        }

        $cart = session('cart', []);
        $key = (string) $product->id;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += $qty;
        } else {
            $cart[$key] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->effective_price,
                'original_price' => (float) ($product->attributes['price'] ?? $product->effective_price),
                'image' => $product->image,
                'slug' => $product->slug,
                'qty' => $qty,
                'sku' => $product->sku,
                'is_combo' => false,
            ];
        }

        session(['cart' => $cart]);

        $count = (int) collect($cart)->sum('qty');

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'count' => $count,
                'cart' => $cart,
                'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
            ]);
        }

        return redirect()->route('cart.page')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function addCombo(Request $request)
    {
        $mainProductId = $request->input('main_product_id');
        $qty = max(1, (int) ($request->input('qty') ?: $request->input('quantity', 1)));
        $combos = $request->input('combos', []);

        $mainProduct = WkProduct::findOrFail($mainProductId);

        $cart = session('cart', []);

        // Add main product
        $mainKey = (string) $mainProduct->id;
        if (isset($cart[$mainKey])) {
            $cart[$mainKey]['qty'] += $qty;
        } else {
            $cart[$mainKey] = [
                'id' => $mainProduct->id,
                'name' => $mainProduct->name,
                'price' => (float) $mainProduct->effective_price,
                'original_price' => (float) ($mainProduct->attributes['price'] ?? $mainProduct->effective_price),
                'image' => $mainProduct->image,
                'slug' => $mainProduct->slug,
                'qty' => $qty,
                'sku' => $mainProduct->sku,
                'is_combo' => false,
            ];
        }

        // Add combo items
        if (is_array($combos)) {
            foreach ($combos as $comboData) {
                $comboProductId = $comboData['product_id'] ?? null;
                if (! $comboProductId) {
                    continue;
                }

                $comboProd = WkProduct::find($comboProductId);
                if (! $comboProd) {
                    continue;
                }

                $comboRecord = WkProductCombo::where('product_id', $mainProductId)
                    ->where('combo_product_id', $comboProductId)
                    ->first();

                $discountPrice = (float) $comboProd->effective_price;
                if ($comboRecord) {
                    if ($comboRecord->discount_type === 'percentage' && $comboRecord->discount_value > 0) {
                        $discountPrice = max(0, $discountPrice * (1 - ($comboRecord->discount_value / 100)));
                    } elseif ($comboRecord->discount_type === 'fixed' && $comboRecord->discount_value > 0) {
                        $discountPrice = max(0, $discountPrice - $comboRecord->discount_value);
                    }
                }

                $comboKey = 'combo_'.$mainProductId.'_'.$comboProductId;
                $cart[$comboKey] = [
                    'id' => $comboProd->id,
                    'name' => '[Combo kèm] '.$comboProd->name,
                    'price' => $discountPrice,
                    'original_price' => (float) $comboProd->effective_price,
                    'image' => $comboProd->image,
                    'slug' => $comboProd->slug,
                    'qty' => $qty,
                    'sku' => $comboProd->sku,
                    'is_combo' => true,
                    'parent_id' => $mainProductId,
                ];
            }
        }

        session(['cart' => $cart]);

        return response()->json([
            'success' => true,
            'count' => (int) collect($cart)->sum('qty'),
            'message' => 'Đã thêm combo ưu đãi vào giỏ hàng thành công!',
        ]);
    }

    public function addMultiple(Request $request)
    {
        $items = $request->input('items', []);
        if (! is_array($items) || empty($items)) {
            return response()->json([
                'success' => false,
                'message' => 'Không có sản phẩm nào được chọn.',
            ], 400);
        }

        $cart = session('cart', []);

        foreach ($items as $item) {
            $productId = $item['id'] ?? ($item['product_id'] ?? null);
            if (! $productId) {
                continue;
            }

            $product = WkProduct::find($productId);
            if (! $product) {
                continue;
            }

            $qty = max(1, (int) ($item['qty'] ?? ($item['quantity'] ?? 1)));
            $key = (string) $product->id;

            if (isset($cart[$key])) {
                $cart[$key]['qty'] += $qty;
            } else {
                $cart[$key] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => (float) $product->effective_price,
                    'original_price' => (float) ($product->attributes['price'] ?? $product->effective_price),
                    'image' => $product->image,
                    'slug' => $product->slug,
                    'qty' => $qty,
                    'sku' => $product->sku,
                    'is_combo' => false,
                ];
            }
        }

        session(['cart' => $cart]);

        $count = (int) collect($cart)->sum('qty');

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'count' => $count,
                'message' => 'Đã thêm các linh kiện vào giỏ hàng!',
                'redirect' => route('cart.page'),
            ]);
        }

        return redirect()->route('cart.page')->with('success', 'Đã thêm các linh kiện vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        $key = (string) ($request->input('key') ?: ($request->input('id') ?: $request->input('product_id')));
        $qty = max(1, (int) ($request->input('qty') ?: $request->input('quantity', 1)));

        $cart = session('cart', []);
        if (isset($cart[$key])) {
            $cart[$key]['qty'] = $qty;
            session(['cart' => $cart]);
        }

        $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));
        $itemTotal = isset($cart[$key]) ? ($cart[$key]['price'] * $cart[$key]['qty']) : 0;

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'count' => (int) collect($cart)->sum('qty'),
                'subtotal' => $subtotal,
                'formatted_subtotal' => number_format($subtotal, 0, ',', '.').'₫',
                'item_total' => $itemTotal,
                'formatted_item_total' => number_format($itemTotal, 0, ',', '.').'₫',
            ]);
        }

        return redirect()->route('cart.page')->with('success', 'Đã cập nhật giỏ hàng.');
    }

    public function remove(Request $request)
    {
        $key = (string) ($request->input('key') ?: ($request->input('id') ?: $request->input('product_id')));

        $cart = session('cart', []);
        if (isset($cart[$key])) {
            unset($cart[$key]);
            session(['cart' => $cart]);
        }

        if ($request->expectsJson() || $request->ajax()) {
            $subtotal = collect($cart)->sum(fn ($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));

            return response()->json([
                'success' => true,
                'count' => (int) collect($cart)->sum('qty'),
                'subtotal' => $subtotal,
                'formatted_subtotal' => number_format($subtotal, 0, ',', '.').'₫',
                'message' => 'Đã xóa sản phẩm khỏi giỏ hàng.',
            ]);
        }

        return redirect()->route('cart.page')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }

    public function clear()
    {
        session()->forget('cart');
        session()->forget('applied_coupons');

        return redirect()->route('cart.page')->with('success', 'Đã xóa toàn bộ giỏ hàng.');
    }

    public function applyCoupon(Request $request)
    {
        $code = strtoupper(trim((string) $request->input('code')));

        return response()->json([
            'success' => false,
            'message' => 'Mã khuyến mãi không hợp lệ hoặc đã hết hạn.',
        ]);
    }

    public function removeCoupon(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Đã gỡ mã khuyến mãi.',
        ]);
    }
}
