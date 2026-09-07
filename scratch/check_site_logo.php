<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Http\Controllers\Admin\SettingsController;
use App\Models\Project;
use Illuminate\Contracts\Http\Kernel;

$controller = app(SettingsController::class);
$ref = new ReflectionMethod($controller, 'getSettingsMap');
$ref->setAccessible(true);

$p = Project::where('code', 'wkcomputer')->first();
echo "wkcomputer id: {$p->id}, tenant_id: {$p->tenant_id}\n";
$map = $ref->invoke($controller, $p, (int) ($p->tenant_id ?? 3), 'appearance');
echo 'site_logo type: '.gettype($map['site_logo'])."\n";
echo "site_logo var_dump:\n";
var_dump($map['site_logo']);

echo "\n=== Testing getSettingsMap for each project ===\n";
foreach (Project::all() as $p) {
    $map = $ref->invoke($controller, $p, (int) ($p->tenant_id ?? 3), 'appearance');
    $val = $map['site_logo'] ?? null;
    echo "Project: {$p->code} (id: {$p->id}, tenant: {$p->tenant_id}) => type: ".gettype($val).' | '.var_export($val, true)."\n";
}

echo "\n=== Testing getSettingsMap with project = null, tenant = 3 ===\n";
$map = $ref->invoke($controller, null, 3, 'appearance');
$val = $map['site_logo'] ?? null;
echo 'Null project => type: '.gettype($val).' | '.var_export($val, true)."\n";

echo "\n=== Checking all keys in getSettingsMap that return array ===\n";
foreach (Project::all() as $p) {
    $map = $ref->invoke($controller, $p, (int) ($p->tenant_id ?? 3), 'appearance');
    foreach ($map as $k => $v) {
        if (is_array($v)) {
            echo "Project {$p->code} has ARRAY key: '$k' => ".json_encode($v)."\n";
        }
    }
}
