<?php

namespace App\Widgets\Wkcomputer;

use App\Models\Wkcomputer\WkPost;
use App\Widgets\BaseWidget;

class WkPostsLatestWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'WK Latest Posts / Tin tức',
            'description' => 'Khối danh sách bài viết / tin tức công nghệ mới nhất',
            'category' => 'wkcomputer',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề khối tin tức',
                    'type' => 'text',
                    'default' => 'TIN TỨC CÔNG NGHỆ & REVIEW',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số lượng bài viết',
                    'type' => 'number',
                    'default' => 4,
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $projectId = $config['project_id']
            ?? (function_exists('current_project') && current_project() ? current_project()->id : 14);

        $limit = max(1, (int) ($config['limit'] ?? 4));
        $title = $config['title'] ?? 'TIN TỨC CÔNG NGHỆ & REVIEW';

        $posts = WkPost::withoutGlobalScopes()
            ->where(function ($q) use ($projectId) {
                if ($projectId) {
                    $q->where('project_id', $projectId);
                }
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->latest('id')
            ->take($limit)
            ->get();

        if ($posts->isEmpty()) {
            $posts = WkPost::withoutGlobalScopes()
                ->where(function ($q) use ($projectId) {
                    if ($projectId) {
                        $q->where('project_id', $projectId);
                    }
                })
                ->latest()
                ->take($limit)
                ->get();
        }

        return view('widgets.wkcomputer.posts_latest', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'title' => $title,
            'posts' => $posts,
        ])->render();
    }
}
