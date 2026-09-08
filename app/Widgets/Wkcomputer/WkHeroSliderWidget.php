<?php

namespace App\Widgets\Wkcomputer;

use App\Models\Wkcomputer\WkCategory;
use App\Widgets\BaseWidget;

class WkHeroSliderWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'WK Hero Section & Slider',
            'description' => 'Khối Banner Hero trang chủ: Danh mục, Slider, Banner phụ và Thanh dịch vụ',
            'category' => 'wkcomputer',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'autoplay_delay',
                    'label' => 'Tốc độ tự chạy (ms)',
                    'type' => 'number',
                    'default' => 4500,
                ],
                [
                    'name' => 'slides',
                    'label' => 'Danh sách Slides',
                    'type' => 'repeatable',
                    'fields' => [
                        ['name' => 'image', 'label' => 'Hình ảnh Banner', 'type' => 'image'],
                        ['name' => 'title', 'label' => 'Tiêu đề chính', 'type' => 'text'],
                        ['name' => 'subtitle', 'label' => 'Mô tả ngắn / Phụ đề', 'type' => 'text'],
                        ['name' => 'btn_link', 'label' => 'Đường dẫn nút bấm', 'type' => 'text'],
                        ['name' => 'btn_text', 'label' => 'Chữ nút bấm', 'type' => 'text'],
                    ],
                    'default' => [
                        [
                            'image' => '/themes/wkcomputerdemo/images/banner/WK-Store-Banner-01-1536x450-min-1.png',
                            'title' => 'WK Store PC Gaming Gear',
                            'subtitle' => 'Cấu hình mạnh mẽ - Bảo hành chính hãng 36 tháng',
                            'btn_link' => '/wkcomputer/cua-hang',
                            'btn_text' => 'Khám phá ngay',
                        ],
                    ],
                ],
                [
                    'name' => 'badge',
                    'label' => 'Badge nổi bật',
                    'type' => 'text',
                    'default' => 'Hi 2K8!',
                ],
                [
                    'name' => 'hero_title',
                    'label' => 'Tiêu đề Hero Box',
                    'type' => 'text',
                    'default' => 'SHOW ĐIỂM<br>GIẢM SÂU',
                ],
                [
                    'name' => 'show_services',
                    'label' => 'Hiển thị thanh dịch vụ bên dưới',
                    'type' => 'checkbox',
                    'default' => true,
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $currentProj = function_exists('current_project') ? current_project() : null;
        $projectId = $currentProj ? $currentProj->id : ($config['project_id'] ?? 14);

        $featuredCategories = WkCategory::withoutGlobalScopes()
            ->where(function ($q) use ($projectId) {
                if ($projectId) {
                    $q->where('project_id', $projectId);
                }
            })
            ->roots()
            ->orderBy('sort_order')
            ->take(14)
            ->get();

        $slides = $config['slides'] ?? [
            [
                'image' => '/themes/wkcomputerdemo/images/banner/WK-Store-Banner-01-1536x450-min-1.png',
                'title' => 'WK Store PC Gaming Gear',
                'subtitle' => 'Cấu hình mạnh mẽ - Bảo hành chính hãng 36 tháng',
                'btn_link' => '/wkcomputer/cua-hang',
                'btn_text' => 'Khám phá ngay',
            ],
            [
                'image' => '/themes/wkcomputerdemo/images/banner/z6256647989516-0136dae901ee0ae652fae55eaf6cadf2-1-2048x598-1.jpg',
                'title' => 'Build PC Gaming & Đồ Họa',
                'subtitle' => 'Tự chọn linh kiện, tối ưu chi phí cùng chuyên gia',
                'btn_link' => '/wkcomputer/xay-dung-cau-hinh',
                'btn_text' => 'Build PC Ngay',
            ],
            [
                'image' => '/themes/wkcomputerdemo/images/banner/z6256652996024-4758b4bd9a37b2745ee55d37b9d6a7e6-1-2048x598-1.jpg',
                'title' => 'Linh Kiện Máy Tính Cao Cấp',
                'subtitle' => 'VGA, CPU, RAM, SSD nhập khẩu giá tốt nhất thị trường',
                'btn_link' => '/wkcomputer/cua-hang',
                'btn_text' => 'Xem sản phẩm',
            ],
        ];

        return view('widgets.wkcomputer.hero_slider', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'slides' => $slides,
            'featuredCategories' => $featuredCategories,
        ])->render();
    }
}
