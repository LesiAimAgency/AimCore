<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$modelsPath = app_path('Models');
$files = glob($modelsPath . '/*.php');

foreach ($files as $file) {
    $class = 'App\\Models\\' . basename($file, '.php');
    if (class_exists($class)) {
        try {
            $ref = new ReflectionClass($class);
            if ($ref->isSubclassOf(\Illuminate\Database\Eloquent\Model::class) && ! $ref->isAbstract()) {
                $model = new $class;
                $table = $model->getTable();
                if (Schema::hasTable($table)) {
                    $hasTenantCol = Schema::hasColumn($table, 'tenant_id');
                    $traits = class_uses_recursive($class);
                    $hasTenantTrait = in_array(\App\Traits\BelongsToTenant::class, $traits);
                    $hasProjectTrait = in_array(\App\Traits\ProjectScoped::class, $traits);
                    
                    if ($hasTenantCol && ! $hasTenantTrait) {
                        echo "Model {$class} (table: {$table}) has tenant_id column BUT lacks BelongsToTenant trait!\n";
                    }
                }
            }
        } catch (\Throwable $e) {
            // ignore
        }
    }
}
