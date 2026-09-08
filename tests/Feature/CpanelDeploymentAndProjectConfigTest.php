<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use App\Services\Hosting\DeploymentDiscoveryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CpanelDeploymentAndProjectConfigTest extends TestCase
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

    public function test_superadmin_can_access_project_config_page_with_deployment_center(): void
    {
        $project = Project::factory()->create([
            'name' => 'WK Computer Demo',
            'code' => 'wkcomputer',
            'external_domain' => 'wkcomputer.aimagency.vn',
            'status' => 'active',
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.projects.config', $project));

        $response->assertStatus(200);
        $response->assertSee('Triển khai', false);
        $response->assertSee('deployment-tab');
        $response->assertSee($project->getDeploymentId());
        $response->assertSee('wkcomputer.aimagency.vn');
        $response->assertSee('Kỹ thuật viên Triển khai', false);
    }

    public function test_deployment_discovery_service_generates_normalized_config(): void
    {
        $project = Project::factory()->create([
            'name' => 'Aim Demo Project',
            'code' => 'aimdemo',
            'external_domain' => 'aimdemo.aimagency.vn',
            'status' => 'active',
        ]);

        $service = app(DeploymentDiscoveryService::class);
        $config = $service->generateDeploymentConfig($project);

        $this->assertIsArray($config);
        $this->assertArrayHasKey('deployment_id', $config);
        $this->assertArrayHasKey('domain', $config);
        $this->assertArrayHasKey('docroot', $config);
        $this->assertArrayHasKey('homedir', $config);
        $this->assertArrayHasKey('database', $config);
        $this->assertArrayHasKey('isolation_level', $config);
        $this->assertArrayHasKey('cpanel', $config);
        $this->assertArrayHasKey('env_template', $config);
        $this->assertArrayHasKey('deploy_commands', $config);

        $this->assertEquals($project->getDeploymentId(), $config['deployment_id']);
        $this->assertEquals('aimdemo.aimagency.vn', $config['domain']['name']);
        $this->assertStringContainsString('APP_URL=https://aimdemo.aimagency.vn', $config['env_template']);
    }

    public function test_conflict_detection_identifies_duplicate_domains(): void
    {
        $project1 = Project::factory()->create([
            'name' => 'Project 1',
            'code' => 'proj1',
            'external_domain' => 'shared.aimagency.vn',
        ]);

        $project2 = Project::factory()->create([
            'name' => 'Project 2',
            'code' => 'proj2',
            'external_domain' => 'shared.aimagency.vn',
        ]);

        $service = app(DeploymentDiscoveryService::class);
        $conflicts = $service->detectDomainConflicts($project2);

        $this->assertNotEmpty($conflicts);
        $this->assertEquals('DOMAIN_SHARED_COLLISION', $conflicts[0]['type']);
        $this->assertEquals('Project 1', $conflicts[0]['with_project']);
    }

    public function test_superadmin_can_update_project_deployment_config(): void
    {
        $project = Project::factory()->create([
            'name' => 'Custom Domain Project',
            'code' => 'custdom',
            'external_domain' => 'old.aimagency.vn',
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->post('/superadmin/projects/'.$project->id.'/config', [
                'deployment_domain' => 'newdomain.vn',
                'custom_document_root' => '/home/fukkatsu/newdomain.vn/public',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $project->refresh();
        $this->assertEquals('newdomain.vn', $project->external_domain);
        $this->assertIsArray($project->deployment_config);
        $this->assertEquals('/home/fukkatsu/newdomain.vn/public', $project->deployment_config['domain']['document_root']);
    }

    public function test_superadmin_can_trigger_health_check(): void
    {
        $project = Project::factory()->create([
            'name' => 'Health Check Project',
            'code' => 'hcproj',
            'external_domain' => '127.0.0.1:8000',
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.projects.health-check', $project));

        $response->assertRedirect();
        $this->assertTrue(session()->has('health_check_result') || session()->has('alert') || session()->has('success') || session()->has('warning'));

        $project->refresh();
        $this->assertIsArray($project->deployment_config);
        $this->assertArrayHasKey('health_check', $project->deployment_config);
    }
}
