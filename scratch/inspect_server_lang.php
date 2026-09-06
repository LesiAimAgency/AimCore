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
header('Content-Type: application/json');

$root = dirname(__DIR__);

$env = file_get_contents($root . '/.env');
preg_match('/APP_LOCALE=(.*)/', $env, $mLocale);
preg_match('/APP_FALLBACK_LOCALE=(.*)/', $env, $mFallback);

// Check database settings
$envContent = $env;
preg_match('/DB_DATABASE=(.*)/', $envContent, $db);
preg_match('/DB_USERNAME=(.*)/', $envContent, $user);
preg_match('/DB_PASSWORD=(.*)/', $envContent, $pass);
preg_match('/DB_HOST=(.*)/', $envContent, $host);

$pdo = new PDO(
    "mysql:host=" . trim($host[1] ?? '127.0.0.1') . ";dbname=" . trim($db[1] ?? ''),
    trim($user[1] ?? ''),
    trim($pass[1] ?? '')
);

$stmt = $pdo->query("SELECT id, project_id, `key`, value FROM settings WHERE `key` IN ('languages', 'locale', 'default_locale', 'app_locale')");
$settings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check project_settings
$stmt2 = $pdo->query("SELECT id, project_id, `key`, value FROM project_settings WHERE `key` IN ('languages', 'locale', 'default_locale', 'app_locale')");
$pSettings = $stmt2->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'env_locale' => $mLocale[1] ?? null,
    'env_fallback' => $mFallback[1] ?? null,
    'settings' => $settings,
    'project_settings' => $pSettings
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_locale_origin.php',
    'content' => $serverScript,
]);

echo "check_locale_origin.php uploaded.\n";
