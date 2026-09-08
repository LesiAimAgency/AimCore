<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$profile = App\Models\HostingProfile::where('is_active', true)->first();

$helper = new class extends App\Services\Hosting\CpanelHostingClient {
    public function publicCall($mod, $fn, $params = [], $m = 'GET') {
        return $this->callUapi($mod, $fn, $params, $m);
    }
};
$helper->setProfile($profile);

$files = $helper->publicCall('Fileman', 'list_files', [
    'dir' => '/home/fukkatsu/wkcomputer.aimagency.vn'
]);

echo "Files in /home/fukkatsu/wkcomputer.aimagency.vn:\n";
foreach ($files as $f) {
    echo " - " . $f['file'] . " (" . $f['type'] . ")\n";
}
