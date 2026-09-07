<?php

namespace Tests\Feature;

use App\Http\Controllers\Wkcomputer\BuildPcController;
use App\Http\Controllers\Wkcomputer\CartController;
use App\Http\Controllers\Wkcomputer\CheckoutController;
use App\Http\Controllers\Wkcomputer\HomeController;
use App\Http\Controllers\Wkcomputer\ShopController;
use App\Models\Project;
use App\Models\Wkcomputer\WkCategory;
use App\Models\Wkcomputer\WkOrder;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WkcomputerIsolationTest extends TestCase
{
    use RefreshDatabase;

    protected Project $wkProject;

    protected Project $vtmProject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->wkProject = Project::create([
            'name' => 'WKComputer Gaming & PC',
            'code' => 'wkcomputer',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->vtmProject = Project::create([
            'name' => 'VietTinMart',
            'code' => 'viettinmart-eco',
            'status' => 'active',
            'project_type' => 'website',
        ]);
    }

    public function test_wkcomputer_home_page_returns_ok(): void
    {
        $response = $this->get('/wkcomputer');
        $response->assertStatus(200);
    }

    public function test_wkcomputer_shop_page_returns_ok(): void
    {
        $response = $this->get('/wkcomputer/cua-hang');
        $response->assertStatus(200);
    }

    public function test_wkcomputer_build_pc_page_returns_ok(): void
    {
        $response = $this->get('/wkcomputer/xay-dung-cau-hinh');
        $response->assertStatus(200);
    }

    public function test_wkcomputer_cart_page_returns_ok(): void
    {
        $response = $this->get('/wkcomputer/gio-hang');
        $response->assertStatus(200);
    }

    public function test_viettinmart_remains_functional_and_unaffected(): void
    {
        $response = $this->get('/viettinmart-eco');
        $response->assertStatus(200);
    }

    public function test_wkcomputer_uses_dedicated_isolated_classes(): void
    {
        $this->assertTrue(class_exists(HomeController::class));
        $this->assertTrue(class_exists(ShopController::class));
        $this->assertTrue(class_exists(BuildPcController::class));
        $this->assertTrue(class_exists(CartController::class));
        $this->assertTrue(class_exists(CheckoutController::class));
        $this->assertTrue(class_exists(WkProduct::class));
        $this->assertTrue(class_exists(WkCategory::class));
        $this->assertTrue(class_exists(WkOrder::class));
    }

    public function test_wkcomputer_hero_title_can_be_updated_dynamically_from_settings(): void
    {
        \DB::table('settings')->insert([
            'project_id' => $this->wkProject->id,
            'key' => 'wk_hero_title',
            'value' => 'SIEU SALE PC GAMING 2026',
        ]);

        $responseWk = $this->get('/wkcomputer');
        $responseWk->assertStatus(200);
        $responseWk->assertSee('SIEU SALE PC GAMING 2026');

        // Verify Viettinmart is unaffected
        $responseVtm = $this->get('/viettinmart-eco');
        $responseVtm->assertStatus(200);
        $responseVtm->assertDontSee('SIEU SALE PC GAMING 2026');
    }

    public function test_wkcomputer_showrooms_can_be_updated_dynamically_from_settings(): void
    {
        \DB::table('settings')->insert([
            'project_id' => $this->wkProject->id,
            'key' => 'showrooms',
            'value' => json_encode([
                ['title' => 'Showroom Da Nang', 'address' => '123 Nguyen Van Linh, Da Nang'],
            ]),
        ]);

        $response = $this->get('/wkcomputer');
        $response->assertStatus(200);
        $response->assertSee('Showroom Da Nang');
        $response->assertSee('123 Nguyen Van Linh, Da Nang');
    }

    public function test_wkcomputer_hero_categories_render_dynamically_from_database(): void
    {
        WkCategory::create([
            'name' => 'Custom Category Dynamic',
            'slug' => 'custom-category-dynamic',
            'parent_id' => null,
            'is_active' => true,
            'project_id' => $this->wkProject->id,
            'tenant_id' => $this->wkProject->id,
            'sort_order' => 1,
        ]);

        $response = $this->get('/wkcomputer');
        $response->assertStatus(200);
        $response->assertSee('Custom Category Dynamic');
    }
}
