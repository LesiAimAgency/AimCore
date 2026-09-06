<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/viettinmart-eco/danh-muc/hang-ready-to-cook', 'GET');
$response = $kernel->handle($request);

// Now let's check manually what ShopController would do
$project = App\Models\Project::where('code', 'viettinmart-eco')->first();
$slug = 'hang-ready-to-cook';

echo "Project ID: {$project->id}\n";
echo "Active project products total: " . App\Models\Product::where('project_id', $project->id)->active()->count() . "\n";

// Let's check Category in ShopController
$cat = App\Models\Category::where('slug', $slug)->first();
echo "Category with Category::where('slug', '$slug')->first(): " . ($cat ? "ID {$cat->id}, Name {$cat->name}" : "NULL") . "\n";

$catProd = App\Models\ProductCategory::where('slug', $slug)->first();
echo "Category with ProductCategory::where('slug', '$slug')->first(): " . ($catProd ? "ID {$catProd->id}, Name {$catProd->name}" : "NULL") . "\n";

$prodsWithCat = App\Models\Product::where('project_id', $project->id)->whereHas('categories', function($q) use ($slug) {
    $q->where('slug', $slug);
})->get();
echo "Products with whereHas('categories'): " . $prodsWithCat->count() . "\n";
foreach ($prodsWithCat as $p) {
    echo " - Product: {$p->id} - {$p->name} (status: {$p->status})\n";
}

$prodsWithCatId = App\Models\Product::where('project_id', $project->id)->where('product_category_id', $cat ? $cat->id : 0)->get();
echo "Products with where('product_category_id', ...): " . $prodsWithCatId->count() . "\n";
