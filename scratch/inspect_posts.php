<?php

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$posts = Post::where('post_type', '!=', 'product')
    ->orWhereNull('post_type')
    ->get(['id', 'title', 'slug', 'post_type', 'status', 'project_id']);

echo 'Total non-product posts: '.$posts->count()."\n\n";
foreach ($posts as $p) {
    echo "ID: {$p->id} | Type: '{$p->post_type}' | Status: '{$p->status}' | Project: {$p->project_id} | Slug: '{$p->slug}' | Title: '{$p->title}'\n";
}
