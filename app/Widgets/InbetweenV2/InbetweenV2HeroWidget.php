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
                    'name' => 'headline_text',
                    'label' => 'Headline Text',
                    'type' => 'text',
                    'default' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
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
            'headline_text' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
            'intro_subtitle' => 'Your business is',
            'intro_title' => 'ENTERING VIETNAM?',
            'cta_text' => 'Talk to us',
            'cta_link' => '#inbetween-founder',
        ], $this->settings);

        return view('widgets.inbetween_v2.hero', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
