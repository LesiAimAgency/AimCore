<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$files = glob('public/themes/inbetween_v2/images/hero-person-*.png');
foreach ($files as $f) {
    $info = getimagesize($f);
    echo "$f => {$info[0]}x{$info[1]}\n";
}
$stage = 'public/themes/inbetween_v2/images/founder-airu-stage.png';
$info = getimagesize($stage);
echo "$stage => {$info[0]}x{$info[1]}\n";


