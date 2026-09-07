<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
$user = \App\Models\User::where('username', 'viettinmart-eco')->orWhere('email', 'admin@viettinmart.vn')->first() ?? \App\Models\User::first();

echo "Project Code: " . $project->code . "\n";
echo "Project Features Theme: " . ($project->features['theme'] ?? 'none') . "\n";
echo "Project Settings 'theme': " . \App\Models\ProjectSetting::where('project_id', $project->id)->where('key', 'theme')->value('value') . "\n";
echo "Global setting('theme'): " . setting('theme', 'none') . "\n";

$urls = [
    '/viettinmart-eco/admin',
    '/viettinmart-eco/admin/products',
    '/viettinmart-eco/admin/products/create',
    '/viettinmart-eco/admin/orders',
    '/viettinmart-eco/admin/categories',
    '/viettinmart-eco/admin/attributes',
    '/viettinmart-eco/admin/reviews',
    '/viettinmart-eco/admin/posts',
    '/viettinmart-eco/admin/pages',
    '/viettinmart-eco/admin/form-submissions',
    '/viettinmart-eco/admin/widget-templates',
    '/viettinmart-eco/admin/theme-options',
    '/viettinmart-eco/admin/menus',
    '/viettinmart-eco/admin/widgets',
    '/viettinmart-eco/admin/media/list',
    '/viettinmart-eco/admin/settings',
    '/viettinmart-eco/admin/settings/languages',
    '/viettinmart-eco/admin/settings/seo',
    '/viettinmart-eco/admin/settings/logs',
    '/viettinmart-eco/admin/users',
];

$session = $app->make('session')->driver();
$session->start();
$session->put('current_project', $project);
$session->put('current_project_id', $project->id);
$session->put('current_tenant_id', $project->tenant_id);
$session->put('project_user_id', $user->id);
$session->put('project_user_username', $user->username ?? $user->email);

foreach ($urls as $url) {
    $request = Illuminate\Http\Request::create($url, 'GET', [], [], [], ['REMOTE_ADDR' => '127.0.0.1']);
    $request->headers->set('Accept', 'text/html');
    $request->setLaravelSession($session);
    \Illuminate\Support\Facades\Auth::setUser($user);

    $httpKernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    $response = $httpKernel->handle($request);
    $content = $response->getContent();

    preg_match_all('/id=["\']sidebar["\']/i', $content, $matches);
    $isViettinSidebar = str_contains($content, 'VietTin Mart');
    $isOldVgtSidebar = str_contains($content, 'bg-[#001B4E]');
    $isVgtLogo = str_contains($content, 'Logo.png') || str_contains($content, 'alt="VGT"');

    echo "URL: {$url} => Status: " . $response->getStatusCode() 
         . ($response->isRedirect() ? " -> " . $response->headers->get('Location') : "")
         . " | Sidebars: " . count($matches[0]) 
         . " | VietTinMart SB: " . ($isViettinSidebar ? 'YES' : 'NO')
         . " | Old VGT SB: " . ($isOldVgtSidebar ? 'YES' : 'NO')
         . " | VGT Logo: " . ($isVgtLogo ? 'YES' : 'NO')
         . "\n";
}
