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

$affectedOrders = \Illuminate\Support\Facades\DB::table('orders')
    ->where('project_id', 11)
    ->update(['tenant_id' => 4]);

$affectedItems = \Illuminate\Support\Facades\DB::table('order_items')
    ->where('project_id', 11)
    ->update(['tenant_id' => 4]);

echo json_encode([
    'affected_orders' => $affectedOrders,
    'affected_items' => $affectedItems,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'fix_order_tenants.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/fix_order_tenants.php');
