<?php

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;
use Botble\Blog\Models\Post;

class MediaStoriesWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Media & Stories',
            'description' => 'Hiển thị bài viết, tin tức (Blog)',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề',
                    'type' => 'text',
                    'default' => 'Hear the STORIES',
                ],
                [
                    'name' => 'subtitle',
                    'label' => 'Đoạn mô tả ngắn (Description)',
                    'type' => 'textarea',
                    'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966.',
                ],
                [
                    'name' => 'btn_text',
                    'label' => 'Chữ nút (BE OUR GUEST)',
                    'type' => 'text',
                    'default' => 'BE OUR GUEST',
                ],
                [
                    'name' => 'btn_link',
                    'label' => 'Link nút',
                    'type' => 'text',
                    'default' => '#contact',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số lượng bài viết',
                    'type' => 'number',
                    'default' => 4,
                ],
                [
                    'name' => 'manual_stories',
                    'label' => 'Danh sách tin tức thủ công (Nếu có dữ liệu ở đây, hệ thống sẽ ưu tiên hiển thị)',
                    'type' => 'repeatable',
                    'fields' => [
                        [
                            'name' => 'title',
                            'label' => 'Tiêu đề',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'author_name',
                            'label' => 'Tên Tác giả / Khách mời',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'description',
                            'label' => 'Mô tả ngắn (Accordion drawer)',
                            'type' => 'textarea',
                        ],
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh',
                            'type' => 'image',
                        ],
                        [
                            'name' => 'url',
                            'label' => 'Link bài viết',
                            'type' => 'text',
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
            $settings['title'] = 'Hear the STORIES';
        }
        if (empty($settings['subtitle'])) {
            $settings['subtitle'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966.';
        }
        if (empty($settings['btn_text'])) {
            $settings['btn_text'] = 'BE OUR GUEST';
        }
        if (empty($settings['btn_link'])) {
            $settings['btn_link'] = '#contact';
        }
        if (empty($settings['limit'])) {
            $settings['limit'] = 4;
        }

        $posts = [];
        if (class_exists(Post::class)) {
            $posts = Post::where('status', 'published')
                ->orderBy('created_at', 'desc')
                ->limit($settings['limit'])
                ->get();
        }

        return view('widgets.inbetween.media_stories', ['widget' => $this, 'settings' => $settings, 'posts' => $posts])->render();
    }
}
