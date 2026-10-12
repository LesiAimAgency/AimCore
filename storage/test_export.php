<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$project = App\Models\Project::where('code', 'DA005')->first();
$service = app(App\Services\ProjectExportService::class);

echo "Starting buildExportPackage for " . $project->name . "...\n";
try {
    $result = $service->buildExportPackage($project, null, false);
    echo "Success! Zip path: " . $result['zip_path'] . "\n";
    echo "Zip size: " . round(filesize($result['zip_path']) / 1024 / 1024, 2) . " MB\n";
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n";
}
