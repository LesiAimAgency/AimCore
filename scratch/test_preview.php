<?php

use App\Widgets\Viettinmart\ViettinmartHeroSliderWidget;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

try {
    $w = new ViettinmartHeroSliderWidget([], 'default');
    echo $w->getPreview();
} catch (Throwable $e) {
    echo 'ERROR: '.get_class($e).': '.$e->getMessage()."\n";
}
