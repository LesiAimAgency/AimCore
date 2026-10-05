<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use App\Models\Project;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EhenhoSearchFilterTest extends TestCase
{
    use RefreshDatabase;

    protected Tenant $tenant;

    protected Project $project;

    protected Province $provinceHcm;

    protected Province $provinceHn;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::firstOrCreate(
            ['domain' => 'ehenho.local'],
            [
                'code' => 'ehenho',
                'name' => ' Dating',
                'database_name' => 'core',
                'database_type' => 'mysql',
                'status' => 'active',
                'settings' => ['theme' => 'ehenho'],
            ]
        );

        $this->project = Project::firstOrCreate(
            ['code' => 'ehenho'],
            [
                'tenant_id' => $this->tenant->id,
                'name' => 'eHenho Community Dating',
                'external_domain' => 'ehenho.local',
                'status' => 'active',
                'project_type' => 'website',
            ]
        );

        $this->provinceHcm = Province::create(['name' => 'Thành phố Hồ Chí Minh', 'slug' => 'ho-chi-minh']);
        $this->provinceHn = Province::create(['name' => 'Thành phố Hà Nội', 'slug' => 'ha-noi']);

        // Seed 4 test profiles
        Profile::create([
            'project_id' => $this->project->id,
            'display_name' => 'Thanh Thảo',
            'gender' => 'female',
            'age' => 24,
            'province_id' => $this->provinceHcm->id,
            'province_name' => 'Thành phố Hồ Chí Minh',
            'district_name' => 'Quận 1',
            'marital_status' => 'Độc thân',
            'looking_for' => 'Tìm người để kết hôn',
            'target_type' => 'Tìm người để kết hôn',
            'status' => 'active',
            'about_me' => 'Mong muốn tìm bạn đời chân thành tiến tới hôn nhân.',
        ]);

        Profile::create([
            'project_id' => $this->project->id,
            'display_name' => 'Minh Tuấn',
            'gender' => 'male',
            'age' => 30,
            'province_id' => $this->provinceHn->id,
            'province_name' => 'Thành phố Hà Nội',
            'district_name' => 'Cầu Giấy',
            'marital_status' => 'Độc thân',
            'looking_for' => 'Tìm người yêu lâu dài',
            'target_type' => 'Tìm người yêu lâu dài',
            'status' => 'active',
            'about_me' => 'Kỹ sư công nghệ, sống có trách nhiệm.',
        ]);
    }

    public function test_search_index_returns_all_active_profiles(): void
    {
        $response = $this->get('/ehenho/tim-kiem');

        $response->assertStatus(200);
        $response->assertSee('Thanh Thảo');
        $response->assertSee('Minh Tuấn');
        $response->assertSee('Bộ Lọc');
    }

    public function test_search_filter_by_gender(): void
    {
        $femaleResponse = $this->get('/ehenho/tim-kiem?gender=female');
        $femaleResponse->assertStatus(200);
        $femaleProfiles = $femaleResponse->viewData('profiles')->pluck('display_name');
        $this->assertTrue($femaleProfiles->contains('Thanh Thảo'));
        $this->assertFalse($femaleProfiles->contains('Minh Tuấn'));

        $maleResponse = $this->get('/ehenho/tim-kiem?gender=male');
        $maleResponse->assertStatus(200);
        $maleProfiles = $maleResponse->viewData('profiles')->pluck('display_name');
        $this->assertTrue($maleProfiles->contains('Minh Tuấn'));
        $this->assertFalse($maleProfiles->contains('Thanh Thảo'));
    }

    public function test_search_filter_by_normalized_looking_for_slugs(): void
    {
        // slug 'ket_hon' should match 'Tìm người để kết hôn'
        $response = $this->get('/ehenho/tim-kiem?looking_for=ket_hon');
        $response->assertStatus(200);
        $profiles = $response->viewData('profiles')->pluck('display_name');
        $this->assertTrue($profiles->contains('Thanh Thảo'));
        $this->assertFalse($profiles->contains('Minh Tuấn'));

        // slug 'nguoi_yeu' should match 'Tìm người yêu lâu dài'
        $response2 = $this->get('/ehenho/tim-kiem?looking_for=nguoi_yeu');
        $response2->assertStatus(200);
        $profiles2 = $response2->viewData('profiles')->pluck('display_name');
        $this->assertTrue($profiles2->contains('Minh Tuấn'));
        $this->assertFalse($profiles2->contains('Thanh Thảo'));
    }

    public function test_search_by_age_page_loads_with_matching_groups(): void
    {
        $response = $this->get('/ehenho/tim-ban-bon-phuong-theo-tuoi/22-28');
        $response->assertStatus(200);
        $response->assertSee('Tìm Bạn Bốn Phương Theo Nhóm Tuổi');
        $response->assertSee('TÌM BẠN NAM:');
        $response->assertSee('TÌM BẠN NỮ:');
        $profiles = $response->viewData('profiles')->pluck('display_name');
        $this->assertTrue($profiles->contains('Thanh Thảo'));
        $this->assertFalse($profiles->contains('Minh Tuấn'));
    }

    public function test_search_by_location_page_loads(): void
    {
        $response = $this->get('/ehenho/tim-ban-bon-phuong-theo-noi-o/'.$this->provinceHcm->id);
        $response->assertStatus(200);
        $response->assertSee('Thành phố Hồ Chí Minh');
        $profiles = $response->viewData('profiles')->pluck('display_name');
        $this->assertTrue($profiles->contains('Thanh Thảo'));
        $this->assertFalse($profiles->contains('Minh Tuấn'));
    }

    public function test_detailed_search_filter_page_loads(): void
    {
        $response = $this->get('/ehenho/tim-ban-bon-phuong-theo-chi-tiet');
        $response->assertStatus(200);
        $response->assertSee('Bộ Lọc Tìm Bạn Bốn Phương Chi Tiết');
        $response->assertSee('Thanh Thảo');
        $response->assertSee('Minh Tuấn');
    }

    public function test_footer_seo_category_routes(): void
    {
        // 1. Photos
        $this->get('/ehenho/tim-ban-bon-phuong-co-hinh')->assertStatus(200);
        $this->get('/ehenho/tim-ban-bon-phuong-co-hinh/nu')->assertStatus(200);
        $this->get('/ehenho/tim-ban-bon-phuong-co-hinh/nam')->assertStatus(200);

        // 2. Marital Status
        $this->get('/ehenho/tim-ban-doc-than')->assertStatus(200);
        $this->get('/ehenho/tim-ban-ly-di')->assertStatus(200);
        $this->get('/ehenho/tim-ban-o-goa')->assertStatus(200);

        // 3. Goals & Targets
        $this->get('/ehenho/tim-ban-gai-ket-hon')->assertStatus(200);
        $this->get('/ehenho/tim-ban-trai-ket-hon')->assertStatus(200);
        $this->get('/ehenho/tim-chong')->assertStatus(200);
        $this->get('/ehenho/tim-vo')->assertStatus(200);
        $this->get('/ehenho/tim-ban-chat')->assertStatus(200);

        // 4. Overseas & Regions
        $this->get('/ehenho/tim-ban-bon-phuong-o-my')->assertStatus(200);
        $this->get('/ehenho/tim-ban-bon-phuong-o-uc')->assertStatus(200);
        $this->get('/ehenho/tim-ban-bon-phuong-viet-nam')->assertStatus(200);

        // 5. Help & Privacy
        $this->get('/ehenho/tro-giup')->assertStatus(200);
        $this->get('/ehenho/chinh-sach-rieng-tu')->assertStatus(200);
    }
}
