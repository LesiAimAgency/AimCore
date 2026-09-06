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
$envPath = $root . '/.env';
$env = file_get_contents($envPath);

// Replace APP_LOCALE=en1 with APP_LOCALE=vi
// Replace APP_FALLBACK_LOCALE=en with APP_FALLBACK_LOCALE=vi
// Ensure clean unix line endings for these lines
$newEnv = preg_replace('/APP_LOCALE=.*\r?\n/', "APP_LOCALE=vi\n", $env);
$newEnv = preg_replace('/APP_FALLBACK_LOCALE=.*\r?\n/', "APP_FALLBACK_LOCALE=vi\n", $newEnv);

if ($newEnv !== $env) {
    file_put_contents($envPath, $newEnv);
    echo "ENV_UPDATED_SUCCESSFULLY\n";
} else {
    echo "ENV_ALREADY_MATCHED\n";
}

// Clear config and route cache if any
@unlink($root . '/bootstrap/cache/config.php');
@unlink($root . '/bootstrap/cache/routes-v7.php');
@unlink($root . '/bootstrap/cache/services.php');
@unlink($root . '/bootstrap/cache/packages.php');

// Also clear view cache
$views = glob($root . '/storage/framework/views/*');
if ($views) {
    foreach ($views as $v) {
        if (is_file($v)) @unlink($v);
    }
}
echo "CACHE_CLEARED\n";

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'fix_env_server.php',
    'content' => $serverScript,
]);

echo "fix_env_server.php uploaded.\n";
