<?php
$cookieFile = __DIR__ . '/cookie_remote_test.txt';
if (file_exists($cookieFile)) unlink($cookieFile);

// 0. Get homepage for CSRF token & session
$chHome = curl_init('http://103.200.23.236/');
curl_setopt($chHome, CURLOPT_HTTPHEADER, ['Host: wkcomputer.aimagency.vn']);
curl_setopt($chHome, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chHome, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($chHome, CURLOPT_COOKIEFILE, $cookieFile);
$homeHtml = curl_exec($chHome);
preg_match('/<meta name="csrf-token" content="([^"]+)"/', $homeHtml, $m);
$csrf = $m[1] ?? '';

// 1. Add product to cart on remote
$chAdd = curl_init('http://103.200.23.236/wkcomputer/gio-hang/them');
curl_setopt($chAdd, CURLOPT_HTTPHEADER, ['Host: wkcomputer.aimagency.vn', 'X-CSRF-TOKEN: ' . $csrf]);
curl_setopt($chAdd, CURLOPT_POST, true);
curl_setopt($chAdd, CURLOPT_POSTFIELDS, http_build_query([
    'product_id' => 1098,
    'qty' => 1,
    '_token' => $csrf
]));
curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chAdd, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($chAdd, CURLOPT_COOKIEFILE, $cookieFile);
$resAdd = curl_exec($chAdd);
echo "Add to cart response: " . substr($resAdd, 0, 150) . "\n";

// 2. Fetch checkout on remote
$chCheckout = curl_init('http://103.200.23.236/wkcomputer/dat-hang');
curl_setopt($chCheckout, CURLOPT_HTTPHEADER, ['Host: wkcomputer.aimagency.vn']);
curl_setopt($chCheckout, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chCheckout, CURLOPT_COOKIEFILE, $cookieFile);
$checkoutHtml = curl_exec($chCheckout);
$code = curl_getinfo($chCheckout, CURLINFO_HTTP_CODE);

echo "Remote Checkout HTTP: $code (Length: " . strlen($checkoutHtml) . ")\n";

if (str_contains($checkoutHtml, 'function selectPayment(element)')) {
    echo "PASS: selectPayment fixed on remote!\n";
} else {
    echo "FAIL: selectPayment missing on remote!\n";
}

if (str_contains($checkoutHtml, 'api/locations/districts')) {
    echo "PASS: api/locations/districts present in remote JS!\n";
} else {
    echo "FAIL: api/locations/districts missing on remote!\n";
}

if (str_contains($checkoutHtml, 'wk-service-bar')) {
    echo "PASS: wk-service-bar present on remote checkout!\n";
} else {
    echo "FAIL: wk-service-bar missing on remote checkout!\n";
}
