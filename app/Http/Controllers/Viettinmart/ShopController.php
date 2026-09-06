<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

class ShopController extends Controller
{
    public function index(Request $request, $projectCode = null, $slug = null)
    {
        $category_slug = $slug ?? $request->route('category_slug') ?? $request->route('slug');

        // If route does not have projectCode prefix (standalone mode), $projectCode is actually $category_slug
        if ($category_slug === null && $projectCode !== null) {
            $isProject = Project::where('code', $projectCode)->exists();
            if (! $isProject) {
                $category_slug = $projectCode;
                $projectCode = null;
            }
        }

        // === 1. Đọc tham số từ URL ===
        // 301 Redirect legacy query string (?danh-muc=... or ?category=...) to clean SEO slug URL
        $legacyCategory = $request->get('danh-muc') ?: $request->get('category');
        if ($legacyCategory && ! $request->ajax() && ! $request->wantsJson()) {
            $projCode = $projectCode ?: request()->route('projectCode');
            $targetUrl = $projCode ? "/{$projCode}/{$legacyCategory}" : "/{$legacyCategory}";

            return redirect($targetUrl, 301);
        }

        // Hỗ trợ: ?categories[]=slug1&categories[]=slug2  (form checkbox array)
        //      OR: ?categories=slug1,slug2 (legacy comma-string)
        $rawCategories = $request->get('categories', []);
        if (is_array($rawCategories)) {
            $selectedSlugs = array_filter($rawCategories);
        } else {
            $selectedSlugs = array_filter(explode(',', (string) $rawCategories));
        }
        $selectedSlugs = array_values($selectedSlugs);

        if ($legacyCategory && ! in_array($legacyCategory, $selectedSlugs)) {
            $selectedSlugs[] = $legacyCategory;
        }

        // Nếu vào qua route /shop/category/{slug}, thêm vào danh sách
        if ($category_slug && ! in_array($category_slug, $selectedSlugs)) {
            $selectedSlugs[] = $category_slug;
        }

        // Expand category aliases for SEO friendly slugs (e.g. dong-lanh -> san-pham-tuoi-cap-dong-chua-so-che)
        $catAliases = [
            'dong-lanh' => ['dong-lanh', 'san-pham-tuoi-cap-dong-chua-so-che', 'thuc-pham-dong-lanh'],
            'thuc-pham-dong-lanh' => ['thuc-pham-dong-lanh', 'dong-lanh', 'san-pham-tuoi-cap-dong-chua-so-che'],
            'thit-hai-san' => ['thit-hai-san', 'cac-san-pham-tu-thit'],
            'rau-cu-qua' => ['rau-cu-qua', 'san-pham-da-lam-sach'],
            'do-uong' => ['do-uong', 'cac-san-pham-khac'],
            'banh-keo' => ['banh-keo', 'cac-san-pham-khac'],
        ];
        $expandedSlugs = [];
        foreach ($selectedSlugs as $sSlug) {
            if (isset($catAliases[$sSlug])) {
                $expandedSlugs = array_merge($expandedSlugs, $catAliases[$sSlug]);
            } else {
                $expandedSlugs[] = $sSlug;
            }
        }
        $selectedSlugs = array_values(array_unique($expandedSlugs));

        $minPrice = sanitize_numeric($request->get('min_price'), 0);
        $maxPrice = sanitize_numeric($request->get('max_price'), 0);
        $sort = in_array($request->get('sort'), ['price_asc', 'price_desc', 'newest', 'default'])
                    ? $request->get('sort')
                    : 'default';
        $inStock = $request->boolean('in_stock');
        $onSale = $request->boolean('on_sale');
        $searchQuery = trim(strip_tags($request->get('q', ''))); // Sanitize search query
        $pricePresetRaw = $request->get('price_preset', '');
        if ($pricePresetRaw && $pricePresetRaw !== '_') {
            [$presetMin, $presetMax] = explode('_', $pricePresetRaw.'_');
            $minPrice = $minPrice ?? ($presetMin !== '' ? $presetMin : null);
            $maxPrice = $maxPrice ?? ($presetMax !== '' ? $presetMax : null);
        }

        // === 2. Sidebar: tất cả danh mục root ===
        $categories = Category::whereNull('parent_id')
            ->where('is_active', true)
            ->with('translations')
            ->orderBy('sort_order')
            ->get();

        // === 3. Query sản phẩm với filter server-side ===
        $query = Product::active()
            ->with([
                'translations',
                'categories' => fn ($q) => $q->where('is_active', true)->with('translations'),
            ]);

        // Lọc theo danh mục (OR – sản phẩm thuộc bất kỳ danh mục nào được chọn)
        if (! empty($selectedSlugs)) {
            $currentLocale = App::getLocale();
            $query->whereHas('categories', function ($q) use ($selectedSlugs, $currentLocale) {
                $q->where(function ($subQuery) use ($selectedSlugs, $currentLocale) {
                    // Tìm trong slug gốc
                    $subQuery->whereIn('slug', $selectedSlugs)
                             // Hoặc tìm trong bản dịch slug
                        ->orWhereHas('translations', function ($transQuery) use ($selectedSlugs, $currentLocale) {
                            $transQuery->where('field', 'slug')
                                ->where('locale', $currentLocale)
                                ->whereIn('value', $selectedSlugs);
                        });
                });
            });
        }

        // Tìm kiếm theo từ khóa - SANITIZED để ngăn SQL injection
        if (! empty($searchQuery)) {
            $currentLocale = app()->getLocale();

            if ($currentLocale === 'en') {
                // Nếu là tiếng Anh, tìm kiếm trong cả dữ liệu gốc và translations
                $query->where(function ($q) use ($searchQuery, $currentLocale) {
                    // Tìm trong dữ liệu gốc (tiếng Việt)
                    $q->where('name', 'LIKE', '%'.$searchQuery.'%')
                        ->orWhere('sku', 'LIKE', '%'.$searchQuery.'%')
                        ->orWhere('description', 'LIKE', '%'.$searchQuery.'%')
                        ->orWhere('short_description', 'LIKE', '%'.$searchQuery.'%')
                      // Tìm trong translations tiếng Anh
                        ->orWhereHas('translations', function ($tq) use ($currentLocale, $searchQuery) {
                            $tq->where('locale', $currentLocale)
                                ->where(function ($innerQ) use ($searchQuery) {
                                    $innerQ->where(function ($fieldQ) use ($searchQuery) {
                                        $fieldQ->where('field', 'name')
                                            ->where('value', 'LIKE', '%'.$searchQuery.'%');
                                    })
                                        ->orWhere(function ($fieldQ) use ($searchQuery) {
                                            $fieldQ->where('field', 'description')
                                                ->where('value', 'LIKE', '%'.$searchQuery.'%');
                                        })
                                        ->orWhere(function ($fieldQ) use ($searchQuery) {
                                            $fieldQ->where('field', 'short_description')
                                                ->where('value', 'LIKE', '%'.$searchQuery.'%');
                                        });
                                });
                        });
                });
            } else {
                // Nếu là tiếng Việt hoặc ngôn ngữ khác, chỉ tìm trong dữ liệu gốc
                $query->where(function ($q) use ($searchQuery) {
                    $q->where('name', 'LIKE', '%'.$searchQuery.'%')
                        ->orWhere('sku', 'LIKE', '%'.$searchQuery.'%')
                        ->orWhere('description', 'LIKE', '%'.$searchQuery.'%')
                        ->orWhere('short_description', 'LIKE', '%'.$searchQuery.'%');
                });
            }
        }

        // Lọc theo khoảng giá
        if ($minPrice !== null && is_numeric($minPrice)) {
            $query->where('price', '>=', (float) $minPrice);
        }
        if ($maxPrice !== null && is_numeric($maxPrice)) {
            $query->where('price', '<=', (float) $maxPrice);
        }

        // Lọc còn hàng / đang giảm giá
        if ($inStock) {
            $query->where(function ($q) {
                $q->where('stock', '>', 0)->orWhere('stock_status', 'instock');
            });
        }
        if ($onSale) {
            // flash_price là computed attribute (không query được DB)
            // Lọc theo compare_price > price (giảm giá thông thường)
            $query->where('compare_price', '>', 0)
                ->whereColumn('compare_price', '>', 'price');
        }

        // Sắp xếp
        $hasSortOrder = Schema::hasColumn('products_enhanced', 'sort_order');
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'newest' => $query->orderBy('created_at', 'desc'),
            default => $hasSortOrder
                ? $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')
                : $query->orderBy('created_at', 'desc'),
        };

        $products = $query->paginate(24)->withQueryString();

        // === 4. Thống kê giá cho UI ===
        $priceFilterType = setting('price_filter_type', 'presets');
        $rawPresets = setting('price_presets', []);
        $pricePresets = is_array($rawPresets) ? $rawPresets : (json_decode($rawPresets, true) ?: []);

        // === 5. Truyền filter hiện tại về view ===
        $activeFilters = [
            'categories' => $selectedSlugs,
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
            'sort' => $sort,
            'in_stock' => $inStock,
            'on_sale' => $onSale,
            'price_preset' => $pricePresetRaw ?? '',
            'q' => $searchQuery, // Thêm search query vào active filters
        ];

        // AJAX request → trả về JSON với HTML partial + meta phân trang
        if ($request->ajax() || $request->wantsJson()) {
            $html = view('shop._products_partial', compact('products'))->render();

            return response()->json([
                'html' => $html,
                'meta' => [
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'total' => $products->total(),
                    'per_page' => $products->perPage(),
                    'from' => $products->firstItem(),
                    'to' => $products->lastItem(),
                    'has_more' => $products->hasMorePages(),
                ],
            ]);
        }

        return view('shop.index', compact(
            'products', 'categories', 'activeFilters',
            'priceFilterType', 'pricePresets'
        ));
    }

    public function category(Request $request, $projectCode = null, $category_slug = null)
    {
        if ($category_slug === null) {
            $category_slug = $projectCode;
        }

        return $this->index($request, $projectCode, $category_slug);
    }

    public function searchSuggest(Request $request)
    {
        $q = trim(strip_tags($request->get('q', '')));
        $currentLocale = app()->getLocale();

        if (! $q) {
            return response()->json([]);
        }

        $query = Product::active()->with(['categories', 'translations']);

        // Tìm kiếm theo ngôn ngữ hiện tại
        if ($currentLocale === 'en') {
            // Nếu là tiếng Anh, tìm kiếm trong cả dữ liệu gốc và translations
            $query->where(function ($subQuery) use ($currentLocale, $q) {
                // Tìm trong dữ liệu gốc (tiếng Việt)
                $subQuery->where('name', 'like', '%'.$q.'%')
                    ->orWhere('description', 'like', '%'.$q.'%')
                    ->orWhere('short_description', 'like', '%'.$q.'%')
                  // Tìm trong translations tiếng Anh
                    ->orWhereHas('translations', function ($tq) use ($currentLocale, $q) {
                        $tq->where('locale', $currentLocale)
                            ->where(function ($innerQ) use ($q) {
                                $innerQ->where(function ($fieldQ) use ($q) {
                                    $fieldQ->where('field', 'name')
                                        ->where('value', 'like', '%'.$q.'%');
                                })
                                    ->orWhere(function ($fieldQ) use ($q) {
                                        $fieldQ->where('field', 'description')
                                            ->where('value', 'like', '%'.$q.'%');
                                    })
                                    ->orWhere(function ($fieldQ) use ($q) {
                                        $fieldQ->where('field', 'short_description')
                                            ->where('value', 'like', '%'.$q.'%');
                                    });
                            });
                    });
            });
        } else {
            // Nếu là tiếng Việt hoặc ngôn ngữ khác, chỉ tìm trong dữ liệu gốc
            $query->where(function ($subQuery) use ($q) {
                $subQuery->where('name', 'like', '%'.$q.'%')
                    ->orWhere('description', 'like', '%'.$q.'%')
                    ->orWhere('short_description', 'like', '%'.$q.'%');
            });
        }

        $orderCol = Schema::hasColumn('products_enhanced', 'sort_order') ? 'sort_order' : 'created_at';
        $products = $query->orderBy($orderCol, 'asc')->limit(10)->get()->map(function ($p) {
            $effectivePrice = (float) $p->effective_price;
            $oldPrice = (float) ($p->old_price ?: $p->price);
            $hasDiscount = $effectivePrice < $oldPrice;

            return [
                'name' => $p->name, // Sẽ tự động lấy theo locale hiện tại nhờ HasTranslations trait
                'slug' => $p->slug,
                'price' => $effectivePrice,
                'formatted_price' => $effectivePrice <= 0 ? __('common.contact_price') : number_format($effectivePrice, 0, ',', '.').' ₫',
                'old_price' => $oldPrice,
                'formatted_old_price' => ($oldPrice > 0) ? number_format($oldPrice, 0, ',', '.').' ₫' : null,
                'has_discount' => $hasDiscount,
                'discount_percent' => $hasDiscount ? round((1 - ($effectivePrice / $oldPrice)) * 100) : null,
                'thumbnail_url' => $p->thumbnail_url ?: asset('theme/images/grocery/01.jpg'),
                'url' => locale_route('shop.show', ['slug' => $p->slug]),
                'category' => $p->categories->pluck('name')->take(2)->implode(', '), // Cũng sẽ tự động theo locale
            ];
        });

        return response()->json($products);
    }

    public function show($projectCode, $slug = null)
    {
        if ($slug === null) {
            $slug = $projectCode;
        }

        // Sanitize slug để ngăn SQL injection
        $slug = sanitize_slug($slug);
        $currentLocale = App::getLocale();

        $product = Product::where(function ($query) use ($slug, $currentLocale) {
            // Tìm trong slug gốc
            $query->where('slug', $slug)
                  // Hoặc tìm trong bản dịch slug
                ->orWhereHas('translations', function ($q) use ($slug, $currentLocale) {
                    $q->where('field', 'slug')
                        ->where('locale', $currentLocale)
                        ->where('value', $slug);
                });
        })
            ->active()
            ->with([
                'categories',
            ])->first();

        if (! $product) {
            $category = Category::where('slug', $slug)->where('is_active', true)->first();
            if ($category) {
                return redirect(locale_route('shop.category', ['slug' => $slug]));
            }

            abort(404);
        }

        $relatedQuery = Product::active();
        if ($product->categories && $product->categories->isNotEmpty()) {
            $catIds = $product->categories->pluck('id')->toArray();
            $relatedQuery->whereHas('categories', function ($q) use ($catIds) {
                $q->whereIn('product_categories.id', $catIds);
            });
        }
        $relatedProducts = $relatedQuery->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('shop.show', compact('product', 'relatedProducts'));
    }

    public function searchSuggestions(Request $request)
    {
        $query = trim(strip_tags($request->get('q', '')));
        $currentLocale = app()->getLocale();

        if (! $query || strlen($query) < 2) {
            return response()->json([]);
        }

        $productQuery = Product::where('status', 'active')->with('translations');

        // Tìm kiếm theo ngôn ngữ hiện tại
        if ($currentLocale === 'en') {
            // Nếu là tiếng Anh, tìm kiếm trong cả dữ liệu gốc và translations
            $productQuery->where(function ($subQuery) use ($currentLocale, $query) {
                // Tìm trong dữ liệu gốc (tiếng Việt)
                $subQuery->where('name', 'LIKE', '%'.$query.'%')
                  // Tìm trong translations tiếng Anh
                    ->orWhereHas('translations', function ($tq) use ($currentLocale, $query) {
                        $tq->where('locale', $currentLocale)
                            ->where('field', 'name')
                            ->where('value', 'LIKE', '%'.$query.'%');
                    });
            });
        } else {
            // Nếu là tiếng Việt hoặc ngôn ngữ khác, chỉ tìm trong dữ liệu gốc
            $productQuery->where('name', 'LIKE', '%'.$query.'%');
        }

        $products = $productQuery->select('name')
            ->distinct()
            ->limit(10)
            ->get()
            ->map(function ($product) {
                return $product->name; // Sẽ tự động lấy theo locale hiện tại nhờ HasTranslations trait
            })
            ->toArray();

        return response()->json($products);
    }
}
