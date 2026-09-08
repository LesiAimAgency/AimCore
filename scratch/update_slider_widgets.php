<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

// Bootstrap Console Kernel
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$widgets = \App\Models\Widget::where('type', 'hero_slider')
    ->orWhere('type', 'wk_hero_slider')
    ->get();

$slides = [
    [
        'image' => '/storage/media/project-wkcomputer/1788832999_WK-Store-Banner-01-1536x450-min-1.png.webp',
        'title' => 'WK Store PC Gaming Gear',
        'subtitle' => 'Cấu hình mạnh mẽ - Bảo hành chính hãng 36 tháng',
        'btn_link' => '/wkcomputer/cua-hang',
        'btn_text' => 'Khám phá ngay',
    ],
    [
        'image' => '/storage/media/project-wkcomputer/1788833000_z6256647989516-0136dae901ee0ae652fae55eaf6cadf2-1-2048x598-1.jpg',
        'title' => 'Build PC Gaming & Đồ Họa',
        'subtitle' => 'Tự chọn linh kiện, tối ưu chi phí cùng chuyên gia',
        'btn_link' => '/wkcomputer/xay-dung-cau-hinh',
        'btn_text' => 'Build PC Ngay',
    ],
    [
        'image' => '/storage/media/project-wkcomputer/1788833000_z6256652996024-4758b4bd9a37b2745ee55d37b9d6a7e6-1-2048x598-1.jpg',
        'title' => 'Linh Kiện Máy Tính Cao Cấp',
        'subtitle' => 'VGA, CPU, RAM, SSD nhập khẩu giá tốt nhất thị trường',
        'btn_link' => '/wkcomputer/cua-hang',
        'btn_text' => 'Xem sản phẩm',
    ],
];

foreach ($widgets as $w) {
    $s = $w->settings ?? [];
    $s['slides'] = $slides;
    $w->settings = $s;
    $w->save();
}

echo "UPDATED_" . count($widgets) . PHP_EOL;
