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

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$out = [
    'locale' => app()->getLocale(),
    'fallback' => config('app.fallback_locale'),
    'lang_path' => app()->langPath(),
    'lang_path_exists' => is_dir(app()->langPath()),
    'lang_files_in_path' => is_dir(app()->langPath()) ? scandir(app()->langPath()) : null,
    'test_sidebar' => __('sidebar_offers_title'),
    'test_bank' => __('offer_bank_transfer'),
    'test_sku' => __('product_sku'),
    'test_discount' => __('product_discount'),
    'test_out_of_stock' => __('product_out_of_stock'),
];

app()->setLocale('vi');
$out['after_set_vi'] = [
    'test_sidebar' => __('sidebar_offers_title'),
    'test_bank' => __('offer_bank_transfer'),
    'test_sku' => __('product_sku'),
];

echo json_encode($out, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'debug_trans_server.php',
    'content' => $serverScript,
]);

echo "debug_trans_server.php uploaded.\n";
