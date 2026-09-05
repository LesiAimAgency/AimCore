<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$request = Request::create('/viettinmart-eco/sitemap', 'GET');
$response = $app->handle($request);

echo 'project.shop.category: '.locale_route('shop.category', 'hai-san')."\n";
echo 'pages.show: '.locale_route('pages.show', ['slug' => 'gioi-thieu'])."\n";
echo 'blog.show: '.locale_route('blog.show', ['slug' => 'tieu-chuan'])."\n";
echo 'shop.show: '.locale_route('shop.show', ['slug' => 'ca-hoi'])."\n";
echo 'home: '.locale_route('home')."\n";
