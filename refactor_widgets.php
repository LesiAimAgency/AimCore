<?php

$baseDir = __DIR__.'/app/Widgets';
$inbetweenDir = $baseDir.'/Inbetween';
$vtmDir = $baseDir.'/Viettinmart';

if (! is_dir($vtmDir)) {
    mkdir($vtmDir, 0755, true);
}

$widgets = [
    'ViettinmartDealFlashWidget.php' => [
        'repeatable' => 'promo_cards',
        'fields' => "
                    'fields' => [
                        ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text'],
                        ['name' => 'price', 'label' => 'Giá', 'type' => 'text'],
                        ['name' => 'bg_class', 'label' => 'Màu nền', 'type' => 'text'],
                        ['name' => 'image', 'label' => 'Hình ảnh', 'type' => 'image'],
                        ['name' => 'link', 'label' => 'Đường dẫn', 'type' => 'text'],
                    ],
",
    ],
    'ViettinmartFeatureIconsWidget.php' => [
        'repeatable' => 'items',
        'fields' => "
                    'fields' => [
                        ['name' => 'icon', 'label' => 'Icon (FontAwesome)', 'type' => 'text'],
                        ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text'],
                        ['name' => 'sub', 'label' => 'Mô tả phụ', 'type' => 'text'],
                    ],
",
    ],
    'ViettinmartFormWidget.php' => null,
    'ViettinmartHeroSliderWidget.php' => [
        'repeatable' => 'slides',
        'fields' => "
                    'fields' => [
                        ['name' => 'image', 'label' => 'Hình ảnh', 'type' => 'image'],
                        ['name' => 'pre_title', 'label' => 'Tiêu đề phụ', 'type' => 'text'],
                        ['name' => 'title', 'label' => 'Tiêu đề chính', 'type' => 'textarea'],
                        ['name' => 'description', 'label' => 'Mô tả', 'type' => 'textarea'],
                        ['name' => 'btn_text', 'label' => 'Chữ nút bấm', 'type' => 'text'],
                        ['name' => 'btn_link', 'label' => 'Link nút bấm', 'type' => 'text'],
                    ],
",
    ],
    'ViettinmartPostsLatestWidget.php' => null,
    'ViettinmartProductFeaturedWidget.php' => null,
    'ViettinmartProductTabsWidget.php' => [
        'repeatable' => 'tabs',
        'fields' => "
                    'fields' => [
                        ['name' => 'label', 'label' => 'Tên Tab', 'type' => 'text'],
                        ['name' => 'category_id', 'label' => 'Danh mục', 'type' => 'select'],
                        ['name' => 'filter', 'label' => 'Bộ lọc', 'type' => 'text'],
                    ],
",
    ],
    'ViettinmartPromoBannersWidget.php' => [
        'repeatable' => 'items',
        'fields' => "
                    'fields' => [
                        ['name' => 'badge', 'label' => 'Nhãn', 'type' => 'text'],
                        ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text'],
                        ['name' => 'subtitle', 'label' => 'Tiêu đề phụ', 'type' => 'text'],
                        ['name' => 'image', 'label' => 'Hình ảnh', 'type' => 'image'],
                        ['name' => 'btn_text', 'label' => 'Chữ nút bấm', 'type' => 'text'],
                        ['name' => 'btn_link', 'label' => 'Link nút bấm', 'type' => 'text'],
                        ['name' => 'bg_style', 'label' => 'Style nền', 'type' => 'text'],
                    ],
",
    ],
    'ViettinmartTopTrendingWidget.php' => null,
];

foreach ($widgets as $file => $config) {
    $oldPath = $inbetweenDir.'/'.$file;
    $newPath = $vtmDir.'/'.$file;

    if (file_exists($oldPath)) {
        $content = file_get_contents($oldPath);

        // Change namespace
        $content = str_replace('namespace App\Widgets\Inbetween;', 'namespace App\Widgets\Viettinmart;', $content);

        // Change category
        $content = str_replace("'category' => 'inbetween',", "'category' => 'viettinmart',", $content);

        // Fix repeatable fields
        if ($config !== null) {
            $repeatableName = $config['repeatable'];
            $fieldsCode = ltrim($config['fields']);

            // Look for 'type' => 'repeatable' right after the name
            $pattern = "/('name'\s*=>\s*'".$repeatableName."',\s*'label'\s*=>\s*[^,]+,\s*'type'\s*=>\s*'repeatable',)/";

            if (preg_match($pattern, $content)) {
                $content = preg_replace($pattern, "$1\n                    ".trim($fieldsCode).',', $content);
            }
        }

        // Fix view paths (optional, but good if we also move views, wait, we don't need to move views yet unless we want to)
        // I will just leave the view paths as is for now ('widgets.inbetween.xyz') or rename them. Let's keep views where they are for safety.

        file_put_contents($newPath, $content);
        unlink($oldPath);
        echo "Moved and updated $file\n";
    }
}

// Update WidgetRegistry.php
$registryPath = $baseDir.'/WidgetRegistry.php';
if (file_exists($registryPath)) {
    $content = file_get_contents($registryPath);

    // Replace namespaces
    $content = str_replace('App\Widgets\Inbetween\Viettinmart', 'App\Widgets\Viettinmart\Viettinmart', $content);

    // Replace widget keys from inbetween_ to vtm_
    $content = str_replace("'inbetween_hero_slider' => ViettinmartHeroSliderWidget::class,", "'vtm_hero_slider' => ViettinmartHeroSliderWidget::class,", $content);
    $content = str_replace("'inbetween_feature_icons' => ViettinmartFeatureIconsWidget::class,", "'vtm_feature_icons' => ViettinmartFeatureIconsWidget::class,", $content);
    $content = str_replace("'inbetween_product_featured' => ViettinmartProductFeaturedWidget::class,", "'vtm_product_featured' => ViettinmartProductFeaturedWidget::class,", $content);
    $content = str_replace("'inbetween_deal_flash' => ViettinmartDealFlashWidget::class,", "'vtm_deal_flash' => ViettinmartDealFlashWidget::class,", $content);
    $content = str_replace("'inbetween_product_tabs' => ViettinmartProductTabsWidget::class,", "'vtm_product_tabs' => ViettinmartProductTabsWidget::class,", $content);
    $content = str_replace("'inbetween_promo_banners' => ViettinmartPromoBannersWidget::class,", "'vtm_promo_banners' => ViettinmartPromoBannersWidget::class,", $content);
    $content = str_replace("'inbetween_top_trending' => ViettinmartTopTrendingWidget::class,", "'vtm_top_trending' => ViettinmartTopTrendingWidget::class,", $content);
    $content = str_replace("'inbetween_posts_latest' => ViettinmartPostsLatestWidget::class,", "'vtm_posts_latest' => ViettinmartPostsLatestWidget::class,", $content);
    $content = str_replace("'inbetween_form_widget' => ViettinmartFormWidget::class,", "'vtm_form_widget' => ViettinmartFormWidget::class,", $content);

    file_put_contents($registryPath, $content);
    echo "Updated WidgetRegistry.php\n";
}
