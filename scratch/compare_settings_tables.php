<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();

echo "Project ID: {$project->id}, tenant_id: {$project->tenant_id}\n";

$sCount = \DB::table('settings')->where('project_id', $project->id)->count();
echo "settings table with project_id={$project->id}: {$sCount}\n";

$tCount = \DB::table('settings')->where('tenant_id', $project->tenant_id)->count();
echo "settings table with tenant_id={$project->tenant_id}: {$tCount}\n";

$psCount = \DB::table('project_settings')->where('project_id', $project->id)->count();
echo "project_settings table with project_id={$project->id}: {$psCount}\n";

$logoSettings = \DB::table('settings')->where('key', 'site_logo')->get();
echo "\nKey 'site_logo' in settings table:\n";
foreach ($logoSettings as $l) {
    echo "- id: {$l->id}, project_id: {$l->project_id}, tenant_id: {$l->tenant_id}, payload: {$l->payload}, value: {$l->value}\n";
}

$logoProjectSettings = \DB::table('project_settings')->where('key', 'site_logo')->get();
echo "\nKey 'site_logo' in project_settings table:\n";
foreach ($logoProjectSettings as $lp) {
    echo "- id: {$lp->id}, project_id: {$lp->project_id}, value: {$lp->value}\n";
}
