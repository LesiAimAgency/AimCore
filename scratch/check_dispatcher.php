<?php

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Routing\ControllerDispatcher;

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$request = Request::create('https://aimagency.vn/viettinmart-eco/admin/settings/group/appearance', 'GET');
$app->instance('request', $request);

$route = app('router')->getRoutes()->match($request);
$request->setRouteResolver(fn () => $route);

$dispatcher = new ControllerDispatcher(app());
$ref = new ReflectionMethod($dispatcher, 'resolveParameters');
$ref->setAccessible(true);
$resolved = $ref->invoke($dispatcher, $route, app(SettingsController::class), 'group');

echo "Resolved parameters:\n";
foreach ($resolved as $k => $v) {
    echo $k.' => '.(is_object($v) ? get_class($v) : var_export($v, true))."\n";
}
