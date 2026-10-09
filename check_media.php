<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$server = [
    'HTTP_HOST' => 'localhost',
    'SERVER_NAME' => 'localhost',
    'SERVER_PORT' => '80',
    'REQUEST_URI' => '/core/VGTDemo/public/DA005/admin/media/list',
    'SCRIPT_NAME' => '/core/VGTDemo/public/index.php',
];
$request = new Request([], [], [], [], [], $server);
app()->instance('request', $request);

$files = [
    'media/project-DA005/2.png',
    'media/project-DA005/Meet The Founder 2.png',
    'media/project-DA005/Nữ MC rạng rỡ dưới ánh sáng mềm.png',
];

foreach ($files as $f) {
    echo "FILE: $f\n";
    echo '  raw asset: '.asset('storage/'.$f)."\n";
    // Also test rawurlencode per segment
    $segments = explode('/', $f);
    $encodedSegments = array_map('rawurlencode', $segments);
    $encodedPath = implode('/', $encodedSegments);
    echo '  encoded asset: '.asset('storage/'.$encodedPath)."\n";
}
