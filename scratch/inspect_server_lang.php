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
header('Content-Type: text/plain');
$root = dirname(__DIR__);
$env = file_get_contents($root . '/.env');
foreach (explode("\n", $env) as $line) {
    if (str_contains($line, 'LOCALE')) {
        echo bin2hex($line) . " => " . $line . "\n";
    }
}
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_raw_env.php',
    'content' => $serverScript,
]);

echo "check_raw_env.php uploaded.\n";
