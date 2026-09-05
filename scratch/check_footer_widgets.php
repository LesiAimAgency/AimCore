<?php

use App\Models\Project;
use App\Models\Widget;
use App\Services\WidgetRenderingService;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
request()->attributes->set('project', $project);

echo "=== FOOTER WIDGETS IN DB FOR PROJECT {$project->id} ===\n";

$widgets = Widget::where('project_id', $project->id)
    ->where('area', 'footer')
    ->orderBy('sort_order')
    ->get();

echo 'Found '.$widgets->count()." widgets in area 'footer':\n";
foreach ($widgets as $w) {
    echo "ID {$w->id} | Name: '{$w->name}' | Type: '{$w->type}' | Active: {$w->is_active} | Order: {$w->sort_order}\n";
    echo '  Settings: '.json_encode($w->settings, JSON_UNESCAPED_UNICODE)."\n";
}

echo "\n=== TESTING WidgetRenderingService::renderArea('footer') ===\n";
$service = new WidgetRenderingService;
$html = $service->renderArea('footer');
echo 'Rendered HTML length: '.strlen($html)." bytes\n";
echo "HTML preview:\n".substr($html, 0, 500)."\n...\n";
