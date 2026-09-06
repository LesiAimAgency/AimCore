<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\MenuController;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Project;
use App\Models\User;
use App\Models\Widget;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class MenuManagementTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->project = Project::create([
            'name' => 'Demo Menu Project',
            'slug' => 'demo-menu-project',
            'code' => 'demo-menu-project',
            'is_active' => true,
        ]);

        $this->user = User::factory()->create();
    }

    public function test_menu_item_supports_icon_image_badge_and_target(): void
    {
        $menu = Menu::create([
            'project_id' => $this->project->id,
            'name' => 'Header Navigation',
            'slug' => 'header-menu',
            'location' => 'header',
            'is_active' => true,
        ]);

        $item = MenuItem::create([
            'menu_id' => $menu->id,
            'project_id' => $this->project->id,
            'title' => 'Hot Deals',
            'url' => '/hot-deals',
            'target' => '_blank',
            'icon' => 'fa-solid fa-fire',
            'image' => 'uploads/hot.png',
            'badge' => 'HOT',
            'badge_color' => '#ff0000',
            'order' => 1,
        ]);

        $this->assertDatabaseHas('menu_items', [
            'id' => $item->id,
            'title' => 'Hot Deals',
            'target' => '_blank',
            'icon' => 'fa-solid fa-fire',
            'image' => 'uploads/hot.png',
            'badge' => 'HOT',
            'badge_color' => '#ff0000',
        ]);
    }

    public function test_update_tree_persists_parent_child_hierarchy(): void
    {
        $menu = Menu::create([
            'project_id' => $this->project->id,
            'name' => 'Main Menu',
            'slug' => 'main-menu',
            'location' => 'header',
            'is_active' => true,
        ]);

        $parent = MenuItem::create([
            'menu_id' => $menu->id,
            'project_id' => $this->project->id,
            'title' => 'Products',
            'url' => '/products',
            'order' => 1,
        ]);

        $child1 = MenuItem::create([
            'menu_id' => $menu->id,
            'project_id' => $this->project->id,
            'title' => 'Vegetables',
            'url' => '/vegetables',
            'order' => 2,
        ]);

        $child2 = MenuItem::create([
            'menu_id' => $menu->id,
            'project_id' => $this->project->id,
            'title' => 'Meat',
            'url' => '/meat',
            'order' => 3,
        ]);

        $controller = new MenuController;
        $request = Request::create('/admin/menus/'.$menu->id.'/tree', 'POST', [
            'tree' => [
                ['id' => $parent->id, 'parent_id' => null, 'order' => 1],
                ['id' => $child1->id, 'parent_id' => $parent->id, 'order' => 1],
                ['id' => $child2->id, 'parent_id' => $parent->id, 'order' => 2],
            ],
        ]);

        $response = $controller->updateTree($request, $menu->id);
        $this->assertTrue($response->getData()->success);

        $this->assertNull($parent->fresh()->parent_id);
        $this->assertEquals($parent->id, $child1->fresh()->parent_id);
        $this->assertEquals($parent->id, $child2->fresh()->parent_id);
    }

    public function test_widget_get_menu_resolves_dynamic_menu_with_badges_and_children(): void
    {
        $menu = Menu::create([
            'project_id' => $this->project->id,
            'name' => 'Header Menu',
            'slug' => 'header-menu',
            'location' => 'header',
            'is_active' => true,
        ]);

        $parent = MenuItem::create([
            'menu_id' => $menu->id,
            'project_id' => $this->project->id,
            'title' => 'Shop',
            'url' => '/shop',
            'badge' => 'NEW',
            'badge_color' => '#10b981',
            'order' => 1,
        ]);

        $child = MenuItem::create([
            'menu_id' => $menu->id,
            'project_id' => $this->project->id,
            'parent_id' => $parent->id,
            'title' => 'Organic Food',
            'url' => '/shop/organic',
            'order' => 1,
        ]);

        app()->instance('current_project', $this->project);
        app()->instance('current_project_id', $this->project->id);

        $menuItems = Widget::getMenu('header-menu');

        $this->assertCount(1, $menuItems);
        $this->assertEquals('Shop', $menuItems[0]['label']);
        $this->assertEquals('NEW', $menuItems[0]['badge']);
        $this->assertEquals('#10b981', $menuItems[0]['badge_color']);
        $this->assertCount(1, $menuItems[0]['children']);
        $this->assertEquals('Organic Food', $menuItems[0]['children'][0]['label']);
    }
}
