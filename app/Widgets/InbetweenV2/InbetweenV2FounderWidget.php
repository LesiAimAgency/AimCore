<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2FounderWidget extends BaseWidget
{
    public static string $label = 'Founder Profile Section';

    public static string $description = 'Section Founder với portrait, counter số năm kinh nghiệm, và drawer chi tiết mở rộng';

    public static string $icon = 'user';

    public static function getConfig(): array
    {
        return [
            'name' => 'Founder Profile Section',
            'description' => 'Section Founder với portrait, counter số năm kinh nghiệm, và drawer chi tiết mở rộng',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>',
            'fields' => [
                [
                    'name' => 'founder_portrait',
                    'label' => 'Ảnh chân dung Founder',
                    'type' => 'image',
                    'default' => '/storage/media/project-DA005/founder-airu-portrait.png',
                ],
                [
                    'name' => 'founder_name',
                    'label' => 'Founder Name',
                    'type' => 'text',
                    'default' => 'AIRU',
                ],
                [
                    'name' => 'founder_role',
                    'label' => 'Founder Role',
                    'type' => 'text',
                    'default' => 'Founder of INBETWEEN',
                ],
                [
                    'name' => 'quote_line1',
                    'label' => 'Quote Line 1 (Đen)',
                    'type' => 'text',
                    'default' => 'Built between cultures.',
                ],
                [
                    'name' => 'quote_line2',
                    'label' => 'Quote Line 2 (Cam)',
                    'type' => 'text',
                    'default' => 'Connected across borders.',
                ],
                [
                    'name' => 'experience_years',
                    'label' => 'Số năm kinh nghiệm (VD: 14+)',
                    'type' => 'text',
                    'default' => '14+',
                ],
                [
                    'name' => 'experience_label',
                    'label' => 'Mô tả kinh nghiệm',
                    'type' => 'text',
                    'default' => 'Years of experience across Europe, the Arab region, Africa and Asia',
                ],
                [
                    'name' => 'detail_exp_title',
                    'label' => 'Drawer Section 1: Tiêu đề kinh nghiệm',
                    'type' => 'text',
                    'default' => '14 YEARS OF EXPERIENCE',
                ],
                [
                    'name' => 'detail_exp_desc',
                    'label' => 'Drawer Section 1: Nội dung kinh nghiệm (HTML)',
                    'type' => 'ckeditor',
                    'default' => 'AiRu is a driven international professional with <strong class="font-semibold text-[#131313]">14 years of experience across Europe, the Arab region, Africa and Asia</strong>, specializing in <strong class="font-semibold text-[#131313]">cross-border partnerships and business development</strong>. She navigates nuanced intercultural environments to build high-trust commercial pathways between emerging and developed ecosystems.',
                ],
                [
                    'name' => 'detail_exp_image',
                    'label' => 'Drawer Section 1: Hình ảnh sân khấu',
                    'type' => 'image',
                    'default' => '/storage/media/project-DA005/founder-airu-stage.png',
                ],
                [
                    'name' => 'languages_title',
                    'label' => 'Drawer Section 2: Tiêu đề ngoại ngữ',
                    'type' => 'text',
                    'default' => 'FLUENCY IN 3 LANGUAGES',
                ],
                [
                    'name' => 'languages',
                    'label' => 'Drawer Section 2: Danh sách ngôn ngữ (Repeatable)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 8,
                    'fields' => [
                        [
                            'name' => 'name',
                            'label' => 'Tên ngôn ngữ (VD: Vietnamese)',
                            'type' => 'text',
                            'default' => 'Vietnamese',
                        ],
                        [
                            'name' => 'proficiency',
                            'label' => 'Mức độ (VD: Native / Bilingual)',
                            'type' => 'text',
                            'default' => 'Native / Bilingual',
                        ],
                    ],
                ],
                [
                    'name' => 'media_title',
                    'label' => 'Drawer Section 3: Tiêu đề kênh truyền thông',
                    'type' => 'text',
                    'default' => 'OWN MEDIA PLATFORM WITH 35K+ FOLLOWERS',
                ],
                [
                    'name' => 'media_desc',
                    'label' => 'Drawer Section 3: Mô tả kênh truyền thông',
                    'type' => 'textarea',
                    'default' => 'Host and curator of leading cross-border business discussions, podcasts, and intercultural networking series with an engaged executive community of over 35,000 global founders, investors, and industry decision-makers.',
                ],
                [
                    'name' => 'media_image',
                    'label' => 'Drawer Section 3: Hình ảnh Podcast / Media',
                    'type' => 'image',
                    'default' => '/storage/media/project-DA005/image 13.png',
                ],
                [
                    'name' => 'regions_title',
                    'label' => 'Drawer Section 4: Tiêu đề khu vực',
                    'type' => 'text',
                    'default' => 'CROSS-BORDER EXPERTISE & REGIONS',
                ],
                [
                    'name' => 'regions',
                    'label' => 'Drawer Section 4: Danh sách khu vực (Repeatable)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 8,
                    'fields' => [
                        [
                            'name' => 'title',
                            'label' => 'Tên khu vực (VD: Europe)',
                            'type' => 'text',
                            'default' => 'Europe',
                        ],
                        [
                            'name' => 'desc',
                            'label' => 'Mô tả hoạt động',
                            'type' => 'textarea',
                            'default' => 'Facilitating bilateral enterprise cooperation, multilateral trade dialogs, and specialized technology exchange between EU innovation hubs and Southeast Asia.',
                        ],
                    ],
                ],
                [
                    'name' => 'alliances_title',
                    'label' => 'Drawer Section 5: Tiêu đề Alliances',
                    'type' => 'text',
                    'default' => 'BUSINESS DEVELOPMENT & STRATEGIC ALLIANCES',
                ],
                [
                    'name' => 'alliances_desc',
                    'label' => 'Drawer Section 5: Mô tả Alliances',
                    'type' => 'textarea',
                    'default' => "At INBETWEEN, AiRu leverages deep relational equity and agile localized strategies to bridge international standards with Vietnam's dynamic commercial realities. Her approach removes operational friction, minimizes foreign market entry risk, and accelerates time-to-market for pioneering ventures.",
                ],
                [
                    'name' => 'cta_card_title',
                    'label' => 'CTA Box: Tiêu đề',
                    'type' => 'text',
                    'default' => 'START A CONVERSATION',
                ],
                [
                    'name' => 'cta_card_desc',
                    'label' => 'CTA Box: Mô tả',
                    'type' => 'textarea',
                    'default' => 'Explore how INBETWEEN can serve as your dedicated local team before you are ready to hire one.',
                ],
                [
                    'name' => 'cta_card_btn_text',
                    'label' => 'CTA Box: Nút bấm',
                    'type' => 'text',
                    'default' => "Let's Connect With AiRu",
                ],
                [
                    'name' => 'cta_card_btn_link',
                    'label' => 'CTA Box: Liên kết',
                    'type' => 'text',
                    'default' => '#contact',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'founder_portrait' => '/storage/media/project-DA005/founder-airu-portrait.png',
            'founder_name' => 'AIRU',
            'founder_role' => 'Founder of INBETWEEN',
            'quote_line1' => 'Built between cultures.',
            'quote_line2' => 'Connected across borders.',
            'experience_years' => '14+',
            'experience_label' => 'Years of experience across Europe, the Arab region, Africa and Asia',
            'detail_exp_title' => '14 YEARS OF EXPERIENCE',
            'detail_exp_desc' => 'AiRu is a driven international professional with <strong class="font-semibold text-[#131313]">14 years of experience across Europe, the Arab region, Africa and Asia</strong>, specializing in <strong class="font-semibold text-[#131313]">cross-border partnerships and business development</strong>. She navigates nuanced intercultural environments to build high-trust commercial pathways between emerging and developed ecosystems.',
            'detail_exp_image' => '/storage/media/project-DA005/founder-airu-stage.png',
            'languages_title' => 'FLUENCY IN 3 LANGUAGES',
            'languages' => [
                ['name' => 'Vietnamese', 'proficiency' => 'Native / Bilingual'],
                ['name' => 'English', 'proficiency' => 'Professional Working'],
                ['name' => 'Arabic', 'proficiency' => 'Working Proficiency'],
            ],
            'media_title' => 'OWN MEDIA PLATFORM WITH 35K+ FOLLOWERS',
            'media_desc' => 'Host and curator of leading cross-border business discussions, podcasts, and intercultural networking series with an engaged executive community of over 35,000 global founders, investors, and industry decision-makers.',
            'media_image' => '/storage/media/project-DA005/image 13.png',
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
        ], $this->settings);

        return view('widgets.inbetween_v2.founder', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
