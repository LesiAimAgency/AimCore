<?php

$cookieFile = __DIR__ . '/live_cookies.txt';
if (file_exists($cookieFile)) unlink($cookieFile);

$ch = curl_init();

// 1. GET homepage
curl_setopt($ch, CURLOPT_URL, 'https://aimagency.vn/viettinmart-eco');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
$html = curl_exec($ch);

preg_match('/<meta name="csrf-token" content="([^"]+)"/', $html, $m);
$csrfToken = $m[1] ?? null;

// 2. POST to /gio-hang/them with product_id 116
curl_setopt($ch, CURLOPT_URL, 'https://aimagency.vn/viettinmart-eco/gio-hang/them');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'product_id' => 116,
    'qty' => 1,
    '_token' => $csrfToken,
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'X-Requested-With: XMLHttpRequest',
    'Accept: application/json',
    'X-CSRF-TOKEN: ' . $csrfToken,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if (file_exists($cookieFile)) unlink($cookieFile);

echo "HTTP Code: $httpCode\n";
$data = json_decode($response, true);
if ($data) {
    if (isset($data['message'])) echo "Message: " . $data['message'] . "\n";
    if (isset($data['exception'])) echo "Exception: " . $data['exception'] . "\n";
    if (isset($data['file'])) echo "File: " . $data['file'] . ":" . ($data['line'] ?? '') . "\n";
    if (isset($data['cart'])) echo "Cart Count: " . ($data['count'] ?? 0) . "\n";
} else {
    echo "Raw: " . substr($response, 0, 500) . "\n";
}
