<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$tables = DB::select('SHOW TABLES');
foreach ($tables as $t) {
    $tName = array_values((array) $t)[0];
    if (str_contains($tName, 'lang') || str_contains($tName, 'trans')) {
        echo "Table: $tName\n";
        $cols = DB::select("DESCRIBE $tName");
        foreach ($cols as $col) {
            echo "  {$col->Field} ({$col->Type})\n";
        }
        $count = DB::table($tName)->count();
        echo "  Count: $count\n";
        $sample = DB::table($tName)->limit(3)->get();
        print_r($sample);
    }
}
echo 'Has lang_strings: '.(Schema::hasTable('lang_strings') ? 'YES' : 'NO')."\n";
