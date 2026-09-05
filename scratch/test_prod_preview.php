<?php

use App\Widgets\WidgetRegistry;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$preview = WidgetRegistry::getPreview('vtm_product_featured', [
    'title' => 'Sản phẩm tươi cấp đông chưa sơ chế',
    'category_id' => '53',
    'layout' => 'slider',
    'columns' => '5',
]);

echo "OUTPUT:\n".$preview."\n";

$previewGrid = WidgetRegistry::getPreview('vtm_product_featured', [
    'title' => 'Sản phẩm tươi cấp đông chưa sơ chế',
    'category_id' => '53',
    'layout' => 'grid',
    'columns' => '4',
]);
echo 'Grid Has col-lg-3: '.(str_contains($previewGrid, 'col-lg-3') ? 'YES' : 'NO')."\n";
