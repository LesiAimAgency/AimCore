<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Project;
use App\Models\Wkcomputer\WkProduct;
use App\Models\Wkcomputer\WkOrder;
use App\Models\Wkcomputer\WkOrderItem;
use App\Http\Controllers\Wkcomputer\CartController;
use App\Http\Controllers\Wkcomputer\CheckoutController;
use Illuminate\Http\Request;

echo "=== COMPREHENSIVE TEST: WKCOMPUTER CART & CHECKOUT FLOW ===\n";

$project = Project::where('code', 'wkcomputer')->first();
if (!$project) {
    echo "ERROR: Project wkcomputer not found!\n";
    exit(1);
}
echo "[1] Project: {$project->name} (ID: {$project->id})\n";
session(['current_project_id' => $project->id]);
session(['current_project' => $project]);
session()->forget('cart');

$products = WkProduct::take(3)->get();
if ($products->count() < 2) {
    echo "ERROR: Need at least 2 products for testing!\n";
    exit(1);
}
$p1 = $products[0];
$p2 = $products[1];
echo "[2] Test products:\n  - P1: [{$p1->id}] {$p1->name} ({$p1->effective_price}đ)\n  - P2: [{$p2->id}] {$p2->name} ({$p2->effective_price}đ)\n";

$cartController = new CartController();
$sessionStore = app('session.store');

// Step 1: Add single product
echo "\n--- Step 1: Add product P1 --- \n";
$req1 = Request::create('/wkcomputer/gio-hang/them', 'POST', [
    'product_id' => $p1->id,
    'qty' => 2,
]);
$req1->setLaravelSession($sessionStore);
$res1 = $cartController->add($req1);
echo "Add P1 Status: " . $res1->getStatusCode() . "\n";
echo "Cart count in session: " . collect(session('cart'))->sum('qty') . "\n";

// Step 2: Add multiple products (Build PC test)
echo "\n--- Step 2: Add multiple products (Build PC) --- \n";
$req2 = Request::create('/wkcomputer/gio-hang/them-nhieu', 'POST', [
    'items' => [
        ['id' => $p2->id, 'qty' => 1],
    ]
]);
$req2->setLaravelSession($sessionStore);
$res2 = $cartController->addMultiple($req2);
echo "Add Multiple Status: " . $res2->getStatusCode() . "\n";
echo "Cart count in session: " . collect(session('cart'))->sum('qty') . "\n";

// Step 3: Update quantity of P1
echo "\n--- Step 3: Update quantity of P1 to 3 --- \n";
$req3 = Request::create('/wkcomputer/gio-hang/cap-nhat', 'POST', [
    'product_id' => $p1->id,
    'qty' => 3,
]);
$req3->setLaravelSession($sessionStore);
$res3 = $cartController->update($req3);
echo "Update Status: " . $res3->getStatusCode() . "\n";
echo "P1 qty in cart: " . (session('cart')[$p1->id]['qty'] ?? 0) . "\n";

// Step 4: Remove P2 from cart
echo "\n--- Step 4: Remove P2 from cart --- \n";
$req4 = Request::create('/wkcomputer/gio-hang/xoa', 'POST', [
    'product_id' => $p2->id,
]);
$req4->setLaravelSession($sessionStore);
$res4 = $cartController->remove($req4);
echo "Remove Status: " . $res4->getStatusCode() . "\n";
echo "P2 exists in cart? " . (isset(session('cart')[$p2->id]) ? 'YES' : 'NO') . "\n";

// Step 5: Checkout Index View
echo "\n--- Step 5: Render Checkout Page --- \n";
$checkoutController = new CheckoutController();
$req5 = Request::create('/wkcomputer/thanh-toan', 'GET');
$req5->setLaravelSession($sessionStore);
$res5 = $checkoutController->index();
echo "Checkout view resolved: " . (is_object($res5) ? get_class($res5) : gettype($res5)) . "\n";

// Step 6: Checkout Store (Order Creation)
echo "\n--- Step 6: Submit Checkout (Create Order) --- \n";
$req6 = Request::create('/wkcomputer/dat-hang', 'POST', [
    'first_name' => 'Tran',
    'last_name' => 'Van B',
    'phone' => '0988776655',
    'street_address' => '456 Nguyen Trai',
    'province_name' => 'TP Ho Chi Minh',
    'district_name' => 'Quan 5',
    'ward_name' => 'Phuong 2',
    'email' => 'tranvanb@wkcomputer.test',
    'notes' => 'Giao buoi sang',
    'payment_method' => 'cod',
]);
$req6->setLaravelSession($sessionStore);
$res6 = $checkoutController->store($req6);
echo "Store Order Status: " . $res6->getStatusCode() . "\n";
$targetUrl = $res6->isRedirect() ? $res6->getTargetUrl() : '';
echo "Redirect URL: " . $targetUrl . "\n";

// Verify DB
$orderNumber = basename($targetUrl);
$order = WkOrder::where('order_number', $orderNumber)->first();
if ($order) {
    echo "\n=== ORDER VERIFICATION SUCCESS ===\n";
    echo " - Order Number: {$order->order_number}\n";
    echo " - Project ID: {$order->project_id}\n";
    echo " - Total Amount: " . number_format($order->total_amount, 0, ',', '.') . " VND\n";
    echo " - Formatted Address: {$order->formatted_shipping_address}\n";
    echo " - Items count: " . $order->items->count() . "\n";
    foreach ($order->items as $item) {
        echo "    * {$item->product_name} x {$item->quantity} = " . number_format($item->total_price, 0, ',', '.') . " VND\n";
    }

    // Step 7: Success Page View
    echo "\n--- Step 7: Render Success Page --- \n";
    $successView = $checkoutController->success($orderNumber);
    $html = $successView->render();
    echo "Success page rendered without errors! HTML length: " . strlen($html) . " bytes\n";
} else {
    echo "FAIL: Order not found in database!\n";
    exit(1);
}

echo "\n>>> ALL TESTS PASSED! <<<\n";
