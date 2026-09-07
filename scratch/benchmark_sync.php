<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$t0 = microtime(true);
$res = app(App\Services\ViettinmartDataSyncService::class)->syncProjectId(10, 3);
echo 'Time: ' . (microtime(true) - $t0) . "s\n";
echo "Result: " . json_encode($res) . "\n";
