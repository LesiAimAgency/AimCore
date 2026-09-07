<?php

use App\Models\FormSubmission;
use App\Models\Menu;
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
$pId = $project ? $project->id : 10;

echo "Current Viettinmart Project ID: {$pId}\n";
echo 'Widgets: '.Widget::withoutGlobalScopes()->where('project_id', $pId)->count()."\n";
echo 'Products: '.Product::withoutGlobalScopes()->where('project_id', $pId)->count()."\n";
echo 'Categories: '.ProductCategory::withoutGlobalScopes()->where('project_id', $pId)->count()."\n";
echo 'Posts: '.Post::withoutGlobalScopes()->where('project_id', $pId)->count()."\n";
echo 'Settings: '.DB::table('settings')->where('project_id', $pId)->count()."\n";
echo 'Menus: '.Menu::withoutGlobalScopes()->where('project_id', $pId)->count()."\n";
echo 'Forms: '.FormSubmission::withoutGlobalScopes()->where('project_id', $pId)->count()."\n";
