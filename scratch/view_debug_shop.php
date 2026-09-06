<?php

$res = file_get_contents('https://aimagency.vn/debug_shop_index.php');
$data = json_decode($res, true);
echo 'PRODUCTS COUNT: ' . ($data['products_count'] ?? 'null') . "\n";
echo 'PRODUCTS TOTAL: ' . ($data['products_total'] ?? 'null') . "\n";
echo 'ACTIVE FILTERS: ' . json_encode($data['active_filters'] ?? null, JSON_UNESCAPED_UNICODE) . "\n";
echo 'ERROR: ' . ($data['error'] ?? 'none') . "\n";
echo 'QUERIES: ' . "\n";
foreach ($data['queries'] ?? [] as $q) {
    if (str_contains($q['query'], 'products_enhanced') || str_contains($q['query'], 'product_categories')) {
        echo $q['query'] . "\nBindings: " . json_encode($q['bindings']) . "\n---\n";
    }
}
