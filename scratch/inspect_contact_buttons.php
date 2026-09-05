<?php

use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
request()->attributes->set('project', $project);

var_dump(setting('contact_buttons_desktop_enabled'));
var_dump(setting('contact_buttons'));
