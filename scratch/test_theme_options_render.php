<?php

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$request = Request::create('/viettinmart-eco/admin/theme-options', 'GET');
$user = User::first();
auth('project')->login($user);
session(['project_user_id' => $user->id, 'current_project' => 'viettinmart-eco']);

$response = $app->handle($request);
echo 'THEME OPTIONS STATUS: '.$response->getStatusCode()."\n";
echo 'LOCATION: '.$response->headers->get('Location')."\n";
$content = $response->getContent();
echo 'HAS Layout Trang Chi Tiết: '.(str_contains($content, 'Layout Trang Chi Tiết') ? 'YES' : 'NO')."\n";
echo 'HAS Layout Danh Mục Bài Viết: '.(str_contains($content, 'Layout Danh Mục Bài Viết') ? 'YES' : 'NO')."\n";
echo 'HAS Cấu Hình Banner: '.(str_contains($content, 'Cấu Hình Banner') ? 'YES' : 'NO')."\n";
