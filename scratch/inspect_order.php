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

$order = Illuminate\Support\Facades\DB::table('orders')->where('order_number', 'ORD-20260906-GUTBM')->first();
$items = [];
if ($order) {
    $items = Illuminate\Support\Facades\DB::table('order_items')->where('order_id', $order->id)->get();
}

$viewExists = view()->exists('shop.success');

echo json_encode([
    'order' => $order,
    'items' => $items,
    'view_exists' => $viewExists,
], JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'inspect_order_gutbm.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/inspect_order_gutbm.php');
