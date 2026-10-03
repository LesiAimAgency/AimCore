<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    private function resolveProjectId(): ?int
    {
        return app()->bound('current_project_id')
            ? (int) app('current_project_id')
            : (session('current_project_id') ?? Project::where('code', 'ehenho')->value('id') ?? 15);
    }

    public function about(): View
    {
        $projectId = $this->resolveProjectId();
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->where('project_id', $projectId)
            ->whereIn('slug', ['gioi-thieu', 'about', 'about-us'])
            ->first();

        return view('themes.ehenho.pages.about', compact('page'));
    }

    public function help(): View
    {
        $projectId = $this->resolveProjectId();
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->where('project_id', $projectId)
            ->whereIn('slug', ['tro-giup', 'huong-dan', 'help'])
            ->first();

        return view('themes.ehenho.pages.about', compact('page'));
    }

    public function terms(): View
    {
        $projectId = $this->resolveProjectId();
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->where('project_id', $projectId)
            ->whereIn('slug', ['dieu-khoan-su-dung', 'terms', 'dieu-khoan'])
            ->first();

        return view('themes.ehenho.pages.terms', compact('page'));
    }

    public function privacy(): View
    {
        $projectId = $this->resolveProjectId();
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->where('project_id', $projectId)
            ->whereIn('slug', ['chinh-sach-bao-mat', 'chinh-sach-rieng-tu', 'privacy'])
            ->first();

        return view('themes.ehenho.pages.privacy', compact('page'));
    }

    public function show(string $slug): View
    {
        $projectId = $this->resolveProjectId();
        $page = Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->where('project_id', $projectId)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('themes.ehenho.pages.about', compact('page'));
    }
}
