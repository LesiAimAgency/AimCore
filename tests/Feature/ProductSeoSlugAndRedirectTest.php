<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use Tests\TestCase;

class ProductSeoSlugAndRedirectTest extends TestCase
{
    use \Illuminate\Foundation\Testing\RefreshDatabase;

    protected Project $project;
    protected Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->project = Project::firstOrCreate(
            ['code' => 'viettinmart-eco'],
            ['name' => 'Viettinmart Eco', 'domain' => 'viettinmart-eco.aimagency.vn', 'status' => 'active']
        );

        session(['current_project' => $this->project]);
        app()->instance('current_project', $this->project);

        $this->product = Product::firstOrCreate(
            ['slug' => 'tom-the-pd-xien-que-cap-dong'],
            [
                'project_id' => $this->project->id,
                'name' => 'Tôm thẻ PD xiên que cấp đông',
                'price' => 120000,
                'status' => 'active',
            ]
        );
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
}
