<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Services\SettingsService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViettinmartSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::where('code', 'viettinmart-eco')->first();
        if (! $project) {
            $this->command->error('Project viettinmart-eco not found');

            return;
        }

        $projectId = $project->id;

        $settings = [
            // 1. Contact Settings
            'contact_email' => 'cskh@viettinmart.vn',
            'contact_phone' => '(+84) 906 910 022',
            'contact_address' => '36 Đường số 08, KDC Nam Long, Phường An Lạc, Bình Tân, TP. Hồ Chí Minh',
            'contact_zalo' => '0906910022',
            'contact_facebook_message_id' => 'https://m.me/viettinmart',

            // 2. Social Settings
            'social_facebook' => 'https://facebook.com/viettinmart',
            'social_youtube' => 'https://youtube.com/@viettinmart',
            'social_instagram' => 'https://instagram.com/viettinmart',
            'social_tiktok' => 'https://tiktok.com/@viettinmart',
            'social_zalo' => 'https://zalo.me/0906910022',
            'social_twitter' => 'https://twitter.com/viettinmart',

            // 3. SEO Settings
            'seo_meta_title' => 'VietTinMart - Thực phẩm tươi sạch mỗi ngày',
            'seo_meta_description' => 'VietTinMart chuyên cung cấp thủy hải sản tươi sống, cấp đông và thực phẩm sơ chế chuẩn xuất khẩu.',
            'seo_meta_keywords' => 'thực phẩm tươi sống, hải sản sạch, viettinmart, tôm thẻ, cá hồi, thịt bò',
            'google_analytics_id' => 'G-VTMART2026',
            'google_site_verification' => 'vtm_site_verification_token_2026',
            'bing_site_verification' => 'vtm_bing_verification_token_2026',
            'robots_txt' => "User-agent: *\nDisallow: /admin/\nDisallow: /api/\nSitemap: ".url('/viettinmart-eco/sitemap.xml'),

            // 4. Payment Settings
            'payment_cod_enabled' => 1,
            'payment_bank_enabled' => 1,
            'bank_name' => 'Ngân hàng TMCP Ngoại Thương Việt Nam (Vietcombank)',
            'bank_account' => '0123456789',
            'bank_account_name' => 'CONG TY CP THUC PHAM VIETTIN',
            'payment_vnpay_enabled' => 1,
            'vnpay_tmn_code' => 'VIETTINM',
            'vnpay_hash_secret' => 'VTMSECRETKEY2026',
            'payment_momo_enabled' => 0,

            // 5. Shipping Settings
            'free_shipping_threshold' => 300000,
            'default_shipping_fee' => 20000,

            // 6. Notification / SMTP Settings
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => 587,
            'mail_encryption' => 'tls',
            'mail_username' => 'cskh@viettinmart.vn',
            'mail_password' => 'vtm_app_password_2026',
            'mail_from_address' => 'cskh@viettinmart.vn',
            'mail_from_name' => 'VietTinMart CSKH',

            // 7. Table of Contents
            'toc_enabled' => true,
            'toc_title' => 'Mục lục nội dung',
            'toc_min_headings' => 2,
            'toc_heading_tags' => 'h2,h3,h4',

            // 7b. Fonts
            'fonts' => [
                [
                    'id' => 'font_primary_vtm',
                    'key' => 'primary',
                    'type' => 'google',
                    'label' => 'Inter',
                    'load' => 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
                    'is_active' => true,
                    'is_default' => true,
                ],
                [
                    'id' => 'font_heading_vtm',
                    'key' => 'heading',
                    'type' => 'google',
                    'label' => 'Barlow',
                    'load' => 'https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&display=swap',
                    'is_active' => true,
                    'is_default' => false,
                ],
            ],

            // 8. Watermark
            'watermark' => [
                'enabled' => false,
                'type' => 'text',
                'text' => 'VietTinMart',
                'font_size' => 20,
                'font_color' => 'rgba(40, 167, 69, 0.5)',
                'position' => 'bottom-right',
                'offset_x' => 15,
                'offset_y' => 15,
                'scale' => 20,
                'opacity' => 50,
            ],

            // 9. Reviews
            'reviews' => [
                'enabled' => true,
                'require_login' => false,
                'require_purchase' => false,
                'show_verified' => true,
                'auto_approve' => true,
                'rating_type' => 'star',
                'display_position' => 'bottom',
            ],

            // 10. Contact Buttons
            'contact_buttons' => [
                ['type' => 'phone', 'label' => 'Điện thoại', 'value' => '0906910022', 'enabled' => true, 'icon' => '📞', 'color' => '#10b981', 'placeholder' => '0123456789'],
                ['type' => 'zalo', 'label' => 'Zalo', 'value' => '0906910022', 'enabled' => true, 'icon' => 'Zalo', 'color' => '#0068ff', 'placeholder' => '0123456789'],
                ['type' => 'messenger', 'label' => 'Facebook', 'value' => 'viettinmart', 'enabled' => true, 'icon' => 'FB', 'color' => '#0084ff', 'placeholder' => 'facebook.page.id'],
                ['type' => 'sms', 'label' => 'SMS', 'value' => '0906910022', 'enabled' => false, 'icon' => 'SMS', 'color' => '#f59e0b', 'placeholder' => '0123456789'],
            ],
            'contact_buttons_desktop_enabled' => 1,
            'contact_buttons_mobile_enabled' => 1,
            'desktop_enabled' => 1,
            'mobile_enabled' => 1,
            'desktop_position' => 'bottom-right',
            'mobile_position' => 'bottom-right',
            'contact_buttons_desktop_position' => 'bottom-right',
            'contact_buttons_mobile_position' => 'bottom-right',
            'contact_buttons_desktop_margin_v' => 30,
            'contact_buttons_desktop_margin_h' => 30,
            'contact_buttons_mobile_margin_v' => 20,
            'contact_buttons_mobile_margin_h' => 20,
            'contact_buttons_style' => 'circle',
            'btn_phone_enabled' => 1,
            'btn_phone_number' => '0906910022',
            'btn_zalo_enabled' => 1,
            'btn_zalo_number' => '0906910022',
            'btn_messenger_enabled' => 1,
            'btn_messenger_url' => 'https://m.me/viettinmart',

            // 11. Fake Notifications
            'fake_notifications_enabled' => 1,
            'fake_notifications_interval' => 12,
            'fake_notifications_duration' => 5,
            'fake_notifications_names' => 'Chị Lan (Bình Tân), Anh Hùng (Quận 1), Chị Mai (Tân Bình), Cô Hoa (Gò Vấp), Anh Nam (Bình Thạnh), Chị Trang (Quận 7)',
            'fake_notifications_locations' => 'Vừa đặt mua 2kg Tôm Thẻ HL Cấp Đông, Vừa đặt mua Cá Hồi Tươi Nguyên Con, Vừa đặt mua 1kg Ba Chỉ Bò Mỹ, Vừa thanh toán đơn hàng 650.000₫',

            // 12. Popups
            'popup' => [
                'enabled' => false,
                'title' => 'Chào mừng bạn đến với VietTinMart!',
                'subtitle' => 'Nhận ngay mã giảm giá 20% cho đơn hàng đầu tiên từ 300.000₫',
                'button_text' => 'Nhận Ưu Đãi Ngay',
                'button_color' => '#28a745',
                'delay' => 5,
                'frequency' => 'once',
                'position' => 'center',
                'show_desktop' => true,
                'show_mobile' => true,
            ],

            // 13. Theme Options: Layout
            'theme_option_layout' => [
                'page_layout' => 'full-width',
                'post_layout' => 'sidebar-right',
                'post_category_layout' => 'sidebar-right',
                'product_layout' => 'full-width',
                'product_category_layout' => 'sidebar-left',
            ],

            // 14. Theme Options: Post Category
            'theme_option_post-category' => [
                'post_category_style' => 'grid',
                'posts_per_page' => 12,
                'post_excerpt_length' => 150,
                'show_post_date' => 1,
                'show_post_author' => 1,
                'show_post_category' => 1,
                'show_post_comments' => 0,
                'desktop_columns' => 3,
                'tablet_columns' => 2,
                'mobile_columns' => 1,
            ],

            // 15. Theme Options: Banner
            'theme_option_banner' => [
                'banner_height' => 220,
                'banner_style' => 'center',
                'banner_page' => 'container',
                'banner_post_category' => 'container',
                'banner_post' => 'container',
                'banner_product_category' => 'container',
            ],
        ];

        // Save into DB settings table
        foreach ($settings as $key => $val) {
            DB::table('settings')
                ->where('key', $key)
                ->where('project_id', $projectId)
                ->delete();

            DB::table('settings')->insert([
                'key' => $key,
                'payload' => json_encode(is_array($val) ? $val : ['value' => $val]),
                'group' => str_starts_with($key, 'theme_option_') ? 'theme' : 'general',
                'project_id' => $projectId,
                'tenant_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Also mirror basic scalar keys into project_settings table
            if (is_scalar($val)) {
                DB::connection('mysql')->table('project_settings')->updateOrInsert(
                    ['project_id' => $projectId, 'key' => $key],
                    ['value' => (string) $val, 'updated_at' => now()]
                );
            }
        }

        // Ensure fonts setting has default font list
        $fonts = [
            ['id' => 'f1', 'key' => 'roboto', 'type' => 'google', 'label' => 'Roboto', 'load' => '400,500,700', 'is_default' => 1],
            ['id' => 'f2', 'key' => 'inter', 'type' => 'google', 'label' => 'Inter', 'load' => '400,600,700', 'is_default' => 0],
            ['id' => 'f3', 'key' => 'montserrat', 'type' => 'google', 'label' => 'Montserrat', 'load' => '500,600,700', 'is_default' => 0],
        ];
        DB::table('settings')->where('key', 'fonts')->where('project_id', $projectId)->delete();
        DB::table('settings')->insert([
            'key' => 'fonts',
            'payload' => json_encode($fonts),
            'group' => 'general',
            'project_id' => $projectId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        SettingsService::getInstance()->clearCache();
    }
}
