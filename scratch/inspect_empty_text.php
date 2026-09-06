<?php

$ch = curl_init('https://aimagency.vn/viettinmart-eco/danh-muc/hang-ready-to-cook');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$html = curl_exec($ch);

$pos = strpos($html, 'Không tìm thấy sản phẩm');
if ($pos !== false) {
    echo "OCCURRENCE OF 'Không tìm thấy sản phẩm':\n";
    echo substr($html, max(0, $pos - 200), 400) . "\n";
} else {
    echo "NOT FOUND\n";
}
