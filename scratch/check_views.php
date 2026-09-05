<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$views = [
    'auth.login',
    'frontend.themes.viettinmartdemo.auth.login',
    'auth.register',
    'frontend.themes.viettinmartdemo.auth.register',
    'account.profile',
    'frontend.themes.viettinmartdemo.account.profile',
    'sitemap',
    'frontend.themes.viettinmartdemo.sitemap',
    'sitemap_html',
    'frontend.themes.viettinmartdemo.sitemap_html',
];

foreach ($views as $v) {
    echo "$v: ".(view()->exists($v) ? 'EXISTS' : 'MISSING')."\n";
}
