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

$row = Illuminate\Support\Facades\DB::table('products_enhanced')->where('id', 116)->first();
$projects = Illuminate\Support\Facades\DB::table('projects')->select(['id', 'code', 'name'])->get();
$projectInContext = request()->attributes->get('project');

echo json_encode([
    'product_116' => $row ? [
        'id' => $row->id,
        'name' => $row->name,
        'project_id' => $row->project_id,
        'tenant_id' => $row->tenant_id,
    ] : null,
    'projects' => $projects,
    'default_tenant_id' => config('app.default_tenant_id'),
    'current_tenant_id' => session('current_tenant_id'),
], JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_p116_ids.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_p116_ids.php');
