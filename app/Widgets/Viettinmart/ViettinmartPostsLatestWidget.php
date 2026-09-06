<?php

namespace App\Widgets\Viettinmart;

use App\Models\Post;
use App\Widgets\BaseWidget;
use Illuminate\Support\Facades\Schema;

class ViettinmartPostsLatestWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Posts Latest',
            'description' => 'Display latest blog posts',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề',
                    'type' => 'text',
                    'default' => 'Tin tức & Bài viết mới nhất',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số lượng bài viết',
                    'type' => 'number',
                    'default' => 4,
                ],
                [
                    'name' => 'columns',
                    'label' => 'Số cột (2, 3 hoặc 4)',
                    'type' => 'select',
                    'options' => ['2' => '2 cột', '3' => '3 cột', '4' => '4 cột'],
                    'default' => '4',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $limit = (int) ($config['limit'] ?? 4);

        $projectId = $config['project_id']
            ?? (function_exists('current_project') && current_project() ? current_project()->id : null)
            ?? (session('current_project_id') ?: null);

        $query = Post::query();

        if ($projectId && Schema::hasColumn('posts', 'project_id')) {
            $query->where('project_id', $projectId);
        }

        if (Schema::hasColumn('posts', 'post_type')) {
            $query->where('post_type', 'post');
        }
        if (Schema::hasColumn('posts', 'status')) {
            $query->whereIn('status', ['published', 'active', 1]);
        }

        $posts = $query->latest()->take($limit)->get();

        return view('widgets.inbetween.viettinmart_posts_latest', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'posts' => $posts,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
