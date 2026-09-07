<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\Wkcomputer\WkProduct;
use Illuminate\Http\Request;

class BuildPcController extends Controller
{
    public function index()
    {
        return view('pages.build_pc');
    }

    public function getProducts(Request $request)
    {
        $cat = (string) $request->input('cat');

        $categoryMap = [
            'cpu' => ['cpu-bo-vi-xu-ly', 'cpu-intel', 'cpu-amd', 'cpu'],
            'mainboard' => ['mainboard-bo-mach-chu', 'mainboard-intel', 'mainboard-amd', 'mainboard'],
            'ram' => ['ram-bo-nho-trong', 'ram-ddr4', 'ram-ddr5', 'ram'],
            'vga' => ['vga-card-man-hinh', 'vga-nvidia', 'vga-amd', 'vga'],
            'storage' => ['o-cung-ssd', 'o-cung-hdd', 'o-cung-ssd-hdd', 'o-cung'],
            'psu' => ['psu-nguon-may-tinh', 'nguon-may-tinh', 'psu'],
            'case' => ['case-vo-may-tinh', 'vo-case', 'case'],
        ];

        $slugs = $categoryMap[$cat] ?? [];

        $dbProducts = collect();
        if (! empty($slugs)) {
            $dbProducts = WkProduct::active()
                ->whereHas('categories', function ($q) use ($slugs) {
                    $q->whereIn('slug', $slugs);
                })
                ->limit(20)
                ->get();
        }

        if ($dbProducts->isEmpty()) {
            // Try searching by name if category relation yields no results
            $dbProducts = WkProduct::active()
                ->where('name', 'like', "%{$cat}%")
                ->limit(15)
                ->get();
        }

        if ($dbProducts->isNotEmpty()) {
            $items = $dbProducts->map(function ($p) {
                return [
                    'id' => $p->id,
                    'name' => $p->name,
                    'price' => (int) $p->effective_price,
                    'img' => $p->image ?: '/media-files/placeholder.jpg',
                ];
            })->values();

            return response()->json([
                'success' => true,
                'data' => $items,
            ]);
        }

        // Fallback default components if database has no components for this slot
        $fallback = [
            'cpu' => [
                ['id' => 101, 'name' => 'CPU Intel Core i5-12400F (Upto 4.4GHz, 6 Nhân 12 Luồng)', 'price' => 3290000, 'img' => '/media-files/media/products/cpu.png'],
                ['id' => 102, 'name' => 'CPU Intel Core i7-13700K (Upto 5.4GHz, 16 Nhân 24 Luồng)', 'price' => 10500000, 'img' => '/media-files/media/products/cpu.png'],
                ['id' => 103, 'name' => 'CPU AMD Ryzen 5 7600X (4.7GHz Boost 5.3GHz, 6C/12T)', 'price' => 5990000, 'img' => '/media-files/media/products/cpu.png'],
            ],
            'mainboard' => [
                ['id' => 201, 'name' => 'Mainboard ASUS TUF GAMING B760M-PLUS WIFI D4', 'price' => 3890000, 'img' => '/media-files/media/products/mainboard.png'],
                ['id' => 202, 'name' => 'Mainboard GIGABYTE Z790 AORUS ELITE AX', 'price' => 6990000, 'img' => '/media-files/media/products/mainboard.png'],
            ],
            'ram' => [
                ['id' => 301, 'name' => 'RAM Corsair Vengeance LPX 16GB (2x8GB) 3200MHz DDR4', 'price' => 1190000, 'img' => '/media-files/media/products/ram.png'],
                ['id' => 302, 'name' => 'RAM Kingston FURY Beast 32GB (2x16GB) 5600MHz DDR5 RGB', 'price' => 2890000, 'img' => '/media-files/media/products/ram.png'],
            ],
            'vga' => [
                ['id' => 401, 'name' => 'VGA ASUS Dual GeForce RTX 3060 12GB GDDR6 V2', 'price' => 7490000, 'img' => '/media-files/media/products/vga.png'],
                ['id' => 402, 'name' => 'VGA MSI GeForce RTX 4070 VENTUS 2X 12G OC', 'price' => 16990000, 'img' => '/media-files/media/products/vga.png'],
            ],
            'storage' => [
                ['id' => 501, 'name' => 'SSD Samsung 980 500GB PCIe NVMe M.2 2280', 'price' => 1290000, 'img' => '/media-files/media/products/ssd.png'],
                ['id' => 502, 'name' => 'SSD Kingston NV2 1TB PCIe 4.0 NVMe M.2', 'price' => 1650000, 'img' => '/media-files/media/products/ssd.png'],
            ],
            'psu' => [
                ['id' => 601, 'name' => 'Nguồn Corsair CV650 650W - 80 Plus Bronze', 'price' => 1490000, 'img' => '/media-files/media/products/psu.png'],
            ],
            'case' => [
                ['id' => 701, 'name' => 'Vỏ Case Xigmatek Aqua M Lite Black Kèm 3 Fan RGB', 'price' => 1190000, 'img' => '/media-files/media/products/case.png'],
            ],
        ];

        return response()->json([
            'success' => true,
            'data' => $fallback[$cat] ?? [],
        ]);
    }
}
