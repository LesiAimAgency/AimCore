<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$w = \App\Models\Widget::where('project_id', 10)->where('type', 'vtm_deal_flash')->first();
$settings = $w->settings;
$settings['project_id'] = 10;
$inst = new \App\Widgets\Viettinmart\ViettinmartDealFlashWidget($settings);
$html = $inst->render();
preg_match_all('/<img[^>]+>/i', $html, $matches);
foreach (array_slice($matches[0], 0, 5) as $tag) {
    echo $tag . "\n";
}
