<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Http\Request;

class CustomerActionController extends Controller
{
    public function getWishlistIds()
    {
        $wishlistIds = session()->get('wishlist', []);

        return response()->json([
            'ids' => $wishlistIds,
            'count' => count($wishlistIds),
        ]);
    }

    public function addToWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $wishlist = session()->get('wishlist', []);

        if (! in_array($productId, $wishlist)) {
            $wishlist[] = $productId;
            session()->put('wishlist', $wishlist);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Đã thêm vào danh sách yêu thích',
            'count' => count($wishlist),
        ]);
    }

    public function wishlistIndex()
    {
        $wishlistIds = session()->get('wishlist', []);
        $products = WkProduct::with('categories')->whereIn('id', $wishlistIds)->get();

        return view('pages.wishlist', compact('products'));
    }

    public function removeFromWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $wishlist = session()->get('wishlist', []);

        if (($key = array_search($productId, $wishlist)) !== false) {
            unset($wishlist[$key]);
            session()->put('wishlist', array_values($wishlist));

            return response()->json([
                'status' => 'success',
                'message' => 'Đã xóa sản phẩm khỏi danh sách yêu thích.',
                'count' => count($wishlist),
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Sản phẩm không có trong danh sách yêu thích.',
        ], 400);
    }

    public function addToCompare(Request $request)
    {
        $productId = $request->input('product_id');
        $compare = session()->get('compare', []);

        if (! in_array($productId, $compare)) {
            if (count($compare) >= 4) {
                array_shift($compare);
            }
            $compare[] = $productId;
            session()->put('compare', $compare);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Đã thêm vào so sánh',
            'count' => count($compare),
        ]);
    }

    public function removeFromCompare(Request $request)
    {
        $productId = $request->input('product_id');
        $compare = session()->get('compare', []);

        if (($key = array_search($productId, $compare)) !== false) {
            unset($compare[$key]);
            session()->put('compare', array_values($compare));

            return response()->json([
                'success' => true,
                'message' => 'Đã xóa sản phẩm khỏi so sánh.',
                'count' => count($compare),
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Sản phẩm không có trong danh sách so sánh.',
        ], 400);
    }

    public function getCompareData()
    {
        $compareIds = session()->get('compare', []);
        if (empty($compareIds)) {
            return response()->json([
                'status' => 'empty',
                'message' => 'Chưa có sản phẩm nào trong danh sách so sánh',
                'products' => [],
            ]);
        }

        $products = WkProduct::with('categories')->whereIn('id', $compareIds)->get();

        return response()->json([
            'status' => 'success',
            'count' => count($products),
            'products' => $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'url' => url($product->slug),
                    'thumbnail_url' => $product->image,
                    'formatted_price' => $product->formatted_price,
                    'price' => $product->effective_price,
                    'old_price' => $product->attributes['price'] ?? 0,
                    'category' => $product->categories->first()->name ?? 'Linh kiện',
                    'description' => strip_tags((string) $product->description),
                    'sku' => $product->sku ?? 'N/A',
                ];
            }),
        ]);
    }

    public function compareIndex()
    {
        $compareIds = session()->get('compare', []);
        if (empty($compareIds)) {
            return redirect()->route('shop.index')->with('info', 'Chưa có sản phẩm nào để so sánh.');
        }

        $products = WkProduct::with('categories')->whereIn('id', $compareIds)->get();

        return view('shop.compare', compact('products'));
    }

    public function getQuickView($id)
    {
        $product = WkProduct::with('categories')->find($id);
        if (! $product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        if (view()->exists('shop.partials.quick_view')) {
            $html = view('shop.partials.quick_view', compact('product'))->render();

            return response()->json(['html' => $html]);
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->formatted_price,
            'image' => $product->image,
            'url' => url($product->slug),
        ]);
    }
}
