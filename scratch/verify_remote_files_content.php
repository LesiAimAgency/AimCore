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

// Check if appearance.blade.php on remote contains "service_bar_enabled"
$remoteBase = 'wkcomputer.aimagency.vn';
$content = $client->callPublic('Fileman', 'get_file_content', [
    'dir' => $remoteBase . '/resources/views/frontend/themes/wkcomputerdemo/admin/settings',
    'file' => 'appearance.blade.php',
]);

if (is_array($content) && !empty($content['content'])) {
    $bladeContent = $content['content'];
    if (str_contains($bladeContent, 'service_bar_enabled')) {
        echo "PASS: Remote appearance.blade.php contains service_bar_enabled!\n";
    } else {
        echo "FAIL: Remote appearance.blade.php does NOT contain service_bar_enabled\n";
    }

    if (str_contains($bladeContent, 'data-tab="footer"')) {
        echo "PASS: Remote appearance.blade.php contains data-tab=\"footer\"!\n";
    } else {
        echo "FAIL: Remote appearance.blade.php missing data-tab=\"footer\"\n";
    }
} else {
    echo "Could not fetch remote appearance.blade.php\n";
    print_r($content);
}

// Check sidebar.blade.php
$sidebar = $client->callPublic('Fileman', 'get_file_content', [
    'dir' => $remoteBase . '/resources/views/frontend/themes/wkcomputerdemo/admin/layouts',
    'file' => 'sidebar.blade.php',
]);
if (is_array($sidebar) && !empty($sidebar['content'])) {
    if (str_contains($sidebar['content'], 'Thanh dịch vụ & Footer')) {
        echo "PASS: Remote sidebar.blade.php contains 'Thanh dịch vụ & Footer'!\n";
    }
}
