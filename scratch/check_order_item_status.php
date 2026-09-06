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

$orderItemModelPath = app_path('Models/OrderItem.php');
$orderItemFileExists = file_exists($orderItemModelPath);
$orderItemCode = $orderItemFileExists ? file_get_contents($orderItemModelPath) : '';

$orderItemColumns = Illuminate\Support\Facades\Schema::getColumnListing('order_items');

echo json_encode([
    'order_item_file_exists' => $orderItemFileExists,
    'order_item_file_size' => strlen($orderItemCode),
    'order_item_columns' => $orderItemColumns,
], JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_order_item_status.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_order_item_status.php');
