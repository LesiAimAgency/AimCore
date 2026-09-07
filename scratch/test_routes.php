<?php

$routes = [
    'admin.dashboard',
    'admin.products.index',
    'admin.products.create',
    'admin.products.edit',
    'admin.categories.index',
    'admin.attributes.index',
    'admin.orders.index',
    'admin.orders.edit',
    'admin.flash-sales.index',
    'admin.coupons.index',
    'admin.reviews.index',
    'admin.agents.index',
    'admin.form-submissions.overview',
    'admin.posts.index',
    'admin.pages.index',
    'admin.form-templates.index',
    'admin.settings.group',
    'admin.menus.index',
    'admin.widgets.index',
    'admin.media.index',
    'admin.settings.index',
    'admin.languages.index',
    'admin.spam.dashboard',
    'admin.modules.index',
    'admin.seo.index',
    'admin.logs.index',
    'admin.users.index',
    'admin.users.show',
    'admin.logout',
    'admin.orders.new-check',
];
foreach ($routes as $r) {
    $url = locale_route($r, ['projectCode' => 'viettinmart-eco', 'product' => 1, 'order' => 1, 'user' => 1, 'group' => 'general']);
    echo str_pad($r, 35).' => '.$url.PHP_EOL;
}
