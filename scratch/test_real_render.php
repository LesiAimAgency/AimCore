<?php

use App\Models\ProjectUser;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$pu = ProjectUser::where('tenant_id', 3)->first()
    ?? ProjectUser::where('role', 'superadmin')->first();

$session = app('session')->driver();
$session->start();
$session->put('project_user_id', $pu->id);

$request = Request::create('https://aimagency.vn/viettinmart-eco/admin/settings/group/appearance', 'GET');
$app->instance('request', $request);
$request->setLaravelSession($session);

$response = $kernel->handle($request);
echo 'Status: '.$response->getStatusCode()."\n";
echo 'Length: '.strlen($response->getContent())."\n";
if ($response->getStatusCode() !== 200 || str_contains($response->getContent(), 'TypeError') || str_contains($response->getContent(), 'htmlspecialchars')) {
    echo "Content snippet:\n".substr($response->getContent(), 0, 1500)."\n";
}
