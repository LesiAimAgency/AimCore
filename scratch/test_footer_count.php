<?php

use App\Models\Widget;
use Illuminate\Support\Facades\DB;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

$count = Widget::where('project_id', 10)->where('area', 'footer')->count();
echo 'Eloquent count of footer widgets for project 10: '.$count.PHP_EOL;

$dbCount = DB::table('widgets')->where('project_id', 10)->where('area', 'footer')->count();
echo 'DB count of footer widgets for project 10: '.$dbCount.PHP_EOL;
