<?php
require __DIR__ . '/vendor/autoload.php';
$path = public_path('media-files');
$large = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $file) {
    if ($file->getSize() > 10 * 1024 * 1024) { // > 10MB
        $large[] = $file->getPathname() . ' (' . round($file->getSize() / 1024 / 1024, 2) . ' MB)';
    }
}
echo "Large files in media-files (>10MB):\n" . implode("\n", $large) . "\n";
echo "Total large files: " . count($large) . "\n";
