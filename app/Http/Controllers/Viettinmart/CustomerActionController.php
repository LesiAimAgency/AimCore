<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerActionController extends Controller
{
    /**
     * Get Wishlist Product IDs (for checking state on page load)
     */
    public function getWishlistIds()
    {
        $wishlistIds = session()->get('wishlist', []);

        return response()->json([
            'ids' => $wishlistIds,
            'count' => count($wishlistIds),
        ]);
    }

    /**
     * Add product to Wishlist (Session based)
     */
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

    /**
     * Display Wishlist Page
     */
    public function wishlistIndex()
    {
        $wishlistIds = session()->get('wishlist', []);
        $products = Product::with('categories')->whereIn('id', $wishlistIds)->get();

        return view('pages.wishlist', compact('products'));
    }

    /**
     * Remove from Wishlist
     */
    public function removeFromWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $wishlist = session()->get('wishlist', []);

        if (($key = array_search($productId, $wishlist)) !== false) {
            unset($wishlist[$key]);
            session()->put('wishlist', array_values($wishlist));

            $message = 'Đã xóa sản phẩm khỏi danh sách yêu thích.';

            // Return JSON for AJAX requests
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => $message,
                    'count' => count($wishlist),
                ]);
            }

            // Return redirect for form submissions
            return redirect()->back()->with('success', $message);
        }

        $errorMessage = 'Sản phẩm không có trong danh sách yêu thích.';

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'error',
                'message' => $errorMessage,
            ], 400);
        }

        return redirect()->back()->with('error', $errorMessage);
    }

    /**
     * Get Compare Data (for modal display)
     */
    public function getCompareData()
    {
        $compareIds = session()->get('compare', []);

        if (empty($compareIds)) {
            return response()->json([
                'status' => 'empty',
                'message' => __f('compare_empty_list'),
                'products' => [],
            ]);
        }

        $products = Product::with('categories')->whereIn('id', $compareIds)->get();

        return response()->json([
            'status' => 'success',
            'count' => count($products),
            'products' => $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'url' => locale_route('shop.show', $product->slug),
                    'thumbnail_url' => $product->thumbnail_url,
                    'formatted_price' => $product->formatted_price,
                    'price' => $product->effective_price,
                    'old_price' => $product->old_price,
                    'has_discount' => $product->old_price > $product->effective_price,
                    'category' => $product->categories->first()->name ?? 'N/A',
                    'description' => strip_tags($product->description),
                    'short_description' => \Str::limit(strip_tags($product->description), 150),
                    'has_contact_price' => $product->has_contact_price,
                    'stock' => $product->stock ?? 0,
                    'sku' => $product->sku ?? 'N/A',
                    'unit' => $product->unit ?? __f('product_unit_default'),
                ];
            }),
        ]);
    }

    /**
     * Add product to Compare (Session based)
     */
    public function addToCompare(Request $request)
    {
        $productId = $request->input('product_id');
        $compare = session()->get('compare', []);

        if (! in_array($productId, $compare)) {
            if (count($compare) >= 4) {
                array_shift($compare); // Limit to 4 items
            }
            $compare[] = $productId;
            session()->put('compare', $compare);
        }

        return response()->json([
            'status' => 'success',
            'message' => __f('compare_add_success'),
            'count' => count($compare),
        ]);
    }

    /**
     * Display Comparison Page
     */
    public function compareIndex()
    {
        $compareIds = session()->get('compare', []);

        if (empty($compareIds)) {
            $msg = function_exists('__f') ? __f('compare_empty_list') : 'Danh sách so sánh trống.';

            return redirect(locale_route('shop.index'))->with('info', $msg);
        }

        $products = Product::with('categories')->whereIn('id', $compareIds)->get();

        return view('shop.compare', compact('products'));
    }

    /**
     * Remove from Compare
     */
    public function removeFromCompare(Request $request)
    {
        $productId = $request->input('product_id');
        $compare = session()->get('compare', []);

        if (($key = array_search($productId, $compare)) !== false) {
            unset($compare[$key]);
            session()->put('compare', array_values($compare));

            $message = __f('compare_remove_success');

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'count' => count($compare),
                ]);
            }

            return redirect()->back()->with('success', $message);
        }

        $errorMessage = __f('compare_error_text');

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'error',
                'message' => $errorMessage,
            ], 400);
        }

        return redirect()->back()->with('error', $errorMessage);
    }

    /**
     * Get Product Quick View Content
     */
    public function getQuickView($projectCode, $id = null)
    {
        if ($id === null) {
            $id = $projectCode;
        }

        $product = Product::with(['categories', 'approvedReviews'])->find($id);

        if (! $product) {
            return response()->json(['error' => __f('product_not_found', [], 'Product not found')], 404);
        }

        // Return a partial view for the modal content
        $html = view('shop.partials.quick_view', compact('product'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }
}
