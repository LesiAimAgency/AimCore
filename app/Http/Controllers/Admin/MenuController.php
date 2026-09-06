<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MenuController extends Controller
{
    public function index()
    {
        $project = current_project();

        $query = Menu::query();
        if ($project) {
            $hasProjectMenus = Menu::withoutGlobalScopes()->where('project_id', $project->id)->exists();
            if ($hasProjectMenus) {
                $query->withoutGlobalScopes()->where('project_id', $project->id);
            } else {
                $query->withoutGlobalScopes()->where(function ($q) use ($project) {
                    $q->where('project_id', $project->id)
                        ->orWhereNull('project_id');
                });
            }
        }

        $menus = $query->with(['items' => function ($q) {
            $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                $cq->withoutGlobalScopes();
            }])->orderBy('order');
        }])->get();

        $selectedMenu = $menus->firstWhere('project_id', $project?->id) ?? $menus->first();

        $pages = Post::where('post_type', 'page')->select('id', 'title', 'slug')->get();
        $posts = Post::where('post_type', 'post')->select('id', 'title', 'slug')->latest()->limit(50)->get();
        $postCategories = Taxonomy::where('taxonomy', 'category')->select('id', 'name', 'slug')->get();
        $productCategories = Schema::hasTable('product_categories')
            ? ProductCategory::select('id', 'name', 'parent_id', 'slug')->whereNull('parent_id')->with('children')->get()
            : collect();
        $products = Product::select('id', 'name', 'slug')->latest()->limit(50)->get();
        $brands = Schema::hasTable('brands')
            ? Brand::select('id', 'name', 'slug')->get()
            : collect();

        return view('cms.menus.index', compact(
            'menus', 'selectedMenu', 'pages', 'posts', 'postCategories', 'productCategories', 'products', 'brands'
        ));
    }

    public function show($projectCode = null, $id = null)
    {
        if ($id === null) {
            $id = $projectCode;
        }

        $project = current_project();

        $query = Menu::query();
        if ($project) {
            $hasProjectMenus = Menu::withoutGlobalScopes()->where('project_id', $project->id)->exists();
            if ($hasProjectMenus) {
                $query->withoutGlobalScopes()->where('project_id', $project->id);
            } else {
                $query->withoutGlobalScopes()->where(function ($q) use ($project) {
                    $q->where('project_id', $project->id)
                        ->orWhereNull('project_id');
                });
            }
        }

        $menus = $query->with(['items' => function ($q) {
            $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                $cq->withoutGlobalScopes();
            }])->orderBy('order');
        }])->get();

        $menu = Menu::withoutGlobalScopes()->with(['items' => function ($q) {
            $q->withoutGlobalScopes()->whereNull('parent_id')->with(['children' => function ($cq) {
                $cq->withoutGlobalScopes();
            }])->orderBy('order');
        }]);

        if ($project) {
            $menu = $menu->where(function ($q) use ($project) {
                $q->where('project_id', $project->id)
                    ->orWhereNull('project_id');
            });
        }

        $menu = $menu->findOrFail($id);

        $pages = Post::where('post_type', 'page')->select('id', 'title', 'slug')->get();
        $posts = Post::where('post_type', 'post')->select('id', 'title', 'slug')->latest()->limit(50)->get();
        $postCategories = Taxonomy::where('taxonomy', 'category')->select('id', 'name', 'slug')->get();
        $productCategories = Schema::hasTable('product_categories')
            ? ProductCategory::select('id', 'name', 'parent_id', 'slug')->whereNull('parent_id')->with('children')->get()
            : collect();
        $products = Product::select('id', 'name', 'slug')->latest()->limit(50)->get();
        $brands = Schema::hasTable('brands')
            ? Brand::select('id', 'name', 'slug')->get()
            : collect();

        return view('cms.menus.index', [
            'menus' => $menus,
            'selectedMenu' => $menu,
            'pages' => $pages,
            'posts' => $posts,
            'postCategories' => $postCategories,
            'productCategories' => $productCategories,
            'products' => $products,
            'brands' => $brands,
        ]);
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
                'location' => 'header',
                'is_active' => true,
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Menu đã được tạo!',
                'menu' => $menu,
            ]);
        } catch (\Exception $e) {
            \Log::error('Menu creation failed: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Lỗi: '.$e->getMessage(),
            ], 500);
        }
    }

    public function storeItem(Request $request, $projectCode = null, $menuId = null)
    {
        if ($menuId === null) {
            $menuId = $projectCode;
        }

        $menu = Menu::findOrFail($menuId);

        try {
            $data = $request->validate([
                'title' => 'required|string',
                'url' => 'nullable|string',
                'target' => 'required|in:_self,_blank',
                'linkable_type' => 'nullable|string',
                'linkable_id' => 'nullable|integer',
                'parent_id' => 'nullable|exists:menu_items,id',
            ]);

            $data['menu_id'] = $menu->id;
            $data['order'] = MenuItem::where('menu_id', $menu->id)
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
            \Log::error('Menu item creation failed: '.$e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function updateItem(Request $request, $projectCode = null, $itemId = null)
    {
        if ($itemId === null) {
            $itemId = $projectCode;
        }

        $item = MenuItem::findOrFail($itemId);
        $data = $request->validate([
            'title' => 'required|string',
            'url' => 'nullable|string',
            'target' => 'required|in:_self,_blank',
        ]);

        $item->update($data);

        return back()->with('success', 'Đã cập nhật!');
    }

    public function destroyItem($projectCode = null, $itemId = null)
    {
        if ($itemId === null) {
            $itemId = $projectCode;
        }

        $item = MenuItem::findOrFail($itemId);
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

        $menu = Menu::findOrFail($menuId);

        try {
            $tree = $request->input('tree', []);

            // Flatten the tree structure for database update
            $flatItems = $this->flattenTree($tree);

            // Update all items in a transaction
            \DB::transaction(function () use ($flatItems) {
                foreach ($flatItems as $item) {
                    MenuItem::where('id', $item['id'])->update([
                        'parent_id' => $item['parent_id'],
                        'order' => $item['order'],
                    ]);
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Cấu trúc menu đã được cập nhật!',
            ]);
        } catch (\Exception $e) {
            \Log::error('Menu tree update failed: '.$e->getMessage());

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

        $menu = Menu::findOrFail($menuId);
        $menuName = $menu->name;
        $menu->delete(); // Cascade sẽ tự động xóa tất cả menu_items

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
}
