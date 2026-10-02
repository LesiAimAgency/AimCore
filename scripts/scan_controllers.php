<?php

declare(strict_types=1);

$controllerDir = __DIR__ . '/../app/Http/Controllers';

function getPhpFiles($dir) {
    $files = [];
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            $files = array_merge($files, getPhpFiles($path));
        } elseif (str_ends_with($item, '.php')) {
            $files[] = $path;
        }
    }
    return $files;
}

$controllers = getPhpFiles($controllerDir);
$categorized = [
    'Core/Base' => [],
    'SuperAdmin' => [],
    'Admin CMS' => [],
    'Frontend Viettinmart' => [],
    'Frontend WKComputer' => [],
    'Auth' => [],
    'API' => [],
    'Other' => []
];

foreach ($controllers as $ctrl) {
    $rel = str_replace(realpath($controllerDir) . DIRECTORY_SEPARATOR, '', realpath($ctrl));
    $name = basename($ctrl);
    
    if (str_starts_with($rel, 'SuperAdmin\\') || str_starts_with($rel, 'SuperAdmin/')) {
        $categorized['SuperAdmin'][] = $rel;
    } elseif (str_starts_with($rel, 'Admin\\') || str_starts_with($rel, 'Admin/')) {
        $categorized['Admin CMS'][] = $rel;
    } elseif (str_starts_with($rel, 'Viettinmart\\') || str_starts_with($rel, 'Viettinmart/')) {
        $categorized['Frontend Viettinmart'][] = $rel;
    } elseif (str_starts_with($rel, 'Wkcomputer\\') || str_starts_with($rel, 'Wkcomputer/')) {
        $categorized['Frontend WKComputer'][] = $rel;
    } elseif (str_starts_with($rel, 'Auth\\') || str_starts_with($rel, 'Auth/') || str_contains($name, 'Login') || str_contains($name, 'Register')) {
        $categorized['Auth'][] = $rel;
    } elseif (str_starts_with($rel, 'Api\\') || str_starts_with($rel, 'Api/')) {
        $categorized['API'][] = $rel;
    } elseif ($name === 'Controller.php') {
        $categorized['Core/Base'][] = $rel;
    } else {
        $categorized['Other'][] = $rel;
    }
}

echo "=== CONTROLLERS SCAN (" . count($controllers) . " files) ===\n";
foreach ($categorized as $cat => $list) {
    echo "- $cat: " . count($list) . "\n";
}

file_put_contents(__DIR__ . '/../data/laravel-controllers.json', json_encode($categorized, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "Saved to data/laravel-controllers.json\n";
