<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        // Get current project from request attributes (set by ProjectSubdomainMiddleware)
        $currentProject = request()->attributes->get('project');
        $theme = setting('theme');
        if (! $theme && $currentProject) {
            $projectId = $currentProject->id;
            $theme = Setting::where('project_id', $projectId)
                ->orWhere('tenant_id', $projectId)
                ->where('key', 'theme')
                ->value('value');
        }

        // Use theme-specific view if available
        if ($theme && view()->exists("frontend.themes.{$theme}.home")) {
            return view("frontend.themes.{$theme}.home");
        }

        if ($theme && view()->exists("frontend.themes.{$theme}.index")) {
            return view("frontend.themes.{$theme}.index");
        }

        // Check for storefront theme as default
        if (view()->exists('frontend.themes.storefront.home')) {
            return view('frontend.themes.storefront.home');
        }

        // Fallback to default home view
        return view('frontend.home');
    }
}
