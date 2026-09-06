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

$request = Illuminate\Http\Request::create('/viettinmart-eco/dat-hang/thanh-cong/ORD-20260906-GUTBM', 'GET');
// Run middleware pipeline on request up to controller
$app->instance('request', $request);

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
$request->attributes->set('project', $project);

\Illuminate\Support\Facades\DB::enableQueryLog();

try {
    $order = \App\Models\Order::where('order_number', 'ORD-20260906-GUTBM')->first();
} catch (\Throwable $e) {
    $order = $e->getMessage();
}

$queries = \Illuminate\Support\Facades\DB::getQueryLog();

$withoutScopes = \App\Models\Order::withoutGlobalScopes()->where('order_number', 'ORD-20260906-GUTBM')->first();

echo json_encode([
    'project_in_context' => $project ? ['id' => $project->id, 'code' => $project->code, 'tenant_id' => $project->tenant_id] : null,
    'session_tenant_id' => session('current_tenant_id'),
    'config_default_tenant' => config('app.default_tenant_id'),
    'order_with_scopes' => $order,
    'order_without_scopes' => $withoutScopes ? ['id' => $withoutScopes->id, 'project_id' => $withoutScopes->project_id, 'tenant_id' => $withoutScopes->tenant_id] : null,
    'queries' => $queries,
], JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'debug_order_query.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/debug_order_query.php');
