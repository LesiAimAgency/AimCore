<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo 'Locale: '.app()->getLocale()."\n";
echo 'Fallback: '.config('app.fallback_locale')."\n";
echo 'Lang path: '.app()->langPath()."\n";
echo 'sidebar_offers_title: '.__('sidebar_offers_title')."\n";
echo 'offer_bank_transfer: '.__('offer_bank_transfer')."\n";
echo 'offer_installment: '.__('offer_installment')."\n";
echo 'offer_free_shipping: '.__('offer_free_shipping')."\n";

app()->setLocale('vi');
echo "\nAfter setLocale('vi'):\n";
echo 'sidebar_offers_title: '.__('sidebar_offers_title')."\n";
echo 'offer_bank_transfer: '.__('offer_bank_transfer')."\n";
echo 'offer_installment: '.__('offer_installment')."\n";
echo 'offer_free_shipping: '.__('offer_free_shipping')."\n";

app()->setLocale('en');
echo "\nAfter setLocale('en'):\n";
echo 'sidebar_offers_title: '.__('sidebar_offers_title')."\n";
echo 'offer_bank_transfer: '.__('offer_bank_transfer')."\n";
echo 'offer_installment: '.__('offer_installment')."\n";
echo 'offer_free_shipping: '.__('offer_free_shipping')."\n";
