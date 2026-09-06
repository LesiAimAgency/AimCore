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
use App\Models\Product;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$raw116 = DB::table('products_enhanced')->where('id', 116)->first();
$model116_withoutScope = Product::withoutGlobalScopes()->find(116);
$model116_withScope = Product::find(116);

$allCount = DB::table('products_enhanced')->count();
$sampleIds = DB::table('products_enhanced')->pluck('id')->take(10);
$scopes = class_uses_recursive(Product::class);

echo json_encode([
    'total_in_products_enhanced' => $allCount,
    'sample_ids' => $sampleIds,
    'raw_116' => $raw116,
    'model116_withoutScope' => $model116_withoutScope ? $model116_withoutScope->id : null,
    'model116_withScope' => $model116_withScope ? $model116_withScope->id : null,
    'current_project_id' => app()->bound('current_project_id') ? app('current_project_id') : null,
    'session_project_id' => session('current_project_id'),
], JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_prod116.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_prod116.php');
