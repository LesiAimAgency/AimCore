<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\Post;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::posts()
            ->published()
            ->with(['author', 'taxonomies', 'translations'])
            ->latest('published_at');

        if ($request->filled('q')) {
            $searchQuery = sanitize_search_query($request->q);
            if ($searchQuery) {
                $query->where('title', 'like', '%'.$searchQuery.'%');
            }
        }

        $currentCategory = null;
        if ($request->filled('category')) {
            $categorySlug = sanitize_slug($request->category);
            $currentCategory = Taxonomy::where('taxonomy', 'category')
                ->where('slug', $categorySlug)
                ->first();

            if ($currentCategory) {
                $query->whereHas('taxonomies', function ($q) use ($currentCategory) {
                    $q->where('term_taxonomy_id', $currentCategory->id);
                });
            }
        }

        $currentTag = null;
        if ($request->filled('tag')) {
            $tagSlug = sanitize_slug($request->tag);
            $currentTag = Taxonomy::whereIn('taxonomy', ['post_tag', 'tag'])
                ->where('slug', $tagSlug)
                ->first();

            if ($currentTag) {
                $query->whereHas('taxonomies', function ($q) use ($currentTag) {
                    $q->where('term_taxonomy_id', $currentTag->id);
                });
            }
        }

        $posts = $query->paginate(8)->withQueryString();

        $recentPosts = Post::posts()
            ->published()
            ->withStandardRelations()
            ->latest('published_at')
            ->limit(5)
            ->get();

        $categories = Taxonomy::where('taxonomy', 'category')
            ->where('status', 'published')
            ->withCount(['posts' => function ($q) {
                $q->published()->where('post_type', 'post');
            }])
            ->orderBy('order')
            ->get();

        $popularTags = Taxonomy::whereIn('taxonomy', ['post_tag', 'tag'])
            ->where('status', 'published')
            ->withCount('posts')
            ->orderByDesc('posts_count')
            ->limit(15)
            ->get();

        return view('blog.index', compact(
            'posts',
            'recentPosts',
            'categories',
            'popularTags',
            'currentCategory',
            'currentTag'
        ));
    }

    public function show($projectCode, $slug = null)
    {
        if ($slug === null) {
            $slug = $projectCode;
        }

        // Sanitize slug để ngăn SQL injection
        $slug = sanitize_slug($slug);
        $currentLocale = App::getLocale();

        $post = Post::posts()
            ->where(function ($query) use ($slug, $currentLocale) {
                // Tìm trong slug gốc
                $query->where('slug', $slug)
                      // Hoặc tìm trong bản dịch slug
                    ->orWhereHas('translations', function ($q) use ($slug, $currentLocale) {
                        $q->where('field', 'slug')
                            ->where('locale', $currentLocale)
                            ->where('value', $slug);
                    });
            })
            ->where('status', 'published')
            ->with(['author', 'taxonomies', 'translations'])
            ->firstOrFail();

        $relatedPosts = Post::posts()
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->with('translations')
            ->latest('published_at')
            ->limit(3)
            ->get();

        $categories = Taxonomy::where('taxonomy', 'category')
            ->where('status', 'published')
            ->withCount(['posts' => function ($q) {
                $q->published()->where('post_type', 'post');
            }])
            ->orderBy('order')
            ->get();

        $popularTags = Taxonomy::whereIn('taxonomy', ['post_tag', 'tag'])
            ->where('status', 'published')
            ->limit(15)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts', 'categories', 'popularTags'));
    }
}
