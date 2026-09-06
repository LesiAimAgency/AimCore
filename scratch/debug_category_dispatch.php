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

$request = Illuminate\Http\Request::create('/viettinmart-eco/danh-muc/hang-ready-to-cook', 'GET');
$response = $app->handle($request);

$queries = \Illuminate\Support\Facades\DB::getQueryLog();

echo json_encode([
    'http_code' => $response->getStatusCode(),
    'queries' => $queries,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'debug_category_dispatch.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/debug_category_dispatch.php');
