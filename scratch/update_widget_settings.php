<?php

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();

// 1. Update Widget #5 (Product Tabs)
$w5 = Widget::find(5);
if ($w5) {
    $settings = $w5->settings;
    $settings['tabs'] = [
        [
            'label' => 'Sản Phẩm Đã Làm Sạch',
            'filter' => 'best_selling',
            'category_id' => [54],
        ],
        [
            'label' => 'Sản Phẩm Tươi cấp đông chưa sơ chế',
            'filter' => 'new',
            'category_id' => [53],
        ],
        [
            'label' => 'Sản Phẩm Ready to Cook',
            'filter' => 'new',
            'category_id' => [55],
        ],
        [
            'label' => 'Các Sản Phẩm khác',
            'filter' => 'new',
            'category_id' => [59],
        ],
    ];
    $w5->settings = $settings;
    $w5->save();
    echo "Updated Widget #5 settings successfully.\n";
}

// 2. Update Widget #3 (Product Featured - Sản phẩm mới)
$w3 = Widget::find(3);
if ($w3) {
    $settings = $w3->settings;
    $settings['source'] = 'all';
    $settings['order_by'] = 'latest';
    $settings['limit'] = 20;
    $settings['columns'] = '5';
    $settings['layout'] = 'slider';
    $w3->settings = $settings;
    $w3->save();
    echo "Updated Widget #3 settings successfully.\n";
}

// 3. Update Widget #6 (Top Trending)
$w6 = Widget::find(6);
if ($w6) {
    $settings = $w6->settings;
    $settings['order_by'] = 'views_desc';
    $settings['limit'] = 12;
    $settings['columns'] = '6';
    $settings['layout'] = 'slider';
    $w6->settings = $settings;
    $w6->save();
    echo "Updated Widget #6 settings successfully.\n";
}
