<?php

declare(strict_types=1);

namespace App\Core\Theme;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class ThemeManager
{
    protected static ?self $instance = null;

    /**
     * @var array<string, ThemeManifest>
     */
    protected array $themes = [];

    protected ?string $activeTheme = null;

    protected bool $discovered = false;

    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new self;
        }

        return static::$instance;
    }

    public function discover(): array
    {
        if ($this->discovered) {
            return $this->themes;
        }

        $searchPaths = [
            resource_path('views/themes'),
            resource_path('views/frontend/themes'),
        ];

        foreach ($searchPaths as $basePath) {
            if (! File::isDirectory($basePath)) {
                continue;
            }

            foreach (File::directories($basePath) as $dir) {
                $slug = basename($dir);
                $manifestFile = $dir.'/theme.json';

                if (File::exists($manifestFile)) {
                    $manifest = ThemeManifest::load($manifestFile);
                    if ($manifest && $manifest->isValid()) {
                        $this->themes[$slug] = $manifest;

                        continue;
                    }
                }

                // Only create default virtual manifest if not already discovered with valid manifest
                if (! isset($this->themes[$slug]) || ! $this->themes[$slug]->isValid()) {
                    $this->themes[$slug] = new ThemeManifest(
                        $manifestFile // path even if absent
                    );
                }
            }
        }

        $this->discovered = true;

        return $this->themes;
    }

    public function getAllThemes(): array
    {
        return $this->discover();
    }

    /**
     * @return array<string>
     */
    public function discoverThemes(): array
    {
        return array_keys($this->discover());
    }

    public function hasTheme(string $theme): bool
    {
        $this->discover();

        return isset($this->themes[$theme]);
    }

    public function getManifest(string $theme): ?ThemeManifest
    {
        $this->discover();

        return $this->themes[$theme] ?? null;
    }

    /**
     * Resolve active theme for the request / project
     */
    public function resolveActiveTheme(?Project $project = null): string
    {
        if ($project === null && $this->activeTheme) {
            return $this->activeTheme;
        }

        $project = $project ?? (function_exists('current_project') ? current_project() : null);

        $theme = null;
        if ($project) {
            $features = is_array($project->features) ? $project->features : (is_string($project->features) ? json_decode($project->features, true) : []);
            $code = strtolower($project->code ?? '');
            $name = strtolower($project->name ?? '');

            // 1. Explicit project-level feature theme
            $theme = ($features['theme'] ?? null)
                ?? $project->theme
                ?? null;

            // 2. Specific Project Code / Name matching
            if (! $theme) {
                $theme = match (true) {
                    str_contains($code, 'da005') || str_contains($code, 'inbetween_v2') || str_contains($code, 'inbetween-v2') || str_contains($name, 'inbetween') => 'inbetween_v2',
                    str_contains($code, 'da010') || str_contains($code, 'ehenho') || str_contains($name, 'ehenho') || str_contains($name, 'hẹn hò') => 'ehenho',
                    str_contains($code, 'da009') || str_contains($code, 'wkcomputer') || str_contains($name, 'wkcomputer') => 'wkcomputerdemo',
                    str_contains($code, 'da008') || str_contains($code, 'viettinmart') || str_contains($name, 'viettinmart') => 'viettinmartdemo',
                    str_contains($code, 'inbetween') => 'inbetween',
                    default => null
                };
            }

            // 3. Tenant settings fallback (only if project has no theme set)
            if (! $theme && ! empty($project->tenant?->settings['theme'])) {
                $theme = $project->tenant->settings['theme'];
            }

            // 4. Discover themes dynamically from directory matching code
            if (! $theme) {
                $discovered = $this->discoverThemes();
                // Sort by length descending to match longest specific themes first (e.g. inbetween_v2 before inbetween)
                usort($discovered, fn ($a, $b) => strlen($b) <=> strlen($a));
                foreach ($discovered as $available) {
                    if (str_contains($code, strtolower($available))) {
                        $theme = $available;
                        break;
                    }
                }
            }

            // 5. Fallback
            if (! $theme) {
                $theme = 'inbetween_v2';
            }
        }

        // URI segment fallback if project is not resolved yet
        if (! $theme) {
            $firstSegment = strtolower(request()->segment(1) ?? '');
            if ($firstSegment && $this->hasTheme($firstSegment)) {
                $theme = $firstSegment;
            } else {
                $theme = match (true) {
                    str_contains($firstSegment, 'inbetween_v2') || str_contains($firstSegment, 'inbetween-v2') => 'inbetween_v2',
                    str_contains($firstSegment, 'inbetween') || str_contains($firstSegment, 'inbetwen') => 'inbetween',
                    str_contains($firstSegment, 'wkcomputer') => 'wkcomputerdemo',
                    str_contains($firstSegment, 'viettinmart') => 'viettinmartdemo',
                    str_contains($firstSegment, 'ehenho') || str_contains($firstSegment, 'da010') => 'ehenho',
                    str_contains($firstSegment, 'storefront') => 'storefront',
                    str_contains($firstSegment, 'victorious') => 'victorious',
                    default => 'ehenho'
                };
            }
        }

        $this->activeTheme = $theme;
        $this->registerThemeViews($theme);

        return $theme;
    }

    public function registerThemeViews(string $theme): void
    {
        // 1. Direct path: resources/views/themes/{theme}
        $primaryPath = resource_path("views/themes/{$theme}");
        $legacyPath = resource_path("views/frontend/themes/{$theme}");

        $themePath = File::isDirectory($primaryPath) ? $primaryPath : (File::isDirectory($legacyPath) ? $legacyPath : null);

        if ($themePath) {
            View::addNamespace('theme', $themePath);
            View::getFinder()->prependLocation($themePath);
        }

        View::share('activeTheme', $theme);
        try {
            $themeAssetBase = asset("themes/{$theme}");
        } catch (\Throwable $e) {
            $themeAssetBase = "/themes/{$theme}";
        }
        View::share('themeAssetBase', $themeAssetBase);
    }

    public function getActiveTheme(): string
    {
        return $this->activeTheme ?? $this->resolveActiveTheme();
    }

    public function setActiveTheme(string $theme): self
    {
        $this->activeTheme = $theme;
        $this->registerThemeViews($theme);

        return $this;
    }

    public function clearCache(): void
    {
        $this->discovered = false;
        $this->themes = [];
        $this->activeTheme = null;
    }

    /**
     * Get default setting fallback from active theme manifest
     */
    public function getDefaultSetting(string $key, mixed $fallback = null): mixed
    {
        $theme = $this->getActiveTheme();
        $manifest = $this->getManifest($theme);
        if ($manifest) {
            $defaults = $manifest->getDefaultSettings();
            if (array_key_exists($key, $defaults)) {
                return $defaults[$key];
            }
            if ($key === 'site_title' && array_key_exists('site_name', $defaults)) {
                return $defaults['site_name'];
            }
            if ($key === 'site_name' && array_key_exists('site_title', $defaults)) {
                return $defaults['site_title'];
            }
        }

        return $fallback;
    }

    /**
     * Get default menus from active theme manifest
     */
    public function getDefaultMenus(): array
    {
        $theme = $this->getActiveTheme();
        $manifest = $this->getManifest($theme);

        return $manifest ? $manifest->getMenus() : [];
    }
}
