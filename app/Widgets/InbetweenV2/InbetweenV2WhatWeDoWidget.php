<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2WhatWeDoWidget extends BaseWidget
{
    public static string $label = 'What We Do Section';

    public static string $description = 'Section What We Do với 4 accordion cards: FIND, CONNECT, EXECUTE, GROW';

    public static string $icon = 'view-boards';

    public static function getConfig(): array
    {
        return [
            'name' => 'What We Do Section',
            'description' => 'Section What We Do với 4 accordion cards: FIND, CONNECT, EXECUTE, GROW',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" /></svg>',
            'fields' => [
                [
                    'name' => 'title_line1',
                    'label' => 'Title Line 1',
                    'type' => 'text',
                    'default' => 'Flexible local support,',
                ],
                [
                    'name' => 'title_line2',
                    'label' => 'Title Line 2',
                    'type' => 'text',
                    'default' => 'built around what you need.',
                ],
                [
                    'name' => 'description',
                    'label' => 'Description (HTML allowed)',
                    'type' => 'textarea',
                    'default' => '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.',
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
            'title_line1' => 'Flexible local support,',
            'title_line2' => 'built around what you need.',
            'description' => '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.',
            'cta_text' => 'Talk to us',
            'cta_link' => '#inbetween-founder',
        ], $this->settings);

        return view('widgets.inbetween_v2.what_we_do', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
