<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$req = Request::create('/viettinmart-eco/san-pham/tom-the-hl-cap-dong', 'GET');
$resp = $app->handle($req);

echo 'Status: '.$resp->getStatusCode()."\n";
$html = $resp->getContent();

// Extract from "action-buttons-wrapper" to "product-uniques"
$start = strpos($html, 'product-detail-actions');
if ($start !== false) {
    $slice = substr($html, $start - 100, 3000);
    echo "=== SLICE ===\n".$slice."\n";
} else {
    echo "product-detail-actions not found in HTML!\n";
}
