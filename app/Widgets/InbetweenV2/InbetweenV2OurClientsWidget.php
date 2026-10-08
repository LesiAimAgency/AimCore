<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2OurClientsWidget extends BaseWidget
{
    public static string $label = 'Our Clients Section';

    public static string $description = 'Section Our Clients với 3 nhóm khách hàng chính: Asian SMEs, Founders & Entrepreneurs, Regional Teams';

    public static string $icon = 'user-group';

    public static function getConfig(): array
    {
        return [
            'name' => 'Our Clients Section',
            'description' => 'Section Our Clients với 3 nhóm khách hàng chính: Asian SMEs, Founders & Entrepreneurs, Regional Teams',
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
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'heading_word1' => 'OUR',
            'heading_word2' => 'CLIENTS.',
        ], $this->settings);

        return view('widgets.inbetween_v2.our_clients', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
