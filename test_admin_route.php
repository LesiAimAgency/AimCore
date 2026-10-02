<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/ehenho/admin', 'GET');
$response = $kernel->handle($request);

echo "Status code: " . $response->getStatusCode() . "\n";
if ($response->isRedirect()) {
    echo "Redirect location: " . $response->headers->get('Location') . "\n";
} else {
    echo "Content snippet:\n" . substr($response->getContent(), 0, 500) . "\n";
}
