<?php

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();

echo "=== SYNCING ALL PRODUCTS FOR PROJECT: {$project->code} ===\n";

$posts = Post::where('post_type', 'product')
    ->where('project_id', $project->id)
    ->with('taxonomies')
    ->get();

echo 'Found '.$posts->count()." products in posts table.\n";

$synced = 0;
foreach ($posts as $post) {
    $metaData = is_string($post->meta_data) ? json_decode($post->meta_data, true) : ($post->meta_data ?? []);

    // Find matching ProductCategory
    $tax = $post->taxonomies->first();
    $prodCatId = null;
    if ($tax) {
        $prodCat = ProductCategory::where('slug', $tax->slug)->first();
        $prodCatId = $prodCat?->id;
    }

    $product = Product::withoutGlobalScopes()->updateOrCreate(
        ['slug' => $post->slug],
        [
            'project_id' => $post->project_id,
            'tenant_id' => $post->tenant_id,
            'name' => $post->title,
            'short_description' => $post->excerpt,
            'description' => $post->content,
            'featured_image' => $post->featured_image,
            'sku' => $metaData['sku'] ?? null,
            'price' => $metaData['price'] ?? 0,
            'sale_price' => ! empty($metaData['sale_price']) ? (float) $metaData['sale_price'] : null,
            'has_price' => 1,
            'stock_quantity' => $metaData['stock_quantity'] ?? 999,
            'manage_stock' => $metaData['manage_stock'] ?? true,
            'stock_status' => 'in_stock',
            'product_category_id' => $prodCatId,
            'status' => $post->status ?: 'published',
            'is_featured' => $metaData['is_featured'] ?? false,
        ]
    );
    $synced++;
}

echo "Successfully synced $synced products to products_enhanced!\n";
