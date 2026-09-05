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

$req = Request::create('/viettinmart-eco/admin/settings/fonts', 'GET');
$res = $app->handle($req);

if (isset($res->exception)) {
    echo 'EXCEPTION: '.$res->exception->getMessage()."\n";
    echo 'FILE: '.$res->exception->getFile().':'.$res->exception->getLine()."\n";
} else {
    echo 'Status: '.$res->getStatusCode()."\n";
}
