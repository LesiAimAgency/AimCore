<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkPost;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = WkPost::where('status', 'published')->latest();

        if ($request->filled('q')) {
            $q = trim(strip_tags((string) $request->q));
            if ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%{$q}%")
                        ->orWhere('content', 'like', "%{$q}%");
                });
            }
        }

        $posts = $query->paginate(8);
        $recentPosts = WkPost::where('status', 'published')->latest()->limit(5)->get();

        return view('blog.index', compact('posts', 'recentPosts'));
    }

    public function show(string $slug)
    {
        $post = WkPost::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = WkPost::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->latest()
            ->limit(3)
            ->get();

        $relatedProducts = WkProduct::active()->latest()->limit(4)->get();

        return view('blog.show', compact('post', 'relatedPosts', 'relatedProducts'));
    }
}
