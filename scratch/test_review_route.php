<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$request = Illuminate\Http\Request::create('/viettinmart-eco/review/submit');
$app->instance('request', $request);
session(['current_project' => ['code' => 'viettinmart-eco']]);

echo "route has project.review.submit: " . (Route::has('project.review.submit') ? 'YES' : 'NO') . PHP_EOL;
echo "route URL: " . route('project.review.submit', ['projectCode' => 'viettinmart-eco']) . PHP_EOL;
echo "locale_route('review.submit'): " . locale_route('review.submit') . PHP_EOL;
echo "locale_route('project.review.submit'): " . locale_route('project.review.submit') . PHP_EOL;
