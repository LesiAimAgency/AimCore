<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tables = \DB::select('SHOW TABLES');
$dbName = \DB::getDatabaseName();
$key = 'Tables_in_' . $dbName;

foreach ($tables as $t) {
    $tbl = $t->$key;
    if (\Illuminate\Support\Facades\Schema::hasColumn($tbl, 'project_id')) {
        $c11 = \DB::table($tbl)->where('project_id', 11)->count();
        if ($c11 > 0) {
            echo "{$tbl}: {$c11} rows with project_id = 11\n";
            // Move back to 10 for local development
            \DB::table($tbl)->where('project_id', 11)->update(['project_id' => 10]);
        }
    }
}

echo "\nAfter restoring to project_id = 10:\n";
require __DIR__ . '/check_tables.php';
