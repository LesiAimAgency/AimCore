<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = App\Models\Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first();
app()->instance('current_project', $project);

$controller = new App\Http\Controllers\Viettinmart\ShopController();
try {
    $res = $controller->show('viettinmart-eco', 'tom-the-pd-xien-que-cap-dong');
    echo "Res: " . get_class($res) . "\n";
    if ($res instanceof Illuminate\View\View) {
        echo "View: " . $res->getName() . "\n";
        echo "Product: " . $res->getData()['product']->name . "\n";
    }
} catch (\Throwable $e) {
    echo "Exception: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
}
