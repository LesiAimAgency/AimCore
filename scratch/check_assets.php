<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$html = file_get_contents(__DIR__.'/final_check.html');
preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $html, $matches);
$srcs = array_unique($matches[1]);
echo '=== IMAGES ('.count($srcs).') ==='.PHP_EOL;
$missingImages = 0;
foreach ($srcs as $src) {
    if (str_starts_with($src, 'data:')) {
        continue;
    }
    $path = parse_url($src, PHP_URL_PATH);
    $localPath = public_path(ltrim($path, '/'));
    $exists = file_exists($localPath);
    if (! $exists) {
        $missingImages++;
        echo "[MISSING] $src => $localPath".PHP_EOL;
    }
}
echo "Total missing images: $missingImages".PHP_EOL;

preg_match_all('/background-image:\s*url\([\'"]?([^\'")]+)[\'"]?\)/i', $html, $bgMatches);
$bgs = array_unique($bgMatches[1]);
echo PHP_EOL.'=== BACKGROUNDS ('.count($bgs).') ==='.PHP_EOL;
$missingBgs = 0;
foreach ($bgs as $bg) {
    $path = parse_url($bg, PHP_URL_PATH);
    $localPath = public_path(ltrim($path, '/'));
    $exists = file_exists($localPath);
    if (! $exists) {
        $missingBgs++;
        echo "[MISSING BG] $bg => $localPath".PHP_EOL;
    }
}
echo "Total missing backgrounds: $missingBgs".PHP_EOL;
