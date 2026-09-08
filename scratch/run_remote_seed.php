<?php
require 'c:/MAMP/htdocs/core/VGTDemo/vendor/autoload.php';
$app = require_once 'c:/MAMP/htdocs/core/VGTDemo/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$profile = \App\Models\HostingProfile::find(2);
$client = new class extends \App\Services\Hosting\CpanelHostingClient {
    public function callPublic($m, $f, $p = [], $v = 'POST') {
        return $this->callUapi($m, $f, $p, $v);
    }
};
$client->setProfile($profile);

$runner = <<<'PHP'
<?php
set_time_limit(300);
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Artisan;

header('Content-Type: text/plain; charset=utf-8');

try {
    Artisan::call('db:seed', [
        '--class' => 'Database\\Seeders\\WkcomputerMasterSeeder',
        '--force' => true,
    ]);
    echo Artisan::output();
} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n" . $e->getTraceAsString();
}
PHP;

$client->callPublic('Fileman', 'save_file_content', [
    'dir' => 'wkcomputer.aimagency.vn/public',
    'file' => '_run_master_seeder.php',
    'content' => $runner,
    'fallback' => 0,
]);

$ch = curl_init('https://wkcomputer.aimagency.vn/_run_master_seeder.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 180);
$res = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Output:\n" . $res . "\n";

// Remove the runner
$delScript = <<<'PHP'
<?php
@unlink(__FILE__);
PHP;
$client->callPublic('Fileman', 'save_file_content', [
    'dir' => 'wkcomputer.aimagency.vn/public',
    'file' => '_run_master_seeder.php',
    'content' => $delScript,
    'fallback' => 0,
]);
@file_get_contents('https://wkcomputer.aimagency.vn/_run_master_seeder.php');
