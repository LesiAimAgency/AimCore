<?php

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$request = Request::create('/viettinmart-eco/admin/settings', 'GET');
$user = User::first();
auth('project')->login($user);
session(['project_user_id' => $user->id, 'current_project' => 'viettinmart-eco']);

$response = $app->handle($request);
echo 'STATUS: '.$response->getStatusCode()."\n";
echo 'LOCATION: '.$response->headers->get('Location')."\n";
if ($response->getStatusCode() == 200) {
    $content = $response->getContent();
    $patterns = [
        'Thông tin liên hệ', 'Thông báo Email', 'Fonts chữ', 'Nhật ký hoạt động',
        'Thống kê truy cập', 'Watermark', 'Mục lục tự động', 'Mạng xã hội',
        'Phương thức thanh toán', 'Vận chuyển', 'AI Content', 'Đánh giá sao',
        'Đa ngôn ngữ', 'Form đăng ký', 'Button liên hệ', '404 Redirect',
        'SEO', 'Popup Quảng cáo', 'Phân quyền', 'Thông báo ảo', 'Quản lý đơn hàng',
    ];
    foreach ($patterns as $p) {
        echo sprintf("%-25s: %s\n", $p, str_contains($content, $p) ? 'YES' : 'NO');
    }
}
