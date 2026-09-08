<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$row = (array)Illuminate\Support\Facades\DB::table('products_enhanced')->where('project_id', 14)->first();
echo json_encode(array_slice($row, 0, 15), JSON_PRETTY_PRINT);
