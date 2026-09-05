<?php

use App\Models\Widget;
use Database\Seeders\ViettinmartFooterWidgetSeeder;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

$deleted = Widget::where('project_id', 10)->where('area', 'footer')->delete();
echo 'Deleted count: '.$deleted.PHP_EOL;
(new ViettinmartFooterWidgetSeeder)->run(10, 3);
echo 'New count: '.Widget::where('project_id', 10)->where('area', 'footer')->count().PHP_EOL;
