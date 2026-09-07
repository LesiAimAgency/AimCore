<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
$pId = $project ? $project->id : 10;

echo "Current Viettinmart Project ID: {$pId}\n";
echo "Widgets: " . \App\Models\Widget::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Products: " . \App\Models\Product::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Categories: " . \App\Models\ProductCategory::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Posts: " . \App\Models\Post::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Settings: " . \DB::table('settings')->where('project_id', $pId)->count() . "\n";
echo "Menus: " . \App\Models\Menu::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
echo "Forms: " . \App\Models\FormSubmission::withoutGlobalScopes()->where('project_id', $pId)->count() . "\n";
