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
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$out = [];
try {
    $out['projects'] = DB::table('projects')->get(['id', 'code', 'name']);
    $out['products_enhanced_counts'] = DB::table('products_enhanced')
        ->select('project_id', 'tenant_id', 'status', DB::raw('count(*) as total'))
        ->groupBy('project_id', 'tenant_id', 'status')
        ->get();
    $out['cms_users'] = DB::table('users')
        ->where('username', 'like', '%viettin%')
        ->orWhere('role', 'cms')
        ->get(['id', 'username', 'email', 'role', 'level', 'tenant_id', 'project_ids']);
    $out['tenants'] = DB::table('tenants')->get(['id', 'name', 'code', 'domain']);
} catch (\Throwable $e) {
    $out['error'] = $e->getMessage();
}

echo json_encode($out, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_enhanced_products.php',
    'content' => $serverScript,
]);

echo "check_enhanced_products.php uploaded.\n";
