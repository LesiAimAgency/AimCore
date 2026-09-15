<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Department;
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
            'is_multi_tenancy' => true,
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

    public function test_multi_tenancy_user_cannot_access_superadmin(): void
    {
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

        // Multi-tenancy user không có role nội bộ nên không được vào superadmin
        $response = $this->actingAs($mtUser)
            ->get(route('superadmin.dashboard'));
        $response->assertStatus(403);

        $mtResponse = $this->actingAs($mtUser)
            ->get(route('superadmin.multi-tenancy.index'));
        $mtResponse->assertStatus(403);
    }

    public function test_all_internal_role_users_can_access_superadmin(): void
    {
        $internalRoles = ['project_manager', 'web_designer', 'designer', 'employee'];
        foreach ($internalRoles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName], ['display_name' => $roleName, 'level' => 2]);
            $user = User::create([
                'name' => "User {$roleName}",
                'username' => "user_{$roleName}",
                'email' => "{$roleName}@test.local",
                'password' => bcrypt('secret123'),
                'role' => $roleName,
                'status' => true,
            ]);
            $user->roles()->attach($role);

            $this->actingAs($user)
                ->get(route('superadmin.my-tasks.index'))
                ->assertStatus(200);
        }
    }

    public function test_task_personnel_dispatch_only_shows_internal_users(): void
    {
        // Tạo nhân sự nội bộ (Thiết kế, Website)
        $designer = User::create([
            'name' => 'Nguyễn Designer Nội Bộ',
            'username' => 'designer_nb',
            'email' => 'designer_nb@test.local',
            'password' => bcrypt('secret123'),
            'role' => 'designer',
            'department' => 'Thiết kế',
            'status' => true,
        ]);

        // Tạo tài khoản Multi-Tenancy
        $mtUser = User::create([
            'name' => 'Khách Hàng Shop Ngoài',
            'username' => 'client_shop',
            'email' => 'client@shop.local',
            'password' => bcrypt('secret123'),
            'role' => 'multi_tenancy',
            'project_ids' => [$this->project->id],
            'status' => true,
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.my-tasks.index'));

        $response->assertStatus(200);
        $usersInView = $response->viewData('users');

        // Danh sách điều phối nhân sự phải có nhân sự nội bộ
        $this->assertTrue($usersInView->contains('id', $designer->id));
        // Danh sách điều phối nhân sự KHÔNG ĐƯỢC có tài khoản Multi-Tenancy
        $this->assertFalse($usersInView->contains('id', $mtUser->id));
    }

    public function test_multi_tenancy_dashboard_only_lists_multi_tenancy_projects(): void
    {
        // Tạo một dự án tiêu chuẩn (không phải multi-tenancy)
        $standardProject = Project::create([
            'name' => 'Thiết Kế Profile Brand X',
            'code' => 'BRAND01',
            'status' => 'active',
            'is_multi_tenancy' => false,
            'client_name' => 'Tập đoàn Brand X',
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.multi-tenancy.index'));

        $response->assertStatus(200);
        // Dự án Multi-Tenancy phải có trong danh sách projects chính
        $projectsInView = $response->viewData('projects');
        $this->assertTrue($projectsInView->contains('id', $this->project->id));
        // Dự án tiêu chuẩn KHÔNG ĐƯỢC có trong danh sách hiển thị thẻ dự án MT
        $this->assertFalse($projectsInView->contains('id', $standardProject->id));
    }

    public function test_can_toggle_project_multi_tenancy_mode(): void
    {
        $project = Project::create([
            'name' => 'Dự Án Test Toggle',
            'code' => 'TOGGLE01',
            'status' => 'active',
            'is_multi_tenancy' => false,
        ]);

        // Toggle thành Multi-Tenancy
        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.multi-tenancy.projects.toggle-mode', $project));

        $response->assertRedirect();
        $project->refresh();
        $this->assertTrue($project->is_multi_tenancy);

        // Toggle lại về Dự án thường
        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.multi-tenancy.projects.toggle-mode', $project));

        $response->assertRedirect();
        $project->refresh();
        $this->assertFalse($project->is_multi_tenancy);
    }

    public function test_can_batch_update_multi_tenancy_project_modes(): void
    {
        $projectA = Project::create(['name' => 'Project A', 'code' => 'PA', 'status' => 'active', 'is_multi_tenancy' => false]);
        $projectB = Project::create(['name' => 'Project B', 'code' => 'PB', 'status' => 'active', 'is_multi_tenancy' => true]);
        $projectC = Project::create(['name' => 'Project C', 'code' => 'PC', 'status' => 'active', 'is_multi_tenancy' => false]);

        // Gửi batch update chỉ chọn project A và project C làm multi-tenancy
        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.multi-tenancy.projects.batch-update-modes'), [
                'multi_tenancy_project_ids' => [$projectA->id, $projectC->id],
            ]);

        $response->assertRedirect();

        $projectA->refresh();
        $projectB->refresh();
        $projectC->refresh();

        $this->assertTrue($projectA->is_multi_tenancy);
        $this->assertFalse($projectB->is_multi_tenancy); // Đã bị gỡ khỏi multi-tenancy
        $this->assertTrue($projectC->is_multi_tenancy);
    }

    public function test_can_update_project_with_null_customer(): void
    {
        $department = Department::firstOrCreate(['id' => 1], ['name' => 'Design', 'code' => 'design', 'status' => 'active']);

        $response = $this->actingAs($this->superAdmin)
            ->put(route('superadmin.projects.update', $this->project), [
                'name' => 'Updated Project Name',
                'customer_id' => '',
                'subdomain' => 'localhost/TEST01',
                'project_type' => 'design',
                'department_id' => $department->id,
            ]);

        $response->assertRedirect();
        $this->project->refresh();
        $this->assertNull($this->project->customer_id);
        $this->assertEquals('Updated Project Name', $this->project->name);
    }
}
