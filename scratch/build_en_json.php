<?php

// Load EN translations from php files
$enFrontend = file_exists(__DIR__.'/../resources/lang/en/frontend.php') ? include (__DIR__.'/../resources/lang/en/frontend.php') : [];
$enCommon = file_exists(__DIR__.'/../resources/lang/en/common.php') ? include (__DIR__.'/../resources/lang/en/common.php') : [];
$enFooter = file_exists(__DIR__.'/../resources/lang/en/footer.php') ? include (__DIR__.'/../resources/lang/en/footer.php') : [];

$currentEnJson = file_exists(__DIR__.'/../resources/lang/en.json')
    ? json_decode(file_get_contents(__DIR__.'/../resources/lang/en.json'), true) ?: []
    : [];

$finalEn = array_merge($enCommon, $enFooter, $enFrontend, $currentEnJson);

// Load VI json to identify any keys that might be missing in EN
$viJson = json_decode(file_get_contents(__DIR__.'/../resources/lang/vi.json'), true) ?: [];

$extraEn = [
    'sidebar_offers_title' => 'Featured Offers',
    'offer_bank_transfer' => 'Get 5% off your first order when paying via bank transfer',
    'offer_installment' => '0% installment when purchasing with credit card for orders over 3,000,000đ',
    'offer_free_shipping' => 'Free nationwide shipping for all orders over 500,000đ',
    'Showing' => 'Showing',
    'showing' => 'Showing',
    'to' => 'to',
    'of' => 'of',
    'results' => 'results',
    'pagination.previous' => 'Previous',
    'pagination.next' => 'Next',
    'Whoops!' => 'Whoops!',
    'Hello!' => 'Hello!',
    'Regards,' => 'Regards,',
    'product_category' => 'Category',
    'product_reviews' => 'reviews',
    'product_sku' => 'SKU',
    'product_discount' => 'Discount',
    'product_stock_status_label' => 'Stock Status',
    'product_out_of_stock' => 'Out of stock',
    'product_in_stock' => 'In stock',
    'product_details' => 'Product Details',
    'product_additional_info' => 'Additional Info',
    'product_reviews_tab' => 'Reviews',
    'footer_sitemap' => 'Sitemap',
    'account_title' => 'My Account',
    'Introduce' => 'About Us',
    'introduce' => 'About Us',
];

$finalEn = array_merge($finalEn, $extraEn);

// For any keys in VI not in EN, fallback to VI or key
foreach ($viJson as $k => $v) {
    if (! isset($finalEn[$k])) {
        $finalEn[$k] = $v;
    }
}

file_put_contents(
    __DIR__.'/../resources/lang/en.json',
    json_encode($finalEn, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);
file_put_contents(
    __DIR__.'/../lang/en.json',
    json_encode($finalEn, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);

echo 'Saved '.count($finalEn)." keys to resources/lang/en.json and lang/en.json!\n";
