<?php

use App\Models\DeploymentHistory;
use App\Services\Hosting\DeploymentService;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();
app(DeploymentService::class)->runExistingDeploy(DeploymentHistory::find(5));
