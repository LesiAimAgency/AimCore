<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$request = Illuminate\Http\Request::create('/DA005', 'GET');
$response = $app->handle($request);
$html = $response->getContent();

$dom = new DOMDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$imgs = $xpath->query('//img');
foreach ($imgs as $img) {
    $src = $img->getAttribute('src');
    $alt = $img->getAttribute('alt');
    $parent = $img->parentNode ? $img->parentNode->nodeName . '.' . ($img->parentNode->getAttribute('class') ?: $img->parentNode->getAttribute('id')) : '';
    echo "SRC: $src | ALT: $alt | PARENT: $parent\n";
}

