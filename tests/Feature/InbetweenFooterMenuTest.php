<?php

namespace Tests\Feature;

use App\Models\Menu;
use App\Models\Project;
use App\Models\Widget;
use Database\Seeders\InbetweenV2MenuSeeder;
use Tests\TestCase;

class InbetweenFooterMenuTest extends TestCase
{
    public function test_inbetween_v2_menu_seeder_creates_footer_menu_with_items(): void
    {
        $this->seed(InbetweenV2MenuSeeder::class);

        $footerMenu = Menu::withoutGlobalScopes()
            ->where('project_id', 7)
            ->where('location', 'footer')
            ->where('is_active', true)
            ->with(['items' => fn($q) => $q->withoutGlobalScopes()->where('is_active', true)->whereNull('parent_id')->orderBy('order')])
            ->first();

        $this->assertNotNull($footerMenu);
        $this->assertCount(4, $footerMenu->items);

        $titles = $footerMenu->items->pluck('title')->toArray();
        $this->assertEquals(['About Us', 'Media', 'Beyond Business', 'Contact'], $titles);

        $urls = $footerMenu->items->pluck('url')->toArray();
        $this->assertEquals(['#inbetween-hero', '#inbetween-business', '#inbetween-business', '#inbetween-footer'], $urls);
    }

    public function test_footer_widget_view_renders_dynamic_footer_items(): void
    {
        $this->seed(InbetweenV2MenuSeeder::class);

        $project = Project::where('code', 'DA005')->first();
        request()->attributes->set('project', $project);

        $widget = Widget::where('type', 'inbetween_v2_footer')->first();

        $html = view('widgets.inbetween_v2.footer', [
            'widget' => $widget,
            'settings' => $widget?->settings ?? [],
        ])->render();

        $this->assertStringContainsString('About Us', $html);
        $this->assertStringContainsString('#inbetween-hero', $html);
        $this->assertStringContainsString('Media', $html);
        $this->assertStringContainsString('Beyond Business', $html);
        $this->assertStringContainsString('Contact', $html);
        $this->assertStringContainsString('#inbetween-footer', $html);
    }
}

