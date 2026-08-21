<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// 1. Fix Widget 7 config
$w = \App\Models\Widget::find(7);
if ($w) {
    $c = $w->config;
    $c['title'] = '';
    $c['description'] = '';
    $w->config = $c;
    $w->save();
    echo "Fixed Widget 7 config\n";
}

// 2. Rename Posts
\App\Models\Post::where('title', 'LƯƠNG Y NGUYỄN ĐỨC LỢI')->update(['title' => 'NGUYỄN ĐỨC LỢI']);
\App\Models\Post::where('title', 'LƯƠNG Y LÂM CHÍ KIÊN')->update(['title' => 'LÂM CHÍ KIÊN']);
echo "Renamed Posts\n";

// 3. Fix HTML in widgets
$newItemInfo = <<<HTML
            <div class="item-info" style="display: flex; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin: 0 auto; max-width: 900px; width: 100%; flex-direction: row; align-items: flex-start; box-sizing: border-box;">
                <div class="avatar" style="flex: 0 0 35%; max-width: 35%; padding: 20px;">
                    <div class="img">
                        <a href="{{ route('posts.show', \$post->slug ?? '#') }}" style="display: block;">
                            <img src="{{ \$post->thumbnail ?? (isset(\$expert) ? \$expert->avatar_url : asset('assets/original/uploads/source/images-(2).jpg')) }}" alt="{{ \$post->title ?? (\$expert->name ?? '') }}" loading="lazy" style="width: 100%; height: auto; object-fit: contain; border-radius: 8px;" />
                        </a>
                    </div>
                </div>
                <div class="info" style="flex: 0 0 65%; max-width: 65%; padding: 40px 40px 40px 10px; text-align: left; display: flex; flex-direction: column; justify-content: flex-start;">
                    <p class="chucvu" style="font-style: italic; color: #6b7280; margin-bottom: 8px; font-size: 14px; text-transform: uppercase;">BÁC SĨ, DƯỢC SĨ</p>
                    <p class="name" style="color: #2e7d32; font-size: 28px; font-weight: bold; text-transform: uppercase; margin-bottom: 12px; line-height: 1.2;">
                        <a href="{{ route('posts.show', \$post->slug ?? '#') }}" style="color: inherit; text-decoration: none;">{{ \$post->title ?? (\$expert->name ?? '') }}</a>
                    </p>
                    <p class="vitri" style="display: inline-block; background: #2e7d32; color: #fff; padding: 6px 16px; border-radius: 4px; font-weight: 600; font-size: 13px; margin-bottom: 20px; align-self: flex-start;">LƯƠNG Y</p>
                    <div class="description" style="color: #4b5563; line-height: 1.7; font-size: 14px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 10; -webkit-box-orient: vertical;">
                        {!! \$post->content ?? (\$expert->description ?? '') !!}
                    </div>
                </div>
            </div>
HTML;

$files = [
    'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/yduoc_doctors.blade.php',
    'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/types/yduoc_expert.blade.php'
];

foreach ($files as $f) {
    if (file_exists($f)) {
        $content = file_get_contents($f);
        // We need to replace the entire <div class="item-info">...</div>
        // Since we might have messed it up earlier, let's use a regex that matches the whole item-info block
        $content = preg_replace('/<div class="item-info" style=".*?<\/div>\s*<\/div>\s*<\/div>/s', $newItemInfo, $content);
        file_put_contents($f, $content);
        echo "Fixed HTML in \$f\n";
    }
}
