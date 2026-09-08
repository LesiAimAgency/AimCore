<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$req = Request::create('http://localhost/viettinmart-eco/admin/settings/group/appearance', 'GET');
$req->setRouteResolver(function () {
    $route = new Route('GET', '{projectCode}/admin/settings/group/{group}', []);
    $route->bind(request());
    $route->setParameter('projectCode', 'viettinmart-eco');

    return $route;
});
$app->instance('request', $req);

echo "Testing locale_route for media:\n";
echo 'admin.media.store: '.locale_route('admin.media.store')."\n";
echo 'admin.media.list: '.locale_route('admin.media.list')."\n";
echo 'admin.media.create-folder: '.locale_route('admin.media.create-folder')."\n";
echo 'admin.media.delete-folder: '.locale_route('admin.media.delete-folder')."\n";
echo 'admin.media.move: '.locale_route('admin.media.move')."\n";
