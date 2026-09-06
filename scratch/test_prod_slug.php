<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = App\Models\Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first();
echo "Project ID: " . $project->id . ", Code: " . $project->code . "\n";

$p1 = App\Models\Product::withoutGlobalScopes()
    ->where('slug', 'like', '%tom-the%')
    ->get(['id', 'project_id', 'name', 'slug', 'status']);

echo "Products matching 'tom-the': " . $p1->count() . "\n";
foreach ($p1 as $p) {
    echo " - ID: {$p->id} | Project: {$p->project_id} | Status: {$p->status} | Name: {$p->name} | Slug: {$p->slug}\n";
}

$allProducts = App\Models\Product::withoutGlobalScopes()->where('project_id', $project->id)->limit(10)->get(['id', 'name', 'slug', 'status']);
echo "\nFirst 10 products of project 10:\n";
foreach ($allProducts as $p) {
    echo " - ID: {$p->id} | Status: {$p->status} | Name: {$p->name} | Slug: {$p->slug}\n";
}
