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
use Illuminate\Contracts\Console\Kernel;
use App\Models\Post;
use App\Models\Project;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$project = Project::where('code', 'viettinmart-eco')->first();
request()->attributes->set('project', $project);

$query = Post::where('post_type', 'product')->with(['taxonomies']);
$query->where('status', 'published');

$products = $query->paginate(20);

$items = [];
foreach ($products->items() as $prod) {
    $items[] = [
        'id' => $prod->id,
        'name' => $prod->name,
        'sku' => $prod->sku,
        'price' => $prod->display_price,
        'stock' => $prod->stock_quantity,
        'status' => $prod->status,
        'category' => $prod->category?->name ?? 'Chưa phân loại',
    ];
}

echo json_encode([
    'total' => $products->total(),
    'per_page' => $products->perPage(),
    'sample_items' => array_slice($items, 0, 5),
], JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'test_cms_products_query.php',
    'content' => $serverScript,
]);

echo "test_cms_products_query.php uploaded.\n";
