<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class PageController extends Controller
{
    private function resolveProject(): ?Project
    {
        $projectId = app()->bound('current_project_id')
            ? (int) app('current_project_id')
            : (session('current_project_id') ?? null);

        if ($projectId) {
            $project = Project::find($projectId);
            if ($project) {
                return $project;
            }
        }

        return Project::where('code', 'ehenho')->first();
    }

    private function queryPage()
    {
        $project = $this->resolveProject();
        $projectId = $project?->id ?? 15;
        $tenantId = $project?->tenant_id ?? 7;

        return Post::withoutGlobalScopes()
            ->where('post_type', 'page')
            ->where(function ($q) use ($projectId, $tenantId) {
                $q->where('project_id', $projectId)
                    ->orWhere('tenant_id', $tenantId);
            });
    }

    public function about(): View
    {
        $page = $this->queryPage()
            ->where(function ($q) {
                $q->whereIn('slug', ['gioi-thieu', 'about', 'about-us'])
                    ->orWhere('template', 'about');
            })
            ->first();

        return view('themes.ehenho.pages.about', compact('page'));
    }

    public function help(): View
    {
        $page = $this->queryPage()
            ->where(function ($q) {
                $q->whereIn('slug', ['tro-giup', 'huong-dan', 'help'])
                    ->orWhere('template', 'help');
            })
            ->first();

        return view('themes.ehenho.pages.about', compact('page'));
    }

    public function terms(): View
    {
        $page = $this->queryPage()
            ->where(function ($q) {
                $q->whereIn('slug', ['dieu-khoan-su-dung', 'terms', 'dieu-khoan'])
                    ->orWhere('template', 'terms');
            })
            ->first();

        return view('themes.ehenho.pages.terms', compact('page'));
    }

    public function privacy(): View
    {
        $page = $this->queryPage()
            ->where(function ($q) {
                $q->whereIn('slug', ['chinh-sach-bao-mat', 'chinh-sach-rieng-tu', 'privacy'])
                    ->orWhere('template', 'privacy');
            })
            ->first();

        return view('themes.ehenho.pages.privacy', compact('page'));
    }

    public function show(string $slug): View
    {
        $page = $this->queryPage()
            ->where('slug', $slug)
            ->first();

        if (! $page) {
            $page = $this->queryPage()
                ->whereIn('slug', [
                    $slug,
                    Str::slug($slug),
                ])
                ->firstOrFail();
        }

        $viewName = match ($page->template) {
            'terms' => 'themes.ehenho.pages.terms',
            'privacy' => 'themes.ehenho.pages.privacy',
            default => 'themes.ehenho.pages.about',
        };

        return view($viewName, compact('page'));
    }
}
