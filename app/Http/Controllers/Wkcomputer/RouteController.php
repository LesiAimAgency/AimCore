<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkCategory;
use App\Models\Wkcomputer\WkPost;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request, string $slug)
    {
        $slug = trim(strip_tags($slug));

        if (! $slug) {
            abort(404);
        }

        // 1. Try finding Product (highest priority)
        $product = WkProduct::where('slug', $slug)
            ->active()
            ->with(['categories', 'combos'])
            ->first();

        if ($product) {
            $relatedProducts = WkProduct::active()
                ->where('id', '!=', $product->id)
                ->whereHas('categories', function ($q) use ($product) {
                    $catIds = $product->categories->pluck('id')->toArray();
                    $q->whereIn('product_categories.id', $catIds);
                })
                ->take(4)
                ->get();

            $alsoViewedProducts = WkProduct::active()
                ->where('id', '!=', $product->id)
                ->latest()
                ->take(4)
                ->get();

            $recentlyViewedProducts = collect();

            return view('shop.show', compact('product', 'relatedProducts', 'alsoViewedProducts', 'recentlyViewedProducts'));
        }

        // 2. Try finding Category
        $category = WkCategory::where('slug', $slug)
            ->active()
            ->first();

        if ($category) {
            return app(ShopController::class)->index($request, $slug);
        }

        // 3. Try finding Post
        $post = WkPost::where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if ($post) {
            $relatedPosts = WkPost::where('status', 'published')
                ->where('id', '!=', $post->id)
                ->latest()
                ->limit(3)
                ->get();

            $relatedProducts = WkProduct::active()->latest()->limit(4)->get();

            return view('blog.show', compact('post', 'relatedPosts', 'relatedProducts'));
        }

        abort(404);
    }
}
