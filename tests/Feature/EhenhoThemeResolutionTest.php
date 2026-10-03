<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Ehenho\Profile;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
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
        $registerResponse->assertSee('Đăng Ký Hồ Sơ Mới');

        $signupResponse = $this->get('/ehenho/accounts/signup');
        $signupResponse->assertStatus(200);
        $signupResponse->assertSee('Đăng Ký Hồ Sơ Mới');

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

    public function test_ehenho_unauthenticated_account_redirects_to_ehenho_login(): void
    {
        $response = $this->get('/ehenho/tai-khoan');
        $response->assertRedirect('/ehenho/dang-nhap');

        $editResponse = $this->get('/ehenho/tai-khoan/chinh-sua');
        $editResponse->assertRedirect('/ehenho/dang-nhap');
    }

    public function test_ehenho_login_redirects_to_intended_account_url(): void
    {
        $user = User::factory()->create([
            'email' => 'intended_'.uniqid().'@example.com',
            'password' => Hash::make('secret123'),
        ]);

        // Attempt to visit protected account edit page as guest
        $guestResponse = $this->get('/ehenho/tai-khoan/chinh-sua');
        $guestResponse->assertRedirect('/ehenho/dang-nhap');

        // Log in with credentials
        $loginResponse = $this->post('/ehenho/dang-nhap', [
            'email' => $user->email,
            'password' => 'secret123',
        ]);

        // Should redirect to intended URL
        $loginResponse->assertRedirect('/ehenho/tai-khoan/chinh-sua');
    }

    public function test_ehenho_full_signup_stores_all_profile_fields(): void
    {
        $uniqueEmail = 'signup_tester_'.uniqid().'@example.com';

        $payload = [
            'email' => $uniqueEmail,
            'password' => 'secret123',
            'name' => 'Võ Thanh Hải',
            'dob_day' => 12,
            'dob_month' => 8,
            'dob_year' => 1983,
            'gender' => 'male',
            'marital_status' => 'single',
            'look_for' => 'long-term-love',
            'height' => '176',
            'weight' => '76',
            'education' => 'MAS',
            'province' => 'ca-mau',
            'district' => 'Thành phố Cà Mau',
            'headline' => 'Tìm bạn gái thật lòng để yêu đi đến hôn nhân',
            'i_am' => 'Là 1 kiến trúc sư và kinh doanh, sống có trách nhiệm và chân thành.',
            'my_match' => 'Nói được làm được và sống có trách nhiệm.',
            'appearance2_0' => '2', // Cao lớn
            'interest2_0' => '13', // Nấu ăn
            'personality2_0' => '12', // Mạnh mẽ
            'way_of_life' => '14', // Giản dị
            'most_valued' => '12', // Gia đình
            'occupation2_0' => '2', // Chủ doanh nghiệp
            'religion2_0' => '6', // Đạo khác
            'smoking2_0' => '1', // Không hút thuốc
            'drinking2_0' => '1', // Không uống rượu bia
            'children2_0' => '1', // Chưa có
        ];

        $response = $this->post('/ehenho/dang-ky', $payload);
        $response->assertSessionHasNoErrors();

        $user = User::where('email', $uniqueEmail)->first();
        $this->assertNotNull($user);
        $this->assertEquals('Võ Thanh Hải', $user->name);

        $profile = Profile::where('user_id', $user->id)->first();
        $this->assertNotNull($profile);
        $this->assertEquals('Võ Thanh Hải', $profile->display_name);
        $this->assertEquals('male', $profile->gender);
        $this->assertEquals('1983-08-12', $profile->birthday->format('Y-m-d'));
        $this->assertEquals('Độc thân', $profile->marital_status);
        $this->assertEquals('Tìm người yêu lâu dài', $profile->target_type);
        $this->assertEquals('176', $profile->height);
        $this->assertEquals('76', $profile->weight);
        $this->assertEquals('Cao học', $profile->education);
        $this->assertEquals('Cà Mau', $profile->province_name);
        $this->assertEquals('Thành phố Cà Mau', $profile->district_name);
        $this->assertEquals('Tìm bạn gái thật lòng để yêu đi đến hôn nhân', $profile->headline);
        $this->assertEquals('Là 1 kiến trúc sư và kinh doanh, sống có trách nhiệm và chân thành.', $profile->about_me);
        $this->assertEquals('Nói được làm được và sống có trách nhiệm.', $profile->looking_for);
        $this->assertEquals('Cao lớn', $profile->body_type);
        $this->assertEquals('Nấu ăn', $profile->interests);
        $this->assertEquals('Mạnh mẽ', $profile->personality);
        $this->assertEquals('Giản dị', $profile->lifestyle);
        $this->assertEquals('Gia đình', $profile->precious);
        $this->assertEquals('Chủ doanh nghiệp', $profile->occupation);
        $this->assertEquals('Đạo khác', $profile->religion);
        $this->assertEquals('Không hút thuốc', $profile->smoking);
        $this->assertEquals('Không uống rượu bia', $profile->drinking);
        $this->assertEquals('Chưa có', $profile->children);

        // Verify profile show page displays target type and own profile notice when viewed by owner
        $showResponse = $this->get('/ehenho/ho-so/'.$profile->id);
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Tìm người yêu lâu dài');
        $showResponse->assertSee('Đây là hồ sơ cá nhân của bạn');

        // Other user or guest sees direct message box
        auth()->logout();
        $guestShowResponse = $this->get('/ehenho/ho-so/'.$profile->id);
        $guestShowResponse->assertStatus(200);
        $guestShowResponse->assertSee('Gửi tin nhắn tới người này');
    }

    public function test_ehenho_dropdown_login_flow_and_my_profile_redirect(): void
    {
        $testUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'project_ids' => [$this->project->id],
            'email' => 'user_ngoc_anh_2@ehenho.local',
            'password' => Hash::make('123456'),
        ]);

        $loginResponse = $this->post('/ehenho/dang-nhap', [
            'email' => 'user_ngoc_anh_2@ehenho.local',
            'password' => '123456',
        ]);

        $loginResponse->assertRedirect(route('ehenho.account.my_profile'));
        $this->assertAuthenticatedAs($testUser);

        $myProfileHtmlResponse = $this->get('/ehenho/my-profile.html');
        $myProfileHtmlResponse->assertStatus(200);
        $myProfileHtmlResponse->assertSee('Hồ Sơ Của Tôi');

        $rootRedirectResponse = $this->get('/my-profile.html');
        $rootRedirectResponse->assertRedirect('/ehenho/tai-khoan');
    }

    public function test_ehenho_sidebar_menu_and_settings_cleanup(): void
    {
        $user = User::factory()->create([
            'email' => 'sidebar_tester_'.uniqid().'@example.com',
        ]);

        $response = $this->actingAs($user)->get('/ehenho/tai-khoan/chinh-sua');
        $response->assertStatus(200);
        $response->assertSee('Chỉnh sửa hồ sơ');
        $response->assertSee('Tin nhắn');
        $response->assertDontSee('Thiết lập tài khoản');

        // Verify /tai-khoan/thiet-lap redirects to profile_edit
        $settingsResponse = $this->actingAs($user)->get('/ehenho/tai-khoan/thiet-lap');
        $settingsResponse->assertRedirect(route('ehenho.account.profile_edit'));
    }

    public function test_ehenho_zalo_like_messenger_and_ajax_flow(): void
    {
        $user1 = User::factory()->create(['email' => 'user1_'.uniqid().'@example.com']);
        $user2 = User::factory()->create(['email' => 'user2_'.uniqid().'@example.com']);

        // 1. Sent page redirects to inbox
        $sentResponse = $this->actingAs($user1)->get('/ehenho/tin-nhan/da-gui');
        $sentResponse->assertRedirect('/ehenho/tin-nhan');

        // 2. Send message via AJAX POST
        $sendResponse = $this->actingAs($user1)->postJson('/ehenho/tin-nhan/gui', [
            'recipient_id' => $user2->id,
            'body' => 'Xin chào từ Zalo-like chat!',
        ]);

        $sendResponse->assertStatus(200);
        $sendResponse->assertJson(['success' => true]);
        $messageData = $sendResponse->json('message');
        $convId = $sendResponse->json('conversation_id');
        $this->assertEquals('Xin chào từ Zalo-like chat!', $messageData['body']);

        // 3. User2 views inbox
        $inboxResponse = $this->actingAs($user2)->get('/ehenho/tin-nhan');
        $inboxResponse->assertStatus(200);
        $inboxResponse->assertSee('Xin chào từ Zalo-like chat!');

        // 4. User2 polls for new messages
        $pollResponse = $this->actingAs($user2)->getJson("/ehenho/tin-nhan/hop-thu/{$convId}/poll?last_id=0");
        $pollResponse->assertStatus(200);
        $pollResponse->assertJson(['success' => true]);
        $this->assertNotEmpty($pollResponse->json('new_messages'));

        // 5. User2 fetches conversation via AJAX
        $ajaxConvResponse = $this->actingAs($user2)->getJson("/ehenho/tin-nhan/hop-thu/{$convId}");
        $ajaxConvResponse->assertStatus(200);
        $ajaxConvResponse->assertJson(['success' => true, 'conversation_id' => $convId]);
    }

    public function test_ehenho_header_profile_button_consolidated(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/ehenho');
        $response->assertStatus(200);
        $response->assertSee('Chỉnh sửa hồ sơ');
        $response->assertDontSee('Hồ sơ của tôi');
    }

    public function test_ehenho_profile_block_feature(): void
    {
        $viewer = User::factory()->create();
        $targetUser = User::factory()->create();
        $targetProfile = Profile::create([
            'project_id' => $this->project->id,
            'user_id' => $targetUser->id,
            'slug' => 'vo-thanh-hai-82',
            'display_name' => 'Võ Thanh Hải',
            'gender' => 'male',
            'age' => 42,
            'status' => 'active',
        ]);

        // 1. Initial view shows "Chặn hồ sơ" button
        $response = $this->actingAs($viewer)->get('/ehenho/ho-so/vo-thanh-hai-82');
        $response->assertStatus(200);
        $response->assertSee('Chặn hồ sơ');
        $response->assertSee('Đánh dấu');
        $response->assertSee('Thích');

        // 2. Viewer blocks target profile
        $blockResponse = $this->actingAs($viewer)->post('/ehenho/tuong-tac/toggle', [
            'profile_id' => $targetProfile->id,
            'type' => 'block',
        ]);
        $blockResponse->assertSessionHas('success');

        // 3. View shows "Đã chặn" and warning banner
        $blockedViewResponse = $this->actingAs($viewer)->get('/ehenho/ho-so/vo-thanh-hai-82');
        $blockedViewResponse->assertStatus(200);
        $blockedViewResponse->assertSee('Đã chặn');
        $blockedViewResponse->assertSee('Hồ sơ đang bị chặn');

        // 4. Blocked list shows target profile
        $blockedListResponse = $this->actingAs($viewer)->get('/ehenho/da-chan');
        $blockedListResponse->assertStatus(200);
        $blockedListResponse->assertSee('Võ Thanh Hải');

        // 5. Attempting to send message to blocked profile fails
        $msgResponse = $this->actingAs($viewer)->postJson('/ehenho/tin-nhan/gui', [
            'recipient_id' => $targetUser->id,
            'body' => 'Chào bạn!',
        ]);
        $msgResponse->assertStatus(403);

        // 6. Unblocking works
        $unblockResponse = $this->actingAs($viewer)->post('/ehenho/tuong-tac/toggle', [
            'profile_id' => $targetProfile->id,
            'type' => 'block',
        ]);
        $unblockResponse->assertSessionHas('success');

        $unblockedViewResponse = $this->actingAs($viewer)->get('/ehenho/ho-so/vo-thanh-hai-82');
        $unblockedViewResponse->assertStatus(200);
        $unblockedViewResponse->assertSee('Chặn hồ sơ');
        $unblockedViewResponse->assertDontSee('Hồ sơ đang bị chặn');

        // 7. Verify user CANNOT block themselves
        $viewerProfile = Profile::firstOrCreate(
            ['user_id' => $viewer->id],
            [
                'project_id' => $this->project->id,
                'display_name' => $viewer->name,
                'slug' => 'viewer-profile-'.$viewer->id,
                'gender' => 'female',
                'age' => 28,
                'status' => 'active',
            ]
        );
        $selfBlockResponse = $this->actingAs($viewer)->post('/ehenho/tuong-tac/toggle', [
            'profile_id' => $viewerProfile->id,
            'type' => 'block',
        ]);
        $selfBlockResponse->assertSessionHas('error');

        // 8. Verify isolation: When viewer blocks target, another user does NOT see them as blocked
        $this->actingAs($viewer)->post('/ehenho/tuong-tac/toggle', [
            'profile_id' => $targetProfile->id,
            'type' => 'block',
        ]);

        $thirdUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'project_ids' => [$this->project->id],
        ]);
        $thirdUserListResponse = $this->actingAs($thirdUser)->get('/ehenho/da-chan');
        $thirdUserListResponse->assertStatus(200);
        $thirdUserListResponse->assertDontSee('Võ Thanh Hải');
        $thirdUserListResponse->assertSee('Danh sách chặn trống');

        $thirdUserDetailResponse = $this->actingAs($thirdUser)->get('/ehenho/ho-so/vo-thanh-hai-82');
        $thirdUserDetailResponse->assertStatus(200);
        $thirdUserDetailResponse->assertDontSee('Hồ sơ đang bị chặn');
        $thirdUserDetailResponse->assertSee('Chặn hồ sơ');

        // 9. Blocked person CANNOT unblock or interact with blocker; only blocker can unblock
        $targetUserDetailResponse = $this->actingAs($targetUser)->get('/ehenho/ho-so/'.$viewerProfile->slug);
        $targetUserDetailResponse->assertStatus(200);
        $targetUserDetailResponse->assertSee('Bạn đã bị thành viên này chặn');
        $targetUserDetailResponse->assertDontSee('Bỏ chặn');

        $targetUserTryUnblock = $this->actingAs($targetUser)->post('/ehenho/tuong-tac/toggle', [
            'profile_id' => $viewerProfile->id,
            'type' => 'block',
        ]);
        $targetUserTryUnblock->assertSessionHas('error');

        // Blocker can unblock
        $blockerUnblock = $this->actingAs($viewer)->post('/ehenho/tuong-tac/toggle', [
            'profile_id' => $targetProfile->id,
            'type' => 'block',
        ]);
        $blockerUnblock->assertSessionHas('success');
    }
}
