<?php

$src = 'c:/MAMP/htdocs/core/VGTDemo/public_html/app/Http/Controllers/Admin';
$dst = 'c:/MAMP/htdocs/core/VGTDemo/app/Http/Controllers/Admin';

$srcFiles = scandir($src);
$dstFiles = scandir($dst);

$missing = array_diff($srcFiles, $dstFiles);
echo "Controllers in public_html/app/Http/Controllers/Admin missing in VGTDemo:\n";
foreach ($missing as $f) {
    if ($f !== '.' && $f !== '..') {
        echo " - $f\n";
    }
}
