<?php

$ch = curl_init("https://aimagency.vn/viettinmart-eco/dat-hang/thanh-cong/ORD-20260906-GUTBM");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "CODE: $code, LENGTH: " . strlen($res) . "\n";
preg_match('/<title>(.*?)<\/title>/', $res, $m);
echo "TITLE: " . ($m[1] ?? 'None') . "\n";
if ($code !== 200) {
    echo "BODY:\n" . substr($res, 0, 500) . "\n";
} else {
    preg_match('/(Đặt hàng thành công|Mã đơn hàng|Cảm ơn)/u', $res, $m2);
    echo "Found keyword: " . ($m2[1] ?? 'Not found') . "\n";
}
