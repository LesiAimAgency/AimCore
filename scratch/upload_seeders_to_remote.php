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

$remoteBase = 'wkcomputer.aimagency.vn';

$files = [
    'database/seeders/WkcomputerMasterSeeder.php',
    'database/seeders/WkcomputerSettingsSeeder.php',
    'database/seeders/WkcomputerProductsSeeder.php',
    'database/seeders/WkcomputerMenuSeeder.php',
    'database/seeders/WkcomputerWidgetsSeeder.php',
    'database/seeders/DatabaseSeeder.php',
];

foreach ($files as $rel) {
    $localFile = 'c:/MAMP/htdocs/core/VGTDemo/' . $rel;
    $content = file_get_contents($localFile);
    $remoteDir = $remoteBase . '/' . dirname($rel);
    $remoteFile = basename($rel);

    echo "Uploading $rel ... ";
    $res = $client->callPublic('Fileman', 'save_file_content', [
        'dir' => $remoteDir,
        'file' => $remoteFile,
        'content' => $content,
        'fallback' => 0,
    ]);
    echo "OK\n";
}

echo "All seeders synced successfully to $remoteBase\n";
