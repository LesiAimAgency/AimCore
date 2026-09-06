<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenThemeSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if ($projectId) {
            $this->seedForProject($projectId, $tenantId ?? $projectId);

            return;
        }

        // Auto-detect all projects using Inbetween theme (HD001, DA005, etc.)
        $projectIds = Project::whereIn('code', ['HD001', 'DA005'])
            ->orWhere('name', 'like', '%Aim Agency%')
            ->orWhere('name', 'like', '%Inbetween%')
            ->pluck('id')
            ->toArray();

        $themeProjectIds = Setting::where('key', 'theme')
            ->where('value', 'inbetween')
            ->whereNotNull('project_id')
            ->pluck('project_id')
            ->toArray();

        $allProjectIds = array_unique(array_filter(array_merge($projectIds, $themeProjectIds)));

        if (empty($allProjectIds)) {
            $fallback = Project::find(5) ?? Project::first();
            if ($fallback) {
                $allProjectIds = [$fallback->id];
            }
        }

        foreach ($allProjectIds as $pId) {
            $this->seedForProject($pId, $pId);
        }
    }

    public function seedForProject(int $projectId, int $tenantId): void
    {

        // 1. SEED SETTINGS
        $settings = [
            'theme' => 'inbetween',
            'theme_primary_color' => '#EC460B',

            'site_name' => 'INBETWEEN',
            'site_tagline' => 'Cross-border Community & Platform',
            'site_description' => 'A cross-border network where Professionals, Founders and Creatives collaborate and connect.',
            'site_phone' => '0909 999 999',
            'site_email' => 'inbetween.asia@gmail.com',

            'site_logo_footer' => 'themes/inbetween/assets/logo-footer.svg',
            'site_copyright' => 'Copyright belong to INBETWEEN',
            'site_powered_by' => 'Powered by AIM AGENCY',

            'footer_brand_statement' => 'ONE NETWORK. ENDLESS POSSIBILITIES.',
            'footer_brand_subtitle' => 'WE CONNECT PEOPLE, TALENT, AND<br class="hidden sm:inline"> BUSINESSES ACROSS BORDERS TO CREATE<br class="hidden sm:inline"> LASTING OPPORTUNITIES.',

            'hero_logo' => 'themes/inbetween/assets/logo.svg',
            'hero_subtitle' => 'Cross-border community, media & connection platform|for|Professionals, Founders, Creatives & Organizations',

            'community_description' => 'A cross-border network where Professionals, Founders and Creatives collaborate and connect.',

            'core_values_title' => 'CORE VALUES',
            'core_values_subtitle' => 'Who we are inspire what we do',
            'core_value_1_title' => 'AUTHENTICITY',
            'core_value_1_desc' => 'Building genuine bonds across diverse cultures and creative industries',
            'core_value_2_title' => 'INNOVATION',
            'core_value_2_desc' => 'Empowering bold ideas and fostering cross-border breakthroughs',
            'core_value_3_title' => 'IMPACT',
            'core_value_3_desc' => 'Creating lasting value and sustainable growth for our global community',

            'partners_section_title' => 'OUR BUSINESS PARTNERS',

            'founder_name' => 'HUYNH THI AI NHU',
            'founder_title' => 'Founder of INBETWEEN',
            'founder_mission' => "CONNECTING PEOPLE\nIS OUR VERY MISSION",
            'founder_social_yt_text' => 'Follow our journey on YouTube',
            'founder_social_fb_text' => 'Join our community on Facebook',
            'founder_social_ig_text' => 'See our highlights on Instagram',

            'event_day' => 'Tuesday',
            'event_date' => '18.08',
            'event_year' => '2026',
            'event_time' => '9:00AM - 11:30 AM',
            'event_location' => 'Grand Ballroom - Park Hyatt Saigon',
            'event_address' => 'No.02 Cong Truong Lam Son St, Sai Gon Ward, HCMC',
            'event_agenda' => "Meeting with special guest\nHaving brunch\nLuck Gifts",

            'stories_description' => 'Inspiring stories from leaders shaping the future.',
            'story_1_title' => 'HAY DE VIET NAM DUOC LA VIET NAM',
            'story_1_guest' => 'Ken',
            'story_1_desc' => 'A deep dive into the local culture.',

            'packages_description' => 'Choose the membership package that best fits your journey.',
            'package_1_name' => 'STANDARD',
            'package_1_price' => '$29',
            'package_1_privileges' => "Access to community events\nMonthly newsletter",

            'social_facebook' => 'https://facebook.com/inbetween',
            'social_instagram' => 'https://instagram.com/inbetween',
            'social_linkedin' => 'https://linkedin.com/company/inbetween',
            'social_tiktok' => 'https://tiktok.com/@inbetween',
            'social_youtube' => 'https://youtube.com/@inbetween',
        ];

        // Delete any duplicate rows for this project where tenant_id is null if tenant_id = $tenantId already exists
        $tenantKeys = Setting::where('tenant_id', $tenantId)->pluck('key')->toArray();
        if (! empty($tenantKeys)) {
            Setting::where('project_id', $projectId)
                ->whereNull('tenant_id')
                ->whereIn('key', $tenantKeys)
                ->delete();
        }

        // Now safe to assign project_id to all tenant_id rows
        Setting::where('tenant_id', $tenantId)->whereNull('project_id')->update(['project_id' => $projectId]);

        foreach ($settings as $key => $value) {
            $existing = Setting::where(function ($q) use ($projectId, $tenantId) {
                $q->where('project_id', $projectId)->orWhere('tenant_id', $tenantId);
            })->where('key', $key)->first();

            if ($existing) {
                if (in_array($key, ['site_name', 'site_logo', 'site_logo_footer']) && ! empty($existing->value) && $existing->value !== 'INBETWEEN') {
                    continue;
                }
                $existing->update([
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'value' => $value,
                ]);
            } else {
                Setting::create([
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'key' => $key,
                    'value' => $value,
                    'type' => 'string',
                    'group' => 'general',
                ]);
            }
        }

        // 2. SEED PROJECT-SPECIFIC MENUS (Header & Footer)
        // Clean up any old menu widgets for this project
        Widget::where('project_id', $projectId)->where('type', 'menu')->delete();

        // Main Menu
        $mainMenu = Menu::updateOrCreate(
            ['project_id' => $projectId, 'slug' => 'main-menu'],
            ['tenant_id' => $tenantId, 'name' => 'Main Menu', 'location' => 'header', 'is_active' => true]
        );
        $mainMenu->allItems()->delete();
        $mainMenuItems = [
            ['title' => 'About us', 'url' => '#about', 'order' => 1],
            ['title' => 'Media', 'url' => '#media', 'order' => 2],
            ['title' => 'Community', 'url' => '#community', 'order' => 3],
        ];
        foreach ($mainMenuItems as $item) {
            MenuItem::create([
                'menu_id' => $mainMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $item['title'],
                'url' => $item['url'],
                'order' => $item['order'],
            ]);
        }

        // Footer Menu
        $footerMenu = Menu::updateOrCreate(
            ['project_id' => $projectId, 'slug' => 'footer-menu'],
            ['tenant_id' => $tenantId, 'name' => 'Footer Menu', 'location' => 'footer', 'is_active' => true]
        );
        $footerMenu->allItems()->delete();
        $footerMenuItems = [
            ['title' => 'About Us', 'url' => '#about', 'order' => 1],
            ['title' => 'Media', 'url' => '#media', 'order' => 2],
            ['title' => 'Events', 'url' => '#events', 'order' => 3],
            ['title' => 'Community', 'url' => '#packages', 'order' => 4],
        ];
        foreach ($footerMenuItems as $item) {
            MenuItem::create([
                'menu_id' => $footerMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $item['title'],
                'url' => $item['url'],
                'order' => $item['order'],
            ]);
        }

        $this->command?->info("INBETWEEN Theme Settings and Menus seeded successfully for Project ID: {$projectId}!");
    }
}
