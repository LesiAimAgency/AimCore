<?php

$ch = curl_init('https://aimagency.vn/viettinmart-eco/danh-muc/hang-ready-to-cook');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$html = curl_exec($ch);

echo "HTML LENGTH: " . strlen($html) . "\n";

// Check if "Tôm Thẻ Xẻ Bướm" is in the HTML
if (strpos($html, 'Tôm Thẻ Xẻ Bướm') !== false) {
    echo "FOUND: Tôm Thẻ Xẻ Bướm Cấp Đông in HTML!\n";
} else {
    echo "NOT FOUND: Tôm Thẻ Xẻ Bướm Cấp Đông in HTML!\n";
}

// Find all product names in HTML
preg_match_all('/<h[3-6][^>]*class="[^"]*title[^"]*"[^>]*>(.*?)<\/h[3-6]>/is', $html, $matches);
echo "PRODUCT TITLES FOUND (" . count($matches[1]) . "):\n";
foreach (array_slice($matches[1], 0, 15) as $title) {
    echo "- " . trim(strip_tags($title)) . "\n";
}

// Check JavaScript or AJAX behavior
if (strpos($html, 'fetch(') !== false || strpos($html, '$.ajax') !== false || strpos($html, 'filter') !== false) {
    echo "Page has JS/AJAX logic.\n";
}
