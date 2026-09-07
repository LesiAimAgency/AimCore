<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

$request = \Illuminate\Http\Request::create('https://aimagency.vn/viettinmart-eco/admin/settings/group/appearance', 'GET');
$app->instance('request', $request);

$route = app('router')->getRoutes()->match($request);
$request->setRouteResolver(fn() => $route);

$dispatcher = new \Illuminate\Routing\ControllerDispatcher(app());
$ref = new ReflectionMethod($dispatcher, 'resolveParameters');
$ref->setAccessible(true);
$resolved = $ref->invoke($dispatcher, $route, app(\App\Http\Controllers\Admin\SettingsController::class), 'group');

echo "Resolved parameters:\n";
foreach ($resolved as $k => $v) {
    echo $k . ' => ' . (is_object($v) ? get_class($v) : var_export($v, true)) . "\n";
}
