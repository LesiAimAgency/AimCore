<?php

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Project;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\ProjectProductCategory;
use App\Models\Product;
use App\Models\ProjectProduct;
use App\Models\MenuItem;

echo "========================================\n";
echo "1. VERIFY VIETTINMART (Project ID 10, Tenant ID 3)\n";
echo "========================================\n";
$project10 = Project::where('code', 'viettinmart-eco')->first();
request()->attributes->set('project', $project10);
session(['current_project_id' => $project10->id, 'current_tenant_id' => $project10->tenant_id]);
app()->instance('current_project_id', $project10->id);
app()->instance('current_tenant_id', $project10->tenant_id);

echo "Project 10 tenant_id in DB: " . ($project10->tenant_id ?? 'NULL') . "\n";
echo "Category count (scoped): " . Category::count() . "\n";
echo "ProductCategory count (scoped): " . ProductCategory::count() . "\n";
echo "ProjectProductCategory count (scoped): " . ProjectProductCategory::count() . "\n";
echo "Product count (scoped): " . Product::count() . "\n";
echo "ProjectProduct count (scoped): " . ProjectProduct::count() . "\n";
echo "MenuItem count (scoped): " . MenuItem::count() . "\n";

echo "\nCategories in VietTinMart:\n";
foreach (Category::whereNull('parent_id')->orderBy('sort_order')->get() as $c) {
    echo "- ID {$c->id}: {$c->name} (tenant_id: {$c->tenant_id}, project_id: {$c->project_id})\n";
}

echo "\nHeader HTML Category Menu Render:\n";
$html = view('frontend.themes.viettinmartdemo.layouts.partials.header')->render();
if (preg_match('/<ul class="category-sub-menu" id="category-active-four-desktop"[^>]*>(.*?)<\/ul>/s', $html, $m)) {
    preg_match_all('/<span>(.*?)<\/span>/', $m[1], $catNames);
    echo "Desktop Header Categories:\n";
    foreach ($catNames[1] as $name) {
        echo "  * {$name}\n";
    }
}

echo "\n========================================\n";
echo "2. VERIFY WKCOMPUTER (Project ID 14, Tenant ID 4)\n";
echo "========================================\n";
$project14 = Project::where('code', 'wkcomputer')->first();
request()->attributes->set('project', $project14);
session(['current_project_id' => $project14->id, 'current_tenant_id' => $project14->tenant_id]);
app()->instance('current_project_id', $project14->id);
app()->instance('current_tenant_id', $project14->tenant_id);

echo "Project 14 tenant_id in DB: " . ($project14->tenant_id ?? 'NULL') . "\n";
echo "Category count (scoped): " . Category::count() . "\n";
echo "Product count (scoped): " . Product::count() . "\n";
echo "ProjectProduct count (scoped): " . ProjectProduct::count() . "\n";
echo "MenuItem count (scoped): " . MenuItem::count() . "\n";

echo "\nCategories in WKComputer:\n";
foreach (Category::whereNull('parent_id')->orderBy('sort_order')->take(8)->get() as $c) {
    echo "- ID {$c->id}: {$c->name} (tenant_id: {$c->tenant_id}, project_id: {$c->project_id})\n";
}

echo "\n========================================\n";
echo "3. VERIFY NO ORPHANED / LEAKED DATA IN DB\n";
echo "========================================\n";
$nullCats = \Illuminate\Support\Facades\DB::table('product_categories')->whereNull('tenant_id')->orWhereNull('project_id')->count();
$nullProds = \Illuminate\Support\Facades\DB::table('products_enhanced')->whereNull('tenant_id')->orWhereNull('project_id')->count();
echo "Categories with NULL tenant or project: {$nullCats}\n";
echo "Products with NULL tenant or project: {$nullProds}\n";
