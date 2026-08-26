<?php

$f = 'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/types/yduoc_expert.blade.php';

$content = <<<HTML
@php
    \$expert = \App\Models\Engineer::orderBy('id', 'desc')->first();
@endphp

@if(\$expert)
<div class="js_widget_builder widget_post_style_9" style="background-image:url('{{ !empty(\$widget->config['bg_image']) ? asset(\$widget->config['bg_image']) : '' }}');background-size:cover;background-repeat: no-repeat; background-position: center center;background-blend-mode: color-burn;margin-top:20px;padding-top:40px;padding-bottom:40px;" data-id="{{ \$widget->id }}">
    <div class="container">
      
        
        <div class="single-doctor-card" style="display: flex; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin: 0 auto; max-width: 900px; width: 100%; flex-direction: row; align-items: stretch; box-sizing: border-box;">
            <div class="avatar" style="flex: 0 0 35%; max-width: 35%; background: #fff;">
                <div class="img" style="height: 100%;">
                    <a href="#" style="display: block; height: 100%;">
                        <img src="{{ \$expert->avatar_url ? asset(\$expert->avatar_url) : asset('assets/original/uploads/source/dong-y.jpg') }}" alt="{{ \$expert->name }}" loading="lazy" style="width: 100%; height: 100%; object-fit: cover;" />
                    </a>
                </div>
            </div>
            <div class="info" style="flex: 0 0 65%; max-width: 65%; padding: 40px 40px 40px 30px; text-align: left; display: flex; flex-direction: column; justify-content: center; background: #fff;">
                <p class="chucvu" style="font-style: italic; color: #6b7280; margin-bottom: 8px; font-size: 14px; text-transform: uppercase;">BÁC SĨ, DƯỢC SĨ</p>
                <p class="name" style="color: #2e7d32; font-size: 28px; font-weight: bold; text-transform: uppercase; margin-bottom: 12px; line-height: 1.2;">
                    <a href="#" style="color: inherit; text-decoration: none;">{{ \$expert->name }}</a>
                </p>
                <p class="vitri" style="display: inline-block; background: #2e7d32; color: #fff; padding: 6px 16px; border-radius: 4px; font-weight: 600; font-size: 13px; margin-bottom: 20px; align-self: flex-start;">{{ \$expert->role }}</p>
                <div class="description" style="color: #4b5563; line-height: 1.7; font-size: 14px;">
                    {!! \$expert->description !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endif
HTML;

file_put_contents($f, $content);
echo "Rewrote yduoc_expert.blade.php\n";
