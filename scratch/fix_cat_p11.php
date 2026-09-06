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

$affected = \Illuminate\Support\Facades\DB::table('product_categories')
    ->where('tenant_id', 4)
    ->where('project_id', 10)
    ->update(['project_id' => 11]);

$categories = \Illuminate\Support\Facades\DB::table('product_categories')
    ->where('project_id', 11)
    ->get(['id', 'name', 'slug', 'project_id', 'tenant_id']);

echo json_encode([
    'affected' => $affected,
    'categories_p11' => $categories,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'fix_cat_p11.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/fix_cat_p11.php');
