<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2FooterWidget extends BaseWidget
{
    public static string $label = 'Footer Section';

    public static string $description = 'Section Footer của INBETWEEN với More Connections text đổi 1s hiệu ứng trên xuống, Form liên hệ tư vấn và Sub-footer';

    public static string $icon = 'sparkles';

    public static function getConfig(): array
    {
        return [
            'name' => 'Footer Section',
            'description' => 'Section Footer của INBETWEEN với More Connections text đổi 1s hiệu ứng trên xuống, Form liên hệ tư vấn và Sub-footer',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>',
            'settings' => [
                'cacheable' => false,
            ],
            'fields' => [
                [
                    'name' => 'logo_white',
                    'label' => 'Logo White SVG/Image',
                    'type' => 'image',
                    'default' => 'themes/inbetween_v2/images/Logo-white.svg',
                ],
                [
                    'name' => 'lang_en_label',
                    'label' => 'Language 1 Label',
                    'type' => 'text',
                    'default' => 'EN',
                ],
                [
                    'name' => 'lang_zh_label',
                    'label' => 'Language 2 Label',
                    'type' => 'text',
                    'default' => '汉语',
                ],
                [
                    'name' => 'top_connect_text',
                    'label' => 'Top Connect Button Text',
                    'type' => 'text',
                    'default' => "LET'S CONNECT",
                ],
                [
                    'name' => 'top_connect_link',
                    'label' => 'Top Connect Button Link',
                    'type' => 'text',
                    'default' => '#contact-modal',
                ],
                [
                    'name' => 'heading_prefix',
                    'label' => 'Heading Prefix (Trắng)',
                    'type' => 'text',
                    'default' => 'MORE',
                ],
                [
                    'name' => 'rotating_words',
                    'label' => 'Danh sách text đổi mỗi 1s hiệu ứng trên xuống',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 10,
                    'fields' => [
                        [
                            'name' => 'text',
                            'label' => 'Từ hiển thị (VD: CONNECTIONS)',
                            'type' => 'text',
                            'default' => 'CONNECTIONS',
                        ],
                    ],
                ],
                [
                    'name' => 'form_title_line1',
                    'label' => 'Form Title Line 1 (Trắng)',
                    'type' => 'text',
                    'default' => 'READY TO BUILD',
                ],
                [
                    'name' => 'form_title_highlight',
                    'label' => 'Form Title Highlight (Cam)',
                    'type' => 'text',
                    'default' => 'SOMETHING BOLD',
                ],
                [
                    'name' => 'form_title_line2',
                    'label' => 'Form Title Line 2 (Trắng)',
                    'type' => 'text',
                    'default' => 'IN VIETNAM?',
                ],
                [
                    'name' => 'form_privacy_text',
                    'label' => 'Nội dung điều khoản Chính sách',
                    'type' => 'text',
                    'default' => 'I have read and agree to the Data & Privacy Policy of in • between',
                ],
                [
                    'name' => 'form_newsletter_text',
                    'label' => 'Nội dung đăng ký nhận tin',
                    'type' => 'text',
                    'default' => 'Send me regular business updates and market insights',
                ],
                [
                    'name' => 'contact_phone',
                    'label' => 'Số điện thoại liên hệ (P:)',
                    'type' => 'text',
                    'default' => '0909 999 999',
                ],
                [
                    'name' => 'contact_email',
                    'label' => 'Email liên hệ (E:)',
                    'type' => 'text',
                    'default' => 'inbetween.asia@gmail.com',
                ],
                [
                    'name' => 'community_title',
                    'label' => 'Tiêu đề nhóm/Cộng đồng (Cột mới kế bên Explore)',
                    'type' => 'text',
                    'default' => 'Join the NOPA Zalo group',
                ],
                [
                    'name' => 'community_desc',
                    'label' => 'Mô tả nhóm/Cộng đồng (Cột mới)',
                    'type' => 'textarea',
                    'default' => "Next Day Club, new perks, and what's happening around Saigon.",
                ],
                [
                    'name' => 'community_link_text',
                    'label' => 'Chữ nút link nhóm/Cộng đồng (Cột mới)',
                    'type' => 'text',
                    'default' => 'Join the group',
                ],
                [
                    'name' => 'community_link_url',
                    'label' => 'Đường dẫn link nhóm/Cộng đồng (Có thể link ngoài https://...)',
                    'type' => 'text',
                    'default' => '#',
                ],
                [
                    'name' => 'social_links',
                    'label' => 'Danh sách Mạng xã hội (Social Media Links - Repeatable)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 12,
                    'fields' => [
                        [
                            'name' => 'name',
                            'label' => 'Tên mạng xã hội (VD: Facebook, Instagram, LinkedIn, TikTok...)',
                            'type' => 'text',
                            'default' => 'Facebook',
                        ],
                        [
                            'name' => 'url',
                            'label' => 'Đường dẫn liên kết (URL https://...)',
                            'type' => 'text',
                            'default' => 'https://facebook.com',
                        ],
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh / SVG Icon (Tùy chọn tải ảnh/SVG lên)',
                            'type' => 'image',
                            'default' => '',
                        ],
                        [
                            'name' => 'icon',
                            'label' => 'Icon class FontAwesome (Tùy chọn: fa-brands fa-facebook)',
                            'type' => 'text',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'name' => 'copyright_text',
                    'label' => 'Copyright Text',
                    'type' => 'text',
                    'default' => 'Copyright belong to INBETWEEN',
                ],
                [
                    'name' => 'powered_by_text',
                    'label' => 'Powered By Text',
                    'type' => 'text',
                    'default' => 'Powered by AIM AGENCY',
                ],
            ],
        ];
    }

    public function getMergedSettings(): array
    {
        $defaultSocials = [
            [
                'name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image' => '',
                'icon' => 'fa-brands fa-facebook',
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://instagram.com',
                'image' => '',
                'icon' => 'fa-brands fa-instagram',
            ],
            [
                'name' => 'LinkedIn',
                'url' => 'https://linkedin.com',
                'image' => '',
                'icon' => 'fa-brands fa-linkedin',
            ],
            [
                'name' => 'TikTok',
                'url' => 'https://tiktok.com',
                'image' => '',
                'icon' => 'fa-brands fa-tiktok',
            ],
        ];

        $merged = array_merge([
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
            'community_title' => 'Join the NOPA Zalo group',
            'community_desc' => "Next Day Club, new perks, and what's happening around Saigon.",
            'community_link_text' => 'Join the group',
            'community_link_url' => '#',
            'social_links' => $defaultSocials,
            'copyright_text' => 'Copyright belong to INBETWEEN',
            'powered_by_text' => 'Powered by AIM AGENCY',
        ], $this->settings);

        if (empty($merged['social_links']) || ! is_array($merged['social_links'])) {
            $legacyLinks = [];
            if (! empty($merged['facebook_url'])) {
                $legacyLinks[] = ['name' => 'Facebook', 'url' => $merged['facebook_url'], 'image' => '', 'icon' => 'fa-brands fa-facebook'];
            }
            if (! empty($merged['instagram_url'])) {
                $legacyLinks[] = ['name' => 'Instagram', 'url' => $merged['instagram_url'], 'image' => '', 'icon' => 'fa-brands fa-instagram'];
            }
            if (! empty($merged['linkedin_url'])) {
                $legacyLinks[] = ['name' => 'LinkedIn', 'url' => $merged['linkedin_url'], 'image' => '', 'icon' => 'fa-brands fa-linkedin'];
            }
            if (! empty($merged['tiktok_url'])) {
                $legacyLinks[] = ['name' => 'TikTok', 'url' => $merged['tiktok_url'], 'image' => '', 'icon' => 'fa-brands fa-tiktok'];
            }
            $merged['social_links'] = ! empty($legacyLinks) ? $legacyLinks : $defaultSocials;
        }

        return $merged;
    }

    public function render(): string
    {
        $settings = $this->getMergedSettings();

        return view('widgets.inbetween_v2.footer', [
            'widget' => $this->model ?? $this,
            'settings' => $settings,
        ])->render();
    }
}
