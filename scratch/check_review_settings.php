<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

session(['current_project_id' => 10]);
session(['current_tenant_id' => 3]);

var_dump(setting('review_enabled', 'default_true'));
var_dump(setting('review_product_enabled', 'default_true'));
var_dump(setting('reviews'));
