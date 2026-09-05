<?php

use App\Console\Commands\SyncLegacyDatabaseCommand;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

// Delete all inbetween_ widgets
$deletedInbetween = Widget::where('type', 'like', 'inbetween_%')->delete();
echo "Deleted {$deletedInbetween} 'inbetween_' widgets.\n";

// Delete the specific old duplicates if any
$deletedDuplicates = Widget::whereIn('type', [
    'hero_slider', 'feature_icons', 'promo_banners', 'prod_featured',
    'deal_flash', 'prod_tabs', 'top_trending', 'posts_latest', 'form_widget', 'menu', 'footer_column',
])->delete();
echo "Deleted {$deletedDuplicates} old legacy widgets.\n";

// Now we can sync widgets again from the command
$command = new SyncLegacyDatabaseCommand;
// We can just run the Artisan command instead
