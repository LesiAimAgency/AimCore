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

$filesToDelete = [
    'debug_order_query.php',
    'debug_success_content.php',
    'check_yfeys.php',
    'debug_trace_order.php',
    'check_tenant_details.php',
    'fix_order_tenants.php',
    'check_slug.php',
    'check_slug2.php',
    'check_links.php',
    'search_db_slug.php',
    'check_cat_products.php',
    'debug_category_dispatch.php',
    'debug_category_queries.php',
    'check_matched_route.php',
    'debug_shop_index.php',
    'debug_shop_index2.php',
    'check_cat_project_ids.php',
    'fix_cat_p11.php',
    'clear_view_cache.php',
];

foreach ($filesToDelete as $file) {
    try {
        $method->invoke($c, 'Fileman', 'fileop', [
            'op' => 'unlink',
            'sourcefiles' => 'aimagency.vn/public/' . $file,
        ]);
    } catch (\Throwable $e) {}
}

echo "SERVER SCRATCH FILES CLEANED UP!\n";
