<?php

use App\Models\Project;
use App\Services\SettingsService;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
$req = Request::create('/viettinmart-eco', 'GET');
$app->instance('request', $req);
$req->attributes->set('project', $project);
app()->instance('current_project_id', $project->id);
app()->instance('current_tenant_id', $project->tenant_id ?? $project->id);

echo "site_logo: " . var_export(setting('site_logo'), true) . "\n";
echo "resolve_image('logo'): " . var_export(resolve_image('logo'), true) . "\n";
echo "site_name: " . var_export(setting('site_name'), true) . "\n";
echo "color_primary: " . var_export(setting('color_primary'), true) . "\n";
echo "font_main: " . var_export(setting('font_main'), true) . "\n";
echo "topbar_show: " . var_export(setting('topbar_show'), true) . "\n";
echo "SettingsService all(): " . count(SettingsService::getInstance()->all()) . " settings found\n";
