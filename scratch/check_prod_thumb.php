<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$p = \App\Models\Product::where('project_id', 10)->whereNotNull('featured_image')->first();
echo "Raw DB featured_image: " . $p->getRawOriginal('featured_image') . "\n";
echo "Attribute featured_image: " . var_export($p->featured_image, true) . "\n";
echo "Attribute thumbnail_url: " . var_export($p->thumbnail_url, true) . "\n";
