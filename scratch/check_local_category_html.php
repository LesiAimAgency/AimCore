<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/viettinmart-eco/danh-muc/hang-ready-to-cook', 'GET');
$response = $kernel->handle($request);
$content = $response->getContent();

// Check if products exist in HTML
echo "Status: " . $response->getStatusCode() . PHP_EOL;
echo "Contains 'single-shopping-card-one': " . (str_contains($content, 'single-shopping-card-one') ? 'YES' : 'NO') . PHP_EOL;

// Find product titles
preg_match_all('/class="title"[^>]*><a[^>]*>(.*?)<\/a>/i', $content, $matches);
if (!empty($matches[1])) {
    echo "Found " . count($matches[1]) . " products:" . PHP_EOL;
    foreach ($matches[1] as $title) {
        echo " - " . trim(strip_tags($title)) . PHP_EOL;
    }
} else {
    echo "No product titles found with regex, checking raw content..." . PHP_EOL;
    if (str_contains($content, 'Không tìm thấy sản phẩm')) {
        echo "Found 'Không tìm thấy sản phẩm'" . PHP_EOL;
    }
}
