<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$count = DB::table('products_enhanced')
    ->where('description', 'like', '%tblGeneralAttribute%')
    ->count();

$tableCount = DB::table('products_enhanced')
    ->where('description', 'like', '%<table%')
    ->count();

echo "tblGeneralAttribute count: $count\n";
echo "table count: $tableCount\n";
