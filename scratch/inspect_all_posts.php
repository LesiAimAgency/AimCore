<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Taxonomy;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$posts = Post::where('project_id', 10)->where('post_type', 'post')->get();
echo 'Total posts for project 10: '.$posts->count()."\n\n";

foreach ($posts as $p) {
    $taxNames = $p->taxonomies ? $p->taxonomies->pluck('name')->implode(', ') : 'None';
    $catId = $p->category_id ?? 'NULL';
    echo "ID: {$p->id}\n";
    echo "  Title: {$p->title}\n";
    echo "  Slug: {$p->slug}\n";
    echo "  Status: {$p->status}\n";
    echo "  Category ID: {$catId}\n";
    echo "  Taxonomies: {$taxNames}\n";
    echo "  Thumbnail: {$p->thumbnail}\n";
    echo '  Excerpt: '.mb_substr($p->excerpt ?? '', 0, 80)."...\n";
    echo '  Content length: '.strlen($p->content ?? '')." bytes\n";
    echo "  Created at: {$p->created_at}\n\n";
}

$cats = Taxonomy::where('taxonomy', 'category')->orWhere('taxonomy', 'post_tag')->get();
echo 'Total Taxonomies (category/post_tag): '.$cats->count()."\n";
foreach ($cats as $c) {
    echo "  ID: {$c->id} | Name: {$c->name} | Slug: {$c->slug} | Taxonomy: {$c->taxonomy} | Project ID: {$c->project_id}\n";
}

$categories = Category::all();
echo "\nTotal Categories table: ".$categories->count()."\n";
foreach ($categories as $c) {
    echo "  ID: {$c->id} | Name: {$c->name} | Slug: {$c->slug} | Project ID: ".($c->project_id ?? 'N/A')."\n";
}
