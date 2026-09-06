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

$localContent = file_get_contents(app_path('Http/Middleware/ProjectSubdomainMiddleware.php'));

$res = $method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/app/Http/Middleware',
    'file' => 'ProjectSubdomainMiddleware.php',
    'content' => $localContent,
]);

echo "ProjectSubdomainMiddleware.php uploaded to server.\n";
