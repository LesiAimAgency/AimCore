<?php

namespace App\Widgets\Viettinmart;

use App\Widgets\BaseWidget;

class ViettinmartHeroSliderWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Hero Slider',
            'description' => 'Banner lớn đầu trang với hiệu ứng trượt Swiper',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'autoplay_delay',
                    'label' => 'Tốc độ tự chạy (ms)',
                    'type' => 'number',
                    'default' => 4000,
                ],
                [
                    'name' => 'slides',
                    'label' => 'Danh sách Slide',
                    'type' => 'repeatable',
                    'fields' => [
                        ['name' => 'image', 'label' => 'Hình ảnh', 'type' => 'image'],
                        ['name' => 'pre_title', 'label' => 'Tiêu đề phụ', 'type' => 'text'],
                        ['name' => 'title', 'label' => 'Tiêu đề chính', 'type' => 'textarea'],
                        ['name' => 'description', 'label' => 'Mô tả', 'type' => 'textarea'],
                        ['name' => 'btn_text', 'label' => 'Chữ nút bấm', 'type' => 'text'],
                        ['name' => 'btn_link', 'label' => 'Link nút bấm', 'type' => 'text'],
                    ],
                    'default' => [
                        [
                            'image' => 'theme/images/banner/banner-01.png',
                            'pre_title' => 'Giảm đến 30% cho đơn hàng đầu tiên',
                            'title' => "Đừng bỏ lỡ những ưu đãi\nthực phẩm tuyệt vời",
                            'btn_text' => 'Mua ngay',
                            'btn_link' => '/shop',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $slides = $config['slides'] ?? [
            [
                'image' => 'theme/images/banner/banner-01.png',
                'pre_title' => 'Giảm đến 30% cho đơn hàng đầu tiên',
                'title' => "Đừng bỏ lỡ những ưu đãi\nthực phẩm tuyệt vời",
                'btn_text' => 'Mua ngay',
                'btn_link' => '/shop',
            ],
        ];

        return view('widgets.inbetween.viettinmart_hero_slider', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'slides' => $slides,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
