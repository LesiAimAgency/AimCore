<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Ehenho\Profile;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EhenhoThemeResolutionTest extends TestCase
{
    use RefreshDatabase;

    protected Tenant $tenant;

    protected Project $project;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::firstOrCreate(
            ['domain' => 'ehenho.local'],
            [
                'code' => 'ehenho',
                'name' => 'eHenho Dating',
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
    }

    public function test_ehenho_home_page_returns_ok_with_theme(): void
    {
        $response = $this->get('/ehenho');

        $response->assertStatus(200);
        $response->assertSee('eHenho.com');
        $response->assertSee('Tìm bạn bốn phương');
    }

    public function test_ehenho_static_pages_return_ok(): void
    {
        $aboutResponse = $this->get('/ehenho/gioi-thieu');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('Giới thiệu về eHenho.com');

        $termsResponse = $this->get('/ehenho/dieu-khoan-su-dung');
        $termsResponse->assertStatus(200);
        $termsResponse->assertSee('Điều khoản sử dụng');

        $privacyResponse = $this->get('/ehenho/chinh-sach-bao-mat');
        $privacyResponse->assertStatus(200);
        $privacyResponse->assertSee('Chính sách bảo mật thông tin');
    }

    public function test_ehenho_search_pages_return_ok(): void
    {
        $searchResponse = $this->get('/ehenho/tim-kiem');
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('Tìm bạn bốn phương, Hẹn hò, Kết bạn mới nhất');

        $byAgeResponse = $this->get('/ehenho/tim-ban-bon-phuong-theo-tuoi/23-27');
        $byAgeResponse->assertStatus(200);
        $byAgeResponse->assertSee('Tìm Bạn Bốn Phương Theo Nhóm Tuổi');
    }

    public function test_ehenho_auth_pages_return_ok(): void
    {
        $loginResponse = $this->get('/ehenho/dang-nhap');
        $loginResponse->assertStatus(200);
        $loginResponse->assertSee('Đăng Nhập Tài Khoản');

        $registerResponse = $this->get('/ehenho/dang-ky');
        $registerResponse->assertStatus(200);
        $registerResponse->assertSee('Đăng Ký Hồ Sơ Hẹn Hò');

        $resetResponse = $this->get('/ehenho/quen-mat-khau');
        $resetResponse->assertStatus(200);
        $resetResponse->assertSee('Khôi Phục Mật Khẩu');
    }

    public function test_ehenho_authenticated_account_flow(): void
    {
        $user = User::factory()->create([
            'email' => 'test_ehenho_'.uniqid().'@example.com',
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'display_name' => 'Ngọc Lan',
            'gender' => 'female',
            'age' => 26,
            'status' => 'active',
            'about_me' => 'Thích đọc sách và đi du lịch.',
        ]);

        $response = $this->actingAs($user)->get('/ehenho/tai-khoan');
        $response->assertStatus(200);
        $response->assertSee('Ngọc Lan');
        $response->assertSee('Hồ Sơ Của Tôi');

        $editResponse = $this->actingAs($user)->get('/ehenho/tai-khoan/chinh-sua');
        $editResponse->assertStatus(200);
        $editResponse->assertSee('Chỉnh Sửa Hồ Sơ Hẹn Hò');
    }
}
