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
$res = [];

$tables = ['categories', 'product_categories', 'products', 'products_enhanced', 'pages', 'posts'];
foreach ($tables as $table) {
    try {
        if (\Illuminate\Support\Facades\Schema::hasTable($table)) {
            $cols = \Illuminate\Support\Facades\Schema::getColumnListing($table);
            if (in_array('slug', $cols)) {
                $matches = \Illuminate\Support\Facades\DB::table($table)->where('slug', $slug)->get();
                $res[$table] = $matches;
                if ($matches->isEmpty()) {
                    $res[$table . '_like'] = \Illuminate\Support\Facades\DB::table($table)->where('slug', 'like', '%so-che%')->get();
                }
            }
        }
    } catch (\Throwable $e) {
        $res[$table] = 'Error: ' . $e->getMessage();
    }
}

echo json_encode($res, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'check_slug2.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/check_slug2.php');
