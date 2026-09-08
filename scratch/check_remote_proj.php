<?php

use App\Models\HostingProfile;
use App\Services\Hosting\CpanelHostingClient;
use Illuminate\Contracts\Console\Kernel;

require 'c:/MAMP/htdocs/core/VGTDemo/vendor/autoload.php';
$app = require_once 'c:/MAMP/htdocs/core/VGTDemo/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$profile = HostingProfile::find(2);
$client = new class extends CpanelHostingClient
{
    public function callPublic($m, $f, $p = [], $v = 'POST')
    {
        return $this->callUapi($m, $f, $p, $v);
    }
};
$client->setProfile($profile);

$script = <<<'PHP'
<?php
require __DIR__ . "/../vendor/autoload.php";
$app = require_once __DIR__ . "/../bootstrap/app.php";
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
echo json_encode([
    'projects' => \App\Models\Project::select('id', 'code', 'name', 'tenant_id', 'status')->get()->toArray(),
    'tenants' => \App\Models\Tenant::select('id', 'code', 'name')->get()->toArray(),
], JSON_PRETTY_PRINT);
PHP;

$res = $client->callPublic('Fileman', 'save_file_content', [
    'dir' => 'wkcomputer.aimagency.vn/public',
    'file' => '_check_remote_proj.php',
    'content' => $script,
    'fallback' => 0,
]);

$ch = curl_init('https://wkcomputer.aimagency.vn/_check_remote_proj.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
curl_close($ch);

echo "REMOTE RESPONSE:\n".$output."\n";

$client->callPublic('Fileman', 'fileop', [
    'op' => 'unlink',
    'sourcefiles' => 'wkcomputer.aimagency.vn/public/_check_remote_proj.php',
]);
