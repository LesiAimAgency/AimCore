<?php

declare(strict_types=1);

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;

class InbetweenThemeWidget extends BaseWidget
{
    protected string $type = 'inbetween_theme';

    protected string $category = 'theme';

    public function getMetadata(): array
    {
        return [
            'name' => 'Inbetween Master Full Website Widget',
            'type' => $this->type,
            'category' => $this->category,
            'description' => 'Triển khai toàn bộ website INBETWEEN hoàn chỉnh (8 Sections + Header + Drawer) trong 1 widget duy nhất.',
            'version' => '1.0.0',
            'author' => 'VGT Team',
            'settings' => [
                'cacheable' => true,
                'cache_duration' => 3600,
            ],
            'fields' => [
                'site_name' => [
                    'type' => 'text',
                    'label' => 'Tên Website / Thương hiệu',
                    'default' => 'INBETWEEN',
                ],
                'site_tagline' => [
                    'type' => 'text',
                    'label' => 'Khẩu hiệu (Tagline)',
                    'default' => 'Cross-border Community & Platform',
                ],
                'show_hero' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Hero Section',
                    'default' => true,
                ],
                'show_collage' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Community Wall Collage',
                    'default' => true,
                ],
                'show_statement' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Community Statement (4 Pillars)',
                    'default' => true,
                ],
                'show_values' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Core Values (Venn Circles)',
                    'default' => true,
                ],
                'show_founder' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Founder Section',
                    'default' => true,
                ],
                'show_events' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Upcoming Events',
                    'default' => true,
                ],
                'show_stories' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Media Stories',
                    'default' => true,
                ],
                'show_packages' => [
                    'type' => 'boolean',
                    'label' => 'Hiển thị Packages / Join Community',
                    'default' => true,
                ],
            ],
        ];
    }

    public function render(): string
    {
        $viewPath = view()->exists('widgets.inbetween.theme')
            ? 'widgets.inbetween.theme'
            : (view()->exists('themes.inbetween.pages.home') ? 'themes.inbetween.pages.home' : 'frontend.themes.inbetween.home');

        return view($viewPath, [
            'settings' => $this->settings,
            'variant' => $this->variant,
        ])->render();
    }
}
