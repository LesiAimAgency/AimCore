<?php

use App\Http\Middleware\ProjectSubdomainMiddleware;
use App\Http\Middleware\SetProjectDatabase;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "=== SIMULATION 2: PROJECT ID IS 11 ON SERVER ===\n";

// Temporarily change project 10 to project 11 in DB
DB::table('projects')->where('id', 10)->update(['id' => 11, 'tenant_id' => null]);

try {
    $request = Request::create('https://aimagency.vn/viettinmart-eco/admin/orders?filter=unassigned', 'GET');
    $request->setRouteResolver(function () use ($request) {
        $route = new \Illuminate\Routing\Route('GET', '{projectCode}/admin/orders', []);
        $route->bind($request);
        $route->setParameter('projectCode', 'viettinmart-eco');
        return $route;
    });

    $subdomainMiddleware = new ProjectSubdomainMiddleware();
    $subdomainMiddleware->handle($request, function ($req) {
        echo "After ProjectSubdomainMiddleware:\n";
        echo "  session('current_project_id'): " . session('current_project_id') . "\n";
        echo "  session('current_tenant_id'): " . session('current_tenant_id') . "\n";

        $setDbMiddleware = new SetProjectDatabase();
        $setDbMiddleware->handle($req, function ($req2) {
            echo "Inside SetProjectDatabase:\n";
            echo "  session('current_project_id'): " . session('current_project_id') . "\n";
            echo "  session('current_tenant_id'): " . session('current_tenant_id') . "\n";

            try {
                $orders = Order::with(['items'])->latest()->paginate(20);
                echo "  -> Orders found: " . $orders->total() . "\n";
                if ($orders->total() > 0) {
                    echo "  -> First order items: " . $orders->first()->items->count() . "\n";
                }
            } catch (\Throwable $e) {
                echo "  -> Orders query EXCEPTION: " . $e->getMessage() . "\n";
            }

            try {
                $products = Product::latest()->paginate(20);
                echo "  -> Products found: " . $products->total() . "\n";
            } catch (\Throwable $e) {
                echo "  -> Products query EXCEPTION: " . $e->getMessage() . "\n";
            }

            try {
                $widgets = Widget::count();
                echo "  -> Widgets found: " . $widgets . "\n";
            } catch (\Throwable $e) {
                echo "  -> Widgets query EXCEPTION: " . $e->getMessage() . "\n";
            }

            return response('ok');
        });

        return response('ok');
    });
} finally {
    // Revert project ID back to 10
    DB::table('projects')->where('id', 11)->update(['id' => 10, 'tenant_id' => 3]);
}
