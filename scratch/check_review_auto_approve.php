<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

session(['current_project_id' => 10]);
session(['current_tenant_id' => 3]);

var_dump(setting('review_auto_approve'));
