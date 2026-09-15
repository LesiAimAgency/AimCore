<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Project;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MultiTenancyControlCenterTest extends TestCase
{
    use RefreshDatabase;

    protected User $superAdmin;

    protected Role $superAdminRole;

    protected Role $multiTenancyRole;

    protected Project $project;

    protected Tenant $tenant;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::create([
            'name' => 'Demo Tenant',
            'code' => 'demo_tenant',
            'domain' => 'demo.local',
            'database_name' => 'tenant_demo',
            'status' => 'active',
        ]);

        $this->superAdminRole = Role::firstOrCreate(
            ['name' => 'super_admin'],
            [
                'display_name' => 'Super Admin',
                'level' => 0,
            ]
        );

        $this->multiTenancyRole = Role::firstOrCreate(
            ['name' => 'multi_tenancy'],
            [
                'display_name' => 'Multi-Tenancy Control Center',
                'description' => 'Quản trị và điều hành các website / tenant trong hệ thống Multi-Tenancy Control Center',
                'level' => 2,
            ]
        );

        $this->superAdmin = User::create([
            'name' => 'Super Administrator',
            'username' => 'superadmin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'super_admin',
            'level' => 0,
            'status' => true,
        ]);
        $this->superAdmin->roles()->attach($this->superAdminRole);

        $this->project = Project::create([
            'name' => 'Website Công Ty Test',
            'code' => 'TEST01',
            'status' => 'active',
            'tenant_id' => $this->tenant->id,
            'client_name' => 'Công ty TNHH Test',
            'start_date' => now(),
            'deadline' => now()->addMonth(),
        ]);
    }

    public function test_multi_tenancy_role_exists_and_user_helper_works(): void
    {
        $user = User::create([
            'name' => 'Tenant Admin',
            'username' => 'tenant_admin',
            'email' => 'tenant@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'multi_tenancy',
            'level' => 2,
            'project_ids' => [$this->project->id],
            'tenant_id' => $this->tenant->id,
            'status' => true,
        ]);
        $user->roles()->attach($this->multiTenancyRole);

        $this->assertTrue($user->isMultiTenancy());
        $this->assertFalse($user->isSuperAdmin());
    }

    public function test_superadmin_can_access_multi_tenancy_dashboard(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.multi-tenancy.index'));

        $response->assertStatus(200);
        $response->assertSee('Multi-Tenancy Control Center');
        $response->assertSee('TEST01');
    }

    public function test_can_create_multi_tenancy_account_from_dashboard(): void
    {
        $payload = [
            'project_id' => $this->project->id,
            'name' => 'Admin Website Test',
            'username' => 'admin_test01',
            'email' => 'admin.test01@example.com',
            'password' => 'SecurePass123!',
        ];

        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.multi-tenancy.accounts.store'), $payload);

        $response->assertRedirect();
        $response->assertSessionHas('alert');

        $createdUser = User::where('username', 'admin_test01')->first();
        $this->assertNotNull($createdUser);
        $this->assertEquals('multi_tenancy', $createdUser->role);
        $this->assertEquals(2, $createdUser->level);
        $this->assertTrue($createdUser->isMultiTenancy());
        $this->assertTrue($createdUser->hasRole('multi_tenancy'));
        $this->assertEquals([$this->project->id], $createdUser->project_ids);

        $this->project->refresh();
        $this->assertEquals($createdUser->id, $this->project->admin_id);
        $this->assertEquals('admin_test01', $this->project->project_admin_username);
    }

    public function test_user_management_filters_multi_tenancy_accounts_separately(): void
    {
        // 1 internal employee
        $employeeRole = Role::create(['name' => 'employee', 'display_name' => 'Nhân viên', 'level' => 2]);
        $employee = User::create([
            'name' => 'Nhân viên Kinh Doanh',
            'username' => 'nv_kd',
            'email' => 'nv.kd@company.local',
            'password' => bcrypt('secret123'),
            'role' => 'employee',
            'department' => 'Kinh Doanh',
            'level' => 2,
            'status' => true,
        ]);
        $employee->roles()->attach($employeeRole);

        // 1 multi-tenancy account
        $mtUser = User::create([
            'name' => 'Admin Shop Demo',
            'username' => 'admin_shop',
            'email' => 'admin@shop.local',
            'password' => bcrypt('secret123'),
            'role' => 'multi_tenancy',
            'level' => 2,
            'project_ids' => [$this->project->id],
            'tenant_id' => $this->tenant->id,
            'status' => true,
        ]);
        $mtUser->roles()->attach($this->multiTenancyRole);

        // Filter: Tất cả
        $allResponse = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.users.index', ['type' => 'all']));
        $allResponse->assertStatus(200);
        $allResponse->assertSee('Nhân viên Kinh Doanh');
        $allResponse->assertSee('Admin Shop Demo');

        // Filter: Nội bộ
        $internalResponse = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.users.index', ['type' => 'internal']));
        $internalResponse->assertStatus(200);
        $internalResponse->assertSee('Nhân viên Kinh Doanh');
        $internalResponse->assertDontSee('Admin Shop Demo');

        // Filter: Multi-Tenancy
        $mtResponse = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.users.index', ['type' => 'multi_tenancy']));
        $mtResponse->assertStatus(200);
        $mtResponse->assertSee('Admin Shop Demo');
        $mtResponse->assertSee('Multi-Tenancy');
        $mtResponse->assertDontSee('Nhân viên Kinh Doanh');
    }

    public function test_multi_tenancy_user_can_access_multi_tenancy_dashboard_and_only_sees_assigned_projects(): void
    {
        $otherProject = Project::create([
            'name' => 'Website Khác Không Thuộc Tenant Này',
            'code' => 'OTHER99',
            'status' => 'active',
            'client_name' => 'Công ty Khác',
            'start_date' => now(),
            'deadline' => now()->addMonth(),
        ]);

        $mtUser = User::create([
            'name' => 'Chủ Website Test',
            'username' => 'owner_test01',
            'email' => 'owner@test01.local',
            'password' => bcrypt('secret123'),
            'role' => 'multi_tenancy',
            'level' => 2,
            'project_ids' => [$this->project->id],
            'status' => true,
        ]);
        $mtUser->roles()->attach($this->multiTenancyRole);

        $response = $this->actingAs($mtUser)
            ->get(route('superadmin.multi-tenancy.index'));

        $response->assertStatus(200);
        $response->assertSee('TEST01');
        $response->assertDontSee('OTHER99');
    }
}
