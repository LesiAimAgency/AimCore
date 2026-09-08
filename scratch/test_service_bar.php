<?php
$html = file_get_contents('http://127.0.0.1:8000/wkcomputer');
echo str_contains($html, 'wk-service-bar') ? "SERVICE BAR: PASS\n" : "SERVICE BAR: FAIL\n";
echo str_contains($html, 'Giao hàng siêu tốc 2h') ? "ITEMS: PASS\n" : "ITEMS: FAIL\n";
echo str_contains($html, '100% Chính hãng') ? "ITEM 2: PASS\n" : "ITEM 2: FAIL\n";
echo str_contains($html, 'Lỗi 1 đổi 1 trong 30 ngày') ? "ITEM 3: PASS\n" : "ITEM 3: FAIL\n";
echo str_contains($html, 'Trả góp 0% linh hoạt') ? "ITEM 4: PASS\n" : "ITEM 4: FAIL\n";
echo str_contains($html, 'Hỗ trợ kỹ thuật 24/7') ? "ITEM 5: PASS\n" : "ITEM 5: FAIL\n";
