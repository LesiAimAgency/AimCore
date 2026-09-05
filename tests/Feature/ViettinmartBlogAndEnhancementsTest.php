<?php

namespace Tests\Feature;

use App\Models\Coupon;
use App\Models\Post;
use App\Models\Project;
use App\Models\Taxonomy;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ViettinmartBlogAndEnhancementsTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected User $admin;

    protected Taxonomy $category;

    protected Taxonomy $tag;

    protected Post $post;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'role' => 'admin',
            'level' => 1,
            'email' => 'admin@viettinmart.com',
        ]);

        $this->project = Project::factory()->create([
            'code' => 'viettinmart-eco',
            'name' => 'VietTinMart',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        request()->attributes->set('project', $this->project);

        $this->category = Taxonomy::create([
            'project_id' => $this->project->id,
            'tenant_id' => null,
            'taxonomy' => 'category',
            'name' => 'Mẹo Nhà Bếp & Bảo Quản',
            'slug' => 'meo-nha-bep-bao-quan',
            'status' => 'published',
            'order' => 1,
        ]);

        $this->tag = Taxonomy::create([
            'project_id' => $this->project->id,
            'tenant_id' => null,
            'taxonomy' => 'post_tag',
            'name' => 'Hải sản tươi',
            'slug' => 'hai-san-tuoi',
            'status' => 'published',
        ]);

        $this->post = Post::create([
            'project_id' => $this->project->id,
            'tenant_id' => null,
            'title' => 'Bí quyết chọn tôm thẻ chân trắng tươi ngon',
            'slug' => 'bi-quyet-chon-tom-the-chan-trang-tuoi-ngon',
            'post_type' => 'post',
            'status' => 'published',
            'excerpt' => 'Mô tả ngắn về cách chọn tôm thẻ tươi ngon.',
            'content' => '<h2>1. Quan sát đuôi tôm</h2><p>Nội dung chi tiết về cách chọn tôm tươi.</p>',
            'published_at' => now(),
            'author_id' => $this->admin->id,
        ]);

        DB::table('term_relationships')->insert([
            ['object_id' => $this->post->id, 'term_taxonomy_id' => $this->category->id, 'order' => 0],
            ['object_id' => $this->post->id, 'term_taxonomy_id' => $this->tag->id, 'order' => 0],
        ]);
    }

    public function test_post_has_categories_and_tags_relationship(): void
    {
        $this->assertEquals('Mẹo Nhà Bếp & Bảo Quản', $this->post->category?->name);
        $this->assertEquals(1, $this->post->taxonomies()->where('taxonomy', 'category')->count());
        $this->assertEquals(1, $this->post->taxonomies()->where('taxonomy', 'post_tag')->count());
        $this->assertEquals('Hải sản tươi', $this->post->tags->first()?->name);
    }

    public function test_taxonomy_scopes_filter_by_type(): void
    {
        $this->assertEquals(1, Taxonomy::categories()->count());
        $this->assertEquals(1, Taxonomy::tags()->count());
        $this->assertEquals('meo-nha-bep-bao-quan', Taxonomy::categories()->first()->slug);
        $this->assertEquals('hai-san-tuoi', Taxonomy::tags()->first()->slug);
    }

    public function test_posts_query_filters_by_category_term(): void
    {
        $catId = $this->category->id;
        $posts = Post::posts()->whereHas('taxonomies', function ($q) use ($catId) {
            $q->where('term_taxonomy_id', $catId);
        })->get();

        $this->assertCount(1, $posts);
        $this->assertEquals($this->post->id, $posts->first()->id);
    }

    public function test_posts_query_filters_by_tag_term(): void
    {
        $tagId = $this->tag->id;
        $posts = Post::posts()->whereHas('taxonomies', function ($q) use ($tagId) {
            $q->where('term_taxonomy_id', $tagId);
        })->get();

        $this->assertCount(1, $posts);
        $this->assertEquals($this->post->id, $posts->first()->id);
    }

    public function test_active_coupons_and_validation(): void
    {
        $coupon = Coupon::create([
            'project_id' => $this->project->id,
            'code' => 'WELCOMEVTM',
            'name' => 'Giảm 10%',
            'type' => 'percentage',
            'value' => 10,
            'min_order_value' => 150000,
            'start_date' => now()->subMonth(),
            'end_date' => now()->addYear(),
            'is_active' => true,
        ]);

        $this->assertTrue($coupon->is_active);
        $this->assertEquals(15000, $coupon->calculateDiscount(150000));
    }
}
