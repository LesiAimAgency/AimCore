<?php

$cookieFile = __DIR__ . '/test_live_checkout_cookies.txt';
if (file_exists($cookieFile)) unlink($cookieFile);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);

// 1. GET Homepage
curl_setopt($ch, CURLOPT_URL, 'https://aimagency.vn/viettinmart-eco');
$homeHtml = curl_exec($ch);
preg_match('/<meta name="csrf-token" content="([^"]+)"/', $homeHtml, $m);
$csrfToken = $m[1] ?? null;

echo "1. Homepage loaded. CSRF: " . substr($csrfToken, 0, 15) . "...\n";

// 2. Add product 116 to cart
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
$cartResp = curl_exec($ch);
$cartCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "2. Add to cart HTTP: $cartCode\n";

// 3. GET /dat-hang
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, []);
curl_setopt($ch, CURLOPT_URL, 'https://aimagency.vn/viettinmart-eco/dat-hang');
$checkoutHtml = curl_exec($ch);
$checkoutCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "3. Checkout page HTTP: $checkoutCode\n";

preg_match('/<input type="hidden" name="_token" value="([^"]+)"/', $checkoutHtml, $m2);
$checkoutCsrf = $m2[1] ?? $csrfToken;

// 4. POST to /dat-hang (place order)
curl_setopt($ch, CURLOPT_URL, 'https://aimagency.vn/viettinmart-eco/dat-hang');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    '_token' => $checkoutCsrf,
    'first_name' => 'Nguyễn',
    'last_name' => 'Văn Thử Nghiệm',
    'email' => 'test_buyer@aimagency.vn',
    'phone' => '0912345678',
    'province_name' => 'TP Hồ Chí Minh',
    'province_code' => '79',
    'district_name' => 'Quận 1',
    'district_code' => '760',
    'ward_name' => 'Phường Bến Nghé',
    'ward_code' => '26734',
    'street_address' => 'Số 10 Lê Duẩn',
    'payment_method' => 'cod',
    'notes' => 'Giao giờ hành chính - test tự động',
]));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

$postResp = curl_exec($ch);
$postCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$redirectUrl = curl_getinfo($ch, CURLINFO_REDIRECT_URL);

echo "4. Submit order HTTP: $postCode\n";
echo "   Redirect URL: $redirectUrl\n";

if ($postCode == 500) {
    echo "ERROR BODY:\n" . substr($postResp, 0, 1000) . "\n";
}

curl_close($ch);
if (file_exists($cookieFile)) unlink($cookieFile);
