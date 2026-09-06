<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$affected = \Illuminate\Support\Facades\DB::table('product_categories')
    ->where('tenant_id', 4)
    ->where('project_id', 10)
    ->update(['project_id' => 11]);

echo "LOCAL PRODUCT CATEGORIES UPDATED: $affected\n";
