<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class ViettinmartWidgetsSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->orWhere('code', 'viettinmartdemo')->first() ?? Project::find(10);
            $projectId = $project ? $project->id : 10;
        }
        $tenantId = $tenantId ?? $projectId;

        $widgets = [
            [
                'name' => 'Banner Slider Đầu Trang',
                'type' => 'inbetween_hero_slider',
                'area' => 'homepage-main',
                'sort_order' => 1,
                'is_active' => true,

                'settings' => [
                    'autoplay_delay' => 4000,
                    'slides' => [
                        [
                            'image' => 'theme/images/banner/01.webp',
                            'pre_title' => 'Giảm đến 30% cho đơn hàng đầu tiên từ 1.500.000đ',
                            'title' => "Đừng bỏ lỡ những ưu đãi\nthực phẩm tuyệt vời",
                            'btn_text' => 'Mua ngay',
                            'btn_link' => '/cua-hang',
                        ],
                        [
                            'image' => 'theme/images/banner/08.webp',
                            'pre_title' => 'Tươi ngon mỗi ngày từ nông trại',
                            'title' => "Thực phẩm tươi sạch\nmỗi ngày cho gia đình bạn",
                            'btn_text' => 'Khám phá ngay',
                            'btn_link' => '/cua-hang',
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Cam Kết & Dịch Vụ',
                'type' => 'inbetween_feature_icons',
                'area' => 'homepage-main',
                'sort_order' => 2,
                'is_active' => true,
                'settings' => [
                    'columns' => '5',
                    'items' => [
                        ['icon' => 'fa-solid fa-truck-fast', 'title' => 'Giao hàng miễn phí', 'sub' => 'Đơn hàng từ 500.000đ'],
                        ['icon' => 'fa-solid fa-rotate-left', 'title' => 'Đổi trả dễ dàng', 'sub' => 'Trong vòng 7 ngày'],
                        ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Chất lượng đảm bảo', 'sub' => '100% hữu cơ & tươi sạch'],
                        ['icon' => 'fa-solid fa-headset', 'title' => 'Hỗ trợ 24/7', 'sub' => 'Tư vấn nhiệt tình tận tâm'],
                        ['icon' => 'fa-solid fa-tags', 'title' => 'Ưu đãi ngập tràn', 'sub' => 'Flash sale mỗi cuối tuần'],
                    ],
                ],
            ],
            [
                'name' => 'Banner Khuyến Mãi Nổi Bật',
                'type' => 'inbetween_promo_banners',
                'area' => 'homepage-main',
                'sort_order' => 3,
                'is_active' => true,
                'settings' => [
                    'columns' => '4',
                    'items' => [
                        [
                            'badge' => 'Ưu đãi cuối tuần',
                            'title' => 'Nước ép nguyên chất',
                            'subtitle' => 'Tươi ngon bổ dưỡng',
                            'image' => 'theme/images/feature/01.jpg',
                            'btn_text' => 'Mua ngay',
                            'btn_link' => '/cua-hang',
                        ],
                        [
                            'badge' => 'Giảm 25%',
                            'title' => 'Khoai tây hữu cơ',
                            'subtitle' => 'Thu hoạch trong ngày',
                            'image' => 'theme/images/feature/02.jpg',
                            'btn_text' => 'Mua ngay',
                            'btn_link' => '/cua-hang',
                        ],
                        [
                            'badge' => 'Khuyến mãi sốc',
                            'title' => 'Hải sản tươi sống',
                            'subtitle' => 'Nguồn hàng đảo Phú Quốc',
                            'image' => 'theme/images/feature/03.jpg',
                            'btn_text' => 'Mua ngay',
                            'btn_link' => '/cua-hang',
                        ],
                        [
                            'badge' => 'Bán chạy nhất',
                            'title' => 'Trái cây nhiệt đới',
                            'subtitle' => 'Đạt chuẩn VietGAP',
                            'image' => 'theme/images/feature/04.jpg',
                            'btn_text' => 'Mua ngay',
                            'btn_link' => '/cua-hang',
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Flash Sale Cuối Tuần',
                'type' => 'inbetween_deal_flash',
                'area' => 'homepage-main',
                'sort_order' => 4,
                'is_active' => true,
                'settings' => [
                    'title' => 'Flash Sale Siêu Giảm Giá',
                    'limit' => 6,
                    'end_date' => now()->addDays(7)->format('m/d/Y H:i:s'),
                ],
            ],
            [
                'name' => 'Sản Phẩm Nổi Bật',
                'type' => 'inbetween_product_featured',
                'area' => 'homepage-main',
                'sort_order' => 5,
                'is_active' => true,
                'settings' => [
                    'title' => 'Sản Phẩm Nổi Bật Được Yêu Thích',
                    'limit' => 10,
                    'columns' => '5',
                ],
            ],
            [
                'name' => 'Tabs Sản Phẩm Danh Mục',
                'type' => 'inbetween_product_tabs',
                'area' => 'homepage-main',
                'sort_order' => 6,
                'is_active' => true,
                'settings' => [
                    'title' => 'Sản Phẩm Bán Chạy Trong Tuần',
                    'columns' => '5',
                    'tabs' => [
                        ['label' => 'Tất cả'],
                        ['label' => 'Rau củ hữu cơ'],
                        ['label' => 'Thịt & Hải sản'],
                        ['label' => 'Trái cây tươi'],
                    ],
                ],
            ],
            [
                'name' => 'Sản Phẩm Thịnh Hành',
                'type' => 'inbetween_top_trending',
                'area' => 'homepage-main',
                'sort_order' => 7,
                'is_active' => true,
                'settings' => [
                    'title' => 'Xu Hướng Mua Sắm Hôm Nay',
                    'limit' => 8,
                    'columns' => '4',
                ],
            ],
            [
                'name' => 'Tin Tức & Mẹo Hay Nấu Nướng',
                'type' => 'inbetween_posts_latest',
                'area' => 'homepage-main',
                'sort_order' => 8,
                'is_active' => true,
                'settings' => [
                    'title' => 'Bài Viết Mới Nhất',
                    'pre_title' => 'TIN TỨC & KIẾN THỨC',
                    'subtitle' => 'Cập nhật tin tức dinh dưỡng và mẹo lựa chọn thực phẩm sạch',
                    'limit' => 4,
                    'columns' => '4',
                    'show_btn' => true,
                ],
            ],
            [
                'name' => 'Đăng Ký Nhận Tin Khuyến Mãi',
                'type' => 'inbetween_form_widget',
                'area' => 'homepage-main',
                'sort_order' => 9,
                'is_active' => true,
                'settings' => [
                    'title' => 'Đăng Ký Nhận Bản Tin Ưu Đãi',
                    'form_style' => 'ekomart',
                    'button_text' => 'Đăng ký ngay',
                ],
            ],
        ];

        foreach ($widgets as $item) {
            Widget::updateOrCreate(
                [
                    'project_id' => $projectId,
                    'type' => $item['type'],
                    'area' => $item['area'],
                ],
                [
                    'tenant_id' => $tenantId,
                    'name' => $item['name'],
                    'sort_order' => $item['sort_order'],
                    'is_active' => $item['is_active'],
                    'settings' => $item['settings'],
                ]
            );
        }
    }
}
