<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Setting;
use App\Models\Tenant;
use App\Models\User;
use App\Services\SettingsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViettinmartSettingsAndThemeOptionsTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected User $admin;

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

        $this->project = Project::factory()->create([
            'id' => 10,
            'code' => 'viettinmart-eco',
            'name' => 'VietTinMart',
            'status' => 'active',
            'project_type' => 'website',
            'tenant_id' => 3,
        ]);

        $this->admin = User::factory()->create([
            'role' => 'admin',
            'level' => 1,
            'tenant_id' => 3,
            'project_ids' => [$this->project->id],
        ]);

        request()->attributes->set('project', $this->project);
    }

    public function test_settings_service_stores_and_retrieves_scoped_settings(): void
    {
        $settingsService = SettingsService::getInstance();

        $settingsService->set('contact_email', 'cskh@viettinmart.vn');
        $this->assertEquals('cskh@viettinmart.vn', $settingsService->get('contact_email'));

        $settingsService->set('contact_phone', '(+84) 906 910 022');
        $this->assertEquals('(+84) 906 910 022', $settingsService->get('contact_phone'));
    }

    public function test_theme_layout_helper_reads_project_theme_option_layout(): void
    {
        $layoutConfig = [
            'page_layout' => 'full-width',
            'post_layout' => 'sidebar-right',
            'post_category_layout' => 'sidebar-right',
            'product_layout' => 'full-width',
            'product_category_layout' => 'sidebar-left',
        ];

        Setting::updateOrCreate(
            ['key' => 'theme_option_layout', 'project_id' => $this->project->id],
            ['payload' => $layoutConfig]
        );

        SettingsService::getInstance()->clearCache();

        $this->assertEquals('sidebar-right', get_theme_layout('post_category'));
        $this->assertEquals('sidebar-right', get_theme_layout('post'));
        $this->assertEquals('sidebar-left', get_theme_layout('product_category'));
        $this->assertEquals('full-width', get_theme_layout('page'));
    }

    public function test_theme_option_helper_reads_banner_and_post_category_tabs(): void
    {
        $bannerConfig = [
            'banner_height' => '220px',
            'banner_title_align' => 'center',
            'banner_container' => 'container',
        ];

        $postCatConfig = [
            'style' => 'grid',
            'posts_per_page' => 12,
            'excerpt_length' => 150,
            'readmore_text' => 'Xem chi tiết',
        ];

        Setting::updateOrCreate(
            ['key' => 'theme_option_banner', 'project_id' => $this->project->id],
            ['payload' => $bannerConfig]
        );

        Setting::updateOrCreate(
            ['key' => 'theme_option_post-category', 'project_id' => $this->project->id],
            ['payload' => $postCatConfig]
        );

        SettingsService::getInstance()->clearCache();

        $this->assertEquals('220px', get_theme_option('banner', 'banner_height'));
        $this->assertEquals('center', get_theme_option('banner', 'banner_title_align'));
        $this->assertEquals('grid', get_theme_option('post-category', 'style'));
        $this->assertEquals(150, get_theme_option('post-category', 'excerpt_length'));
        $this->assertEquals('Xem chi tiết', get_theme_option('post-category', 'readmore_text'));
    }

    public function test_fallback_defaults_when_theme_options_not_set(): void
    {
        SettingsService::getInstance()->clearCache();

        // Default layout fallback is 'full-width'
        $this->assertEquals('full-width', get_theme_layout('unknown_type'));
        $this->assertEquals('Default Value', get_theme_option('non_existent', 'some_key', 'Default Value'));
    }

    public function test_appearance_settings_group_route_renders_successfully(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->admin->id,
            'project_user_username' => $this->admin->username,
            'current_project' => 'viettinmart-eco',
        ])->get('/viettinmart-eco/admin/settings/group/appearance');

        $response->assertStatus(200);
        $response->assertSee('Cấu hình Giao diện');
        $response->assertSee('CRITICAL LAYOUT UTILITIES', false);
        $response->assertSee('Zero-FOUC Tab System', false);
        $response->assertSee('data-tab="design"', false);
        $response->assertSee('ap-tab-pane', false);
        $response->assertSee('data-admin-tab', false);
    }

    public function test_appearance_settings_update_correctly_saves_appearance_group(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->admin->id,
            'project_user_username' => $this->admin->username,
            'current_project' => 'viettinmart-eco',
        ])->put('/viettinmart-eco/admin/settings/group/appearance', [
            'settings' => [
                'topbar_show' => '1',
            ],
        ]);

        $response->assertStatus(302);

        $saved = \DB::table('settings')->where('key', 'topbar_show')->where('group', 'appearance')->first();
        $this->assertNotNull($saved);
        $this->assertEquals('1', $saved->value);
        $this->assertEquals('appearance', $saved->group);
    }

    public function test_settings_group_fallback_renders_for_unmapped_group(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->admin->id,
            'project_user_username' => $this->admin->username,
            'current_project' => 'viettinmart-eco',
        ])->get('/viettinmart-eco/admin/settings/group/customgroup');

        $response->assertStatus(200);
        $response->assertSee('Cấu hình Customgroup');
    }
}
