<?php

namespace Tests\Feature\Auth;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProjectLoginAlgorithmCompatibilityTest extends TestCase
{
    use RefreshDatabase;

    private Project $project;

    protected function setUp(): void
    {
        parent::setUp();

        $this->project = Project::create([
            'name' => 'VietTinMart Eco',
            'code' => 'viettinmart-eco',
            'status' => 'active',
            'project_type' => 'website',
        ]);
    }

    public function test_login_with_bcrypt_password_succeeds(): void
    {
        $user = User::factory()->create([
            'username' => 'bcrypt_user',
            'role' => 'cms',
            'password' => Hash::make('secret123'),
            'project_ids' => [$this->project->id],
        ]);

        $response = $this->post("/{$this->project->code}/login", [
            'username' => 'bcrypt_user',
            'password' => 'secret123',
        ]);

        $response->assertRedirect("/{$this->project->code}/admin");
        $this->assertEquals($user->id, session('project_user_id'));
    }

    public function test_login_with_non_bcrypt_or_invalid_password_does_not_throw_runtime_exception(): void
    {
        // Argon2id hash for 'password123' if supported by system, or custom hash format
        $argonHash = defined('PASSWORD_ARGON2ID')
            ? password_hash('argon_pass', PASSWORD_ARGON2ID)
            : '$argon2id$v=19$m=65536,t=4,p=1$fakehashfakehashfakehashfakehashfakehashfakehashfakehash';

        $userId = \DB::table('users')->insertGetId([
            'username' => 'argon_user',
            'name' => 'Argon User',
            'email' => 'argon@test.local',
            'role' => 'cms',
            'password' => $argonHash,
            'project_ids' => json_encode([$this->project->id]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Wrong password should cleanly fail without throwing RuntimeException
        $response = $this->post("/{$this->project->code}/login", [
            'username' => 'argon_user',
            'password' => 'wrong_password',
        ]);

        $response->assertSessionHasErrors('username');
        $this->assertNull(session('project_user_id'));

        // Correct password should authenticate without throwing RuntimeException
        if (defined('PASSWORD_ARGON2ID')) {
            $response = $this->post("/{$this->project->code}/login", [
                'username' => 'argon_user',
                'password' => 'argon_pass',
            ]);

            $response->assertRedirect("/{$this->project->code}/admin");
            $this->assertEquals($userId, session('project_user_id'));

            $rehashedUser = User::withoutGlobalScopes()->find($userId);
            $this->assertNotNull($rehashedUser);
            $this->assertStringStartsWith('$2y$', $rehashedUser->password);
        }
    }

    public function test_admin_vtm_can_login_with_admin123_using_both_username_and_email(): void
    {
        $admin = User::factory()->create([
            'username' => 'admin_vtm',
            'email' => 'admin@viettinmart.com',
            'role' => 'cms',
            'password' => 'admin123',
            'project_ids' => [$this->project->id],
        ]);

        // Login using username
        $resUser = $this->post("/{$this->project->code}/login", [
            'username' => 'admin_vtm',
            'password' => 'admin123',
        ]);
        $resUser->assertRedirect("/{$this->project->code}/admin");
        $this->assertEquals($admin->id, session('project_user_id'));

        // Reset session
        session()->flush();

        // Login using email
        $resEmail = $this->post("/{$this->project->code}/login", [
            'username' => 'admin@viettinmart.com',
            'password' => 'admin123',
        ]);
        $resEmail->assertRedirect("/{$this->project->code}/admin");
        $this->assertEquals($admin->id, session('project_user_id'));
    }
}
