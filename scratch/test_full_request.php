<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$routes = [
    '/viettinmart-eco/blog/5-cong-thuc-che-bien-ca-hoi-phi-le-don-gian',
    '/viettinmart-eco/blog',
    '/viettinmart-eco/cua-hang',
    '/viettinmart-eco',
];

foreach ($routes as $url) {
    $request = Request::create($url, 'GET');
    $response = $kernel->handle($request);
    echo "$url: Status ".$response->getStatusCode().' ('.strlen($response->getContent())." bytes)\n";
    if ($response->getStatusCode() >= 400 && $response->exception) {
        echo '   Error: '.$response->exception->getMessage()."\n";
    }
    $kernel->terminate($request, $response);
}
