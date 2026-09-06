<?php

function checkUrl($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $html = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    
    preg_match_all('/<h[3-6][^>]*class="[^"]*title[^"]*"[^>]*>(.*?)<\/h[3-6]>/is', $html, $matches);
    $titles = array_filter(array_map('trim', array_map('strip_tags', $matches[1] ?? [])));
    
    // Also check if "Không tìm thấy sản phẩm" is in html
    $empty = strpos($html, 'Không tìm thấy sản phẩm') !== false;
    
    echo "REQUEST URL: $url\n";
    echo "EFFECTIVE URL: $effectiveUrl\n";
    echo "HTTP CODE: $code\n";
    echo "EMPTY STATE: " . ($empty ? "YES (NO PRODUCTS)" : "NO (HAS PRODUCTS)") . "\n";
    echo "TITLES: " . implode(', ', array_slice($titles, 3, 5)) . "\n";
    echo "---------------------------------------------------------\n";
}

checkUrl('https://aimagency.vn/viettinmart-eco/danh-muc/hang-ready-to-cook');
checkUrl('https://aimagency.vn/viettinmart-eco/danh-muc/san-pham-tuoi-cap-dong-chua-so-che');
checkUrl('https://aimagency.vn/viettinmart-eco/san-pham-tuoi-cap-dong-chua-so-che');
checkUrl('https://aimagency.vn/viettinmart-eco/san-pham/san-pham-tuoi-cap-dong-chua-so-che');
