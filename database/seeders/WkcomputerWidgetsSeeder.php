<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Widget;
use App\Models\Wkcomputer\WkCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class WkcomputerWidgetsSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'wkcomputer')->first();
            $projectId = $project ? $project->id : 14;
        }
        $tenantId = $tenantId ?? $projectId;

        if (! Schema::hasTable('widgets')) {
            return;
        }

        // Clean existing widgets for this project
        Widget::where('project_id', $projectId)->delete();

        // Dynamic category lookup by slug
        $cats = WkCategory::withoutGlobalScopes()
            ->where('project_id', $projectId)
            ->pluck('id', 'slug')
            ->toArray();

        $pcGamingId = $cats['pc-gaming-streaming'] ?? null;
        $cpuId = $cats['cpu-bo-vi-xu-ly'] ?? null;
        $vgaId = $cats['vga-card-man-hinh'] ?? null;
        $coolingId = $cats['tan-nhiet-pc-cooling'] ?? null;
        $psuId = $cats['psu-nguon-may-tinh'] ?? null;
        $caseId = $cats['case-vo-may-tinh'] ?? null;
        $mainboardId = $cats['mainboard-bo-mach-chu'] ?? null;
        $monitorId = $cats['man-hinh-may-tinh'] ?? null;

        $heroSlides = [
            [
                'image' => '/storage/media/project-wkcomputer/1788832999_WK-Store-Banner-01-1536x450-min-1.png.webp',
                'title' => 'WK Store PC Gaming Gear',
                'subtitle' => 'Cấu hình mạnh mẽ - Bảo hành chính hãng 36 tháng',
                'btn_link' => '/wkcomputer/cua-hang',
                'btn_text' => 'Khám phá ngay',
            ],
            [
                'image' => '/storage/media/project-wkcomputer/1788833000_z6256647989516-0136dae901ee0ae652fae55eaf6cadf2-1-2048x598-1.jpg',
                'title' => 'Build PC Gaming & Đồ Họa',
                'subtitle' => 'Tự chọn linh kiện, tối ưu chi phí cùng chuyên gia',
                'btn_link' => '/wkcomputer/xay-dung-cau-hinh',
                'btn_text' => 'Build PC Ngay',
            ],
            [
                'image' => '/storage/media/project-wkcomputer/1788833000_z6256652996024-4758b4bd9a37b2745ee55d37b9d6a7e6-1-2048x598-1.jpg',
                'title' => 'Linh Kiện Máy Tính Cao Cấp',
                'subtitle' => 'VGA, CPU, RAM, SSD nhập khẩu giá tốt nhất thị trường',
                'btn_link' => '/wkcomputer/cua-hang',
                'btn_text' => 'Xem sản phẩm',
            ],
        ];

        $widgets = [
            // ─── HOMEPAGE WIDGETS ─────────────────────────────────────────
            [
                'name' => 'SEO H1 Tiêu Đề',
                'type' => 'html_custom',
                'area' => 'homepage-main',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'content' => '<h1 class="visually-hidden">WK Store - High End PC Gaming Gear & Workstation Chuyên Nghiệp</h1>',
                ],
            ],
            [
                'name' => 'Top Banner Slider',
                'type' => 'hero_slider',
                'area' => 'homepage-main',
                'sort_order' => 2,
                'is_active' => true,
                'settings' => [
                    'slides' => $heroSlides,
                    'autoplay_delay' => 4500,
                ],
            ],
            [
                'name' => 'Flash Sale Linh Kiện',
                'type' => 'wk_deal_flash',
                'area' => 'homepage-main',
                'sort_order' => 3,
                'is_active' => true,
                'settings' => [
                    'title' => 'Flash Sale Gaming Gear',
                    'limit' => 6,
                    'end_date' => now()->addDays(7)->format('m/d/Y 23:59:59'),
                ],
            ],
            [
                'name' => 'Banner Khuyến Mãi 4 Ô',
                'type' => 'html_custom',
                'area' => 'homepage-main',
                'sort_order' => 4,
                'is_active' => true,
                'settings' => [
                    'content' => '<div class="wk-container my-4"><div class="wk-promo-grid grid grid-cols-2 md:grid-cols-4 gap-3">
                        <a href="/wkcomputer/cua-hang" class="rounded-xl overflow-hidden shadow-xs hover:shadow-md transition"><img src="/themes/wkcomputerdemo/images/banner/banner1-1-min.png" alt="WK promo 1" class="w-full object-cover"></a>
                        <a href="/wkcomputer/cua-hang" class="rounded-xl overflow-hidden shadow-xs hover:shadow-md transition"><img src="/themes/wkcomputerdemo/images/banner/banner2.png" alt="WK promo 2" class="w-full object-cover"></a>
                        <a href="/wkcomputer/cua-hang" class="rounded-xl overflow-hidden shadow-xs hover:shadow-md transition"><img src="/themes/wkcomputerdemo/images/banner/baner-1.jpg" alt="WK promo 3" class="w-full object-cover"></a>
                        <a href="/wkcomputer/cua-hang" class="rounded-xl overflow-hidden shadow-xs hover:shadow-md transition"><img src="/themes/wkcomputerdemo/images/banner/baner-3.jpg" alt="WK promo 4" class="w-full object-cover"></a>
                    </div></div>',
                ],
            ],
            [
                'name' => 'Sản Phẩm Bán Chạy Nhất',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 5,
                'is_active' => true,
                'settings' => [
                    'title' => 'SẢN PHẨM BÁN CHẠY',
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'best_selling',
                ],
            ],
            [
                'name' => 'PC GAMING & Streaming',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 6,
                'is_active' => true,
                'settings' => [
                    'title' => 'PC GAMING & STREAMING',
                    'category_id' => $pcGamingId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'Banner Ngang Giữa Trang',
                'type' => 'html_custom',
                'area' => 'homepage-main',
                'sort_order' => 7,
                'is_active' => true,
                'settings' => [
                    'content' => '<div class="wk-container my-6"><div class="wk-banner-strip rounded-2xl overflow-hidden shadow-md">
                        <a href="/wkcomputer/xay-dung-cau-hinh">
                            <img src="/themes/wkcomputerdemo/images/banner/WK-Store-Banner-02-scaled.png" alt="Build PC Banner" class="w-full object-cover">
                        </a>
                    </div></div>',
                ],
            ],
            [
                'name' => 'CPU - Bộ Vi Xử Lý',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 8,
                'is_active' => true,
                'settings' => [
                    'title' => 'CPU - BỘ VI XỬ LÝ',
                    'category_id' => $cpuId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'VGA - Card Màn Hình',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 9,
                'is_active' => true,
                'settings' => [
                    'title' => 'VGA - CARD MÀN HÌNH',
                    'category_id' => $vgaId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'Tản Nhiệt PC & Cooling',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 10,
                'is_active' => true,
                'settings' => [
                    'title' => 'TẢN NHIỆT PC, COOLING',
                    'category_id' => $coolingId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'PSU - Nguồn Máy Tính',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 11,
                'is_active' => true,
                'settings' => [
                    'title' => 'PSU - NGUỒN MÁY TÍNH',
                    'category_id' => $psuId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'Case - Vỏ Máy Tính',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 12,
                'is_active' => true,
                'settings' => [
                    'title' => 'CASE - VỎ MÁY TÍNH',
                    'category_id' => $caseId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'Mainboard - Bo Mạch Chủ',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 13,
                'is_active' => true,
                'settings' => [
                    'title' => 'MAINBOARD - BO MẠCH CHỦ',
                    'category_id' => $mainboardId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'Màn Hình Máy Tính',
                'type' => 'product_section',
                'area' => 'homepage-main',
                'sort_order' => 14,
                'is_active' => true,
                'settings' => [
                    'title' => 'MÀN HÌNH MÁY TÍNH',
                    'category_id' => $monitorId,
                    'layout' => 'grid',
                    'columns' => '5',
                    'limit' => 10,
                    'filter' => 'category',
                ],
            ],
            [
                'name' => 'Tin Tức & Đánh Giá Phần Cứng',
                'type' => 'posts_latest',
                'area' => 'homepage-main',
                'sort_order' => 15,
                'is_active' => true,
                'settings' => [
                    'title' => 'TIN TỨC CÔNG NGHỆ & REVIEW',
                    'limit' => 4,
                ],
            ],

            // ─── FOOTER WIDGETS ───────────────────────────────────────────
            [
                'name' => 'Footer — Thông tin công ty',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'title' => 'Về chúng tôi',
                    'type' => 'contact',
                    'col_class' => 'col-lg-3 col-md-6 col-sm-12',
                ],
            ],
            [
                'name' => 'Footer — Liên kết nhanh',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 2,
                'is_active' => true,
                'settings' => [
                    'title' => 'Liên kết nhanh',
                    'type' => 'menu',
                    'menu_slug' => 'footer-quick-links',
                    'col_class' => 'col-lg-2 col-md-6 col-sm-12',
                ],
            ],
            [
                'name' => 'Footer — Danh mục sản phẩm',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 3,
                'is_active' => true,
                'settings' => [
                    'title' => 'Danh mục',
                    'type' => 'menu',
                    'menu_slug' => 'footer-categories',
                    'col_class' => 'col-lg-2 col-md-6 col-sm-12',
                ],
            ],
            [
                'name' => 'Footer — Chăm sóc khách hàng',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 4,
                'is_active' => true,
                'settings' => [
                    'title' => 'Chăm sóc khách hàng',
                    'type' => 'menu',
                    'menu_slug' => 'footer-customer-service',
                    'col_class' => 'col-lg-2 col-md-6 col-sm-12',
                ],
            ],
            [
                'name' => 'Footer — Đăng ký nhận tin',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 5,
                'is_active' => true,
                'settings' => [
                    'title' => 'Đăng ký nhận tin',
                    'type' => 'newsletter',
                    'col_class' => 'col-lg-3 col-md-6 col-sm-12',
                ],
            ],
        ];

        foreach ($widgets as $widgetData) {
            $settings = $widgetData['settings'] ?? [];
            $settings['project_id'] = $projectId;
            $settings['tenant_id'] = $tenantId;

            Widget::create([
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'name' => $widgetData['name'],
                'type' => $widgetData['type'],
                'area' => $widgetData['area'],
                'sort_order' => $widgetData['sort_order'],
                'is_active' => $widgetData['is_active'],
                'settings' => $settings,
            ]);
        }

        $this->command?->info('✓ Seeded '.count($widgets).' authentic widgets for WKComputer (Homepage & Footer)!');
    }
}
