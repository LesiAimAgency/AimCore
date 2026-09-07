<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantScopingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Tenant::forceCreate([
            'id' => 3,
            'name' => 'VietTinMart',
            'code' => 'viettinmart-eco',
            'domain' => 'viettinmart.local',
            'database_name' => 'fukkatsu_Animcore',
        ]);
    }

    public function test_user_query_does_not_fail_with_unknown_project_id_column(): void
    {
        session([
            'current_tenant_id' => 3,
            'current_project_id' => 10,
        ]);
        app()->instance('current_tenant_id', 3);
        app()->instance('current_project_id', 10);

        $user = User::factory()->create([
            'tenant_id' => 3,
            'project_ids' => [10],
        ]);

        // This query must not fail with SQLSTATE[42S22] Unknown column 'users.project_id'
        $found = User::find($user->id);

        $this->assertNotNull($found);
        $this->assertEquals($user->id, $found->id);
    }

    public function test_post_with_author_eager_loading_works_with_tenant_scope(): void
    {
        session([
            'current_tenant_id' => 3,
            'current_project_id' => 10,
        ]);
        app()->instance('current_tenant_id', 3);
        app()->instance('current_project_id', 10);

        $user = User::factory()->create([
            'name' => 'Author User',
            'tenant_id' => 3,
            'project_ids' => [10],
        ]);

        $project = Project::factory()->create([
            'id' => 10,
            'tenant_id' => 3,
            'code' => 'viettinmart-eco',
        ]);

        $post = Post::create([
            'title' => 'Test Post',
            'slug' => 'test-post-slug',
            'content' => 'Test content',
            'tenant_id' => 3,
            'project_id' => 10,
            'post_type' => 'post',
            'status' => 'published',
            'author_id' => $user->id,
        ]);

        $loadedPost = Post::where('slug', 'test-post-slug')->with('author')->first();

        $this->assertNotNull($loadedPost);
        $this->assertNotNull($loadedPost->author);
        $this->assertEquals($user->id, $loadedPost->author->id);
        $this->assertEquals('Author User', $loadedPost->author->name);
    }

    public function test_post_authored_by_superadmin_without_tenant_id_resolves_author(): void
    {
        session([
            'current_tenant_id' => 3,
            'current_project_id' => 10,
        ]);
        app()->instance('current_tenant_id', 3);
        app()->instance('current_project_id', 10);

        // Superadmin user with no tenant_id
        $superAdmin = User::factory()->create([
            'name' => 'Super Admin Root',
            'tenant_id' => null,
            'project_ids' => null,
            'role' => 'superadmin',
        ]);

        $project = Project::factory()->create([
            'id' => 10,
            'tenant_id' => 3,
            'code' => 'viettinmart-eco',
        ]);

        $post = Post::create([
            'title' => 'Admin Post',
            'slug' => 'admin-post-slug',
            'content' => 'Admin post content',
            'tenant_id' => 3,
            'project_id' => 10,
            'post_type' => 'post',
            'status' => 'published',
            'author_id' => $superAdmin->id,
        ]);

        $loadedPost = Post::where('slug', 'admin-post-slug')->with('author')->first();

        $this->assertNotNull($loadedPost);
        $this->assertNotNull($loadedPost->author);
        $this->assertEquals($superAdmin->id, $loadedPost->author->id);
        $this->assertEquals('Super Admin Root', $loadedPost->author->name);
    }
}
