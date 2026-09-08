<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$session = app('session.store');
$session->put('cart', [
    1 => [
        'id' => 1,
        'name' => 'Demo Laptop',
        'price' => 15000000,
        'qty' => 1,
        'image' => ''
    ]
]);
$session->save();

$req = \Illuminate\Http\Request::create('/wkcomputer/dat-hang', 'GET');
$req->setLaravelSession($session);
$res = $kernel->handle($req);

$content = $res->getContent();
if (preg_match_all('/<script\b[^>]*>(.*?)<\/script>/is', $content, $matches)) {
    foreach ($matches[1] as $script) {
        if (str_contains($script, 'selectPayment')) {
            echo "FOUND SCRIPT:\n";
            echo $script . "\n";
        }
    }
} else {
    echo "STATUS: " . $res->getStatusCode() . "\n";
}
