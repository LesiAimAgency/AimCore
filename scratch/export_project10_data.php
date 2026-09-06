<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

$projectId = 10;

// 1. Categories
$taxonomies = DB::table('taxonomies')->where('project_id', $projectId)->get();
$productCategories = DB::table('product_categories')->where('project_id', $projectId)->get();

// 2. Products Enhanced
$products = DB::table('products_enhanced')->where('project_id', $projectId)->get();

// 3. Posts (Products & Blog posts)
$posts = DB::table('posts')->where('project_id', $projectId)->get();

// 4. Taxonomy Relationships
$postTaxonomies = DB::table('term_relationships')
    ->whereIn('object_id', $posts->pluck('id'))
    ->get();

$prodCatPivot = DB::table('product_category_product')
    ->whereIn('product_id', $products->pluck('id'))
    ->get();

// 5. Widgets
$widgets = DB::table('widgets')->where('project_id', $projectId)->get();

echo 'Taxonomies: '.count($taxonomies)."\n";
echo 'Product Categories: '.count($productCategories)."\n";
echo 'Products Enhanced: '.count($products)."\n";
echo 'Posts: '.count($posts)."\n";
echo 'Widgets: '.count($widgets)."\n";

file_put_contents(__DIR__.'/p10_taxonomies.json', json_encode($taxonomies, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents(__DIR__.'/p10_product_categories.json', json_encode($productCategories, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents(__DIR__.'/p10_products.json', json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents(__DIR__.'/p10_posts.json', json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents(__DIR__.'/p10_post_taxonomies.json', json_encode($postTaxonomies, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents(__DIR__.'/p10_product_category_product.json', json_encode($prodCatPivot, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents(__DIR__.'/p10_widgets.json', json_encode($widgets, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo "Exported successfully to scratch/!\n";
