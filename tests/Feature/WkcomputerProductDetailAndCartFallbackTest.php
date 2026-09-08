<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WkcomputerProductDetailAndCartFallbackTest extends TestCase
{
    use RefreshDatabase;

    protected Project $wkProject;

    protected WkProduct $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->wkProject = Project::create([
            'name' => 'WKComputer Gaming & PC',
            'code' => 'wkcomputer',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->product = WkProduct::create([
            'project_id' => $this->wkProject->id,
            'tenant_id' => $this->wkProject->id,
            'name' => 'CPU Test Ryzen 7 7800X3D',
            'slug' => 'cpu-test-ryzen-7-7800x3d',
            'price' => 9500000,
            'sku' => 'WKC-TEST-7800X3D',
            'status' => 'published',
            'stock_quantity' => 10,
            'description' => '<p>Mô tả chi tiết CPU AMD Ryzen 7 7800X3D chất lượng cao.</p><h2>Thông số kỹ thuật:</h2><div class="scroll-table"><table id="tblGeneralAttribute"><tbody><tr><td>Số nhân</td><td>8</td></tr></tbody></table></div><p>Đánh giá hiệu năng chi tiết...</p>',
        ]);
    }

    public function test_can_add_to_cart_via_root_fallback_route(): void
    {
        $response = $this->postJson('/gio-hang/them', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_product_detail_page_renders_cleanly_and_separates_specs(): void
    {
        $response = $this->get('/wkcomputer/'.$this->product->slug);
        $response->assertStatus(200);

        $content = $response->getContent();

        // Must not contain r<br> artifacts
        $this->assertStringNotContainsString('r<br>', $content);
        $this->assertStringNotContainsString('r<br/>', $content);

        // Must show tabs
        $this->assertStringContainsString('Mô tả sản phẩm', $content);
        $this->assertStringContainsString('Thông số kỹ thuật', $content);

        // Specs table is rendered in specs tab
        $this->assertStringContainsString('id="tblGeneralAttribute"', $content);
    }
}
