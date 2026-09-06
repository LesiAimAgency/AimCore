<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$widgets = json_decode(file_get_contents(__DIR__ . '/../database/seeders/data/viettinmart/p10_widgets.json'), true);
$publicPath = public_path();

echo "Public path: {$publicPath}\n\n";

foreach ($widgets as $w) {
    if ($w['area'] === 'homepage-main') {
        echo "==================================================\n";
        echo "WIDGET: {$w['name']} [{$w['type']}]\n";
        echo "==================================================\n";
        $settings = is_string($w['settings']) ? json_decode($w['settings'], true) : $w['settings'];
        
        // Find all image keys or arrays
        $json = json_encode($settings);
        preg_match_all('/"(?:image|img|banner|thumbnail|src)":\s*"([^"]+)"/i', $json, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $img) {
                $filePath = public_path(ltrim($img, '/'));
                $exists = file_exists($filePath) ? "EXISTS" : "MISSING";
                echo "  Image: {$img} -> [{$exists}] ({$filePath})\n";
            }
        } else {
            echo "  No explicit image paths found in settings. Keys: " . implode(', ', array_keys($settings)) . "\n";
        }
    }
}

echo "\n==================================================\n";
echo "CHECKING PRODUCT THUMBNAILS (from p10_products.json)\n";
echo "==================================================\n";
$prods = json_decode(file_get_contents(__DIR__ . '/../database/seeders/data/viettinmart/p10_products.json'), true);
$missingProds = 0;
$existingProds = 0;
foreach (array_slice($prods, 0, 10) as $p) {
    $thumb = $p['thumbnail'] ?? '';
    $filePath = public_path(ltrim($thumb, '/'));
    $exists = file_exists($filePath) ? "EXISTS" : "MISSING";
    echo "  Product '{$p['name']}': {$thumb} -> [{$exists}]\n";
}
foreach ($prods as $p) {
    $thumb = $p['thumbnail'] ?? '';
    if (file_exists(public_path(ltrim($thumb, '/')))) {
        $existingProds++;
    } else {
        $missingProds++;
    }
}
echo "\nTotal Products: " . count($prods) . " | Existing Images: {$existingProds} | Missing Images: {$missingProds}\n";
