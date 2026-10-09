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
                    'name' => 'badge_text',
                    'label' => 'Badge Subtitle',
                    'type' => 'text',
                    'default' => '[ WHAT WE DO ]',
                ],
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
                    'type' => 'ckeditor',
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
                    'default' => '#contact-modal',
                ],
                [
                    'name' => 'cards',
                    'label' => 'Danh sách thẻ dịch vụ (Repeatable Cards)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 10,
                    'fields' => [
                        [
                            'name' => 'card_id',
                            'label' => 'Card Slug / ID (find, connect, execute, grow)',
                            'type' => 'text',
                            'default' => 'find',
                        ],
                        [
                            'name' => 'badge',
                            'label' => 'Tên / Nhãn thẻ (FIND, CONNECT, ...)',
                            'type' => 'text',
                            'default' => 'FIND',
                        ],
                        [
                            'name' => 'title',
                            'label' => 'Tiêu đề đầy đủ',
                            'type' => 'text',
                            'default' => 'Market & Opportunity Development',
                        ],
                        [
                            'name' => 'description',
                            'label' => 'Mô tả chi tiết',
                            'type' => 'textarea',
                            'default' => 'Identify priority sectors, companies, decision-makers, distributors and commercial opportunities.',
                        ],
                        [
                            'name' => 'active_image',
                            'label' => 'Ảnh minh hoạ nổi bật',
                            'type' => 'image',
                            'default' => '/storage/media/project-DA005/what-we-do-magnifier.png',
                        ],
                        [
                            'name' => 'sand_image',
                            'label' => 'Ảnh nền gợn sóng cát (Sand pattern)',
                            'type' => 'image',
                            'default' => '/storage/media/project-DA005/what-we-do-sand-waves.jpg',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'badge_text' => '[ WHAT WE DO ]',
            'title_line1' => 'Flexible local support,',
            'title_line2' => 'built around what you need.',
            'description' => '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.',
            'cta_text' => 'Talk to us',
            'cta_link' => '#contact-modal',
            'cards' => [
                [
                    'card_id' => 'find',
                    'badge' => 'FIND',
                    'title' => 'Market & Opportunity Development',
                    'description' => 'Identify priority sectors, companies, decision-makers, distributors and commercial opportunities.',
                    'active_image' => '/storage/media/project-DA005/what-we-do-magnifier.png',
                    'sand_image' => '/storage/media/project-DA005/what-we-do-sand-waves.jpg',
                ],
                [
                    'card_id' => 'connect',
                    'badge' => 'CONNECT',
                    'title' => 'Strategic Partnerships & Networking',
                    'description' => 'Connect directly with local key stakeholders, industry associations, and verified commercial partners.',
                    'active_image' => '/storage/media/project-DA005/what-we-do-chain.png',
                    'sand_image' => '/storage/media/project-DA005/what-we-do-sand-waves.jpg',
                ],
                [
                    'card_id' => 'execute',
                    'badge' => 'EXECUTE',
                    'title' => 'Market Entry & Operational Setup',
                    'description' => 'End-to-end execution of operational roadmaps, pilot testing, and localized compliance support.',
                    'active_image' => '/storage/media/project-DA005/what-we-do-gears.png',
                    'sand_image' => '/storage/media/project-DA005/what-we-do-sand-waves.jpg',
                ],
                [
                    'card_id' => 'grow',
                    'badge' => 'GROW',
                    'title' => 'Scale & Long-term Expansion',
                    'description' => 'Accelerate revenue pipelines, expand regional presence, and build sustainable local capabilities.',
                    'active_image' => '/storage/media/project-DA005/what-we-do-arrow.png',
                    'sand_image' => '/storage/media/project-DA005/what-we-do-sand-waves.jpg',
                ],
            ],
        ], $this->settings);

        return view('widgets.inbetween_v2.what_we_do', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
