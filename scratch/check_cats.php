<?php

use App\Models\ProductCategory;
use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();

echo "ProductCategory columns:\n";
print_r(Schema::getColumnListing('product_categories'));

$cats = ProductCategory::withoutGlobalScopes()->get(['id', 'name', 'slug', 'project_id', 'tenant_id']);
foreach ($cats as $c) {
    echo "ID {$c->id} | {$c->name} | slug: {$c->slug} | project_id: ".($c->project_id ?? 'null').' | tenant_id: '.($c->tenant_id ?? 'null')."\n";
}
