<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = App\Models\Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first();
app()->instance('current_project', $project);

echo "Testing 1-level product url resolution through PageController::show():\n";
$pageController = new App\Http\Controllers\Frontend\PageController();
$res = $pageController->show('viettinmart-eco', 'tom-the-pd-xien-que-cap-dong');

echo "Result class: " . get_class($res) . "\n";
if ($res instanceof Illuminate\View\View) {
    echo "View: " . $res->getName() . "\n";
    echo "Product Name: " . $res->getData()['product']->name . "\n";
}
