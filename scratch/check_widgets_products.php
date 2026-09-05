<?php

use App\Models\Post;
use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();

echo "=== PRODUCTS_ENHANCED (project_id 10) ===\n";
$prods = DB::table('products_enhanced')
    ->where('project_id', $project->id)
    ->select('id', 'name', 'product_category_id', 'status', 'is_featured', 'price', 'sale_price')
    ->get();

$byCat = [];
foreach ($prods as $p) {
    $byCat[$p->product_category_id][] = $p->id.': '.$p->name;
}
foreach ($byCat as $catId => $items) {
    echo "Cat $catId (".count($items)." products):\n";
    foreach (array_slice($items, 0, 3) as $it) {
        echo "  - $it\n";
    }
}

echo "\n=== POSTS (post_type product, project_id 10) ===\n";
$posts = Post::where('post_type', 'product')
    ->where('project_id', $project->id)
    ->with('taxonomies')
    ->get();

$postByTax = [];
foreach ($posts as $p) {
    $taxIds = $p->taxonomies->pluck('id')->toArray();
    $key = implode(',', $taxIds) ?: 'none';
    $postByTax[$key][] = $p->id.': '.$p->title;
}
foreach ($postByTax as $taxId => $items) {
    echo "Tax $taxId (".count($items)." products):\n";
    foreach (array_slice($items, 0, 3) as $it) {
        echo "  - $it\n";
    }
}
