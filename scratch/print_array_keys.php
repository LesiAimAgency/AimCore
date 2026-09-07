<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

$pu = \App\Models\ProjectUser::where('tenant_id', 3)->first();
$session = app('session')->driver();
$session->start();
$session->put('project_user_id', $pu->id);

$request = \Illuminate\Http\Request::create('https://aimagency.vn/viettinmart-eco/admin/settings/group/appearance', 'GET');
$app->instance('request', $request);
$request->setLaravelSession($session);

$controller = app(\App\Http\Controllers\Admin\SettingsController::class);
$ref = new \ReflectionMethod($controller, 'group');
$ref->setAccessible(true);
$response = $ref->invoke($controller, $request, 'appearance');

$viewData = $response->getData();
$settingsMap = $viewData['settingsMap'] ?? [];

$arrayKeys = [];
foreach ($settingsMap as $k => $v) {
    if (is_array($v)) {
        $arrayKeys[] = $k;
    }
}
echo "Array keys in settingsMap:\n";
print_r($arrayKeys);
