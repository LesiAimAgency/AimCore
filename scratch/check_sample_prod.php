<?php

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$p = Post::where('post_type', 'product')->where('slug', 'tom-the-hl-cap-dong')->first();
echo json_encode([
    'title' => $p->title,
    'sku' => $p->sku,
    'display_price' => $p->display_price,
    'stock' => $p->stock_quantity,
    'stock_status' => $p->stock_status,
], JSON_PRETTY_PRINT);
