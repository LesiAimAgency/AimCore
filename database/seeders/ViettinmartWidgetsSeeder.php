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

        // Delete existing widgets for this project
        Widget::where('project_id', $projectId)->delete();

        foreach ($widgets as $item) {
            $settings = $item['settings'];
            if (is_string($settings)) {
                $settings = json_decode($settings, true) ?? [];
            }

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
