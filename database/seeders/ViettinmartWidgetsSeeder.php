<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ViettinmartWidgetsSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first() ?? Project::find(10);
            $projectId = $project ? $project->id : 10;
        }
        $tenantId = $tenantId ?? $projectId;

        if (! Schema::hasTable('widgets')) {
            return;
        }

        $widgetsFile = database_path('seeders/data/viettinmart/p10_widgets.json');
        if (! File::exists($widgetsFile)) {
            $this->command?->warn("Widgets JSON not found at {$widgetsFile}");

            return;
        }

        $this->command?->info("Seeding authentic 30 Viettinmart widgets for project {$projectId}...");

        $widgets = json_decode(File::get($widgetsFile), true) ?? [];

        // Build category ID remapping table: old_id => new_id
        $categoryMap = [];
        $p10CatFile = database_path('seeders/data/viettinmart/p10_product_categories.json');
        if (File::exists($p10CatFile) && Schema::hasTable('product_categories')) {
            $p10Cats = json_decode(File::get($p10CatFile), true) ?? [];
            $currentCats = \App\Models\ProductCategory::withoutGlobalScopes()
                ->where('project_id', $projectId)
                ->pluck('id', 'slug')
                ->toArray();

            foreach ($p10Cats as $p10c) {
                $slug = $p10c['slug'];
                if (isset($currentCats[$slug])) {
                    $categoryMap[$p10c['id']] = $currentCats[$slug];
                    $categoryMap[(string) $p10c['id']] = (string) $currentCats[$slug];
                }
            }
        }

        // Delete existing widgets for this project
        Widget::where('project_id', $projectId)->delete();

        foreach ($widgets as $item) {
            $settings = $item['settings'];
            if (is_string($settings)) {
                $settings = json_decode($settings, true) ?? [];
            }

            // Sanitize settings string or array of any localhost or external domain prefixes
            $settingsJson = json_encode($settings);
            $settingsJson = str_replace([
                'http:\/\/127.0.0.1:8000\/',
                'http://127.0.0.1:8000/',
                'https:\/\/viettinmart.vnglobaltech.com\/',
                'https://viettinmart.vnglobaltech.com/',
                'https:\/\/viettinmart.vnglobaltech.commedia\/',
                'https://viettinmart.vnglobaltech.commedia/',
            ], [
                '\/',
                '/',
                '\/',
                '/',
                '\/storage\/media\/',
                '/storage/media/',
            ], $settingsJson);
            $settings = json_decode($settingsJson, true) ?? [];

            // Remap category IDs if present
            if (! empty($categoryMap)) {
                if (isset($settings['category_id']) && ! empty($settings['category_id'])) {
                    if (is_array($settings['category_id'])) {
                        $settings['category_id'] = array_map(fn($id) => $categoryMap[$id] ?? $id, $settings['category_id']);
                    } elseif (isset($categoryMap[$settings['category_id']])) {
                        $settings['category_id'] = (string) $categoryMap[$settings['category_id']];
                    }
                }

                if (isset($settings['tabs']) && is_array($settings['tabs'])) {
                    foreach ($settings['tabs'] as $tIdx => $tab) {
                        if (isset($tab['category_id']) && ! empty($tab['category_id'])) {
                            $settings['tabs'][$tIdx]['category_id'] = array_map(
                                fn($id) => $categoryMap[$id] ?? $id,
                                (array) $tab['category_id']
                            );
                        }
                    }
                }
            }

            $settings['project_id'] = $projectId;
            $settings['tenant_id'] = $tenantId;

            Widget::create([
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'name' => $item['name'],
                'type' => $item['type'],
                'area' => $item['area'],
                'sort_order' => $item['sort_order'] ?? 0,
                'is_active' => (bool) ($item['is_active'] ?? true),
                'settings' => $settings,
            ]);
        }

        $this->command?->info('✓ Seeded '.count($widgets).' authentic widgets for Viettinmart!');
    }
}
