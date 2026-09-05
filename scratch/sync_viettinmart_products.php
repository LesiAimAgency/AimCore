<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Taxonomy;
use Illuminate\Contracts\Console\Kernel;

echo "=== START SYNC VIETTINMART PRODUCTS ===\n";

$projectId = 10;
$tenantId = 3;

// Connect to source database viettinmartdemo_demo1
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=viettinmartdemo_demo1', 'root', 'root');
} catch (Exception $e) {
    exit('Error connecting to source db: '.$e->getMessage()."\n");
}

// 1. Fetch categories from source
$stmtCats = $pdo->query('SELECT * FROM categories ORDER BY id ASC');
$sourceCats = $stmtCats->fetchAll(PDO::FETCH_ASSOC);
echo 'Source categories found: '.count($sourceCats)."\n";

$taxCategoryMap = [];
$prodCategoryMap = [];

foreach ($sourceCats as $cat) {
    // 1A. Sync to taxonomies (used by Post & Admin/ProductController & CategoryController)
    $tax = Taxonomy::withoutGlobalScopes()->where('slug', $cat['slug'])->first();

    if (! $tax) {
        $tax = Taxonomy::create([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'name' => $cat['name'],
            'slug' => $cat['slug'],
            'taxonomy' => 'product_cat',
            'status' => 'published',
            'order' => (int) $cat['id'],
        ]);
        echo "Created taxonomy: {$cat['name']} (ID: {$tax->id})\n";
    } else {
        $tax->update([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'name' => $cat['name'],
            'taxonomy' => 'product_cat',
            'status' => 'published',
            'order' => (int) $cat['id'],
        ]);
        echo "Updated taxonomy to product_cat: {$cat['name']} (ID: {$tax->id})\n";
    }
    $taxCategoryMap[$cat['id']] = $tax->id;

    // 1B. Sync to product_categories (used by Product & Widgets)
    $prodCat = ProductCategory::withoutGlobalScopes()->where([
        'project_id' => $projectId,
        'slug' => $cat['slug'],
    ])->first();

    if (! $prodCat) {
        $prodCat = ProductCategory::create([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'name' => $cat['name'],
            'slug' => $cat['slug'],
            'status' => 'published',
            'sort_order' => (int) $cat['id'],
        ]);
        echo "Created product_category: {$cat['name']} (ID: {$prodCat->id})\n";
    } else {
        $prodCat->update([
            'name' => $cat['name'],
            'status' => 'published',
            'sort_order' => (int) $cat['id'],
        ]);
        echo "Updated product_category: {$cat['name']} (ID: {$prodCat->id})\n";
    }
    $prodCategoryMap[$cat['id']] = $prodCat->id;
}

// 2. Fetch category_product relationships from source
$stmtCp = $pdo->query('SELECT product_id, category_id FROM category_product');
$cpRows = $stmtCp->fetchAll(PDO::FETCH_ASSOC);
$prodCatLinks = [];
foreach ($cpRows as $cp) {
    $prodCatLinks[$cp['product_id']][] = (int) $cp['category_id'];
}

// 3. Fetch products from source
$stmtProds = $pdo->query('SELECT * FROM products ORDER BY id ASC');
$sourceProds = $stmtProds->fetchAll(PDO::FETCH_ASSOC);
echo 'Source products found: '.count($sourceProds)."\n";

$syncedPosts = 0;
$syncedProducts = 0;

foreach ($sourceProds as $p) {
    $pPrice = (float) $p['price'];
    $pCompare = ! empty($p['compare_price']) ? (float) $p['compare_price'] : 0;

    // In e-commerce, compare_price is original (higher), price is discounted selling price
    if ($pCompare > $pPrice) {
        $regularPrice = $pCompare;
        $salePrice = $pPrice;
    } else {
        $regularPrice = $pPrice;
        $salePrice = null;
    }

    $imgPath = '/storage/'.ltrim($p['image'], '/');
    $sku = ! empty($p['sku']) ? $p['sku'] : 'VTM-'.str_pad($p['id'], 4, '0', STR_PAD_LEFT);
    $catIds = $prodCatLinks[$p['id']] ?? [];

    // Parse gallery
    $gallery = [];
    if (! empty($p['images'])) {
        $decoded = is_string($p['images']) ? json_decode($p['images'], true) : $p['images'];
        if (is_array($decoded)) {
            foreach ($decoded as $gImg) {
                $gallery[] = '/storage/'.ltrim($gImg, '/');
            }
        }
    }

    // 3A. Update or create in posts table (powers /admin/products)
    $metaData = [
        'sku' => $sku,
        'price' => $regularPrice,
        'sale_price' => $salePrice,
        'product_type' => 'simple',
        'stock_quantity' => (int) ($p['stock'] ?: 999),
        'manage_stock' => true,
        'stock_status' => 'in_stock',
        'is_featured' => (bool) $p['is_featured'],
        'gallery' => $gallery,
    ];

    $post = Post::withoutGlobalScopes()->where('slug', $p['slug'])->first();

    if (! $post) {
        $post = Post::create([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'title' => $p['name'],
            'slug' => $p['slug'],
            'excerpt' => $p['short_description'],
            'content' => $p['description'],
            'featured_image' => $imgPath,
            'post_type' => 'product',
            'status' => 'published',
            'meta_title' => $p['meta_title'] ?? $p['name'],
            'meta_description' => $p['meta_description'] ?? null,
            'meta_data' => $metaData,
            'published_at' => $p['created_at'] ?? now(),
            'author_id' => 41,
        ]);
    } else {
        $post->update([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'title' => $p['name'],
            'excerpt' => $p['short_description'],
            'content' => $p['description'],
            'featured_image' => $imgPath,
            'post_type' => 'product',
            'status' => 'published',
            'meta_title' => $p['meta_title'] ?? $p['name'],
            'meta_description' => $p['meta_description'] ?? null,
            'meta_data' => $metaData,
        ]);
    }

    // Sync taxonomy relationships
    $targetTaxIds = [];
    foreach ($catIds as $cId) {
        if (isset($taxCategoryMap[$cId])) {
            $targetTaxIds[] = $taxCategoryMap[$cId];
        }
    }
    if (! empty($targetTaxIds)) {
        $post->taxonomies()->sync($targetTaxIds);
    }
    $syncedPosts++;

    // 3B. Update or create in products_enhanced table (powers Widgets & Shop)
    $firstCatId = $catIds[0] ?? null;
    $targetProdCatId = $firstCatId && isset($prodCategoryMap[$firstCatId]) ? $prodCategoryMap[$firstCatId] : null;

    $prod = Product::withoutGlobalScopes()->where([
        'project_id' => $projectId,
        'slug' => $p['slug'],
    ])->first();

    if (! $prod) {
        $prod = Product::create([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'name' => $p['name'],
            'slug' => $p['slug'],
            'short_description' => $p['short_description'],
            'description' => $p['description'],
            'sku' => $sku,
            'price' => $regularPrice,
            'sale_price' => $salePrice,
            'has_price' => 1,
            'stock_quantity' => (int) ($p['stock'] ?: 999),
            'manage_stock' => 1,
            'stock_status' => 'in_stock',
            'featured_image' => $imgPath,
            'gallery' => $gallery,
            'product_category_id' => $targetProdCatId,
            'status' => 'published',
            'is_featured' => (bool) $p['is_featured'],
        ]);
    } else {
        $prod->update([
            'tenant_id' => $tenantId,
            'name' => $p['name'],
            'short_description' => $p['short_description'],
            'description' => $p['description'],
            'sku' => $sku,
            'price' => $regularPrice,
            'sale_price' => $salePrice,
            'has_price' => 1,
            'stock_quantity' => (int) ($p['stock'] ?: 999),
            'manage_stock' => 1,
            'stock_status' => 'in_stock',
            'featured_image' => $imgPath,
            'gallery' => $gallery,
            'product_category_id' => $targetProdCatId,
            'status' => 'published',
            'is_featured' => (bool) $p['is_featured'],
        ]);
    }
    $syncedProducts++;
}

echo "=== SYNC COMPLETE ===\n";
echo "Synced Posts (post_type=product, project_id=10): $syncedPosts\n";
echo "Synced Products (products_enhanced, project_id=10): $syncedProducts\n";
