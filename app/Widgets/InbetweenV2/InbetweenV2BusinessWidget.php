<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2BusinessWidget extends BaseWidget
{
    public static string $label = 'Beyond Business Section';

    public static string $description = 'Section Beyond Business với 5-card 3D ellipse carousel, draggable slider và pull-up/down stage';

    public static string $icon = 'sparkles';

    public static function getConfig(): array
    {
        return [
            'name' => 'Beyond Business Section',
            'description' => 'Section Beyond Business với 5-card 3D ellipse carousel, draggable slider và pull-up/down stage',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" /></svg>',
            'fields' => [
                [
                    'name' => 'badge_title',
                    'label' => 'Badge Subtitle Ở Giữa',
                    'type' => 'text',
                    'default' => '[ BEYOND BUSINESS ]',
                ],
                [
                    'name' => 'media_title',
                    'label' => 'Media Badge Title',
                    'type' => 'text',
                    'default' => 'MEDIA',
                ],
                [
                    'name' => 'media_desc',
                    'label' => 'Media Badge Description',
                    'type' => 'textarea',
                    'default' => 'Business, culture, society and perspectives from across Asia.',
                ],
                [
                    'name' => 'connections_title',
                    'label' => 'Connections Badge Title',
                    'type' => 'text',
                    'default' => 'CONNECTIONS',
                ],
                [
                    'name' => 'connections_desc',
                    'label' => 'Connections Badge Description',
                    'type' => 'textarea',
                    'default' => 'Business networking, industry gatherings, workshops and cross-border connections — bringing people and ideas into the same room.',
                ],
                [
                    'name' => 'heading_prefix',
                    'label' => 'Heading Prefix (Cam)',
                    'type' => 'text',
                    'default' => 'Building ',
                ],
                [
                    'name' => 'heading_suffix',
                    'label' => 'Heading Suffix (Đen)',
                    'type' => 'text',
                    'default' => 'more than a service.',
                ],
                [
                    'name' => 'description',
                    'label' => 'Description (HTML allowed)',
                    'type' => 'textarea',
                    'default' => 'In Between Asia is also building a <strong class="font-semibold text-[#131313]">growing media platform, business network </strong>connecting people, ideas and opportunities across Asia.',
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
                    'name' => 'carousel_images',
                    'label' => 'Danh sách ảnh Carousel 3D (Repeatable Images)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 10,
                    'fields' => [
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh thẻ',
                            'type' => 'image',
                            'default' => 'themes/inbetween_v2/images/hero-person-center.png',
                        ],
                        [
                            'name' => 'alt',
                            'label' => 'Mô tả hình ảnh (Alt)',
                            'type' => 'text',
                            'default' => 'INBETWEEN Media Image',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'badge_title' => '[ BEYOND BUSINESS ]',
            'media_title' => 'MEDIA',
            'media_desc' => 'Business, culture, society and perspectives from across Asia.',
            'connections_title' => 'CONNECTIONS',
            'connections_desc' => 'Business networking, industry gatherings, workshops and cross-border connections — bringing people and ideas into the same room.',
            'heading_prefix' => 'Building ',
            'heading_suffix' => 'more than a service.',
            'description' => 'In Between Asia is also building a <strong class="font-semibold text-[#131313]">growing media platform, business network </strong>connecting people, ideas and opportunities across Asia.',
            'cta_text' => 'Talk to us',
            'cta_link' => '#inbetween-founder',
            'carousel_images' => [
                ['image' => 'themes/inbetween_v2/images/hero-person-left-outer.png', 'alt' => 'Person Left Outer'],
                ['image' => 'themes/inbetween_v2/images/hero-person-left-inner.png', 'alt' => 'Person Left Inner'],
                ['image' => 'themes/inbetween_v2/images/hero-person-center.png', 'alt' => 'Person Center'],
                ['image' => 'themes/inbetween_v2/images/hero-person-right-inner.png', 'alt' => 'Person Right Inner'],
                ['image' => 'themes/inbetween_v2/images/hero-person-right-outer.png', 'alt' => 'Person Right Outer'],
            ],
        ], $this->settings);

        return view('widgets.inbetween_v2.business', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
