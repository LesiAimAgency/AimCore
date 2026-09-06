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

$routes = [];
$router = app('router');
foreach ($router->getRoutes() as $r) {
    if (str_contains($r->uri(), 'thanh-cong') || str_contains($r->getName() ?? '', 'checkout')) {
        $routes[] = [
            'uri' => $r->uri(),
            'name' => $r->getName(),
            'action' => $r->getActionName(),
        ];
    }
}

echo json_encode($routes, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_checkout_routes.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_checkout_routes.php');
