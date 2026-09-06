<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://aimagency.vn/viettinmart-eco');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$res = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Homepage HTTP Code: $httpCode\n";
preg_match_all('#/san-pham/([a-zA-Z0-9_-]+)#', $res, $matches);
echo "Sample product links on homepage:\n";
print_r(array_unique(array_slice($matches[0], 0, 10)));
