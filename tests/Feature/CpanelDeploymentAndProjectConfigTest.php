<?php

namespace Tests\Feature;

use App\Models\DeploymentHistory;
use App\Models\HostingProfile;
use App\Models\Project;
use App\Models\User;
use App\Services\Hosting\DeploymentDiscoveryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
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
        $response->assertSee('deployConsoleContainer');
        $response->assertSee('cPanel Deployment Terminal', false);
        $response->assertSee('btnStartDeploy');
        $response->assertSee('startLiveDeployment', false);
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

    public function test_superadmin_can_call_create_cpanel_database(): void
    {
        Http::fake([
            '*' => Http::response([
                'status' => 1,
                'data' => true,
            ], 200),
        ]);

        HostingProfile::create([
            'name' => 'Test cPanel',
            'panel_type' => 'cpanel',
            'hostname' => 'https://host.test:2083',
            'port' => 2083,
            'cpanel_username' => 'testuser',
            'api_token' => 'TEST_TOKEN',
            'is_active' => true,
        ]);

        $project = Project::factory()->create([
            'name' => 'Test DB Project',
            'code' => 'testdbproj',
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.projects.create-cpanel-db', $project));

        $response->assertRedirect();
        $response->assertSessionHas('alert');

        $project->refresh();
        $this->assertIsArray($project->deployment_config);
        $this->assertArrayHasKey('database', $project->deployment_config);
        $this->assertStringContainsString('testdbproj', $project->deployment_config['database']['name']);
    }

    public function test_superadmin_can_call_create_cpanel_domain_with_unshared_docroot(): void
    {
        Http::fake([
            '*' => Http::response([
                'status' => 1,
                'data' => true,
            ], 200),
        ]);

        HostingProfile::create([
            'name' => 'Test cPanel',
            'panel_type' => 'cpanel',
            'hostname' => 'https://host.test:2083',
            'port' => 2083,
            'cpanel_username' => 'testuser',
            'api_token' => 'TEST_TOKEN',
            'is_active' => true,
        ]);

        $project = Project::factory()->create([
            'name' => 'Domain Project',
            'code' => 'domproj',
            'external_domain' => 'old.aimagency.vn',
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.projects.create-cpanel-domain', $project), [
                'domain' => 'newisolated.aimagency.vn',
                'document_root' => '/home/testuser/newisolated.aimagency.vn',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('alert');

        $project->refresh();
        $this->assertEquals('newisolated.aimagency.vn', $project->external_domain);
        $this->assertEquals('/home/testuser/newisolated.aimagency.vn', $project->deployment_config['domain']['document_root']);
    }

    public function test_superadmin_can_fetch_deployment_logs_via_ajax(): void
    {
        $project = Project::factory()->create([
            'name' => 'Logs Test Project',
            'code' => 'logsproj',
        ]);

        // When no history exists
        $response = $this->actingAs($this->superAdmin)
            ->getJson(route('superadmin.projects.deploy-logs', $project));

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'idle',
            'logs' => [],
        ]);

        $profile = HostingProfile::create([
            'name' => 'Test Host',
            'panel_type' => 'cpanel',
            'hostname' => 'https://host.test:2083',
            'port' => 2083,
            'cpanel_username' => 'testuser',
            'api_token' => 'TEST_TOKEN',
            'is_active' => true,
        ]);

        // When deployment history with logs exists
        $history = DeploymentHistory::create([
            'project_id' => $project->id,
            'hosting_profile_id' => $profile->id,
            'deployed_by' => $this->superAdmin->id,
            'status' => 'success',
            'deployed_url' => 'https://logsproj.aimagency.vn',
            'started_at' => now()->subMinutes(5),
            'completed_at' => now(),
        ]);

        $history->logs()->create([
            'step' => 'export',
            'message' => 'Đóng gói mã nguồn hoàn tất.',
            'level' => 'success',
            'step_number' => 2,
            'logged_at' => now(),
        ]);

        $history->logs()->create([
            'step' => 'bootstrap',
            'message' => 'Kích hoạt hệ thống hoàn tất.',
            'level' => 'success',
            'step_number' => 5,
            'logged_at' => now(),
        ]);

        $responseWithLogs = $this->actingAs($this->superAdmin)
            ->getJson(route('superadmin.projects.deploy-logs', $project));

        $responseWithLogs->assertStatus(200);
        $responseWithLogs->assertJsonStructure([
            'status',
            'history_id',
            'logs' => [
                '*' => ['step', 'step_number', 'level', 'status', 'message', 'time'],
            ],
        ]);
        $this->assertEquals('success', $responseWithLogs->json('status'));
        $this->assertEquals('https://logsproj.aimagency.vn', $responseWithLogs->json('deployed_url'));
        $this->assertCount(2, $responseWithLogs->json('logs'));
        $this->assertEquals('Đóng gói mã nguồn hoàn tất.', $responseWithLogs->json('logs.0.message'));
    }
}
