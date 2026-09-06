<?php

$ch = curl_init('https://aimagency.vn/viettinmart-eco/dat-hang/thanh-cong/ORD-20260906-ULJOW');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$res = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo "HTTP CODE: " . $code . "\n";
if (preg_match('/<div class="order-summary-card[^>]*>(.*?)<\/div>\s*<\/div>/s', $res, $matches)) {
    echo strip_tags($matches[0]);
} else {
    echo "Body preview:\n" . substr(strip_tags($res), 0, 500) . "\n";
}
