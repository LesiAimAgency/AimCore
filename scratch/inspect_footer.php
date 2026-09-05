<?php

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
echo 'Project ID: '.($project->id ?? 'null')."\n";

$widgets = Widget::where('area', 'footer')
    ->where('project_id', $project->id)
    ->orderBy('sort_order')
    ->get();

echo 'Footer Widgets count: '.$widgets->count()."\n";
foreach ($widgets as $w) {
    echo "ID {$w->id} | Title: {$w->title} | Type: {$w->type} | Active: {$w->is_active} | Order: {$w->sort_order}\n";
    echo '  Settings: '.json_encode($w->settings, JSON_UNESCAPED_UNICODE)."\n";
}

echo "\n--- All widgets with area like footer ---\n";
$allFooter = Widget::where('area', 'like', '%footer%')
    ->where('project_id', $project->id)
    ->get();
foreach ($allFooter as $w) {
    echo "Area: {$w->area} | ID {$w->id} | Title: {$w->title} | Type: {$w->type}\n";
    echo '  Settings: '.json_encode($w->settings, JSON_UNESCAPED_UNICODE)."\n";
}
