<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkCategory;
use App\Models\Wkcomputer\WkPost;
use App\Models\Wkcomputer\WkProduct;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Featured root categories
        $featuredCategories = WkCategory::active()
            ->roots()
            ->orderBy('sort_order')
            ->take(14)
            ->get();

        // 2. Best sellers
        $bestSellers = WkProduct::active()
            ->with('categories')
            ->orderBy('views', 'desc')
            ->take(10)
            ->get();

        // 3. Featured products
        $featuredProducts = WkProduct::active()
            ->featured()
            ->with('categories')
            ->latest()
            ->take(10)
            ->get();

        // 4. New arrivals
        $newArrivals = WkProduct::active()
            ->with('categories')
            ->latest()
            ->take(10)
            ->get();

        // 5. Sale products (with sale_price lower than price)
        $saleProducts = WkProduct::active()
            ->whereNotNull('sale_price')
            ->where('sale_price', '>', 0)
            ->with('categories')
            ->take(10)
            ->get();

        // 6. Flash sale campaign (null fallback if no campaign table)
        $flashSale = null;

        // 7. Latest blog posts
        $latestPosts = WkPost::where('status', 'published')
            ->latest()
            ->take(4)
            ->get();

        // 8. Recommendation fallback
        $recentlyViewedProducts = collect();
        $personalizedProducts = collect();

        return view('index', compact(
            'featuredCategories',
            'bestSellers',
            'featuredProducts',
            'newArrivals',
            'saleProducts',
            'flashSale',
            'latestPosts',
            'recentlyViewedProducts',
            'personalizedProducts'
        ));
    }
}
