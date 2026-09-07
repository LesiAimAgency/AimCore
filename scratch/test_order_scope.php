<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
// Simulate project on server where project_id = 11, tenant_id = 3
$serverProject = clone $project;
$serverProject->id = 11;
$serverProject->tenant_id = 3;

request()->attributes->set('project', $serverProject);
session(['current_project_id' => 11, 'current_tenant_id' => 3]);
app()->instance('current_project_id', 11);
app()->instance('current_tenant_id', 3);

echo "Order withoutGlobalScopes: " . \App\Models\Order::withoutGlobalScopes()->where('tenant_id', 3)->count() . "\n";
echo "Order with scopes when project_id = 11: " . \App\Models\Order::count() . "\n";
echo "Order SQL: " . \App\Models\Order::toSql() . "\n";
print_r(\App\Models\Order::getBindings());
