<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Setting;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenHomepageMainSeeder extends Seeder
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
        $widgets = [
            1 => [
                'name' => '1. Hero Section',
                'type' => 'inbetween_hero_section',
                'settings' => [
                    'primary_color' => '#EC460B',
                    'hero_logo' => 'themes/inbetween/assets/logo.svg',
                    'hero_subtitle' => 'Cross-border community, media & connection platform|for|Professionals, Founders, Creatives & Organizations',
                ],
            ],
            2 => [
                'name' => '2. Community 3D Collage',
                'type' => 'inbetween_community_collage',
                'settings' => [
                    'center_logo' => 'themes/inbetween/assets/logo-white.svg',
                    'image_1' => 'themes/inbetween/assets/image0_252_132.png',
                    'image_2' => 'themes/inbetween/assets/image1_252_132.png',
                    'image_3' => 'themes/inbetween/assets/image2_252_132.png',
                    'image_4' => 'themes/inbetween/assets/image3_252_132.png',
                    'image_5' => 'themes/inbetween/assets/image4_252_132.png',
                    'image_6' => 'themes/inbetween/assets/image5_252_132.png',
                    'image_7' => 'themes/inbetween/assets/image6_252_132.png',
                    'image_8' => 'themes/inbetween/assets/image7_252_132.png',
                    'image_9' => 'themes/inbetween/assets/image8_252_132.png',
                    'image_10' => 'themes/inbetween/assets/image9_252_132.png',
                ],
            ],
            3 => [
                'name' => '3. Community Statement',
                'type' => 'inbetween_community_statement',
                'settings' => [
                    'title_top' => 'THE COMMUNITY',
                    'title_bot' => 'CREATING',
                    'description' => 'A cross-border network where Professionals, Founders and Creatives collaborate and connect.',
                    'btn_1_text' => 'JOIN COMMUNITY',
                    'btn_1_link' => '#packages',
                    'btn_2_text' => 'UPCOMING EVENTS',
                    'btn_2_link' => '#events',
                    'image_1' => 'themes/inbetween/assets/image1_250_148.png',
                    'image_2' => 'themes/inbetween/assets/image2_250_148.png',
                    'image_3' => 'themes/inbetween/assets/image3_250_148.png',
                    'image_4' => 'themes/inbetween/assets/image4_250_148.png',
                ],
            ],
            4 => [
                'name' => '4. Core Values & Partners',
                'type' => 'inbetween_core_values',
                'settings' => [
                    'title' => 'Core Values',
                    'subtitle' => 'The pillars of our community',
                    'val_1_title' => 'AUTHENTICITY',
                    'val_1_desc' => 'Building genuine bonds across diverse cultures and creative industries',
                    'val_2_title' => 'INNOVATION',
                    'val_2_desc' => 'Empowering bold ideas and fostering cross-border breakthroughs',
                    'val_3_title' => 'IMPACT',
                    'val_3_desc' => 'Creating lasting value and sustainable growth for our global community',
                    'partners_title' => 'OUR BUSINESS PARTNERS',
                    'partners' => [
                        ['image' => 'themes/inbetween/assets/image0_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image1_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image2_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image3_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image4_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image5_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image6_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image7_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image8_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image9_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image10_200_302.png'],
                        ['image' => 'themes/inbetween/assets/image11_200_302.png'],
                    ],
                ],
            ],
            5 => [
                'name' => '5. Founder Section',
                'type' => 'inbetween_founder_section',
                'settings' => [
                    'founder_name' => 'HUYNH THI AI NHU',
                    'founder_role' => 'Founder of INBETWEEN',
                    'mission_statement' => 'CONNECTING PEOPLE IS OUR VERY MISSION',
                    'social_1_text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    'social_2_text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    'social_3_text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    'background_image' => 'themes/inbetween/assets/founder-bg.png',
                ],
            ],
            6 => [
                'name' => '6. Upcoming Events',
                'type' => 'inbetween_upcoming_events',
                'settings' => [
                    'title' => 'UPCOMING EVENTS',
                    'subtitle' => 'Join us at our next gathering',
                    'btn_text' => 'JOIN US',
                    'btn_link' => '#contact',
                    'limit' => '3',
                    'manual_events' => [
                        [
                            'title' => 'Private Preview',
                            'start_date' => '2026-08-18 09:00:00',
                            'location' => 'Grand Ballroom - Park Hyatt Saigon',
                            'image' => 'themes/inbetween/assets/events-bg.png',
                        ],
                    ],
                ],
            ],
            7 => [
                'name' => '7. Media / Stories',
                'type' => 'inbetween_media_stories',
                'settings' => [
                    'title' => 'Hear the STORIES',
                    'subtitle' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966.',
                    'btn_text' => 'BE OUR GUEST',
                    'btn_link' => '#contact',
                    'manual_stories' => [
                        [
                            'title' => 'HÃY ĐỂ VIỆT NAM ĐƯỢC LÀ VIỆT NAM',
                            'author_name' => 'Ken',
                            'description' => 'Lắng nghe những góc nhìn sâu sắc của Ken về bản sắc văn hóa Việt Nam, tiềm năng phát triển và cơ hội kết nối cộng đồng sáng tạo quốc tế.',
                            'image' => 'themes/inbetween/assets/story-1.png',
                            'url' => '#',
                        ],
                        [
                            'title' => 'VIỆT NAM KHIẾN TÔI TRÂN TRỌNG HƠN NHỮNG MỐI QUAN HỆ LÂU DÀI',
                            'author_name' => 'Hayo Jongejans',
                            'description' => 'Hayo Jongejans chia sẻ về hành trình xây dựng các mối quan hệ bền vững và giá trị của sự tin cậy trong môi trường kinh doanh tại Việt Nam.',
                            'image' => 'themes/inbetween/assets/story-2.png',
                            'url' => '#',
                        ],
                        [
                            'title' => 'CƠ HỘI NÀO CHO NHỮNG NHÀ SÁNG TẠO TRẺ TẠI VIỆT NAM?',
                            'author_name' => 'Thảo Nguyễn',
                            'description' => 'Khám phá những cơ hội và thách thức mà thế hệ trẻ đang đối mặt trên con đường xây dựng sự nghiệp sáng tạo tại Việt Nam.',
                            'image' => 'themes/inbetween/assets/story-3.png',
                            'url' => '#',
                        ],
                        [
                            'title' => 'GIAO THOA VĂN HÓA TRONG KỶ NGUYÊN SỐ',
                            'author_name' => 'David Trần',
                            'description' => 'Góc nhìn về sự kết hợp giữa truyền thống và công nghệ hiện đại trong các dự án văn hóa tại Việt Nam và khu vực.',
                            'image' => 'themes/inbetween/assets/story-4.png',
                            'url' => '#',
                        ],
                    ],
                ],
            ],
            8 => [
                'name' => '8. Packages',
                'type' => 'inbetween_packages',
                'settings' => [
                    'title' => 'Be a member of<br><span class="text-[#EC460B]">Our Community</span>',
                    'subtitle' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966.',
                    'btn_text' => 'BECOME A MEMBER',
                    'btn_link' => '#contact',
                    'packages_list' => [
                        [
                            'name' => 'PACKAGE 1',
                            'price' => '$29',
                            'period' => '/ Month',
                            'description' => 'Privilege',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0',
                        ],
                        [
                            'name' => 'PACKAGE 2',
                            'price' => '$49',
                            'period' => '/ Month',
                            'description' => 'Privilege',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0',
                        ],
                        [
                            'name' => 'PACKAGE 3',
                            'price' => '$69',
                            'period' => '/ Month',
                            'description' => 'Privilege',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0',
                        ],
                    ],
                ],
            ],
        ];

        // Delete old widgets in homepage-main and any misplaced vtm_* widgets for this project only
        Widget::where(function ($q) use ($projectId, $tenantId) {
            $q->where('project_id', $projectId)->orWhere('tenant_id', $tenantId);
        })->where(function ($q) {
            $q->where('area', 'homepage-main')
                ->orWhere('type', 'like', 'vtm_%');
        })->delete();

        foreach ($widgets as $order => $widget) {
            Widget::create([
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'area' => 'homepage-main',
                'name' => $widget['name'],
                'type' => $widget['type'],
                'is_active' => true,
                'sort_order' => $order,
                'settings' => $widget['settings'],
            ]);
        }

        $this->command?->info("Homepage Main widgets seeded successfully for INBETWEEN theme (Project ID: {$projectId}).");
    }
}
