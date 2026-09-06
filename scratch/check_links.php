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

$widgets = \Illuminate\Support\Facades\DB::table('widgets')
    ->where('data', 'like', "%$slug%")
    ->orWhere('settings', 'like', "%$slug%")
    ->get(['id', 'widget_type', 'title']);

$menus = \Illuminate\Support\Facades\DB::table('menus')->get();
$menuItems = \Illuminate\Support\Facades\DB::table('menu_items')->where('url', 'like', "%$slug%")->orWhere('route', 'like', "%$slug%")->get();

echo json_encode([
    'widgets' => $widgets,
    'menus' => $menus,
    'menu_items' => $menuItems,
], JSON_PRETTY_PRINT);

@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_links.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_links.php');
