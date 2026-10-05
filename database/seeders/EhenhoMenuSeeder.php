<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Project;
use App\Models\Tenant;
use App\Services\MenuService;
use Illuminate\Database\Seeder;

class EhenhoMenuSeeder extends Seeder
{
    /**
     * Run the database seeds for eHenho Multi-Menu System.
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'DA010')
                ->orWhere('code', 'DA010-EHENHO-DATING-SOCIAL-NETWORK')
                ->orWhere('code', 'ehenho')
                ->first();
            $projectId = $project ? $project->id : 15;
            $tenantId = $tenantId ?? $project?->tenant_id;
        }

        if (! $tenantId) {
            $tenant = Tenant::where('code', 'ehenho')->orWhere('domain', 'ehenho.local')->first();
            $tenantId = $tenant ? $tenant->id : 7;
        }

        $menus = [
            // 1. Header Main Menu
            [
                'name' => 'Menu Header Điều Hướng',
                'slug' => 'main-menu',
                'location' => 'header',
                'sort_order' => 1,
                'items' => [
                    ['title' => 'Tìm bạn bốn phương', 'url' => '/DA010/tim-kiem', 'icon' => 'fa fa-arrow-circle-right'],
                    ['title' => 'Tìm người kết hôn', 'url' => '/DA010/tim-kiem?looking_for=ket_hon', 'icon' => 'fa fa-arrow-circle-right'],
                    ['title' => 'Tìm người yêu', 'url' => '/DA010/tim-kiem?looking_for=nguoi_yeu', 'icon' => 'fa fa-arrow-circle-right'],
                    ['title' => 'Tìm bạn gái', 'url' => '/DA010/tim-kiem?gender=female', 'icon' => 'fa fa-arrow-circle-right'],
                    ['title' => 'Tìm bạn trai', 'url' => '/DA010/tim-kiem?gender=male', 'icon' => 'fa fa-arrow-circle-right'],
                    ['title' => 'Tìm bạn đời', 'url' => '/DA010/tim-kiem?looking_for=ban_doi', 'icon' => 'fa fa-arrow-circle-right'],
                    ['title' => 'Tìm bạn tâm sự', 'url' => '/DA010/tim-kiem?looking_for=tam_su', 'icon' => 'fa fa-arrow-circle-right'],
                    ['title' => 'Tìm bạn bè mới', 'url' => '/DA010/tim-kiem?looking_for=ban_be', 'icon' => 'fa fa-arrow-circle-right'],
                ],
            ],

            // 2. Footer Menu 1: Khu vực & Hình ảnh
            [
                'name' => 'Footer - Tìm bạn theo khu vực',
                'slug' => 'footer-khu-vuc',
                'location' => 'footer',
                'sort_order' => 1,
                'items' => [
                    ['title' => 'Tìm bạn bốn phương có hình', 'url' => '/DA010/tim-ban-bon-phuong-co-hinh', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương có hình (nữ)', 'url' => '/DA010/tim-ban-bon-phuong-co-hinh/nu', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương có hình (nam)', 'url' => '/DA010/tim-ban-bon-phuong-co-hinh/nam', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương Việt Nam', 'url' => '/DA010/tim-ban-bon-phuong-viet-nam', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương nước ngoài', 'url' => '/DA010/tim-ban-bon-phuong-nuoc-ngoai', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương Việt kiều', 'url' => '/DA010/tim-ban-bon-phuong-viet-kieu', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương Việt kiều Mỹ', 'url' => '/DA010/tim-ban-bon-phuong-viet-kieu-my', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương ở Mỹ', 'url' => '/DA010/tim-ban-bon-phuong-o-my', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương ở Úc', 'url' => '/DA010/tim-ban-bon-phuong-o-uc', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương ở Canada', 'url' => '/DA010/tim-ban-bon-phuong-o-canada', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương ở Đức', 'url' => '/DA010/tim-ban-bon-phuong-o-duc', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn bốn phương ở Nhật', 'url' => '/DA010/tim-ban-bon-phuong-o-nhat', 'css_class' => 't-button'],
                ],
            ],

            // 3. Footer Menu 2: Tình trạng hôn nhân
            [
                'name' => 'Footer - Tình trạng hôn nhân',
                'slug' => 'footer-tinh-trang',
                'location' => 'footer',
                'sort_order' => 2,
                'items' => [
                    ['title' => 'Tìm bạn độc thân', 'url' => '/DA010/tim-ban-doc-than', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn trai độc thân', 'url' => '/DA010/tim-ban-trai-doc-than', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn gái độc thân', 'url' => '/DA010/tim-ban-gai-doc-than', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn ly dị', 'url' => '/DA010/tim-ban-ly-di', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn trai ly dị', 'url' => '/DA010/tim-ban-trai-ly-di', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn gái ly dị', 'url' => '/DA010/tim-ban-gai-ly-di', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn ở góa', 'url' => '/DA010/tim-ban-o-goa', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn trai ở góa', 'url' => '/DA010/tim-ban-trai-o-goa', 'css_class' => 'g-button'],
                    ['title' => 'Tìm bạn gái ở góa', 'url' => '/DA010/tim-ban-gai-o-goa', 'css_class' => 'g-button'],
                ],
            ],

            // 4. Footer Menu 3: Mục đích hẹn hò & Kết hôn
            [
                'name' => 'Footer - Mục đích & Kết hôn',
                'slug' => 'footer-muc-dich',
                'location' => 'footer',
                'sort_order' => 3,
                'items' => [
                    ['title' => 'Tìm bạn gái kết hôn', 'url' => '/DA010/tim-ban-gai-ket-hon', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn trai kết hôn', 'url' => '/DA010/tim-ban-trai-ket-hon', 'css_class' => 't-button'],
                    ['title' => 'Tìm người yêu lâu dài', 'url' => '/DA010/tim-nguoi-yeu-lau-dai', 'css_class' => 't-button'],
                    ['title' => 'Tìm người yêu ngắn hạn', 'url' => '/DA010/tim-nguoi-yeu-ngan-han', 'css_class' => 't-button'],
                    ['title' => 'Tìm chồng', 'url' => '/DA010/tim-chong', 'css_class' => 't-button'],
                    ['title' => 'Tìm vợ', 'url' => '/DA010/tim-vo', 'css_class' => 't-button'],
                    ['title' => 'Tìm một nửa', 'url' => '/DA010/tim-mot-nua', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn trăm năm', 'url' => '/DA010/tim-ban-tram-nam', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn gái tâm sự', 'url' => '/DA010/tim-ban-gai-tam-su', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn trai tâm sự', 'url' => '/DA010/tim-ban-trai-tam-su', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn gái làm quen', 'url' => '/DA010/tim-ban-gai-lam-quen', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn trai làm quen', 'url' => '/DA010/tim-ban-trai-lam-quen', 'css_class' => 't-button'],
                    ['title' => 'Tìm bạn chat', 'url' => '/DA010/tim-ban-chat', 'css_class' => 't-button'],
                ],
            ],

            // 5. Footer Menu 4: Tỉnh thành
            [
                'name' => 'Footer - Tìm bạn theo tỉnh thành',
                'slug' => 'footer-tinh-thanh',
                'location' => 'footer',
                'sort_order' => 4,
                'items' => [
                    ['title' => 'Tìm bạn HCM', 'url' => '/DA010/tim-ban-bon-phuong/ho-chi-minh', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Hà Nội', 'url' => '/DA010/tim-ban-bon-phuong/ha-noi', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Hải Phòng', 'url' => '/DA010/tim-ban-bon-phuong/hai-phong', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Huế', 'url' => '/DA010/tim-ban-bon-phuong/hue', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Đà Nẵng', 'url' => '/DA010/tim-ban-bon-phuong/da-nang', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Cần Thơ', 'url' => '/DA010/tim-ban-bon-phuong/can-tho', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Khánh Hòa', 'url' => '/DA010/tim-ban-bon-phuong/khanh-hoa', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Lâm Đồng', 'url' => '/DA010/tim-ban-bon-phuong/lam-dong', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Đồng Nai', 'url' => '/DA010/tim-ban-bon-phuong/dong-nai', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn Cà Mau', 'url' => '/DA010/tim-ban-bon-phuong/ca-mau', 'css_class' => 'c-button'],
                    ['title' => 'Tìm bạn bốn phương theo Nơi Ở', 'url' => '/DA010/tim-ban-bon-phuong-theo-noi-o', 'icon' => 'fa fa-arrow-right', 'css_class' => 'c-button'],
                ],
            ],

            // 6. Footer Menu 5: Chính sách & Thông tin (footer_bottom)
            [
                'name' => 'Footer - Thông tin chính sách',
                'slug' => 'footer-bottom',
                'location' => 'footer_bottom',
                'sort_order' => 5,
                'items' => [
                    ['title' => 'Giới thiệu', 'url' => '/DA010/gioi-thieu', 'css_class' => 'navlink-b'],
                    ['title' => 'Trợ giúp', 'url' => '/DA010/tro-giup', 'css_class' => 'navlink-b'],
                    ['title' => 'Điều khoản sử dụng', 'url' => '/DA010/dieu-khoan-su-dung', 'css_class' => 'navlink-b'],
                    ['title' => 'Chính sách riêng tư', 'url' => '/DA010/chinh-sach-rieng-tu', 'css_class' => 'navlink-b'],
                ],
            ],

            // 7. Sub-Location Filter Bar (Thanh Tỉnh Thành Marker Filter Buttons)
            [
                'name' => 'Thanh Tỉnh Thành Tìm Bạn Nhanh',
                'slug' => 'sub-location',
                'location' => 'sub_location',
                'sort_order' => 1,
                'items' => [
                    ['title' => 'Tìm bạn bốn phương theo Tỉnh Thành', 'url' => '/DA010/tim-ban-bon-phuong-theo-noi-o', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'TP.Hồ Chí Minh', 'url' => '/DA010/tim-ban-bon-phuong/ho-chi-minh', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'Hà Nội', 'url' => '/DA010/tim-ban-bon-phuong/ha-noi', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'Đà Nẵng', 'url' => '/DA010/tim-ban-bon-phuong/da-nang', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'Cần Thơ', 'url' => '/DA010/tim-ban-bon-phuong/can-tho', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'Cà Mau', 'url' => '/DA010/tim-ban-bon-phuong/ca-mau', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'USA – Mỹ', 'url' => '/DA010/tim-ban-bon-phuong-o-my', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'ÚC', 'url' => '/DA010/tim-ban-bon-phuong-o-uc', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                    ['title' => 'Nhật', 'url' => '/DA010/tim-ban-bon-phuong-o-nhat', 'icon' => 'glyphicon glyphicon-map-marker', 'css_class' => 'b-button'],
                ],
            ],
        ];

        foreach ($menus as $m) {
            $menu = Menu::withoutGlobalScopes()->updateOrCreate(
                [
                    'project_id' => $projectId,
                    'slug' => $m['slug'],
                ],
                [
                    'tenant_id' => $tenantId,
                    'name' => $m['name'],
                    'location' => $m['location'],
                    'sort_order' => $m['sort_order'],
                    'is_active' => true,
                ]
            );

            // Re-sync items cleanly
            $menu->allItems()->delete();

            $order = 1;
            foreach ($m['items'] as $itemData) {
                MenuItem::withoutGlobalScopes()->create([
                    'menu_id' => $menu->id,
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'title' => $itemData['title'],
                    'url' => $itemData['url'],
                    'icon' => $itemData['icon'] ?? null,
                    'css_class' => $itemData['css_class'] ?? null,
                    'target' => '_self',
                    'order' => $order++,
                    'is_active' => true,
                ]);
            }
        }

        MenuService::clearMenuCache($projectId);
        $this->command?->info("✓ Đã seed thành công hệ thống Multi-Menu eHenho (Header & Footer) cho Project ID {$projectId}.");
    }
}
