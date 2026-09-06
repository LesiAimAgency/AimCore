<?php
$posts = json_decode(file_get_contents(__DIR__ . '/../database/seeders/data/viettinmart/p10_posts.json'), true);
foreach ($posts as $p) {
    if ($p['post_type'] === 'product') {
        echo json_encode($p, JSON_PRETTY_PRINT);
        break;
    }
}
