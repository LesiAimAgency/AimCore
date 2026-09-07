<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Project;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductReviewTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        Tenant::forceCreate([
            'id' => 3,
            'name' => 'VietTinMart',
            'code' => 'viettinmart-eco',
            'domain' => 'viettinmart.local',
            'database_name' => 'fukkatsu_Animcore',
        ]);

        $this->project = Project::factory()->create([
            'id' => 10,
            'tenant_id' => 3,
            'code' => 'viettinmart-eco',
        ]);

        session([
            'current_tenant_id' => 3,
            'current_project_id' => 10,
            'current_project' => ['code' => 'viettinmart-eco'],
        ]);
        app()->instance('current_tenant_id', 3);
        app()->instance('current_project_id', 10);

        $this->product = Product::forceCreate([
            'tenant_id' => 3,
            'project_id' => 10,
            'name' => 'Sản phẩm Test',
            'slug' => 'san-pham-test',
            'status' => 'active',
            'price' => 100000,
        ]);
    }

    public function test_review_submit_route_is_scoped_to_project(): void
    {
        $url = locale_route('review.submit');
        $this->assertStringContainsString("/{$this->project->code}/review/submit", $url);
        $this->assertStringNotContainsString('/wkcomputer/review/submit', $url);
    }

    public function test_submit_review_validation_failure(): void
    {
        $response = $this->postJson("/{$this->project->code}/review/submit", []);

        $response->assertStatus(422);
        $response->assertJson(['success' => false]);
    }

    public function test_submit_review_successfully_creates_product_review(): void
    {
        $testEmail = 'test_review_'.uniqid().'@example.com';
        $payload = [
            'product_id' => $this->product->id,
            'rating' => 5,
            'customer_name' => 'Nguyễn Văn Test',
            'customer_email' => $testEmail,
            'comment' => 'Sản phẩm tuyệt vời, giao hàng nhanh chóng!',
        ];

        $response = $this->postJson("/{$this->project->code}/review/submit", $payload);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
        ]);

        $this->assertDatabaseHas('product_reviews', [
            'product_id' => $this->product->id,
            'reviewer_email' => $testEmail,
            'rating' => 5,
        ]);
    }
}
