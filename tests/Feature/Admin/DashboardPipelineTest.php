<?php

namespace Tests\Feature\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardPipelineTest extends TestCase
{
    use RefreshDatabase;

    private Project $projectA;

    private Project $projectB;

    private User $adminA;

    protected function setUp(): void
    {
        parent::setUp();

        $this->projectA = Project::create([
            'name' => 'Store Alpha',
            'code' => 'store-alpha',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->projectB = Project::create([
            'name' => 'Store Beta',
            'code' => 'store-beta',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->adminA = User::factory()->create([
            'username' => 'admin_alpha',
            'email' => 'admin@alpha.local',
            'role' => 'admin',
            'project_ids' => [$this->projectA->id],
        ]);
    }

    public function test_dashboard_renders_order_pipeline_hub_with_strict_project_isolation(): void
    {
        // Project A Orders
        Order::create([
            'project_id' => $this->projectA->id,
            'tenant_id' => $this->projectA->id,
            'order_number' => 'ORD-A-PENDING-01',
            'status' => 'pending',
            'subtotal' => 100000,
            'total_amount' => 100000,
            'customer_name' => 'Customer A1',
            'customer_email' => 'a1@test.com',
            'billing_address' => ['address' => 'Hanoi'],
            'shipping_address' => ['address' => 'Hanoi'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Order::create([
            'project_id' => $this->projectA->id,
            'tenant_id' => $this->projectA->id,
            'order_number' => 'ORD-A-PROC-02',
            'status' => 'processing',
            'subtotal' => 200000,
            'total_amount' => 200000,
            'customer_name' => 'Customer A2',
            'customer_email' => 'a2@test.com',
            'billing_address' => ['address' => 'Hanoi'],
            'shipping_address' => ['address' => 'Hanoi'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Order::create([
            'project_id' => $this->projectA->id,
            'tenant_id' => $this->projectA->id,
            'order_number' => 'ORD-A-SHIP-03',
            'status' => 'shipped',
            'subtotal' => 300000,
            'total_amount' => 300000,
            'customer_name' => 'Customer A3',
            'customer_email' => 'a3@test.com',
            'billing_address' => ['address' => 'Hanoi'],
            'shipping_address' => ['address' => 'Hanoi'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Order::create([
            'project_id' => $this->projectA->id,
            'tenant_id' => $this->projectA->id,
            'order_number' => 'ORD-A-DONE-04',
            'status' => 'delivered',
            'subtotal' => 400000,
            'total_amount' => 400000,
            'customer_name' => 'Customer A4',
            'customer_email' => 'a4@test.com',
            'billing_address' => ['address' => 'Hanoi'],
            'shipping_address' => ['address' => 'Hanoi'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Project B Orders (Leakage Test)
        Order::create([
            'project_id' => $this->projectB->id,
            'tenant_id' => $this->projectB->id,
            'order_number' => 'ORD-B-LEAK-99',
            'status' => 'pending',
            'subtotal' => 9999999,
            'total_amount' => 9999999,
            'customer_name' => 'Secret Customer B',
            'customer_email' => 'leak@beta.local',
            'billing_address' => ['address' => 'Saigon'],
            'shipping_address' => ['address' => 'Saigon'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Products for Project A
        Product::create([
            'project_id' => $this->projectA->id,
            'tenant_id' => $this->projectA->id,
            'name' => 'Bàn phím cơ Alpha',
            'slug' => 'ban-phim-co-alpha',
            'price' => 1500000,
            'stock_quantity' => 2,
            'status' => 'active',
        ]);

        // Set API keys in ProjectSetting for Project A
        ProjectSetting::set($this->projectA->id, 'api.vietqr_account_no', '987654321');
        ProjectSetting::set($this->projectA->id, 'api.openai_key', 'sk-test-ai-active');

        // Request Project A admin dashboard
        $response = $this->withSession([
            'project_user_id' => $this->adminA->id,
            'project_user_username' => $this->adminA->username,
            'current_project' => $this->projectA->code,
        ])->get("/{$this->projectA->code}/admin");

        $response->assertStatus(200);

        // Verify Order Pipeline Hub is rendered
        $response->assertSee('Tiến độ Vận hành Đơn hàng');
        $response->assertSee('ORD-A-PENDING-01');
        $response->assertSee('ORD-A-DONE-04');

        // Check view data
        $viewStats = $response->viewData('stats');
        $this->assertNotNull($viewStats);
        $this->assertEquals(1, $viewStats['pending_orders']);
        $this->assertEquals(1, $viewStats['processing_orders']);
        $this->assertEquals(1, $viewStats['shipping_orders']);
        $this->assertEquals(1, $viewStats['completed_today']);
        $this->assertEquals(4, $viewStats['total_orders']);
        $this->assertEquals(1000000, $viewStats['total_revenue']); // 100k+200k+300k+400k

        // Verify API Hub indicators
        $this->assertTrue($viewStats['api_integrations']['vietqr']);
        $this->assertTrue($viewStats['api_integrations']['ai']);
        $this->assertFalse($viewStats['api_integrations']['ghn']);

        // CRITICAL ISOLATION: Project B data must NOT appear anywhere
        $response->assertDontSee('ORD-B-LEAK-99');
        $response->assertDontSee('Secret Customer B');
        $this->assertNotEquals(9999999, $viewStats['total_revenue']);
    }
}
