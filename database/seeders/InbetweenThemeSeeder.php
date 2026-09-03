<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenThemeSeeder extends Seeder
{
    public function run(): void
    {
        $tenantId = session('current_project')['id'] ?? \App\Models\Project::first()->id ?? 1;

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

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['tenant_id' => $tenantId, 'key' => $key],
                ['value' => $value]
            );
        }

        // 2. SEED WIDGET AREAS (Placeholders for CMS Admin)
        $widgetAreas = [
            'inbetween-before-hero' => 'Top Bar (Before Hero)',
            'inbetween-hero' => 'Hero Override (Replaces Default Hero)',
            'inbetween-after-hero' => 'After Hero (Between Hero and Collage)',
            'inbetween-community-wall' => 'Community Collage Wall',
            'inbetween-after-collage' => 'After Collage Wall',
            'inbetween-community' => 'Community Section Content',
            'inbetween-after-community' => 'After Community Section',
            'inbetween-about' => 'About / Core Values Content',
            'inbetween-partners' => 'Partners Marquee',
            'inbetween-after-about' => 'After About Section',
            'inbetween-founder' => 'Founder Section Content',
            'inbetween-after-founder' => 'After Founder Section',
            'inbetween-events' => 'Events Section Content',
            'inbetween-after-events' => 'After Events Section',
            'inbetween-media' => 'Media / Stories Section',
            'inbetween-after-media' => 'After Media Section',
            'inbetween-packages-sidebar' => 'Packages Left Sidebar',
            'inbetween-packages' => 'Packages List Override',
            'inbetween-after-packages' => 'After Packages Section',
        ];

        // Clear existing INBETWEEN widgets to prevent duplicates if re-seeded
        Widget::where('tenant_id', $tenantId)
            ->where('area', 'like', 'inbetween-%')
            ->delete();

        $sort = 1;
        foreach ($widgetAreas as $area => $name) {
            Widget::create([
                'tenant_id' => $tenantId,
                'name' => "Placeholder: $name",
                'type' => 'html', // Assuming basic HTML widget exists
                'area' => $area,
                'sort_order' => $sort++,
                'is_active' => false, // Set to false by default so it doesn't break the frontend fallback layout
                'settings' => [
                    'content' => "<!-- Widget Area: $area -->",
                ],
            ]);
        }

        $this->command->info('INBETWEEN Theme Settings & Widget Areas seeded successfully!');
    }
}
