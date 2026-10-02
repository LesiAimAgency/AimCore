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

        // 1. Ensure Tenant (search by domain or code to avoid duplicate unique key)
        $tenant = Tenant::where('domain', 'ehenho.local')
            ->orWhere('code', 'ehenho')
            ->first();

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
            $tenant->code = 'ehenho';
            $tenant->name = 'eHenho Dating & Social Network';
            $tenant->database_name = $activeDbName;
            $tenant->save();
        }
        $this->command->info("1. Tenant ID: {$tenant->id} ({$tenant->name})");

        // 2. Ensure Project (search by code or external domain)
        $project = Project::where('code', 'ehenho')
            ->orWhere('external_domain', 'ehenho.local')
            ->first();

        if (! $project) {
            $project = Project::create([
                'code' => 'ehenho',
                'name' => 'eHenho Dating & Social Network',
                'subdomain' => 'http://127.0.0.1:8000/ehenho',
                'external_domain' => 'ehenho.local',
                'tenant_id' => $tenant->id,
                'status' => 'active',
                'project_type' => 'website',
                'is_multi_tenancy' => true,
                'total_gold' => 1000,
            ]);
        } else {
            $project->code = 'ehenho';
            $project->name = 'eHenho Dating & Social Network';
            $project->tenant_id = $tenant->id;
            $project->status = 'active';
            $project->save();
        }

        // 3. Ensure / Sync CMS Admin User
        $cmsUsername = 'cms_ehenho';
        $cmsEmail = 'cms@ehenho.local';
        $cmsPassword = 'password123';

        $cmsUser = User::where('email', $cmsEmail)
            ->orWhere('username', $cmsUsername)
            ->first();

        if ($cmsUser) {
            $cmsUser->name = 'Quản Trị Viên eHenho';
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
                'display_name' => 'Quản Trị Viên eHenho',
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
                'is_featured' => true,
                'is_online' => true,
                'last_active_at' => now(),
            ]
        );

        // 6. Ensure Default CMS Informational Pages in posts table
        $pages = [
            [
                'slug' => 'gioi-thieu',
                'title' => 'Giới Thiệu eHenho - Hẹn hò Online & Tìm bạn Bốn phương',
                'content' => '<p class="lead">Chào mừng bạn đến với <strong>eHenho.com</strong> – Trang web hẹn hò online, kết bạn, tìm bạn bốn phương hàng đầu với sứ mệnh kết nối những trái tim đồng điệu một cách nghiêm túc, văn minh và hoàn toàn miễn phí.</p><h3>1. Sứ mệnh của chúng tôi</h3><p>eHenho ra đời nhằm xóa bỏ mọi khoảng cách địa lý, mang lại một không gian kết nối thân thiện, an toàn và dễ sử dụng cho người Việt trên khắp mọi miền đất nước cũng như cộng đồng người Việt tại hải ngoại.</p><h3>2. 100% Miễn phí & Độc lập</h3><p>Mọi tính năng cơ bản như đăng ký hồ sơ, tìm kiếm theo tiêu chí, gửi nhận tin nhắn trò chuyện đều được cung cấp hoàn toàn miễn phí.</p>',
            ],
            [
                'slug' => 'dieu-khoan-su-dung',
                'title' => 'Điều Khoản Sử Dụng Dịch Vụ eHenho.com',
                'content' => '<p>Chào mừng bạn đến với eHenho.com. Bằng việc truy cập hoặc sử dụng dịch vụ của chúng tôi, bạn đồng ý tuân thủ và chịu sự ràng buộc bởi các điều khoản sử dụng dưới đây.</p><h3>1. Điều kiện đăng ký</h3><p>Bạn phải từ đủ 18 tuổi trở lên để tạo tài khoản và tham gia cộng đồng hẹn hò eHenho.</p><h3>2. Hành vi bị nghiêm cấm</h3><p>Nghiêm cấm đăng tải nội dung khiêu dâm, quấy rối, lừa đảo, hoặc xúc phạm danh dự của thành viên khác.</p>',
            ],
            [
                'slug' => 'chinh-sach-bao-mat',
                'title' => 'Chính Sách Bảo Mật Thông Tin & Quyền Riêng Tư',
                'content' => '<p>eHenho.com cam kết bảo vệ tối đa quyền riêng tư và thông tin cá nhân của bạn theo đúng các quy định pháp luật hiện hành.</p><h3>1. Thu thập thông tin</h3><p>Chúng tôi chỉ thu thập các thông tin cần thiết phục vụ cho việc tạo hồ sơ ghép đôi và liên lạc giữa các thành viên.</p><h3>2. Bảo mật dữ liệu</h3><p>Mọi thông tin cá nhân, mật khẩu đều được mã hóa an toàn và không chia sẻ cho bên thứ ba vì mục đích thương mại.</p>',
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
                    'content' => $p['content'],
                    'status' => 'published',
                    'published_at' => now(),
                    'author_id' => $cmsUser->id,
                ]
            );
        }
        $this->command->info('4. Seeding các trang tĩnh CMS (Giới thiệu, Điều khoản, Bảo mật) hoàn tất.');

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

        $this->command->info('=== HOÀN TẤT SEEDER DỰ ÁN EHENHO ===');
    }
}
