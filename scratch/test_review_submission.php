<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Project;
use Illuminate\Http\Request;

$project = Project::where('code', 'viettinmart-eco')->first();
if (!$project) {
    $project = Project::first();
}
$product = Product::where('status', 'active')->first();
if (!$product) {
    $product = Product::first();
}

echo "Testing review submission for Project: {$project->code} (ID: {$project->id}), Product: {$product->name} (ID: {$product->id})" . PHP_EOL;

// Mock request
$data = [
    'product_id' => $product->id,
    'rating' => 5,
    'customer_name' => 'Test Reviewer',
    'customer_email' => 'reviewer@example.com',
    'comment' => 'San pham nay rat tot va chat luong tuyet voi!',
];

$request = Request::create("/{$project->code}/review/submit", 'POST', $data);
$request->headers->set('Accept', 'application/json');
$request->headers->set('X-Requested-With', 'XMLHttpRequest');
$request->attributes->set('project', $project);

session(['current_project_id' => $project->id]);
session(['current_tenant_id' => $project->tenant_id ?? 3]);

$controller = new App\Http\Controllers\Viettinmart\ReviewController();
$response = $controller->store($request);

echo "Response status: " . $response->getStatusCode() . PHP_EOL;
echo "Response content: " . $response->getContent() . PHP_EOL;

// Verify review created in database
$createdReview = ProductReview::where('product_id', $product->id)
    ->where('reviewer_email', 'reviewer@example.com')
    ->latest()
    ->first();

if ($createdReview) {
    echo "SUCCESS: ProductReview found in DB! ID: {$createdReview->id}, Status: {$createdReview->status}, Rating: {$createdReview->rating}" . PHP_EOL;
    // Clean up
    $createdReview->delete();
    echo "Cleaned up test review." . PHP_EOL;
} else {
    echo "ERROR: ProductReview was NOT found in DB!" . PHP_EOL;
}
