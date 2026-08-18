<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Taxonomy;
use App\Services\TocService;

class PostController extends Controller
{
    public function index()
    {
        $postCategorySettings = get_theme_option('post-category') ?: [];
        $perPage = data_get($postCategorySettings, 'posts_per_page', 12);
        $layout = data_get($postCategorySettings, 'post_category_layout', 'grid');

        $posts = Post::posts()
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return view('frontend.posts.index', compact('posts', 'layout', 'postCategorySettings'));
    }

    public function show($locale = null, $slug = null)
    {
        // Handle both localized and non-localized routes
        if ($slug === null) {
            $slug = $locale;
            $locale = null;
        }

        $post = Post::posts()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $tocService = new TocService;
        $tocData = $tocService->generate($post->content);
        $post->content = $tocData['content'];
        $post->toc = $tocData['toc'] ?? [];
        $post->toc_html = $tocData['html'] ?? '';

        $relatedPosts = Post::posts()
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        $recentPosts = Post::posts()
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(5)
            ->get();

        $categories = Taxonomy::categories()->where('status', 'published')->withCount('posts')->get();

        // Include products as requested "sau khi phần sản phẩm có"
        $products = Product::where('status', 'published')
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.posts.show', compact('post', 'relatedPosts', 'recentPosts', 'categories', 'products'));
    }
}
