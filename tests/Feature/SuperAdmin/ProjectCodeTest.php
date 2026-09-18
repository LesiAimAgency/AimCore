<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Customer;
use App\Models\Department;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectCodeTest extends TestCase
{
    use RefreshDatabase;

    private User $superAdmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->superAdmin = User::factory()->create([
            'role' => 'superadmin',
            'level' => 0,
        ]);
    }

    public function test_generate_project_code_convention_formatting(): void
    {
        // 1. Number under 100: formatted as 3 digits (001 -> 099)
        $code1 = Project::generateProjectCode('Công ty Viễn Thông', 1);
        $this->assertEquals('DA001-CONG-TY-VIEN-THONG', $code1);

        $code99 = Project::generateProjectCode('le si', 99);
        $this->assertEquals('DA099-LE-SI', $code99);

        // 2. Number between 100 and 999: still 3 digits (100 -> 999)
        $code100 = Project::generateProjectCode('Aim Agency', 100);
        $this->assertEquals('DA100-AIM-AGENCY', $code100);

        $code999 = Project::generateProjectCode('Aim Agency', 999);
        $this->assertEquals('DA999-AIM-AGENCY', $code999);

        // 3. Number reaches 1000+: retains 1000 without leading zeros
        $code1000 = Project::generateProjectCode('Aim Agency', 1000);
        $this->assertEquals('DA1000-AIM-AGENCY', $code1000);

        $code1050 = Project::generateProjectCode('Khách Hàng Mới', 1050);
        $this->assertEquals('DA1050-KHACH-HANG-MOI', $code1050);

        // 4. Without company or client name
        $codeNoName = Project::generateProjectCode(null, 5);
        $this->assertEquals('DA005', $codeNoName);
    }

    public function test_get_next_project_number_increments_properly(): void
    {
        // With no DA projects, next number is 1
        $this->assertEquals(1, Project::getNextProjectNumber());

        // Create project with DA001
        Project::factory()->create([
            'code' => 'DA001-CONG-TY-A',
            'name' => 'Project A',
        ]);
        $this->assertEquals(2, Project::getNextProjectNumber());

        // Create project with DA015
        Project::factory()->create([
            'code' => 'DA015-CONG-TY-B',
            'name' => 'Project B',
        ]);
        $this->assertEquals(16, Project::getNextProjectNumber());
    }

    public function test_create_project_view_contains_code_input_and_suggestion(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.projects.create'));

        $response->assertStatus(200);
        $response->assertSee('name="code"', false);
        $response->assertSee('id="project_code_input"', false);
        $response->assertSee('id="btn_generate_code"', false);
        $response->assertSee('Tạo mã chuẩn');
    }

    public function test_edit_project_view_contains_editable_code_input(): void
    {
        $project = Project::factory()->create([
            'code' => 'HD001',
            'name' => 'Old Project',
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.projects.edit', $project));

        $response->assertStatus(200);
        $response->assertSee('name="code"', false);
        $response->assertSee('id="project_code_input"', false);
        $response->assertSee('value="HD001"', false);
        $response->assertSee('id="btn_generate_code"', false);
        $response->assertSee('Tạo mã chuẩn');
    }

    public function test_update_project_code_saves_successfully(): void
    {
        $department = Department::create([
            'name' => 'IT Department',
            'code' => 'IT',
            'status' => 'active',
        ]);

        $project = Project::factory()->create([
            'code' => 'HD001',
            'name' => 'Old Project',
            'subdomain' => 'localhost/HD001',
            'department_id' => $department->id,
            'project_type' => 'website',
        ]);

        $customer = Customer::create([
            'name' => 'Công ty ABC',
            'type' => 'company',
        ]);

        $newCode = 'DA001-CONG-TY-ABC';

        $response = $this->actingAs($this->superAdmin)
            ->put(route('superadmin.projects.update', $project), [
                'name' => 'Updated Project Name',
                'code' => $newCode,
                'customer_id' => $customer->id,
                'subdomain' => 'localhost/'.$newCode,
                'department_id' => $department->id,
                'project_type' => 'website',
                'status' => 'active',
            ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'code' => $newCode,
            'name' => 'Updated Project Name',
        ]);
    }

    public function test_update_project_code_unique_validation(): void
    {
        $department = Department::create([
            'name' => 'IT Department',
            'code' => 'IT',
            'status' => 'active',
        ]);

        $project1 = Project::factory()->create([
            'code' => 'DA001-A',
            'name' => 'Project 1',
            'department_id' => $department->id,
            'project_type' => 'website',
        ]);

        $project2 = Project::factory()->create([
            'code' => 'DA002-B',
            'name' => 'Project 2',
            'department_id' => $department->id,
            'project_type' => 'website',
        ]);

        // Trying to update project2 with project1's code should fail validation
        $response = $this->actingAs($this->superAdmin)
            ->put(route('superadmin.projects.update', $project2), [
                'name' => 'Project 2 Updated',
                'code' => 'DA001-A',
                'subdomain' => 'localhost/DA001-A',
                'department_id' => $department->id,
                'project_type' => 'website',
            ]);

        $response->assertSessionHasErrors('code');

        // Keeping its own code should pass
        $validResponse = $this->actingAs($this->superAdmin)
            ->put(route('superadmin.projects.update', $project2), [
                'name' => 'Project 2 Updated',
                'code' => 'DA002-B',
                'subdomain' => 'localhost/DA002-B',
                'department_id' => $department->id,
                'project_type' => 'website',
            ]);

        $validResponse->assertSessionHasNoErrors();
    }
}
