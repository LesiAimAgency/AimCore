<?php

namespace Database\Seeders;

use App\Models\Widget;
use Illuminate\Database\Seeder;

class HomepageWidgetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = 'homepage';

        // Clear existing widgets for homepage area
        Widget::where('area', $area)->delete();

        // 1. Slider Widget
        Widget::create([
            'name' => 'Main Hero Slider',
            'type' => 'SliderWidget',
            'area' => $area,
            'variant' => 'default',
            'sort_order' => 1,
            'is_active' => true,
            'settings' => [
                'slides' => [
                    [
                        'image' => '/theme/images/slide/slider-01.jpg',
                        'title' => 'LOOKBOOK 2024',
                        'subtitle' => '<p>MAKE LOVE THIS LOOK - Bộ sưu tập mùa hè sang trọng và thời thượng</p>',
                        'button_text' => 'SHOP NOW',
                        'button_link' => '/shop',
                    ],
                    [
                        'image' => '/theme/images/slide/slider-02.jpg',
                        'title' => 'SUMMER BIG SALE',
                        'subtitle' => '<p>GIẢM GIÁ ĐẾN 70% - Áp dụng cho tất cả các sản phẩm mới nhất</p>',
                        'button_text' => 'KHÁM PHÁ NGAY',
                        'button_link' => '/sale',
                    ],
                ],
            ],
        ]);

        // 2. Banner Widget
        Widget::create([
            'name' => 'Grid Banner Collection',
            'type' => 'BannerWidget',
            'area' => $area,
            'variant' => 'default',
            'sort_order' => 2,
            'is_active' => true,
            'settings' => [
                'banners' => [
                    [
                        'image' => '/theme/images/home-01/bn-05.jpg',
                        'title' => 'LOOKBOOK 2024',
                        'subtitle' => 'MAKE LOVE THIS LOOK',
                        'button_text' => 'Khám Phá',
                        'link' => '/lookbook',
                    ],
                    [
                        'image' => '/theme/images/home-01/bn-06.jpg',
                        'title' => 'Summer Sale',
                        'subtitle' => 'ƯU ĐÃI ĐẾN 70%',
                        'button_text' => 'Xem Ngay',
                        'link' => '/sale',
                    ],
                ],
            ],
        ]);

        // 3. Product Widget
        Widget::create([
            'name' => 'Featured Products Showcase',
            'type' => 'ProductWidget',
            'area' => $area,
            'variant' => 'default',
            'sort_order' => 3,
            'is_active' => true,
            'settings' => [
                'section_title' => 'Sản Phẩm Bán Chạy Mới Nhất',
                'section_subtitle' => 'Các sản phẩm xu hướng được ưa chuộng nhất mùa này',
                'custom_products' => [
                    [
                        'title' => 'Áo Thun Oversize Premium Cotton',
                        'image' => '/theme/images/products/pr-01.jpg',
                        'price' => '450.000đ',
                        'sale_price' => '350.000đ',
                        'link' => '/product/ao-thun-oversize',
                    ],
                    [
                        'title' => 'Quần Jean Slimfit Denim Co Giãn',
                        'image' => '/theme/images/products/pr-02.jpg',
                        'price' => '750.000đ',
                        'sale_price' => '590.000đ',
                        'link' => '/product/quan-jean-slimfit',
                    ],
                    [
                        'title' => 'Áo Khoác Bomber Vintage Leather',
                        'image' => '/theme/images/products/pr-03.jpg',
                        'price' => '1.200.000đ',
                        'sale_price' => '990.000đ',
                        'link' => '/product/ao-khoac-bomber',
                    ],
                    [
                        'title' => 'Giày Sneaker Streetwear White Edition',
                        'image' => '/theme/images/products/pr-04.jpg',
                        'price' => '1.500.000đ',
                        'sale_price' => '1.250.000đ',
                        'link' => '/product/giay-sneaker-white',
                    ],
                ],
            ],
        ]);

        // 4. Feature Widget
        Widget::create([
            'name' => 'Service Features Bar',
            'type' => 'FeatureWidget',
            'area' => $area,
            'variant' => 'default',
            'sort_order' => 4,
            'is_active' => true,
            'settings' => [
                'section_title' => 'Dịch Vụ & Cam Kết Chất Lượng',
                'features' => [
                    [
                        'icon' => '/theme/images/icons/truck.png',
                        'title' => 'Giao Hàng Miễn Phí',
                        'description' => 'Miễn phí vận chuyển cho đơn hàng từ 500.000đ trên toàn quốc',
                        'link' => '/shipping',
                    ],
                    [
                        'icon' => '/theme/images/icons/return.png',
                        'title' => 'Đổi Trả Trong 30 Ngày',
                        'description' => 'Dễ dàng đổi trả sản phẩm trong vòng 30 ngày nếu không vừa ý',
                        'link' => '/returns',
                    ],
                    [
                        'icon' => '/theme/images/icons/support.png',
                        'title' => 'Hỗ Trợ 24/7',
                        'description' => 'Đội ngũ tư vấn sẵn sàng giải đáp thắc mắc của bạn mọi lúc',
                        'link' => '/contact',
                    ],
                    [
                        'icon' => '/theme/images/icons/shield.png',
                        'title' => 'Thanh Toán An Toàn',
                        'description' => 'Bảo mật thông tin thanh toán tuyệt đối với nhiều phương thức',
                        'link' => '/payment',
                    ],
                ],
            ],
        ]);

        // 5. Blog Widget
        Widget::create([
            'name' => 'Latest News Blog',
            'type' => 'BlogWidget',
            'area' => $area,
            'variant' => 'default',
            'sort_order' => 5,
            'is_active' => true,
            'settings' => [
                'section_title' => 'Tin Tức & Xu Hướng Thời Trang',
                'section_subtitle' => 'Cập nhật những xu hướng thời trang và phong cách sống mới nhất',
                'custom_posts' => [
                    [
                        'title' => 'Top 5 Phong Cách Phối Đồ Cho Mùa Hè 2024',
                        'image' => '/theme/images/blog/blog-01.jpg',
                        'date' => '12/08/2024',
                        'author' => 'Kalles Style',
                        'summary' => 'Khám phá ngay những công thức phối đồ thời thượng giúp bạn tự tin tỏa sáng dưới nắng hè.',
                        'link' => '/blog/phoi-do-mua-he',
                    ],
                    [
                        'title' => 'Bí Quyết Chọn Áo Sơ Mi Chuẩn Phom Nhất',
                        'image' => '/theme/images/blog/blog-02.jpg',
                        'date' => '10/08/2024',
                        'author' => 'Admin',
                        'summary' => 'Hướng dẫn chi tiết chọn size và chất liệu áo sơ mi phù hợp với mọi vóc dáng.',
                        'link' => '/blog/chon-ao-so-mi',
                    ],
                    [
                        'title' => 'Xu Hướng Streetwear Đang Thống Trị Giới Trẻ',
                        'image' => '/theme/images/blog/blog-03.jpg',
                        'date' => '05/08/2024',
                        'author' => 'Fashionista',
                        'summary' => 'Văn hóa đường phố cùng những item năng động đang trở thành làn sóng thời trang nổi bật.',
                        'link' => '/blog/streetwear-trend',
                    ],
                ],
            ],
        ]);

        // 6. Instagram Widget
        Widget::create([
            'name' => 'Instagram Gallery Stream',
            'type' => 'InstagramWidget',
            'area' => $area,
            'variant' => 'default',
            'sort_order' => 6,
            'is_active' => true,
            'settings' => [
                'title' => '@KALLES_STORE ON INSTAGRAM',
                'username' => '@kalles.official',
                'photos' => [
                    ['image' => '/theme/images/instagram/ins-01.jpg', 'caption' => '#kallesstyle #summer2024', 'link' => 'https://instagram.com'],
                    ['image' => '/theme/images/instagram/ins-02.jpg', 'caption' => '#ootd #streetwear', 'link' => 'https://instagram.com'],
                    ['image' => '/theme/images/instagram/ins-03.jpg', 'caption' => '#newcollection #minimalism', 'link' => 'https://instagram.com'],
                    ['image' => '/theme/images/instagram/ins-04.jpg', 'caption' => '#fashiongram #vibes', 'link' => 'https://instagram.com'],
                    ['image' => '/theme/images/instagram/ins-05.jpg', 'caption' => '#kalleslookbook', 'link' => 'https://instagram.com'],
                    ['image' => '/theme/images/instagram/ins-06.jpg', 'caption' => '#bestseller', 'link' => 'https://instagram.com'],
                ],
            ],
        ]);

        $this->command->info('Homepage widgets seeded successfully!');
    }
}
