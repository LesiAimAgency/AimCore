<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tenant;
use App\Services\SettingsService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EhenhoSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds for eHenho SEO & Theme Settings.
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'ehenho')->first();
            $projectId = $project ? $project->id : 15;
            $tenantId = $tenantId ?? $project?->tenant_id;
        }

        if (! $tenantId) {
            $tenant = Tenant::where('code', 'ehenho')->orWhere('domain', 'ehenho.local')->first();
            $tenantId = $tenant ? $tenant->id : 7;
        }

        $settings = [
            // 1. General & Brand Settings
            'site_name' => 'eHenho.com - Hẹn hò Online, Tìm bạn, Kết bạn theo Sở thích & Tính cách',
            'site_title' => 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương',
            'site_description' => 'eHenho.com là trang web hẹn hò online, tìm bạn, kết bạn theo sở thích & tính cách giúp bạn nhanh chóng tìm được một nửa yêu thương của mình.',
            'site_author' => 'eHenho.com, hi@ehenho.com',
            'theme' => 'ehenho',
            'theme_color' => '#007cae',
            'category_bar_color' => '#e85151',
            'header_bg_color' => '#202020',
            'header_text_color' => '#f0f0f0',
            'header_button_color' => '#d9534f',
            'header_height' => '54',
            'header_sticky' => '1',
            'header_show_search' => '1',
            'header_show_help' => '1',
            'header_show_auth' => '1',
            'site_copyright' => 'Email: hi@ehenho.com',
            'social_facebook' => 'http://www.facebook.com/ehenho',
            'social_twitter' => 'http://www.twitter.com/ehenho',
            'social_instagram' => '',
            'social_youtube' => '',
            'social_tiktok' => '',
            'social_zalo' => '',

            // 2. SEO Settings (Seed using exact previously hardcoded values from home page & layout)
            'seo_meta_title' => 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương',
            'seo_meta_description' => 'eHenho.com là trang web hẹn hò online, tìm bạn, kết bạn theo sở thích & tính cách giúp bạn nhanh chóng tìm được một nửa yêu thương của mình.',
            'seo_meta_keywords' => 'Hẹn hò online, Tìm bạn, Kết bạn, Tìm bạn bốn phương, Tìm bạn gái, Tìm bạn trai, Tìm người yêu, Tim ban bon phuong',
            'google_analytics_id' => '',
            'google_site_verification' => '',
            'bing_site_verification' => '',
            'robots_txt' => "User-agent: *\nDisallow: /admin/\nSitemap: ".url('/sitemap.xml'),
            'custom_header_code' => '',
            'custom_body_code' => '',
            'custom_footer_code' => '',
        ];

        foreach ($settings as $key => $val) {
            DB::table('settings')
                ->where('key', $key)
                ->where('project_id', $projectId)
                ->delete();

            DB::table('settings')->insert([
                'key' => $key,
                'payload' => json_encode(is_array($val) ? $val : ['value' => $val]),
                'group' => str_starts_with($key, 'seo_') || in_array($key, [
                    'google_analytics_id',
                    'google_site_verification',
                    'bing_site_verification',
                    'robots_txt',
                    'custom_header_code',
                    'custom_body_code',
                    'custom_footer_code',
                ], true) ? 'seo' : 'general',
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (is_scalar($val)) {
                $mainConn = app()->environment('testing') ? config('database.default', 'sqlite') : (config('database.default') ?? 'mysql');
                if (Schema::connection($mainConn)->hasTable('project_settings')) {
                    DB::connection($mainConn)->table('project_settings')->updateOrInsert(
                        ['project_id' => $projectId, 'key' => $key],
                        ['value' => (string) $val, 'updated_at' => now()]
                    );
                }
            }
        }

        $mainConn = app()->environment('testing') ? config('database.default', 'sqlite') : (config('database.default') ?? 'mysql');
        if (Schema::connection($mainConn)->hasTable('project_settings')) {
            DB::connection($mainConn)->table('project_settings')->updateOrInsert(
                ['project_id' => $projectId, 'key' => 'settings.seo'],
                ['value' => '1', 'updated_at' => now()]
            );
            DB::connection($mainConn)->table('project_settings')->updateOrInsert(
                ['project_id' => $projectId, 'key' => 'multilingual_enabled'],
                ['value' => '0', 'updated_at' => now()]
            );
            DB::connection($mainConn)->table('project_settings')
                ->where('project_id', $projectId)
                ->whereIn('key', ['settings.languages', 'settings.appearance'])
                ->delete();
        }

        SettingsService::getInstance()->clearCache();
        if (function_exists('cache')) {
            cache()->flush();
        }
    }
}
