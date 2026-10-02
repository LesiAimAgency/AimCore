<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ehenho\Profile;
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

        if (! $tenant) {
            $tenant = Tenant::create([
                'code' => 'ehenho',
                'name' => 'eHenho Dating & Social Network',
                'domain' => 'ehenho.local',
                'database_name' => 'core',
                'settings' => [
                    'theme' => 'ehenho',
                    'language' => 'vi',
                ],
                'status' => 'active',
            ]);
        } else {
            $tenant->code = 'ehenho';
            $tenant->name = 'eHenho Dating & Social Network';
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

        // 6. Call Rich Demo Seeder to ensure demo dating profiles and catalogs
        $this->command->info('4. Seeding danh mục tỉnh thành và hồ sơ người dùng mẫu...');
        $this->call(EhenhoRichDemoSeeder::class);

        $this->command->info('=== HOÀN TẤT SEEDER DỰ ÁN EHENHO ===');
    }
}
