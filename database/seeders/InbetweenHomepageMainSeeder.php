<?php

namespace Database\Seeders;

use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenHomepageMainSeeder extends Seeder
{
    public function run(): void
    {
        $tenantId = session('current_project')['id'] ?? \App\Models\Project::first()->id ?? 1;

        $widgets = [
            1 => [
                'name' => '1. Hero Section',
                'type' => 'inbetween_hero_section',
                'settings' => [
                    'primary_color' => '#EC460B',
                    'hero_logo' => asset('themes/inbetween/assets/logo.svg'),
                    'hero_subtitle' => 'Cross-border community, media & connection platform|for|Professionals, Founders, Creatives & Organizations'
                ]
            ],
            2 => [
                'name' => '2. Community 3D Collage',
                'type' => 'inbetween_community_collage',
                'settings' => [
                    'center_logo' => asset('themes/inbetween/assets/logo-white.svg'),
                    'image_1' => asset('themes/inbetween/assets/image0_252_132.png'),
                    'image_2' => asset('themes/inbetween/assets/image1_252_132.png'),
                    'image_3' => asset('themes/inbetween/assets/image2_252_132.png'),
                    'image_4' => asset('themes/inbetween/assets/image3_252_132.png'),
                    'image_5' => asset('themes/inbetween/assets/image4_252_132.png'),
                    'image_6' => asset('themes/inbetween/assets/image5_252_132.png'),
                    'image_7' => asset('themes/inbetween/assets/image6_252_132.png'),
                    'image_8' => asset('themes/inbetween/assets/image7_252_132.png'),
                    'image_9' => asset('themes/inbetween/assets/image8_252_132.png'),
                    'image_10' => asset('themes/inbetween/assets/image9_252_132.png')
                ]
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
                    'image_1' => asset('themes/inbetween/assets/image1_250_148.png'),
                    'image_2' => asset('themes/inbetween/assets/image2_250_148.png'),
                    'image_3' => asset('themes/inbetween/assets/image3_250_148.png'),
                    'image_4' => asset('themes/inbetween/assets/image4_250_148.png')
                ]
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
                        ['image' => 'themes/inbetween/assets/image11_200_302.png']
                    ]
                ]
            ],
            5 => [
                'name' => '5. Founder Section',
                'type' => 'inbetween_founder_section',
                'settings' => [
                    'title' => 'CONNECTING PEOPLE<br>IS OUR VERY MISSION',
                    'quote' => '',
                    'author_name' => 'HUYNH THI AI NHU',
                    'author_role' => 'Founder of INBETWEEN',
                    'founder_image' => asset('themes/inbetween/assets/founder-bg.png')
                ]
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
                        ]
                    ]
                ]
            ],
            7 => [
                'name' => '7. Media / Stories',
                'type' => 'inbetween_media_stories',
                'settings' => [
                    'title' => 'Hear the STORIES',
                    'btn_text' => 'BE OUR GUEST',
                    'btn_link' => '#contact',
                    'limit' => '4',
                    'manual_stories' => [
                        [
                            'title' => 'HÃY ĐỂ VIỆT NAM ĐƯỢC LÀ VIỆT NAM',
                            'created_at' => '2024-05-12 10:00:00',
                            'image' => 'themes/inbetween/assets/story-1.png',
                            'url' => '#'
                        ],
                        [
                            'title' => 'VIỆT NAM KHIẾN TÔI TRÂN TRỌNG HƠN NHỮNG MỐI QUAN HỆ LÂU DÀI',
                            'created_at' => '2024-06-20 14:30:00',
                            'image' => 'themes/inbetween/assets/story-2.png',
                            'url' => '#'
                        ],
                        [
                            'title' => 'PHÁ SẢN VÌ KHỞI NGHIỆP CO-WORKING SPACE',
                            'created_at' => '2024-07-05 09:15:00',
                            'image' => 'themes/inbetween/assets/story-3.png',
                            'url' => '#'
                        ],
                        [
                            'title' => 'MEDIA TITLE GOES HERE',
                            'created_at' => '2024-08-18 16:45:00',
                            'image' => 'themes/inbetween/assets/story-4.png',
                            'url' => '#'
                        ]
                    ]
                ]
            ],
            8 => [
                'name' => '8. Packages',
                'type' => 'inbetween_packages',
                'settings' => [
                    'title' => 'Be a member of<br><span class="text-[#EC460B]">Our Community</span>',
                    'btn_text' => 'BECOME A MEMBER',
                    'btn_link' => '#contact',
                    'packages_list' => [
                        [
                            'name' => 'PACKAGE 1',
                            'price' => '$29',
                            'period' => '/ Month',
                            'description' => '',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0'
                        ],
                        [
                            'name' => 'PACKAGE 2',
                            'price' => '$49',
                            'period' => '/ Month',
                            'description' => '',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0'
                        ],
                        [
                            'name' => 'PACKAGE 3',
                            'price' => '$69',
                            'period' => '/ Month',
                            'description' => '',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0'
                        ]
                    ]
                ]
            ]
        ];

        // Delete old widgets in homepage-main to avoid duplicates
        Widget::where('tenant_id', $tenantId)->where('area', 'homepage-main')->delete();

        foreach ($widgets as $order => $widget) {
            Widget::create([
                'tenant_id' => $tenantId,
                'area' => 'homepage-main',
                'name' => $widget['name'],
                'type' => $widget['type'],
                'is_active' => true,
                'sort_order' => $order,
                'settings' => $widget['settings'],
            ]);
        }

        $this->command->info('Homepage Main widgets seeded successfully for INBETWEEN theme.');
    }
}
