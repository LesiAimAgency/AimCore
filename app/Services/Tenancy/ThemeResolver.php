<?php

declare(strict_types=1);

namespace App\Services\Tenancy;

use App\Models\Project;
use Illuminate\Support\Facades\View;

class ThemeResolver
{
    /**
     * Resolve and configure theme views and assets for project
     */
    public function resolve(Project $project): string
    {
        $theme = $project->tenant?->settings['theme']
            ?? $project->features['theme']
            ?? match (true) {
                $project->code === 'viettinmart-eco' || str_contains($project->code, 'viettinmart') => 'viettinmartdemo',
                str_contains($project->code, 'wkcomputer') => 'wkcomputerdemo',
                $project->code === 'ehenho' || str_contains(strtolower($project->code), 'henho') || str_contains(strtoupper($project->code), 'DA010') => 'ehenho',
                default => 'ehenho'
            };

        // Determine view path
        $themePath = resource_path("views/themes/{$theme}");
        if (! is_dir($themePath)) {
            // Check legacy storefront path
            $legacyPath = resource_path("views/frontend/themes/{$theme}");
            if (is_dir($legacyPath)) {
                $themePath = $legacyPath;
            }
        }

        if (is_dir($themePath)) {
            View::addNamespace('theme', $themePath);
            View::getFinder()->prependLocation($themePath);
        }

        view()->share('activeTheme', $theme);
        view()->share('themeAssetBase', asset("themes/{$theme}"));

        return $theme;
    }
}
