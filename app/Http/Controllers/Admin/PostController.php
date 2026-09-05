<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Traits\HasAlerts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use HasAlerts;

    private function resolvePost($projectCodeOrPost, $postId = null): Post
    {
        if ($projectCodeOrPost instanceof Post) {
            return $projectCodeOrPost;
        }

        if ($postId instanceof Post) {
            return $postId;
        }

        $param = $postId ?? $projectCodeOrPost;

        if (is_numeric($param)) {
            return Post::withTrashed()->where('id', $param)->firstOrFail();
        }

        return Post::withTrashed()->where('slug', $param)->orWhere('id', $param)->firstOrFail();
    }

    public function index(Request $request, $projectCode = null)
    {
        $postType = $request->query('type', 'post');
        $config = config("post_types.{$postType}");

        if (! $config) {
            $config = [
                'name' => ucfirst($postType),
                'singular_name' => ucfirst($postType),
            ];
        }

        $query = Post::with('author')
            ->where('post_type', $postType);

        if ($request->status === 'trashed') {
            $query->onlyTrashed();
        } else {
            $query->when($request->status, fn ($q) => $q->where('status', $request->status));
        }

        $posts = $query->when($request->search, fn ($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->latest()
            ->paginate(20);

        return view('cms.posts.index', compact('posts', 'postType', 'config'));
    }

    public function create(Request $request, $projectCode = null)
    {
        $postType = $request->get('type', 'post');
        $config = config("post_types.{$postType}");

        if (! $config) {
            $config = [
                'name' => ucfirst($postType),
                'singular_name' => ucfirst($postType),
            ];
        }

        $languages = setting('languages', []);
        $defaultLang = collect($languages)->firstWhere('is_default', true)['code'] ?? 'vi';
        $currentLang = $request->get('lang', $defaultLang);
        session(['admin_language' => $currentLang]);

        $categories = Taxonomy::where('taxonomy', 'category')->orderBy('order')->get();
        $availableTags = Taxonomy::whereIn('taxonomy', ['post_tag', 'tag'])->orderBy('name')->get();

        return view('cms.posts.create', compact('postType', 'config', 'currentLang', 'categories', 'availableTags'));
    }

    public function store(Request $request, $projectCode = null)
    {
        $postType = $request->input('post_type', 'post');
        $config = config("post_types.{$postType}");

        if (! $config) {
            $config = [
                'name' => ucfirst($postType),
                'singular_name' => ucfirst($postType),
            ];
        }

        // Validate basic fields
        $rules = [
            'slug' => 'nullable|string|unique:posts,slug',
            'featured_image' => 'nullable|string',
            'post_type' => 'required|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'translations' => 'nullable|array',
            'translations.*.title' => 'nullable|string|max:255',
            'translations.*.excerpt' => 'nullable|string',
            'translations.*.content' => 'nullable|string',
            'translations.*.meta_title' => 'nullable|string|max:60',
            'translations.*.meta_description' => 'nullable|string|max:160',
            'meta_data' => 'nullable|array',
        ];

        // Add dynamic validation from config
        if (isset($config['fields'])) {
            foreach ($config['fields'] as $key => $field) {
                $rules["meta_data.{$key}"] = 'nullable';
            }
        }

        $validated = $request->validate($rules);

        $languages = setting('languages', []);
        $defaultLang = collect($languages)->firstWhere('is_default', true)['code'] ?? 'vi';

        $defaultTitle = $request->input("translations.{$defaultLang}.title") ?? $request->input('title');
        if (empty($defaultTitle)) {
            $defaultTitle = $request->input('name') ?? 'Bài viết mới';
        }

        $validated['slug'] = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($defaultTitle);
        $validated['title'] = $defaultTitle;
        $validated['content'] = $request->input("translations.{$defaultLang}.content", $request->input('content', ''));
        $validated['excerpt'] = $request->input("translations.{$defaultLang}.excerpt", $request->input('excerpt', ''));
        $validated['author_id'] = auth()->id();

        // Process meta data
        if ($request->has('meta_data')) {
            $validated['meta_data'] = $request->input('meta_data');
        }

        $post = Post::create($validated);

        // Process categories
        if ($request->has('categories')) {
            $categoryIds = array_filter((array) $request->input('categories', []));
            $allCategoryTaxIds = Taxonomy::where('taxonomy', 'category')->pluck('id')->toArray();
            DB::table('term_relationships')
                ->where('object_id', $post->id)
                ->whereIn('term_taxonomy_id', $allCategoryTaxIds)
                ->delete();

            foreach ($categoryIds as $catId) {
                DB::table('term_relationships')->insert([
                    'object_id' => $post->id,
                    'term_taxonomy_id' => $catId,
                    'order' => 0,
                ]);
            }
        }

        // Process tags
        if ($request->has('tags')) {
            $rawTags = $request->input('tags');
            $tagNames = is_array($rawTags) ? $rawTags : explode(',', (string) $rawTags);
            $tagNames = array_unique(array_filter(array_map('trim', $tagNames)));

            $tagIds = [];
            foreach ($tagNames as $tagName) {
                if (! empty($tagName)) {
                    $tagTax = Taxonomy::firstOrCreate(
                        [
                            'project_id' => $post->project_id ?? (function_exists('project_id') ? project_id() : null),
                            'taxonomy' => 'post_tag',
                            'slug' => Str::slug($tagName),
                        ],
                        [
                            'tenant_id' => $post->tenant_id ?? 3,
                            'name' => $tagName,
                            'status' => 'published',
                        ]
                    );
                    $tagIds[] = $tagTax->id;
                }
            }

            $allTagTaxIds = Taxonomy::whereIn('taxonomy', ['post_tag', 'tag'])->pluck('id')->toArray();
            DB::table('term_relationships')
                ->where('object_id', $post->id)
                ->whereIn('term_taxonomy_id', $allTagTaxIds)
                ->delete();

            foreach ($tagIds as $tagId) {
                DB::table('term_relationships')->insert([
                    'object_id' => $post->id,
                    'term_taxonomy_id' => $tagId,
                    'order' => 0,
                ]);
            }
        }

        if ($request->has('translations')) {
            $post->saveTranslations($request->input('translations'));
        }

        $projectCode = request()->route('projectCode') ?? (function_exists('project_code') ? project_code() : null);
        $route = $projectCode
            ? route('project.admin.posts.index', ['projectCode' => $projectCode, 'type' => $postType])
            : (Route::has('superadmin.posts.index') ? route('superadmin.posts.index', ['type' => $postType]) : route('cms.posts.index', ['type' => $postType]));

        return redirect($route)->with('alert', [
            'type' => 'success',
            'message' => 'Thêm '.($config['name'] ?? 'bài viết').' thành công!',
        ]);
    }

    public function show(Request $request, $projectCodeOrPost = null, $postId = null)
    {
        $post = $this->resolvePost($projectCodeOrPost, $postId);

        return view('cms.posts.show', compact('post'));
    }

    public function edit(Request $request, $projectCodeOrPost = null, $postId = null)
    {
        $post = $this->resolvePost($projectCodeOrPost, $postId);
        $post->load('taxonomies');
        $postType = $post->post_type;
        $config = config("post_types.{$postType}");

        if (! $config) {
            $config = [
                'name' => ucfirst($postType),
                'singular_name' => ucfirst($postType),
            ];
        }

        $languages = setting('languages', []);
        $defaultLang = collect($languages)->firstWhere('is_default', true)['code'] ?? 'vi';
        $currentLang = $request->get('lang', $defaultLang);
        session(['admin_language' => $currentLang]);

        $categories = Taxonomy::where('taxonomy', 'category')->orderBy('order')->get();
        $availableTags = Taxonomy::whereIn('taxonomy', ['post_tag', 'tag'])->orderBy('name')->get();
        $selectedCategories = $post->taxonomies->where('taxonomy', 'category')->pluck('id')->toArray();
        $selectedTags = $post->taxonomies->whereIn('taxonomy', ['post_tag', 'tag'])->pluck('name')->implode(', ');

        return view('cms.posts.edit', compact(
            'post',
            'postType',
            'config',
            'currentLang',
            'categories',
            'availableTags',
            'selectedCategories',
            'selectedTags'
        ));
    }

    public function update(Request $request, $projectCodeOrPost = null, $postId = null)
    {
        $post = $this->resolvePost($projectCodeOrPost, $postId);
        $postType = $post->post_type;
        $config = config("post_types.{$postType}");

        if (! $config) {
            $config = [
                'name' => ucfirst($postType),
                'singular_name' => ucfirst($postType),
            ];
        }

        $rules = [
            'slug' => 'nullable|string|unique:posts,slug,'.$post->id,
            'featured_image' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'translations' => 'nullable|array',
            'translations.*.title' => 'nullable|string|max:255',
            'translations.*.excerpt' => 'nullable|string',
            'translations.*.content' => 'nullable|string',
            'translations.*.meta_title' => 'nullable|string|max:60',
            'translations.*.meta_description' => 'nullable|string|max:160',
            'meta_data' => 'nullable|array',
        ];

        $validated = $request->validate($rules);

        $languages = setting('languages', []);
        $defaultLang = collect($languages)->firstWhere('is_default', true)['code'] ?? 'vi';

        $defaultTitle = $request->input("translations.{$defaultLang}.title") ?? $request->input('title', $post->title);
        $validated['slug'] = ! empty($validated['slug']) ? Str::slug($validated['slug']) : ($post->slug ?: Str::slug($defaultTitle));

        $validated['title'] = $defaultTitle;
        $validated['content'] = $request->input("translations.{$defaultLang}.content", $request->input('content', $post->content));
        $validated['excerpt'] = $request->input("translations.{$defaultLang}.excerpt", $request->input('excerpt', $post->excerpt));

        if ($request->has('meta_data')) {
            $validated['meta_data'] = $request->input('meta_data');
        }

        $post->update($validated);

        // Process categories
        if ($request->has('categories')) {
            $categoryIds = array_filter((array) $request->input('categories', []));
            $allCategoryTaxIds = Taxonomy::where('taxonomy', 'category')->pluck('id')->toArray();
            DB::table('term_relationships')
                ->where('object_id', $post->id)
                ->whereIn('term_taxonomy_id', $allCategoryTaxIds)
                ->delete();

            foreach ($categoryIds as $catId) {
                DB::table('term_relationships')->insert([
                    'object_id' => $post->id,
                    'term_taxonomy_id' => $catId,
                    'order' => 0,
                ]);
            }
        }

        // Process tags
        if ($request->has('tags')) {
            $rawTags = $request->input('tags');
            $tagNames = is_array($rawTags) ? $rawTags : explode(',', (string) $rawTags);
            $tagNames = array_unique(array_filter(array_map('trim', $tagNames)));

            $tagIds = [];
            foreach ($tagNames as $tagName) {
                if (! empty($tagName)) {
                    $tagTax = Taxonomy::firstOrCreate(
                        [
                            'project_id' => $post->project_id ?? (function_exists('project_id') ? project_id() : null),
                            'taxonomy' => 'post_tag',
                            'slug' => Str::slug($tagName),
                        ],
                        [
                            'tenant_id' => $post->tenant_id ?? 3,
                            'name' => $tagName,
                            'status' => 'published',
                        ]
                    );
                    $tagIds[] = $tagTax->id;
                }
            }

            $allTagTaxIds = Taxonomy::whereIn('taxonomy', ['post_tag', 'tag'])->pluck('id')->toArray();
            DB::table('term_relationships')
                ->where('object_id', $post->id)
                ->whereIn('term_taxonomy_id', $allTagTaxIds)
                ->delete();

            foreach ($tagIds as $tagId) {
                DB::table('term_relationships')->insert([
                    'object_id' => $post->id,
                    'term_taxonomy_id' => $tagId,
                    'order' => 0,
                ]);
            }
        }

        if ($request->has('translations')) {
            $post->saveTranslations($request->input('translations'));
        }

        $projectCode = request()->route('projectCode') ?? (function_exists('project_code') ? project_code() : null);
        $route = $projectCode
            ? route('project.admin.posts.edit', ['projectCode' => $projectCode, 'post' => $post->slug ?: $post->id])
            : (Route::has('superadmin.posts.edit') ? route('superadmin.posts.edit', $post->slug ?: $post->id) : route('cms.posts.edit', $post->slug ?: $post->id));

        return redirect($route)->with('alert', [
            'type' => 'success',
            'message' => 'Cập nhật '.($config['name'] ?? 'bài viết').' thành công!',
        ]);
    }

    public function destroy(Request $request, $projectCodeOrPost = null, $postId = null)
    {
        $post = $this->resolvePost($projectCodeOrPost, $postId);
        $postType = $post->post_type;
        $config = config("post_types.{$postType}");

        $post->delete();

        $projectCode = request()->route('projectCode');
        $route = $projectCode
            ? route('project.admin.posts.index', ['projectCode' => $projectCode, 'type' => $postType])
            : route('cms.posts.index', ['type' => $postType]);

        return redirect($route)->with('alert', [
            'type' => 'success',
            'message' => 'Xóa '.($config['name'] ?? 'dữ liệu').' thành công!',
        ]);
    }

    public function restore(Request $request, $projectCodeOrPost = null, $postId = null)
    {
        $post = $this->resolvePost($projectCodeOrPost, $postId);
        $post->restore();
        $this->alertSuccess('Đã khôi phục dữ liệu thành công.');

        return redirect()->back();
    }

    public function forceDelete(Request $request, $projectCodeOrPost = null, $postId = null)
    {
        $post = $this->resolvePost($projectCodeOrPost, $postId);
        $post->forceDelete();
        $this->alertSuccess('Đã xóa vĩnh viễn dữ liệu thành công.');

        return redirect()->back();
    }
}
