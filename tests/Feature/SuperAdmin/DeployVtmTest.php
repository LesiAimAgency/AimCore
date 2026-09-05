<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Project;
use App\Models\User;
use App\Services\ViettinmartDeployService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeployVtmTest extends TestCase
{
    use RefreshDatabase;

    private User $superAdmin;

    private Project $project;

    protected function setUp(): void
    {
        parent::setUp();

        $this->superAdmin = User::factory()->create([
            'role' => 'superadmin',
            'level' => 0,
        ]);

        $this->project = Project::factory()->create([
            'code' => 'test-vtm-'.uniqid(),
            'name' => 'Test VTM Project',
            'status' => 'pending',
            'project_type' => 'website',
        ]);
    }

    public function test_superadmin_can_deploy_vtm_via_post_route(): void
    {
        $mockService = $this->mock(ViettinmartDeployService::class);
        $mockService->shouldReceive('deploy')
            ->once()
            ->with(\Mockery::on(fn ($p) => $p->id === $this->project->id))
            ->andReturn([
                'success' => true,
                'project' => $this->project,
                'tenant_id' => 99,
                'admin_username' => 'test-vtm',
                'admin_password' => 'admin123',
                'frontend_url' => url('/test-vtm'),
                'admin_url' => url('/test-vtm/admin'),
                'languages_url' => url('/test-vtm/admin/settings/languages'),
            ]);

        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.projects.deploy-vtm', $this->project));

        $response->assertRedirect();
        $response->assertSessionHas('alert');
        $alert = session('alert');
        $this->assertEquals('success', $alert['type']);
        $this->assertStringContainsString('Triển khai mẫu Viettinmart', $alert['message']);
    }

    public function test_guest_cannot_deploy_vtm(): void
    {
        $response = $this->post(route('superadmin.projects.deploy-vtm', $this->project));
        $response->assertRedirect('/login');
    }
}
