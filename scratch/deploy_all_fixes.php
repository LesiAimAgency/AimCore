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
        'local' => app_path('Models/Order.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'Order.php',
    ],
    [
        'local' => app_path('Models/OrderItem.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'OrderItem.php',
    ],
    [
        'local' => app_path('Models/User.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'User.php',
    ],
    [
        'local' => app_path('Models/UserAddress.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'UserAddress.php',
    ],
    [
        'local' => app_path('Models/Post.php'),
        'dir' => 'aimagency.vn/app/Models',
        'file' => 'Post.php',
    ],
    [
        'local' => app_path('Http/Controllers/Viettinmart/CheckoutController.php'),
        'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
        'file' => 'CheckoutController.php',
    ],
    [
        'local' => app_path('Http/Controllers/Viettinmart/AuthController.php'),
        'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
        'file' => 'AuthController.php',
    ],
    [
        'local' => app_path('Http/Controllers/Viettinmart/ReviewController.php'),
        'dir' => 'aimagency.vn/app/Http/Controllers/Viettinmart',
        'file' => 'ReviewController.php',
    ],
    [
        'local' => database_path('migrations/2026_09_06_000001_add_user_id_to_orders_table.php'),
        'dir' => 'aimagency.vn/database/migrations',
        'file' => '2026_09_06_000001_add_user_id_to_orders_table.php',
    ],
];

echo "Uploading files to aimagency.vn...\n";
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
    echo "  Uploaded {$f['file']} to {$f['dir']}: $status\n";
}

// Upload runner script to migrate schema, reset opcache, clear cache, and verify Order::generateOrderNumber
$runnerScript = <<<'PHP'
<?php
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use App\Models\Order;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

header('Content-Type: application/json');

$response = [];

// 1. Reset OPcache if available
if (function_exists('opcache_reset')) {
    $response['opcache_reset'] = opcache_reset();
} else {
    $response['opcache_reset'] = 'not_available';
}

// 2. Check and migrate user_id in orders table
if (Schema::hasTable('orders') && !Schema::hasColumn('orders', 'user_id')) {
    Schema::table('orders', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('project_id')->index();
    });
    $response['orders_user_id_added'] = true;
} else {
    $response['orders_user_id_added'] = 'already_exists';
}

// 3. Check user_addresses table
if (!Schema::hasTable('user_addresses')) {
    Schema::create('user_addresses', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->index();
        $table->string('receiver_name')->nullable();
        $table->string('receiver_phone')->nullable();
        $table->string('province_code')->nullable();
        $table->string('ward_code')->nullable();
        $table->string('province_name')->nullable();
        $table->string('district_name')->nullable();
        $table->string('ward_name')->nullable();
        $table->string('address_detail')->nullable();
        $table->string('full_address')->nullable();
        $table->boolean('is_default')->default(false);
        $table->timestamps();
    });
    $response['user_addresses_table_created'] = true;
} else {
    $response['user_addresses_table_created'] = 'already_exists';
}

// 4. Clear Laravel application caches
try {
    Artisan::call('optimize:clear');
    $response['artisan_optimize_clear'] = Artisan::output();
} catch (\Throwable $e) {
    $response['artisan_optimize_clear_error'] = $e->getMessage();
}

// 5. Test Order::generateOrderNumber()
try {
    $generatedNumber = Order::generateOrderNumber();
    $response['test_generate_order_number'] = [
        'success' => true,
        'order_number' => $generatedNumber,
    ];
} catch (\Throwable $e) {
    $response['test_generate_order_number'] = [
        'success' => false,
        'error' => $e->getMessage(),
        'trace' => $e->getTraceAsString(),
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
@unlink(__FILE__);
PHP;

echo "\nUploading server runner to aimagency.vn/public/deploy_and_verify.php...\n";
$method->invoke($c, 'Fileman', 'save_file_content', [
    'dir' => 'aimagency.vn/public',
    'file' => 'deploy_and_verify.php',
    'content' => $runnerScript,
]);

echo "Executing server runner via HTTP...\n";
$ch = curl_init('https://aimagency.vn/deploy_and_verify.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$res = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Response code: $httpCode\n";
echo "Response body:\n$res\n";
