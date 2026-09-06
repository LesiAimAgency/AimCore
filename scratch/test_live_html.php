<?php
$html = file_get_contents('https://aimagency.vn/viettinmart-eco/san-pham/cua-ca-mau-hap');
$checks = [
    'sidebar_offers_title' => str_contains($html, 'sidebar_offers_title'),
    'Ưu đãi nổi bật' => str_contains($html, 'Ưu đãi nổi bật'),
    'offer_bank_transfer' => str_contains($html, 'offer_bank_transfer'),
    'Giảm ngay 5%' => str_contains($html, 'Giảm ngay 5%'),
    'product_sku' => str_contains($html, 'product_sku'),
    'Mã sản phẩm' => str_contains($html, 'Mã sản phẩm') || str_contains($html, 'M&#227; s&#7843;n ph&#7849;m') || str_contains($html, 'SKU'),
    'product_discount' => str_contains($html, 'product_discount'),
    'Giảm 17%' => str_contains($html, 'Giảm') || str_contains($html, 'giảm'),
    'product_temporarily_out' => str_contains($html, 'product_temporarily_out'),
    'product_out_of_stock' => str_contains($html, 'product_out_of_stock'),
    'Hết hàng' => str_contains($html, 'Hết hàng'),
    'product_contact_similar' => str_contains($html, 'product_contact_similar'),
];

foreach ($checks as $k => $v) {
    echo $k . ': ' . ($v ? 'FOUND' : 'NOT FOUND') . "\n";
}
