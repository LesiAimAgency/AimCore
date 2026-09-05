<?php

namespace App\Widgets\Viettinmart;

use App\Widgets\BaseWidget;

class ViettinmartFeatureIconsWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Feature Icons',
            'description' => 'Hiển thị các icon cam kết dịch vụ (Giao hàng, Bảo hành...)',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'columns',
                    'label' => 'Số cột hiển thị',
                    'type' => 'select',
                    'options' => [
                        '2' => '2 cột',
                        '3' => '3 cột',
                        '4' => '4 cột',
                        '5' => '5 cột',
                        '6' => '6 cột',
                    ],
                    'default' => '5',
                ],
                [
                    'name' => 'items',
                    'label' => 'Danh sách Tính năng',
                    'type' => 'repeatable',
                    'fields' => [
                        ['name' => 'icon', 'label' => 'Icon (FontAwesome)', 'type' => 'text'],
                        ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text'],
                        ['name' => 'sub', 'label' => 'Mô tả phụ', 'type' => 'text'],
                    ],
                    'default' => [
                        ['icon' => 'fa-solid fa-dollar-sign', 'title' => 'Wide Assortment', 'sub' => 'Orders $50 or more'],
                        ['icon' => 'fa-solid fa-rotate-left', 'title' => 'Easy Return Policy', 'sub' => 'Orders $50 or more'],
                        ['icon' => 'fa-solid fa-tag', 'title' => 'Best Prices & Offers', 'sub' => 'Orders $50 or more'],
                        ['icon' => 'fa-solid fa-headset', 'title' => 'Support 24/7', 'sub' => 'Orders $50 or more'],
                        ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Best Quality', 'sub' => 'Orders $50 or more'],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $features = $config['items'] ?? [
            ['icon' => 'fa-solid fa-dollar-sign', 'title' => 'Wide Assortment', 'sub' => 'Orders $50 or more'],
            ['icon' => 'fa-solid fa-rotate-left', 'title' => 'Easy Return Policy', 'sub' => 'Orders $50 or more'],
            ['icon' => 'fa-solid fa-tag', 'title' => 'Best Prices & Offers', 'sub' => 'Orders $50 or more'],
            ['icon' => 'fa-solid fa-headset', 'title' => 'Support 24/7', 'sub' => 'Orders $50 or more'],
            ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Best Quality', 'sub' => 'Orders $50 or more'],
        ];

        return view('widgets.inbetween.viettinmart_feature_icons', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'features' => $features,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
