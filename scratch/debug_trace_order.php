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

$request = Illuminate\Http\Request::create('/viettinmart-eco/dat-hang/thanh-cong/ORD-20260906-YFEYS', 'GET');
try {
    $response = $app->handle($request);
    $status = $response->getStatusCode();
    $content = $response->getContent();
} catch (\Throwable $e) {
    $status = 'exception: ' . $e->getMessage();
    $content = $e->getTraceAsString();
}

$queries = \Illuminate\Support\Facades\DB::getQueryLog();

echo json_encode([
    'status' => $status,
    'queries' => $queries,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'debug_trace_order.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/debug_trace_order.php');
