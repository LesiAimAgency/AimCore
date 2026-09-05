<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Translation;
use Illuminate\Database\Seeder;

class ViettinmartProductEnTranslationSeeder extends Seeder
{
    protected array $nameMap = [
        // Tôm Thẻ (White Leg Shrimp) — Raw Frozen
        'tôm thẻ hl cấp đông' => 'Frozen Headless White Leg Shrimp',
        'tôm thẻ oxy cấp đông hộp' => 'Frozen Oxy White Leg Shrimp Box',
        'tôm thẻ pd cấp đông' => 'Frozen PD White Leg Shrimp',
        'tôm thẻ pto cấp đông' => 'Frozen PTO White Leg Shrimp',
        'tôm thẻ xẻ bướm cấp đông' => 'Frozen Butterfly Cut White Leg Shrimp',
        'tôm thẻ nobashi cấp đông' => 'Frozen Nobashi White Leg Shrimp',
        'tôm thẻ pto xiên que cấp đông' => 'Frozen PTO Skewered White Leg Shrimp',
        'tôm thẻ hoto cấp đông' => 'Frozen HOTO White Leg Shrimp',
        'tôm thẻ oxy cấp đông rời11111' => 'Frozen Oxy White Leg Shrimp IQF',

        // Tôm Thẻ — Cooked / Steamed
        'tôm thẻ nc luộc cấp đông hộp' => 'Cooked Whole White Leg Shrimp Frozen Box',
        'tôm thẻ nguyên con luộc cấp đông rời' => 'Cooked Whole White Leg Shrimp IQF',
        'tôm thẻ hl hấp cấp đông rời' => 'Steamed Headless White Leg Shrimp IQF',
        'tôm thẻ pto hấp cấp đông rời' => 'Steamed PTO White Leg Shrimp IQF',
        'tôm thẻ pd hấp cấp đông rời' => 'Steamed PD White Leg Shrimp IQF',
        'tôm thẻ sushi cấp đông' => 'White Leg Shrimp Sushi Frozen',
        'tôm thẻ pd xiên que cấp đông' => 'White Leg Shrimp PD Skewered IQF',

        // Tôm Sú (Tiger Shrimp) — Raw Frozen
        'tôm sú oxy cấp đông hộp' => 'Frozen Oxy Tiger Shrimp Box',
        'tôm sú biển cấp đông' => 'Frozen Sea Tiger Shrimp',
        'tôm sú xiên que cấp đông' => 'Frozen Skewered Tiger Shrimp',
        'tôm sú hl cấp đông' => 'Frozen Headless Tiger Shrimp',
        'tôm sú pto cấp đông' => 'Frozen PTO Tiger Shrimp',
        'tôm sú pd cấp đông' => 'Frozen PD Tiger Shrimp',
        'tôm sú hoto cấp đông' => 'Frozen HOTO Tiger Shrimp',
        'tôm sú nobashi cấp đông' => 'Frozen Nobashi Tiger Shrimp',
        'tôm sú xẻ bướm cấp đông' => 'Frozen Butterfly Cut Tiger Shrimp',
        'tôm sú sushi cấp đông' => 'Tiger Shrimp Sushi Frozen',

        // Tôm Sú — Cooked / Steamed
        'tôm sú nguyên con luộc cấp đông hộp' => 'Cooked Whole Tiger Shrimp Frozen Box',
        'tôm sú nguyên con luộc cấp đông rời' => 'Cooked Whole Tiger Shrimp IQF',
        'tôm sú hl hấp cấp đông rời' => 'Steamed Headless Tiger Shrimp IQF',
        'tôm sú pto hấp cấp đông rời' => 'Steamed PTO Tiger Shrimp IQF',
        'tôm sú pd hấp cấp đông rời' => 'Steamed PD Tiger Shrimp IQF',

        // Tôm Tẩm Bột (Breaded Shrimp)
        'tôm nobashi tẩm bột' => 'Breaded Nobashi Shrimp',
        'tôm hoto tẩm bột' => 'Breaded HOTO Shrimp',
        'tôm xẻ bướm tẩm bột' => 'Breaded Butterfly Shrimp',
        'tôm pd tẩm bột' => 'Breaded PD Shrimp',
        'tôm viên tẩm bột' => 'Breaded Shrimp Ball',
        'tôm nobashi hấp tẩm bột' => 'Breaded Steamed Nobashi Shrimp',
        'burger tôm tẩm bột' => 'Breaded Shrimp Burger',

        // Cá Basa
        'cá basa nguyên con cấp đông' => 'Frozen Whole Basa Fish',
        'cá basa hl cấp đông' => 'Frozen Headless Basa Fish',
        'cá basa cắt khúc cấp đông' => 'Frozen Basa Fish Steak',
        'cá basa fillet cấp đông' => 'Frozen Basa Fish Fillet',

        // Cá Khác
        'cá rô phi nguyên con làm sạch cấp đông' => 'Frozen Cleaned Whole Tilapia',
        'cá rô phi fillet cấp đông' => 'Frozen Tilapia Fillet',
        'cá chẽm nguyên con làm sạch cấp đông' => 'Frozen Cleaned Whole Sea Bass',
        'cá chẽm fillet còn da cấp đông' => 'Frozen Sea Bass Fillet (Skin-on)',
        'cá tẩm bột' => 'Breaded Fish',
        'cá chim' => 'Pomfret Fish',
        'cá diêu hồng' => 'Red Tilapia',
        'đầu cá hồi' => 'Salmon Head',

        // Mực (Squid & Cuttlefish)
        'mực ống nguyên con cấp đông' => 'Frozen Whole Squid',
        'mực ống nguyên con làm sạch cấp đông' => 'Frozen Cleaned Whole Squid',
        'mực cắt làm sạch cấp đông' => 'Frozen Cleaned Cut Squid',
        'mực ống trứng' => 'Squid with Eggs',
        'mực nang làm sạch cấp đông' => 'Frozen Cleaned Cuttlefish',
        'mực nút làm sạch cấp đông' => 'Frozen Cleaned Baby Squid',

        // Bạch Tuộc (Octopus)
        'bạch tuộc làm sạch cấp đông' => 'Frozen Cleaned Octopus',
        'bạch tuộc làm sạch cắt miếng' => 'Frozen Cleaned Sliced Octopus',

        // Hải Sản Đặc Biệt
        'tôm hùm bông' => 'Slipper Lobster',
        'tôm càng xanh' => 'Giant Freshwater Prawn',
        'cua cà mau hấp' => 'Steamed Ca Mau Crab',

        // Hạt
        'nhân điều rang hũ giấy' => 'Roasted Cashew Nuts (Paper Jar)',

        // Trailing space / test data
        'tôm thẻ nguyên con luộc cấp đông rời ' => 'Cooked Whole White Leg Shrimp IQF',
    ];

    public function run(int $projectId = 10): void
    {
        $products = Product::where('project_id', $projectId)->get();
        if ($products->isEmpty()) {
            $products = Product::all();
        }

        foreach ($products as $product) {
            $viName = trim($product->name);
            $viNameLower = mb_strtolower($viName);

            $enName = $this->nameMap[$viNameLower]
                   ?? $this->nameMap[mb_strtolower($product->name)]
                   ?? null;

            if (! $enName) {
                continue;
            }

            $fields = [
                'name' => $enName,
                'meta_title' => $enName,
                'short_description' => $product->short_description ?? '',
                'description' => $product->description ?? '',
                'meta_description' => $product->meta_description ?? '',
            ];

            foreach ($fields as $field => $value) {
                Translation::updateOrCreate(
                    [
                        'translatable_type' => Product::class,
                        'translatable_id' => $product->id,
                        'locale' => 'en',
                        'field' => $field,
                    ],
                    [
                        'value' => $value ?? '',
                    ]
                );
            }
        }
    }
}
