<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Inbetween;

use App\Core\Theme\ThemeManager;
use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class InbetweenController extends Controller
{
    public function index(Request $request): View
    {
        $themeManager = app(ThemeManager::class);
        $themeManager->setActiveTheme('inbetween');

        $project = function_exists('current_project') ? current_project() : null;

        // View fallback
        $view = view()->exists('themes.inbetween.pages.home')
            ? 'themes.inbetween.pages.home'
            : (view()->exists('frontend.themes.inbetween.home') ? 'frontend.themes.inbetween.home' : 'widgets.inbetween.theme');

        return view($view, [
            'project' => $project,
            'manifest' => $themeManager->getManifest('inbetween'),
        ]);
    }

    public function contact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'social_link' => 'nullable|string|max:500',
            'message' => 'nullable|string',
        ]);

        try {
            if (Schema::hasTable('form_submissions')) {
                FormSubmission::create([
                    'form_name' => 'inbetween_contact_drawer',
                    'data' => $validated,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'project_id' => function_exists('current_project') ? current_project()?->id : null,
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('Inbetween contact form DB save skipped: '.$e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Cảm ơn bạn đã liên hệ! INBETWEEN sẽ phản hồi trong thời gian sớm nhất.',
        ]);
    }

    public function page(string $slug): View
    {
        $themeManager = app(ThemeManager::class);
        $themeManager->setActiveTheme('inbetween');

        $view = view()->exists("themes.inbetween.pages.{$slug}")
            ? "themes.inbetween.pages.{$slug}"
            : (view()->exists('themes.inbetween.pages.page') ? 'themes.inbetween.pages.page' : 'frontend.page');

        return view($view, [
            'slug' => $slug,
            'project' => function_exists('current_project') ? current_project() : null,
        ]);
    }
}
