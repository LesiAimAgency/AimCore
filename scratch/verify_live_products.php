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

$runner = <<<'PHP'
<?php
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$count = DB::table('posts')->where('project_id', 11)->where('post_type', 'product')->count();
$publishedCount = DB::table('posts')->where('project_id', 11)->where('post_type', 'product')->where('status', 'published')->count();
$posts = Post::withoutGlobalScopes()->where('project_id', 11)->where('post_type', 'product')->limit(3)->get(['id', 'title', 'slug', 'status']);

echo json_encode([
    'total_products' => $count,
    'published_products' => $publishedCount,
    'sample_posts' => $posts
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_live_prods_now.php',
    'content' => $runner
]);

$res = file_get_contents('https://aimagency.vn/check_live_prods_now.php');
echo $res . "\n";
