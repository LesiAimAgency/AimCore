<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$p = \App\Models\HostingProfile::find(2);
$c = \App\Services\Hosting\HostingClientFactory::make($p);

$ref = new ReflectionClass($c);
$method = $ref->getMethod('callUapi');
$method->setAccessible(true);

$res = $method->invoke($c, 'Fileman', 'list_files', [
    'dir' => 'aimagency.vn/public',
    'types' => 'dir|file|symlink'
]);
echo json_encode($res, JSON_PRETTY_PRINT);
