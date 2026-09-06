<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = App\Models\Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first();
$products = App\Models\Product::withoutGlobalScopes()->where('project_id', $project->id)->get();

echo "Total products for project: " . $products->count() . "\n";

$withDirectCat = $products->whereNotNull('product_category_id')->count();
echo "Products with direct product_category_id: {$withDirectCat}\n";

$withPivotCat = 0;
foreach ($products as $p) {
    if ($p->categories()->count() > 0) {
        $withPivotCat++;
    }
}
echo "Products with categories() pivot: {$withPivotCat}\n";

$sample = $products->first();
if ($sample) {
    echo "Sample product: " . $sample->name . "\n";
    echo " - product_category_id: " . ($sample->product_category_id ?? 'NULL') . "\n";
    echo " - category relation: " . ($sample->category ? $sample->category->name : 'NULL') . "\n";
    echo " - categories count: " . $sample->categories->count() . "\n";
    foreach ($sample->categories as $c) {
        echo "   * Pivot cat: " . $c->id . " - " . $c->name . " (slug: " . $c->slug . ")\n";
    }
}
