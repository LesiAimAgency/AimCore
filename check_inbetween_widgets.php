<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$projects = App\Models\Project::all();
foreach ($projects as $p) {
    echo "Project ID: {$p->id} | Name: {$p->name} | Code: {$p->code} | Tenant: {$p->tenant_id}\n";
}

