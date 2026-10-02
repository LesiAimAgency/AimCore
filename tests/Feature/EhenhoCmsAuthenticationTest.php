<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\EhenhoMasterSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EhenhoCmsAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_ehenho_master_seeder_creates_cms_user_and_project(): void
    {
        $this->seed(EhenhoMasterSeeder::class);

        $tenant = Tenant::where('code', 'ehenho')->first();
        $this->assertNotNull($tenant);

        $project = Project::where('code', 'ehenho')->first();
        $this->assertNotNull($project);
        $this->assertEquals('cms_ehenho', $project->project_admin_username);

        $cmsUser = User::where('email', 'cms@ehenho.local')->first();
        $this->assertNotNull($cmsUser);
        $this->assertEquals('cms_ehenho', $cmsUser->username);
        $this->assertEquals('cms', $cmsUser->role);
        $this->assertTrue(Hash::check('password123', $cmsUser->password));
    }

    public function test_cms_user_can_login_to_ehenho_cms_via_username_and_email(): void
    {
        $this->seed(EhenhoMasterSeeder::class);

        // 1. Login with username
        $responseUser = $this->post('/ehenho/login', [
            'username' => 'cms_ehenho',
            'password' => 'password123',
        ]);

        $responseUser->assertRedirect('/ehenho/admin');
        $this->assertNotNull(session('project_user_id'));

        // Reset session
        session()->flush();

        // 2. Login with email
        $responseEmail = $this->post('/ehenho/login', [
            'username' => 'cms@ehenho.local',
            'password' => 'password123',
        ]);

        $responseEmail->assertRedirect('/ehenho/admin');
        $this->assertNotNull(session('project_user_id'));
    }

    public function test_authenticated_cms_admin_can_access_ehenho_admin_dashboard(): void
    {
        $this->seed(EhenhoMasterSeeder::class);

        $this->post('/ehenho/login', [
            'username' => 'cms_ehenho',
            'password' => 'password123',
        ]);

        $response = $this->get('/ehenho/admin');
        $response->assertStatus(200);
    }

    public function test_ehenho_frontend_shows_cms_link_when_logged_in_as_cms_admin(): void
    {
        $this->seed(EhenhoMasterSeeder::class);

        $cmsUser = User::where('email', 'cms@ehenho.local')->first();
        $this->assertNotNull($cmsUser);

        // Login via frontend web guard
        $response = $this->actingAs($cmsUser)->get('/ehenho/tai-khoan');
        $response->assertStatus(200);
        $response->assertSee('Trang Quản Trị CMS');
        $response->assertSee('CMS Quản trị');
    }
}
