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
    '/viettinmart-eco/admin/orders',
    '/viettinmart-eco/admin/categories',
    '/viettinmart-eco/admin/settings',
    '/viettinmart-eco/admin/posts',
    '/viettinmart-eco/admin/widgets',
];

foreach ($urls as $url) {
    $request = Illuminate\Http\Request::create($url, 'GET');
    $request->headers->set('Accept', 'text/html');
    $request->setLaravelSession($session);
    \Illuminate\Support\Facades\Auth::setUser($user);

    $httpKernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    $response = $httpKernel->handle($request);
    $content = $response->getContent();

    preg_match_all('/id=["\']sidebar["\']/i', $content, $matches);
    $isViettinSidebar = str_contains($content, 'VietTin Mart');
    $isCmsSidebar = str_contains($content, 'sidebar-text');
    $isVgtLogo = str_contains($content, 'Logo.png') || str_contains($content, 'logo.png');

    echo "URL: {$url} => Status: " . $response->getStatusCode() 
         . " | Sidebars: " . count($matches[0]) 
         . " | VietTinMart SB: " . ($isViettinSidebar ? 'YES' : 'NO')
         . " | VGT/CMS SB: " . ($isCmsSidebar ? 'YES' : 'NO')
         . " | Logo.png: " . ($isVgtLogo ? 'YES' : 'NO')
         . "\n";
}
