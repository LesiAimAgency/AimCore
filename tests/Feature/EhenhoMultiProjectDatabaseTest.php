<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Ehenho\Profile;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Tenancy\DatabaseResolver;
use App\Services\Tenancy\ProjectContext;
use App\Services\Tenancy\ProjectResolver;
use App\Services\Tenancy\ThemeResolver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EhenhoMultiProjectDatabaseTest extends TestCase
{
    use RefreshDatabase;

    protected Tenant $ehenhoTenant;

    protected Project $ehenhoProject;

    protected Project $wkProject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->ehenhoTenant = Tenant::firstOrCreate(
            ['domain' => 'ehenho.local'],
            [
                'code' => 'ehenho',
                'name' => 'eHenho Tenant',
                'database_name' => 'core',
                'database_type' => 'mysql',
                'status' => 'active',
                'settings' => ['theme' => 'ehenho'],
            ]
        );

        $this->ehenhoProject = Project::firstOrCreate(
            ['code' => 'ehenho'],
            [
                'tenant_id' => $this->ehenhoTenant->id,
                'name' => 'eHenho Project',
                'external_domain' => 'ehenho.local',
                'status' => 'active',
                'project_type' => 'website',
            ]
        );

        $this->wkProject = Project::firstOrCreate(
            ['code' => 'wkcomputer'],
            [
                'name' => 'WKComputer Gaming',
                'status' => 'active',
                'project_type' => 'website',
            ]
        );
    }

    public function test_project_resolver_resolves_different_projects_from_uri(): void
    {
        $resolver = app(ProjectResolver::class);

        // Test ehenho first URI segment
        $req1 = Request::create('http://127.0.0.1:8000/ehenho');
        $resolved1 = $resolver->resolve($req1);
        $this->assertNotNull($resolved1);
        $this->assertEquals('ehenho', $resolved1->code);

        // Test wkcomputer first URI segment
        $req2 = Request::create('http://127.0.0.1:8000/wkcomputer');
        $resolved2 = $resolver->resolve($req2);
        $this->assertNotNull($resolved2);
        $this->assertEquals('wkcomputer', $resolved2->code);

        // Test external domain resolution
        $req3 = Request::create('http://ehenho.local/gioi-thieu');
        $resolved3 = $resolver->resolve($req3);
        $this->assertNotNull($resolved3);
        $this->assertEquals('ehenho', $resolved3->code);
    }

    public function test_theme_resolver_resolves_proper_themes(): void
    {
        $themeResolver = app(ThemeResolver::class);

        $this->assertEquals('ehenho', $themeResolver->resolve($this->ehenhoProject));
        $this->assertEquals('wkcomputerdemo', $themeResolver->resolve($this->wkProject));
    }

    public function test_database_resolver_connects_and_disconnects_safely(): void
    {
        $dbResolver = app(DatabaseResolver::class);

        // Connect
        $conn = $dbResolver->connect($this->ehenhoProject);
        $this->assertEquals('project', $conn);
        $this->assertNotNull(config('database.connections.project'));

        // Query through project connection
        $user = User::factory()->create();
        $profile = Profile::create([
            'user_id' => $user->id,
            'display_name' => 'Test Isolated User',
            'gender' => 'male',
            'age' => 30,
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'display_name' => 'Test Isolated User',
        ]);

        // Clean disconnect (Zero Connection State Leakage)
        $dbResolver->disconnect();
        $this->assertEquals(config('database.default'), DB::getDefaultConnection());
    }

    public function test_project_context_lifecycle(): void
    {
        $context = app(ProjectContext::class);

        $context->setProject($this->ehenhoProject);
        $context->setTheme('ehenho');
        $context->setConnection('project');

        $this->assertEquals('ehenho', $context->getProject()->code);
        $this->assertEquals('ehenho', $context->getTheme());
        $this->assertEquals('project', $context->getConnection());

        $context->clear();

        $this->assertNull($context->getProject());
        $this->assertNull($context->getTheme());
        $this->assertNull($context->getConnection());
    }
}
