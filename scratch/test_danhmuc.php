<?php

$ch = curl_init('https://aimagency.vn/viettinmart-eco/danh-muc/san-pham-tuoi-cap-dong-chua-so-che');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$res = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo "DANH-MUC CODE: " . $code . "\n";
