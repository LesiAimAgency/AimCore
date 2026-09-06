<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$indexes = DB::select('SHOW INDEXES FROM products_enhanced');
foreach ($indexes as $idx) {
    echo $idx->Key_name . ' | ' . $idx->Column_name . ' | Non_unique: ' . $idx->Non_unique . PHP_EOL;
}
