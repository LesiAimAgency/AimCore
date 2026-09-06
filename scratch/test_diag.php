<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/viettinmart-eco/tom-the-pd-xien-que-cap-dong', 'GET');
$start = microtime(true);
$response = $kernel->handle($request);
echo "Status: " . $response->getStatusCode() . "\n";
echo "Time: " . (microtime(true) - $start) . "s\n";
echo "Memory: " . (memory_get_peak_usage(true) / 1024 / 1024) . "MB\n";
$kernel->terminate($request, $response);
