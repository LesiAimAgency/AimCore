<?php

declare(strict_types=1);

$data = json_decode(file_get_contents(__DIR__.'/../data/live-database-inspection.json'), true);
$keys = array_keys($data);

echo "Tables matching 'profile', 'message', 'tenant', 'ehenho', 'prov':\n";
foreach ($keys as $k) {
    if (str_contains($k, 'profile') || str_contains($k, 'message') || str_contains($k, 'tenant') || str_contains($k, 'ehenho') || str_contains($k, 'prov')) {
        echo "- $k\n";
    }
}
