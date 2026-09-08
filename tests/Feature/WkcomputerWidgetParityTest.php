<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use App\Widgets\WidgetRegistry;
use Database\Seeders\WkcomputerWidgetsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WkcomputerWidgetParityTest extends TestCase
{
    use RefreshDatabase;

    protected Project $wkProject;

    protected User $wkAdmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->wkProject = Project::create([
            'name' => 'WKComputer Gaming & PC',
            'code' => 'wkcomputer',
            'status' => 'active',
            'project_type' => 'website',
            'tenant_id' => 4,
        ]);

        $this->wkAdmin = User::factory()->create([
            'username' => 'wkcomputer_admin',
            'email' => 'admin@wkcomputer.test',
            'role' => 'admin',
            'project_ids' => [$this->wkProject->id],
        ]);

        $seeder = new WkcomputerWidgetsSeeder;
        $seeder->run($this->wkProject->id, $this->wkProject->id);
    }

    public function test_wkcomputer_homepage_renders_widgets_cleanly(): void
    {
        $response = $this->get('/wkcomputer');
        $response->assertStatus(200);

        // Check key widgets are rendered on homepage
        $response->assertSee('WK Store PC Gaming Gear');
        $response->assertSee('Flash Sale Gaming Gear');
        $response->assertSee('SẢN PHẨM BÁN CHẠY');
        $response->assertSee('PC GAMING & STREAMING');
        $response->assertSee('TIN TỨC CÔNG NGHỆ & REVIEW');
    }

    public function test_wk_admin_widgets_index_loads_successfully(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin/widgets');

        $response->assertStatus(200);
        $response->assertSee('Flash Sale Linh Kiện');
        $response->assertSee('Top Banner Slider');
        $response->assertSee('Sản Phẩm Bán Chạy Nhất');
    }

    public function test_all_wk_widget_types_render_preview_without_exception(): void
    {
        $types = [
            'html_custom',
            'hero_slider',
            'wk_hero_slider',
            'wk_deal_flash',
            'deal_flash',
            'product_section',
            'wk_product_featured',
            'posts_latest',
            'wk_posts_latest',
            'footer_column',
            'wk_footer_column',
        ];

        foreach ($types as $type) {
            $preview = WidgetRegistry::getPreview($type, ['project_id' => $this->wkProject->id]);
            $this->assertStringNotContainsString('Preview Error', $preview, "Widget preview error for {$type}");
            $this->assertStringNotContainsString('widget-error', $preview, "Widget error div for {$type}");
        }

        $heroPreview = WidgetRegistry::getPreview('wk_hero_slider', ['project_id' => $this->wkProject->id]);
        $this->assertStringNotContainsString('banner-dash-border', $heroPreview);
        $this->assertStringContainsString('wk-hero-banner-item', $heroPreview);
        $this->assertStringContainsString('/storage/media/project-wkcomputer/1788832998_banner1-1-min.png.webp', $heroPreview);
        $this->assertStringContainsString('/storage/media/project-wkcomputer/1788832996_baner-1.jpg.webp', $heroPreview);
    }

    public function test_wk_admin_widgets_preview_endpoint_does_not_fail_with_csrf_error(): void
    {
        // Even without CSRF token header or body, preview is permitted
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'wkcomputer',
        ])->post('/wkcomputer/admin/widgets/preview', [
            'type' => 'wk_deal_flash',
            'settings' => ['title' => 'Test Flash Sale'],
        ], ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $this->assertNotEmpty($response->json('preview'));
    }
}
