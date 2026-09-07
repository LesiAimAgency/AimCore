<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== SIMULATING PRODUCTION SERVER: Project ID = 11, Tenant ID = 3 ===\n\n";

// Create a mock project object with ID 11 (like on production server)
$mockProject = new \App\Models\Project([
    'name' => 'Viettinmart Ecommerce',
    'code' => 'viettinmart-eco',
    'tenant_id' => 3,
]);
$mockProject->id = 11; // simulate production project ID = 11

$tenantId = $mockProject->tenant_id;
echo "Simulated Project on Server: ID: {$mockProject->id}, Code: {$mockProject->code}, Tenant ID: {$tenantId}\n";

// 1. Test user authentication (tenant_id = 3)
$user = \App\Models\User::withoutGlobalScopes()->where('username', 'admin_vtm')->first();
$isAuthorized = (! empty($user->tenant_id) && (int) $user->tenant_id === (int) $mockProject->tenant_id);
echo "1. User Authorization Check (100% Tenant ID): " . ($isAuthorized ? "✓ AUTHORIZED" : "✗ FORBIDDEN") . "\n";

// 2. Test WidgetController with Project 11 & Tenant 3
$request = \Illuminate\Http\Request::create('/viettinmart-eco/admin/widgets', 'GET');
$request->attributes->set('project', $mockProject);
$request->attributes->set('auth_user', $user);
session(['current_tenant_id' => 3]);
session(['current_project_id' => 11]);
app()->instance('request', $request);

$controller = app(\App\Http\Controllers\Admin\WidgetController::class);
$view = $controller->index();
$viewData = $view->getData();
$existingWidgets = $viewData['existingWidgets'];
$totalActive = collect($existingWidgets)->sum(fn($ws) => count($ws));
echo "2. Widget Manager View on Project 11: Total active widgets = {$totalActive}\n";
foreach ($existingWidgets as $area => $items) {
    echo "   - Area '{$area}': " . count($items) . " widgets\n";
}

// 3. Test Frontend Rendering with Project 11 & Tenant 3
app()->instance('current_project_id', 11);
app()->instance('current_tenant_id', 3);
$renderingService = app(\App\Services\WidgetRenderingService::class);
$homepageHtml = $renderingService->renderArea('homepage-main');
echo "3. Frontend Homepage Rendering: " . strlen($homepageHtml) . " bytes\n";

if ($totalActive === 35 && strlen($homepageHtml) > 500) {
    echo "\n>>> 100% SUCCESS: Even with Project ID = 11, All 35 Widgets and Frontend Render Flawlessly by Tenant ID! <<<\n";
} else {
    echo "\n>>> SIMULATION FAILED! <<<\n";
}
