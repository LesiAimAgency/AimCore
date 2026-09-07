<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::where('code', 'viettinmart-eco')->first();
$themeViewPath = resource_path("views/frontend/themes/viettinmartdemo");
view()->getFinder()->prependLocation($themeViewPath);
view()->share('errors', new \Illuminate\Support\ViewErrorBag());
view()->share('currentProject', $project);

try {
    $html = view('admin.settings.appearance', [
        'settingsMap' => collect([]),
        'activeLanguages' => collect([]),
        'module' => ['title' => 'Cấu hình Giao diện']
    ])->render();
    echo "Rendering admin.settings.appearance: SUCCESS (" . strlen($html) . " bytes)\n";
} catch (\Throwable $e) {
    echo "Rendering admin.settings.appearance FAILED: " . $e->getMessage() . "\n";
    echo "In " . $e->getFile() . ":" . $e->getLine() . "\n";
}
