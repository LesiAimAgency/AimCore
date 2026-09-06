<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\FlashSaleCampaign;
use App\Models\FlashSaleItem;
use App\Models\ModalForm;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViettinmartEcommerceEnhanceSeeder extends Seeder
{
    public function run(?int $projectId = null): void
    {
        $project = $projectId ? Project::find($projectId) : Project::where('code', 'viettinmart-eco')->first();
        if (! $project) {
            $this->command->error('Project viettinmart-eco not found');

            return;
        }

        $pId = $project->id;
        $tId = $project->tenant_id ?? 3;

        // 1. COUPONS (Mã giảm giá thực tế, hạn dùng tới 31/12/2027)
        $this->command->info('1. Seeding Coupons...');
        $coupons = [
            [
                'code' => 'WELCOMEVTM',
                'name' => 'Ưu đãi chào bạn mới - Giảm 10%',
                'type' => 'percentage',
                'value' => 10.00,
                'min_order_value' => 150000.00,
                'max_discount_value' => 50000.00,
                'start_date' => now()->subMonth(),
                'end_date' => now()->addYears(2),
                'usage_limit' => 1000,
                'usage_limit_per_user' => 1,
                'usage_count' => 12,
                'is_active' => true,
            ],
            [
                'code' => 'FREESHIP',
                'name' => 'Miễn phí vận chuyển toàn quốc',
                'type' => 'fixed',
                'value' => 30000.00,
                'min_order_value' => 200000.00,
                'max_discount_value' => 30000.00,
                'start_date' => now()->subMonth(),
                'end_date' => now()->addYears(2),
                'usage_limit' => 5000,
                'usage_limit_per_user' => 3,
                'usage_count' => 48,
                'is_active' => true,
            ],
            [
                'code' => 'VTM20K',
                'name' => 'Giảm 20.000₫ cho đơn từ 250k',
                'type' => 'fixed',
                'value' => 20000.00,
                'min_order_value' => 250000.00,
                'max_discount_value' => 20000.00,
                'start_date' => now()->subMonth(),
                'end_date' => now()->addYears(2),
                'usage_limit' => 500,
                'usage_limit_per_user' => 2,
                'usage_count' => 25,
                'is_active' => true,
            ],
            [
                'code' => 'VTM50K',
                'name' => 'Giảm 50.000₫ cho đơn hàng lớn',
                'type' => 'fixed',
                'value' => 50000.00,
                'min_order_value' => 500000.00,
                'max_discount_value' => 50000.00,
                'start_date' => now()->subMonth(),
                'end_date' => now()->addYears(2),
                'usage_limit' => 300,
                'usage_limit_per_user' => 1,
                'usage_count' => 8,
                'is_active' => true,
            ],
            [
                'code' => 'HAISAN15',
                'name' => 'Khuyến mãi thủy hải sản tươi sạch - Giảm 15%',
                'type' => 'percentage',
                'value' => 15.00,
                'min_order_value' => 300000.00,
                'max_discount_value' => 80000.00,
                'start_date' => now()->subMonth(),
                'end_date' => now()->addYears(2),
                'usage_limit' => 800,
                'usage_limit_per_user' => 2,
                'usage_count' => 34,
                'is_active' => true,
            ],
        ];

        foreach ($coupons as $c) {
            $coupon = Coupon::where('code', $c['code'])
                ->where(function ($q) use ($pId) {
                    $q->where('project_id', $pId)->orWhereNull('project_id');
                })
                ->first();

            if ($coupon) {
                $coupon->update(array_merge($c, ['project_id' => $pId, 'tenant_id' => $tId]));
            } else {
                Coupon::create(array_merge($c, ['project_id' => $pId, 'tenant_id' => $tId]));
            }
        }

        // 2. FLASH SALE CAMPAIGN & ITEMS
        $this->command->info('2. Seeding Flash Sale Campaign & Items...');
        $campaign = FlashSaleCampaign::firstOrNew(['name' => 'Bán như tôm tươi']);
        $campaign->project_id = $pId;
        $campaign->tenant_id = $tId;
        $campaign->description = 'Đại tiệc Flash Sale hải sản tươi sống và thực phẩm sơ chế chuẩn xuất khẩu VietTinMart.';
        $campaign->starts_at = now()->subMonth();
        $campaign->ends_at = now()->addYear();
        $campaign->status = 'active';
        $campaign->apply_to_all = false;
        $campaign->save();

        // Gán 8 sản phẩm hot vào Flash Sale Items
        $products = Product::where('project_id', $pId)->limit(8)->get();
        if ($products->isNotEmpty()) {
            FlashSaleItem::where('campaign_id', $campaign->id)->delete();
            foreach ($products as $idx => $prod) {
                $discountPercent = [15, 20, 25, 30][$idx % 4];
                FlashSaleItem::create([
                    'campaign_id' => $campaign->id,
                    'product_id' => $prod->id,
                    'category_id' => $prod->category_id,
                    'discount_type' => 'percent',
                    'discount_value' => $discountPercent,
                    'sale_limit' => rand(50, 200),
                    'sold_count' => rand(15, 45),
                ]);
            }
        }

        // 3. BRANDS (Thương hiệu đối tác uy tín cho VietTinMart)
        $this->command->info('3. Seeding Brands...');
        $brands = [
            [
                'name' => 'VietTin Eco',
                'slug' => 'viettin-eco',
                'description' => 'Thương hiệu độc quyền thực phẩm và thủy hải sản sạch đạt chuẩn VietGAP của VietTinMart.',
                'logo' => 'assets/images/brands/viettin.png',
                'is_active' => true,
            ],
            [
                'name' => 'CP Foods',
                'slug' => 'cp-foods',
                'description' => 'Tập đoàn chăn nuôi và chế biến thực phẩm an toàn khép kín 3F (Feed-Farm-Food).',
                'logo' => 'assets/images/brands/cp.png',
                'is_active' => true,
            ],
            [
                'name' => 'San Hà Food',
                'slug' => 'san-ha-food',
                'description' => 'Nhà cung ứng gia cầm và thực phẩm tươi sống uy tín hàng đầu miền Nam.',
                'logo' => 'assets/images/brands/sanha.png',
                'is_active' => true,
            ],
            [
                'name' => 'Vissan',
                'slug' => 'vissan',
                'description' => 'Thương hiệu thịt tươi sạch và thực phẩm chế biến đóng hộp quốc gia.',
                'logo' => 'assets/images/brands/vissan.png',
                'is_active' => true,
            ],
            [
                'name' => 'Nam Bộ Seafood',
                'slug' => 'nam-bo-seafood',
                'description' => 'Chuyên cung cấp tôm, cua, cá biển tươi cấp đông IQF tiêu chuẩn xuất khẩu.',
                'logo' => 'assets/images/brands/nambo.png',
                'is_active' => true,
            ],
            [
                'name' => 'Đà Lạt Organic Farm',
                'slug' => 'da-lat-organic-farm',
                'description' => 'Rau củ quả sạch canh tác hữu cơ từ cao nguyên Đà Lạt Lâm Đồng.',
                'logo' => 'assets/images/brands/dalat.png',
                'is_active' => true,
            ],
        ];

        foreach ($brands as $b) {
            $brand = ProjectBrand::withTrashed()
                ->where('slug', $b['slug'])
                ->where(function ($q) use ($pId) {
                    $q->where('project_id', $pId)->orWhereNull('project_id');
                })
                ->first();

            if ($brand) {
                if ($brand->trashed()) {
                    $brand->restore();
                }
                $brand->update(array_merge($b, [
                    'project_id' => $pId,
                    'tenant_id' => $tId,
                ]));
            } else {
                ProjectBrand::create(array_merge($b, [
                    'project_id' => $pId,
                    'tenant_id' => $tId,
                ]));
            }
        }

        // 4. SHIPPING CARRIERS (Đơn vị vận chuyển)
        $this->command->info('4. Seeding Shipping Carriers...');
        $carriers = [
            [
                'name' => 'Tự giao hàng (VietTin Logistics)',
                'code' => 'local',
                'type' => 'local',
                'status' => 1,
            ],
            [
                'name' => 'Giao hàng hỏa tốc 2H (VietTin Express)',
                'code' => 'express',
                'type' => 'local',
                'status' => 1,
            ],
            [
                'name' => 'Giao Hàng Tiết Kiệm (GHTK)',
                'code' => 'ghtk',
                'type' => 'api',
                'status' => 1,
            ],
            [
                'name' => 'Giao Hàng Nhanh (GHN)',
                'code' => 'ghn',
                'type' => 'api',
                'status' => 1,
            ],
        ];

        foreach ($carriers as $carrier) {
            DB::table('shipping_carriers')->updateOrInsert(
                ['project_id' => $pId, 'code' => $carrier['code']],
                array_merge($carrier, ['created_at' => now(), 'updated_at' => now()])
            );
        }

        // 5. MODAL FORMS (Popup Form thu hút khách hàng mới)
        $this->command->info('5. Seeding Modal Form Promotion...');
        ModalForm::updateOrCreate(
            ['project_id' => $pId, 'name' => 'popup_voucher_50k'],
            [
                'tenant_id' => $tId,
                'title' => 'Tặng Voucher 50.000₫ Cho Khách Hàng Mới',
                'description' => 'Nhập số điện thoại và email để nhận ngay mã ưu đãi giảm 50.000₫ cho đơn hàng thực phẩm đầu tiên tại VietTinMart.',
                'form_template_id' => 1,
                'config' => [
                    'button_text' => 'Nhận Mã Ngay',
                    'success_message' => 'Cảm ơn bạn! Mã voucher VTM50K đã được gửi đến số điện thoại của bạn.',
                ],
                'is_active' => true,
                'trigger_type' => 'delay',
                'trigger_delay' => 5,
                'trigger_scroll' => 30,
                'show_frequency' => 'once_per_session',
            ]
        );

        $this->command->info('=== HOÀN TẤT SEED CÁC DỮ LIỆU ECOMMERCE ENHANCE VIETTINMART! ===');
    }
}
