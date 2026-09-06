<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

try {
    DB::enableQueryLog();

    $request = Illuminate\Http\Request::create('/viettinmart-eco/danh-muc/hang-ready-to-cook', 'GET');
    $response = $kernel->handle($request);

    echo "Status: " . $response->getStatusCode() . "\n";
    if (isset($response->original) && is_object($response->original) && method_exists($response->original, 'getData')) {
        $viewData = $response->original->getData();
        echo "Categories in view: " . (isset($viewData['categories']) ? $viewData['categories']->count() : 'N/A') . "\n";
        echo "Products in view count: " . (isset($viewData['products']) ? $viewData['products']->count() : 'N/A') . "\n";
        echo "Products in view total: " . (isset($viewData['products']) ? $viewData['products']->total() : 'N/A') . "\n";
        echo "Active filters: " . json_encode($viewData['activeFilters'] ?? []) . "\n";
    }

    echo "Queries:\n";
    foreach (DB::getQueryLog() as $q) {
        if (str_contains($q['query'], 'products') || str_contains($q['query'], 'categories')) {
            echo " - " . $q['query'] . " [" . implode(',', array_map('strval', $q['bindings'])) . "]\n";
        }
    }
} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n" . $e->getTraceAsString();
}
