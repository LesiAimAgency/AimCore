<?php

use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "=== COUPONS ===\n";
$coupons = DB::table('coupons')->where('project_id', 10)->get();
print_r($coupons);

echo "\n=== FLASH SALE CAMPAIGNS ===\n";
$campaigns = DB::table('flash_sale_campaigns')->where('project_id', 10)->get();
print_r($campaigns);

echo "\n=== BRANDS ===\n";
$brands = DB::table('brands')->where('project_id', 10)->get();
print_r($brands);

echo "\n=== SHIPPING CARRIERS ===\n";
$carriers = DB::table('shipping_carriers')->where('project_id', 10)->get();
print_r($carriers);

echo "\n=== TERM RELATIONSHIPS COLUMNS ===\n";
print_r(Schema::getColumnListing('term_relationships'));
echo 'Total rows: '.DB::table('term_relationships')->count()."\n";
