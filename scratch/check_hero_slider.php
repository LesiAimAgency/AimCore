<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$w = \App\Models\Widget::where('type', 'vtm_hero_slider')->first();
if (!$w) {
    echo "NO WIDGET FOUND\n";
    exit;
}

echo "Widget ID: {$w->id}, project_id: {$w->project_id}\n";
echo "Settings:\n";
print_r($w->settings);

$instance = new \App\Widgets\Viettinmart\ViettinmartHeroSliderWidget($w->settings);
echo "\nRendered HTML:\n";
echo $instance->render();
