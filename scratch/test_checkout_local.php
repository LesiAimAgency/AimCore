<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();
$app->instance('request', Request::create('/wkcomputer/dat-hang'));

session()->start();
session(['cart' => [
    1098 => [
        'id' => 1098,
        'slug' => 'ram-kingston-8gb',
        'name' => 'RAM Kingston 8GB',
        'price' => 500000,
        'qty' => 1,
        'image' => null,
    ],
]]);

view()->getFinder()->prependLocation(resource_path('views/frontend/themes/wkcomputerdemo'));
$view = view('shop.checkout', [
    'cart' => session('cart'),
    'subtotal' => 500000,
    'totalDiscount' => 0,
    'total' => 500000,
    'provinces' => [['code' => 8, 'name' => 'Tỉnh Tuyên Quang']],
    'errors' => new ViewErrorBag,
]);
$html = $view->render();

echo 'Rendered HTML length: '.strlen($html)."\n";
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
