<?php

use App\Models\Widget;
use App\Widgets\Viettinmart\ViettinmartHeroSliderWidget;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$w = Widget::where('type', 'vtm_hero_slider')->first();
if ($w) {
    echo "SETTINGS:\n";
    print_r($w->settings);
    $widgetObj = new ViettinmartHeroSliderWidget($w->settings);
    echo "\nHTML:\n";
    echo $widgetObj->getPreview();
} else {
    echo "Not found\n";
}
