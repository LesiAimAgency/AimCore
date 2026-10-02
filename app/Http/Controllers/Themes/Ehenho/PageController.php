<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->whereIn('slug', ['gioi-thieu', 'about', 'about-us'])
            ->first();

        return view('themes.ehenho.pages.about', compact('page'));
    }

    public function terms(): View
    {
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->whereIn('slug', ['dieu-khoan-su-dung', 'terms', 'dieu-khoan'])
            ->first();

        return view('themes.ehenho.pages.terms', compact('page'));
    }

    public function privacy(): View
    {
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->whereIn('slug', ['chinh-sach-bao-mat', 'chinh-sach-rieng-tu', 'privacy'])
            ->first();

        return view('themes.ehenho.pages.privacy', compact('page'));
    }

    public function show(string $slug): View
    {
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('themes.ehenho.pages.about', compact('page'));
    }
}
