<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

// Test 1: Request to /viettinmart-eco with Host: aimagency.vn
$req1 = Request::create('https://aimagency.vn/viettinmart-eco', 'GET');
$res1 = $app->handle($req1);
echo "Status /viettinmart-eco: " . $res1->getStatusCode() . "\n";
$html1 = $res1->getContent();

// Check for logo
preg_match_all('/<img[^>]*class="[^"]*logo[^"]*"[^>]*>/i', $html1, $matches);
echo "Logo tags found in /viettinmart-eco:\n";
print_r($matches[0]);

// Check for font-family Barlow in :root
preg_match('/--font-primary:[^;]+;/i', $html1, $fMatch);
echo "\nFont primary CSS:\n" . ($fMatch[0] ?? 'NOT FOUND') . "\n";

// Check for primary color in :root
preg_match('/--color-primary:[^;]+;/i', $html1, $cMatch);
echo "\nColor primary CSS:\n" . ($cMatch[0] ?? 'NOT FOUND') . "\n";

// Test 2: Request to /public/viettinmart-eco with Host: aimagency.vn
$subApp = require 'bootstrap/app.php';
$subKernel = $subApp->make(Kernel::class);
$subKernel->bootstrap();
$req2 = Request::create('https://aimagency.vn/public/viettinmart-eco', 'GET');
$res2 = $subApp->handle($req2);
echo "\nStatus /public/viettinmart-eco: " . $res2->getStatusCode() . "\n";
if ($res2->isRedirection()) {
    echo "Redirect target: " . $res2->headers->get('Location') . "\n";
} else {
    preg_match_all('/<img[^>]*class="[^"]*logo[^"]*"[^>]*>/i', $res2->getContent(), $matches2);
    echo "Logo tags found in /public/viettinmart-eco:\n";
    print_r($matches2[0]);
}
