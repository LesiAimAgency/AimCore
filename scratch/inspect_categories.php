<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$cats = \Illuminate\Support\Facades\DB::table('product_categories')->where('slug', 'san-pham-tuoi-cap-dong-chua-so-che')->orWhere('name', 'like', '%tươi cấp đông%')->get();
echo "Found matching categories: " . $cats->count() . "\n";
foreach ($cats as $c) {
    echo "ID: {$c->id} | Name: {$c->name} | Slug: {$c->slug} | Tenant: " . ($c->tenant_id ?? 'NULL') . " | Project: " . ($c->project_id ?? 'NULL') . " | Parent: " . ($c->parent_id ?? 'NULL') . " | Active: " . ($c->is_active ?? 'NULL') . " | Deleted: " . ($c->deleted_at ?? 'NULL') . "\n";
}

