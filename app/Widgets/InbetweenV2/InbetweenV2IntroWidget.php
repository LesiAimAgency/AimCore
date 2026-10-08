<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2IntroWidget extends BaseWidget
{
    public static string $label = 'Intro Section';

    public static string $description = 'Intro màn hình mở đầu với preloader, câu hỏi thương hiệu và 10 cụm từ trôi dạt (floating words)';

    public static string $icon = 'sparkles';

    public static function getConfig(): array
    {
        return [
            'name' => 'Intro Section',
            'description' => 'Intro màn hình mở đầu với preloader, câu hỏi thương hiệu và 10 cụm từ trôi dạt (floating words)',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" /></svg>',
            'fields' => [
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
                    'label' => 'Intro Floating Words (Các cụm từ trôi dạt)',
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
                    'name' => 'logo_white',
                    'label' => 'Header Logo White',
                    'type' => 'text',
                    'default' => 'themes/inbetween_v2/images/Logo-white.svg',
                ],
                [
                    'name' => 'logo_dark',
                    'label' => 'Header Logo Dark',
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
        ], $this->settings);

        return view('widgets.inbetween_v2.intro', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
