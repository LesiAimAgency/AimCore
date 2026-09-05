<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$indexes = DB::select("SHOW INDEXES FROM posts WHERE Column_name = 'slug'");
foreach ($indexes as $idx) {
    echo "Index: {$idx->Key_name} | Non_unique: {$idx->Non_unique} | Col: {$idx->Column_name}\n";
}
