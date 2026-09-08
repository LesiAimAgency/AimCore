<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Project;
use App\Models\Widget;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WkcomputerMenuSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'wkcomputer')->first();
            if (! $project) {
                [$project, $tenant] = (new WkcomputerMasterSeeder)->ensureProjectAndTenant($projectId, $tenantId);
            }
            $projectId = $project->id;
            $tenantId = $tenantId ?? $project->tenant_id;
        }

        $tenantId = $tenantId ?? $projectId;

        // Delete existing menus for this project
        Widget::where('project_id', $projectId)->where('type', 'menu')->delete();

        $menus = [
            // 1. Header Main Menu
            [
                'name' => 'Menu Header WKComputer',
                'type' => 'menu',
                'area' => 'header-menu',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'locale' => 'vi',
                    'items' => [
                        [
                            'id' => 'nav_home',
                            'label' => 'Trang chủ',
                            'url' => '/',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                        [
                            'id' => 'nav_shop',
                            'label' => 'Sản phẩm',
                            'url' => '/cua-hang',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [
                                ['id' => 'nav_shop_all', 'label' => 'Tất cả linh kiện', 'url' => '/cua-hang', 'type' => 'Route', 'target' => false],
                                ['id' => 'nav_shop_cpu', 'label' => 'CPU - Bộ Vi Xử Lý', 'url' => '/cua-hang?categories[]=cpu-bo-vi-xu-ly', 'type' => 'Route', 'target' => false],
                                ['id' => 'nav_shop_vga', 'label' => 'VGA - Card Màn Hình', 'url' => '/cua-hang?categories[]=vga-card-man-hinh', 'type' => 'Route', 'target' => false],
                                ['id' => 'nav_shop_main', 'label' => 'Mainboard Bo Mạch Chủ', 'url' => '/cua-hang?categories[]=mainboard-bo-mach-chu', 'type' => 'Route', 'target' => false],
                                ['id' => 'nav_shop_ram', 'label' => 'RAM - Bộ Nhớ Trong', 'url' => '/cua-hang?categories[]=ram-bo-nho-trong', 'type' => 'Route', 'target' => false],
                                ['id' => 'nav_shop_ssd', 'label' => 'Ổ Cứng SSD / HDD', 'url' => '/cua-hang?categories[]=o-cung-ssd', 'type' => 'Route', 'target' => false],
                                ['id' => 'nav_shop_screen', 'label' => 'Màn Hình Máy Tính', 'url' => '/cua-hang?categories[]=man-hinh-may-tinh', 'type' => 'Route', 'target' => false],
                            ],
                        ],
                        [
                            'id' => 'nav_build_pc',
                            'label' => 'Xây Dựng Cấu Hình',
                            'url' => '/xay-dung-cau-hinh',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                        [
                            'id' => 'nav_blog',
                            'label' => 'Tin Tức Công Nghệ',
                            'url' => '/blog',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                        [
                            'id' => 'nav_showroom',
                            'label' => 'Hệ Thống Showroom',
                            'url' => '/lien-he',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                        [
                            'id' => 'nav_contact',
                            'label' => 'Liên Hệ & Bảo Hành',
                            'url' => '/lien-he',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                    ],
                ],
            ],
            // 2. Footer Menu: Hỗ trợ khách hàng
            [
                'name' => 'Menu Footer Hỗ Trợ',
                'type' => 'menu',
                'area' => 'footer-links',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'locale' => 'vi',
                    'items' => [
                        ['id' => 'fl_1', 'label' => 'Hướng dẫn đặt hàng & thanh toán', 'url' => '/huong-dan-mua-hang', 'type' => 'Page', 'target' => false],
                        ['id' => 'fl_2', 'label' => 'Chính sách bảo hành tận nơi', 'url' => '/chinh-sach-bao-hanh', 'type' => 'Page', 'target' => false],
                        ['id' => 'fl_3', 'label' => 'Chính sách đổi trả 1 - 1', 'url' => '/chinh-sach-doi-tra', 'type' => 'Page', 'target' => false],
                        ['id' => 'fl_4', 'label' => 'Tra cứu tình trạng đơn hàng', 'url' => '/order-track', 'type' => 'Route', 'target' => false],
                    ],
                ],
            ],
        ];

        foreach ($menus as $menu) {
            Widget::create([
                'widget_code' => 'widget_'.Str::random(8),
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'name' => $menu['name'],
                'type' => $menu['type'],
                'area' => $menu['area'],
                'sort_order' => $menu['sort_order'],
                'is_active' => $menu['is_active'],
                'settings' => $menu['settings'],
            ]);
        }

        // Populate Menu & MenuItem for CMS admin
        $mainMenu = Menu::updateOrCreate(
            ['project_id' => $projectId, 'slug' => 'main-menu'],
            ['tenant_id' => $tenantId, 'name' => 'Menu chính WKComputer', 'location' => 'header', 'is_active' => true]
        );
        $mainMenu->allItems()->delete();

        $headerSeedItems = $menus[0]['settings']['items'] ?? [];
        $order = 1;
        foreach ($headerSeedItems as $hItem) {
            $parent = MenuItem::create([
                'menu_id' => $mainMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $hItem['label'],
                'url' => $hItem['url'],
                'target' => '_self',
                'order' => $order++,
            ]);

            if (! empty($hItem['children'])) {
                $childOrder = 1;
                foreach ($hItem['children'] as $cItem) {
                    MenuItem::create([
                        'menu_id' => $mainMenu->id,
                        'project_id' => $projectId,
                        'tenant_id' => $tenantId,
                        'parent_id' => $parent->id,
                        'title' => $cItem['label'],
                        'url' => $cItem['url'],
                        'target' => '_self',
                        'order' => $childOrder++,
                    ]);
                }
            }
        }

        $this->command?->info('✓ Seeded navigation menus for WKComputer.');
    }
}
