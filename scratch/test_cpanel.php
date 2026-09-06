<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$p = \App\Models\HostingProfile::find(2);
$c = \App\Services\Hosting\HostingClientFactory::make($p);

$ref = new ReflectionClass($c);
$method = $ref->getMethod('callUapi');
$method->setAccessible(true);

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'cleanup.php',
    'content' => '<?php
@unlink(__DIR__ . "/fix_storage.php");
@unlink(__DIR__ . "/test_symlink.php");
@unlink(__DIR__ . "/cleanup.php");
echo "CLEANUP_DONE";
'
]);

echo "cleanup.php created.\n";
