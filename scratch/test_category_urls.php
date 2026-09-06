<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$urls = [
    '/viettinmart-eco/danh-muc/hang-ready-to-cook',
    '/viettinmart-eco/hang-ready-to-cook',
    '/viettinmart-eco/san-pham/hang-ready-to-cook',
];

foreach ($urls as $url) {
    $request = Illuminate\Http\Request::create($url, 'GET');
    $response = $kernel->handle($request);
    echo "URL: {$url} -> Status: " . $response->getStatusCode() . PHP_EOL;
    $kernel->terminate($request, $response);
}
