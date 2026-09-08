<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$count = Illuminate\Support\Facades\DB::table('products_enhanced')
    ->where('description', 'like', '%tblGeneralAttribute%')
    ->count();

$tableCount = Illuminate\Support\Facades\DB::table('products_enhanced')
    ->where('description', 'like', '%<table%')
    ->count();

echo "tblGeneralAttribute count: $count\n";
echo "table count: $tableCount\n";
