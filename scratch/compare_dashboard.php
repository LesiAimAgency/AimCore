<?php

$f1 = 'c:/MAMP/htdocs/core/VGTDemo/public_html/resources/views/admin/dashboard.blade.php';
$f2 = 'c:/MAMP/htdocs/core/VGTDemo/resources/views/frontend/themes/viettinmartdemo/admin/dashboard.blade.php';

$c1 = file_get_contents($f1);
$c2 = file_get_contents($f2);

if ($c1 === $c2) {
    echo 'EXACT MATCH: The files are identical!'.PHP_EOL;
} else {
    echo 'Files differ! Length 1: '.strlen($c1).', Length 2: '.strlen($c2).PHP_EOL;
    $lines1 = explode("\n", $c1);
    $lines2 = explode("\n", $c2);
    $max = max(count($lines1), count($lines2));
    for ($i = 0; $i < $max; $i++) {
        $l1 = $lines1[$i] ?? '[EOF]';
        $l2 = $lines2[$i] ?? '[EOF]';
        if (trim($l1) !== trim($l2)) {
            echo 'Line '.($i + 1).':'.PHP_EOL;
            echo "  SRC: $l1".PHP_EOL;
            echo "  DST: $l2".PHP_EOL;
        }
    }
}
