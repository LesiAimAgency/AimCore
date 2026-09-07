<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tables = \DB::select('SHOW TABLES');
$dbName = \DB::getDatabaseName();
$key = 'Tables_in_' . $dbName;
$tenantTables = [];

foreach ($tables as $t) {
    $tbl = $t->$key;
    if (\Illuminate\Support\Facades\Schema::hasColumn($tbl, 'tenant_id')) {
        $c3 = \DB::table($tbl)->where('tenant_id', 3)->count();
        $cTotal = \DB::table($tbl)->count();
        $tenantTables[$tbl] = ['tenant_3' => $c3, 'total' => $cTotal];
    }
}

foreach ($tenantTables as $tbl => $info) {
    echo "{$tbl}: {$info['tenant_3']} rows with tenant_id=3 (total: {$info['total']})\n";
}
