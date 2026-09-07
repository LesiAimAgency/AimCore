<?php

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
$projId = $project->id;

echo "Project ID: {$projId}\n";
echo "Tenant ID: {$project->tenant_id}\n";

$rawWidgets = Widget::withoutGlobalScopes()->where('project_id', $projId)->get();
echo "Raw count in DB for project_id={$projId}: ".$rawWidgets->count()."\n";
foreach ($rawWidgets->groupBy('area') as $area => $wList) {
    echo "  Area '{$area}': ".$wList->count()." widgets\n";
}

// Now test with global scopes active
$scopedWidgets = Widget::where('project_id', $projId)->get();
echo "Scoped count in DB for project_id={$projId}: ".$scopedWidgets->count()."\n";

// Set tenant in session and test
session(['current_tenant_id' => $project->tenant_id]);
$tenantScoped = Widget::where('project_id', $projId)->get();
echo "With tenant in session ({$project->tenant_id}): ".$tenantScoped->count()."\n";

// What if tenant in session is DIFFERENT (e.g. 1 or 2)?
session(['current_tenant_id' => 1]);
$wrongTenant = Widget::where('project_id', $projId)->get();
echo 'With WRONG tenant in session (1): '.$wrongTenant->count()."\n";
