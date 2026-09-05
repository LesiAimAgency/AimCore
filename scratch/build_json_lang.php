<?php

$viFrontend = file_exists(__DIR__.'/../lang/vi/frontend.php') ? include (__DIR__.'/../lang/vi/frontend.php') : [];
$viCommon = file_exists(__DIR__.'/../lang/vi/common.php') ? include (__DIR__.'/../lang/vi/common.php') : [];
$viFooter = file_exists(__DIR__.'/../lang/vi/footer.php') ? include (__DIR__.'/../lang/vi/footer.php') : [];

$vi = array_merge($viCommon, $viFooter, $viFrontend);

// Additional helpful UI translations
$extraVi = [
    'product_category' => 'Danh mục',
    'product_reviews' => 'đánh giá',
    'product_sku' => 'Mã sản phẩm',
    'product_discount' => 'Giảm',
    'product_stock_status_label' => 'Tình trạng',
    'product_out_of_stock' => 'Hết hàng',
    'product_in_stock' => 'Còn hàng',
    'sidebar_offers_title' => 'Ưu đãi nổi bật',
    'offer_bank_transfer' => 'Giảm ngay 5% cho đơn hàng đầu tiên thanh toán qua chuyển khoản ngân hàng',
    'offer_installment' => 'Trả góp 0% khi mua hàng với thẻ tín dụng cho đơn hàng trên 3,000,000đ',
    'offer_free_shipping' => 'Miễn phí giao hàng trên toàn quốc cho mọi đơn hàng giá trị trên 500,000đ',
    'product_details' => 'Chi tiết sản phẩm',
    'product_additional_info' => 'Thông tin bổ sung',
    'product_reviews_tab' => 'Đánh giá',
    'footer_sitemap' => 'Sitemap',
    'account_title' => 'Tài khoản của tôi',
    'Introduce' => 'Giới thiệu',
    'introduce' => 'Giới thiệu',
];

$vi = array_merge($vi, $extraVi);

file_put_contents(
    __DIR__.'/../lang/vi.json',
    json_encode($vi, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);

echo 'Created lang/vi.json with '.count($vi)." keys!\n";

$enFrontend = file_exists(__DIR__.'/../lang/en/frontend.php') ? include (__DIR__.'/../lang/en/frontend.php') : [];
$enCommon = file_exists(__DIR__.'/../lang/en/common.php') ? include (__DIR__.'/../lang/en/common.php') : [];
$enFooter = file_exists(__DIR__.'/../lang/en/footer.php') ? include (__DIR__.'/../lang/en/footer.php') : [];
$en = array_merge($enCommon, $enFooter, $enFrontend);

file_put_contents(
    __DIR__.'/../lang/en.json',
    json_encode($en, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);
echo 'Created lang/en.json with '.count($en)." keys!\n";
