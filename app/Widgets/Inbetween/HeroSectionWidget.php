<?php

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;

class HeroSectionWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Hero Section',
            'description' => 'Hiển thị block Hero lớn ở đầu trang Inbetween',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'primary_color',
                    'label' => 'Màu chủ đạo (Primary Color)',
                    'type' => 'color',
                    'default' => '#EC460B'
                ],
                [
                    'name' => 'hero_logo',
                    'label' => 'Hero Logo',
                    'type' => 'image',
                    'default' => ''
                ],
                [
                    'name' => 'hero_subtitle',
                    'label' => 'Hero Subtitle (Dùng | để ngắt dòng)',
                    'type' => 'textarea',
                    'default' => "Cross-border community, media & connection platform|for|Professionals, Founders, Creatives & Organizations"
                ]
            ]
        ];
    }

    public function render(): string
    {
        $settings = $this->settings;
        
        // Cung cấp các giá trị mặc định nếu rỗng
        if (empty($settings['hero_logo'])) {
            $settings['hero_logo'] = asset('themes/inbetween/assets/logo.svg');
        }
        if (empty($settings['primary_color'])) {
            $settings['primary_color'] = '#EC460B';
        }
        if (empty($settings['hero_subtitle'])) {
            $settings['hero_subtitle'] = "Cross-border community, media & connection platform|for|Professionals, Founders, Creatives & Organizations";
        }

        return view('widgets.inbetween.hero_section', ['widget' => $this, 'settings' => $settings])->render();
    }
}
