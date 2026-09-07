<?php

use App\Models\ProjectUser;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$projectUsers = ProjectUser::all();

foreach ($projectUsers as $pu) {
    $session = app('session')->driver();
    $session->start();
    $session->put('project_user_id', $pu->id);
    $session->put('project_user_username', $pu->username);
    $session->put('current_project', 'viettinmart-eco');

    $request = Request::create('https://aimagency.vn/viettinmart-eco/admin/settings/group/appearance', 'GET');
    $app->instance('request', $request);
    $request->setLaravelSession($session);

    try {
        $response = $kernel->handle($request);
        $status = $response->getStatusCode();
        if ($status !== 200 && $status !== 302 && $status !== 403) {
            echo "User id={$pu->id} ({$pu->username}): Status={$status}\n";
            if (isset($response->exception) && $response->exception) {
                echo 'Exception: '.$response->exception->getMessage()."\n";
                echo 'At: '.$response->exception->getFile().':'.$response->exception->getLine()."\n";
            }
        }
    } catch (Throwable $e) {
        echo "User id={$pu->id} ({$pu->username}): EXCEPTION: ".$e->getMessage()."\n";
        echo 'At: '.$e->getFile().':'.$e->getLine()."\n";
    }
}
echo "Done checking all project users.\n";
