<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use App\Widgets\Viettinmart\ViettinmartDealFlashWidget;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViettinmartDealFlashWidgetTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected User $admin;

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
            'code' => 'viettinmart-eco',
            'name' => 'VietTinMart',
            'status' => 'active',
            'project_type' => 'website',
            'tenant_id' => 3,
        ]);

        $this->admin = User::factory()->create([
            'username' => 'admin_test',
            'name' => 'Admin Test',
            'role' => 'admin',
            'level' => 1,
            'tenant_id' => 3,
            'project_ids' => [$this->project->id],
        ]);
    }

    public function test_deal_flash_widget_config_has_start_date_end_date_and_products_fields(): void
    {
        $config = ViettinmartDealFlashWidget::getConfig();

        $this->assertIsArray($config);
        $this->assertEquals('Viettinmart Deal Flash', $config['name']);

        $fieldNames = collect($config['fields'])->pluck('name')->all();
        $this->assertContains('title', $fieldNames);
        $this->assertContains('start_date', $fieldNames);
        $this->assertContains('end_date', $fieldNames);
        $this->assertContains('source', $fieldNames);
        $this->assertContains('product_ids', $fieldNames);

        $startDateField = collect($config['fields'])->firstWhere('name', 'start_date');
        $this->assertEquals('datetime', $startDateField['type']);

        $endDateField = collect($config['fields'])->firstWhere('name', 'end_date');
        $this->assertEquals('datetime', $endDateField['type']);

        $productIdsField = collect($config['fields'])->firstWhere('name', 'product_ids');
        $this->assertTrue($productIdsField['multiple']);
    }

    public function test_widget_fields_endpoint_returns_datetime_picktime_inputs_and_product_selection(): void
    {
        $product = Product::forceCreate([
            'name' => 'Táo Envy New Zealand',
            'slug' => 'tao-envy-new-zealand',
            'sku' => 'TAO-ENVY',
            'price' => 120000,
            'sale_price' => 99000,
            'project_id' => $this->project->id,
            'status' => 'published',
        ]);

        $response = $this->withSession([
            'project_user_id' => $this->admin->id,
            'project_user_username' => $this->admin->username,
            'current_project' => 'viettinmart-eco',
        ])->getJson('/viettinmart-eco/admin/widgets/fields?type=vtm_deal_flash');

        $response->assertOk();
        $response->assertJson([
            'success' => true,
        ]);

        $html = $response->json('form_html');
        $this->assertStringContainsString('name="start_date"', $html);
        $this->assertStringContainsString('name="end_date"', $html);
        $this->assertStringContainsString('type="datetime-local"', $html);
        $this->assertStringContainsString('name="product_ids[]"', $html);
        $this->assertStringContainsString('Táo Envy New Zealand', $html);
    }

    public function test_deal_flash_widget_renders_manual_selected_products(): void
    {
        $p1 = Product::forceCreate([
            'name' => 'Thịt Heo Sạch Sinh Học',
            'slug' => 'thit-heo-sach-sinh-hoc',
            'sku' => 'THIT-HEO',
            'price' => 150000,
            'sale_price' => 125000,
            'project_id' => $this->project->id,
            'status' => 'published',
        ]);

        $p2 = Product::forceCreate([
            'name' => 'Cá Hồi Na Uy Tươi',
            'slug' => 'ca-hoi-na-uy-tuoi',
            'sku' => 'CA-HOI',
            'price' => 350000,
            'sale_price' => 299000,
            'project_id' => $this->project->id,
            'status' => 'published',
        ]);

        $widget = new ViettinmartDealFlashWidget([
            'title' => 'Flash Sale Cuối Tuần Test',
            'start_date' => '2026-09-01T08:00',
            'end_date' => '2026-12-31T23:59',
            'source' => 'manual',
            'product_ids' => [$p2->id],
            'project_id' => $this->project->id,
        ]);

        $rendered = $widget->render();

        $this->assertStringContainsString('Flash Sale Cuối Tuần Test', $rendered);
        $this->assertStringContainsString('Cá Hồi Na Uy Tươi', $rendered);
        $this->assertStringNotContainsString('Thịt Heo Sạch Sinh Học', $rendered);
    }
}
