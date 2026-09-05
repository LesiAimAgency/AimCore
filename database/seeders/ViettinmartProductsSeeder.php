<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Taxonomy;
use Illuminate\Database\Seeder;
use PDO;

class ViettinmartProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        $projectId = $projectId ?? 10;
        $tenantId = $tenantId ?? 3;

        $this->command->info("Seeding Viettinmart products for project {$projectId}...");

        try {
            $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=viettinmartdemo_demo1', 'root', 'root');
        } catch (\Exception $e) {
            $this->command->error('Could not connect to viettinmartdemo_demo1: '.$e->getMessage());

            return;
        }

        // 1. Categories
        $stmtCats = $pdo->query('SELECT * FROM categories ORDER BY id ASC');
        $sourceCats = $stmtCats->fetchAll(PDO::FETCH_ASSOC);

        $taxCategoryMap = [];
        $prodCategoryMap = [];

        foreach ($sourceCats as $cat) {
            // A. Taxonomies (for Post / Admin)
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
            } else {
                $tax->update([
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => $cat['name'],
                    'taxonomy' => 'product_cat',
                    'status' => 'published',
                    'order' => (int) $cat['id'],
                ]);
            }
            $taxCategoryMap[$cat['id']] = $tax->id;

            // B. ProductCategory (for Product / Widgets)
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
                    'is_active' => 1,
                    'sort_order' => (int) $cat['id'],
                ]);
            } else {
                $prodCat->update([
                    'name' => $cat['name'],
                    'is_active' => 1,
                    'sort_order' => (int) $cat['id'],
                ]);
            }
            $prodCategoryMap[$cat['id']] = $prodCat->id;
        }

        // 2. Category links
        $stmtCp = $pdo->query('SELECT product_id, category_id FROM category_product');
        $cpRows = $stmtCp->fetchAll(PDO::FETCH_ASSOC);
        $prodCatLinks = [];
        foreach ($cpRows as $cp) {
            $prodCatLinks[$cp['product_id']][] = (int) $cp['category_id'];
        }

        // 3. Products
        $stmtProds = $pdo->query('SELECT * FROM products ORDER BY id ASC');
        $sourceProds = $stmtProds->fetchAll(PDO::FETCH_ASSOC);

        $syncedPosts = 0;
        $syncedProducts = 0;

        foreach ($sourceProds as $p) {
            $pPrice = (float) $p['price'];
            $pCompare = ! empty($p['compare_price']) ? (float) $p['compare_price'] : 0;

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

            $gallery = [];
            if (! empty($p['images'])) {
                $decoded = is_string($p['images']) ? json_decode($p['images'], true) : $p['images'];
                if (is_array($decoded)) {
                    foreach ($decoded as $gImg) {
                        $gallery[] = '/storage/'.ltrim($gImg, '/');
                    }
                }
            }

            // Sync to posts
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

            // Sync to products_enhanced
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

        $this->command->info("Synced {$syncedPosts} products to posts and {$syncedProducts} products to products_enhanced.");
    }
}
