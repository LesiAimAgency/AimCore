<?php

namespace Tests\Feature\Multisite;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectProduct;
use App\Models\ProjectProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantProjectIsolationTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_and_products_are_strictly_isolated_by_project_and_tenant(): void
    {
        // 1. Create two separate tenants
        $tenantA = \App\Models\Tenant::create([
            'name' => 'Tenant A',
            'code' => 'tenant-a',
            'domain' => 'tenanta.local',
            'database_name' => 'core',
            'status' => 'active',
        ]);
        $tenantB = \App\Models\Tenant::create([
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
            'product_category_id' => $catA1->id,
            'price' => 150000,
            'status' => 'published',
        ]);

        $prodB = Product::withoutGlobalScopes()->create([
            'tenant_id' => $tenantB->id,
            'project_id' => $projectB->id,
            'name' => 'CPU Intel Core i7',
            'slug' => 'cpu-intel-core-i7',
            'product_category_id' => $catB1->id,
            'price' => 7500000,
            'status' => 'published',
        ]);

        // 5. Test under Project A context
        re