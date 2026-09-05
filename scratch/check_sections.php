<?php

$content = file_get_contents('scratch/homepage_dump.html');
$start = strpos($content, '<main>');
$end = strpos($content, '</main>');
$main = substr($content, $start, $end - $start);

// Find each direct top-level widget container inside <main>
preg_match_all('/<div class="([^"]+)"\s*(style="[^"]*")?>/i', $main, $matches, PREG_SET_ORDER);

echo 'Total matching divs inside main: '.count($matches).PHP_EOL;

// Look for widget comments or section classes
preg_match_all('/<!--.*?-->|<div class="([^"]*(?:rts-|section-|widget-)[^"]*)"/i', $main, $sections);

foreach ($sections[0] as $sec) {
    if (str_contains($sec, '<!--') || str_contains($sec, 'rts-') || str_contains($sec, 'section-')) {
        echo $sec.PHP_EOL;
    }
}
