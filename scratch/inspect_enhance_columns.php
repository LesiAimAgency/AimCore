<?php

use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "flash_sale_items columns:\n";
print_r(Schema::getColumnListing('flash_sale_items'));

echo "\nbrands columns:\n";
print_r(Schema::getColumnListing('brands'));

echo "\nshipping_carriers columns:\n";
print_r(Schema::getColumnListing('shipping_carriers'));

echo "\nmodal_forms columns:\n";
print_r(Schema::getColumnListing('modal_forms'));
