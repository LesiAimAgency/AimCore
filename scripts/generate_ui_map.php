<?php

declare(strict_types=1);

$inventory = json_decode(file_get_contents(__DIR__ . '/../data/page-inventory.json'), true);

$uiMap = [
    'theme' => 'ehenho',
    'base_source_dir' => 'public/e-henho',
    'target_blade_root' => 'resources/views/themes/ehenho',
    'pages' => []
];

foreach ($inventory as $page) {
    $bladeSubdir = match($page['page_type']) {
        'homepage' => 'pages',
        'auth' => 'pages/auth',
        'profile' => 'pages/profile',
        'messaging' => 'pages/messages',
        'social' => 'pages/social',
        'search' => 'pages/search',
        'account', 'account-settings' => 'pages/account',
        'static-content' => 'pages',
        default => 'pages'
    };

    $baseName = str_replace('.html', '', $page['file']);
    $bladeFile = str_replace('-', '_', $baseName) . '.blade.php';

    $uiMap['pages'][] = [
        'source_file' => 'public/e-henho/' . $page['file'],
        'page_type' => $page['page_type'],
        'theme_candidate' => 'ehenho',
        'target_blade' => "resources/views/themes/ehenho/{$bladeSubdir}/{$bladeFile}",
        'layout' => $page['layout'],
        'components' => $page['components'],
        'forms_count' => count($page['forms']),
        'interactive_count' => count($page['interactive_elements']),
        'target_route' => $page['laravel_mapping']['route'],
        'controller' => $page['laravel_mapping']['controller'],
        'models' => $page['laravel_mapping']['model']
    ];
}

file_put_contents(__DIR__ . '/../data/laravel-ui-map.json', json_encode($uiMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "Generated data/laravel-ui-map.json (" . count($uiMap['pages']) . " mapped pages)\n";
