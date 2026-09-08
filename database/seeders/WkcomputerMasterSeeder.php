<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectPermission;
use App\Models\ProjectSetting;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WkcomputerMasterSeeder extends Seeder
{
    /**
     * Seed all WKComputer Gaming & PC project data, tenant, user, catalog, menus, widgets, and settings.
     * Run: php artisan db:seed --class=WkcomputerMasterSeeder
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        [$project, $tenant] = $this->ensureProjectAndTenant($projectId, $tenantId);
        $projectId = $project->id;
        $tenantId = $tenant->id;

        $this->command?->info("=== BẮT ĐẦU SEED DỰ ÁN WKCOMPUTER (Project ID: {$projectId}, Tenant ID: {$tenantId}) ===");

        // 1. Setup CMS Admin User
        $this->command?->info('1. Khởi tạo tài khoản CMS Admin (wkcomputer / admin123)...');
        $this->setupAdminUser($project, $tenantId);

        // 2. Enable Core Modules & Permissions
        $this->command?->info('2. Cấu hình tính năng & quyền hạn Core Modules...');
        $this->enableCoreModules($projectId);

        // 3. Seed Settings & Appearance Options
        $this->command?->info('3. Seeding cấu hình website & giao diện (WkcomputerSettingsSeeder)...');
        $this->call(WkcomputerSettingsSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 4. Seed Products, Categories, Posts, Pages & Taxonomies
        $this->command?->info('4. Seeding danh mục, sản phẩm, tin tức, trang tĩnh (WkcomputerProductsSeeder)...');
        $this->call(WkcomputerProductsSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 5. Seed Menus (Header & Footer)
        $this->command?->info('5. Seeding hệ thống Menu Header & Footer (WkcomputerMenuSeeder)...');
        $this->call(WkcomputerMenuSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 6. Seed Widgets (Hero Slider, Deal Flash, Product Sections, Footer...)
        $this->command?->info('6. Seeding các widget trang chủ & footer (WkcomputerWidgetsSeeder)...');
        $this->call(WkcomputerWidgetsSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        $this->command?->info('=== HOÀN TẤT SEED DỰ ÁN WKCOMPUTER THÀNH CÔNG! ===');
    }

    /**
     * Ensure Tenant and Project exist and return both instances.
     *
     * @return array{0: Project, 1: Tenant}
     */
    public function ensureProjectAndTenant(?int $projectId = null, ?int $tenantId = null): array
    {
        // 1. Resolve or create Tenant
        $tenant = null;
        if ($tenantId) {
            $tenant = Tenant::find($tenantId);
        }
        if (! $tenant) {
            $tenant = Tenant::where('code', 'wkcomputer')
                ->orWhere('domain', 'wkcomputer')
                ->orWhere('domain', 'wkcomputer.aimagency.vn')
                ->first();
        }
        if (! $tenant) {
            $tenant = Tenant::create([
                'name' => 'WKComputer',
                'code' => 'wkcomputer',
                'domain' => 'wkcomputer.aimagency.vn',
                'database_name' => 'core',
                'settings' => ['theme' => 'wkcomputerdemo'],
                'status' => 'active',
            ]);
        }

        // 2. Resolve or create Project
        $project = null;
        if ($projectId) {
            $project = Project::find($projectId);
        }
        if (! $project) {
            $project = Project::where('code', 'wkcomputer')
                ->orWhere('subdomain', 'wkcomputer')
                ->orWhere('external_domain', 'wkcomputer.aimagency.vn')
                ->first();
        }

        if (! $project) {
            $adminUser = User::where('role', 'superadmin')->first() ?? User::first();
            $adminId = $adminUser ? $adminUser->id : 1;

            $project = Project::create([
                'name' => 'WKComputer Gaming & PC',
                'code' => 'wkcomputer',
                'subdomain' => 'wkcomputer',
                'external_domain' => 'wkcomputer.aimagency.vn',
                'tenant_id' => $tenant->id,
                'department_id' => 2,
                'status' => 'active',
                'project_type' => 'website',
                'admin_id' => $adminId,
                'created_by' => $adminId,
                'initialized_at' => now(),
                'cms_features' => ['commerce', 'product_listing', 'blog', 'contact', 'gallery', 'pc_builder'],
                'project_admin_username' => 'wkcomputer',
                'project_admin_password' => Hash::make('admin123'),
                'project_admin_password_plain' => encrypt('admin123'),
                'password_updated_at' => now(),
            ]);
        } else {
            $project->name = $project->name ?: 'WKComputer Gaming & PC';
            $project->tenant_id = $project->tenant_id ?: $tenant->id;
            $project->status = 'active';
            $project->project_type = 'website';
            if (empty($project->external_domain)) {
                $project->external_domain = 'wkcomputer.aimagency.vn';
            }
            if (empty($project->cms_features)) {
                $project->cms_features = ['commerce', 'product_listing', 'blog', 'contact', 'gallery', 'pc_builder'];
            }
            $project->project_admin_username = 'wkcomputer';
            $project->project_admin_password = Hash::make('admin123');
            $project->project_admin_password_plain = encrypt('admin123');
            $project->password_updated_at = now();
            $project->save();
        }

        return [$project, $tenant];
    }

    /**
     * Setup CMS Admin account.
     */
    protected function setupAdminUser(Project $project, int $tenantId): void
    {
        $username = 'wkcomputer';
        $password = 'admin123';
        $email = 'wkcomputer@wkcomputer.local';

        $user = User::where('username', $username)->orWhere('email', $email)->first();
        if ($user) {
            $user->role = 'cms';
            $user->level = 2;
            $user->tenant_id = $tenantId;
            $user->password = Hash::make($password);
            $projectIds = is_array($user->project_ids) ? $user->project_ids : (json_decode($user->project_ids ?? '[]', true) ?: []);
            if (! in_array($project->id, $projectIds)) {
                $projectIds[] = $project->id;
            }
            $user->project_ids = $projectIds;
            $user->save();
        } else {
            User::create([
                'name' => 'CMS Admin - WKComputer Gaming & PC',
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'cms',
                'level' => 2,
                'tenant_id' => $tenantId,
                'project_ids' => [$project->id],
                'email_verified_at' => now(),
            ]);
        }
    }

    /**
     * Enable all 21 Core CMS modules for this project.
     */
    protected function enableCoreModules(int $projectId): void
    {
        $allModules = [
            'settings.contact', 'settings.notifications', 'settings.fonts',
            'settings.logs', 'settings.analytics', 'settings.watermark',
            'settings.toc', 'settings.social', 'settings.payment',
            'settings.shipping', 'settings.ai', 'settings.reviews',
            'settings.forms', 'settings.contact_buttons', 'settings.redirects',
            'settings.seo', 'settings.popups', 'settings.permissions',
            'settings.fake_notifications', 'settings.orders', 'settings.languages',
        ];

        foreach ($allModules as $module) {
            ProjectSetting::set($projectId, $module, '1');
        }

        ProjectSetting::set($projectId, 'theme', 'wkcomputerdemo');

        if (class_exists(ProjectPermission::class)) {
            try {
                $defaultPermissions = ProjectPermission::getDefaultPermissions();
                $project = Project::find($projectId);
                if ($project) {
                    foreach ($defaultPermissions as $mod => $perms) {
                        $project->permissions()->updateOrCreate(['module' => $mod], $perms);
                    }
                }
            } catch (\Throwable $e) {
                // ignore
            }
        }
    }
}
