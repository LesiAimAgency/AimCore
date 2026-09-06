<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class MenuController extends Controller
{
    public function index($projectCode = null)
    {
        $project = current_project();
        if (! $project && is_string($projectCode) && ! is_numeric($projectCode)) {
            $project = Project::where('code', $projectCode)->first();
        }

        if ($project) {
            $this->autoInitializeProjectMenus($project);
            $menus = Menu::withoutGlobalScopes()
                ->where('project_id', $project->id)
                ->with(['items' => function ($q) {
                    $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                        $cq->withoutGlobalScopes()->orderBy('order');
                    }])->orderBy('order');
                }])
                ->get();
        } else {
            $menus = Menu::withoutGlobalScopes()
                ->whereNull('project_id')
                ->with(['items' => function ($q) {
                    $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                        $cq->withoutGlobalScopes()->orderBy('order');
                    }])->orderBy('order');
                }])
                ->get();
        }

        $selectedMenu = $menus->firstWhere('project_id', $project?->id) ?? $menus->first();

        $sources = $this->getSourcesData($project);

        return view('cms.menus.index', array_merge([
            'menus' => $menus,
            'selectedMenu' => $selectedMenu,
            'currentProject' => $project,
            'projCode' => $project?->code ?? $projectCode,
        ], $sources));
    }

    public function show($projectCode = null, $id = null)
    {
        if ($id === null) {
            $id = $projectCode;
        }

        $project = current_project();
        if (! $project && is_string($projectCode) && ! is_numeric($projectCode)) {
            $project = Project::where('code', $projectCode)->first();
        }

        if ($project) {
            $this->autoInitializeProjectMenus($project);
            $menus = Menu::withoutGlobalScopes()
                ->where('project_id', $project->id)
                ->with(['items' => function ($q) {
                    $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                        $cq->withoutGlobalScopes()->orderBy('order');
                    }])->orderBy('order');
                }])
                ->get();

            $menu = Menu::withoutGlobalScopes()
                ->where('project_id', $project->id)
                ->with(['items' => function ($q) {
                    $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                        $cq->withoutGlobalScopes()->orderBy('order');
                    }])->orderBy('order');
                }])
                ->find($id);

            if (! $menu) {
                $menu = $menus->first();
            }
        } else {
            $menus = Menu::withoutGlobalScopes()
                ->whereNull('project_id')
                ->with(['items' => function ($q) {
                    $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                        $cq->withoutGlobalScopes()->orderBy('order');
                    }])->orderBy('order');
                }])
                ->get();

            $menu = Menu::withoutGlobalScopes()->findOrFail($id);
        }

        $sources = $this->getSourcesData($project);

        return view('cms.menus.index', array_merge([
            'menus' => $menus,
            'selectedMenu' => $menu,
            'currentProject' => $project,
            'projCode' => $project?->code ?? $projectCode,
        ], $sources));
    }

    public function store(Request $request)
    {
        try {
            $project = current_project();
            $projectId = $project?->id;
            $tenantId = $project?->tenant_id ?? $projectId;

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'location' => 'nullable|string|max:50',
            ]);

            $existsQuery = Menu::withoutGlobalScopes()->where('slug', $validated['slug']);
            if ($projectId) {
                $existsQuery->where('project_id', $projectId);
            } else {
                $existsQuery->whereNull('project_id');
            }

            if ($existsQuery->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Slug đã tồn tại cho dự án này. Vui lòng chọn tên khác.',
                ], 422);
            }

            $menu = Menu::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'location' => $validated['location'] ?? 'header',
                'is_active' => true,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Menu đã được tạo thành công!',
                'menu' => $menu,
            ]);
        } catch (\Exception $e) {
            Log::error('Menu creation failed: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Lỗi: '.$e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $projectCode = null, $id = null)
    {
        if ($id === null) {
            $id = $projectCode;
        }

        $menu = Menu::withoutGlobalScopes()->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean',
        ]);

        $menu->update([
            'name' => $validated['name'],
            'location' => $validated['location'] ?? $menu->location,
            'is_active' => $request->has('is_active') ? (bool) $request->input('is_active') : $menu->is_active,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Menu đã được cập nhật!',
                'menu' => $menu,
            ]);
        }

        return back()->with('success', 'Menu đã được cập nhật!');
    }

    public function storeItem(Request $request, $projectCode = null, $menuId = null)
    {
        if ($menuId === null) {
            $menuId = $projectCode;
        }

        $menu = Menu::withoutGlobalScopes()->findOrFail($menuId);

        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'url' => 'nullable|string|max:1000',
                'target' => 'required|in:_self,_blank',
                'linkable_type' => 'nullable|string|max:255',
                'linkable_id' => 'nullable|integer',
                'parent_id' => 'nullable|exists:menu_items,id',
                'icon' => 'nullable|string|max:255',
                'image' => 'nullable|string|max:500',
                'badge' => 'nullable|string|max:100',
                'badge_color' => 'nullable|string|max:50',
            ]);

            $data['menu_id'] = $menu->id;
            $data['project_id'] = $menu->project_id;
            $data['tenant_id'] = $menu->tenant_id;
            $data['order'] = MenuItem::withoutGlobalScopes()
                ->where('menu_id', $menu->id)
                ->where(function ($query) use ($data) {
                    if (isset($data['parent_id'])) {
                        $query->where('parent_id', $data['parent_id']);
                    } else {
                        $query->whereNull('parent_id');
                    }
                })
                ->max('order') + 1;

            $menuItem = MenuItem::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Mục menu đã được thêm!',
                'item' => $menuItem,
            ]);
        } catch (\Exception $e) {
            Log::error('Menu item creation failed: '.$e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function updateItem(Request $request, $projectCode = null, $itemId = null)
    {
        if ($itemId === null) {
            $itemId = $projectCode;
        }

        $item = MenuItem::withoutGlobalScopes()->findOrFail($itemId);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:1000',
            'target' => 'required|in:_self,_blank',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:500',
            'badge' => 'nullable|string|max:100',
            'badge_color' => 'nullable|string|max:50',
        ]);

        $item->update($data);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã cập nhật mục menu thành công!',
                'item' => $item->fresh(),
            ]);
        }

        return back()->with('success', 'Đã cập nhật!');
    }

    public function destroyItem($projectCode = null, $itemId = null)
    {
        if ($itemId === null) {
            $itemId = $projectCode;
        }

        $item = MenuItem::withoutGlobalScopes()->findOrFail($itemId);
        $item->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa mục menu!',
            ]);
        }

        return back()->with('success', 'Đã xóa mục menu!');
    }

    public function updateTree(Request $request, $projectCode = null, $menuId = null)
    {
        if ($menuId === null) {
            $menuId = $projectCode;
        }

        $menu = Menu::withoutGlobalScopes()->findOrFail($menuId);

        try {
            $tree = $request->input('tree', []);

            // Check if tree is already a flat array [{id, parent_id, order, depth}]
            $isFlat = ! empty($tree) && isset($tree[0]['id']) && array_key_exists('parent_id', $tree[0]);
            $flatItems = $isFlat ? $tree : $this->flattenTree($tree);

            DB::transaction(function () use ($flatItems, $menu) {
                foreach ($flatItems as $index => $item) {
                    $parentId = ! empty($item['parent_id']) ? (int) $item['parent_id'] : null;
                    // Prevent circular reference
                    if ($parentId === (int) $item['id']) {
                        $parentId = null;
                    }

                    MenuItem::withoutGlobalScopes()
                        ->where('menu_id', $menu->id)
                        ->where('id', $item['id'])
                        ->update([
                            'parent_id' => $parentId,
                            'order' => isset($item['order']) ? (int) $item['order'] : $index,
                        ]);
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Cấu trúc menu đã được cập nhật thành công!',
            ]);
        } catch (\Exception $e) {
            Log::error('Menu tree update failed: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Lỗi cập nhật cấu trúc menu: '.$e->getMessage(),
            ], 500);
        }
    }

    private function flattenTree($items, $parentId = null, &$result = [])
    {
        foreach ($items as $index => $item) {
            $result[] = [
                'id' => $item['id'],
                'parent_id' => $parentId,
                'order' => $index,
                'depth' => $item['depth'] ?? 0,
            ];

            if (! empty($item['children'])) {
                $this->flattenTree($item['children'], $item['id'], $result);
            }
        }

        return $result;
    }

    public function destroy($projectCode = null, $menuId = null)
    {
        if ($menuId === null) {
            $menuId = $projectCode;
        }

        $menu = Menu::withoutGlobalScopes()->findOrFail($menuId);
        $menuName = $menu->name;
        $menu->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Đã xóa menu '{$menuName}' và tất cả mục con!",
            ]);
        }

        $project = current_project();
        $code = $projectCode ?: $project?->code;
        if ($code) {
            return redirect()->route('project.admin.menus.index', ['projectCode' => $code])->with('success', "Đã xóa menu '{$menuName}' và tất cả mục con!");
        }

        return redirect()->route('cms.menus.index')->with('success', "Đã xóa menu '{$menuName}' và tất cả mục con!");
    }

    private function getSourcesData($project): array
    {
        $projectId = $project?->id;

        $pages = Post::withoutGlobalScopes()
            ->when($projectId, fn ($q) => $q->where('project_id', $projectId))
            ->where('post_type', 'page')
            ->select('id', 'title', 'slug')
            ->get();

        $posts = Post::withoutGlobalScopes()
            ->when($projectId, fn ($q) => $q->where('project_id', $projectId))
            ->where('post_type', 'post')
            ->select('id', 'title', 'slug')
            ->latest()
            ->limit(50)
            ->get();

        $postCategories = Schema::hasTable('taxonomies')
            ? Taxonomy::withoutGlobalScopes()
                ->when($projectId && Schema::hasColumn('taxonomies', 'project_id'), fn ($q) => $q->where('project_id', $projectId))
                ->where('taxonomy', 'category')
                ->select('id', 'name', 'slug')
                ->get()
            : collect();

        $productCategories = Schema::hasTable('product_categories')
            ? ProductCategory::withoutGlobalScopes()
                ->when($projectId && Schema::hasColumn('product_categories', 'project_id'), fn ($q) => $q->where('project_id', $projectId))
                ->whereNull('parent_id')
                ->with(['children' => function ($cq) use ($projectId) {
                    $cq->withoutGlobalScopes()
                        ->when($projectId && Schema::hasColumn('product_categories', 'project_id'), fn ($q) => $q->where('project_id', $projectId));
                }])
                ->get()
            : collect();

        $products = Schema::hasTable('products')
            ? Product::withoutGlobalScopes()
                ->when($projectId && Schema::hasColumn('products', 'project_id'), fn ($q) => $q->where('project_id', $projectId))
                ->select('id', 'name', 'slug')
                ->latest()
                ->limit(60)
                ->get()
            : collect();

        $brands = Schema::hasTable('brands')
            ? Brand::withoutGlobalScopes()
                ->when($projectId && Schema::hasColumn('brands', 'project_id'), fn ($q) => $q->where('project_id', $projectId))
                ->select('id', 'name', 'slug')
                ->get()
            : collect();

        return compact('pages', 'posts', 'postCategories', 'productCategories', 'products', 'brands');
    }

    private function autoInitializeProjectMenus($project): void
    {
        if (! $project) {
            return;
        }

        $projectId = $project->id;
        $tenantId = $project->tenant_id ?? $projectId;

        // Only initialize if project has zero menus
        $hasMenu = Menu::withoutGlobalScopes()->where('project_id', $projectId)->exists();
        if ($hasMenu) {
            return;
        }

        // 1. Menu chính (Header)
        $mainMenu = Menu::create([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'name' => 'Menu chính',
            'slug' => 'main-menu',
            'location' => 'header',
            'is_active' => true,
        ]);

        $mainItems = [
            ['title' => 'Trang chủ', 'url' => '/', 'order' => 1],
            ['title' => 'Cửa hàng', 'url' => '/cua-hang', 'order' => 2],
            ['title' => 'Tin tức', 'url' => '/blog', 'order' => 3],
            ['title' => 'Liên hệ', 'url' => '/lien-he', 'order' => 4],
        ];

        foreach ($mainItems as $mItem) {
            MenuItem::create([
                'menu_id' => $mainMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $mItem['title'],
                'url' => $mItem['url'],
                'order' => $mItem['order'],
                'target' => '_self',
            ]);
        }

        // 2. Menu chân trang (Footer)
        $footerMenu = Menu::create([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'name' => 'Menu chân trang',
            'slug' => 'footer-menu',
            'location' => 'footer',
            'is_active' => true,
        ]);

        $footerItems = [
            ['title' => 'Giới thiệu', 'url' => '/gioi-thieu', 'order' => 1],
            ['title' => 'Chính sách bảo mật', 'url' => '/chinh-sach-bao-mat', 'order' => 2],
            ['title' => 'Điều khoản sử dụng', 'url' => '/dieu-khoan-su-dung', 'order' => 3],
            ['title' => 'Câu hỏi thường gặp', 'url' => '/faq', 'order' => 4],
        ];

        foreach ($footerItems as $fItem) {
            MenuItem::create([
                'menu_id' => $footerMenu->id,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'title' => $fItem['title'],
                'url' => $fItem['url'],
                'order' => $fItem['order'],
                'target' => '_self',
            ]);
        }
    }
}
