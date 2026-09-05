<?php

use App\Models\Taxonomy;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$taxes = Taxonomy::where('project_id', 10)->get();
echo "Taxonomies for project 10:\n";
foreach ($taxes as $t) {
    echo "ID: {$t->id} | Name: {$t->name} | Slug: {$t->slug} | Taxonomy: {$t->taxonomy} | Posts count: ".$t->posts()->count()."\n";
}
