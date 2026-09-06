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
    
    $projectId = $project ? $project->id : 11;
    $tenantId = $tenant ? $tenant->id : 4;
    
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
        
    $out['sample_product'] = $sample ? [
        'id' => $sample->id,
        'title' => $sample->title,
        'status' => $sample->status,
        'sku' => $sample->sku,
        'display_price' => $sample->display_price,
        'stock' => $sample->stock_quantity,
        'stock_status' => $sample->stock_status,
        'category' => $sample->category?->name ?? 'Chưa phân loại',
    ] : null;
} catch (\Throwable $e) {
    $out['success'] = false;
    $out['error'] = $e->getMessage();
    $out['file'] = $e->getFile() . ':' . $e->getLine();
    $out['trace'] = $e->getTraceAsString();
}

echo json_encode($out, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'execute_live_seeder.php',
    'content' => $serverRunner,
]);

echo "Uploaded execute_live_seeder.php. Executing via HTTP...\n";

// Execute via cURL with timeout
$ch = curl_init('https://aimagency.vn/execute_live_seeder.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Response:\n" . $res . "\n";
