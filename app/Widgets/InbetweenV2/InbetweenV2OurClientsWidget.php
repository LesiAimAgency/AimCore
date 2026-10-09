<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2OurClientsWidget extends BaseWidget
{
    public static string $label = 'Our Clients Section';

    public static string $description = 'Section Our Clients với danh sách các nhóm khách hàng lặp lại (Asian SMEs, Founders & Entrepreneurs, Regional Teams)';

    public static string $icon = 'user-group';

    public static function getConfig(): array
    {
        return [
            'name' => 'Our Clients Section',
            'description' => 'Section Our Clients với danh sách các nhóm khách hàng lặp lại (Asian SMEs, Founders & Entrepreneurs, Regional Teams)',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" /></svg>',
            'fields' => [
                [
                    'name' => 'heading_word1',
                    'label' => 'Heading Word 1 (Trắng)',
                    'type' => 'text',
                    'default' => 'OUR',
                ],
                [
                    'name' => 'heading_word2',
                    'label' => 'Heading Word 2 (Cam)',
                    'type' => 'text',
                    'default' => 'CLIENTS.',
                ],
                [
                    'name' => 'client_cards',
                    'label' => 'Danh sách thẻ khách hàng (Repeatable Cards)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 6,
                    'fields' => [
                        [
                            'name' => 'card_id',
                            'label' => 'Card ID / Slug (VD: asian-smes)',
                            'type' => 'text',
                            'default' => 'asian-smes',
                        ],
                        [
                            'name' => 'title',
                            'label' => 'Tiêu đề khách hàng',
                            'type' => 'text',
                            'default' => 'Asian SMEs',
                        ],
                        [
                            'name' => 'description',
                            'label' => 'Mô tả đối tượng khách hàng',
                            'type' => 'textarea',
                            'default' => 'Established businesses looking for customers, distributors or partners in Vietnam.',
                        ],
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh nền của thẻ',
                            'type' => 'image',
                            'default' => '/storage/media/project-DA005/client-asian-smes.png',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'heading_word1' => 'OUR',
            'heading_word2' => 'CLIENTS.',
            'client_cards' => [
                [
                    'card_id' => 'asian-smes',
                    'title' => 'Asian SMEs',
                    'description' => 'Established businesses looking for customers, distributors or partners in Vietnam.',
                    'image' => '/storage/media/project-DA005/client-asian-smes.png',
                ],
                [
                    'card_id' => 'founders',
                    'title' => 'Founders & Entrepreneurs',
                    'description' => 'Building, testing or launching their business in the market.',
                    'image' => '/storage/media/project-DA005/client-founders.png',
                ],
                [
                    'card_id' => 'regional-teams',
                    'title' => 'Regional Teams',
                    'description' => 'Companies operating across Asia that need additional Vietnam capacity.',
                    'image' => '/storage/media/project-DA005/client-regional-teams.png',
                ],
            ],
        ], $this->settings);

        return view('widgets.inbetween_v2.our_clients', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
