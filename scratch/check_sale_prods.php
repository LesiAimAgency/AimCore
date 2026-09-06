<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$prods = \App\Models\Product::where('project_id', 10)
    ->whereNotNull('sale_price')
    ->where('sale_price', '>', 0)
    ->get();

echo "Total on-sale products for project 10: " . $prods->count() . "\n";
foreach ($prods->take(10) as $p) {
    echo "  - ID: {$p->id}, name: {$p->name}, price: {$p->price}, sale: {$p->sale_price}, feat_img: {$p->getRawOriginal('featured_image')}\n";
}

$all = \App\Models\Product::where('project_id', 10)->get();
echo "Total products for project 10: " . $all->count() . "\n";
echo "Products with null featured_image in project 10: " . $all->whereNull('featured_image')->count() . "\n";
foreach ($all->whereNull('featured_image')->take(5) as $p) {
    echo "  Null img: ID: {$p->id}, name: {$p->name}\n";
}
