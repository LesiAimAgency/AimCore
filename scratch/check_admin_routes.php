<?php

$files = [
    'c:/MAMP/htdocs/core/VGTDemo/resources/views/frontend/themes/viettinmartdemo/admin/layouts/app.blade.php',
    'c:/MAMP/htdocs/core/VGTDemo/resources/views/frontend/themes/viettinmartdemo/admin/dashboard.blade.php',
];

$routes = [];
foreach ($files as $f) {
    $content = file_get_contents($f);
    preg_match_all('/(?:locale_route|route)\s*\(\s*[\'\"]([^\'\"]+)[\'\"]/', $content, $matches);
    foreach ($matches[1] as $r) {
        $routes[$r] = true;
    }
}

ksort($routes);
echo "Routes referenced in viettinmartdemo admin layout & dashboard:\n";
foreach (array_keys($routes) as $r) {
    $hasRoute = Route::has($r);
    echo ($hasRoute ? '[OK]  ' : '[MISSING] ').$r."\n";
}
