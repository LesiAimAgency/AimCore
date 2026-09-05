<?php

use App\Models\User;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

try {
    $admin = User::where('email', 'admin@viettingroup.vn')->first() ?? User::first();
    Auth::login($admin);

    $request = Request::create('/viettinmart-eco/admin/settings/fonts', 'GET');
    $response = $kernel->handle($request);

    echo 'STATUS: '.$response->getStatusCode()."\n";
    if ($response->getStatusCode() >= 400) {
        $content = $response->getContent();
        echo "RESPONSE SUBSTR:\n".substr($content, 0, 1000)."\n";
    }
} catch (Throwable $e) {
    echo 'CAUGHT: '.$e->getMessage()."\n";
    echo 'FILE: '.$e->getFile().':'.$e->getLine()."\n";
    echo $e->getTraceAsString();
}
