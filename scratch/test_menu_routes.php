<?php

use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$menu = config('system_menu');
foreach ($menu as $m) {
    $r1 = str_replace('cms.', 'project.admin.', $m['route']);
    $has1 = Route::has($r1) ? 'YES' : 'NO';
    echo sprintf("%-30s -> %-35s [%s]\n", $m['permission'], $r1, $has1);
}
