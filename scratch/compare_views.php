<?php

$src = 'c:/MAMP/htdocs/core/VGTDemo/public_html/resources/views';
$dst = 'c:/MAMP/htdocs/core/VGTDemo/resources/views/frontend/themes/viettinmartdemo';
$srcFiles = [];
$dstFiles = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src)) as $file) {
    if ($file->isFile()) {
        $rel = str_replace([$src, '\\'], ['', '/'], $file->getPathname());
        $srcFiles[] = ltrim($rel, '/');
    }
}
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dst)) as $file) {
    if ($file->isFile()) {
        $rel = str_replace([$dst, '\\'], ['', '/'], $file->getPathname());
        $dstFiles[] = ltrim($rel, '/');
    }
}
$missingInDst = array_diff($srcFiles, $dstFiles);
$missingInSrc = array_diff($dstFiles, $srcFiles);
echo 'Missing in viettinmartdemo: '.count($missingInDst).PHP_EOL;
foreach ($missingInDst as $f) {
    echo "  - $f".PHP_EOL;
}
echo 'Missing in public_html: '.count($missingInSrc).PHP_EOL;
foreach ($missingInSrc as $f) {
    echo "  + $f".PHP_EOL;
}
