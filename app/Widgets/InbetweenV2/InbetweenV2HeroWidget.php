<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2HeroWidget extends BaseWidget
{
    public static string $label = 'Hero Section';

    public static string $description = 'Hero banner chính với preloader, glowing hands và intro headline animation';

    public static string $icon = 'hero';

    public static function getConfig(): array
    {
        return [
            'name' => 'Hero Section',
            'description' => 'Hero banner chính với preloader, glowing hands và intro headline animation',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>',
            'fields' => [
                [
                    'name' => 'logo_white',
                    'label' => 'Logo White (Chế độ nền tối)',
                    'type' => 'image',
                    'default' => 'themes/inbetween_v2/images/Logo-white.svg',
                ],
                [
                    'name' => 'logo_dark',
                    'label' => 'Logo Dark (Chế độ nền sáng)',
                    'type' => 'image',
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
                [
                    'name' => 'intro_subtitle',
                    'label' => 'Intro Subtitle',
                    'type' => 'text',
                    'default' => 'Your business is',
                ],
                [
                    'name' => 'intro_title',
                    'label' => 'Intro Title Base',
                    'type' => 'text',
                    'default' => 'ENTERING VIETNAM?',
                ],
                [
                    'name' => 'floating_words',
                    'label' => 'Intro Floating Words (Các cụm từ bay lặp lại)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 15,
                    'fields' => [
                        [
                            'name' => 'text',
                            'label' => 'Cụm từ hiển thị (VD: [ Find Customers ])',
                            'type' => 'text',
                            'default' => 'Business Development',
                        ],
                    ],
                ],
                [
                    'name' => 'wecanhelp_text',
                    'label' => 'We Can Help! Headline',
                    'type' => 'text',
                    'default' => 'WE CAN HELP!',
                ],
                [
                    'name' => 'headline_text',
                    'label' => 'Hero Stage Headline Text',
                    'type' => 'text',
                    'default' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
                ],
                [
                    'name' => 'services',
                    'label' => 'Danh sách dịch vụ (Services List)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 10,
                    'fields' => [
                        [
                            'name' => 'title',
                            'label' => 'Tên dịch vụ (VD: Sales & BD)',
                            'type' => 'text',
                            'default' => 'Sales & BD',
                        ],
                    ],
                ],
                [
                    'name' => 'description',
                    'label' => 'Description (HTML allowed)',
                    'type' => 'textarea',
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
            'intro_subtitle' => 'Your business is',
            'intro_title' => 'ENTERING VIETNAM?',
            'floating_words' => [
                ['text' => '[ Find Customers ]'],
                ['text' => 'Find Suppliers'],
                ['text' => 'Business Development'],
                ['text' => 'Build Partnerships'],
                ['text' => 'Market Research'],
                ['text' => 'Coordinate Meetings'],
                ['text' => 'Get Things Done Locally'],
                ['text' => 'Find Talents'],
                ['text' => 'Market Research'],
                ['text' => 'Build Relationships'],
            ],
            'wecanhelp_text' => 'WE CAN HELP!',
            'headline_text' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
            'services' => [
                ['title' => 'Sales & BD'],
                ['title' => 'Market Validation'],
                ['title' => 'Market Entry Execution'],
                ['title' => 'Local Business Support'],
            ],
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
