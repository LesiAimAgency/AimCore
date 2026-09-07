<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkCategory;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request, $category_slug = null)
    {
        $rawCategories = $request->get('categories', []);
        if (is_array($rawCategories)) {
            $selectedSlugs = array_filter($rawCategories);
        } else {
            $selectedSlugs = array_filter(explode(',', (string) $rawCategories));
        }
        $selectedSlugs = array_values($selectedSlugs);

        if ($category_slug && ! in_array($category_slug, $selectedSlugs)) {
            $selectedSlugs[] = $category_slug;
        }

        $minPrice = $request->filled('min_price') ? (float) $request->get('min_price') : null;
        $maxPrice = $request->filled('max_price') ? (float) $request->get('max_price') : null;
        $sort = in_array($request->get('sort'), ['price_asc', 'price_desc', 'newest', 'default'])
            ? $request->get('sort')
            : 'default';
        $inStock = $request->boolean('in_stock');
        $onSale = $request->boolean('on_sale');
        $searchQuery = trim(strip_tags((string) $request->get('q', '')));

        // Root categories for sidebar
        $categories = WkCategory::active()
            ->whereNull('parent_id')
            ->with(['children' => fn ($q) => $q->active()->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get();

        // Query products
        $query = WkProduct::active()->with(['categories', 'combos']);

        if (! empty($selectedSlugs)) {
            $query->whereHas('categories', function ($q) use ($selectedSlugs) {
                $q->whereIn('slug', $selectedSlugs);
            });
        }

        if (! empty($searchQuery)) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('name', 'like', "%{$searchQuery}%")
                    ->orWhere('sku', 'like', "%{$searchQuery}%")
                    ->orWhere('description', 'like', "%{$searchQuery}%");
            });
        }

        if ($minPrice !== null && $minPrice > 0) {
            $query->where(function ($q) use ($minPrice) {
                $q->where('sale_price', '>=', $minPrice)
                    ->orWhere(function ($sq) use ($minPrice) {
                        $sq->whereNull('sale_price')->where('price', '>=', $minPrice);
                    });
            });
        }

        if ($maxPrice !== null && $maxPrice > 0) {
            $query->where(function ($q) use ($maxPrice) {
                $q->where(function ($sq) use ($maxPrice) {
                    $sq->whereNotNull('sale_price')->where('sale_price', '<=', $maxPrice);
                })->orWhere(function ($sq) use ($maxPrice) {
                    $sq->whereNull('sale_price')->where('price', '<=', $maxPrice);
                });
            });
        }

        if ($onSale) {
            $query->whereNotNull('sale_price')->where('sale_price', '>', 0);
        }

        if ($inStock) {
            $query->where('stock_quantity', '>', 0);
        }

        switch ($sort) {
            case 'price_asc':
                $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) DESC');
                break;
            case 'newest':
                $query->latest();
                break;
            default:
                $query->orderBy('views', 'desc')->latest();
                break;
        }

        $products = $query->paginate(15)->withQueryString();

        $activeFilters = [
            'categories' => $selectedSlugs,
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
            'sort' => $sort,
            'in_stock' => $inStock,
            'on_sale' => $onSale,
            'q' => $searchQuery,
        ];

        $priceFilterType = 'presets';
        $pricePresets = [
            ['label' => 'Dưới 5 triệu', 'min' => 0, 'max' => 5000000],
            ['label' => '5 - 10 triệu', 'min' => 5000000, 'max' => 10000000],
            ['label' => '10 - 20 triệu', 'min' => 10000000, 'max' => 20000000],
            ['label' => 'Trên 20 triệu', 'min' => 20000000, 'max' => 0],
        ];

        return view('shop.index', compact(
            'products',
            'categories',
            'activeFilters',
            'priceFilterType',
            'pricePresets'
        ));
    }

    public function category(Request $request, $category_slug)
    {
        return $this->index($request, $category_slug);
    }

    public function show(string $slug)
    {
        $product = WkProduct::where('slug', $slug)
            ->active()
            ->with(['categories', 'combos.items'])
            ->firstOrFail();

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

        return view('shop.show', compact(
            'product',
            'relatedProducts',
            'alsoViewedProducts',
            'recentlyViewedProducts'
        ));
    }

    public function searchSuggest(Request $request)
    {
        $q = trim(strip_tags((string) $request->get('q', '')));

        if (! $q) {
            return response()->json([]);
        }

        $products = WkProduct::active()
            ->where('name', 'like', "%{$q}%")
            ->orWhere('sku', 'like', "%{$q}%")
            ->limit(10)
            ->get()
            ->map(function ($p) {
                return [
                    'id' => $p->id,
                    'name' => $p->name,
                    'slug' => $p->slug,
                    'price' => $p->effective_price,
                    'formatted_price' => $p->formatted_price,
                    'image' => $p->image,
                    'url' => url($p->slug),
                ];
            });

        return response()->json($products);
    }

    public function searchSuggestions(Request $request)
    {
        return $this->searchSuggest($request);
    }
}
