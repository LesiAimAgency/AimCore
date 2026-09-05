<?php

use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$ps = DB::connection('mysql')->table('project_settings')->where('project_id', 10)->get();
$out = 'PROJECT SETTINGS ROWS: '.$ps->count()."\n";
foreach ($ps as $p) {
    $out .= $p->key.' = '.$p->value."\n";
}
file_put_contents(__DIR__.'/ps_out.txt', $out);
echo 'DONE, count = '.$ps->count()."\n";
