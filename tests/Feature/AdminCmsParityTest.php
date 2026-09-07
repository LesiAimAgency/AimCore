<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCmsParityTest extends TestCase
{
    use RefreshDatabase;

    protected Project $wkProject;

    protected Project $vtmProject;

    protected User $wkAdmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->wkProject = Project::create([
            'name' => 'WKComputer Gaming & PC',
            'code' => 'wkcomputer',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->vtmProject = Project::create([
            'name' => 'VietTinMart',
            'code' => 'viettinmart-eco',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->wkAdmin = User::factory()->create([
            'username' => 'wkcomputer',
            'email' => 'admin@wkcomputer.local',
            'role' => 'admin',
            'project_ids' => [$this->wkProject->id],
        ]);
    }

    public function test_wk_admin_can_access_products_page(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/products');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_categories_page(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/categories');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_widgets_page(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/widgets');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_form_submissions_page(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/form-submissions');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_settings_pages(): void
    {
        $tabs = ['general', 'contact', 'social', 'seo', 'header', 'footer'];

        foreach ($tabs as $tab) {
            $response = $this->withSession([
                'project_user_id' => $this->wkAdmin->id,
                'project_user_username' => $this->wkAdmin->username,
                'current_project' => 'wkcomputer',
            ])->get("/wkcomputer/admin/settings?tab={$tab}");

            $response->assertStatus(200);
        }
    }

    public function test_wk_admin_can_access_dashboard(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_appearance_settings(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/settings/appearance');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_media_list(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/media/list');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_orders_page(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/orders');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_access_posts_page(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/posts');

        $response->assertStatus(200);
    }

    public function test_wk_admin_can_load_deal_flash_widget_fields(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/widgets/fields?type=wk_deal_flash');

        $response->assertStatus(200);
        // Verify picktime fields are present in deal flash widget
        $response->assertSee('start_date');
        $response->assertSee('end_date');
        $response->assertSee('product_ids');
    }

    public function test_wk_admin_pages_consistently_render_wkcomputer_sidebar(): void
    {
        $routes = [
            '/wkcomputer/admin',
            '/wkcomputer/admin/products',
            '/wkcomputer/admin/categories',
            '/wkcomputer/admin/orders',
            '/wkcomputer/admin/settings',
            '/wkcomputer/admin/widgets',
        ];

        foreach ($routes as $url) {
            $response = $this->withSession([
                'project_user_id' => $this->wkAdmin->id,
                'project_user_username' => $this->wkAdmin->username,
                'current_project' => 'wkcomputer',
            ])->get($url);

            $response->assertStatus(200);
            $response->assertSee('wk-sidebar');
            $response->assertSee('WKcomputer');
        }
    }
}
