<?php

use App\Models\Post;
use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$routesToTest = [
    '/' => 'Homepage',
    '/viettinmart-eco' => 'Project Homepage',
    '/viettinmart-eco/cua-hang' => 'Shop Index',
    '/viettinmart-eco/blog' => 'Blog Index',
    '/viettinmart-eco/lien-he' => 'Contact Page',
    '/viettinmart-eco/order-track' => 'Order Track',
    '/viettinmart-eco/wishlist' => 'Wishlist',
    '/viettinmart-eco/so-sanh' => 'Compare',
    '/viettinmart-eco/gio-hang' => 'Cart Page',
    '/viettinmart-eco/dat-hang' => 'Checkout Page',
    '/viettinmart-eco/login' => 'Login Page',
    '/viettinmart-eco/register' => 'Register Page',
    '/viettinmart-eco/profile' => 'Profile Page (guest)',
    '/viettinmart-eco/gioi-thieu' => 'Page: Gioi thieu',
    '/viettinmart-eco/chinh-sach-bao-mat' => 'Page: Chinh sach bao mat',
    '/viettinmart-eco/sitemap' => 'Sitemap HTML',
    '/viettinmart-eco/sitemap.xml' => 'Sitemap XML',
];

// Also find a post and a product to test detail pages
$project = Project::where('code', 'viettinmart-eco')->first();
$product = DB::table('products_enhanced')
    ->where('project_id', $project->id)
    ->where('status', 'active')
    ->first();
if ($product) {
    $routesToTest["/viettinmart-eco/san-pham/{$product->slug}"] = "Product Detail: {$product->name}";
}

$post = Post::where('project_id', $project->id)
    ->where('post_type', 'post')
    ->where('status', 'published')
    ->first();
if ($post) {
    $routesToTest["/viettinmart-eco/blog/{$post->slug}"] = "Post Detail: {$post->title}";
} else {
    // try any post
    $anyPost = Post::where('post_type', 'post')->first();
    if ($anyPost) {
        $routesToTest["/viettinmart-eco/blog/{$anyPost->slug}"] = "Post Detail (any): {$anyPost->title}";
    }
}

echo "Testing routes...\n\n";

foreach ($routesToTest as $uri => $label) {
    $req = Request::create($uri, 'GET');
    $req->headers->set('Accept', 'text/html,application/xhtml+xml');

    try {
        $response = $app->handle($req);
        $status = $response->getStatusCode();
        $isRedirect = $status >= 300 && $status < 400;
        $target = $isRedirect ? $response->headers->get('Location') : '';
        echo sprintf("%-45s | %-25s | Status: %d %s\n", $uri, $label, $status, $target ? "-> $target" : '');

        if ($status >= 500) {
            echo '   ERROR: '.substr(strip_tags($response->getContent()), 0, 200)."\n";
        }
    } catch (Throwable $e) {
        echo sprintf("%-45s | %-25s | EXCEPTION: %s in %s:%d\n", $uri, $label, $e->getMessage(), basename($e->getFile()), $e->getLine());
    }
}
