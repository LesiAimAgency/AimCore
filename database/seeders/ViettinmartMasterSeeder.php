<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectSetting;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class ViettinmartMasterSeeder extends Seeder
{
    /**
     * Seed all Viettinmart data from legacy public_html into VGTDemo core.
     * Run: php artisan db:seed --class=ViettinmartMasterSeeder
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'viettinmart-eco')
                ->orWhere('code', 'viettinmart')
                ->orWhere('name', 'like', '%Viettinmart%')
                ->first();
            $projectId = $project ? $project->id : 10;
        }

        if (! $tenantId || ! Tenant::where('id', $tenantId)->exists()) {
            $tenant = Tenant::where('code', 'viettinmart')
                ->orWhere('code', 'viettinmart-eco')
                ->orWhere('name', 'like', '%Viettinmart%')
                ->first();
            if (! $tenant) {
                $tenant = Tenant::find(3) ?? Tenant::first();
            }
            if (! $tenant && Schema::hasTable('tenants')) {
                $tenant = Tenant::create([
                    'code' => 'viettinmart',
                    'name' => 'Viettinmart Demo',
                    'status' => 'active',
                ]);
            }
            $tenantId = $tenant ? $tenant->id : null;
        }

        $this->command->info("=== BẮT ĐẦU SEED DỮ LIỆU VIETTINMART VÀO VGT CORE (Project ID: {$projectId}, Tenant ID: {$tenantId}) ===");

        // 1. Users
        $this->command->info('1. Seeding Users...');
        $this->call(ViettinmartUserSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 2. Agents
        $this->command->info('2. Seeding Agents...');
        $this->call(ViettinmartAgentSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 3. Form Templates
        $this->command->info('3. Seeding Form Templates...');
        $this->call(ViettinmartFormTemplateSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 4. Database Migration & Full Sync from Legacy VTM (Categories, Orders, Coupons, Reviews, Pages, Relationships, etc.)
        $this->command->info('4. Đồng bộ toàn bộ danh mục sản phẩm, đơn hàng, bài viết, trang, flash sale từ legacy DB...');
        Artisan::call('migrate:legacy-vtm', [
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
        ]);
        $this->command->line(Artisan::output());

        // 5. Seed Products to Posts & ProductsEnhanced with proper taxonomies and image paths
        $this->command->info('5. Seeding authentic Products & Categories...');
        $this->call(ViettinmartProductsSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 6. Homepage Widgets (Ran AFTER products so categories are fully mapped to widgets)
        $this->command->info('6. Seeding Homepage Widgets with mapped categories...');
        $this->call(ViettinmartWidgetsSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 7. Footer Widgets
        $this->command->info('7. Seeding Footer Widgets...');
        $this->call(ViettinmartFooterWidgetSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 8. Navigation Menus
        $this->command->info('8. Seeding Navigation Menus...');
        $this->call(ViettinmartMenuSeeder::class, false, ['projectId' => $projectId, 'tenantId' => $tenantId]);

        // 9. English Translations for Products
        $this->command->info('9. Seeding English Translations...');
        $this->call(ViettinmartProductEnTranslationSeeder::class, false, ['projectId' => $projectId]);

        // 10. Synchronize Project Config, Feature Packs & CMS Credentials
        $this->command->info('10. Cấu hình tính năng thương mại điện tử & CMS Admin cho Project...');
        $project = Project::find($projectId);
        if ($project) {
            $project->cms_features = ['commerce', 'product_listing', 'blog', 'contact', 'gallery', 'agent'];
            $project->project_admin_username = 'admin_vtm';
            $project->project_admin_password = bcrypt('admin123');
            $project->project_admin_password_plain = encrypt('admin123');
            $project->password_updated_at = now();
            $project->save();

            // Set CMS user
            $cmsUser = User::where('email', 'admin@viettinmart.com')->first();
            if ($cmsUser) {
                $cmsUser->username = 'admin_vtm';
                $cmsUser->role = 'cms';
                $cmsUser->project_ids = [$projectId];
                $cmsUser->save();
            }

            // Set all 21 Core Modules in Project Settings
            $systemModules = collect(config('system_menu'))->pluck('permission')->toArray();
            foreach ($systemModules as $permKey) {
                ProjectSetting::set($projectId, $permKey, '1');
            }
        }

        // 11. Settings & Theme Options
        $this->command->info('11. Seeding Settings & Theme Options...');
        $this->call(ViettinmartSettingsSeeder::class);

        // 12. Blog Categories, Tags, and Rich Articles
        $this->command->info('12. Seeding Blog Categories, Tags & Posts...');
        $this->call(ViettinmartBlogSeeder::class, false, ['projectId' => $projectId]);

        // 13. Ecommerce Enhancements (Coupons, Flash Sale, Brands, Shipping Carriers, Modal Forms)
        $this->command->info('13. Seeding Ecommerce Enhancements...');
        $this->call(ViettinmartEcommerceEnhanceSeeder::class, false, ['projectId' => $projectId]);

        $this->command->info('=== HOÀN TẤT SEED TOÀN BỘ DỮ LIỆU VIETTINMART VÀO VGT CORE! ===');
    }
}
