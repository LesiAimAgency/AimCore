<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
$serverProject = clone $project;
$serverProject->id = 11;
$serverProject->tenant_id = 3;

request()->attributes->set('project', $serverProject);
session(['current_project_id' => 11, 'current_tenant_id' => 3]);
app()->instance('current_project_id', 11);
app()->instance('current_tenant_id', 3);

echo "Orders for tenant 3 (project_id 11): " . \App\Models\Order::count() . "\n";
echo "Products for tenant 3 (project_id 11): " . \App\Models\Product::count() . "\n";
echo "Categories for tenant 3 (project_id 11): " . \App\Models\ProductCategory::count() . "\n";
echo "Posts for tenant 3 (project_id 11): " . \App\Models\Post::count() . "\n";
echo "Widgets for tenant 3 (project_id 11): " . \App\Models\Widget::count() . "\n";
echo "Menus for tenant 3 (project_id 11): " . \App\Models\Menu::count() . "\n";
