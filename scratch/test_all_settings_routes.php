<?php

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$user = User::first();
auth('project')->login($user);
session(['project_user_id' => $user->id, 'current_project' => 'viettinmart-eco']);

$routes = [
    'contact' => '/viettinmart-eco/admin/settings/contact',
    'social' => '/viettinmart-eco/admin/settings/social',
    'seo' => '/viettinmart-eco/admin/settings/seo',
    'languages' => '/viettinmart-eco/admin/settings/languages',
    'fonts' => '/viettinmart-eco/admin/settings/fonts',
    'watermark' => '/viettinmart-eco/admin/settings/watermark',
    'toc' => '/viettinmart-eco/admin/settings/toc',
    'payment' => '/viettinmart-eco/admin/settings/payment',
    'shipping' => '/viettinmart-eco/admin/shipping',
    'reviews' => '/viettinmart-eco/admin/settings/reviews',
    'orders' => '/viettinmart-eco/admin/orders',
    'notifications' => '/viettinmart-eco/admin/settings/notifications',
    'popups' => '/viettinmart-eco/admin/settings/popups',
    'fake-notifications' => '/viettinmart-eco/admin/settings/fake-notifications',
    'forms' => '/viettinmart-eco/admin/settings/forms',
    'contact-buttons' => '/viettinmart-eco/admin/settings/contact-buttons',
    'permissions' => '/viettinmart-eco/admin/settings/permissions',
    'logs' => '/viettinmart-eco/admin/settings/logs',
    'analytics' => '/viettinmart-eco/admin/settings/analytics',
    'redirects' => '/viettinmart-eco/admin/settings/redirects',
    'ai' => '/viettinmart-eco/admin/settings/ai',
    'theme-options-layout' => '/viettinmart-eco/admin/theme-options?tab=layout',
    'theme-options-post-cat' => '/viettinmart-eco/admin/theme-options?tab=post-category',
    'theme-options-banner' => '/viettinmart-eco/admin/theme-options?tab=banner',
    'frontend-home' => '/viettinmart-eco',
    'frontend-blog' => '/viettinmart-eco/blog',
    'frontend-shop' => '/viettinmart-eco/cua-hang',
];

echo "TESTING ALL SETTINGS, THEME OPTIONS & FRONTEND ROUTES:\n";
$allPassed = true;
foreach ($routes as $name => $uri) {
    try {
        $subApp = require 'bootstrap/app.php';
        $subKernel = $subApp->make(Kernel::class);
        $subKernel->bootstrap();
        auth('project')->login($user);
        session(['project_user_id' => $user->id, 'current_project' => 'viettinmart-eco']);

        $req = Request::create($uri, 'GET');
        $res = $subApp->handle($req);
        $status = $res->getStatusCode();
        $content = $res->getContent();

        $extra = '';
        if (str_starts_with($name, 'frontend-')) {
            $hasButtons = str_contains($content, 'vtm-floating-contact-buttons') ? 'YES' : 'NO';
            $extra = " [Buttons: {$hasButtons}]";
        }

        echo sprintf("%-25s: HTTP %d%s\n", $name, $status, $extra);
        if ($status !== 200) {
            $allPassed = false;
        }
    } catch (Throwable $e) {
        $allPassed = false;
        echo sprintf("%-25s: ERROR - %s\n", $name, $e->getMessage());
    }
}

if ($allPassed) {
    echo "\n>>> ALL 27 ROUTES TESTED PASSED WITH HTTP 200 OK! <<<\n";
} else {
    echo "\n>>> SOME ROUTES FAILED <<<\n";
}
