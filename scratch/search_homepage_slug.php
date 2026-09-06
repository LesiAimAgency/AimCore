<?php

$html = file_get_contents('https://aimagency.vn/viettinmart-eco');
if ($html === false) {
    echo "Failed to fetch homepage\n";
    exit;
}

$slug = 'san-pham-tuoi-cap-dong-chua-so-che';
if (strpos($html, $slug) !== false) {
    echo "FOUND SLUG IN HOMEPAGE HTML!\n";
    // Find surrounding tags (500 chars around it)
    $pos = 0;
    while (($pos = strpos($html, $slug, $pos)) !== false) {
        $start = max(0, $pos - 200);
        $len = 500;
        echo "MATCH AT $pos:\n" . substr($html, $start, $len) . "\n-------------------------\n";
        $pos += strlen($slug);
    }
} else {
    echo "Slug not found in homepage HTML directly. Checking 'cap-dong' or 'so-che'...\n";
    if (preg_match_all('/href="[^"]*(?:cap-dong|so-che)[^"]*"/i', $html, $matches)) {
        print_r($matches[0]);
    } else {
        echo "No href matching cap-dong or so-che found in homepage HTML.\n";
    }
}
