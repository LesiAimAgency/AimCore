<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class VgtCoreRemoteApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_website_can_register_with_vgt_core(): void
    {
        $testUuid = (string) Str::uuid();

        $response = $this->postJson('/api/v1/projects/register', [
            'project_uuid' => $testUuid,
            'domain' => 'client-site.example.com',
            'app_url' => 'https://client-site.example.com',
            'theme' => 'inbetween',
            'theme_version' => '1.0.0',
            'cms_version' => '2.0.0',
            'php_version' => '8.2.12',
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'message',
            'project_uuid',
            'project_token',
            'heartbeat_interval_seconds',
            'registered_at',
        ]);

        $token = $response->json('project_token');
        $this->assertStringStartsWith('vgt_live_tok_', $token);

        // Verify project is recorded in DB
        $project = Project::where('uuid', $testUuid)->first();
        $this->assertNotNull($project);
        $this->assertEquals('online', $project->connection_status);
        $this->assertNotNull($project->last_heartbeat_at);
    }

    public function test_website_can_send_heartbeat_with_valid_token(): void
    {
        $testUuid = (string) Str::uuid();
        $project = Project::create([
            'uuid' => $testUuid,
            'name' => 'Heartbeat Test Project',
            'code' => 'hb_test_'.Str::random(5),
            'status' => 'active',
        ]);

        $tokenData = $project->issueToken('test_token');
        $token = $tokenData['token'];

        $response = $this->postJson('/api/v1/projects/heartbeat', [
            'project_uuid' => $testUuid,
            'theme' => 'ehenho',
            'theme_version' => '1.2.0',
            'cms_version' => '2.0.0',
            'status' => 'healthy',
            'metrics' => [
                'db_connection' => 'ok',
                'storage_writable' => true,
            ],
        ], [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'status' => 'acknowledged',
            'project_uuid' => $testUuid,
            'connection_status' => 'online',
        ]);

        $project->refresh();
        $this->assertEquals('1.2.0', $project->theme_version);
        $this->assertTrue($project->isOnline());
    }

    public function test_invalid_token_is_rejected_on_heartbeat(): void
    {
        $response = $this->postJson('/api/v1/projects/heartbeat', [
            'project_uuid' => (string) Str::uuid(),
            'status' => 'healthy',
        ], [
            'Authorization' => 'Bearer vgt_live_tok_invalid_fake_token_12345',
        ]);

        $response->assertStatus(401);
    }

    public function test_token_rotation_works_and_invalidates_old_token(): void
    {
        $testUuid = (string) Str::uuid();
        $project = Project::create([
            'uuid' => $testUuid,
            'name' => 'Rotation Test Project',
            'code' => 'rot_test_'.Str::random(5),
            'status' => 'active',
        ]);

        $oldTokenData = $project->issueToken('initial_token');
        $oldToken = $oldTokenData['token'];

        // Rotate token
        $response = $this->postJson('/api/v1/projects/token/rotate', [], [
            'Authorization' => "Bearer {$oldToken}",
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'message',
            'new_project_token',
            'rotated_at',
        ]);

        $newToken = $response->json('new_project_token');
        $this->assertNotEquals($oldToken, $newToken);

        // Old token should now be rejected
        $oldResponse = $this->postJson('/api/v1/projects/heartbeat', [], [
            'Authorization' => "Bearer {$oldToken}",
        ]);
        $oldResponse->assertStatus(401);

        // New token should work
        $newResponse = $this->postJson('/api/v1/projects/heartbeat', [
            'project_uuid' => $testUuid,
        ], [
            'Authorization' => "Bearer {$newToken}",
        ]);
        $newResponse->assertStatus(200);
    }
}
