<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Setting;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenV2WidgetsSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        $widgets = [
            1 => [
                'name' => '1. Intro Section',
                'type' => 'inbetween_v2_intro',
                'settings' => [
                    'intro_subtitle' => 'Your business is',
                    'intro_title' => 'ENTERING VIETNAM?',
                    'floating_words' => [
                        ['text' => '[ Find Customers ]', 'position' => '1'],
                        ['text' => 'Find Suppliers', 'position' => '2'],
                        ['text' => 'Business Development', 'position' => '3'],
                        ['text' => 'Build Partnerships', 'position' => '4'],
                        ['text' => 'Market Research', 'position' => '5'],
                        ['text' => 'Coordinate Meetings', 'position' => '6'],
                        ['text' => 'Get Things Done Locally', 'position' => '7'],
                        ['text' => 'Find Talents', 'position' => '8'],
                        ['text' => 'Market Research', 'position' => '9'],
                        ['text' => 'Build Relationships', 'position' => '10'],
                    ],
                    'logo_white' => 'themes/inbetween_v2/images/Logo-white.svg',
                    'logo_dark' => 'themes/inbetween_v2/images/Logo.svg',
                    'connect_text' => "LET'S CONNECT",
                    'connect_link' => '#contact-modal',
                ],
            ],
            2 => [
                'name' => '2. Hero Section',
                'type' => 'inbetween_v2_hero',
                'settings' => [
                    'headline_text' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
                    'services' => 'Sales & BD, Market Validation, Market Entry Execution, Local Business Support',
                    'description' => 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.',
                    'cta_text' => 'Talk to us',
                    'cta_link' => '#inbetween-founder',
                    'logo_white' => 'themes/inbetween_v2/images/Logo-white.svg',
                    'logo_dark' => 'themes/inbetween_v2/images/Logo.svg',
                    'connect_text' => "LET'S CONNECT",
                    'connect_link' => '#contact-modal',
                ],
            ],
            3 => [
                'name' => '3. What We Do',
                'type' => 'inbetween_v2_what_we_do',
                'settings' => [
                    'badge_text' => '[ WHAT WE DO ]',
                    'title_line1' => 'Flexible local support,',
                    'title_line2' => 'built around what you need.',
                    'description' => '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.',
                    'cta_text' => 'Talk to us',
                    'cta_link' => '#inbetween-founder',
                    'cards' => [
                        [
                            'card_id' => 'find',
                            'badge' => 'FIND',
                            'title' => 'Market & Opportunity Development',
                            'description' => 'Identify priority sectors, companies, decision-makers, distributors and commercial opportunities.',
                            'active_image' => 'themes/inbetween_v2/images/what-we-do-magnifier.png',
                            'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
                        ],
                        [
                            'card_id' => 'connect',
                            'badge' => 'CONNECT',
                            'title' => 'Strategic Partnerships & Networking',
                            'description' => 'Connect directly with local key stakeholders, industry associations, and verified commercial partners.',
                            'active_image' => 'themes/inbetween_v2/images/what-we-do-chain.png',
                            'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
                        ],
                        [
                            'card_id' => 'execute',
                            'badge' => 'EXECUTE',
                            'title' => 'Market Entry & Operational Setup',
                            'description' => 'End-to-end execution of operational roadmaps, pilot testing, and localized compliance support.',
                            'active_image' => 'themes/inbetween_v2/images/what-we-do-gears.png',
                            'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
                        ],
                        [
                            'card_id' => 'grow',
                            'badge' => 'GROW',
                            'title' => 'Scale & Long-term Expansion',
                            'description' => 'Accelerate revenue pipelines, expand regional presence, and build sustainable local capabilities.',
                            'active_image' => 'themes/inbetween_v2/images/what-we-do-arrow.png',
                            'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => '4. Where We Focus',
                'type' => 'inbetween_v2_where_we_focus',
                'settings' => [
                    'badge_text' => '[ WHERE WE FOCUS ]',
                    'heading_line1' => 'Our core business sectors',
                    'heading_line2' => 'Where we create values',
                    'sectors' => [
                        [
                            'title_line1' => 'INDUSTRIAL &',
                            'title_line2' => 'MANUFACTURING',
                            'tags' => 'Machinery, Equipment, Components, Factory Solutions, Materials',
                            'image' => 'themes/inbetween_v2/images/sector-robot-arm.png',
                        ],
                        [
                            'title_line1' => 'ELECTRONICS, AUTOMATION',
                            'title_line2' => '& TECHNOLOGY',
                            'tags' => 'Testing & Inspection, Electronics, Industrial Technology, Automation, Digital Solutions',
                            'image' => 'themes/inbetween_v2/images/sector-chipset-ai.png',
                        ],
                        [
                            'title_line1' => 'BIOTECHNOLOGY &',
                            'title_line2' => 'HEALTHCARE',
                            'tags' => 'Healthcare solutions, Biotech, Medical Technology, Pharma, Laboratory, Diagnostics',
                            'image' => 'themes/inbetween_v2/images/sector-dna-helix.png',
                        ],
                        [
                            'title_line1' => 'ENERGY, ENVIRONMENT',
                            'title_line2' => '& SUSTAINABILITY',
                            'tags' => 'Sustainability Technology, Energy Technology, Environmental Solutions, Water & Waste, Renewable Energy, Materials',
                            'image' => 'themes/inbetween_v2/images/sector-lightning-bolt.png',
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => '5. Founder Profile',
                'type' => 'inbetween_v2_founder',
                'settings' => [
                    'founder_portrait' => 'themes/inbetween_v2/images/founder-airu-portrait.png',
                    'founder_name' => 'AIRU',
                    'founder_role' => 'Founder of INBETWEEN',
                    'quote_line1' => 'Built between cultures.',
                    'quote_line2' => 'Connected across borders.',
                    'experience_years' => '14+',
                    'experience_label' => 'Years of experience across Europe, the Arab region, Africa and Asia',
                    'detail_exp_title' => '14 YEARS OF EXPERIENCE',
                    'detail_exp_desc' => 'AiRu is a driven international professional with <strong class="font-semibold text-[#131313]">14 years of experience across Europe, the Arab region, Africa and Asia</strong>, specializing in <strong class="font-semibold text-[#131313]">cross-border partnerships and business development</strong>. She navigates nuanced intercultural environments to build high-trust commercial pathways between emerging and developed ecosystems.',
                    'detail_exp_image' => 'themes/inbetween_v2/images/founder-airu-stage.png',
                    'languages_title' => 'FLUENCY IN 3 LANGUAGES',
                    'languages' => [
                        ['name' => 'Vietnamese', 'proficiency' => 'Native / Bilingual'],
                        ['name' => 'English', 'proficiency' => 'Professional Working'],
                        ['name' => 'Arabic', 'proficiency' => 'Working Proficiency'],
                    ],
                    'media_title' => 'OWN MEDIA PLATFORM WITH 35K+ FOLLOWERS',
                    'media_desc' => 'Host and curator of leading cross-border business discussions, podcasts, and intercultural networking series with an engaged executive community of over 35,000 global founders, investors, and industry decision-makers.',
                    'media_image' => 'themes/inbetween_v2/images/image 13.png',
                    'regions_title' => 'CROSS-BORDER EXPERTISE & REGIONS',
                    'regions' => [
                        ['title' => 'Europe', 'desc' => 'Facilitating bilateral enterprise cooperation, multilateral trade dialogs, and specialized technology exchange between EU innovation hubs and Southeast Asia.'],
                        ['title' => 'The Arab Region', 'desc' => 'Advising cross-regional joint ventures, sovereign investment dialogues, and executive business missions across the GCC and North Africa.'],
                        ['title' => 'Africa', 'desc' => 'Establishing foundational distributor channels, industrial supply chain links, and public-private sector partnerships in high-growth frontier markets.'],
                        ['title' => 'Asia & Vietnam', 'desc' => 'Serving as on-the-ground operational anchor for foreign SMEs and founders entering Vietnam, from market validation to entity formation and commercial scale.'],
                    ],
                    'alliances_title' => 'BUSINESS DEVELOPMENT & STRATEGIC ALLIANCES',
                    'alliances_desc' => "At INBETWEEN, AiRu leverages deep relational equity and agile localized strategies to bridge international standards with Vietnam's dynamic commercial realities. Her approach removes operational friction, minimizes foreign market entry risk, and accelerates time-to-market for pioneering ventures.",
                    'cta_card_title' => 'START A CONVERSATION',
                    'cta_card_desc' => 'Explore how INBETWEEN can serve as your dedicated local team before you are ready to hire one.',
                    'cta_card_btn_text' => "Let's Connect With AiRu",
                    'cta_card_btn_link' => '#contact',
                ],
            ],
            6 => [
                'name' => '6. Our Clients',
                'type' => 'inbetween_v2_our_clients',
                'settings' => [
                    'heading_word1' => 'OUR',
                    'heading_word2' => 'CLIENTS.',
                    'client_cards' => [
                        [
                            'card_id' => 'asian-smes',
                            'title' => 'Asian SMEs',
                            'description' => "Established businesses looking\nfor customers, distributors or\npartners in Vietnam.",
                            'image' => 'themes/inbetween_v2/images/client-asian-smes.png',
                        ],
                        [
                            'card_id' => 'founders',
                            'title' => "Founders &\nEntrepreneurs",
                            'description' => "Building, testing or launching\ntheir business in the market.",
                            'image' => 'themes/inbetween_v2/images/client-founders.png',
                        ],
                        [
                            'card_id' => 'regional-teams',
                            'title' => 'Regional Teams',
                            'description' => "Companies operating across\nAsia that need additional\nVietnam capacity.",
                            'image' => 'themes/inbetween_v2/images/client-regional-teams.png',
                        ],
                    ],
                ],
            ],
            7 => [
                'name' => '7. Beyond Business',
                'type' => 'inbetween_v2_business',
                'settings' => [
                    'badge_title' => '[ BEYOND BUSINESS ]',
                    'media_title' => 'MEDIA',
                    'media_desc' => 'Business, culture, society and perspectives from across Asia.',
                    'connections_title' => 'CONNECTIONS',
                    'connections_desc' => 'Business networking, industry gatherings, workshops and cross-border connections — bringing people and ideas into the same room.',
                    'heading_prefix' => 'Building ',
                    'heading_suffix' => 'more than a service.',
                    'description' => 'In Between Asia is also building a <strong class="font-semibold text-[#131313]">growing media platform, business network </strong>connecting people, ideas and opportunities across Asia.',
                    'cta_text' => 'Talk to us',
                    'cta_link' => '#inbetween-founder',
                    'carousel_images' => [
                        ['image' => 'themes/inbetween_v2/images/hero-person-left-outer.png', 'alt' => 'Person Left Outer'],
                        ['image' => 'themes/inbetween_v2/images/hero-person-left-inner.png', 'alt' => 'Person Left Inner'],
                        ['image' => 'themes/inbetween_v2/images/hero-person-center.png', 'alt' => 'Person Center'],
                        ['image' => 'themes/inbetween_v2/images/hero-person-right-inner.png', 'alt' => 'Person Right Inner'],
                        ['image' => 'themes/inbetween_v2/images/hero-person-right-outer.png', 'alt' => 'Person Right Outer'],
                    ],
                ],
            ],
            8 => [
                'name' => '8. Footer Section',
                'type' => 'inbetween_v2_footer',
                'settings' => [
                    'logo_white' => 'themes/inbetween_v2/images/Logo-white.svg',
                    'lang_en_label' => 'EN',
                    'lang_zh_label' => '汉语',
                    'top_connect_text' => "LET'S CONNECT",
                    'top_connect_link' => '#contact-modal',
                    'heading_prefix' => 'MORE',
                    'rotating_words' => [
                        ['text' => 'CONNECTIONS'],
                        ['text' => 'OPPORTUNITIES'],
                        ['text' => 'PARTNERSHIPS'],
                        ['text' => 'NETWORKS'],
                        ['text' => 'GROWTH'],
                        ['text' => 'SOLUTIONS'],
                    ],
                    'form_title_line1' => 'READY TO BUILD',
                    'form_title_highlight' => 'SOMETHING BOLD',
                    'form_title_line2' => 'IN VIETNAM?',
                    'form_privacy_text' => 'I have read and agree to the Data & Privacy Policy of in • between',
                    'form_newsletter_text' => 'Send me regular business updates and market insights',
                    'contact_phone' => '0909 999 999',
                    'contact_email' => 'inbetween.asia@gmail.com',
                    'copyright_text' => 'Copyright belong to INBETWEEN',
                    'powered_by_text' => 'Powered by AIM AGENCY',
                ],
            ],
        ];

        $targetProjects = $projectId
            ? Project::withoutGlobalScopes()->where('id', $projectId)->get()
            : Project::withoutGlobalScopes()
                ->where(function ($q) {
                    $q->whereIn('code', ['inbetween_v2', 'DA005', 'inbetween'])
                        ->orWhere('name', 'like', '%INBETWEEN%');
                })
                ->get();

        if ($targetProjects->isEmpty()) {
            $defaultProject = Project::withoutGlobalScopes()->first();
            if ($defaultProject) {
                $targetProjects = collect([$defaultProject]);
            }
        }

        foreach ($targetProjects as $proj) {
            $targetProjId = $proj->id;
            $targetTenantId = $tenantId ?? $proj->tenant_id ?? 8;

            // Ensure project features and settings are set to inbetween_v2 theme
            try {
                $features = is_array($proj->features) ? $proj->features : [];
                $features['theme'] = 'inbetween_v2';
                $proj->update(['features' => $features]);

                Setting::updateOrCreate(
                    ['project_id' => $targetProjId, 'key' => 'theme'],
                    ['value' => 'inbetween_v2', 'tenant_id' => $targetTenantId]
                );
            } catch (\Throwable $e) {
                // Ignore if schema differs
            }

            // Delete existing inbetween_v2 widgets and old theme widgets in homepage-main and inbetween_v2
            Widget::withoutGlobalScopes()
                ->where(function ($q) {
                    $q->where('area', 'inbetween_v2')
                        ->orWhere('area', 'homepage-main')
                        ->orWhere('area', 'homepage');
                })
                ->where('project_id', $targetProjId)
                ->delete();

            foreach ($widgets as $order => $widget) {
                Widget::withoutGlobalScopes()->create([
                    'project_id' => $targetProjId,
                    'tenant_id' => $targetTenantId,
                    'area' => 'homepage-main',
                    'name' => $widget['name'],
                    'type' => $widget['type'],
                    'is_active' => true,
                    'sort_order' => $order,
                    'settings' => $widget['settings'],
                ]);
            }
        }

        $this->command?->info('INBETWEEN V2 widgets seeded successfully for projects: '.$targetProjects->pluck('code')->implode(', '));
    }
}
