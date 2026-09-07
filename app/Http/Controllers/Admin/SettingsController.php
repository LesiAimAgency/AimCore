<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectSetting;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $project = request()->attributes->get('project');
        $user = auth()->user();

        if ($project) {
            $mainConn = app()->environment('testing') ? config('database.default', 'sqlite') : 'mysql';
            $prevConn = \DB::getDefaultConnection();
            if ($prevConn !== $mainConn) {
                \DB::setDefaultConnection($mainConn);
            }

            $enabledSettings = ProjectSetting::where(function ($q) use ($project) {
                $q->where('project_id', $project->id);
                if ($project->code === 'viettinmart-eco' || str_contains($project->code, 'viettinmart')) {
                    $q->orWhere('project_id', 10);
                }
            })
                ->where('value', '1')
                ->pluck('key')
                ->toArray();

            if (\DB::getDefaultConnection() !== $prevConn) {
                \DB::setDefaultConnection($prevConn);
            }

            // Luôn đảm bảo settings.languages và settings.appearance hiển thị
            if (! in_array('settings.languages', $enabledSettings)) {
                $enabledSettings[] = 'settings.languages';
            }
            if (! in_array('settings.appearance', $enabledSettings)) {
                $enabledSettings[] = 'settings.appearance';
            }

            // Chỉ hiển thị các module đã được bật
            $rawModules = collect(config('system_menu'))->filter(function ($module) use ($enabledSettings) {
                return in_array($module['permission'], $enabledSettings);
            });
        } else {
            $rawModules = collect(config('system_menu'));
        }

        // Map routes to appropriate project or admin routes
        $modules = $rawModules->map(function ($module) use ($project) {
            $perm = $module['permission'] ?? '';
            $routeKey = str_replace('_', '-', str_replace('settings.', '', $perm));

            if ($project) {
                $projectRoute = "project.admin.settings.{$routeKey}";
                if (\Illuminate\Support\Facades\Route::has($projectRoute)) {
                    $module['route'] = $projectRoute;
                    $module['route_params'] = ['projectCode' => $project->code];
                } elseif (\Illuminate\Support\Facades\Route::has("project.admin.{$routeKey}.index")) {
                    $module['route'] = "project.admin.{$routeKey}.index";
                    $module['route_params'] = ['projectCode' => $project->code];
                } else {
                    $module['route_url'] = url("/{$project->code}/admin/settings/{$routeKey}");
                }
            } else {
                $adminRoute = "admin.settings.{$routeKey}";
                if (\Illuminate\Support\Facades\Route::has($adminRoute)) {
                    $module['route'] = $adminRoute;
                    $module['route_params'] = [];
                } elseif (\Illuminate\Support\Facades\Route::has("admin.{$routeKey}.index")) {
                    $module['route'] = "admin.{$routeKey}.index";
                    $module['route_params'] = [];
                } else {
                    $module['route_url'] = url("/admin/settings/{$routeKey}");
                }
            }

            return $module;
        });

        return view('cms.settings.index', compact('modules'));
    }

    public function scanTranslations()
    {
        try {
            $keys = [];
            $viewPath = resource_path('views');

            // Scan all blade files
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($viewPath)
            );

            foreach ($files as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $content = file_get_contents($file->getRealPath());

                    // Match __('key') and __("key") patterns
                    preg_match_all("/__\('([^']+)'\)/", $content, $matches1);
                    preg_match_all('/__\("([^"]+)"\)/', $content, $matches2);

                    // Match Lang('key') and Lang("key") patterns
                    preg_match_all("/Lang\('([^']+)'\)/", $content, $matches3);
                    preg_match_all('/Lang\("([^"]+)"\)/', $content, $matches4);

                    // Match trans_db('key') and trans_db("key") patterns
                    preg_match_all("/trans_db\('([^']+)'\)/", $content, $matches5);
                    preg_match_all('/trans_db\("([^"]+)"\)/', $content, $matches6);

                    foreach ([$matches1, $matches2, $matches3, $matches4, $matches5, $matches6] as $m) {
                        if (! empty($m[1])) {
                            $keys = array_merge($keys, $m[1]);
                        }
                    }
                }
            }

            $keys = array_unique($keys);
            sort($keys);

            return response()->json([
                'success' => true,
                'keys' => $keys,
                'count' => count($keys),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function save(Request $request)
    {
        try {
            // Debug: Log all request data
            \Log::info('Settings save - Request data:', [
                'all_data' => $request->all(),
                'watermark_data' => $request->input('watermark'),
                'url' => $request->url(),
                'method' => $request->method(),
            ]);

            $project = $request->attributes->get('project');
            $savedCount = 0;

            // Sử dụng transaction để tránh duplicate
            \DB::transaction(function () use ($request, $project, &$savedCount) {
                foreach ($request->except('_token', '_method', 'page') as $key => $value) {
                    // Xử lý đặc biệt cho checkbox
                    if (($key === 'watermark' || $key === 'toc') && is_array($value)) {
                        if ($key === 'watermark') {
                            if (! isset($value['enabled'])) {
                                $value['enabled'] = false;
                            } else {
                                $value['enabled'] = $value['enabled'] === '1' || $value['enabled'] === 1 || $value['enabled'] === true;
                            }
                        } elseif ($key === 'toc') {
                            $value['enabled'] = ! empty($value['enabled']);
                            $value['show_numbers'] = ! empty($value['show_numbers']);
                            $value['collapsible'] = ! empty($value['collapsible']);
                            $value['smooth_scroll'] = ! empty($value['smooth_scroll']);
                            $value['highlight_active'] = ! empty($value['highlight_active']);
                            $value['sticky_toc'] = ! empty($value['sticky_toc']);
                        }
                    }

                    if (is_string($value)) {
                        $decoded = json_decode($value, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $value = $decoded;
                        }
                    }

                    // DEMO MODE: Sử dụng shared database với project scoping & tenant isolation
                    if ($project) {
                        $tenantId = $project->tenant_id ?? session('current_tenant_id') ?? (app()->bound('current_tenant_id') ? app('current_tenant_id') : 3);
                        if ($project->code === 'viettinmart-eco' || str_contains($project->code, 'viettinmart')) {
                            $tenantId = 3;
                        }

                        // Xóa setting cũ trước (nếu có) để tránh duplicate
                        \DB::table('settings')
                            ->where('key', $key)
                            ->where(function ($q) use ($project, $tenantId) {
                                $q->where('project_id', $project->id);
                                if ($tenantId) {
                                    $q->orWhere('tenant_id', $tenantId);
                                }
                                if ($tenantId == 3) {
                                    $q->orWhere('project_id', 10);
                                }
                            })
                            ->delete();

                        // Insert setting mới (100% tenant_id + project_id)
                        \DB::table('settings')->insert([
                            'key' => $key,
                            'payload' => json_encode(is_array($value) ? $value : ['value' => $value]),
                            'group' => 'general',
                            'project_id' => $project->id,
                            'tenant_id' => $tenantId,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    } else {
                        Setting::set($key, $value);
                    }

                    $savedCount++;
                }
            });

            SettingsService::getInstance()->clearCache();

            if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => true,
                    'message' => "Lưu cấu hình thành công! Đã lưu {$savedCount} cài đặt.",
                ]);
            }

            return back()->with('alert', [
                'type' => 'success',
                'message' => "Lưu cấu hình thành công! Đã lưu {$savedCount} cài đặt.",
            ]);
        } catch (\Exception $e) {
            \Log::error('Settings save error: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'message' => 'Lỗi: '.$e->getMessage(),
                ], 500);
            }

            return back()->with('alert', [
                'type' => 'error',
                'message' => 'Lỗi: '.$e->getMessage(),
            ]);
        }
    }

    public function projectSettings(Request $request)
    {
        $project = $request->attributes->get('project');

        $mainConn = app()->environment('testing') ? config('database.default', 'sqlite') : 'mysql';
        $prevConn = \DB::getDefaultConnection();
        if ($prevConn !== $mainConn) {
            \DB::setDefaultConnection($mainConn);
        }

        $enabledSettings = ProjectSetting::where(function ($q) use ($project) {
            $q->where('project_id', $project->id);
            if ($project->code === 'viettinmart-eco' || str_contains($project->code, 'viettinmart')) {
                $q->orWhere('project_id', 10);
            }
        })
            ->where('value', '1')
            ->pluck('key')
            ->toArray();

        if (\DB::getDefaultConnection() !== $prevConn) {
            \DB::setDefaultConnection($prevConn);
        }

        // Luôn đảm bảo settings.languages và settings.appearance hiển thị
        if (! in_array('settings.languages', $enabledSettings)) {
            $enabledSettings[] = 'settings.languages';
        }
        if (! in_array('settings.appearance', $enabledSettings)) {
            $enabledSettings[] = 'settings.appearance';
        }

        // Chỉ hiển thị các module đã được bật
        $modules = collect(config('system_menu'))
            ->filter(function ($module) use ($enabledSettings) {
                return in_array($module['permission'], $enabledSettings);
            })
            ->map(function ($module) use ($project) {
                $module['route'] = str_replace('cms.', 'project.admin.', $module['route']);
                $module['route_params'] = ['projectCode' => $project->code];

                return $module;
            })
            ->filter(function ($module) {
                return \Route::has($module['route']);
            });

        return view('cms.settings.index', [
            'currentProject' => $project,
            'modules' => $modules,
        ]);
    }

    public function saveProjectSettings(Request $request)
    {
        $project = $request->attributes->get('project');

        try {
            if ($request->has('permissions')) {
                foreach ($request->permissions as $module => $perms) {
                    $project->permissions()->updateOrCreate(
                        ['module' => $module],
                        $perms
                    );
                }
            }

            return back()->with('alert', [
                'type' => 'success',
                'message' => 'Cập nhật phân quyền thành công!',
            ]);
        } catch (\Exception $e) {
            return back()->with('alert', [
                'type' => 'error',
                'message' => 'Lỗi: '.$e->getMessage(),
            ]);
        }
    }

    public function appearance(Request $request)
    {
        return $this->group($request, null, 'appearance');
    }

    public function group(Request $request, $projectCodeOrGroup = null, $group = null)
    {
        $group = $group
            ?: ($request->route('group')
            ?: ($projectCodeOrGroup ?: 'appearance'));

        [$project, $tenantId] = $this->resolveProjectAndTenant($request);
        $settingsMap = $this->getSettingsMap($project, $tenantId, $group);

        $languages = $settingsMap['languages'] ?? setting('languages', []);
        if (is_string($languages)) {
            $languages = json_decode($languages, true) ?: [];
        }
        $activeLanguages = collect($languages)
            ->filter(fn ($l) => is_array($l) ? ($l['is_active'] ?? false) : ($l->is_active ?? false))
            ->map(fn ($l) => (object) $l)
            ->values();

        if ($activeLanguages->isEmpty()) {
            $activeLanguages = collect([
                (object) ['code' => 'vi', 'name' => 'Tiếng Việt', 'flag_emoji' => '🇻🇳', 'flag_url' => '', 'is_default' => true, 'is_active' => true],
            ]);
        }

        $viewData = [
            'group' => $group,
            'settings' => $settingsMap,
            'settingsMap' => $settingsMap,
            'activeLanguages' => $activeLanguages,
            'project' => $project,
            'currentProject' => $project,
        ];

        // 1. Theme specific view
        $theme = ($project?->features['theme'] ?? null) ?: ($project?->code === 'viettinmart-eco' ? 'viettinmartdemo' : setting('theme'));
        if ($theme && view()->exists("frontend.themes.{$theme}.admin.settings.{$group}")) {
            return view("frontend.themes.{$theme}.admin.settings.{$group}", $viewData);
        }
        if (view()->exists("admin.settings.{$group}")) {
            return view("admin.settings.{$group}", $viewData);
        }
        if (view()->exists("cms.settings.{$group}")) {
            return view("cms.settings.{$group}", $viewData);
        }

        if (view()->exists('cms.settings.group')) {
            return view('cms.settings.group', $viewData);
        }

        return redirect()->route('project.admin.settings.index', ['projectCode' => $project?->code ?? 'viettinmart-eco'])
            ->with('error', "Không tìm thấy giao diện cấu hình cho nhóm '{$group}'.");
    }

    public function updateAppearance(Request $request)
    {
        return $this->updateGroup($request, null, 'appearance');
    }

    public function updateGroup(Request $request, $projectCodeOrGroup = null, $group = null)
    {
        $group = $group
            ?: ($request->route('group')
            ?: ($projectCodeOrGroup ?: 'appearance'));

        [$project, $tenantId] = $this->resolveProjectAndTenant($request);

        $inputs = $request->input('settings', $request->except(['_token', '_method', 'active_tab']));

        // Handle file uploads if any
        if ($request->hasFile('settings')) {
            foreach ($request->file('settings') as $key => $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('settings', 'public');
                    $inputs[$key] = '/storage/'.$path;
                }
            }
        }

        try {
            \DB::transaction(function () use ($inputs, $group, $project, $tenantId) {
                foreach ($inputs as $key => $value) {
                    $encodedVal = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : (string) $value;
                    $payload = is_array($value) ? $value : ['value' => $value];

                    // Delete previous setting for tenant/project to ensure clean state
                    \DB::table('settings')
                        ->where('key', $key)
                        ->where(function ($q) use ($project, $tenantId) {
                            if ($tenantId) {
                                $q->where('tenant_id', $tenantId);
                            }
                            if ($project) {
                                $q->orWhere('project_id', $project->id);
                            }
                            if ($tenantId == 3) {
                                $q->orWhere('project_id', 10);
                            }
                        })
                        ->delete();

                    // Insert clean setting record
                    \DB::table('settings')->insert([
                        'key' => $key,
                        'value' => $encodedVal,
                        'payload' => json_encode($payload),
                        'group' => $group,
                        'project_id' => $project?->id,
                        'tenant_id' => $tenantId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            });

            SettingsService::getInstance()->clearCache();
            \Cache::flush();

            $activeTab = $request->input('active_tab');
            $redirectUrl = url()->previous();
            if ($activeTab && ! str_contains($redirectUrl, '#')) {
                $redirectUrl .= '#'.ltrim($activeTab, '#');
            }

            return redirect($redirectUrl)->with('alert', [
                'type' => 'success',
                'message' => 'Cập nhật cấu hình thành công!',
            ])->with('success', 'Cập nhật cấu hình thành công!');
        } catch (\Throwable $e) {
            \DB::rollBack();

            return back()->withInput()->with('alert', [
                'type' => 'error',
                'message' => 'Lỗi lưu cấu hình: '.$e->getMessage(),
            ]);
        }
    }

    protected function resolveProjectAndTenant(Request $request): array
    {
        $project = $request->attributes->get('project');
        if (! $project && function_exists('current_project')) {
            $project = current_project();
        }
        if (! $project && app()->bound('current_project_id')) {
            $project = Project::find(app('current_project_id'));
        }
        if (! $project && session('current_project_id')) {
            $project = Project::find(session('current_project_id'));
        }
        if (! $project && $request->route('projectCode')) {
            $project = Project::where('code', $request->route('projectCode'))->first();
        }

        $tenantId = $project?->tenant_id;
        if (! $tenantId && ($project?->code === 'viettinmart-eco' || str_contains($project?->code ?? '', 'viettinmart'))) {
            $tenantId = 3;
        }
        if (! $tenantId) {
            $tenantId = session('current_tenant_id') ?? config('app.default_tenant_id') ?? 3;
        }

        return [$project, (int) $tenantId];
    }

    protected function getSettingsMap(?Project $project, int $tenantId, string $group = 'appearance'): array
    {
        $globalSettings = Setting::withoutGlobalScopes()
            ->whereNull('tenant_id')
            ->whereNull('project_id')
            ->get();

        $overrideSettings = Setting::withoutGlobalScopes()
            ->where(function ($q) use ($tenantId, $project) {
                $q->where('tenant_id', $tenantId);
                if ($project) {
                    $q->orWhere('project_id', $project->id);
                }
                if ($tenantId == 3) {
                    $q->orWhere('project_id', 10);
                }
            })
            ->get();

        $map = [];
        foreach ($globalSettings as $s) {
            $val = $s->value;
            if (is_null($val) && ! empty($s->payload)) {
                $val = is_array($s->payload) ? ($s->payload['value'] ?? $s->payload) : $s->payload;
            }
            $map[$s->key] = $val;
        }

        foreach ($overrideSettings as $s) {
            $val = $s->value;
            if (is_null($val) && ! empty($s->payload)) {
                $val = is_array($s->payload) ? ($s->payload['value'] ?? $s->payload) : $s->payload;
            }
            $map[$s->key] = $val;
        }

        return $map;
    }
}
