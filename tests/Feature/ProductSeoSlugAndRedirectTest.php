<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductSeoSlugAndRedirectTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        foreach (['sqlite', 'project'] as $connection) {
            try {
                if (! Schema::connection($connection)->hasTable('media')) {
                    Schema::connection($connection)->create('media', function ($table) {
                        $table->id();
                        $table->morphs('model');
                        $table->uuid('uuid')->nullable()->unique();
                        $table->string('collection_name');
                        $table->string('name');
                        $table->string('file_name');
                        $table->string('mime_type')->nullable();
                        $table->string('disk');
                        $table->string('conversions_disk')->nullable();
                        $table->unsignedBigInteger('size');
                        $table->json('manipulations');
                        $table->json('custom_properties');
                        $table->json('generated_conversions');
                        $table->json('responsive_images');
                        $table->unsignedInteger('order_column')->nullable()->index();
                        $table->nullableTimestamps();
                    });
                }
            } catch (\Throwable $e) {
            }
        }

        $this->project = Project::firstOrCreate(
            ['code' => 'viettinmart-eco'],
            [
                'name' => 'Viettinmart Eco',
                'domain' => 'viettinmart-eco.aimagency.vn',
                'status' => 'active',
            ]
        );

        session(['current_project' => $this->project, 'current_tenant_id' => $this->project->id]);
        app()->instance('current_project', $this->project);
        app()->instance('current_tenant_id', $this->project->id);

        $this->product = Product::firstOrCreate(
            ['slug' => 'tom-the-pd-xien-que-cap-dong'],
            [
                'project_id' => $this->project->id,
                'tenant_id' => $this->project->id,
                'name' => 'Tôm thẻ PD xiên que cấp đông',
                'price' => 120000,
                'image' => 'theme/images/grocery/01.jpg',
                'status' => 'active',
            ]
        );
        $this->product->project_id = $this->project->id;
        $this->product->tenant_id = $this->project->id;
        $this->product->status = 'active';
        $this->product->save();
    }

    public function test_locale_route_generates_one_level_product_slug()
    {
        $url = locale_route('shop.show', $this->product->slug);
        $this->assertEquals("/{$this->project->code}/{$this->product->slug}", $url);
    }

    public function test_product_model_url_accessor_generates_one_level_slug()
    {
        $this->assertEquals("/{$this->project->code}/{$this->product->slug}", $this->product->url);
    }

    public function test_clean_one_level_product_url_returns_200()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("/{$this->project->code}/{$this->product->slug}");
        $response->assertStatus(200);
    }

    public function test_legacy_san_pham_url_301_redirects_to_clean_url()
    {
        $response = $this->get("/{$this->project->code}/san-pham/{$this->product->slug}");
        $response->assertStatus(301);
        $this->assertStringEndsWith("/{$this->project->code}/{$this->product->slug}", $response->headers->get('Location'));
    }

    public function test_public_prefix_url_301_redirects_to_clean_url()
    {
        $response = $this->get("/public/{$this->project->code}/san-pham/{$this->product->slug}");
        $response->assertStatus(301);
        $this->assertStringEndsWith("/{$this->project->code}/{$this->product->slug}", $response->headers->get('Location'));
    }

    public function test_legacy_shop_san_pham_301_redirects_to_cua_hang()
    {
        $response = $this->get("/{$this->project->code}/san-pham");
        $response->assertStatus(301);
        $this->assertStringEndsWith("/{$this->project->code}/cua-hang", $response->headers->get('Location'));
    }

    public function test_category_one_level_slug_returns_200()
    {
        $category = Category::firstOrCreate(
            ['slug' => 'san-pham-tuoi-cap-dong-chua-so-che'],
            [
                'project_id' => $this->project->id,
                'tenant_id' => $this->project->id,
                'name' => 'Sản phẩm tươi cấp đông chưa sơ chế',
                'is_active' => true,
            ]
        );

        $response = $this->get("/{$this->project->code}/{$category->slug}");
        $response->assertStatus(200);
        $response->assertSee($category->name);
    }

    public function test_category_danh_muc_route_returns_200()
    {
        $category = Category::firstOrCreate(
            ['slug' => 'san-pham-da-lam-sach'],
            [
                'project_id' => $this->project->id,
                'tenant_id' => $this->project->id,
                'name' => 'Sản phẩm đã làm sạch',
                'is_active' => true,
            ]
        );

        $response = $this->get("/{$this->project->code}/danh-muc/{$category->slug}");
        $response->assertStatus(200);
        $response->assertSee($category->name);
    }
}
