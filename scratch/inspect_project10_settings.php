<?php

use App\Models\ProjectSetting;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$ps = ProjectSetting::where('project_id', 10)->get();
echo 'PROJECT SETTINGS COUNT: '.$ps->count()."\n";
foreach ($ps as $p) {
    echo $p->key.' = '.$p->value."\n";
}
