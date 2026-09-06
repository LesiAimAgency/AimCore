<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\WidgetController;
use App\Models\Menu;
use App\Models\Project;
use App\Models\ProjectSettingModel;
use App\Models\Widget;
use App\Services\SettingsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MultisiteIsolationTest extends TestCase
{
    use RefreshDatabase;

    protected Project $projectA;

    protected Project $projectB;

    protected function setUp(): void
    {
        parent::setUp();

        $this->projectA = Project::create([
            'name' => 'Project Site A',
            'code' => 'site-a',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->projectB = Project::create([
            'name' => 'Project Site B',
            'code' => 'site-b',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        SettingsService::getInstance()->clearCache();
    }

    public function test_settings_service_loads_value_and_payload_with_project_scoping(): void
    {
        DB::table('settings')->insert([
            'project_id' => $this->projectA->id,
            'key' => 'site_name',
            'payload' => null,
            'value' => 'Site A Custom Name',
            'group' => 'general',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        request()->attributes->set('project', $this->projectA);
        SettingsService::getInstance()->clearCache();

        $siteName = setting('site_name');
        $this->assertEquals('Site A Custom Name', $siteName);
    }

    public function test_project_settings_are_strictly_isolated_between_projects(): void
    {
        request()->attributes->set('project', $this->projectA);
        ProjectSettingModel::set('unique_feature_flag', 'enabled_on_a');
        SettingsService::getInstance()->clearCache();

        $this->assertEquals('enabled_on_a', setting('unique_feature_flag'));

        request()->attributes->set('project', $this->projectB);
        SettingsService::getInstance()->clearCache();

        $this->assertNull(setting('unique_feature_flag'));
    }

    public function test_widgets_are_scoped_to_each_project(): void
    {
        Widget::create([
            'project_id' => $this->projectA->id,
            'name' => 'Site A Footer Column 1',
            'type' => 'vtm_footer_column',
            'area' => 'footer',
            'sort_order' => 1,
            'is_active' => true,
            'settings' => ['title' => 'Col A'],
        ]);

        Widget::create([
            'project_id' => $this->projectB->id,
            'name' => 'Site B Footer Column 1',
            'type' => 'vtm_footer_column',
            'area' => 'footer',
            'sort_order' => 1,
            'is_active' => true,
            'settings' => ['title' => 'Col B'],
        ]);

        $widgetsA = Widget::where('project_id', $this->projectA->id)->pluck('name')->toArray();
        $widgetsB = Widget::where('project_id', $this->projectB->id)->pluck('name')->toArray();

        $this->assertEquals(['Site A Footer Column 1'], $widgetsA);
        $this->assertEquals(['Site B Footer Column 1'], $widgetsB);
    }

    public function test_widget_get_menu_resolves_project_menu(): void
    {
        Widget::create([
            'project_id' => $this->projectA->id,
            'name' => 'Site A Header Menu',
            'type' => 'vtm_menu',
            'area' => 'header-menu',
            'sort_order' => 1,
            'is_active' => true,
            'settings' => [
                'items' => [
                    ['label' => 'Home', 'url' => '/'],
                    ['label' => 'About', 'url' => '/about'],
                ],
            ],
        ]);

        request()->attributes->set('project', $this->projectA);
        session(['current_project_id' => $this->projectA->id]);
        app()->instance('current_project_id', $this->projectA->id);

        $menu = Widget::getMenu('header-menu');
        $this->assertIsArray($menu);
        $this->assertCount(2, $menu);
        $this->assertEquals('Home', $menu[0]['label']);
    }

    public function test_clear_area_and_save_widgets_only_affect_target_project(): void
    {
        Widget::create([
            'project_id' => $this->projectA->id,
            'name' => 'Widget Site A',
            'type' => 'vtm_feature_icons',
            'area' => 'homepage-main',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Widget::create([
            'project_id' => $this->projectB->id,
            'name' => 'Widget Site B',
            'type' => 'vtm_feature_icons',
            'area' => 'homepage-main',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $request = Request::create('/site-a/admin/widgets/clear-area', 'POST', ['area' => 'homepage-main']);
        $request->attributes->set('project', $this->projectA);
        $controller = app(WidgetController::class);

        $response = $controller->clearArea($request);
        $this->assertTrue($response->getData()->success);

        // Project A widget must be cleared
        $this->assertEquals(0, Widget::where('project_id', $this->projectA->id)->where('area', 'homepage-main')->count());

        // Project B widget must remain intact!
        $this->assertEquals(1, Widget::where('project_id', $this->projectB->id)->where('area', 'homepage-main')->count());
    }

    public function test_menus_can_share_slugs_across_different_projects(): void
    {
        $menuA = Menu::create([
            'project_id' => $this->projectA->id,
            'name' => 'Menu Site A',
            'slug' => 'main-menu',
            'location' => 'header',
            'is_active' => true,
        ]);

        $menuB = Menu::create([
            'project_id' => $this->projectB->id,
            'name' => 'Menu Site B',
            'slug' => 'main-menu',
            'location' => 'header',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('menus', ['id' => $menuA->id, 'project_id' => $this->projectA->id, 'slug' => 'main-menu']);
        $this->assertDatabaseHas('menus', ['id' => $menuB->id, 'project_id' => $this->projectB->id, 'slug' => 'main-menu']);
    }

    public function test_admin_menu_controller_strictly_filters_by_project(): void
    {
        Menu::create([
            'project_id' => $this->projectA->id,
            'name' => 'Menu Site A Only',
            'slug' => 'menu-site-a',
            'location' => 'header',
            'is_active' => true,
        ]);

        Menu::create([
            'project_id' => $this->projectB->id,
            'name' => 'Menu Site B Only',
            'slug' => 'menu-site-b',
            'location' => 'header',
            'is_active' => true,
        ]);

        request()->attributes->set('project', $this->projectA);
        session(['current_project_id' => $this->projectA->id]);

        $controller = new MenuController;
        $viewA = $controller->index();
        $menusA = $viewA->getData()['menus'];

        $this->assertTrue($menusA->contains('name', 'Menu Site A Only'));
        $this->assertFalse($menusA->contains('name', 'Menu Site B Only'));

        request()->attributes->set('project', $this->projectB);
        session(['current_project_id' => $this->projectB->id]);

        $viewB = $controller->index();
        $menusB = $viewB->getData()['menus'];

        $this->assertTrue($menusB->contains('name', 'Menu Site B Only'));
        $this->assertFalse($menusB->contains('name', 'Menu Site A Only'));
    }
}
