<?php

use App\Models\ProductCategory;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

try {
    if (class_exists(ProductCategory::class)) {
        echo "class_exists: YES\n";
        $cats = ProductCategory::withoutGlobalScopes()
            ->orderBy('name')
            ->get();
        echo 'Count: '.$cats->count()."\n";
    } else {
        echo "class_exists: NO\n";
    }
} catch (Throwable $e) {
    echo 'EX: '.$e->getMessage()."\n";
}
