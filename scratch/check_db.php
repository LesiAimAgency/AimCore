<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$projects = \App\Models\Project::all();
foreach ($projects as $p) {
    echo "ID: {$p->id} | Code: {$p->code} | TenantID: {$p->tenant_id} | Features: " . json_encode($p->features) . PHP_EOL;
}

echo "\n--- WIDGETS COUNT PER PROJECT & TENANT ---\n";
$widgets = \App\Models\Widget::withoutGlobalScopes()->get();
echo "Total widgets in DB: " . $widgets->count() . PHP_EOL;
$byProject = $widgets->groupBy('project_id');
foreach ($byProject as $projId => $group) {
    echo "  Project ID [{$projId}]: " . $group->count() . " widgets" . PHP_EOL;
}
$byTenant = $widgets->groupBy('tenant_id');
foreach ($byTenant as $tId => $group) {
    echo "  Tenant ID [{$tId}]: " . $group->count() . " widgets" . PHP_EOL;
}
