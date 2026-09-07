<?php

use App\Models\FormSubmission;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
$pId = $project ? $project->id : 10;

echo "Current Viettinmart Project ID: {$pId}\n";
echo "Widgets: " . Widget::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Products: " . Product::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Categories: " . ProductCategory::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Posts: " . Post::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Orders: " . Order::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "OrderItems: " . OrderItem::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Settings: " . DB::table('settings')->where('project_id', $pId)->count() . "\n";
echo "Menus: " . Menu::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";

echo "\n--- BY TENANT_ID = 3 ---\n";
echo "Widgets: " . Widget::withoutGlobalScopes()->where('tenant_id', 3)->count() . "\n";
echo "Products: " . Product::withoutGlobalScopes()->where('tenant_id', 3)->count() . "\n";
echo "Categories: " . ProductCategory::withoutGlobalScopes()->where('tenant_id', 3)->count() . "\n";
echo "Posts: " . Post::withoutGlobalScopes()->where('tenant_id', 3)->count() . "\n";
echo "Orders: " . Order::withoutGlobalScopes()->where('tenant_id', 3)->count() . "\n";
echo "OrderItems: " . (Schema::hasColumn('order_items', 'tenant_id') ? OrderItem::withoutGlobalScopes()->where('tenant_id', 3)->count() : 'No tenant_id col') . "\n";
echo "Settings: " . (Schema::hasColumn('settings', 'tenant_id') ? DB::table('settings')->where('tenant_id', 3)->count() : 'No tenant_id col') . "\n";
echo "Menus: " . (Schema::hasColumn('menus', 'tenant_id') ? Menu::withoutGlobalScopes()->where('tenant_id', 3)->count() : 'No tenant_id col') . "\n";

echo "\n--- CHECK COLUMNS IN ALL RELEVANT TABLES ---\n";
$tables = ['orders', 'order_items', 'products_enhanced', 'posts', 'widgets', 'product_categories', 'settings', 'menus', 'projects', 'tenants', 'shipping_zones', 'shipping_methods', 'shipping_rates', 'coupons', 'reviews'];
foreach ($tables as $t) {
    if (Schema::hasTable($t)) {
        $cols = Schema::getColumnListing($t);
        $hasTenant = in_array('tenant_id', $cols) ? 'YES' : 'NO';
        $hasProject = in_array('project_id', $cols) ? 'YES' : 'NO';
        echo "Table {$t}: has tenant_id: {$hasTenant}, has project_id: {$hasProject}\n";
    } else {
        echo "Table {$t}: NOT FOUND\n";
    }
}
