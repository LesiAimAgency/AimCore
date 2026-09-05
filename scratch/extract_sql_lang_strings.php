<?php

$sqlFile = __DIR__.'/../public_html/localhost.sql';
if (! file_exists($sqlFile)) {
    echo "SQL file not found!\n";
    exit;
}

$content = file_get_contents($sqlFile);

// Match INSERT INTO `lang_strings`
$pattern = "/INSERT INTO `lang_strings` \([^)]+\) VALUES\s*([\s\S]+?);/";
if (preg_match($pattern, $content, $match)) {
    $rowsBlock = $match[1];

    // Parse each row: (id, 'key', 'group', 'default_value', ...)
    // Note: values may contain escaped quotes
    $rowPattern = "/\(\s*\d+\s*,\s*'([^']+)'\s*,\s*'([^']+)'\s*,\s*'((?:[^'\\\\]|\\\\.)*)'/";
    preg_match_all($rowPattern, $rowsBlock, $rows, PREG_SET_ORDER);

    echo 'Found '.count($rows)." lang_strings entries in SQL!\n";

    $extractedVi = [];
    foreach ($rows as $r) {
        $key = $r[1];
        $group = $r[2];
        $val = stripcslashes($r[3]);
        $extractedVi[$key] = $val;
    }

    // Also check current resources/lang/vi.json
    $currentViJson = file_exists(__DIR__.'/../resources/lang/vi.json')
        ? json_decode(file_get_contents(__DIR__.'/../resources/lang/vi.json'), true) ?: []
        : [];

    // Also load resources/lang/vi/frontend.php, common.php, footer.php
    $viFrontend = file_exists(__DIR__.'/../resources/lang/vi/frontend.php') ? include (__DIR__.'/../resources/lang/vi/frontend.php') : [];
    $viCommon = file_exists(__DIR__.'/../resources/lang/vi/common.php') ? include (__DIR__.'/../resources/lang/vi/common.php') : [];
    $viFooter = file_exists(__DIR__.'/../resources/lang/vi/footer.php') ? include (__DIR__.'/../resources/lang/vi/footer.php') : [];

    // Merge: SQL extracted, then php files, then current json
    $finalVi = array_merge($extractedVi, $viCommon, $viFooter, $viFrontend, $currentViJson);

    // Specific fixes
    $finalVi['sidebar_offers_title'] = 'Ưu đãi nổi bật';
    $finalVi['offer_bank_transfer'] = 'Giảm ngay 5% cho đơn hàng đầu tiên thanh toán qua chuyển khoản ngân hàng';
    $finalVi['offer_installment'] = 'Trả góp 0% khi mua hàng với thẻ tín dụng cho đơn hàng trên 3,000,000đ';
    $finalVi['offer_free_shipping'] = 'Miễn phí giao hàng trên toàn quốc cho mọi đơn hàng giá trị trên 500,000đ';
    $finalVi['Showing'] = 'Hiển thị';
    $finalVi['showing'] = 'Hiển thị';
    $finalVi['to'] = 'đến';
    $finalVi['of'] = 'của';
    $finalVi['results'] = 'kết quả';
    $finalVi['pagination.previous'] = 'Trang trước';
    $finalVi['pagination.next'] = 'Trang sau';
    $finalVi['Whoops!'] = 'Rất tiếc!';
    $finalVi['Hello!'] = 'Xin chào!';
    $finalVi['Regards,'] = 'Trân trọng,';

    // Write to both resources/lang/vi.json and lang/vi.json
    file_put_contents(
        __DIR__.'/../resources/lang/vi.json',
        json_encode($finalVi, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
    file_put_contents(
        __DIR__.'/../lang/vi.json',
        json_encode($finalVi, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );

    echo 'Saved '.count($finalVi)." keys to resources/lang/vi.json and lang/vi.json!\n";
} else {
    echo "Pattern for lang_strings did not match!\n";
}
