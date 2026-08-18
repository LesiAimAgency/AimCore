<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Delete existing home-medical to be idempotent
        Page::where('slug', 'home-medical')->forceDelete();

        // 2. Create the home-medical page
        $page = Page::create([
            'title' => 'Home Medical',
            'slug' => 'home-medical',
            'content' => '',
            'post_type' => 'page',
            'status' => 'published',
            'meta_title' => 'Home Medical | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme',
        ]);

        // 3. Create Sections
        $sections = [
            [
                'type' => 'SliderWidget',
                'settings' => [
                    'variant' => 'medical',
                    'arrows_visible' => 'no',
                    'height' => 'vh_100',
                    'slides' => [
                        [
                            'image' => '/build/images/home-medical/slide-01.jpg',
                            'subtitle' => '<h5 class="text-danger-emphasis fw-medium fs-22">3M 6000 Series</h5>',
                            'title' => 'Search Lab <br> N95 Face Mask',
                            'button_text' => 'Explore Now',
                            'button_link' => url('shop_pages/shop'),
                        ],
                        [
                            'image' => '/build/images/home-medical/slide-02.png',
                            'subtitle' => '<h5 class="text-danger-emphasis fw-medium fs-22">Price just <strong>$14</strong></h5>',
                            'title' => 'Botanical Hand <br> Sanitizer Gel',
                            'button_text' => 'Buy Now',
                            'button_link' => url('shop_pages/shop'),
                        ],
                        [
                            'image' => '/build/images/home-medical/slide-03.png',
                            'subtitle' => '<h5 class="text-danger-emphasis fw-medium fs-22">Only <strong>$1000</strong></h5><p class="fs-22 mb-2">Fast Reading Digital</p>',
                            'title' => 'for Ear & Forehead',
                            'button_text' => '$29 - Buy Now',
                            'button_link' => url('shop_pages/shop'),
                        ],
                    ],
                ],
            ],
            [
                'type' => 'BannerWidget',
                'settings' => [
                    'variant' => 'medical',
                    'grid_layout' => '3_col',
                    'banners' => [
                        [
                            'image' => '/build/images/home-medical/banner-01.jpg',
                            'subtitle' => 'Personal',
                            'title' => 'Temperature Gun',
                            'button_text' => 'Shop Now',
                            'link' => url('shop_pages/shop'),
                        ],
                        [
                            'image' => '/build/images/home-medical/banner-02.jpg',
                            'subtitle' => 'Home Medical Supplies',
                            'title' => 'Steam Vaporizer',
                            'button_text' => 'Shop Now',
                            'link' => url('shop_pages/shop'),
                        ],
                        [
                            'image' => '/build/images/home-medical/banner-03.jpg',
                            'subtitle' => 'Hospital Equipment',
                            'title' => 'Stainless Steel Scissors',
                            'button_text' => 'Shop Now',
                            'link' => url('shop_pages/shop'),
                        ],
                    ],
                ],
            ],
            [
                'type' => 'CategoryGridWidget',
                'settings' => [
                    'variant' => 'medical', // Wait, I need a medical variant for CategoryGridWidget to perfectly match the HTML! Or just use default if I update the HTML.
                    'section_title' => 'Shop by categories',
                    'layout_type' => 'carousel',
                    'columns_desktop' => '6',
                    'custom_categories' => [ // I will update CategoryGridWidget to support this for seeders
                        ['name' => 'Hospital Equipment', 'subtitle' => '19 Products', 'image' => '/build/images/home-medical/cat-01.jpg', 'link' => url('shop_pages.shop-left-sidebar')],
                        ['name' => 'Blood Pressure', 'subtitle' => '5 Products', 'image' => '/build/images/home-medical/cat-02.jpg', 'link' => url('shop_pages.shop-left-sidebar')],
                        ['name' => 'Medical Accessories', 'subtitle' => '5 Products', 'image' => '/build/images/home-medical/cat-03.jpg', 'link' => url('shop_pages.shop-left-sidebar')],
                        ['name' => 'Personal', 'subtitle' => '8 Products', 'image' => '/build/images/home-medical/cat-04.jpg', 'link' => url('shop_pages.shop-left-sidebar')],
                        ['name' => 'Independent Living', 'subtitle' => '8 Products', 'image' => '/build/images/home-medical/cat-05.jpg', 'link' => url('shop_pages.shop-left-sidebar')],
                        ['name' => 'Pharmacy', 'subtitle' => '8 Products', 'image' => '/build/images/home-medical/cat-06.jpg', 'link' => url('shop_pages.shop-left-sidebar')],
                    ],
                ],
            ],
            [
                'type' => 'ProductWidget',
                'settings' => [
                    'variant' => 'medical',
                    'section_title' => 'Product Deals Of The Day',
                    'columns_desktop' => 4,
                    'columns_mobile' => 1,
                    'products' => [ // Mock data for now, since we haven't seeded real products yet
                        [
                            'title' => 'Portable Personal Compressor',
                            'price' => '$76.00',
                            'sale_price' => '$55.00',
                            'image' => '/build/images/home-medical/pr-20.jpg',
                            'link' => url('product/product-detail-layout-01'),
                        ],
                        [
                            'title' => 'Disposable Hand Wash Gel',
                            'price' => '$27.00',
                            'sale_price' => '$20.00',
                            'image' => '/build/images/home-medical/pr-11.jpg',
                            'link' => url('product/product-detail-layout-01'),
                        ],
                        [
                            'title' => 'Surgical Latex Gloves',
                            'price' => '$16.00',
                            'sale_price' => '$10.00',
                            'image' => '/build/images/home-medical/pr-12.jpg',
                            'link' => url('product/product-detail-layout-01'),
                        ],
                        [
                            'title' => 'Manual Oxygen Device',
                            'price' => '$15.00',
                            'sale_price' => '$12.00',
                            'image' => '/build/images/home-medical/pr-14.jpg',
                            'link' => url('product/product-detail-layout-01'),
                        ],
                        [
                            'title' => '12-Ply Gauze Sponges',
                            'price' => '$10.00',
                            'sale_price' => '$7.00',
                            'image' => '/build/images/home-medical/pr-16.jpg',
                            'link' => url('product/product-detail-layout-01'),
                        ],
                    ],
                ],
            ],
        ];

        $order = 0;
        foreach ($sections as $section) {
            $page->addSection($section['type'], $section['settings'], $order++);
        }
    }
}
