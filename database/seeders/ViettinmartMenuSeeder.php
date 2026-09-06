<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Project;
use App\Models\Widget;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ViettinmartMenuSeeder extends Seeder
{
    public function run(int $projectId = 10, int $tenantId = 3): void
    {
        // Delete only type=menu for this project
        Widget::where('project_id', $projectId)->where('type', 'menu')->delete();

        $menus = [
            // 1. Header — Tiếng Việt
            [
                'name' => 'Menu Header — Tiếng Việt',
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
                            'label' => 'Cửa hàng',
                            'url' => '/cua-hang',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [
                                [
                                    'id' => 'nav_shop_all',
                                    'label' => 'Tất cả sản phẩm',
                                    'url' => '/cua-hang',
                                    'type' => 'Route',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_shop_rau',
                                    'label' => 'Rau củ quả',
                                    'url' => '/cua-hang?danh-muc=rau-cu-qua',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_shop_thit',
                                    'label' => 'Thịt & Hải sản',
                                    'url' => '/cua-hang?danh-muc=thit-hai-san',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_shop_donglanh',
                                    'label' => 'Thực phẩm đông lạnh',
                                    'url' => '/cua-hang?danh-muc=dong-lanh',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_shop_douong',
                                    'label' => 'Đồ uống',
                                    'url' => '/cua-hang?danh-muc=do-uong',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_shop_banhkeo',
                                    'label' => 'Bánh kẹo & Snack',
                                    'url' => '/cua-hang?danh-muc=banh-keo',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                            ],
                        ],
                        [
                            'id' => 'nav_blog',
                            'label' => 'Blog',
                            'url' => '/blog',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                        [
                            'id' => 'nav_pages',
                            'label' => 'Thông tin',
                            'url' => '#',
                            'type' => 'Link',
                            'target' => false,
                            'children' => [
                                [
                                    'id' => 'nav_about',
                                    'label' => 'Giới thiệu',
                                    'url' => '/gioi-thieu',
                                    'type' => 'Page',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_contact',
                                    'label' => 'Liên hệ',
                                    'url' => '/lien-he',
                                    'type' => 'Route',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_track',
                                    'label' => 'Theo dõi đơn hàng',
                                    'url' => '/order-track',
                                    'type' => 'Route',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'nav_faq',
                                    'label' => 'Câu hỏi thường gặp',
                                    'url' => '/faq',
                                    'type' => 'Page',
                                    'target' => false,
                                ],
                            ],
                        ],
                        [
                            'id' => 'nav_contact_direct',
                            'label' => 'Liên hệ',
                            'url' => '/lien-he',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                    ],
                ],
            ],

            // 2. Header — English
            [
                'name' => 'Menu Header — English',
                'type' => 'menu',
                'area' => 'header-menu',
                'sort_order' => 2,
                'is_active' => true,
                'settings' => [
                    'locale' => 'en',
                    'items' => [
                        [
                            'id' => 'en_nav_home',
                            'label' => 'Home',
                            'url' => '/en/',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                        [
                            'id' => 'en_nav_shop',
                            'label' => 'Shop',
                            'url' => '/en/cua-hang',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [
                                [
                                    'id' => 'en_nav_shop_all',
                                    'label' => 'All Products',
                                    'url' => '/en/cua-hang',
                                    'type' => 'Route',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'en_nav_shop_veg',
                                    'label' => 'Vegetables & Fruits',
                                    'url' => '/en/cua-hang?danh-muc=rau-cu-qua',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'en_nav_shop_meat',
                                    'label' => 'Meat & Seafood',
                                    'url' => '/en/cua-hang?danh-muc=thit-hai-san',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'en_nav_shop_frozen',
                                    'label' => 'Frozen Food',
                                    'url' => '/en/cua-hang?danh-muc=dong-lanh',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'en_nav_shop_drinks',
                                    'label' => 'Beverages',
                                    'url' => '/en/cua-hang?danh-muc=do-uong',
                                    'type' => 'Category',
                                    'target' => false,
                                ],
                            ],
                        ],
                        [
                            'id' => 'en_nav_blog',
                            'label' => 'Blog',
                            'url' => '/en/blog',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                        [
                            'id' => 'en_nav_pages',
                            'label' => 'About',
                            'url' => '#',
                            'type' => 'Link',
                            'target' => false,
                            'children' => [
                                [
                                    'id' => 'en_nav_about',
                                    'label' => 'About Us',
                                    'url' => '/en/gioi-thieu',
                                    'type' => 'Page',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'en_nav_contact',
                                    'label' => 'Contact',
                                    'url' => '/en/lien-he',
                                    'type' => 'Route',
                                    'target' => false,
                                ],
                                [
                                    'id' => 'en_nav_track',
                                    'label' => 'Track Order',
                                    'url' => '/en/order-track',
                                    'type' => 'Route',
                                    'target' => false,
                                ],
                            ],
                        ],
                        [
                            'id' => 'en_nav_contact_direct',
                            'label' => 'Contact',
                            'url' => '/en/lien-he',
                            'type' => 'Route',
                            'target' => false,
                            'children' => [],
                        ],
                    ],
                ],
            ],

            // 3. Footer: Về công ty
            [
                'name' => 'Menu — Về công ty (footer-info)',
                'type' => 'menu',
                'area' => 'footer-info',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'locale' => 'vi',
                    'items' => [
                        ['id' => 'fi_1', 'label' => 'Giới thiệu', 'url' => '/gioi-thieu', 'type' => 'Page', 'target' => false, 'children' => []],
                        ['id' => 'fi_2', 'label' => 'Tuyển dụng', 'url' => '/tuyen-dung', 'type' => 'Page', 'target' => false, 'children' => []],
                        ['id' => 'fi_3', 'label' => 'Tin tức & Sự kiện', 'url' => '/blog', 'type' => 'Route', 'target' => false, 'children' => []],
                        ['id' => 'fi_4', 'label' => 'Liên hệ', 'url' => '/lien-he', 'type' => 'Route', 'target' => false, 'children' => []],
                        ['id' => 'fi_5', 'label' => 'Chính sách bảo mật', 'url' => '/chinh-sach-bao-mat', 'type' => 'Page', 'target' => false, 'children' => []],
                    ],
                ],
            ],

            // 4. Footer: Danh mục sản phẩm
            [
                'name' => 'Menu — Danh mục sản phẩm (footer-categories)',
                'type' => 'menu',
                'area' => 'footer-categories',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'locale' => 'vi',
                    'items' => [
                        ['id' => 'fc_1', 'label' => 'Rau củ quả', 'url' => '/cua-hang?danh-muc=rau-cu-qua', 'type' => 'Category', 'target' => false, 'children' => []],
                        ['id' => 'fc_2', 'label' => 'Thịt & Hải sản', 'url' => '/cua-hang?danh-muc=thit-hai-san', 'type' => 'Category', 'target' => false, 'children' => []],
                        ['id' => 'fc_3', 'label' => 'Thực phẩm đông lạnh', 'url' => '/cua-hang?danh-muc=dong-lanh', 'type' => 'Category', 'target' => false, 'children' => []],
                        ['id' => 'fc_4', 'label' => 'Đồ uống', 'url' => '/cua-hang?danh-muc=do-uong', 'type' => 'Category', 'target' => false, 'children' => []],
                        ['id' => 'fc_5', 'label' => 'Bánh kẹo & Snack', 'url' => '/cua-hang?danh-muc=banh-keo', 'type' => 'Category', 'target' => false, 'children' => []],
                        ['id' => 'fc_6', 'label' => 'Thực phẩm hữu cơ', 'url' => '/cua-hang?danh-muc=huu-co', 'type' => 'Category', 'target' => false, 'children' => []],
                    ],
                ],
            ],

            // 5. Footer: Liên kết hữu ích
            [
                'name' => 'Menu — Liên kết hữu ích (footer-links)',
                'type' => 'menu',
                'area' => 'footer-links',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'locale' => 'vi',
                    'items' => [
                        ['id' => 'fl_1', 'label' => 'Hướng dẫn mua hàng', 'url' => '/huong-dan-mua-hang', 'type' => 'Page', 'target' => false, 'children' => []],
                        ['id' => 'fl_2', 'label' => 'Chính sách giao hàng', 'url' => '/chinh-sach-giao-hang', 'type' => 'Page', 'target' => false, 'children' => []],
                        ['id' => 'fl_3', 'label' => 'Chính sách đổi trả', 'url' => '/chinh-sach-doi-tra', 'type' => 'Page', 'target' => false, 'children' => []],
                        ['id' => 'fl_4', 'label' => 'Câu hỏi thường gặp', 'url' => '/faq', 'type' => 'Page', 'target' => false, 'children' => []],
                        ['id' => 'fl_5', 'label' => 'Theo dõi đơn hàng', 'url' => '/order-track', 'type' => 'Route', 'target' => false, 'children' => []],
                        ['id' => 'fl_6', 'label' => 'Điều khoản sử dụng', 'url' => '/dieu-khoan-su-dung', 'type' => 'Page', 'target' => false, 'children' => []],
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

        // Also populate Menu & MenuItem models for CMS Menu Management
        $vtmMainMenu = Menu::updateOrCreate(
            ['project_id' => $projectId, 'slug' => 'main-menu'],
            ['tenant_id' => $tenantId, 'name' => 'Menu chính', 'location' => 'header', 'is_active' => true]
        );
        $vtmMainMenu->allItems()->delete();
        $vtmMainItems = [
            ['title' => 'Trang chủ', 'url' => '/', 'order' => 1],
            ['title' => 'Cửa hàng', 'url' => '/cua-hang', 'order' => 2],
            ['title' => 'Blog', 'url' => '/blog', 'order' => 3],
            ['title' => 'Liên hệ', 'url' => '/lien-he', 'order' => 4],
        ];
        foreach ($vtmMainItems as $item) {
            MenuItem::create([
                'menu_id' => $vtmMainMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $item['title'],
                'url' => $item['url'],
                'order' => $item['order'],
            ]);
        }

        $vtmFooterMenu = Menu::updateOrCreate(
            ['project_id' => $projectId, 'slug' => 'footer-menu'],
            ['tenant_id' => $tenantId, 'name' => 'Menu chân trang', 'location' => 'footer', 'is_active' => true]
        );
        $vtmFooterMenu->allItems()->delete();
        $vtmFooterItems = [
            ['title' => 'Hướng dẫn mua hàng', 'url' => '/huong-dan-mua-hang', 'order' => 1],
            ['title' => 'Chính sách giao hàng', 'url' => '/chinh-sach-giao-hang', 'order' => 2],
            ['title' => 'Chính sách đổi trả', 'url' => '/chinh-sach-doi-tra', 'order' => 3],
            ['title' => 'Câu hỏi thường gặp', 'url' => '/faq', 'order' => 4],
        ];
        foreach ($vtmFooterItems as $item) {
            MenuItem::create([
                'menu_id' => $vtmFooterMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $item['title'],
                'url' => $item['url'],
                'order' => $item['order'],
            ]);
        }
    }
}
