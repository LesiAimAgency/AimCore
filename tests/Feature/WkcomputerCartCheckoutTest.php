<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Wkcomputer\WkOrder;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WkcomputerCartCheckoutTest extends TestCase
{
    use RefreshDatabase;

    protected Project $wkProject;

    protected WkProduct $product1;

    protected WkProduct $product2;

    protected function setUp(): void
    {
        parent::setUp();

        $this->wkProject = Project::create([
            'name' => 'WKComputer Gaming & PC',
            'code' => 'wkcomputer',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->product1 = WkProduct::create([
            'project_id' => $this->wkProject->id,
            'tenant_id' => $this->wkProject->id,
            'name' => 'Bàn phím cơ Test WK 01',
            'slug' => 'ban-phim-co-test-wk-01',
            'price' => 1500000,
            'sale_price' => 1200000,
            'sku' => 'WKC-TEST-01',
            'status' => 'published',
            'stock_quantity' => 10,
        ]);

        $this->product2 = WkProduct::create([
            'project_id' => $this->wkProject->id,
            'tenant_id' => $this->wkProject->id,
            'name' => 'Chuột Gaming Test WK 02',
            'slug' => 'chuot-gaming-test-wk-02',
            'price' => 800000,
            'sku' => 'WKC-TEST-02',
            'status' => 'published',
            'stock_quantity' => 10,
        ]);
    }

    public function test_can_add_product_to_cart_and_get_count(): void
    {
        $response = $this->postJson('/wkcomputer/gio-hang/them', [
            'product_id' => $this->product1->id,
            'qty' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $response->assertJsonPath('count', 2);

        $countRes = $this->getJson('/wkcomputer/gio-hang/so-luong');
        $countRes->assertStatus(200);
        $countRes->assertJsonPath('count', 2);
    }

    public function test_can_add_multiple_products_from_build_pc(): void
    {
        $response = $this->postJson('/wkcomputer/gio-hang/them-nhieu', [
            'items' => [
                ['id' => $this->product1->id, 'qty' => 1],
                ['id' => $this->product2->id, 'qty' => 2],
            ],
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $response->assertJsonPath('count', 3);
    }

    public function test_can_update_and_remove_cart_item(): void
    {
        // Add item
        $this->postJson('/wkcomputer/gio-hang/them', [
            'product_id' => $this->product1->id,
            'qty' => 1,
        ]);

        // Update quantity
        $updateRes = $this->postJson('/wkcomputer/gio-hang/cap-nhat', [
            'product_id' => $this->product1->id,
            'qty' => 4,
        ]);
        $updateRes->assertStatus(200);
        $updateRes->assertJsonPath('success', true);
        $updateRes->assertJsonPath('count', 4);

        // Remove item
        $removeRes = $this->postJson('/wkcomputer/gio-hang/xoa', [
            'product_id' => $this->product1->id,
        ]);
        $removeRes->assertStatus(200);
        $removeRes->assertJsonPath('success', true);
        $removeRes->assertJsonPath('count', 0);
    }

    public function test_cannot_checkout_with_empty_cart(): void
    {
        $response = $this->get('/wkcomputer/dat-hang');
        $response->assertRedirect('/wkcomputer/gio-hang');
    }

    public function test_can_create_order_via_checkout_store_and_view_success_page(): void
    {
        // 1. Add product to cart
        $this->postJson('/wkcomputer/gio-hang/them', [
            'product_id' => $this->product1->id,
            'qty' => 2,
        ]);

        // 2. Visit checkout page
        $checkoutPage = $this->get('/wkcomputer/dat-hang');
        $checkoutPage->assertStatus(200);
        $checkoutPage->assertSee('Bàn phím cơ Test WK 01');

        // 3. Submit checkout form
        $checkoutSubmit = $this->post('/wkcomputer/dat-hang', [
            'first_name' => 'Nguyen',
            'last_name' => 'Van A',
            'phone' => '0901234567',
            'street_address' => '123 Le Loi',
            'province_name' => 'Ho Chi Minh',
            'district_name' => 'Quan 1',
            'ward_name' => 'Ben Nghe',
            'email' => 'customer@wkcomputer.test',
            'notes' => 'Giao nhanh giup toi',
            'payment_method' => 'cod',
        ]);

        $checkoutSubmit->assertStatus(302);

        // 4. Verify order in DB
        $order = WkOrder::latest()->first();
        $this->assertNotNull($order);
        $this->assertEquals('Nguyen Van A', $order->customer_name);
        $this->assertEquals('0901234567', $order->customer_phone);
        $this->assertEquals(2400000, (float) $order->total_amount);
        $this->assertStringContainsString('123 Le Loi', $order->formatted_shipping_address);
        $this->assertCount(1, $order->items);

        $item = $order->items->first();
        $this->assertEquals($this->product1->id, $item->product_id);
        $this->assertEquals(2, $item->quantity);
        $this->assertEquals(1200000, (float) $item->unit_price);

        // 5. Verify success page
        $successPage = $this->get('/wkcomputer/dat-hang/thanh-cong/'.$order->order_number);
        $successPage->assertStatus(200);
        $successPage->assertSee($order->order_number);
        $successPage->assertSee('Nguyen Van A');
        $successPage->assertSee('123 Le Loi');
    }
}
