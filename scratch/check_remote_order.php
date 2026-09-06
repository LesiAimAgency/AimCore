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

$orderModelPath = app_path('Models/Order.php');
$orderFileExists = file_exists($orderModelPath);
$orderCode = $orderFileExists ? file_get_contents($orderModelPath) : '';
$hasGenerateOrderNumberInFile = str_contains($orderCode, 'generateOrderNumber');

$hasMethodOnClass = method_exists(\App\Models\Order::class, 'generateOrderNumber');

$columns = Illuminate\Support\Facades\Schema::getColumnListing('orders');

echo json_encode([
    'order_file_exists' => $orderFileExists,
    'has_generate_in_file' => $hasGenerateOrderNumberInFile,
    'has_method_on_class' => $hasMethodOnClass,
    'order_file_size' => strlen($orderCode),
    'order_columns' => $columns,
], JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_order_status.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_order_status.php');
