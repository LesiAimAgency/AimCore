<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $project = function_exists('current_project') ? current_project() : null;
        if (! $project && app()->bound('current_project_id')) {
            $project = Project::find(app('current_project_id'));
        }
        if (! $project && request()->route('projectCode')) {
            $project = Project::where('code', request()->route('projectCode'))->first();
        }

        $projectId = $project?->id;

        $prodQuery = Product::where('status', 'active');
        if ($projectId) {
            $prodQuery->where('project_id', $projectId);
        }
        $products = $prodQuery->latest()->take(50)->get();

        $catQuery = ProductCategory::query();
        if ($projectId) {
            $catQuery->where('project_id', $projectId);
        }
        $categories = $catQuery->get();

        $postQuery = Post::where('post_type', 'post')->where('status', 'published');
        if ($projectId) {
            $postQuery->where('project_id', $projectId);
        }
        $posts = $postQuery->latest()->take(30)->get();

        $pageQuery = Post::where('post_type', 'page')->where('status', 'published');
        if ($projectId) {
            $pageQuery->where('project_id', $projectId);
        }
        $pages = $pageQuery->latest()->get();

        if (view()->exists('sitemap')) {
            return response()->view('sitemap', compact('products', 'categories', 'posts', 'pages'))
                ->header('Content-Type', 'application/xml');
        }

        $sitemaps = [
            ['loc' => route('sitemap.pages'), 'lastmod' => now()->toAtomString()],
            ['loc' => route('sitemap.products'), 'lastmod' => now()->toAtomString()],
            ['loc' => route('sitemap.categories'), 'lastmod' => now()->toAtomString()],
            ['loc' => route('sitemap.brands'), 'lastmod' => now()->toAtomString()],
        ];

        return response()->view('sitemap.index', compact('sitemaps'))
            ->header('Content-Type', 'application/xml');
    }

    public function htmlIndex()
    {
        $project = function_exists('current_project') ? current_project() : null;
        if (! $project && app()->bound('current_project_id')) {
            $project = Project::find(app('current_project_id'));
        }
        if (! $project && request()->route('projectCode')) {
            $project = Project::where('code', request()->route('projectCode'))->first();
        }

        $projectId = $project?->id;

        $prodQuery = Product::where('status', 'active');
        if ($projectId) {
            $prodQuery->where('project_id', $projectId);
        }
        $products = $prodQuery->latest()->take(50)->get();

        $catQuery = ProductCategory::query();
        if ($projectId) {
            $catQuery->where('project_id', $projectId);
        }
        $categories = $catQuery->get();

        $postQuery = Post::where('post_type', 'post')->where('status', 'published');
        if ($projectId) {
            $postQuery->where('project_id', $projectId);
        }
        $posts = $postQuery->latest()->take(30)->get();

        $pageQuery = Post::where('post_type', 'page')->where('status', 'published');
        if ($projectId) {
            $pageQuery->where('project_id', $projectId);
        }
        $pages = $pageQuery->latest()->get();

        $viewName = view()->exists('sitemap_html')
            ? 'sitemap_html'
            : (view()->exists('frontend.themes.viettinmartdemo.sitemap_html')
                ? 'frontend.themes.viettinmartdemo.sitemap_html'
                : 'sitemap');

        return view($viewName, compact('products', 'categories', 'posts', 'pages'));
    }

    public function pages()
    {
        $urls = [
            ['loc' => url('/'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '1.0'],
            ['loc' => route('frontend.contact'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ];

        return response()->view('sitemap.urlset', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }

    public function products()
    {
        $products = Product::where('status', 'active')
            ->select('id', 'slug', 'updated_at')
            ->get();

        $urls = $products->map(function ($product) {
            return [
                'loc' => route('frontend.products.show', $product->slug),
                'lastmod' => $product->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ];
        });

        return response()->view('sitemap.urlset', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }

    public function categories()
    {
        $categories = ProductCategory::select('id', 'slug', 'updated_at')->get();

        $urls = $categories->map(function ($category) {
            return [
                'loc' => route('frontend.categories.show', $category->slug),
                'lastmod' => $category->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        });

        return response()->view('sitemap.urlset', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }

    public function brands()
    {
        $brands = Brand::select('id', 'slug', 'updated_at')->get();

        $urls = $brands->map(function ($brand) {
            return [
                'loc' => url('/brand/'.$brand->slug),
                'lastmod' => $brand->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ];
        });

        return response()->view('sitemap.urlset', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }
}
