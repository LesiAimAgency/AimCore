<?php

use App\Widgets\WidgetRegistry;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$types = WidgetRegistry::getTypes();
echo 'Total types: '.count($types)."\n";

$reflector = new ReflectionClass(WidgetRegistry::class);
$prop = $reflector->getProperty('widgets');
$prop->setAccessible(true);
$allRegistered = $prop->getValue();

foreach ($allRegistered as $type => $class) {
    try {
        $preview = WidgetRegistry::getPreview($type, []);
        if (strpos($preview, 'Widget must implement getConfig') !== false) {
            echo "MATCH in registered: $type ($class)\n";
        }
    } catch (Throwable $e) {
        if (strpos($e->getMessage(), 'Widget must implement getConfig') !== false) {
            echo "MATCH EXCEPTION in registered: $type ($class)\n";
        }
    }
}
