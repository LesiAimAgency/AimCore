<?php
$posts = json_decode(file_get_contents(__DIR__ . '/../database/seeders/data/viettinmart/p10_posts.json'), true);
$types = [];
foreach ($posts as $p) {
    $types[$p['post_type']] = ($types[$p['post_type']] ?? 0) + 1;
}
echo json_encode($types, JSON_PRETTY_PRINT);
