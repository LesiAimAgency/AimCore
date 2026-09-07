<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$request = Request::create('http://localhost/wkcomputer/admin/settings/appearance', 'GET');
$request->setRouteResolver(function () {
    $route = new Route('GET', '{projectCode}/admin/settings/appearance', []);
    $route->bind(request());
    $route->setParameter('projectCode', 'wkcomputer');

    return $route;
});
$app->instance('request', $request);

use App\Http\Controllers\Admin\SettingsController;
use App\Models\Project;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

$p = Project::where('code', 'wkcomputer')->first();
$c = app(SettingsController::class);
$ref = new ReflectionMethod($c, 'getSettingsMap');
$ref->setAccessible(true);
$settingsMap = $ref->invoke($c, $p, (int) ($p->tenant_id ?? 3), 'appearance');

echo "REAL settingsMap['site_logo'] is: ".var_export($settingsMap['site_logo'], true)."\n";

try {
    $rendered = view('frontend.themes.wkcomputerdemo.admin.settings.appearance', [
        'settingsMap' => $settingsMap,
        'settings' => $settingsMap,
        'activeLanguages' => collect([]),
        'project' => $p,
        'currentProject' => $p,
        'group' => 'appearance',
    ])->render();
    echo 'wkcomputerdemo appearance RENDER SUCCESS! (length: '.strlen($rendered).")\n";
} catch (Throwable $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
    echo 'File: '.$e->getFile().':'.$e->getLine()."\n";
    $prev = $e->getPrevious();
    if ($prev) {
        echo 'Previous: '.$prev->getMessage().' at '.$prev->getFile().':'.$prev->getLine()."\n";
    }
}

$p2 = Project::where('code', 'viettinmart-eco')->first();
if ($p2) {
    $settingsMap2 = $ref->invoke($c, $p2, (int) ($p2->tenant_id ?? 3), 'appearance');
    echo "\nviettinmart-eco settingsMap['site_logo'] is: ".var_export($settingsMap2['site_logo'], true)."\n";
    try {
        $rendered2 = view('frontend.themes.viettinmartdemo.admin.settings.appearance', [
            'settingsMap' => $settingsMap2,
            'settings' => $settingsMap2,
            'activeLanguages' => collect([]),
            'project' => $p2,
            'currentProject' => $p2,
            'group' => 'appearance',
        ])->render();
        echo 'viettinmartdemo appearance RENDER SUCCESS! (length: '.strlen($rendered2).")\n";
    } catch (Throwable $e) {
        echo 'ERROR: '.$e->getMessage()."\n";
        echo 'File: '.$e->getFile().':'.$e->getLine()."\n";
        $prev = $e->getPrevious();
        if ($prev) {
            echo 'Previous: '.$prev->getMessage().' at '.$prev->getFile().':'.$prev->getLine()."\n";
        }
    }
}
