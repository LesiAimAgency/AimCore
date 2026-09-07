<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Http\Controllers\Admin\DashboardController;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ViewErrorBag;

$project = Project::where('code', 'viettinmart-eco')->first();
$user = User::where('role', 'admin')->orWhere('role', 'super_admin')->first();
if (! $user) {
    $user = User::first();
}
Auth::setUser($user);

session(['current_project' => $project, 'current_project_id' => $project->id]);

// Simulate request
$request = Request::create('/viettinmart-eco/admin', 'GET');
$request->attributes->set('project', $project);
$errors = new ViewErrorBag;
view()->share('errors', $errors);

$request->setRouteResolver(function () use ($project) {
    $route = new Route('GET', '{projectCode}/admin', []);
    $route->parameters = ['projectCode' => $project->code];

    return $route;
});

$controller = app(DashboardController::class);

try {
    $response = $controller->projectDashboard($request);
    $content = $response->render();
    echo 'SUCCESS! Rendered dashboard length: '.strlen($content).' bytes.'.PHP_EOL;

    // Check key strings
    $checks = [
        'Tiến độ vận hành đơn hàng',
        'Tổng doanh thu',
        'Đơn thành công',
        'Khách quay lại',
        'Biểu đồ doanh thu 6 tháng',
        'Top 10 Khách Hàng (CRM)',
        'Hiệu quả Đại lý',
        'VietTin Mart',
    ];

    foreach ($checks as $check) {
        if (str_contains($content, $check)) {
            echo "[OK] Found: {$check}".PHP_EOL;
        } else {
            echo "[FAIL] Missing: {$check}".PHP_EOL;
        }
    }
} catch (Throwable $e) {
    echo 'ERROR: '.$e->getMessage().PHP_EOL;
    echo 'File: '.$e->getFile().':'.$e->getLine().PHP_EOL;
    echo $e->getTraceAsString().PHP_EOL;
}
