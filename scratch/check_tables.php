<?php

use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$tables = DB::select('SHOW TABLES');
foreach ($tables as $t) {
    $arr = (array) $t;
    $tableName = array_values($arr)[0];

    // Count rows for project_id = 10 if column exists
    $hasProjectId = Schema::hasColumn($tableName, 'project_id');
    $count = 0;
    if ($hasProjectId) {
        $count = DB::table($tableName)->where('project_id', 10)->count();
    }
    $total = DB::table($tableName)->count();

    if ($count > 0 || in_array($tableName, ['coupons', 'flash_sale_campaigns', 'flash_sale_items', 'orders', 'order_items', 'reviews', 'brands', 'taxonomies', 'product_categories', 'agents', 'user_addresses', 'form_templates', 'modal_forms', 'form_submissions', 'widgets', 'posts', 'products_enhanced', 'settings', 'project_settings'])) {
        echo sprintf("%-30s | Total: %4d | Project 10: %4d\n", $tableName, $total, $count);
    }
}
