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
$found = [];

// Search in all tables with text columns
$tables = ['widgets', 'menus', 'menu_items', 'settings', 'project_settings'];
foreach ($tables as $t) {
    if (\Illuminate\Support\Facades\Schema::hasTable($t)) {
        $cols = \Illuminate\Support\Facades\Schema::getColumnListing($t);
        foreach ($cols as $c) {
            try {
                $rows = \Illuminate\Support\Facades\DB::table($t)->where($c, 'like', "%$slug%")->get();
                if ($rows->isNotEmpty()) {
                    $found[$t . '.' . $c] = $rows;
                }
            } catch (\Throwable $e) {}
        }
    }
}

echo json_encode($found, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'search_db_slug.php',
    'content' => $serverScript,
]);

echo file_get_contents('https://aimagency.vn/search_db_slug.php');
