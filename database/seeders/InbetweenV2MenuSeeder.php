<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Project;
use App\Services\MenuService;
use Illuminate\Database\Seeder;

class InbetweenV2MenuSeeder extends Seeder
{
    /**
     * Run the database seeds for Inbetween V2 Navigation Menus.
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        // 1. Xác định Project & Tenant của Inbetween V2
        if (! $projectId) {
            $project = Project::where('code', 'DA005')
                ->orWhere('code', 'inbetween_v2')
                ->orWhere('name', 'like', '%INBETWEEN%')
                ->orWhereJsonContains('features->theme', 'inbetween_v2')
                ->first();

            $projectId = $project ? $project->id : 7;
            $tenantId = $tenantId ?? $project?->tenant_id ?? 6;
        } else {
            $project = Project::find($projectId);
            $tenantId = $tenantId ?? $project?->tenant_id ?? $projectId;
        }

        $tenantId = $tenantId ?? $projectId;

        // 2. Dữ liệu chuẩn cho Inbetween V2 Menu
        $menus = [
            // Menu 1: Header Navigation (Slug inbetween-v2-header)
            [
                'name' => 'Inbetween V2 Header Navigation',
                'slug' => 'inbetween-v2-header',
                'location' => 'header',
                'sort_order' => 1,
                'items' => [
                    ['title' => 'HOME', 'url' => '#inbetween-intro'],
                    ['title' => 'ABOUT', 'url' => '#inbetween-hero'],
                    ['title' => 'WHAT WE DO', 'url' => '#inbetween-what-we-do'],
                    ['title' => 'WHERE WE FOCUS', 'url' => '#inbetween-where-we-focus'],
                    ['title' => 'FOUNDER', 'url' => '#inbetween-founder'],
                    ['title' => 'OUR CLIENTS', 'url' => '#inbetween-our-clients'],
                    ['title' => 'BEYOND BUSINESS', 'url' => '#inbetween-business'],
                    ['title' => 'MEDIA', 'url' => '#inbetween-business'],
                    ['title' => 'CONTACT', 'url' => '#inbetween-footer'],
                ],
            ],

            // Menu 2: Main Menu tương thích ngược (Slug main-menu)
            [
                'name' => 'Main Menu',
                'slug' => 'main-menu',
                'location' => 'header',
                'sort_order' => 0,
                'items' => [
                    ['title' => 'HOME', 'url' => '#inbetween-intro'],
                    ['title' => 'ABOUT', 'url' => '#inbetween-hero'],
                    ['title' => 'WHAT WE DO', 'url' => '#inbetween-what-we-do'],
                    ['title' => 'WHERE WE FOCUS', 'url' => '#inbetween-where-we-focus'],
                    ['title' => 'FOUNDER', 'url' => '#inbetween-founder'],
                    ['title' => 'OUR CLIENTS', 'url' => '#inbetween-our-clients'],
                    ['title' => 'BEYOND BUSINESS', 'url' => '#inbetween-business'],
                    ['title' => 'MEDIA', 'url' => '#inbetween-business'],
                    ['title' => 'CONTACT', 'url' => '#inbetween-footer'],
                ],
            ],

            // Menu 3: Footer Menu (Slug footer-menu)
            [
                'name' => 'Footer Menu',
                'slug' => 'footer-menu',
                'location' => 'footer',
                'sort_order' => 1,
                'items' => [
                    ['title' => 'About Us', 'url' => '#inbetween-hero'],
                    ['title' => 'Media', 'url' => '#inbetween-business'],
                    ['title' => 'Beyond Business', 'url' => '#inbetween-business'],
                    ['title' => 'Contact', 'url' => '#inbetween-footer'],
                ],
            ],
        ];

        // 3. Tiến hành đồng bộ vào Database
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

            // Xóa item cũ để sync lại danh sách mới nhất
            $menu->allItems()->delete();

            $order = 1;
            foreach ($m['items'] as $item) {
                MenuItem::withoutGlobalScopes()->create([
                    'menu_id' => $menu->id,
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'title' => $item['title'],
                    'url' => $item['url'],
                    'target' => '_self',
                    'order' => $order++,
                    'is_active' => true,
                ]);
            }
        }

        // Xóa cache menu nếu có service
        if (class_exists(MenuService::class) && method_exists(MenuService::class, 'clearMenuCache')) {
            MenuService::clearMenuCache($projectId);
        }

        $this->command?->info("✓ Đã đồng bộ thành công Navigation Menus cho Inbetween V2 (Project ID: {$projectId}).");
    }
}
