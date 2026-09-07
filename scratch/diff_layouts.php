<?php

$src = 'c:/MAMP/htdocs/core/VGTDemo/public_html/resources/views/admin/layouts/app.blade.php';
$dst1 = 'c:/MAMP/htdocs/core/VGTDemo/resources/views/frontend/themes/viettinmartdemo/admin/layouts/app.blade.php';

$lines1 = explode("\n", file_get_contents($src));
$lines2 = explode("\n", file_get_contents($dst1));

$max = max(count($lines1), count($lines2));
$diffCount = 0;
for ($i = 0; $i < $max; $i++) {
    $l1 = $lines1[$i] ?? '[EOF]';
    $l2 = $lines2[$i] ?? '[EOF]';
    if (trim($l1) !== trim($l2)) {
        $diffCount++;
        if ($diffCount <= 30) {
            echo 'Line '.($i + 1).':'.PHP_EOL;
            echo "  SRC:  $l1".PHP_EOL;
            echo "  DST1: $l2".PHP_EOL;
        }
    }
}
echo "Total diff lines: $diffCount".PHP_EOL;
