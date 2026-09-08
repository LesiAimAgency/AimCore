<?php

use App\Services\Hosting\CpanelHostingClient;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$client = app(CpanelHostingClient::class);

$payload = <<<'PHP'
<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

header('Content-Type: application/json');
echo json_encode([
    'projects' => \App\Models\Project::select('id', 'code', 'name', 'tenant_id')->get()->toArray(),
    'tenants' => \App\Models\Tenant::select('id', 'code', 'name')->get()->toArray(),
]);
PHP;

$res = $client->executeViaWebFile('public/check_project_info.php', $payload);
echo $res['output'] ?? $res['error'] ?? json_encode($res);
