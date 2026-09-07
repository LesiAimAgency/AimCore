<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$tables = DB::select('SHOW TABLES');
$dbName = DB::getDatabaseName();
$key = 'Tables_in_'.$dbName;
$results = [];

foreach ($tables as $t) {
    $tbl = $t->$key;
    if (Schema::hasColumn($tbl, 'project_id')) {
        $c10 = DB::table($tbl)->where('project_id', 10)->count();
        $results[$tbl] = $c10;
    }
}

foreach ($results as $tbl => $count) {
    if ($count > 0) {
        echo "{$tbl}: {$count} rows with project_id = 10\n";
    }
}
