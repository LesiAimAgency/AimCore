<?php
require 'c:/MAMP/htdocs/core/VGTDemo/vendor/autoload.php';
$app = require_once 'c:/MAMP/htdocs/core/VGTDemo/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$profile = \App\Models\HostingProfile::find(2);
$client = new class extends \App\Services\Hosting\CpanelHostingClient {
    public function callPublic($m, $f, $p = []) {
        return $this->callUapi($m, $f, $p);
    }
};
$client->setProfile($profile);

$remoteBase = 'wkcomputer.aimagency.vn';

$filesToSync = [
    'app/Http/Controllers/Wkcomputer/CheckoutController.php' => 'app/Http/Controllers/Wkcomputer/CheckoutController.php',
    'routes/wkcomputer.php' => 'routes/wkcomputer.php',
    'resources/views/frontend/themes/wkcomputerdemo/shop/checkout.blade.php' => 'resources/views/frontend/themes/wkcomputerdemo/shop/checkout.blade.php',
    'resources/views/frontend/themes/wkcomputerdemo/admin/settings/appearance.blade.php' => 'resources/views/frontend/themes/wkcomputerdemo/admin/settings/appearance.blade.php',
    'resources/views/frontend/themes/wkcomputerdemo/admin/layouts/sidebar.blade.php' => 'resources/views/frontend/themes/wkcomputerdemo/admin/layouts/sidebar.blade.php',
    'resources/views/frontend/themes/wkcomputerdemo/layouts/app.blade.php' => 'resources/views/frontend/themes/wkcomputerdemo/layouts/app.blade.php',
];

foreach ($filesToSync as $localRel => $remoteRel) {
    $localFile = 'c:/MAMP/htdocs/core/VGTDemo/' . $localRel;
    if (!file_exists($localFile)) {
        echo "Local file not found: $localRel\n";
        continue;
    }
    $remoteDir = $remoteBase . '/' . dirname($remoteRel);
    $remoteFile = basename($remoteRel);

    echo "Uploading $remoteRel ($remoteFile) to $remoteDir ... ";
    $client->uploadFile($localFile, $remoteDir, $remoteFile);
    echo "Done.\n";
}

// Clear compiled views on remote
echo "Clearing remote compiled view cache ... ";
$viewFiles = $client->callPublic('Fileman', 'list_files', [
    'dir' => $remoteBase . '/storage/framework/views',
]);
$count = 0;
if (is_array($viewFiles)) {
    foreach ($viewFiles as $vf) {
        if (!empty($vf['file']) && str_ends_with($vf['file'], '.php')) {
            try {
                $client->callPublic('Fileman', 'fileop', [
                    'op' => 'unlink',
                    'sourcefiles' => $remoteBase . '/storage/framework/views/' . $vf['file'],
                ]);
                $count++;
            } catch (\Throwable $e) {}
        }
    }
}
echo "Cleared $count cached views.\n";

echo "SYNC COMPLETE!\n";
