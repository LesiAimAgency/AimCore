<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

$pu = \App\Models\ProjectUser::where('tenant_id', 3)->first()
    ?? \App\Models\ProjectUser::where('role', 'superadmin')->first();

$session = app('session')->driver();
$session->start();
$session->put('project_user_id', $pu->id);

$request = \Illuminate\Http\Request::create('https://aimagency.vn/viettinmart-eco/admin/settings/group/appearance', 'GET');
$app->instance('request', $request);
$request->setLaravelSession($session);

$response = $kernel->handle($request);
echo "Status: " . $response->getStatusCode() . "\n";
echo "Length: " . strlen($response->getContent()) . "\n";
if ($response->getStatusCode() !== 200 || str_contains($response->getContent(), 'TypeError') || str_contains($response->getContent(), 'htmlspecialchars')) {
    echo "Content snippet:\n" . substr($response->getContent(), 0, 1500) . "\n";
}
