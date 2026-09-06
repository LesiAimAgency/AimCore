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

$slug = 'san-pham-tuoi-cap-dong-chua-so-che';

$cat = \Illuminate\Support\Facades\DB::table('categories')->where('slug', $slug)->get();
$prod = \Illuminate\Support\Facades\DB::table('products_enhanced')->where('slug', $slug)->get();
$page = \Illuminate\Support\Facades\DB::table('pages')->where('slug', $slug)->get();
$post = \Illuminate\Support\Facades\DB::table('posts')->where('slug', $slug)->get();

// Also look for similar slugs
$similarCat = \Illuminate\Support\Facades\DB::table('categories')->where('slug', 'like', '%so-che%')->orWhere('slug', 'like', '%cap-dong%')->get();

echo json_encode([
    'categories' => $cat,
    'products' => $prod,
    'pages' => $page,
    'posts' => $post,
    'similar_categories' => $similarCat,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_slug.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_slug.php');
