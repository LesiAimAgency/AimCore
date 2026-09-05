<?php

use App\Models\Widget;
use Illuminate\Support\Facades\Cache;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

$delHomepage = Widget::where('project_id', 10)->where('area', 'homepage')->delete();
echo "Deleted old 'homepage' widgets: ".$delHomepage.PHP_EOL;

$delInbetweenMenus = Widget::where('project_id', 10)->where('type', 'inbetween_menu')->delete();
echo 'Deleted duplicate inbetween_menu widgets: '.$delInbetweenMenus.PHP_EOL;

$delInbetweenFooter = Widget::where('project_id', 10)->where('type', 'inbetween_footer_column')->delete();
echo 'Deleted duplicate inbetween_footer_column widgets: '.$delInbetweenFooter.PHP_EOL;

Cache::flush();
echo 'Cache flushed.'.PHP_EOL;
