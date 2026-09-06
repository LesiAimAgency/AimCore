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

$tenants = \Illuminate\Support\Facades\DB::table('tenants')->get();
$project = \Illuminate\Support\Facades\DB::table('projects')->where('id', 11)->first();
$productsTenants = \Illuminate\Support\Facades\DB::table('products_enhanced')->where('project_id', 11)->select('tenant_id', \Illuminate\Support\Facades\DB::raw('count(*) as count'))->groupBy('tenant_id')->get();
$widgetsTenants = \Illuminate\Support\Facades\DB::table('widgets')->where('project_id', 11)->select('tenant_id', \Illuminate\Support\Facades\DB::raw('count(*) as count'))->groupBy('tenant_id')->get();
$ordersTenants = \Illuminate\Support\Facades\DB::table('orders')->where('project_id', 11)->select('tenant_id', \Illuminate\Support\Facades\DB::raw('count(*) as count'))->groupBy('tenant_id')->get();

echo json_encode([
    'tenants' => $tenants,
    'project_11' => $project,
    'products_tenants' => $productsTenants,
    'widgets_tenants' => $widgetsTenants,
    'orders_tenants' => $ordersTenants,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_tenant_details.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_tenant_details.php');
