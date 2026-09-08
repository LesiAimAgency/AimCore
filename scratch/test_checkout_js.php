<?php
$cookieFile = __DIR__ . '/cookie_test.txt';
if (file_exists($cookieFile)) unlink($cookieFile);

// 0. Get CSRF token
$chHome = curl_init('http://127.0.0.1:8000/wkcomputer');
curl_setopt($chHome, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chHome, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($chHome, CURLOPT_COOKIEFILE, $cookieFile);
$homeHtml = curl_exec($chHome);
preg_match('/<meta name="csrf-token" content="([^"]+)"/', $homeHtml, $m);
$csrf = $m[1] ?? '';

// 1. Add product to cart
$chAdd = curl_init('http://127.0.0.1:8000/wkcomputer/gio-hang/them');
curl_setopt($chAdd, CURLOPT_POST, true);
curl_setopt($chAdd, CURLOPT_HTTPHEADER, ['X-CSRF-TOKEN: ' . $csrf]);
curl_setopt($chAdd, CURLOPT_POSTFIELDS, http_build_query([
    'product_id' => 1098,
    'qty' => 1,
    '_token' => $csrf
]));
curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chAdd, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($chAdd, CURLOPT_COOKIEFILE, $cookieFile);
$resAdd = curl_exec($chAdd);
echo "Add response: " . substr($resAdd, 0, 100) . "\n";

// 2. Fetch checkout
$chCheckout = curl_init('http://127.0.0.1:8000/wkcomputer/dat-hang');
curl_setopt($chCheckout, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chCheckout, CURLOPT_COOKIEFILE, $cookieFile);
$html = curl_exec($chCheckout);
$code = curl_getinfo($chCheckout, CURLINFO_HTTP_CODE);

echo "Checkout HTTP: $code (Length: " . strlen($html) . ")\n";

// Check if selectPayment exists
if (str_contains($html, 'function selectPayment(element)')) {
    echo "selectPayment: PASS\n";
} else {
    echo "selectPayment: FAIL\n";
}

// Check if loadDistricts exists and calls API
if (str_contains($html, '/wkcomputer/api/locations/districts')) {
    echo "api/locations/districts endpoint in JS: PASS\n";
} else {
    echo "api/locations/districts in JS: FAIL\n";
}

// Check if loadWards exists and calls API
if (str_contains($html, '/wkcomputer/api/locations/wards')) {
    echo "api/locations/wards endpoint in JS: PASS\n";
} else {
    echo "api/locations/wards in JS: FAIL\n";
}

// Check kredivo-wrapper
if (str_contains($html, 'id="kredivo-wrapper"')) {
    echo "kredivo-wrapper: PASS\n";
} else {
    echo "kredivo-wrapper: FAIL\n";
}

// Check service bar on checkout page
if (str_contains($html, 'wk-service-bar')) {
    echo "wk-service-bar on checkout page: PASS\n";
}
