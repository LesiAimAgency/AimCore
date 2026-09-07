<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Project;
use App\Models\ProjectSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProjectApiHubTest extends TestCase
{
    use RefreshDatabase;

    private User $superAdmin;

    private Project $projectA;

    private Project $projectB;

    protected function setUp(): void
    {
        parent::setUp();

        $this->superAdmin = User::factory()->create([
            'role' => 'superadmin',
            'level' => 0,
        ]);

        $this->projectA = Project::factory()->create([
            'name' => 'Project A Store',
            'code' => 'project-a',
            'api_token' => 'token-secret-a-123',
            'cms_features' => [],
        ]);

        $this->projectB = Project::factory()->create([
            'name' => 'Project B Store',
            'code' => 'project-b',
            'api_token' => 'token-secret-b-456',
            'cms_features' => [],
        ]);
    }

    public function test_superadmin_can_view_api_hub_tab(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.projects.config', $this->projectA));

        $response->assertStatus(200);
        $response->assertSee('API Hub & Tích hợp', false);
        $response->assertSee('OpenAI API Key');
        $response->assertSee('Gemini API Key');
        $response->assertSee('VietQR Ngân Hàng');
        $response->assertSee('Giao Hàng Nhanh (GHN)');
        $response->assertSee('Telegram Báo đơn hàng');
    }

    public function test_superadmin_can_save_api_keys_with_strict_project_isolation(): void
    {
        $payload = [
            'api' => [
                'openai_key' => 'sk-test-secret-openai-key-aaa',
                'gemini_key' => 'AIzaSy-test-gemini-key',
                'ai_default_model' => 'gpt-4o-mini',
                'vietqr_bank_id' => 'MB',
                'vietqr_account_no' => '0988776655',
                'vietqr_account_name' => 'CONG TY A',
                'vietqr_template' => 'compact2',
                'momo_partner_code' => 'MOMO_A_CODE',
                'ghn_token' => 'ghn-token-project-a',
                'telegram_bot_token' => '123456:TELEGRAM_A',
                'telegram_chat_id' => '-100999999',
            ],
            'custom_api_token' => 'custom-updated-token-a',
        ];

        $response = $this->actingAs($this->superAdmin)
            ->post(route('superadmin.projects.config', $this->projectA), $payload);

        $response->assertSessionHas('alert');

        // Verify Project A settings are saved
        $this->assertEquals('sk-test-secret-openai-key-aaa', ProjectSetting::get($this->projectA->id, 'api.openai_key'));
        $this->assertEquals('MB', ProjectSetting::get($this->projectA->id, 'api.vietqr_bank_id'));
        $this->assertEquals('0988776655', ProjectSetting::get($this->projectA->id, 'api.vietqr_account_no'));
        $this->assertEquals('ghn-token-project-a', ProjectSetting::get($this->projectA->id, 'api.ghn_token'));

        // Verify Project A api_token is updated
        $this->projectA->refresh();
        $this->assertEquals('custom-updated-token-a', $this->projectA->api_token);

        // Verify settings table synchronization for website storefront
        $dbSetting = DB::table('settings')
            ->where('project_id', $this->projectA->id)
            ->where('key', 'api.openai_key')
            ->first();
        $this->assertNotNull($dbSetting);
        $this->assertEquals('"sk-test-secret-openai-key-aaa"', $dbSetting->payload);

        // CRITICAL ISOLATION: Project B MUST NOT receive Project A's API keys
        $this->assertNull(ProjectSetting::get($this->projectB->id, 'api.openai_key'));
        $this->assertNull(ProjectSetting::get($this->projectB->id, 'api.vietqr_bank_id'));
        $this->assertEquals('token-secret-b-456', $this->projectB->api_token);
    }

    public function test_superadmin_can_export_database_with_project_isolation_and_settings(): void
    {
        // Add a setting for Project A
        DB::table('settings')->insert([
            'project_id' => $this->projectA->id,
            'key' => 'api.openai_key',
            'payload' => json_encode('sk-proj-secret-12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add a setting for Project B
        DB::table('settings')->insert([
            'project_id' => $this->projectB->id,
            'key' => 'api.openai_key',
            'payload' => json_encode('sk-proj-B-secret-99999'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('superadmin.projects.export-database', $this->projectA));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/sql; charset=UTF-8');
        $this->assertStringContainsString('attachment; filename="database_project-a.sql"', $response->headers->get('content-disposition'));

        $sqlContent = $response->getContent();

        // Must contain Project A's data
        $this->assertStringContainsString('sk-proj-secret-12345', $sqlContent);
        // Must NOT contain Project B's data
        $this->assertStringNotContainsString('sk-proj-B-secret-99999', $sqlContent);
    }
}
