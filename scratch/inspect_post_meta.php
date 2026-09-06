<?php

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$post = Post::where('post_type', 'product')->first();
echo 'Raw original: '.var_export($post->getRawOriginal('meta_data'), true)."\n";
echo 'meta_data attr: '.var_export($post->meta_data, true)."\n";
echo 'sku: '.var_export($post->sku, true)."\n";
echo 'display_price: '.var_export($post->display_price, true)."\n";
