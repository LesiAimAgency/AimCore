<?php

use App\Models\HostingProfile;
use App\Services\Hosting\HostingClientFactory;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$p = HostingProfile::find(2);
$c = HostingClientFactory::make($p);

$ref = new ReflectionClass($c);
$method = $ref->getMethod('callUapi');
$method->setAccessible(true);

$filesToDeploy = [
    [
        'local' => 'c:/MAMP/htdocs/core/VGTDemo/app/Http/Controllers/Frontend/PageController.php',
        'dir' => 'aimagency.vn/app/Http/Controllers/Frontend',
        'file' => 'PageController.php',
    ],
    [
        'local' => 'c:/MAMP/htdocs/core/VGTDemo/app/Http/Controllers/Viettinmart/ShopController.php',
        'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
        'file' => 'ShopController.php',
    ],
    [
        'local' => 'c:/MAMP/htdocs/core/VGTDemo/app/Models/Widget.php',
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'Widget.php',
    ],
    [
        'local' => 'c:/MAMP/htdocs/core/VGTDemo/resources/views/frontend/themes/viettinmartdemo/layouts/partials/header.blade.php',
        'dir' => 'aimagency.vn/resources/views/frontend/themes/viettinmartdemo/layouts/partials',
        'file' => 'header.blade.php',
    ],
];

foreach ($filesToDeploy as $f) {
    $content = file_get_contents($f['local']);
    $res = $method->invoke($c, 'Fileman', 'save_file_content', [
        'dir' => $f['dir'],
        'file' => $f['file'],
        'content' => $content,
    ]);
    echo "DEPLOYED {$f['file']}: " . ($res ? "OK" : "FAILED") . "\n";
}
