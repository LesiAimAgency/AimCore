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

$serverScript = <<<'PHP'
<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

\Illuminate\Support\Facades\Artisan::call('view:clear');
$out1 = \Illuminate\Support\Facades\Artisan::output();

\Illuminate\Support\Facades\Artisan::call('cache:clear');
$out2 = \Illuminate\Support\Facades\Artisan::output();

echo json_encode([
    'view_clear' => trim($out1),
    'cache_clear' => trim($out2),
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'clear_view_cache.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/clear_view_cache.php');
