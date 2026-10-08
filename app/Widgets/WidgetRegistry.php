<?php

namespace App\Widgets;

use App\Contracts\WidgetRegistryInterface;
use App\Models\WidgetTemplate;
use App\Services\DynamicWidgetRenderer;
use App\Widgets\Ehenho\EhenhoHeroSliderWidget;
use App\Widgets\Groups\BannerWidget;
use App\Widgets\Groups\BlogWidget;
use App\Widgets\Groups\CategoryGridWidget;
use App\Widgets\Groups\FeatureWidget;
use App\Widgets\Groups\FooterWidget;
use App\Widgets\Groups\HeaderWidget;
use App\Widgets\Groups\InstagramWidget;
use App\Widgets\Groups\ProductWidget;
use App\Widgets\Groups\SliderWidget;
use App\Widgets\InbetweenV2\InbetweenV2BusinessWidget;
use App\Widgets\InbetweenV2\InbetweenV2FooterWidget;
use App\Widgets\InbetweenV2\InbetweenV2FounderWidget;
use App\Widgets\InbetweenV2\InbetweenV2HeroWidget;
use App\Widgets\InbetweenV2\InbetweenV2IntroWidget;
use App\Widgets\InbetweenV2\InbetweenV2OurClientsWidget;
use App\Widgets\InbetweenV2\InbetweenV2WhatWeDoWidget;
use App\Widgets\InbetweenV2\InbetweenV2WhereWeFocusWidget;
use App\Widgets\Viettinmart\ViettinmartDealFlashWidget;
use App\Widgets\Viettinmart\ViettinmartFeatureIconsWidget;
use App\Widgets\Viettinmart\ViettinmartFooterColumnWidget;
// Viettinmart Widgets
use App\Widgets\Viettinmart\ViettinmartFormWidget;
use App\Widgets\Viettinmart\ViettinmartHeroSliderWidget;
use App\Widgets\Viettinmart\ViettinmartPostsLatestWidget;
use App\Widgets\Viettinmart\ViettinmartProductFeaturedWidget;
use App\Widgets\Viettinmart\ViettinmartProductTabsWidget;
use App\Widgets\Viettinmart\ViettinmartPromoBannersWidget;
use App\Widgets\Viettinmart\ViettinmartTopTrendingWidget;
use App\Widgets\Wkcomputer\WkDealFlashWidget;
use App\Widgets\Wkcomputer\WkFooterColumnWidget;
use App\Widgets\Wkcomputer\WkHeroSliderWidget;
use App\Widgets\Wkcomputer\WkPostsLatestWidget;
use App\Widgets\Wkcomputer\WkProductSectionWidget;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WidgetRegistry implements WidgetRegistryInterface
{
    /**
     * @var array<string, class-string<BaseWidget>>
     */
    protected static array $widgets = [
        'HeaderWidget' => HeaderWidget::class,
        'FooterWidget' => FooterWidget::class,
        'SliderWidget' => SliderWidget::class,
        'BannerWidget' => BannerWidget::class,
        'ProductWidget' => ProductWidget::class,
        'CategoryGridWidget' => CategoryGridWidget::class,
        'BlogWidget' => BlogWidget::class,
        'InstagramWidget' => InstagramWidget::class,
        'FeatureWidget' => FeatureWidget::class,

        // eHenho Widgets
        'ehenho_hero_slider' => EhenhoHeroSliderWidget::class,
        'ehenho_slider' => EhenhoHeroSliderWidget::class,

        // Inbetween V1 Widgets
        'inbetween_theme' => InbetweenThemeWidget::class,
        'inbetween_hero_section' => HeroSectionWidget::class,
        'inbetween_community_collage' => CommunityCollageWidget::class,
        'inbetween_community_statement' => CommunityStatementWidget::class,
        'inbetween_core_values' => CoreValuesWidget::class,
        'inbetween_founder_section' => FounderSectionWidget::class,
        'inbetween_upcoming_events' => UpcomingEventsWidget::class,
        'inbetween_media_stories' => MediaStoriesWidget::class,
        'inbetween_packages' => PackagesWidget::class,

        // Inbetween V2 Widgets (1 Section = 1 Widget)
        'inbetween_v2_intro' => InbetweenV2IntroWidget::class,
        'inbetween_v2_hero' => InbetweenV2HeroWidget::class,
        'inbetween_v2_what_we_do' => InbetweenV2WhatWeDoWidget::class,
        'inbetween_v2_where_we_focus' => InbetweenV2WhereWeFocusWidget::class,
        'inbetween_v2_founder' => InbetweenV2FounderWidget::class,
        'inbetween_v2_our_clients' => InbetweenV2OurClientsWidget::class,
        'inbetween_v2_business' => InbetweenV2BusinessWidget::class,
        'inbetween_v2_footer' => InbetweenV2FooterWidget::class,

        // Viettinmart Widgets
        'vtm_hero_slider' => ViettinmartHeroSliderWidget::class,
        'vtm_feature_icons' => ViettinmartFeatureIconsWidget::class,
        'vtm_product_featured' => ViettinmartProductFeaturedWidget::class,
        'vtm_prod_featured' => ViettinmartProductFeaturedWidget::class,
        'vtm_deal_flash' => ViettinmartDealFlashWidget::class,
        'vtm_product_tabs' => ViettinmartProductTabsWidget::class,
        'vtm_prod_tabs' => ViettinmartProductTabsWidget::class,
        'vtm_promo_banners' => ViettinmartPromoBannersWidget::class,
        'vtm_top_trending' => ViettinmartTopTrendingWidget::class,
        'vtm_posts_latest' => ViettinmartPostsLatestWidget::class,
        'vtm_form_widget' => ViettinmartFormWidget::class,
        'vtm_footer_column' => ViettinmartFooterColumnWidget::class,
        'footer_column' => WkFooterColumnWidget::class,

        // WKComputer Widgets
        'wk_hero_slider' => WkHeroSliderWidget::class,
        'hero_slider' => WkHeroSliderWidget::class,
        'product_section' => WkProductSectionWidget::class,
        'wk_product_featured' => WkProductSectionWidget::class,
        'wk_deal_flash' => WkDealFlashWidget::class,
        'deal_flash' => WkDealFlashWidget::class,
        'wk_product_tabs' => WkProductSectionWidget::class,
        'wk_promo_banners' => HTMLWidget::class,
        'wk_posts_latest' => WkPostsLatestWidget::class,
        'posts_latest' => WkPostsLatestWidget::class,
        'wk_footer_column' => WkFooterColumnWidget::class,
        'html_custom' => HTMLWidget::class,
        'menu' => WkFooterColumnWidget::class,
    ];

    protected static array $discoveredWidgets = [];

    protected static bool $discoveryComplete = false;

    /**
     * Automatically discover widgets in the widgets directory
     */
    public static function discover(): array
    {
        if (self::$discoveryComplete) {
            return self::$discoveredWidgets;
        }

        // Skip cache in development mode
        if (config('app.debug')) {
            self::$discoveredWidgets = self::performDiscovery();
        } else {
            try {
                $cacheKey = 'widget_discovery_'.md5(app_path('Widgets'));
                self::$discoveredWidgets = Cache::remember($cacheKey, 3600, function () {
                    return self::performDiscovery();
                });
            } catch (\Throwable $e) {
                self::$discoveredWidgets = self::performDiscovery();
            }
        }

        self::$discoveryComplete = true;

        return self::$discoveredWidgets;
    }

    /**
     * Perform the actual widget discovery
     */
    protected static function performDiscovery(): array
    {
        $discovered = [];
        $widgetsPath = app_path('Widgets');

        if (! File::isDirectory($widgetsPath)) {
            return $discovered;
        }

        $directories = File::directories($widgetsPath);

        foreach ($directories as $categoryDir) {
            $categoryName = basename($categoryDir);

            // Skip base files
            if (in_array($categoryName, ['BaseWidget.php', 'WidgetRegistry.php'])) {
                continue;
            }

            // 1. Discover widgets organized as subdirectories
            $widgetDirs = File::directories($categoryDir);
            foreach ($widgetDirs as $widgetDir) {
                $widgetName = basename($widgetDir);
                $widgetClass = self::buildWidgetClassName($categoryName, $widgetName);

                if (! class_exists($widgetClass) || ! is_subclass_of($widgetClass, BaseWidget::class)) {
                    continue;
                }

                $widgetType = self::generateWidgetType($categoryName, $widgetName);

                try {
                    $metadata = self::loadWidgetMetadata($widgetClass);
                    $discovered[$widgetType] = [
                        'class' => $widgetClass,
                        'type' => $widgetType,
                        'category' => $categoryName,
                        'name' => $widgetName,
                        'metadata' => $metadata,
                    ];
                } catch (\Throwable $e) {
                    continue;
                }
            }

            // 2. Discover *.php widget files directly in category folder (e.g. app/Widgets/{Theme}/{Name}Widget.php)
            $phpFiles = File::files($categoryDir);
            foreach ($phpFiles as $file) {
                if ($file->getExtension() !== 'php') {
                    continue;
                }
                $filename = $file->getFilenameWithoutExtension();
                $widgetClass = "App\\Widgets\\{$categoryName}\\{$filename}";

                if (! class_exists($widgetClass) || ! is_subclass_of($widgetClass, BaseWidget::class)) {
                    continue;
                }

                $rawName = Str::replaceLast('Widget', '', $filename);
                $widgetType = Str::startsWith($rawName, $categoryName)
                    ? Str::snake($rawName)
                    : Str::snake(Str::camel($categoryName.'_'.$rawName));

                try {
                    $metadata = method_exists($widgetClass, 'getConfig')
                        ? $widgetClass::getConfig()
                        : (File::exists($widgetClass::getMetadataPath()) ? self::loadWidgetMetadata($widgetClass) : ['name' => $rawName]);
                } catch (\Throwable $e) {
                    $metadata = ['name' => $rawName];
                }

                $discovered[$widgetType] = [
                    'class' => $widgetClass,
                    'type' => $widgetType,
                    'category' => $categoryName,
                    'name' => $filename,
                    'metadata' => $metadata,
                ];

                // Also register direct snake case of class name as type alias if different
                $shortType = Str::snake($rawName);
                if ($shortType !== $widgetType && ! isset($discovered[$shortType])) {
                    $discovered[$shortType] = $discovered[$widgetType];
                }
            }
        }

        return $discovered;
    }

    /**
     * Build widget class name from category and widget name
     */
    protected static function buildWidgetClassName(string $category, string $widgetName): string
    {
        return "App\\Widgets\\{$category}\\{$widgetName}Widget";
    }

    /**
     * Generate widget type from category and name
     */
    protected static function generateWidgetType(string $category, string $widgetName): string
    {
        return Str::snake(Str::camel($category.'_'.$widgetName));
    }

    /**
     * Load widget metadata
     */
    protected static function loadWidgetMetadata(string $widgetClass): array
    {
        $metadataPath = $widgetClass::getMetadataPath();

        if (File::exists($metadataPath)) {
            $content = File::get($metadataPath);
            $metadata = json_decode($content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \InvalidArgumentException('Invalid JSON in widget metadata: '.json_last_error_msg());
            }

            return $metadata;
        }

        // Fallback to getConfig method
        if (method_exists($widgetClass, 'getConfig')) {
            return $widgetClass::getConfig();
        }

        throw new \RuntimeException('Widget metadata not found');
    }

    /**
     * Get all widgets (manual + discovered)
     */
    public static function all(): array
    {
        $discovered = self::discover();
        $allWidgets = [];

        // Add manually registered widgets
        foreach (self::$widgets as $type => $class) {
            try {
                $metadata = self::loadWidgetMetadata($class);
                $allWidgets[$type] = [
                    'type' => $type,
                    'class' => $class,
                    'metadata' => $metadata,
                ];
            } catch (\Exception $e) {
                \Log::warning("Error loading widget {$class}: ".$e->getMessage());
            }
        }

        // Add discovered widgets (they override manual ones if same type)
        foreach ($discovered as $type => $widget) {
            $allWidgets[$type] = $widget;
        }

        // Add custom templates from database
        $customTemplates = self::getCustomTemplates();
        foreach ($customTemplates as $template) {
            $allWidgets[$template['type']] = [
                'type' => $template['type'],
                'class' => null,
                'metadata' => [
                    'name' => $template['name'],
                    'description' => $template['description'] ?? '',
                    'category' => $template['category'] ?? 'custom',
                    'icon' => $template['icon'] ?? 'cube',
                    'fields' => $template['config_schema']['fields'] ?? [],
                    'is_custom' => true,
                    'template_id' => $template['id'],
                ],
            ];
        }

        return array_values($allWidgets);
    }

    /**
     * Get widgets organized by category
     */
    public static function getByCategory(): array
    {
        $widgets = self::all();
        $categories = [];

        foreach ($widgets as $widget) {
            $category = $widget['metadata']['category'] ?? 'general';
            $categories[$category][] = $widget;
        }

        // Add custom templates from database
        $customTemplates = self::getCustomTemplates();
        foreach ($customTemplates as $template) {
            $category = $template['category'] ?? 'custom';
            $categories[$category][] = [
                'type' => $template['type'],
                'class' => null, // No class for custom templates
                'metadata' => [
                    'name' => $template['name'],
                    'description' => $template['description'] ?? '',
                    'category' => $category,
                    'icon' => $template['icon'] ?? 'cube',
                    'fields' => $template['config_schema']['fields'] ?? [],
                    'is_custom' => true,
                    'template_id' => $template['id'],
                ],
            ];
        }

        return $categories;
    }

    /**
     * Get custom widget templates from database
     */
    public static function getCustomTemplates(): array
    {
        return [];
    }

    /**
     * Check if a widget type exists (including custom templates)
     */
    public static function exists(string $type): bool
    {
        return self::get($type) !== null;
    }

    /**
     * Check if a widget type is registered or exists (alias for exists)
     */
    public static function has(string $type): bool
    {
        return self::exists($type);
    }

    /**
     * Get widget configuration by type (including custom templates)
     */
    public static function getConfig(string $type): ?array
    {
        // First check code-based widgets
        $class = self::get($type);
        if ($class) {
            try {
                $metadata = self::loadWidgetMetadata($class);
                $metadata['type'] = $type;
                $metadata['class'] = $class;

                return $metadata;
            } catch (\Throwable $e) {
                return [
                    'name' => class_basename($class),
                    'type' => $type,
                    'class' => $class,
                    'category' => 'general',
                    'fields' => [],
                ];
            }
        }

        return null;
    }

    /**
     * Get widget class by type
     */
    public static function get(string $type): ?string
    {
        if ($type === 'footer_column') {
            $project = function_exists('current_project') ? current_project() : null;
            if ($project && ($project->code === 'viettinmart' || $project->code === 'viettinmart-eco' || $project->id === 10)) {
                return ViettinmartFooterColumnWidget::class;
            }
        }

        // Check manually registered first
        if (isset(self::$widgets[$type])) {
            return self::$widgets[$type];
        }

        // Support dynamic prefix aliasing between inbetween_ and vtm_
        if (str_starts_with($type, 'inbetween_')) {
            $vtm = 'vtm_'.substr($type, 10);
            if (isset(self::$widgets[$vtm])) {
                return self::$widgets[$vtm];
            }
        } elseif (str_starts_with($type, 'vtm_')) {
            $inbetween = 'inbetween_'.substr($type, 4);
            if (isset(self::$widgets[$inbetween])) {
                return self::$widgets[$inbetween];
            }
        }

        // Check discovered widgets
        $discovered = self::discover();
        if (isset($discovered[$type])) {
            return $discovered[$type]['class'];
        }

        return null;
    }

    /**
     * Render widget with settings and variant
     */
    public static function render(string $type, array $settings = [], string $variant = 'default'): string
    {
        $class = self::get($type);

        // If code-based widget exists
        if ($class) {
            try {
                $widget = new $class($settings, $variant);

                return $widget->css().$widget->render().$widget->js();
            } catch (\Exception $e) {
                \Log::error("Error rendering widget {$type}: ".$e->getMessage());

                return '<div class="widget-error">Widget rendering failed</div>';
            }
        }

        return '';
    }

    /**
     * Render a custom template widget
     */
    protected static function renderCustomTemplate(WidgetTemplate $template, array $settings): string
    {
        $fields = $template->config_schema['fields'] ?? [];

        // Check if custom view exists
        $customView = 'widgets.custom.'.$template->type;
        if (view()->exists($customView)) {
            return view($customView, [
                'settings' => $settings,
                'fields' => $fields,
                'template' => $template,
            ])->render();
        }

        // Fallback: render using DynamicWidgetRenderer
        $renderer = app(DynamicWidgetRenderer::class);

        return $renderer->renderCustomWidget($template, $settings);
    }

    /**
     * Register a widget manually
     */
    public static function register(string $type, string $class): void
    {
        if (! is_subclass_of($class, BaseWidget::class)) {
            throw new \InvalidArgumentException('Widget class must extend BaseWidget');
        }

        self::$widgets[$type] = $class;

        // Clear discovery cache to include new widget
        Cache::forget('widget_discovery_'.md5(app_path('Widgets')));
        self::$discoveryComplete = false;
    }

    /**
     * Get all widget types
     */
    public static function getTypes(): array
    {
        $widgets = self::all();

        return array_column($widgets, 'type');
    }

    /**
     * Get widget preview
     */
    public static function getPreview(string $type, array $settings = [], string $variant = 'default'): string
    {
        $class = self::get($type);
        if (! $class) {
            return '<div class="widget-error">Widget not found</div>';
        }

        try {
            $widget = new $class($settings, $variant);

            return $widget->getPreview();
        } catch (\Exception $e) {
            return '<div class="widget-error">Preview Error: '.htmlspecialchars($e->getMessage()).'</div>';
        }
    }

    /**
     * Clear discovery cache
     */
    public static function clearCache(): void
    {
        Cache::forget('widget_discovery_'.md5(app_path('Widgets')));
        self::$discoveryComplete = false;
        self::$discoveredWidgets = [];
    }

    /**
     * Validate widget namespace conflicts
     */
    public static function validateNamespaces(): array
    {
        $conflicts = [];
        $widgets = self::all();
        $types = [];

        foreach ($widgets as $widget) {
            $type = $widget['type'];
            if (isset($types[$type])) {
                $conflicts[] = [
                    'type' => $type,
                    'classes' => [$types[$type], $widget['class']],
                ];
            } else {
                $types[$type] = $widget['class'];
            }
        }

        return $conflicts;
    }
}
