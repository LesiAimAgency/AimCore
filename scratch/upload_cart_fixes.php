<?php

use App\Models\HostingProfile;
use App\Services\Hosting\HostingClientFactory;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$p = HostingProfile::find(2);
if (! $p) {
    echo "HostingProfile 2 not found!\n";
    exit(1);
}

$c = HostingClientFactory::make($p);
$ref = new ReflectionClass($c);
$method = $ref->getMethod('callUapi');
$method->setAccessible(true);

$files = [
    [
        'local' => app_path('Http/Controllers/Viettinmart/CartController.php'),
        'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
        'file' => 'CartController.php',
    ],
    [
        'local' => app_path('Http/Controllers/Viettinmart/ReviewController.php'),
        'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
        'file' => 'ReviewController.php',
    ],
    [
        'local' => app_path('Http/Controllers/Viettinmart/CheckoutController.php'),
        'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
        'file' => 'CheckoutController.php',
    ],
    [
        'local' => app_path('Models/Product.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'Product.php',
    ],
    [
        'local' => app_path('Models/ProductVariation.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'ProductVariation.php',
    ],
    [
        'local' => app_path('Models/ProductVariant.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'ProductVariant.php',
    ],
    [
        'local' => app_path('Services/PricingService.php'),
        'dir' => 'aimagency.vn/app/Services',
        'file' => 'PricingService.php',
    ],
];

foreach ($files as $f) {
    if (! file_exists($f['local'])) {
        echo "Local file not found: {$f['local']}\n";

        continue;
    }
    $content = file_get_contents($f['local']);
    $res = $method->invoke($c, 'Fileman', 'save_file_content', [
        'dir' => $f['dir'],
        'file' => $f['file'],
        'content' => $content,
    ]);
    $status = ($res['status'] ?? 0) ? 'SUCCESS' : 'FAILED';
    echo "Uploaded {$f['file']} to {$f['dir']}: $status\n";
}

echo "Done uploading cart fixes.\n";
