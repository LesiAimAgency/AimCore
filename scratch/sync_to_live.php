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

// 1. Upload updated app/Models/Post.php
$postCode = file_get_contents(app_path('Models/Post.php'));
$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/app/Models',
    'file' => 'Post.php',
    'content' => $postCode,
]);
echo "Post.php uploaded.\n";

// 2. Upload updated database/seeders/ViettinmartProductsSeeder.php
$seederCode = file_get_contents(database_path('seeders/ViettinmartProductsSeeder.php'));
$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/database/seeders',
    'file' => 'ViettinmartProductsSeeder.php',
    'content' => $seederCode,
]);
echo "ViettinmartProductsSeeder.php uploaded.\n";

// 3. Upload runner to execute seeder on server
$serverRunner = <<<'PHP'
<?php
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ViettinmartProductsSeeder;
use App\Models\Post;

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
        
    $sample = Post::withoutGlobalScopes()
        ->where('project_id', $projectId)
        ->where('post_type', 'product')
        ->first();
        
    $out['sample_product'] = [
        'title' => $sample->title,
        'sku' => $sample->sku,
        'display_price' => $sample->display_price,
        'stock' => $sample->stock_quantity,
        'stock_status' => $sample->stock_status,
        'category' => $sample->category?->name ?? 'Chưa phân loại',
    ];
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
    'file' => 'reseed_and_verify.php',
    'content' => $serverRunner,
]);
echo "reseed_and_verify.php uploaded.\n";
