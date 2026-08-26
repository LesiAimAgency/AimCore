<?php

$f = 'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/yduoc_doctors.blade.php';

$content = <<<HTML
@php
    \$category = \App\Models\Category::where('slug', 'luong-y')->first();
    \$post = null;
    if(\$category) {
        \$post = \App\Models\Post::where('category_id', \$category->id)->where('status', 'published')->orderBy('id', 'desc')->first();
    }
@endphp

@if(\$post)
<div class="js_widget_builder widget_post_style_9" style="background-image:url('{{ !empty(\$widget->config['bg_image']) ? asset(\$widget->config['bg_image']) : '' }}');background-size:cover;background-repeat: no-repeat; background-position: center center;background-blend-mode: color-burn;margin-top:20px;padding-top:40px;padding-bottom:40px;" data-id="{{ \$widget->id }}">
    <div class="container">
        @if(!empty(\$widget->config['title']) || !empty(\$widget->config['description']))
        <div class="header-title header-title-style-1">
            @if(!empty(\$widget->config['title']))
                <p class="header">{{ \$widget->config['title'] }}</p>
            @endif
            @if(!empty(\$widget->config['description']))
                <div class="description mt-3 text-center">{!! nl2br(e(\$widget->config['description'])) !!}</div>
            @endif
        </div>
        @endif
        
        <div class="single-doctor-card" style="display: flex; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin: 0 auto; max-width: 900px; width: 100%; flex-direction: row; align-items: stretch; box-sizing: border-box;">
            <div class="avatar" style="flex: 0 0 35%; max-width: 35%; background: #fff;">
                <div class="img" style="height: 100%;">
                    <a href="{{ route('posts.show', \$post->slug ?? '#') }}" style="display: block; height: 100%;">
                        <img src="{{ \$post->thumbnail ? asset(\$post->thumbnail) : asset('assets/original/uploads/source/dong-y.jpg') }}" alt="{{ \$post->title }}" loading="lazy" style="width: 100%; height: 100%; object-fit: cover;" />
                    </a>
                </div>
            </div>
            <div class="info" style="flex: 0 0 65%; max-width: 65%; padding: 40px 40px 40px 30px; text-align: left; display: flex; flex-direction: column; justify-content: center; background: #fff;">
                <p class="chucvu" style="font-style: italic; color: #6b7280; margin-bottom: 8px; font-size: 14px; text-transform: uppercase;">BÁC SĨ, DƯỢC SĨ</p>
                <p class="name" style="color: #2e7d32; font-size: 28px; font-weight: bold; text-transform: uppercase; margin-bottom: 12px; line-height: 1.2;">
                    <a href="{{ route('posts.show', \$post->slug ?? '#') }}" style="color: inherit; text-decoration: none;">{{ \$post->title }}</a>
                </p>
                <p class="vitri" style="display: inline-block; background: #2e7d32; color: #fff; padding: 6px 16px; border-radius: 4px; font-weight: 600; font-size: 13px; margin-bottom: 20px; align-self: flex-start;">LƯƠNG Y</p>
                <div class="description" style="color: #4b5563; line-height: 1.7; font-size: 14px;">
                    {!! \$post->content !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endif
HTML;

file_put_contents($f, $content);
echo "Rewrote yduoc_doctors.blade.php\n";
