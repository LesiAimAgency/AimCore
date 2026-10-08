<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2HeroWidget extends BaseWidget
{
    public static string $label = 'Hero Section';

    public static string $description = 'Hero banner chính với radiant touch hands, headline, danh sách dịch vụ và CTA';

    public static string $icon = 'hero';

    public static function getConfig(): array
    {
        return [
            'name' => 'Hero Section',
            'description' => 'Hero banner chính với radiant touch hands, headline, danh sách dịch vụ và CTA',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>',
            'fields' => [
                [
                    'name' => 'headline_text',
                    'label' => 'Hero Stage Headline Text',
                    'type' => 'text',
                    'default' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
                ],
                [
                    'name' => 'services',
                    'label' => 'Danh sách dịch vụ (nhập nhiều dịch vụ cách nhau bằng dấu phẩy)',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default' => 'Sales & BD, Market Validation, Market Entry Execution, Local Business Support',
                    'placeholder' => 'Ví dụ: Sales & BD, Market Validation',
                    'description' => 'Nhập các dịch vụ hiển thị tại Hero Stage, phân cách nhau bằng dấu phẩy (,)',
                ],
                [
                    'name' => 'description',
                    'label' => 'Description (HTML allowed)',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default' => 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.',
                ],
                [
                    'name' => 'cta_text',
                    'label' => 'CTA Button Text',
                    'type' => 'text',
                    'default' => 'Talk to us',
                ],
                [
                    'name' => 'cta_link',
                    'label' => 'CTA Button Link',
                    'type' => 'text',
                    'default' => '#inbetween-founder',
                ],
                [
                    'name' => 'logo_white',
                    'label' => 'Header Logo White (Fallback)',
                    'type' => 'text',
                    'default' => 'themes/inbetween_v2/images/Logo-white.svg',
                ],
                [
                    'name' => 'logo_dark',
                    'label' => 'Header Logo Dark (Fallback)',
                    'type' => 'text',
                    'default' => 'themes/inbetween_v2/images/Logo.svg',
                ],
                [
                    'name' => 'connect_text',
                    'label' => "Header Let's Connect Text",
                    'type' => 'text',
                    'default' => "LET'S CONNECT",
                ],
                [
                    'name' => 'connect_link',
                    'label' => "Header Let's Connect Link",
                    'type' => 'text',
                    'default' => '#contact-modal',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'logo_white' => 'themes/inbetween_v2/images/Logo-white.svg',
            'logo_dark' => 'themes/inbetween_v2/images/Logo.svg',
            'connect_text' => "LET'S CONNECT",
            'connect_link' => '#contact-modal',
            'headline_text' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
            'services' => 'Sales & BD, Market Validation, Market Entry Execution, Local Business Support',
            'description' => 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.',
            'cta_text' => 'Talk to us',
            'cta_link' => '#inbetween-founder',
        ], $this->settings);

        return view('widgets.inbetween_v2.hero', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
