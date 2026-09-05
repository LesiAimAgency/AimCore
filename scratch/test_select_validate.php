<?php

use App\Models\ProductCategory;
use App\Widgets\Viettinmart\ViettinmartProductFeaturedWidget;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$config = ViettinmartProductFeaturedWidget::getConfig();
try {
    $cats = ProductCategory::withoutGlobalScopes()->orderBy('name')->get();
    echo 'Found '.count($cats)." categories\n";
} catch (Throwable $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
}
