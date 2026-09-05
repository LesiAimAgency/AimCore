<?php

use App\Models\Project;
use App\Models\ProjectSetting;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
echo 'PROJECT ID: '.$project->id."\n";

DB::setDefaultConnection('mysql');

$enabledSettings = ProjectSetting::where('project_id', $project->id)
    ->where('value', '1')
    ->pluck('key')
    ->toArray();

echo 'ENABLED SETTINGS COUNT: '.count($enabledSettings)."\n";
print_r($enabledSettings);

$modules = collect(config('system_menu'))
    ->filter(function ($module) use ($enabledSettings) {
        return in_array($module['permission'], $enabledSettings);
    })
    ->map(function ($module) use ($project) {
        $module['route'] = str_replace('cms.', 'project.admin.', $module['route']);
        $module['route_params'] = ['projectCode' => $project->code];

        return $module;
    })
    ->filter(function ($module) {
        return Route::has($module['route']);
    });

echo 'MODULES COUNT: '.$modules->count()."\n";
foreach ($modules as $m) {
    echo ' - '.$m['title'].' ('.$m['route'].")\n";
}
