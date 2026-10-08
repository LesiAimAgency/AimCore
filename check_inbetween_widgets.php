<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$oldTypes = [
    'inbetween_theme',
    'inbetween_master',
    'inbetween_landing',
    'inbetween_hero_section',
    'inbetween_community_collage',
    'inbetween_community_statement',
    'inbetween_core_values',
    'inbetween_founder_section',
    'inbetween_upcoming_events',
    'inbetween_media_stories',
    'inbetween_packages',
];

$deletedTypes = App\Models\Widget::withoutGlobalScope('tenant')
    ->whereIn('type', $oldTypes)
    ->delete();

$deletedAreas = App\Models\Widget::withoutGlobalScope('tenant')
    ->where('area', 'like', 'inbetween-%')
    ->delete();

echo "Deleted old type widgets: $deletedTypes\n";
echo "Deleted old area widgets: $deletedAreas\n";

$remaining = App\Models\Widget::withoutGlobalScope('tenant')
    ->where('type', 'like', '%inbetween%')
    ->orWhere('area', 'like', '%inbetween%')
    ->get(['id', 'name', 'type', 'area', 'project_id', 'tenant_id']);

echo "Remaining inbetween widgets (" . $remaining->count() . "):\n";
foreach ($remaining as $w) {
    echo " - ID: {$w->id} | {$w->name} | {$w->type} | {$w->area} | Proj: {$w->project_id} | Tenant: {$w->tenant_id}\n";
}




