<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$to = DB::table('settings')
    ->where('project_id', 10)
    ->where('key', 'like', 'theme_option_%')
    ->get();

echo 'THEME OPTIONS IN DB FOR P10: '.$to->count()."\n";
foreach ($to as $row) {
    echo $row->key.' => '.$row->payload."\n";
}

echo "\nTEST SETTING HELPER IN PROJECT CONTEXT:\n";
$req = Request::create('/viettinmart-eco/admin/settings', 'GET');
$app->handle($req);

echo 'contact_email: '.setting('contact_email')."\n";
echo 'contact_phone: '.setting('contact_phone')."\n";
echo 'seo_meta_title: '.setting('seo_meta_title')."\n";
echo 'bank_name: '.setting('bank_name')."\n";
echo 'page_layout: '.get_theme_layout('page')."\n";
echo 'post_layout: '.get_theme_layout('post')."\n";
echo 'product_category_layout: '.get_theme_layout('product_category')."\n";
echo 'post_excerpt_length: '.get_theme_option('post-category', 'post_excerpt_length')."\n";
