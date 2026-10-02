<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ehenho\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EhenhoProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = public_path('e-henho/js/vietnam_provinces.json');
        if (! File::exists($jsonPath)) {
            return;
        }

        $data = json_decode(File::get($jsonPath), true);
        if (! is_array($data)) {
            return;
        }

        foreach ($data as $code => $item) {
            $name = $item['name'] ?? null;
            if ($name) {
                Province::firstOrCreate(
                    ['code' => (string) $code],
                    [
                        'name' => $name,
                        'type' => $item['type'] ?? 'tinh',
                    ]
                );
            }
        }
    }
}
