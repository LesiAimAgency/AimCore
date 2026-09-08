<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Taxonomy;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class WkcomputerProductsSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'wkcomputer')->first();
            if (! $project) {
                [$project, $tenant] = (new WkcomputerMasterSeeder)->ensureProjectAndTenant($projectId, $tenantId);
            }
            $projectId = $project->id;
            $tenantId = $tenantId ?? $project->tenant_id;
        }

        if (! $tenantId || ! Tenant::where('id', $tenantId)->exists()) {
            $tenant = Tenant::where('code', 'wkcomputer')->first() ?? Tenant::first();
            $tenantId = $tenant ? $tenant->id : null;
        }

        $dataPath = database_path('seeders/data/wkcomputer');
        if (! File::isDirectory($dataPath)) {
            $this->command?->error("Data directory not found at {$dataPath}");

            return;
        }

        $this->command?->info("Seeding WKComputer catalog for Project ID: {$projectId}, Tenant ID: {$tenantId}...");

        // 1. Categories
        $catFile = $dataPath.'/wk_categories.json';
        $catMap = []; // old_id => new_id
        if (File::exists($catFile) && Schema::hasTable('product_categories')) {
            $categories = json_decode(File::get($catFile), true) ?? [];
            foreach ($categories as $c) {
                $oldId = $c['id'];
                $cleanCat = [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => $c['name'],
                    'slug' => $c['slug'],
                    'description' => $c['description'] ?? null,
                    'image' => $c['image'] ?? null,
                    'sort_order' => (int) ($c['sort_order'] ?? 0),
                    'is_active' => (bool) ($c['is_active'] ?? true),
                    'meta_title' => $c['meta_title'] ?? null,
                    'meta_description' => $c['meta_description'] ?? null,
                ];

                $cat = ProductCategory::withoutGlobalScopes()
                    ->where('project_id', $projectId)
                    ->where('slug', $c['slug'])
                    ->first();

                if (! $cat) {
                    $cat = ProductCategory::create($cleanCat);
                } else {
                    $cat->update($cleanCat);
                }
                $catMap[$oldId] = $cat->id;
            }

            // Update parent_id hierarchy
            foreach ($categories as $c) {
                if (! empty($c['parent_id']) && isset($catMap[$c['parent_id']]) && isset($catMap[$c['id']])) {
                    ProductCategory::withoutGlobalScopes()
                        ->where('id', $catMap[$c['id']])
                        ->update(['parent_id' => $catMap[$c['parent_id']]]);
                }
            }
            $this->command?->info('✓ Seeded '.count($catMap).' product categories.');
        }

        // 2. Products
        $prodFile = $dataPath.'/wk_products.json';
        $prodIdMap = []; // old_id => new_id
        if (File::exists($prodFile) && Schema::hasTable('products_enhanced')) {
            $products = json_decode(File::get($prodFile), true) ?? [];
            $count = 0;
            $usedSkus = [];

            foreach ($products as $p) {
                $oldId = $p['id'];

                $catId = null;
                if (! empty($p['product_category_id']) && isset($catMap[$p['product_category_id']])) {
                    $catId = $catMap[$p['product_category_id']];
                } elseif (! empty($p['category_id']) && isset($catMap[$p['category_id']])) {
                    $catId = $catMap[$p['category_id']];
                }

                $rawPrice = (float) ($p['price'] ?? $p['regular_price'] ?? 0);
                $rawSalePrice = isset($p['sale_price']) && (float) $p['sale_price'] > 0 ? (float) $p['sale_price'] : null;

                // Handle images
                $featuredImage = $p['featured_image'] ?? $p['image'] ?? null;
                if ($featuredImage && ! str_starts_with($featuredImage, 'http') && ! str_starts_with($featuredImage, '/media-files/')) {
                    $featuredImage = '/media-files/'.ltrim(preg_replace('#^/?(storage/|media-files/)?#', '', $featuredImage), '/');
                }
                $gallery = $p['gallery'] ?? $p['images'] ?? [];
                if (is_string($gallery)) {
                    $gallery = json_decode($gallery, true) ?? [];
                }
                if (is_array($gallery)) {
                    $gallery = array_map(function ($g) {
                        if ($g && ! str_starts_with($g, 'http') && ! str_starts_with($g, '/media-files/')) {
                            return '/media-files/'.ltrim(preg_replace('#^/?(storage/|media-files/)?#', '', $g), '/');
                        }

                        return $g;
                    }, $gallery);
                }

                $additionalInfo = $p['additional_info'] ?? [];
                if (is_string($additionalInfo)) {
                    $additionalInfo = json_decode($additionalInfo, true) ?? [];
                }

                $rawSku = trim((string) ($p['sku'] ?? ''));
                $sku = ! empty($rawSku) ? $rawSku : ('WKC-'.$oldId);
                // Guarantee uniqueness
                if (isset($usedSkus[$sku])) {
                    $sku = $sku.'-'.$oldId;
                }
                $usedSkus[$sku] = true;

                $cleanProduct = [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => $p['name'],
                    'slug' => $p['slug'],
                    'short_description' => $p['short_description'] ?? null,
                    'description' => $p['description'] ?? '',
                    'sku' => $sku,
                    'price' => $rawPrice,
                    'sale_price' => $rawSalePrice,
                    'has_price' => $rawPrice > 0,
                    'stock_quantity' => (int) ($p['stock_quantity'] ?? $p['stock'] ?? 99),
                    'manage_stock' => true,
                    'stock_status' => ((int) ($p['stock_quantity'] ?? $p['stock'] ?? 99)) > 0 ? 'in_stock' : 'out_of_stock',
                    'featured_image' => $featuredImage,
                    'gallery' => $gallery,
                    'product_category_id' => $catId,
                    'status' => 'published',
                    'is_featured' => (bool) ($p['is_featured'] ?? false),
                    'settings' => ['additional_info' => $additionalInfo],
                    'views' => (int) ($p['views'] ?? 0),
                    'rating_average' => (float) ($p['rating_average'] ?? $p['rating'] ?? 5.0),
                    'rating_count' => (int) ($p['rating_count'] ?? 1),
                    'product_type' => 'simple',
                ];

                $prod = Product::withoutGlobalScopes()
                    ->where('project_id', $projectId)
                    ->where('slug', $p['slug'])
                    ->first();

                if (! $prod) {
                    $prod = Product::create($cleanProduct);
                } else {
                    $prod->update($cleanProduct);
                }

                $prodIdMap[$oldId] = $prod->id;
                $count++;
            }
            $this->command?->info("✓ Seeded {$count} products in products_enhanced.");
        }

        // 3. Category - Product Pivot
        $pivotFile = $dataPath.'/wk_category_product.json';
        if (File::exists($pivotFile) && Schema::hasTable('product_category_product')) {
            $pivots = json_decode(File::get($pivotFile), true) ?? [];
            $pivotRows = [];
            $now = now();

            foreach ($pivots as $pv) {
                $oldProdId = $pv['product_id'];
                $oldCatId = $pv['category_id'];

                if (isset($prodIdMap[$oldProdId]) && isset($catMap[$oldCatId])) {
                    $pivotRows[] = [
                        'product_id' => $prodIdMap[$oldProdId],
                        'product_category_id' => $catMap[$oldCatId],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }

            if (! empty($pivotRows)) {
                foreach (array_chunk($pivotRows, 500) as $chunk) {
                    DB::table('product_category_product')->insertOrIgnore($chunk);
                }
                $this->command?->info('✓ Seeded '.count($pivotRows).' category-product relationships.');
            }
        }

        // 4. Posts (News / Tech Articles)
        $postsFile = $dataPath.'/wk_posts.json';
        if (File::exists($postsFile) && Schema::hasTable('posts')) {
            $posts = json_decode(File::get($postsFile), true) ?? [];
            $postCount = 0;
            foreach ($posts as $p) {
                $cleanPost = [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'title' => $p['title'],
                    'slug' => $p['slug'],
                    'excerpt' => $p['excerpt'] ?? $p['short_description'] ?? null,
                    'content' => $p['content'] ?? '',
                    'featured_image' => $p['featured_image'] ?? $p['image'] ?? null,
                    'post_type' => 'post',
                    'status' => 'published',
                    'published_at' => $p['published_at'] ?? now(),
                    'views' => (int) ($p['views'] ?? 0),
                ];

                $post = Post::withoutGlobalScopes()
                    ->where('project_id', $projectId)
                    ->where('slug', $p['slug'])
                    ->first();

                if (! $post) {
                    Post::create($cleanPost);
                } else {
                    $post->update($cleanPost);
                }
                $postCount++;
            }
            $this->command?->info("✓ Seeded {$postCount} blog posts.");
        }

        // 5. Pages
        $pagesFile = $dataPath.'/wk_pages.json';
        if (File::exists($pagesFile) && Schema::hasTable('posts')) {
            $pages = json_decode(File::get($pagesFile), true) ?? [];
            $pageCount = 0;
            foreach ($pages as $pg) {
                $cleanPg = [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'title' => $pg['title'],
                    'slug' => $pg['slug'],
                    'excerpt' => $pg['excerpt'] ?? null,
                    'content' => $pg['content'] ?? '',
                    'post_type' => 'page',
                    'status' => 'published',
                    'published_at' => now(),
                ];

                $page = Post::withoutGlobalScopes()
                    ->where('project_id', $projectId)
                    ->where('slug', $pg['slug'])
                    ->first();

                if (! $page) {
                    Post::create($cleanPg);
                } else {
                    $page->update($cleanPg);
                }
                $pageCount++;
            }
            $this->command?->info("✓ Seeded {$pageCount} CMS static pages.");
        }

        // 6. Sync into Taxonomies & Posts for CMS Admin Parity
        if (Schema::hasTable('taxonomies') && Schema::hasTable('product_categories')) {
            $categories = ProductCategory::withoutGlobalScopes()->where('project_id', $projectId)->get();
            $taxMap = [];
            foreach ($categories as $cat) {
                $tax = Taxonomy::withoutGlobalScopes()
                    ->where('project_id', $projectId)
                    ->where('taxonomy', 'product_cat')
                    ->where('slug', $cat->slug)
                    ->first();

                $taxData = [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => $cat->name,
                    'slug' => $cat->slug,
                    'taxonomy' => 'product_cat',
                    'description' => $cat->description,
                    'order' => $cat->sort_order ?? 0,
                    'status' => $cat->is_active ? 'active' : 'inactive',
                    'meta_data' => [
                        'image' => $cat->image,
                        'meta_title' => $cat->meta_title,
                        'meta_description' => $cat->meta_description,
                    ],
                ];

                if (! $tax) {
                    $tax = Taxonomy::create($taxData);
                } else {
                    $tax->update($taxData);
                }
                $taxMap[$cat->id] = $tax->id;
            }

            foreach ($categories as $cat) {
                if ($cat->parent_id && isset($taxMap[$cat->parent_id]) && isset($taxMap[$cat->id])) {
                    Taxonomy::withoutGlobalScopes()
                        ->where('id', $taxMap[$cat->id])
                        ->update(['parent_id' => $taxMap[$cat->parent_id]]);
                }
            }

            $this->command?->info('✓ Synced '.count($taxMap).' categories to taxonomies.');

            if (Schema::hasTable('products_enhanced') && Schema::hasTable('posts')) {
                $products = Product::withoutGlobalScopes()->where('project_id', $projectId)->get();
                $termRelInserts = [];
                $postCount = 0;

                foreach ($products as $prod) {
                    $metaData = [
                        'sku' => $prod->sku,
                        'price' => (float) $prod->price,
                        'sale_price' => $prod->sale_price ? (float) $prod->sale_price : null,
                        'stock_quantity' => $prod->stock_quantity ?? 999,
                        'manage_stock' => (bool) ($prod->manage_stock ?? true),
                        'is_featured' => (bool) ($prod->is_featured ?? false),
                        'gallery' => is_array($prod->gallery) ? $prod->gallery : (json_decode($prod->gallery ?? '[]', true) ?: []),
                        'product_type' => 'simple',
                        'brands' => $prod->brand_id ? [$prod->brand_id] : [],
                    ];

                    $post = Post::withoutGlobalScopes()
                        ->where('project_id', $projectId)
                        ->where('post_type', 'product')
                        ->where('slug', $prod->slug)
                        ->first();

                    $postData = [
                        'project_id' => $projectId,
                        'tenant_id' => $tenantId,
                        'title' => $prod->name,
                        'slug' => $prod->slug,
                        'excerpt' => $prod->short_description,
                        'content' => $prod->description,
                        'featured_image' => $prod->getRawOriginal('featured_image') ?: $prod->featured_image,
                        'post_type' => 'product',
                        'status' => $prod->status ?: 'published',
                        'meta_title' => $prod->meta_title,
                        'meta_description' => $prod->meta_description,
                        'seo_data' => ['meta_title' => $prod->meta_title, 'meta_description' => $prod->meta_description],
                        'meta_data' => $metaData,
                    ];

                    if (! $post) {
                        $post = Post::create($postData);
                    } else {
                        $post->update($postData);
                    }

                    if ($prod->product_category_id && isset($taxMap[$prod->product_category_id])) {
                        $termRelInserts[] = [
                            'object_id' => $post->id,
                            'term_taxonomy_id' => $taxMap[$prod->product_category_id],
                            'order' => 0,
                        ];
                    }
                    $postCount++;
                }

                if (! empty($termRelInserts) && Schema::hasTable('term_relationships')) {
                    $postIds = array_column($termRelInserts, 'object_id');
                    DB::table('term_relationships')->whereIn('object_id', $postIds)->delete();
                    foreach (array_chunk($termRelInserts, 500) as $chunk) {
                        DB::table('term_relationships')->insert($chunk);
                    }
                }

                $this->command?->info("✓ Synced {$postCount} products to CMS Admin posts.");
            }
        }
    }
}
