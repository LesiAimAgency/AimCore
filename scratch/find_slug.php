<?php

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$p = Post::where('title', 'like', '%Tôm Thẻ%')->first();
if ($p) {
    echo "ID: {$p->id}\nTitle: {$p->title}\nSlug: {$p->slug}\nStock: {$p->stock}\n";
} else {
    echo "Not found\n";
}
