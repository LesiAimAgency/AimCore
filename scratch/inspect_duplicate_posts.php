<?php

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$posts = Post::whereIn('id', [49, 50, 51, 52, 53, 54])->get();
foreach ($posts as $p) {
    echo "ID {$p->id} | Slug: '{$p->slug}' | Created: {$p->created_at} | Content len: ".strlen($p->content)."\n";
}
