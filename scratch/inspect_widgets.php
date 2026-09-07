<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
$user = \App\Models\User::where('username', 'viettinmart-eco')->first() ?? \App\Models\User::first();

$session = $app->make('session')->driver();
$session->start();
$session->put('current_project', $project);
$session->put('current_project_id', $project->id);
$session->put('current_tenant_id', $project->tenant_id);
$session->put('project_user_id', $user->id);
$session->put('project_user_username', $user->username ?? $user->email);

$request = Illuminate\Http\Request::create('/viettinmart-eco/admin/widgets', 'GET', [], [], [], ['REMOTE_ADDR' => '127.0.0.1']);
$request->headers->set('Accept', 'text/html');
$request->setLaravelSession($session);
\Illuminate\Support\Facades\Auth::setUser($user);

$httpKernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$response = $httpKernel->handle($request);
$content = $response->getContent();

// Count widgets rendered in the areas
preg_match('/Đang active\s*<\/span>\s*<span[^>]*>\s*(\d+)/i', $content, $m1) || preg_match('/Đang active[^0-9]*(\d+)/i', $content, $m1);
echo "Active widgets in HTML: " . ($m1[1] ?? 'not found') . PHP_EOL;

// Check if widget cards are in homepage-main
preg_match_all('/widget-row/i', $content, $mW);
echo "Widget elements in DOM: " . count($mW[0]) . PHP_EOL;

// Check DB direct count
echo "Direct DB count for project {$project->id}: " . \App\Models\Widget::where('project_id', $project->id)->count() . PHP_EOL;
echo "Without scope count for project {$project->id}: " . \App\Models\Widget::withoutGlobalScopes()->where('project_id', $project->id)->count() . PHP_EOL;
