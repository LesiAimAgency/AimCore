<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

if (Schema::hasTable('order_status_histories')) {
    echo "order_status_histories columns:\n" . implode(', ', Schema::getColumnListing('order_status_histories')) . "\n\n";
} else {
    echo "order_status_histories table NOT FOUND\n";
}
