<?php
use App\Models\Product;
use Illuminate\Contracts\Console\Kernel;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$p = Product::find(118);
echo "SLUG: " . $p->slug . "\n";
echo "LOCAL: " . url('/viettinmart-eco/san-pham/' . $p->slug) . "\n";
echo "PROD: " . 'https://aimagency.vn/viettinmart-eco/san-pham/' . $p->slug . "\n";
