<?php
require __DIR__ . '/../vendor/autoload.php';
$client = new \App\Services\Hosting\CpanelHostingClient(
    '103.200.23.236',
    'fukkatsu',
    '23j2y59u7t6u82194600109'
);

// Check files in public/data
try {
    $res = $client->listFiles('wkcomputer.aimagency.vn/public/data');
    echo "wkcomputer.aimagency.vn/public/data files:\n";
    print_r($res);
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
