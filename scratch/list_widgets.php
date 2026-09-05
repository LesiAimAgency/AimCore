<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

$widgets = DB::table('widgets')->where('project_id', 10)->orderBy('area')->orderBy('sort_order')->get();
echo 'Total widgets for project 10: '.count($widgets).PHP_EOL;
foreach ($widgets as $w) {
    echo "[ID: {$w->id}] [Area: {$w->area}] [Order: {$w->sort_order}] [Active: {$w->is_active}] Type: {$w->type} | Name: {$w->name}".PHP_EOL;
}
