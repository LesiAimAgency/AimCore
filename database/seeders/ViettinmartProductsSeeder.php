<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Taxonomy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ViettinmartProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        $projectId = $projectId ?? 10;
        $tenantId = $tenantId ?? 3;

        $dataPath = database_path('seeders/data/viettinmart');
        if (! File::isDirectory($dataPath)) {
            $this->command?->error("Data directory not found at {$dataPath}");

            return;
        }

        $this->command?->info("Seeding authentic Viettinmart catalog for Project ID: {$projectId}, Tenant ID: {$tenantId}...");

        // 1. Categories / Taxonomies
        $taxFile = $dataPath.'/p10_taxonomies.json';
        $taxCategoryMap = []; // old_id => new_id
        if (File::exists($taxFile) && Schema::hasTable('taxonomies')) {
            $taxonomies = json_decode(File::get($taxFile), true) ?? [];
            foreach ($taxonomies as $t) {
                $oldId = $t['id'];
                unset($t['id']);
                $t['project_id'] = $projectId;
                $t['tenant_id'] = $tenantId;

                $tax = Taxonomy::withoutGlobalScopes()
                    ->where('slug', $t['slug'])
                    ->first();

                if (! $tax) {
                    $tax = Taxonomy::create($t);
                } else {
                    $tax->update($t);
                }
                $taxCategoryMap[$oldId] = $tax->id;
            }
            $this->command?->info('✓ Seeded '.count($taxCategoryMap).' taxonomies.');
        }

        // 1B. Product Categories
        $catFile = $dataPath.'/p10_product_categories.json';
        $prodCatMap = []; // old_id => new_id
        if (File::exists($catFile) && Schema::hasTable('product_categories')) {
            $categories = json_decode(File::get($catFile), true) ?? [];
            foreach ($categories as $c) {
                $oldId = $c['id'];
                unset($c['id']);
                $c['project_id'] = $projectId;
                $c['tenant_id'] = $tenantId;

                $cat = ProductCategory::withoutGlobalScopes()
                    ->where('slug', $c['slug'])
                    ->first();

                if (! $cat) {
                    $cat = ProductCategory::create($c);
                } else {
                    $cat->update($c);
                }
                $prodCatMap[$oldId] = $cat->id;
            }
            $this->command?->info('✓ Seeded '.count($prodCatMap).' product categories.');
        }

        // 2. Products Enhanced
        $prodFile = $dataPath.'/p10_products.json';
        $prodIdMap = []; // old_id => new_id
        if (File::exists($prodFile) && Schema::hasTable('products_enhanced')) {
            $products = json_decode(File::get($prodFile), true) ?? [];
            foreach ($products as $p) {
                $oldId = $p['id'];
                unset($p['id']);
                $p['project_id'] = $projectId;
                $p['tenant_id'] = $tenantId;

                if (isset($p['product_category_id']) && isset($prodCatMap[$p['product_category_id']])) {
                    $p['product_category_id'] = $prodCatMap[$p['product_category_id']];
                }

                $prod = Product::withoutGlobalScopes()
                    ->where('slug', $p['slug'])
                    ->first();

                if (! $prod) {
                    $prod = Product::create($p);
                } else {
                    $prod->update($p);
                }
                $prodIdMap[$oldId] = $prod->id;
            }
            $this->command?->info('✓ Seeded '.count($prodIdMap).' products in products_enhanced.');
        }

        // 3. Posts (Products, Blog posts, Pages)
        $postsFile = $dataPath.'/p10_posts.json';
        $postIdMap = []; // old_id => new_id
        if (File::exists($postsFile) && Schema::hasTable('posts')) {
            $posts = json_decode(File::get($postsFile), true) ?? [];
            foreach ($posts as $p) {
                $oldId = $p['id'];
                unset($p['id']);
                $p['project_id'] = $projectId;
                $p['tenant_id'] = $tenantId;

                // Handle json fields - decode to array so Eloquent array cast handles it cleanly
                if (isset($p['seo_data']) && is_string($p['seo_data'])) {
                    $p['seo_data'] = json_decode($p['seo_data'], true);
                }
                if (isset($p['meta_data']) && is_string($p['meta_data'])) {
                    $p['meta_data'] = json_decode($p['meta_data'], true);
                }

                $post = Post::withoutGlobalScopes()
                    ->where('slug', $p['slug'])
                    ->first();

                if (! $post) {
                    $post = Post::create($p);
                } else {
                    $post->update($p);
                }
                $postIdMap[$oldId] = $post->id;
            }
            $this->command?->info('✓ Seeded '.count($postIdMap).' posts (products, articles, pages).');
        }

        // 4. Term Relationships (Post <-> Taxonomy)
        $termRelFile = $dataPath.'/p10_post_taxonomies.json';
        if (File::exists($termRelFile) && Schema::hasTable('term_relationships')) {
            $relations = json_decode(File::get($termRelFile), true) ?? [];
            foreach ($relations as $rel) {
                $oldPostId = $rel['object_id'];
                $oldTaxId = $rel['term_taxonomy_id'];

                if (isset($postIdMap[$oldPostId]) && isset($taxCategoryMap[$oldTaxId])) {
                    DB::table('term_relationships')->updateOrInsert(
                        [
                            'object_id' => $postIdMap[$oldPostId],
                            'term_taxonomy_id' => $taxCategoryMap[$oldTaxId],
                        ],
                        [
                            'order' => $rel['order'] ?? 0,
                        ]
                    );
                }
            }
            $this->command?->info('✓ Seeded post-taxonomy relationships.');
        }

        // 5. Product Category Pivot (Product <-> Category)
        $pivotFile = $dataPath.'/p10_product_category_product.json';
        if (File::exists($pivotFile) && Schema::hasTable('product_category_product')) {
            $pivots = json_decode(File::get($pivotFile), true) ?? [];
            foreach ($pivots as $piv) {
                $oldProdId = $piv['product_id'];
                $oldCatId = $piv['product_category_id'];

                if (isset($prodIdMap[$oldProdId]) && isset($prodCatMap[$oldCatId])) {
                    DB::table('product_category_product')->updateOrInsert(
                        [
                            'product_id' => $prodIdMap[$oldProdId],
                            'product_category_id' => $prodCatMap[$oldCatId],
                        ]
                    );
                }
            }
            $this->command?->info('✓ Seeded product-category pivot relations.');
        }

        $this->command?->info("=== Hoàn tất Seeder dữ liệu thực tế Viettinmart cho dự án {$projectId}! ===");
    }
}
