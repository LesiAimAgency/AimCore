<?php

use App\Models\Project;
use App\Services\DynamicWidgetRenderer;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
session(['current_project' => $project]);
session(['current_project_id' => $project->id]);
app()->instance('current_project_id', $project->id);

$renderer = new DynamicWidgetRenderer;
$html = $renderer->renderArea('footer');
echo 'Rendered length: '.strlen($html)."\n";
echo substr($html, 0, 500)."\n...\n".substr($html, -300)."\n";
