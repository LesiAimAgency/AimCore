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

\Illuminate\Support\Facades\DB::enableQueryLog();

$controller = $app->make(\App\Http\Controllers\Viettinmart\ShopController::class);
$request = Illuminate\Http\Request::create('/viettinmart-eco/danh-muc/hang-ready-to-cook', 'GET');
$request->setRouteResolver(function() use ($app, $request) {
    return $app['router']->getRoutes()->match($request);
});

// Set project context as middleware would
$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
$request->attributes->set('project', $project);

try {
    $res = $controller->index($request, 'viettinmart-eco', 'hang-ready-to-cook');
    $viewData = $res->getData();
    $products = $viewData['products'] ?? null;
    $categories = $viewData['categories'] ?? null;
    $activeFilters = $viewData['activeFilters'] ?? null;
    
    $productsCount = $products ? $products->count() : 0;
    $productsTotal = $products ? $products->total() : 0;
    $productsItems = $products ? $products->items() : [];
} catch (\Throwable $e) {
    $error = $e->getMessage() . "\n" . $e->getTraceAsString();
}

$queries = \Illuminate\Support\Facades\DB::getQueryLog();

echo json_encode([
    'products_count' => $productsCount ?? null,
    'products_total' => $productsTotal ?? null,
    'products_items' => array_map(fn($p) => ['id' => $p->id, 'name' => $p->name, 'slug' => $p->slug], $productsItems ?? []),
    'active_filters' => $activeFilters ?? null,
    'error' => $error ?? null,
    'queries' => $queries,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'debug_shop_index.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/debug_shop_index.php');
