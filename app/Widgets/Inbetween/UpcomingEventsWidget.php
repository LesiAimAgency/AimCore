<?php

namespace App\Widgets\Inbetween;

use App\Models\Event;
use App\Widgets\BaseWidget; // Assuming Event model exists

class UpcomingEventsWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Upcoming Events',
            'description' => 'Hiển thị danh sách các sự kiện sắp tới',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề (UPCOMING EVENTS)',
                    'type' => 'text',
                    'default' => 'UPCOMING EVENTS',
                ],
                [
                    'name' => 'subtitle',
                    'label' => 'Tiêu đề phụ',
                    'type' => 'text',
                    'default' => 'What to expect next',
                ],
                [
                    'name' => 'btn_text',
                    'label' => 'Chữ nút (DISCOVER MORE)',
                    'type' => 'text',
                    'default' => 'DISCOVER MORE',
                ],
                [
                    'name' => 'btn_link',
                    'label' => 'Link nút',
                    'type' => 'text',
                    'default' => '/events',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số lượng sự kiện',
                    'type' => 'number',
                    'default' => 3,
                ],
                [
                    'name' => 'manual_events',
                    'label' => 'Danh sách sự kiện thủ công (Nếu có dữ liệu ở đây, hệ thống sẽ ưu tiên hiển thị)',
                    'type' => 'repeatable',
                    'fields' => [
                        [
                            'name' => 'title',
                            'label' => 'Tên sự kiện',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'start_date',
                            'label' => 'Ngày bắt đầu (VD: 2025-01-15 08:00:00)',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'location',
                            'label' => 'Địa điểm',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh',
                            'type' => 'image',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = $this->settings;

        if (empty($settings['title'])) {
            $settings['title'] = 'UPCOMING EVENTS';
        }
        if (empty($settings['subtitle'])) {
            $settings['subtitle'] = 'What to expect next';
        }
        if (empty($settings['btn_text'])) {
            $settings['btn_text'] = 'DISCOVER MORE';
        }
        if (empty($settings['btn_link'])) {
            $settings['btn_link'] = '/events';
        }
        if (empty($settings['limit'])) {
            $settings['limit'] = 3;
        }

        // Fetch events if model exists, for now we will pass empty array and handle in blade
        // to show placeholders if no events exist
        $events = [];
        if (class_exists(Event::class)) {
            $events = Event::where('status', 1)
                ->orderBy('start_date', 'asc')
                ->limit($settings['limit'])
                ->get();
        }

        return view('widgets.inbetween.upcoming_events', ['widget' => $this, 'settings' => $settings, 'events' => $events])->render();
    }
}
