<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Route;

$routes = Route::getRoutes();
$names = [];
$duplicates = [];

foreach ($routes as $r) {
    $name = $r->getName();
    if ($name) {
        if (isset($names[$name])) {
            $duplicates[$name][] = $r->uri();
            $duplicates[$name][] = $names[$name];
        } else {
            $names[$name] = $r->uri();
        }
    }
}

echo "Total named routes: " . count($names) . "\n";
echo "Duplicate route names count: " . count($duplicates) . "\n\n";

foreach ($duplicates as $name => $uris) {
    echo "DUPLICATE: '{$name}'\n";
    foreach (array_unique($uris) as $u) {
        echo "   -> uri: {$u}\n";
    }
}
