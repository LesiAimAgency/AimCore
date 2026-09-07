<?php

use App\Models\Project;

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
request()->attributes->set('project', $project);

echo 'site_logo setting: '.var_export(setting('site_logo'), true)."\n";
echo "resolve_image('logo'): ".resolve_image('logo')."\n";
echo "resolve_image('logo', setting('site_logo')): ".resolve_image('logo', setting('site_logo'))."\n";
echo "resolve_image(setting('site_logo')): ".resolve_image(setting('site_logo'))."\n";

try {
    $html = view('frontend.themes.viettinmartdemo.layouts.partials.header')->render();
    preg_match_all('/<img[^>]+logo[^>]*>/i', $html, $matches);
    echo "\nRendered logo img tags:\n";
    foreach ($matches[0] as $img) {
        echo $img."\n";
    }
} catch (Throwable $e) {
    echo 'View render error: '.$e->getMessage()."\n";
}
