<?php

namespace Tests\Feature\Admin;

use App\Http\Middleware\CheckCmsRole;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoogleFontsEndpointTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $superAdminRole = Role::firstOrCreate(
            ['name' => 'super_admin'],
            ['display_name' => 'Super Admin', 'level' => 0]
        );

        $this->admin = User::create([
            'name' => 'Admin User',
            'username' => 'admin_test',
            'email' => 'admin@test.local',
            'password' => bcrypt('password123'),
            'role' => 'super_admin',
            'level' => 0,
            'status' => true,
        ]);
        $this->admin->roles()->attach($superAdminRole);
    }

    public function test_admin_can_access_google_fonts_endpoint_with_fallback_list(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/fonts/google');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['family', 'category', 'variants'],
        ]);

        $fonts = $response->json();
        $this->assertNotEmpty($fonts);

        $families = collect($fonts)->pluck('family')->toArray();
        $this->assertContains('Roboto', $families);
        $this->assertContains('Open Sans', $families);
        $this->assertContains('Montserrat', $families);
    }

    public function test_project_admin_can_access_google_fonts_endpoint(): void
    {
        $this->withoutMiddleware(CheckCmsRole::class);

        $project = Project::create([
            'name' => 'Test Site',
            'code' => 'TESTSITE',
            'status' => 'active',
        ]);

        $response = $this->actingAs($this->admin)->get("/{$project->code}/admin/fonts/google");

        $response->assertStatus(200);
        $fonts = $response->json();
        $this->assertNotEmpty($fonts);
    }
}
