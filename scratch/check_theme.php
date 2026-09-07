<?php

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$p = Project::where('code', 'viettinmart-eco')->first();
$s = Setting::where('project_id', $p->id)->where('key', 'theme')->first();
echo 'PROJECT ID: '.$p->id.PHP_EOL;
echo 'SETTING THEME: '.($s ? $s->value : 'NULL').PHP_EOL;
echo 'PROJECT THEME: '.($p->theme ?? 'NULL').PHP_EOL;
