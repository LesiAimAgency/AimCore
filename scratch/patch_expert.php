<?php

$f = 'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/types/yduoc_expert.blade.php';
$content = file_get_contents($f);

$newItemInfo = <<<'HTML'
            <div class="item-info" style="display: flex; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin: 0 auto; max-width: 900px; flex-direction: row; align-items: stretch;">
                <div class="avatar" style="flex: 0 0 35%; max-width: 35%;">
                    <div class="img" style="height: 100%;">
                        <a href="#" style="display: block; height: 100%;">
                            <img src="{{ $expert->avatar_url ?? asset('assets/original/uploads/source/dong-y.jpg') }}" alt="{{ $expert->name }}" loading="lazy" style="width: 100%; height: 100%; object-fit: cover;" />
                        </a>
                    </div>
                </div>
                <div class="info" style="flex: 0 0 65%; max-width: 65%; padding: 40px; text-align: left; display: flex; flex-direction: column; justify-content: center;">
                    <p class="chucvu" style="font-style: italic; color: #6b7280; margin-bottom: 8px; font-size: 14px; text-transform: uppercase;">BÁC SĨ, DƯỢC SĨ</p>
                    <p class="name" style="color: #2e7d32; font-size: 28px; font-weight: bold; text-transform: uppercase; margin-bottom: 12px; line-height: 1.2;">
                        <a href="#" style="color: inherit; text-decoration: none;">{{ $expert->name }}</a>
                    </p>
                    <p class="vitri" style="display: inline-block; background: #2e7d32; color: #fff; padding: 6px 16px; border-radius: 4px; font-weight: 600; font-size: 13px; margin-bottom: 20px; align-self: flex-start;">{{ $expert->role }}</p>
                    <div class="description" style="color: #4b5563; line-height: 1.7; font-size: 14px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 10; -webkit-box-orient: vertical;">
                        {!! $expert->description !!}
                    </div>
                </div>
            </div>
HTML;

$pattern = '/<div class="item-info">.*?<\/div>\s*<\/div>\s*<\/div>/s';
// Wait, the original HTML is:
/*
            <div class="item-info">
                <div class="avatar">
                    <div class="img">
                        <a href="#">
                            <img src="{{ $expert->avatar_url ?? asset('assets/original/uploads/source/dong-y.jpg') }}" alt="{{ $expert->name }}" loading="lazy" />
                        </a>
                    </div>
                </div>
                <div class="info">
                    <p class="name"><a href="#">{{ $expert->name }}</a></p>
                    <p class="vitri">{{ $expert->role }}</p>
                    <div class="description">{!! $expert->description !!}</div>
                </div>
            </div>
*/
$oldItemInfo = <<<'HTML'
            <div class="item-info">
                <div class="avatar">
                    <div class="img">
                        <a href="#">
                            <img src="{{ $expert->avatar_url ?? asset('assets/original/uploads/source/dong-y.jpg') }}" alt="{{ $expert->name }}" loading="lazy" />
                        </a>
                    </div>
                </div>
                <div class="info">
                    <p class="name"><a href="#">{{ $expert->name }}</a></p>
                    <p class="vitri">{{ $expert->role }}</p>
                    <div class="description">{!! $expert->description !!}</div>
                </div>
            </div>
HTML;

// Use regex to replace to be safe
$content = preg_replace('/<div class="item-info">.*?<div class="info">.*?<\/div>\s*<\/div>/s', $newItemInfo, $content);
file_put_contents($f, $content);
echo "Patched yduoc_expert\n";
