<?php

namespace App\Widgets\Viettinmart;

use App\Widgets\BaseWidget;

class ViettinmartPromoBannersWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Promo Banners',
            'description' => 'Các banner khuyến mãi dạng card với ảnh nền và nút CTA',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'columns',
                    'label' => 'Số cột',
                    'type' => 'select',
                    'options' => ['2' => '2 cột', '3' => '3 cột', '4' => '4 cột'],
                    'default' => '4',
                ],
                [
                    'name' => 'items',
                    'label' => 'Danh sách Banners',
                    'type' => 'repeatable',
                    'fields' => [
                        ['name' => 'badge', 'label' => 'Nhãn', 'type' => 'text'],
                        ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text'],
                        ['name' => 'subtitle', 'label' => 'Tiêu đề phụ', 'type' => 'text'],
                        ['name' => 'image', 'label' => 'Hình ảnh', 'type' => 'image'],
                        ['name' => 'btn_text', 'label' => 'Chữ nút bấm', 'type' => 'text'],
                        ['name' => 'btn_link', 'label' => 'Link nút bấm', 'type' => 'text'],
                        ['name' => 'bg_style', 'label' => 'Style nền', 'type' => 'text'],
                    ],
                    'default' => [
                        [
                            'badge' => 'Ưu đãi cuối tuần',
                            'title' => 'Nước ngô nguyên chất',
                            'subtitle' => 'Tươi ngon bổ dưỡng',
                            'image' => 'theme/images/banner/promo-01.png',
                            'btn_text' => 'Mua ngay',
                            'btn_link' => '/shop',
                        ],
                        [
                            'badge' => 'Ưu đãi cuối tuần',
                            'title' => 'Khoai tây hữu cơ',
                            'subtitle' => 'Sản phẩm mới nhất',
                            'image' => 'theme/images/banner/promo-02.png',
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

        return view('widgets.inbetween.viettinmart_promo_banners', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
