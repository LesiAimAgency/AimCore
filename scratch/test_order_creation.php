<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "1. Testing Order::generateOrderNumber():\n";
$orderNumber = \App\Models\Order::generateOrderNumber();
echo "Generated Order Number: {$orderNumber}\n";

echo "\n2. Testing Order::create():\n";
try {
    \DB::beginTransaction();
    
    $order = \App\Models\Order::create([
        'project_id' => 10,
        'tenant_id' => 1,
        'order_number' => $orderNumber,
        'user_id' => 1,
        'customer_name' => 'Nguyen Van Test',
        'customer_email' => 'test@example.com',
        'customer_phone' => '0901234567',
        'shipping_address' => [
            'full_address' => '123 Đường Test, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh',
            'street' => '123 Đường Test',
            'ward' => 'Phường Bến Nghé',
            'district' => 'Quận 1',
            'province' => 'TP Hồ Chí Minh',
        ],
        'subtotal' => 200000,
        'discount' => 20000,
        'shipping_fee' => 30000,
        'total' => 210000,
        'status' => 'pending',
        'payment_status' => 'unpaid',
        'payment_method' => 'cod',
        'customer_note' => 'Giao giờ hành chính',
        'coupon_code' => 'TESTVOUCHER',
    ]);
    
    echo "Order created successfully with ID: {$order->id}\n";
    echo "  order_number: {$order->order_number}\n";
    echo "  total: {$order->total} (DB total_amount: {$order->total_amount})\n";
    echo "  shipping_fee: {$order->shipping_fee} (DB shipping_amount: {$order->shipping_amount})\n";
    echo "  discount: {$order->discount} (DB discount_amount: {$order->discount_amount})\n";
    echo "  status_label: {$order->status_label}\n";
    echo "  payment_status_label: {$order->payment_status_label}\n";

    $item = \App\Models\OrderItem::create([
        'project_id' => 10,
        'tenant_id' => 1,
        'order_id' => $order->id,
        'product_id' => 57,
        'product_name' => 'Tôm Thẻ HL Cấp Đông',
        'price' => 200000,
        'quantity' => 1,
        'total' => 200000,
        'sku' => 'SKU-57',
    ]);
    echo "OrderItem created with ID: {$item->id}\n";
    echo "  unit_price: {$item->unit_price}, total_price: {$item->total_price}, product_sku: {$item->product_sku}\n";

    $order->sendOrderPlacedNotifications();
    echo "sendOrderPlacedNotifications called successfully!\n";

    \DB::rollBack();
    echo "\nTransaction rolled back cleanly! Everything works!\n";
} catch (\Throwable $e) {
    \DB::rollBack();
    echo "\nERROR: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
}
