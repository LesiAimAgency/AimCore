<?php

$src = 'c:/MAMP/htdocs/core/VGTDemo/public_html/app/Models';
$dst = 'c:/MAMP/htdocs/core/VGTDemo/app/Models';

$srcFiles = scandir($src);
$dstFiles = scandir($dst);

$missing = array_diff($srcFiles, $dstFiles);
echo "Models in public_html/app/Models missing in VGTDemo:\n";
foreach ($missing as $f) {
    if ($f !== '.' && $f !== '..') {
        echo " - $f\n";
    }
}
