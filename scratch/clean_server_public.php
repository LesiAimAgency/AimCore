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

$res = $method->invoke($c, 'Fileman', 'list_files', [
    'dir' => 'aimagency.vn/public',
]);

$data = $res['data'] ?? [];
$toDelete = [
    'reseed_and_verify.php',
    'execute_seeder_server.php',
    'check_post63.php',
    'check_tax_indexes.php',
    'check_enhanced_indexes.php',
    'check_posts_indexes.php',
    'check_posts_json_server.php',
    'check_posts_server.php',
    'check_cats_server.php',
    'check_enhanced_products.php',
    'check_tables_server.php',
    'check_products_server2.php',
    'check_products_server.php',
    'test_cms_products_query.php',
    'inspect_cms_render.php',
    'inspect_cms_query.php',
    'test_cart.php',
    'test_live.php',
    'test_middleware.php',
    'check_prod_url.php',
    'test_blade.php',
];

foreach ($data as $item) {
    $file = $item['file'] ?? '';
    if (in_array($file, $toDelete, true) || (str_ends_with($file, '.php') && ! in_array($file, ['index.php'], true))) {
        echo 'Deleting: '.$file."\n";
        $method->invoke($c, 'Fileman', 'fileop', [
            'op' => 'unlink',
            'sourcefiles' => 'aimagency.vn/public/'.$file,
        ]);
    }
}
echo "Done checking public directory.\n";
