<?php

$src = 'c:/MAMP/htdocs/core/VGTDemo/public_html/resources/views/admin/layouts/app.blade.php';
$dst1 = 'c:/MAMP/htdocs/core/VGTDemo/resources/views/frontend/themes/viettinmartdemo/admin/layouts/app.blade.php';
$dst2 = 'c:/MAMP/htdocs/core/VGTDemo/resources/views/admin/layouts/app.blade.php';

$c_src = file_get_contents($src);
$c_dst1 = file_get_contents($dst1);
$c_dst2 = file_get_contents($dst2);

echo 'Length src: '.strlen($c_src).PHP_EOL;
echo 'Length dst1 (viettinmartdemo): '.strlen($c_dst1).PHP_EOL;
echo 'Length dst2 (resources/views/admin): '.strlen($c_dst2).PHP_EOL;

if ($c_src === $c_dst1) {
    echo 'src and dst1 are IDENTICAL!'.PHP_EOL;
} else {
    echo 'src and dst1 differ!'.PHP_EOL;
}
