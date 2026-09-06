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

$localFile = 'c:/MAMP/htdocs/core/VGTDemo/app/Http/Controllers/Viettinmart/CheckoutController.php';
$content = file_get_contents($localFile);

$res = $method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
    'file' => 'CheckoutController.php',
    'content' => $content,
]);

echo "DEPLOY STATUS: " . json_encode($res) . "\n";
