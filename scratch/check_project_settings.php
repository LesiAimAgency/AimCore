<?php

use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
echo 'Project ID: '.($project ? $project->id : 'null')."\n";

if ($project) {
    $settings = DB::table('settings')->where('project_id', $project->id)->get();
    echo 'Settings in settings table for project: '.$settings->count()."\n";
    foreach ($settings as $s) {
        echo "- {$s->key}: ".substr($s->payload, 0, 70)."\n";
    }

    $projectSettings = DB::table('project_settings')->where('project_id', $project->id)->get();
    echo "\nSettings in project_settings table for project: ".$projectSettings->count()."\n";
    foreach ($projectSettings as $ps) {
        echo "- {$ps->key}: ".substr($ps->value, 0, 70)."\n";
    }
}
