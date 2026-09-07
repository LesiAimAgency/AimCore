<?php

use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$users = User::withoutGlobalScopes()->get(['id', 'username', 'email', 'role', 'level', 'tenant_id', 'project_ids']);
foreach ($users as $u) {
    echo "ID: {$u->id}, User: {$u->username}, Role: {$u->role}, Tenant: {$u->tenant_id}, ProjectIds: ".json_encode($u->project_ids)."\n";
}

$projects = Project::all(['id', 'code', 'name', 'tenant_id']);
echo "\n--- PROJECTS ---\n";
foreach ($projects as $p) {
    echo "Project ID: {$p->id}, Code: {$p->code}, Name: {$p->name}, Tenant ID: {$p->tenant_id}\n";
}

$tenants = Tenant::all();
echo "\n--- TENANTS ---\n";
foreach ($tenants as $t) {
    echo "Tenant ID: {$t->id}, Code: {$t->code}, Name: {$t->name}\n";
}
