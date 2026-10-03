<?php

declare(strict_types=1);

namespace App\Widgets\Ehenho;

use App\Widgets\BaseWidget;

class EhenhoHeroSliderWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'eHenho Hero Carousel',
            'description' => 'Khối trình chiếu Slider biểu ngữ đầu trang chủ eHenho',
            'category' => 'ehenho',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>',
            'fields' => [
                [
                    'name' => 'slides',
                    'label' => 'Danh sách các Slide',
                    'type' => 'repeatable',
                    'fields' => [
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh nền Slide',
                            'type' => 'image',
                            'default' => '/themes/ehenho/images/tim-ban-bon-phuong.jpg',
                        ],
                        [
                            'name' => 'title',
                            'label' => 'Tiêu đề Slide',
                            'type' => 'text',
                            'default' => 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương',
                        ],
                        [
                            'name' => 'subtitle',
                            'label' => 'Mô tả / Lời chào',
                            'type' => 'textarea',
                            'default' => 'Chủ động, Bảo mật & Hoàn toàn Miễn Phí!!',
                        ],
                        [
                            'name' => 'button_text',
                            'label' => 'Chữ trên nút bấm',
                            'type' => 'text',
                            'default' => 'TẠO HỒ SƠ CỦA BẠN!',
                        ],
                        [
                            'name' => 'button_link',
                            'label' => 'Đường dẫn liên kết (URL)',
                            'type' => 'text',
                            'default' => '/ehenho/dang-ky',
                        ],
                    ],
                ],
                [
                    'name' => 'interval',
                    'label' => 'Thời gian chuyển slide (mili-giây)',
                    'type' => 'number',
                    'default' => '5000',
                ],
            ],
            'settings' => [
                'cacheable' => false,
            ],
        ];
    }

    public static function getDefaultSlides(): array
    {
        return [
            [
                'image' => asset('themes/ehenho/images/tim-ban-bon-phuong.jpg'),
                'title' => 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương',
                'subtitle' => 'Chủ động, Bảo mật & Hoàn toàn Miễn Phí!!',
                'button_text' => 'TẠO HỒ SƠ CỦA BẠN!',
                'button_link' => route('ehenho.register'),
            ],
            [
                'image' => asset('themes/ehenho/images/tim-nguoi-yeu.jpg'),
                'title' => 'eHenho.com - Hẹn hò Online theo Sở thích & Tính cách',
                'subtitle' => 'Bạn muốn tìm người cùng sở thích & tính cách tương đồng với bạn chứ!?',
                'button_text' => 'TẠO HỒ SƠ CỦA BẠN!',
                'button_link' => route('ehenho.register'),
            ],
            [
                'image' => asset('themes/ehenho/images/tim-ban-doi-nghiem-tuc.jpg'),
                'title' => 'eHenho.com - Tìm Bạn Đời Nghiêm Túc',
                'subtitle' => 'Cơ hội gặp gỡ một nửa yêu thương của cuộc đời bạn!',
                'button_text' => 'TẠO HỒ SƠ CỦA BẠN!',
                'button_link' => route('ehenho.register'),
            ],
        ];
    }

    public function render(): string
    {
        $rawSlides = $this->get('slides', []);
        if (is_string($rawSlides) && ! empty($rawSlides)) {
            $decoded = json_decode($rawSlides, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $rawSlides = $decoded;
            }
        }

        if (empty($rawSlides) || ! is_array($rawSlides)) {
            $slides = static::getDefaultSlides();
        } else {
            $slides = $rawSlides;
        }

        $interval = (int) ($this->get('interval') ?: 5000);

        return view('widgets.ehenho.hero_slider', [
            'widget' => $this,
            'slides' => $slides,
            'interval' => $interval,
        ])->render();
    }
}
