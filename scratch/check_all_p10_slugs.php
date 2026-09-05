<?php

use App\Models\Post;
use App\Models\Taxonomy;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "=== PROJECT 10 POSTS & PAGES ===\n";
$posts = Post::where('project_id', 10)->get(['id', 'title', 'slug', 'post_type', 'status']);
foreach ($posts as $p) {
    echo "ID {$p->id} | {$p->post_type} | Slug: '{$p->slug}' | Title: '{$p->title}'\n";
}

echo "\n=== PROJECT 10 TAXONOMIES ===\n";
$taxonomies = Taxonomy::where('project_id', 10)->get(['id', 'name', 'slug', 'taxonomy']);
foreach ($taxonomies as $t) {
    echo "ID {$t->id} | {$t->taxonomy} | Slug: '{$t->slug}' | Name: '{$t->name}'\n";
}
