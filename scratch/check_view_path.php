<?php

use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$themeViewPath = resource_path('views/frontend/themes/viettinmartdemo');
view()->getFinder()->prependLocation($themeViewPath);

$view = view('admin.layouts.app');
echo 'Resolved view path: '.$view->getPath().PHP_EOL;
