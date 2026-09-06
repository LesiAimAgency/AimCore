<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$w = \App\Models\Widget::where('project_id', 10)->where('sort_order', 9)->first();
if ($w) {
    echo "Widget: {$w->name} [{$w->type}]\n";
    echo "Settings: " . json_encode($w->settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
    $settings = $w->settings;
    $settings['project_id'] = 10;
    $inst = new \App\Widgets\Viettinmart\ViettinmartProductFeaturedWidget($settings);
    $html = $inst->render();
    preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $html, $m);
    echo "\nImages found in rendered HTML:\n";
    foreach ($m[1] as $img) {
        echo "  - $img\n";
    }
} else {
    echo "No widget with sort_order 9\n";
}
