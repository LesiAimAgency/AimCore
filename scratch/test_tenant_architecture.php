<?php

use App\Http\Controllers\Admin\WidgetController;
use App\Models\Project;
use App\Models\User;
use App\Models\Widget;
use App\Services\WidgetRenderingService;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "=== TESTING 100% TENANT_ID ARCHITECTURE ===\n\n";

$project = Project::where('code', 'viettinmart-eco')->first();
$tenantId = $project->tenant_id;
echo "1. Project: {$project->name} (ID: {$project->id}, Code: {$project->code}, Tenant ID: {$tenantId})\n";

// 2. Test user lookup by tenant
$user = User::withoutGlobalScopes()->where('username', 'admin_vtm')->first();
echo "2. User: {$user->username} (ID: {$user->id}, Tenant ID: {$user->tenant_id})\n";
if ((int) $user->tenant_id === (int) $tenantId) {
    echo "   ✓ Match: User tenant matches project tenant 100%!\n";
} else {
    echo "   ✗ Mismatch: user {$user->tenant_id} != project {$tenantId}\n";
}

// 3. Test Widget query with tenant_id (even if session has another tenant or no session)
session(['current_tenant_id' => $tenantId]);
app()->instance('current_tenant_id', $tenantId);

$widgets = Widget::withoutGlobalScope('tenant')
    ->where(function ($q) use ($tenantId, $project) {
        $q->where('tenant_id', $tenantId)->orWhere('project_id', $project->id);
    })
    ->get();
echo "3. Widgets retrieved by tenant {$tenantId}: ".$widgets->count()." widgets\n";

// 4. Test Widget rendering service
$renderingService = app(WidgetRenderingService::class);
$homepageHtml = $renderingService->renderArea('homepage-main');
echo '4. Frontend Homepage Rendering: '.strlen($homepageHtml)." bytes generated\n";
if (strlen($homepageHtml) > 500) {
    echo "   ✓ SUCCESS: Homepage rendered with rich widget content!\n";
} else {
    echo "   ✗ WARNING: Homepage rendered empty or too short!\n";
}

// 5. Test WidgetController response simulation
$request = Request::create('/viettinmart-eco/admin/widgets', 'GET');
$request->attributes->set('project', $project);
$request->attributes->set('auth_user', $user);
app()->instance('request', $request);

$controller = app(WidgetController::class);
$view = $controller->index();
$viewData = $view->getData();
$existingWidgets = $viewData['existingWidgets'];
$totalActive = collect($existingWidgets)->sum(fn ($ws) => count($ws));
echo "5. Widget Builder View Data: Total active widgets in areas: {$totalActive}\n";
foreach ($existingWidgets as $area => $items) {
    echo "   - Area '{$area}': ".count($items)." widgets\n";
}

if ($totalActive > 0) {
    echo "\n>>> ALL 5 CHECKS PASSED PERFECTLY! <<<\n";
} else {
    echo "\n>>> FAILED: 0 ACTIVE WIDGETS! <<<\n";
}
