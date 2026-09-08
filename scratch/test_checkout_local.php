<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

session()->start();
session(['cart' => [
    1098 => [
        'id' => 1098,
        'name' => 'RAM Kingston 8GB',
        'price' => 500000,
        'qty' => 1,
        'image' => null,
    ]
]]);

$controller = new App\Http\Controllers\Wkcomputer\CheckoutController();
$view = $controller->index();
$html = $view->render();

echo "Rendered HTML length: " . strlen($html) . "\n";
if (str_contains($html, 'function selectPayment(element)')) {
    echo "PASS: selectPayment function present!\n";
} else {
    echo "FAIL: selectPayment missing!\n";
}

if (str_contains($html, 'api/locations/districts')) {
    echo "PASS: api/locations/districts endpoint present in JS!\n";
} else {
    echo "FAIL: api/locations/districts missing!\n";
}

if (str_contains($html, 'api/locations/wards')) {
    echo "PASS: api/locations/wards endpoint present in JS!\n";
} else {
    echo "FAIL: api/locations/wards missing!\n";
}

if (str_contains($html, 'id="kredivo-wrapper"')) {
    echo "PASS: kredivo-wrapper present!\n";
} else {
    echo "FAIL: kredivo-wrapper missing!\n";
}

if (str_contains($html, 'wk-service-bar')) {
    echo "PASS: wk-service-bar present on checkout page!\n";
} else {
    echo "FAIL: wk-service-bar missing on checkout page!\n";
}
