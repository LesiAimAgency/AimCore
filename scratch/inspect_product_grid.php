<?php

$ch = curl_init('https://aimagency.vn/viettinmart-eco/danh-muc/hang-ready-to-cook');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$html = curl_exec($ch);

if (preg_match('/<div[^>]*id="product-grid"[^>]*>(.*?)<\/div>\s*<\/div>\s*<!-- Appending indicator/s', $html, $matches)) {
    echo "PRODUCT GRID CONTENT:\n" . substr(strip_tags($matches[1]), 0, 1000) . "\n";
    echo "\nRAW HTML EXCERPT:\n" . substr($matches[1], 0, 1000) . "\n";
} else {
    echo "product-grid regex failed, searching for id=\"product-grid\":\n";
    $pos = strpos($html, 'id="product-grid"');
    if ($pos !== false) {
        echo substr($html, $pos, 2000);
    } else {
        echo "id=\"product-grid\" NOT found in HTML!\n";
    }
}
