<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaPickerTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected ProjectUser $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');

        Tenant::forceCreate([
            'id' => 3,
            'name' => 'VietTinMart',
            'code' => 'viettinmart-eco',
            'domain' => 'viettinmart.local',
            'database_name' => 'fukkatsu_Animcore',
        ]);

        $this->project = Project::factory()->create([
            'id' => 10,
            'code' => 'viettinmart-eco',
            'name' => 'VietTinMart',
            'status' => 'active',
            'project_type' => 'website',
            'tenant_id' => 3,
        ]);

        $this->admin = ProjectUser::forceCreate([
            'username' => 'admin_test',
            'name' => 'Admin Test',
            'role' => 'admin',
            'level' => 1,
            'tenant_id' => 3,
            'project_ids' => [$this->project->id],
        ]);
    }

    public function test_media_list_returns_folders_and_files_json(): void
    {
        // Put a fake file into project media and shared media
        Storage::disk('public')->put('media/project-viettinmart-eco/test-banner.jpg', 'fake-image');
        Storage::disk('public')->put('media/shared-logo.png', 'fake-logo');
        Storage::disk('public')->makeDirectory('media/products');

        $response = $this->withSession([
            'project_user_id' => $this->admin->id,
            'current_project' => $this->project->code,
        ])->getJson('/viettinmart-eco/admin/media/list');

        $response->assertOk();
        $response->assertJsonStructure([
            'folders' => [
                '*' => ['name', 'path'],
            ],
            'files' => [
                '*' => ['id', 'name', 'url', 'path'],
            ],
        ]);

        $files = collect($response->json('files'))->pluck('name')->all();
        $this->assertContains('test-banner.jpg', $files);
        $this->assertContains('shared-logo.png', $files);

        $folders = collect($response->json('folders'))->pluck('name')->all();
        $this->assertContains('products', $folders);
    }

    public function test_media_upload_endpoint_successfully_stores_files(): void
    {
        $file = UploadedFile::fake()->image('my_uploaded_logo.png', 200, 200);

        $response = $this->withSession([
            'project_user_id' => $this->admin->id,
            'current_project' => $this->project->code,
        ])->postJson('/viettinmart-eco/admin/media/upload', [
            'files' => [$file],
            'path' => '',
        ]);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonStructure([
            'uploaded' => [
                '*' => ['id', 'name', 'url', 'path'],
            ],
        ]);

        $uploadedFile = $response->json('uploaded.0');
        $this->assertNotEmpty($uploadedFile['url']);
        Storage::disk('public')->assertExists($uploadedFile['path']);
    }

    public function test_appearance_settings_page_renders_media_picker(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->admin->id,
            'current_project' => $this->project->code,
        ])->get('/viettinmart-eco/admin/settings/group/appearance');

        $response->assertOk();
        $response->assertSee('media-picker-modal', false);
        $response->assertSee('openMediaPicker', false);
    }
}
