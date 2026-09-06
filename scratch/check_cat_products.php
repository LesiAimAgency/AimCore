<?php

use App\Models\HostingProfile;
use App\Services\Hosting\HostingClientFactory;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$p = HostingProfile::find(2);
$c = HostingClientFactory::make($p);

$ref = new ReflectionClass($c);
$method = $ref->getMethod('callUapi');
$method->setAccessible(true);

$serverScript = <<<'PHP'
<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$slug = 'hang-ready-to-cook';
$cat = \Illuminate\Support\Facades\DB::table('product_categories')->where('slug', $slug)->first();

$pivotCount = 0;
if (\Illuminate\Support\Facades\Schema::hasTable('product_category_product')) {
    $pivotCount = \Illuminate\Support\Facades\DB::table('product_category_product')->count();
    $pivotForCat = $cat ? \Illuminate\Support\Facades\DB::table('product_category_product')->where('product_category_id', $cat->id)->get() : [];
} else {
    $pivotForCat = 'Table product_category_product does not exist!';
}

$directForCat = $cat ? \Illuminate\Support\Facades\DB::table('products_enhanced')->where('product_category_id', $cat->id)->get(['id', 'name', 'slug', 'project_id', 'tenant_id']) : [];

$allCats = \Illuminate\Support\Facades\DB::table('product_categories')->get(['id', 'name', 'slug']);
$productCatCounts = \Illuminate\Support\Facades\DB::table('products_enhanced')->select('product_category_id', \Illuminate\Support\Facades\DB::raw('count(*) as count'))->groupBy('product_category_id')->get();

echo json_encode([
    'category' => $cat,
    'pivot_count_total' => $pivotCount,
    'pivot_for_cat' => $pivotForCat,
    'direct_products_for_cat' => $directForCat,
    'product_category_id_distribution' => $productCatCounts,
    'all_categories' => $allCats,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_cat_products.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_cat_products.php');
