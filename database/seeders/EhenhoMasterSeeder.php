<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ehenho\Profile;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EhenhoMasterSeeder extends Seeder
{
    /**
     * Run the database seeds for eHenho Project & CMS.
     */
    public function run(): void
    {
        $this->command->info('=== BẮT ĐẦU SEEDER DỰ ÁN EHENHO ===');

        // 1. Ensure Tenant (search by code 'ehenho' first to avoid duplicate key)
        $tenant = Tenant::where('code', 'ehenho')->first();
        if (! $tenant) {
            $tenant = Tenant::where('domain', 'ehenho.local')->first();
            if ($tenant) {
                $tenant->code = 'ehenho';
            }
        }

        $activeDbName = config('database.connections.'.config('database.default').'.database', 'core');

        if (! $tenant) {
            $tenant = Tenant::create([
                'code' => 'ehenho',
                'name' => 'eHenho Dating & Social Network',
                'domain' => 'ehenho.local',
                'database_name' => $activeDbName,
                'settings' => [
                    'theme' => 'ehenho',
                    'language' => 'vi',
                ],
                'status' => 'active',
            ]);
        } else {
            $tenant->name = 'eHenho Dating & Social Network';
            $tenant->database_name = $activeDbName;
            $tenant->save();
        }
        $this->command->info("1. Tenant ID: {$tenant->id} ({$tenant->name})");

        // 2. Ensure Project (search by code 'DA010-EHENHO-DATING-SOCIAL-NETWORK' or 'ehenho' first to avoid duplicate key 'projects_code_unique')
        $project = Project::where('code', 'DA010-EHENHO-DATING-SOCIAL-NETWORK')
            ->orWhere('code', 'ehenho')
            ->first();

        if (! $project) {
            $project = Project::where('external_domain', 'ehenho.local')->first();
            if ($project) {
                $project->code = 'DA010-EHENHO-DATING-SOCIAL-NETWORK';
            }
        }

        if (! $project) {
            $project = Project::create([
                'code' => 'DA010-EHENHO-DATING-SOCIAL-NETWORK',
                'name' => 'eHenho Dating & Social Network',
                'subdomain' => 'https://aimagency.vn/DA010-EHENHO-DATING-SOCIAL-NETWORK',
                'external_domain' => 'ehenho.local',
                'tenant_id' => $tenant->id,
                'status' => 'active',
                'project_type' => 'website',
                'is_multi_tenancy' => true,
                'total_gold' => 1000,
            ]);
        } else {
            $project->name = 'eHenho Dating & Social Network';
            $project->tenant_id = $tenant->id;
            $project->status = 'active';
            $project->save();

            // Clear conflicting external_domain on other projects if any
            Project::where('id', '!=', $project->id)
                ->where('external_domain', 'ehenho.local')
                ->update(['external_domain' => null]);
        }

        // 3. Ensure / Sync CMS Admin User
        $cmsUsername = 'cms_ehenho';
        $cmsEmail = 'cms@ehenho.local';
        $cmsPassword = 'password123';

        $cmsUser = User::where('email', $cmsEmail)
            ->orWhere('username', $cmsUsername)
            ->first();

        if ($cmsUser) {
            $cmsUser->name = 'Quản Trị Viên ';
            $cmsUser->username = $cmsUsername;
            $cmsUser->email = $cmsEmail;
            $cmsUser->password = Hash::make($cmsPassword);
            $cmsUser->role = 'cms';
            $cmsUser->level = 1;
            $cmsUser->tenant_id = $tenant->id;
            $cmsUser->status = 1;

            $projectIds = is_array($cmsUser->project_ids)
                ? $cmsUser->project_ids
                : (json_decode($cmsUser->project_ids ?? '[]', true) ?: []);

            if (! in_array($project->id, $projectIds)) {
                $projectIds[] = $project->id;
            }
            $cmsUser->project_ids = $projectIds;
            $cmsUser->save();
        } else {
            $cmsUser = User::create([
                'name' => 'Quản Trị Viên eHenho',
                'username' => $cmsUsername,
                'email' => $cmsEmail,
                'password' => Hash::make($cmsPassword),
                'role' => 'cms',
                'level' => 1,
                'tenant_id' => $tenant->id,
                'project_ids' => [$project->id],
                'status' => 1,
            ]);
        }

        $this->command->info("2. CMS Admin User ID: {$cmsUser->id} - Email: {$cmsEmail} - User: {$cmsUsername} - Password: {$cmsPassword}");

        // 4. Update Project with CMS Admin credentials & metadata
        $project->admin_id = $cmsUser->id;
        $project->tenant_id = $tenant->id;
        $project->project_admin_username = $cmsUsername;
        $project->project_admin_password = Hash::make($cmsPassword);
        $project->project_admin_password_plain = encrypt($cmsPassword);
        $project->password_updated_at = now();
        $project->status = 'active';
        $project->project_type = 'website';
        $project->cms_features = [
            'blog',
            'contact',
            'gallery',
            'dating_profiles',
            'messenger',
            'social_connections',
        ];
        $project->save();

        $this->command->info("3. Cập nhật thông tin Project [{$project->code}] hoàn tất.");

        // 5. Ensure Profile for CMS User
        Profile::updateOrCreate(
            ['user_id' => $cmsUser->id],
            [
                'project_id' => $project->id,
                'display_name' => 'Quản Trị Viên ',
                'slug' => 'quan-tri-vien-ehenho-'.$cmsUser->id,
                'headline' => 'Ban Quản Trị eHenho.com - Hỗ trợ thành viên 24/7',
                'target_type' => 'Tìm bạn tâm sự',
                'gender' => 'other',
                'birthday' => '1995-01-01',
                'age' => 31,
                'province_name' => 'Thành phố Hồ Chí Minh',
                'district_name' => 'Quận 1',
                'marital_status' => 'Độc thân',
                'occupation' => 'Chủ doanh nghiệp',
                'about_me' => 'Tài khoản chính thức của Ban Quản Trị eHenho.com. Sẵn sàng hỗ trợ và giải đáp thắc mắc cho tất cả thành viên.',
                'looking_for' => 'Tìm bạn tâm sự - Kết nối cộng đồng văn minh, lịch sự.',
                'status' => 'active',
                'is_featured' => false,
                'is_online' => true,
                'last_active_at' => now(),
            ]
        );

        // 6. Ensure Default CMS Informational Pages in posts table
        $pages = [
            [
                'slug' => 'gioi-thieu',
                'title' => 'Giới Thiệu eHenho - Hẹn hò Online & Tìm bạn Bốn phương',
                'excerpt' => 'Giới thiệu về nền tảng mạng xã hội hẹn hò và kết bạn văn minh eHenho.com.',
                'content' => '<p class="lead">Chào mừng bạn đến với <strong>eHenho.com</strong> – Trang web hẹn hò online, kết bạn, tìm bạn bốn phương hàng đầu với sứ mệnh kết nối những trái tim đồng điệu một cách nghiêm túc, văn minh và hoàn toàn miễn phí.</p><h3>1. Sứ mệnh của chúng tôi</h3><p>Trong nhịp sống hiện đại bận rộn, việc tìm kiếm một người bạn tri kỷ, một người yêu lý tưởng hay một bạn đời nghiêm túc để đi đến hôn nhân trở nên khó khăn hơn. eHenho ra đời nhằm xóa bỏ mọi khoảng cách địa lý, mang lại một không gian kết nối thân thiện, an toàn và dễ sử dụng cho người Việt trên khắp mọi miền đất nước cũng như cộng đồng người Việt tại hải ngoại (Mỹ, Canada, Úc, Nhật, Pháp...).</p><h3>2. 100% Miễn phí & Độc lập</h3><p>Tại eHenho, mọi tính năng cơ bản như đăng ký hồ sơ, tìm kiếm theo tiêu chí (độ tuổi, giới tính, tỉnh thành, mục đích hẹn hò), gửi nhận tin nhắn trò chuyện đều được cung cấp hoàn toàn miễn phí. Bạn không phải trả các khoản phí ẩn để kết nối với những người bạn quan tâm.</p><h3>3. Bảo mật & Tôn trọng quyền riêng tư</h3><p>Chúng tôi coi trọng việc bảo vệ thông tin cá nhân của người dùng. Hệ thống hỗ trợ người dùng chủ động kiểm soát hiển thị thông tin, hình ảnh và danh bạ liên lạc của mình.</p>',
            ],
            [
                'slug' => 'dieu-khoan-su-dung',
                'title' => 'Điều Khoản Sử Dụng Dịch Vụ eHenho.com',
                'excerpt' => 'Các quy định và thỏa thuận sử dụng dịch vụ trên nền tảng eHenho.com.',
                'content' => '<p>Chào mừng bạn đến với eHenho.com. Bằng việc truy cập hoặc sử dụng dịch vụ của chúng tôi, bạn đồng ý tuân thủ và chịu sự ràng buộc bởi các điều khoản sử dụng dưới đây.</p><h3>1. Điều kiện đăng ký thành viên</h3><p>Bạn phải từ đủ 18 tuổi trở lên để tạo tài khoản và tham gia cộng đồng hẹn hò eHenho. Bạn cam kết thông tin cung cấp trong hồ sơ cá nhân là chính xác, chân thực và không giả mạo cá nhân khác.</p><h3>2. Hành vi bị nghiêm cấm</h3><ul><li>Đăng tải nội dung văn hóa phẩm đồi trụy, khiêu dâm, bạo lực hoặc trái với thuần phong mỹ tục.</li><li>Sử dụng trang web nhằm mục đích lừa đảo tài chính, môi giới bất hợp pháp hoặc phát tán tin rác (spam).</li><li>Quấy rối, đe dọa, xúc phạm danh dự, nhân phẩm hoặc quấy rầy đời tư của thành viên khác.</li></ul><h3>3. Quyền hạn của Ban Quản Trị</h3><p>Ban Quản Trị eHenho có quyền tạm khóa hoặc xóa vĩnh viễn bất kỳ tài khoản nào vi phạm các điều khoản trên mà không cần báo trước nhằm đảm bảo an toàn cho cả cộng đồng.</p>',
            ],
            [
                'slug' => 'chinh-sach-bao-mat',
                'title' => 'Chính Sách Bảo Mật Thông Tin & Quyền Riêng Tư',
                'excerpt' => 'Chính sách bảo vệ quyền riêng tư và dữ liệu cá nhân của người dùng tại eHenho.com.',
                'content' => '<p>eHenho.com cam kết bảo vệ tối đa quyền riêng tư và thông tin cá nhân của bạn theo đúng các quy định pháp luật hiện hành.</p><h3>1. Thu thập thông tin</h3><p>Chúng tôi chỉ thu thập các thông tin cần thiết phục vụ cho việc tạo hồ sơ ghép đôi, tìm kiếm bạn bè và liên lạc giữa các thành viên bao gồm: tên hiển thị, năm sinh, giới tính, địa phương, mục tiêu tìm bạn và giới thiệu bản thân.</p><h3>2. Bảo mật dữ liệu</h3><p>Mọi thông tin nhạy cảm như mật khẩu tài khoản đều được mã hóa bằng các thuật toán hiện đại. Chúng tôi cam kết tuyệt đối không bán hoặc chia sẻ thông tin cá nhân của người dùng cho bên thứ ba vì mục đích thương mại.</p><h3>3. Quyền của người dùng</h3><p>Bạn có toàn quyền chỉnh sửa, ẩn bớt thông tin hoặc xóa tài khoản cá nhân của mình bất kỳ lúc nào trong phần Cài đặt tài khoản.</p>',
            ],
            [
                'slug' => 'tro-giup',
                'title' => 'Trung Tâm Trợ Giúp & Hướng Dẫn Sử Dụng',
                'excerpt' => 'Hướng dẫn chi tiết các thao tác sử dụng, tìm kiếm bạn bè và nhắn tin trên eHenho.',
                'content' => '<h3>1. Cách tạo hồ sơ thu hút</h3><p>Để tăng cơ hội tìm được một nửa phù hợp, hãy cập nhật ảnh đại diện rõ nét, viết phần giới thiệu bản thân chân thành và nêu rõ mong muốn tìm bạn của mình.</p><h3>2. Tìm bạn bốn phương theo tiêu chí</h3><p>Bạn có thể sử dụng bộ lọc tìm kiếm theo tỉnh thành, độ tuổi, tình trạng hôn nhân (độc thân, ly dị, ở góa) hoặc mục tiêu kết bạn (kết hôn, tâm sự, người yêu lâu dài) ngay tại thanh điều hướng.</p><h3>3. Nhắn tin và kết nối</h3><p>Nhấp vào nút "Gửi tin nhắn" hoặc "Làm quen" trên hồ sơ thành viên bạn quan tâm để bắt đầu cuộc trò chuyện thân mật.</p>',
            ],
            [
                'slug' => 'an-toan-hen-ho',
                'title' => 'Cẩm Nang Hẹn Hò An Toàn & Phòng Tránh Lừa Đảo',
                'excerpt' => 'Những nguyên tắc vàng giúp bạn hẹn hò trực tuyến an toàn và tránh các rủi ro lừa đảo.',
                'content' => '<h3>1. Tuyệt đối không gửi tiền hoặc chuyển khoản</h3><p>Không bao giờ chuyển tiền, nạp thẻ hoặc chia sẻ thông tin tài khoản ngân hàng, mã OTP cho bất kỳ ai bạn mới quen qua mạng dù với bất cứ lý do gì.</p><h3>2. Giữ kín thông tin cá nhân nhạy cảm</h3><p>Không nên vội vàng cung cấp địa chỉ nhà riêng, nơi làm việc hoặc các tài liệu định danh cá nhân khi chưa đủ thời gian tìm hiểu và tin tưởng đối phương.</p><h3>3. Nguyên tắc khi gặp mặt trực tiếp</h3><ul><li>Luôn chọn địa điểm công cộng đông người (quán cà phê, nhà hàng, trung tâm thương mại).</li><li>Tự chủ động phương tiện đi lại và không để đối phương đón tại nhà riêng trong lần hẹn đầu.</li><li>Báo trước cho người thân hoặc bạn bè biết bạn sẽ đi đâu và gặp ai.</li></ul>',
            ],
            [
                'slug' => 'cau-hoi-thuong-gap',
                'title' => 'Câu Hỏi Thường Gặp (FAQ)',
                'excerpt' => 'Tổng hợp các câu hỏi thắc mắc thường gặp nhất của thành viên eHenho.com.',
                'content' => '<h3>1. Tham gia eHenho có mất phí không?</h3><p>Không. eHenho là mạng xã hội hẹn hò 100% miễn phí. Bạn có thể đăng ký, tìm kiếm hồ sơ và nhắn tin kết bạn mà không phải chi trả bất kỳ khoản phí nào.</p><h3>2. Làm sao để đổi mật khẩu hoặc thông tin cá nhân?</h3><p>Sau khi đăng nhập, bạn bấm vào biểu tượng Tài khoản ở góc phải phía trên và chọn "Chỉnh sửa hồ sơ" hoặc "Đổi mật khẩu".</p><h3>3. Làm thế nào khi gặp tài khoản có hành vi xấu hoặc quấy rối?</h3><p>Bạn có thể bấm vào nút "Chặn" ngay trong trang nhắn tin hoặc hồ sơ của người đó, đồng thời gửi phản hồi về Ban Quản Trị để được xử lý kịp thời.</p>',
            ],
            [
                'slug' => 'lien-he',
                'title' => 'Liên Hệ Ban Quản Trị eHenho.com',
                'excerpt' => 'Thông tin liên hệ, gửi phản hồi và hỗ trợ thành viên của eHenho.com.',
                'content' => '<h3>Kênh hỗ trợ thành viên chính thức</h3><p>Nếu bạn có bất kỳ thắc mắc, đóng góp ý kiến hoặc cần hỗ trợ kỹ thuật liên quan đến tài khoản, vui lòng liên hệ:</p><ul><li><strong>Email hỗ trợ:</strong> hi@ehenho.com</li><li><strong>Thời gian làm việc:</strong> 24/7 (Phản hồi trong vòng 24 giờ)</li><li><strong>Trụ sở quản trị:</strong> Hệ thống mạng xã hội hẹn hò eHenho Việt Nam</li></ul><p>Ban Quản Trị luôn sẵn sàng lắng nghe và hỗ trợ các bạn xây dựng một cộng đồng kết nối văn minh, lành mạnh.</p>',
            ],
        ];

        foreach ($pages as $p) {
            Post::withoutGlobalScopes()->updateOrCreate(
                [
                    'project_id' => $project->id,
                    'slug' => $p['slug'],
                    'post_type' => 'page',
                ],
                [
                    'tenant_id' => $tenant->id,
                    'title' => $p['title'],
                    'excerpt' => $p['excerpt'] ?? null,
                    'content' => $p['content'],
                    'status' => 'published',
                    'published_at' => now(),
                    'author_id' => $cmsUser->id,
                ]
            );
        }
        $this->command->info('4. Seeding các trang tĩnh CMS (Giới thiệu, Điều khoản, Bảo mật, Trợ giúp, An toàn, FAQ, Liên hệ) hoàn tất.');

        // 7. Call Rich Demo Seeder to ensure demo dating profiles and catalogs
        $this->command->info('5. Seeding danh mục tỉnh thành và hồ sơ người dùng mẫu...');
        $this->call(EhenhoRichDemoSeeder::class);

        // 8. Align all existing profiles in profiles table to this project_id
        Profile::withoutGlobalScopes()
            ->where(function ($q) use ($project) {
                $q->whereNull('project_id')
                    ->orWhere('project_id', '!=', $project->id);
            })
            ->update(['project_id' => $project->id]);

        // 9. Seed Settings & SEO configurations
        $this->command->info('6. Seeding Cấu hình SEO & Cài đặt hệ thống eHenho...');
        $this->call(EhenhoSettingsSeeder::class, false, ['projectId' => $project->id, 'tenantId' => $tenant->id]);

        // 10. Seed Multi-Menu System (Header & Footer Multi-Menus)
        $this->command->info('7. Seeding Multi-Menu System (Header & Multi-Footer Menus)...');
        $this->call(EhenhoMenuSeeder::class, false, ['projectId' => $project->id, 'tenantId' => $tenant->id]);

        $this->command->info('=== HOÀN TẤT SEEDER DỰ ÁN EHENHO ===');
    }
}
