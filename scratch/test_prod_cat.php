<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = App\Models\Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first();
app()->instance('current_project', $project);

$categories = App\Models\Category::whereNull('parent_id')
    ->where('is_active', true)
    ->with('translations')
    ->orderBy('sort_order')
    ->get();

echo "Total categories queried for sidebar: " . $categories->count() . "\n";
foreach ($categories as $c) {
    echo " - [#" . $c->id . "] " . $c->name . " (slug: " . $c->slug . ") | project_id: " . ($c->project_id ?? 'NULL') . "\n";
}
