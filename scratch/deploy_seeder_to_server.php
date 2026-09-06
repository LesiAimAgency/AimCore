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

// 1. Upload updated ViettinmartProductsSeeder.php
$seederCode = file_get_contents(database_path('seeders/ViettinmartProductsSeeder.php'));
$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/database/seeders',
    'file' => 'ViettinmartProductsSeeder.php',
    'content' => $seederCode,
]);

echo "ViettinmartProductsSeeder.php uploaded to server.\n";

// 2. Upload runner script
$serverRunner = <<<'PHP'
<?php
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ViettinmartProductsSeeder;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$out = [];
try {
    $project = DB::table('projects')->where('code', 'viettinmart-eco')->first();
    $tenant = DB::table('tenants')->where('code', 'viettinmart-eco')->first();
    
    $projectId = $project->id; // 11
    $tenantId = $tenant->id;   // 4
    
    $seeder = new ViettinmartProductsSeeder();
    $seeder->run($projectId, $tenantId);
    
    $out['success'] = true;
    $out['project_id'] = $projectId;
    $out['tenant_id'] = $tenantId;
    $out['posts_products_count'] = DB::table('posts')
        ->where('project_id', $projectId)
        ->where('post_type', 'product')
        ->count();
    $out['products_enhanced_count'] = DB::table('products_enhanced')
        ->where('project_id', $projectId)
        ->count();
    $out['posts_sample'] = DB::table('posts')
        ->where('project_id', $projectId)
        ->where('post_type', 'product')
        ->limit(3)
        ->get(['id', 'title', 'slug', 'post_type', 'status', 'project_id']);
        
} catch (\Throwable $e) {
    $out['success'] = false;
    $out['error'] = $e->getMessage();
    $out['trace'] = $e->getTraceAsString();
}

echo json_encode($out, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'execute_seeder_server.php',
    'content' => $serverRunner,
]);

echo "execute_seeder_server.php uploaded to server.\n";
