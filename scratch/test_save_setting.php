<?php

use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ThemeOptionController;
use App\Models\Project;
use App\Services\SettingsService;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
request()->attributes->set('project', $project);
session(['current_project' => 'viettinmart-eco']);

$controller = new SettingsController;
$req = Request::create('/viettinmart-eco/admin/settings/contact', 'POST', [
    'contact_phone' => '(+84) 906 910 022',
    'contact_email' => 'cskh@viettinmart.vn',
    'test_key_123' => 'test_value_456',
]);
$req->attributes->set('project', $project);

try {
    $res = $controller->save($req);
    echo 'Save response alert: '.json_encode(session('alert')).PHP_EOL;

    SettingsService::getInstance()->clearCache();
    echo 'Read back test_key_123: '.setting('test_key_123').PHP_EOL;
    echo 'Read back contact_phone: '.setting('contact_phone').PHP_EOL;

    $themeController = new ThemeOptionController;
    $themeReq = Request::create('/viettinmart-eco/admin/theme-options?tab=layout', 'POST', [
        'tab' => 'layout',
        'page_layout' => 'full-width',
        'post_layout' => 'sidebar-right',
        'post_category_layout' => 'sidebar-right',
        'product_layout' => 'full-width',
        'product_category_layout' => 'sidebar-left',
    ]);
    $themeReq->attributes->set('project', $project);
    $themeRes = $themeController->update($themeReq);
    echo 'Theme update status: '.$themeRes->getStatusCode().PHP_EOL;

    echo 'Read theme layout product_category: '.get_theme_layout('product_category').PHP_EOL;
    echo 'Read theme layout post_category: '.get_theme_layout('post_category').PHP_EOL;
} catch (Throwable $e) {
    echo 'Error: '.$e->getMessage()."\n".$e->getTraceAsString().PHP_EOL;
}
