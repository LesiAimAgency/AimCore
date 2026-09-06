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
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$response = [];

try {
    DB::beginTransaction();

    $orderNumber = Order::generateOrderNumber();
    $response['order_number'] = $orderNumber;

    $project = DB::table('projects')->where('code', 'viettinmart-eco')->first();
    $tenant = DB::table('tenants')->where('code', 'viettinmart-eco')->first();

    $projectId = $project ? $project->id : 11;
    $tenantId = $tenant ? $tenant->id : 4;

    $order = Order::create([
        'project_id' => $projectId,
        'tenant_id' => $tenantId,
        'order_number' => $orderNumber,
        'user_id' => null,
        'customer_name' => 'Nguyen Van Test Server',
        'customer_email' => 'test_server@example.com',
        'customer_phone' => '0901234567',
        'billing_address' => [
            'full_address' => '123 Đường Test, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh',
            'street' => '123 Đường Test',
            'ward' => 'Phường Bến Nghé',
            'district' => 'Quận 1',
            'province' => 'TP Hồ Chí Minh',
        ],
        'shipping_address' => [
            'full_address' => '123 Đường Test, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh',
            'street' => '123 Đường Test',
            'ward' => 'Phường Bến Nghé',
            'district' => 'Quận 1',
            'province' => 'TP Hồ Chí Minh',
        ],
        'subtotal' => 150000,
        'discount_amount' => 0,
        'shipping_amount' => 30000,
        'total_amount' => 180000,
        'discount' => 0,
        'shipping_fee' => 30000,
        'total' => 180000,
        'status' => 'pending',
        'payment_status' => 'pending',
        'payment_method' => 'cod',
        'customer_notes' => 'Test order creation on live server',
        'customer_note' => 'Test order creation on live server',
    ]);

    $response['order_created_id'] = $order->id;

    $orderItem = OrderItem::create([
        'project_id' => $projectId,
        'tenant_id' => $tenantId,
        'order_id' => $order->id,
        'product_id' => 116,
        'product_variation_id' => null,
        'product_name' => 'Cua Cà Mau Hấp',
        'product_sku' => 'SKU-116',
        'product_attributes' => null,
        'unit_price' => 150000,
        'quantity' => 1,
        'total_price' => 150000,
        'price' => 150000,
        'total' => 150000,
        'sku' => 'SKU-116',
    ]);

    $response['order_item_created_id'] = $orderItem->id;

    // Test notification method
    try {
        $order->sendOrderPlacedNotifications();
        $response['notifications_sent'] = true;
    } catch (\Throwable $e) {
        $response['notifications_sent'] = false;
        $response['notifications_error'] = $e->getMessage();
    }

    DB::rollBack();
    $response['success'] = true;
    $response['message'] = 'Order and OrderItem creation succeeded in transaction and rolled back safely.';
} catch (\Throwable $e) {
    DB::rollBack();
    $response['success'] = false;
    $response['error'] = $e->getMessage();
    $response['file'] = $e->getFile() . ':' . $e->getLine();
    $response['trace'] = $e->getTraceAsString();
}

echo json_encode($response, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'test_live_order.php',
    'content' => $serverScript,
]);

$res = file_get_contents('https://aimagency.vn/test_live_order.php');
echo $res;
