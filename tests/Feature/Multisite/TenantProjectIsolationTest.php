<?php

namespace Tests\Feature\Multisite;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectProduct;
use App\Models\ProjectProductCategory;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantProjectIsolationTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_and_products_are_strictly_isolated_by_project_and_tenant(): void
    {
        // 1. Create two separate tenants
        $tenantA = Tenant::create([
            'name' => 'Tenant A',
            'code' => 'tenant-a',
            'domain' => 'tenanta.local',
            'database_name' => 'core',
            'status' => 'active',
        ]);
        $tenantB = Tenant::create([
            'name' => 'Tenant B',
            'code' => 'tenant-b',
            'domain' => 'tenantb.local',
            'database_name' => 'core',
            'status' => 'active',
        ]);

        // 2. Create two projects linked to their tenants
        $projectA = Project::create([
            'tenant_id' => $tenantA->id,
            'name' => 'Project A Food',
            'code' => 'project-a',
            'status' => 'active',
            'project_type' => 'website',
        ]);
        $projectB = Project::create([
            'tenant_id' => $tenantB->id,
            'name' => 'Project B Computer',
            'code' => 'project-b',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        // 3. Create categories for Project A and Project B
        $catA1 = Category::withoutGlobalScopes()->create([
            'tenant_id' => $tenantA->id,
            'project_id' => $projectA->id,
            'name' => 'Thực phẩm đông lạnh',
            'slug' => 'thuc-pham-dong-lanh',
            'is_active' => true,
        ]);
        $catA2 = Category::withoutGlobalScopes()->create([
            'tenant_id' => $tenantA->id,
            'project_id' => $projectA->id,
            'name' => 'Rau củ quả',
            'slug' => 'rau-cu-qua',
            'is_active' => true,
        ]);

        $catB1 = Category::withoutGlobalScopes()->create([
            'tenant_id' => $tenantB->id,
            'project_id' => $projectB->id,
            'name' => 'Linh kiện máy tính',
            'slug' => 'linh-kien-may-tinh',
            'is_active' => true,
        ]);
        $catB2 = Category::withoutGlobalScopes()->create([
            'tenant_id' => $tenantB->id,
            'project_id' => $projectB->id,
            'name' => 'Màn hình máy tính',
            'slug' => 'man-hinh-may-tinh',
            'is_active' => true,
        ]);

        // 4. Create products for Project A and Project B
        $prodA = Product::withoutGlobalScopes()->create([
            'tenant_id' => $tenantA->id,
            'project_id' => $projectA->id,
            'name' => 'Thịt bò nhập khẩu',
            'slug' => 'thit-bo-nhap-khau',
            'price' => 150000,
            'status' => 'published',
        ]);

        $prodB = Product::withoutGlobalScopes()->create([
            'tenant_id' => $tenantB->id,
            'project_id' => $projectB->id,
            'name' => 'CPU Intel Core i7',
            'slug' => 'cpu-intel-core-i7',
            'price' => 7500000,
            'status' => 'published',
        ]);

        // 5. Test under Project A context
        request()->attributes->set('project', $projectA);
        session(['current_project_id' => $projectA->id, 'current_tenant_id' => $projectA->tenant_id]);
        app()->instance('current_project_id', $projectA->id);
        app()->instance('current_tenant_id', $projectA->tenant_id);

        $catsA = Category::all();
        $this->assertEquals(2, $catsA->count());
        $this->assertTrue($catsA->contains('name', 'Thực phẩm đông lạnh'));
        $this->assertFalse($catsA->contains('name', 'Linh kiện máy tính'));

        $ppcA = ProjectProductCategory::all();
        $this->assertEquals(2, $ppcA->count());
        $this->assertTrue($ppcA->contains('name', 'Rau củ quả'));
        $this->assertFalse($ppcA->contains('name', 'Màn hình máy tính'));

        $prodsA = Product::all();
        $this->assertEquals(1, $prodsA->count());
        $this->assertEquals('Thịt bò nhập khẩu', $prodsA->first()->name);

        $projProdsA = ProjectProduct::all();
        $this->assertEquals(1, $projProdsA->count());
        $this->assertEquals('Thịt bò nhập khẩu', $projProdsA->first()->name);

        // Test Header Category Query for Project A
        $headerCatsA = Category::where('is_active', true)->whereNull('parent_id')->orderBy('sort_order')->get();
        $this->assertEquals(2, $headerCatsA->count());
        $this->assertFalse($headerCatsA->contains('name', 'Linh kiện máy tính'));

        // 6. Test under Project B context
        request()->attributes->set('project', $projectB);
        session(['current_project_id' => $projectB->id, 'current_tenant_id' => $projectB->tenant_id]);
        app()->instance('current_project_id', $projectB->id);
        app()->instance('current_tenant_id', $projectB->tenant_id);

        $catsB = Category::all();
        $this->assertEquals(2, $catsB->count());
        $this->assertTrue($catsB->contains('name', 'Linh kiện máy tính'));
        $this->assertFalse($catsB->contains('name', 'Thực phẩm đông lạnh'));

        $ppcB = ProjectProductCategory::all();
        $this->assertEquals(2, $ppcB->count());
        $this->assertTrue($ppcB->contains('name', 'Màn hình máy tính'));
        $this->assertFalse($ppcB->contains('name', 'Rau củ quả'));

        $prodsB = Product::all();
        $this->assertEquals(1, $prodsB->count());
        $this->assertEquals('CPU Intel Core i7', $prodsB->first()->name);

        $projProdsB = ProjectProduct::all();
        $this->assertEquals(1, $projProdsB->count());
        $this->assertEquals('CPU Intel Core i7', $projProdsB->first()->name);

        // Test Header Category Query for Project B
        $headerCatsB = Category::where('is_active', true)->whereNull('parent_id')->orderBy('sort_order')->get();
        $this->assertEquals(2, $headerCatsB->count());
        $this->assertFalse($headerCatsB->contains('name', 'Thực phẩm đông lạnh'));
    }
}
