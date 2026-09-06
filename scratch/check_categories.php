<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = App\Models\Project::where('code', 'viettinmart-eco')->first();
echo "Project: " . ($project ? $project->id . ' - ' . $project->code : 'NOT FOUND') . PHP_EOL;

if ($project) {
    echo "Categories count for project: " . App\Models\ProductCategory::where('project_id', $project->id)->count() . PHP_EOL;
    $cats = App\Models\ProductCategory::where('project_id', $project->id)->get();
    foreach ($cats as $cat) {
        $prodCountDirect = App\Models\Product::where('project_id', $project->id)->where('product_category_id', $cat->id)->count();
        $prodCountPivot = DB::table('product_category_product')->where('product_category_id', $cat->id)->count();
        echo " - Cat ID: {$cat->id}, Name: {$cat->name}, Slug: {$cat->slug}, Parent: {$cat->parent_id}, Direct Prods: {$prodCountDirect}, Pivot Prods: {$prodCountPivot}" . PHP_EOL;
    }
}
