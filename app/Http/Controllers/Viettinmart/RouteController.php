<?php

namespace App\Http\Controllers\Viettinmart;

use App\Http\Controllers\ShopController;
use App\Models\Category;
use App\Models\Language;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class RouteController extends Controller
{
    public function index(Request $request, $slug)
    {
        // Sanitize slug để ngăn SQL injection
        $slug = sanitize_slug($slug);

        if (! $slug) {
            abort(404);
        }

        // HasTranslations trait tự động trả về bản dịch theo App::getLocale()
        // SetLocale middleware đã set locale từ URL prefix trước khi vào đây
        $currentLocale = App::getLocale();
        $defaultLocale = Cache::remember('default_language_code', 3600, function () {
            return Language::where('is_default', true)->value('code') ?: config('app.fallback_locale');
        });

        // 1. Thử tìm sản phẩm (ưu tiên cao nhất)
        // Tìm trong cả slug gốc và slug đã dịch
        $product = Product::where(function ($query) use ($slug) {
            // Tìm trong slug gốc
            $query->where('slug', $slug)
                  // Hoặc tìm trong bản dịch slug
                ->orWhereHas('translations', function ($q) use ($slug) {
                    $q->where('field', 'slug')
                        ->where('value', $slug);
                });
        })
            ->where('status', 'active')
            ->with([
                'categories',
                'productAttributes.attribute',
                'productAttributes.attributeValue',
                'activeVariants' => function ($query) {
                    $query->with(['variantAttributes.attribute', 'variantAttributes.attributeValue'])
                        ->orderBy('sort_order');
                },
                'activeCombos.activeVariants',
                'translations',
            ])
            ->first();

        if ($product) {
            // SEO: Redirect to correct slug for current locale if mismatch
            $correctSlug = $product->slug;
            if ($correctSlug !== $slug) {
                $prefix = (strtolower($currentLocale) !== strtolower($defaultLocale)) ? "/$currentLocale" : '';

                return redirect()->to($prefix.'/'.$correctSlug, 301);
            }

            $relatedProducts = Product::where('status', 'active')
                ->whereHas('categories', function ($q) use ($product) {
                    $q->whereIn('categories.id', $product->categories->pluck('id'));
                })
                ->where('id', '!=', $product->id)
                ->with('translations')
                ->limit(4)->get();

            return view('shop.show', compact('product', 'relatedProducts'));
        }

        // 2. Thử tìm danh mục sản phẩm
        $category = Category::where(function ($query) use ($slug) {
            // Tìm trong slug gốc
            $query->where('slug', $slug)
                  // Hoặc tìm trong bản dịch slug
                ->orWhereHas('translations', function ($q) use ($slug) {
                    $q->where('field', 'slug')
                        ->where('value', $slug);
                });
        })
            ->where('is_active', true)
            ->where('type', 'product')
            ->with('translations')
            ->first();

        if ($category) {
            // SEO: Redirect to correct slug for current locale if mismatch
            $correctSlug = $category->slug;
            if ($correctSlug !== $slug) {
                $prefix = (strtolower($currentLocale) !== strtolower($defaultLocale)) ? "/$currentLocale" : '';

                return redirect()->to($prefix.'/'.$correctSlug, 301);
            }

            // Redirect đến shop index với filter category
            return app(ShopController::class)->index($request, $slug);
        }

        // 3. Thử tìm bài viết
        $post = Post::where(function ($query) use ($slug) {
            // Tìm trong slug gốc
            $query->where('slug', $slug)
                  // Hoặc tìm trong bản dịch slug
                ->orWhereHas('translations', function ($q) use ($slug) {
                    $q->where('field', 'slug')
                        ->where('value', $slug);
                });
        })
            ->where('status', 'published')
            ->with(['author', 'translations'])
            ->first();

        if ($post) {
            // SEO: Redirect to correct slug for current locale if mismatch
            $correctSlug = $post->slug;
            if ($correctSlug !== $slug) {
                $prefix = (strtolower($currentLocale) !== strtolower($defaultLocale)) ? "/$currentLocale" : '';

                return redirect()->to($prefix.'/'.$correctSlug, 301);
            }

            $relatedPosts = Post::where('status', 'published')
                ->where('id', '!=', $post->id)
                ->with('translations')
                ->latest('published_at')->limit(3)->get();

            return view('blog.show', compact('post', 'relatedPosts'));
        }

        // 4. Thử tìm page
        $page = Page::where(function ($query) use ($slug) {
            // Tìm trong slug gốc
            $query->where('slug', $slug)
                  // Hoặc tìm trong bản dịch slug
                ->orWhereHas('translations', function ($q) use ($slug) {
                    $q->where('field', 'slug')
                        ->where('value', $slug);
                });
        })
            ->where('status', 'published')
            ->with('translations')
            ->first();

        if ($page) {
            // SEO: Redirect to correct slug for current locale if mismatch
            $correctSlug = $page->slug;
            if ($correctSlug !== $slug) {
                $prefix = (strtolower($currentLocale) !== strtolower($defaultLocale)) ? "/$currentLocale" : '';

                return redirect()->to($prefix.'/'.$correctSlug, 301);
            }

            return view('pages.show', compact('page'));
        }

        abort(404);
    }
}
