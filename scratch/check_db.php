<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

$cols = DB::select('DESCRIBE `viettinmartdemo_demo1`.`products`');
foreach ($cols as $col) {
    echo "Field: {$col->Field} ({$col->Type})\n";
}

echo "\n--- First 3 products ---\n";
$sample = DB::table('viettinmartdemo_demo1.products')->take(3)->get();
foreach ($sample as $s) {
    print_r((array) $s);
}
