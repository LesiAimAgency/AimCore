<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Project;
use Illuminate\Database\Seeder;

class InbetweenV2MenuSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        $targetProjects = $projectId
            ? Project::withoutGlobalScopes()->where('id', $projectId)->get()
            : Project::withoutGlobalScopes()
                ->where(function ($q) {
                    $q->whereIn('code', ['inbetween_v2', 'DA005', 'inbetween'])
                        ->orWhere('name', 'like', '%INBETWEEN%')
                        ->orWhere('name', 'like', '%Inbetween%');
                })
                ->get();

        if ($targetProjects->isEmpty()) {
            $fallback = Project::withoutGlobalScopes()->find(7) ?? Project::withoutGlobalScopes()->first();
            if ($fallback) {
                $targetProjects = collect([$fallback]);
            }
        }

        foreach ($targetProjects as $proj) {
            $this->seedForProject($proj->id, $tenantId ?? $proj->tenant_id ?? 6);
        }
    }

    public function seedForProject(int $projectId, int $tenantId): void
    {
        // 1. Header Navigation Menu (Inbetween V2 Header Navigation)
        $headerMenu = Menu::withoutGlobalScopes()->updateOrCreate(
            [
                'project_id' => $projectId,
                'slug' => 'inbetween-v2-header',
            ],
            [
                'tenant_id' => $tenantId,
                'name' => 'Inbetween V2 Header Navigation',
                'location' => 'header',
                'is_active' => true,
            ]
        );

        $headerMenu->allItems()->delete();

        $headerItems = [
            ['title' => 'HOME', 'url' => '#inbetween-intro', 'order' => 1],
            ['title' => 'ABOUT', 'url' => '#inbetween-hero', 'order' => 2],
            ['title' => 'WHAT WE DO', 'url' => '#inbetween-what-we-do', 'order' => 3],
            ['title' => 'WHERE WE FOCUS', 'url' => '#inbetween-where-we-focus', 'order' => 4],
            ['title' => 'FOUNDER', 'url' => '#inbetween-founder', 'order' => 5],
            ['title' => 'OUR CLIENTS', 'url' => '#inbetween-our-clients', 'order' => 6],
            ['title' => 'BEYOND BUSINESS', 'url' => '#inbetween-business', 'order' => 7],
            ['title' => 'MEDIA', 'url' => '#inbetween-business', 'order' => 8],
            ['title' => 'CONTACT', 'url' => '#inbetween-footer', 'order' => 9],
        ];

        foreach ($headerItems as $item) {
            MenuItem::create([
                'menu_id' => $headerMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $item['title'],
                'url' => $item['url'],
                'target' => '_self',
                'order' => $item['order'],
                'is_active' => true,
            ]);
        }

        // 2. Footer Menu (Footer Menu)
        $footerMenu = Menu::withoutGlobalScopes()->updateOrCreate(
            [
                'project_id' => $projectId,
                'slug' => 'footer-menu',
            ],
            [
                'tenant_id' => $tenantId,
                'name' => 'Footer Menu',
                'location' => 'footer',
                'is_active' => true,
            ]
        );

        $footerMenu->allItems()->delete();

        $footerItems = [
            ['title' => 'About Us', 'url' => '#inbetween-hero', 'order' => 1],
            ['title' => 'What We Do', 'url' => '#inbetween-what-we-do', 'order' => 2],
            ['title' => 'Where We Focus', 'url' => '#inbetween-where-we-focus', 'order' => 3],
            ['title' => 'Our Clients', 'url' => '#inbetween-our-clients', 'order' => 4],
            ['title' => 'Beyond Business', 'url' => '#inbetween-business', 'order' => 5],
        ];

        foreach ($footerItems as $item) {
            MenuItem::create([
                'menu_id' => $footerMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $item['title'],
                'url' => $item['url'],
                'target' => '_self',
                'order' => $item['order'],
                'is_active' => true,
            ]);
        }

        $this->command?->info("Inbetween V2 Menus (Header & Footer) seeded successfully for Project ID: {$projectId}!");
    }
}
