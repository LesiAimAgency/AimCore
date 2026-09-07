<?php

use App\Models\Menu;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
$serverProject = clone $project;
$serverProject->id = 11;
$serverProject->tenant_id = 3;

request()->attributes->set('project', $serverProject);
session(['current_project_id' => 11, 'current_tenant_id' => 3]);
app()->instance('current_project_id', 11);
app()->instance('current_tenant_id', 3);

echo 'Orders for tenant 3 (project_id 11): '.Order::count()."\n";
echo 'Products for tenant 3 (project_id 11): '.Product::count()."\n";
echo 'Categories for tenant 3 (project_id 11): '.ProductCategory::count()."\n";
echo 'Posts for tenant 3 (project_id 11): '.Post::count()."\n";
echo 'Widgets for tenant 3 (project_id 11): '.Widget::count()."\n";
echo 'Menus for tenant 3 (project_id 11): '.Menu::count()."\n";
