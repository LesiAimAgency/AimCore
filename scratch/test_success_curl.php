<?php

$ch = curl_init('https://aimagency.vn/viettinmart-eco/dat-hang/thanh-cong/ORD-20260906-YFEYS');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$res = curl_exec($ch);

// Match the order summary card
if (preg_match('/<div class="order-summary-card[^>]*>(.*?)<\/div>\s*<\/div>/s', $res, $matches)) {
    echo strip_tags($matches[0]);
} else {
    echo "Summary card not matched directly, displaying text excerpt:\n";
    $lines = array_filter(array_map('trim', explode("\n", strip_tags($res))));
    echo implode("\n", array_slice($lines, 0, 40));
}
