<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "--- SIMULATING LOCAL (project=10, tenant=3) ---\n";
session(['current_tenant_id' => 3]);
session(['current_project_id' => 10]);
app()->instance('current_tenant_id', 3);
app()->instance('current_project_id', 10);

try {
    $orders = \App\Models\Order::with(['items'])->latest()->paginate(20);
    echo "Orders total: " . $orders->total() . "\n";
} catch (\Throwable $e) {
    echo "Orders error: " . $e->getMessage() . "\n";
}

echo "\n--- SIMULATING SERVER (project=11, tenant=3) ---\n";
session(['current_tenant_id' => 3]);
session(['current_project_id' => 11]);
app()->instance('current_tenant_id', 3);
app()->instance('current_project_id', 11);

try {
    $orders = \App\Models\Order::with(['items'])->latest()->paginate(20);
    echo "Orders total: " . $orders->total() . "\n";
    foreach ($orders as $o) {
        echo "Order #{$o->order_number}: items=" . $o->items->count() . ", project_id={$o->project_id}, tenant_id={$o->tenant_id}\n";
        break;
    }
} catch (\Throwable $e) {
    echo "Orders error: " . $e->getMessage() . "\n";
}

echo "\n--- SIMULATING SERVER IF tenant_id WAS FALLBACK TO project_id=11 ---\n";
session(['current_tenant_id' => 11]);
session(['current_project_id' => 11]);
app()->instance('current_tenant_id', 11);
app()->instance('current_project_id', 11);

try {
    $orders = \App\Models\Order::with(['items'])->latest()->paginate(20);
    echo "Orders total: " . $orders->total() . "\n";
} catch (\Throwable $e) {
    echo "Orders error: " . $e->getMessage() . "\n";
}

echo "\n--- SIMULATING SERVER IF NO TENANT_ID IN SESSION ---\n";
session()->forget('current_tenant_id');
session(['current_project_id' => 11]);
app()->forgetInstance('current_tenant_id');
app()->instance('current_project_id', 11);

try {
    $orders = \App\Models\Order::with(['items'])->latest()->paginate(20);
    echo "Orders total: " . $orders->total() . "\n";
} catch (\Throwable $e) {
    echo "Orders error: " . $e->getMessage() . "\n";
}
