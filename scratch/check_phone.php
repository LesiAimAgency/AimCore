<?php

use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo 'site_phone: '.setting('site_phone')."\n";
echo 'contact_phone: '.setting('contact_phone')."\n";
echo 'hotline: '.setting('hotline')."\n";
echo 'phone: '.setting('phone')."\n";

$settings = Widget::where('area', 'like', '%footer%')->orWhere('widget_type', 'like', '%footer%')->get();
foreach ($settings as $w) {
    if (isset($w->settings['phone'])) {
        echo 'Widget phone: '.$w->settings['phone']."\n";
    }
    if (isset($w->settings['hotline'])) {
        echo 'Widget hotline: '.$w->settings['hotline']."\n";
    }
}
