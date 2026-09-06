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

$tables = ['product_categories', 'products_enhanced', 'widgets', 'menus', 'menu_items', 'posts', 'brands', 'coupons'];
$res = [];

foreach ($tables as $t) {
    if (\Illuminate\Support\Facades\Schema::hasTable($t)) {
        $cols = \Illuminate\Support\Facades\Schema::getColumnListing($t);
        $item = [];
        if (in_array('project_id', $cols)) {
            $item['project_id_10'] = \Illuminate\Support\Facades\DB::table($t)->where('project_id', 10)->count();
            $item['project_id_11'] = \Illuminate\Support\Facades\DB::table($t)->where('project_id', 11)->count();
        }
        if (in_array('tenant_id', $cols)) {
            $item['tenant_id_4'] = \Illuminate\Support\Facades\DB::table($t)->where('tenant_id', 4)->count();
        }
        $res[$t] = $item;
    }
}

echo json_encode($res, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_all_p10.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_all_p10.php');
