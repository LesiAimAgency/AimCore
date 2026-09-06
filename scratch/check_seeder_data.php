<?php

use App\Models\HostingProfile;
use App\Services\Hosting\HostingClientFactory;
use Illuminate\Contracts\Console\Kernel;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$p = HostingProfile::find(2);
$c = HostingClientFactory::make($p);
$ref = new ReflectionClass($c);
$method = $ref->getMethod('callUapi');
$method->setAccessible(true);

$runner = <<<'PHP'
<?php
header('Content-Type: application/json');

$dataPath = __DIR__ . '/../database/seeders/data';
$files = [];
if (is_dir($dataPath)) {
    $files = scandir($dataPath);
}

echo json_encode([
    'data_dir_exists' => is_dir($dataPath),
    'files' => $files,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_seeder_data.php',
    'content' => $runner
]);

$res = file_get_contents('https://aimagency.vn/check_seeder_data.php');
echo $res . "\n";
