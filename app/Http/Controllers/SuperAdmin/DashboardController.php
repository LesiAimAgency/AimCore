<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\HostingProfile;
use App\Models\Post;
use App\Models\Project;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Task;
use App\Models\Tenant;
use App\Models\User;
use App\Services\PerformanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Nếu là Developer, hiển thị Dashboard dành riêng cho Dev
        if ($user->role === 'dev' || $user->hasRole('dev')) {
            return $this->devDashboard($user);
        }

        $totalEmployees = User::count();
        $totalContracts = Post::where('post_type', 'contract')->count();
        $pendingContracts = Post::where('post_type', 'contract')->where('status', 'draft')->count();
        $totalProjects = Project::count();
        $activeProjects = Project::where('status', 'active')->count();

        // Khách hàng đã phục vụ
        $totalCustomers = Customer::count();

        // Doanh thu dự kiến tháng này
        $expectedRevenueContracts = Contract::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('contract_value');
        $expectedRevenueProjects = Project::whereNull('contract_id')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('contract_value');
        $expectedRevenue = $expectedRevenueContracts + $expectedRevenueProjects;

        // Doanh thu thực thu trong tháng (tạm tính theo contract_value)
        $actualRevenueContracts = Contract::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('contract_value');
        $actualRevenueProjects = Project::whereNull('contract_id')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('contract_value');
        $actualRevenueThisMonth = $actualRevenueContracts + $actualRevenueProjects;

        // Mục tiêu chung
        $monthKey = now()->format('Y_m');
        $targetCustomers = Setting::where('key', 'target_customers_'.$monthKey)->value('payload') ?? 30;
        $targetDevTasks = Setting::where('key', 'target_dev_tasks_'.$monthKey)->value('payload') ?? 30;
        $targetDesignTasks = Setting::where('key', 'target_design_tasks_'.$monthKey)->value('payload') ?? 30;
        $targetRevenue = Setting::where('key', 'target_revenue_'.$monthKey)->value('payload') ?? 200000000;

        $targetCustomers = is_array($targetCustomers) ? ($targetCustomers['value'] ?? 30) : $targetCustomers;
        $targetDevTasks = is_array($targetDevTasks) ? ($targetDevTasks['value'] ?? 30) : $targetDevTasks;
        $targetDesignTasks = is_array($targetDesignTasks) ? ($targetDesignTasks['value'] ?? 30) : $targetDesignTasks;
        $targetRevenue = is_array($targetRevenue) ? ($targetRevenue['value'] ?? 200000000) : $targetRevenue;

        // Số liệu thực tế cho mục tiêu chung
        $actualCustomers = Customer::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $actualDevTasks = Task::where('status', 'completed')
            ->whereMonth('completed_at', now()->month)
            ->whereYear('completed_at', now()->year)
            ->whereHas('dev', function ($q) {
                $q->where('department', 'LIKE', '%Dev%')->orWhere('department', 'LIKE', '%Kỹ thuật%');
            })->count();

        $actualDesignTasks = Task::where('status', 'completed')
            ->whereMonth('completed_at', now()->month)
            ->whereYear('completed_at', now()->year)
            ->whereHas('dev', function ($q) {
                $q->where('department', 'LIKE', '%Design%');
            })->count();

        // Lấy Ranking thay cho Gold
        $rankingFilter = request('ranking_filter', '30'); // 7, 14, 30, all
        $performanceService = new PerformanceService;
        $ranking = collect($performanceService->getRanking($rankingFilter))->take(3); // Giới hạn top 3

        // Các dự án sắp trễ hạn (deadline trong vòng 2 ngày tới hoặc đã qua) và chưa hoàn thành
        $urgentProjectsRaw = Project::with('tasks')
            ->where('status', '!=', 'completed')
            ->where('status', '!=', 'cancelled')
            ->whereNotNull('deadline')
            ->where('deadline', '<=', now()->addDays(2))
            ->orderBy('deadline', 'asc')
            ->get();

        $urgentProjects = $urgentProjectsRaw->filter(function ($project) {
            $totalTasks = $project->tasks->count();
            if ($totalTasks === 0) {
                return true;
            } // Giữ lại nếu chưa có task nào (chưa hoàn thành)

            $completedTasks = $project->tasks->where('status', 'completed')->count();

            return $completedTasks < $totalTasks; // Giữ lại nếu số task hoàn thành < tổng số task
        })->values();

        // Tiến độ các dự án đang hoạt động
        $projectProgresses = Project::with('tasks')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($project) {
                $totalTasks = $project->tasks->count();
                $completedTasks = $project->tasks->where('status', 'completed')->count();
                $progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

                $project->progress = $progress;
                $project->totalTasks = $totalTasks;
                $project->completedTasks = $completedTasks;

                return $project;
            });

        // Tài nguyên Web (Domain & Hosting) sắp hết hạn (trong vòng 1 tháng hoặc đã quá hạn gần đây)
        $expiringWebResources = Contract::where(function ($query) {
            $query->whereNotNull('domain_name')
                ->orWhereNotNull('hosting_provider');
        })
            ->whereNotNull('end_date')
            ->where('end_date', '<=', now()->addMonth())
            ->where('status', '!=', 'cancelled')
            ->orderBy('end_date', 'asc')
            ->get();

        $allProjects = Project::all();
        $infectedProjects = [];
        foreach ($allProjects as $p) {
            $logPath = storage_path('logs/file-changes-'.$p->code.'.log');
            if (File::exists($logPath)) {
                $content = File::get($logPath);
                if (str_contains($content, 'Độc Hại') || str_contains($content, '\u0110\u1ed9c H\u1ea1i')) {
                    $infectedProjects[] = $p;
                }
            }
        }

        return view('superadmin.dashboard.index', compact(
            'totalEmployees',
            'totalContracts',
            'pendingContracts',
            'totalProjects',
            'activeProjects',
            'expectedRevenue',
            'totalCustomers',
            'actualRevenueThisMonth',
            'ranking',
            'rankingFilter',
            'urgentProjects',
            'projectProgresses',
            'expiringWebResources',
            'infectedProjects',
            'targetCustomers',
            'targetDevTasks',
            'targetDesignTasks',
            'targetRevenue',
            'actualCustomers',
            'actualDevTasks',
            'actualDesignTasks'
        ));
    }

    public function rankingData(Request $request)
    {
        $rankingFilter = $request->input('ranking_filter', '30');
        $performanceService = new PerformanceService;
        $ranking = collect($performanceService->getRanking($rankingFilter))->take(3);

        $html = view('superadmin.dashboard.partials.ranking_list', compact('ranking'))->render();

        return response()->json(['html' => $html]);
    }

    private function devDashboard($user)
    {
        // Thống kê Tasks
        $totalAssignedTasks = Task::where('dev_id', $user->id)->count();

        $completedTasks = Task::where('dev_id', $user->id)
            ->where('status', 'completed')
            ->count();

        $pendingTasks = Task::where('dev_id', $user->id)
            ->whereIn('status', ['pending', 'in_progress'])
            ->count();

        // Danh sách công việc sắp trễ hạn / quá hạn (deadline <= 2 ngày tới, chưa completed)
        $urgentTasks = Task::with('project')
            ->where('dev_id', $user->id)
            ->where('status', '!=', 'completed')
            ->whereNotNull('deadline')
            ->where('deadline', '<=', now()->addDays(2))
            ->orderBy('deadline', 'asc')
            ->take(10)
            ->get();

        // Tiến độ các dự án đang tham gia (Dựa vào task của dev trong dự án)
        // Lấy tất cả project_ids từ tasks của dev
        $projectIds = Task::where('dev_id', $user->id)->distinct()->pluck('project_id');

        $projectProgresses = Project::with('tasks')
            ->whereIn('id', $projectIds)
            ->where('status', '!=', 'completed')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($project) {
                $totalTasks = $project->tasks->count();
                $completedTasks = $project->tasks->where('status', 'completed')->count();
                $progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

                $project->progress = $progress;
                $project->totalTasks = $totalTasks;
                $project->completedTasks = $completedTasks;

                return $project;
            });

        return view('superadmin.dashboard.dev', compact(
            'totalAssignedTasks',
            'completedTasks',
            'pendingTasks',
            'urgentTasks',
            'projectProgresses'
        ));
    }

    public function multiTenancy()
    {
        try {
            $user = auth()->user();

            $query = Project::multiTenancy()->with(['admin', 'tenant'])->latest();

            // Lọc dự án theo user (Super Admin hoặc admin@example.com sẽ thấy toàn bộ dự án)
            if ($user && ! $user->isSuperAdmin() && $user->email !== 'admin@example.com') {
                $query->where(function ($q) use ($user) {
                    $q->where('admin_id', $user->id)
                        ->orWhere('created_by', $user->id)
                        ->orWhereJsonContains('employee_ids', $user->id);

                    if (! empty($user->project_ids)) {
                        $q->orWhereIn('id', $user->project_ids);
                    }

                    if (! empty($user->tenant_id)) {
                        $q->orWhere('tenant_id', $user->tenant_id);
                    }

                    $taskProjectIds = Task::where('dev_id', $user->id)->distinct()->pluck('project_id')->toArray();
                    if (! empty($taskProjectIds)) {
                        $q->orWhereIn('id', $taskProjectIds);
                    }
                });
            }

            $projects = $query->get();
            $projectIds = $projects->pluck('id')->toArray();

            // Lấy toàn bộ danh sách dự án để cho phép quản trị viên xem và bật/tắt chế độ Multi-Tenancy
            $allProjects = Project::with(['admin', 'tenant'])->orderBy('name')->get();

            // Lọc activities theo danh sách projects của user (Super Admin thấy toàn bộ)
            $todayActivitiesQuery = ActivityLog::whereDate('created_at', today());
            $recentActivitiesQuery = ActivityLog::with(['user', 'project'])->latest()->take(10);

            if ($user && ! $user->isSuperAdmin() && $user->email !== 'admin@example.com') {
                $todayActivitiesQuery->whereIn('project_id', $projectIds);
                $recentActivitiesQuery->whereIn('project_id', $projectIds);
            }

            $todayActivities = $todayActivitiesQuery->count();
            $recentActivities = $recentActivitiesQuery->get();

            $hostingProfiles = HostingProfile::all();

            return view('superadmin.dashboard.multi-tenancy', compact(
                'projects',
                'allProjects',
                'todayActivities',
                'recentActivities',
                'hostingProfiles'
            ));

        } catch (\Exception $e) {
            \Log::error('MultiTenancy dashboard error: '.$e->getMessage());

            // Fallback data nếu có lỗi
            $projects = collect();
            $allProjects = collect();
            $todayActivities = 0;
            $recentActivities = collect();
            $hostingProfiles = collect();

            return view('superadmin.dashboard.multi-tenancy', compact(
                'projects',
                'todayActivities',
                'recentActivities',
                'hostingProfiles'
            ))->with('alert', [
                'type' => 'warning',
                'message' => 'Một số dữ liệu không thể tải được. Vui lòng thử lại sau.',
            ]);
        }
    }

    public function updateTargets(Request $request)
    {
        $request->validate([
            'target_customers' => 'required|numeric|min:0',
            'target_dev_tasks' => 'required|numeric|min:0',
            'target_design_tasks' => 'required|numeric|min:0',
            'target_revenue' => 'required|numeric|min:0',
        ]);

        $monthKey = now()->format('Y_m');

        Setting::set('target_customers_'.$monthKey, $request->target_customers, 'dashboard_targets');
        Setting::set('target_dev_tasks_'.$monthKey, $request->target_dev_tasks, 'dashboard_targets');
        Setting::set('target_design_tasks_'.$monthKey, $request->target_design_tasks, 'dashboard_targets');
        Setting::set('target_revenue_'.$monthKey, $request->target_revenue, 'dashboard_targets');

        return back()->with('success', 'Cập nhật mục tiêu chung thành công!');
    }

    /**
     * Tạo hoặc cấp tài khoản quản lý Multi-Tenancy Control Center cho dự án/website.
     */
    public function storeMultiTenancyAccount(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $project = Project::findOrFail($request->project_id);

        $roleModel = Role::firstOrCreate(
            ['name' => 'multi_tenancy'],
            [
                'display_name' => 'Multi-Tenancy Control Center',
                'description' => 'Quản trị và điều hành các website / tenant trong hệ thống Multi-Tenancy Control Center',
                'level' => 2,
            ]
        );

        // Đảm bảo dự án có tenant tương ứng
        if (! $project->tenant_id) {
            try {
                $tenant = Tenant::firstOrCreate(
                    ['code' => $project->code],
                    [
                        'name' => $project->name,
                        'domain' => $project->external_domain ?: $project->code,
                        'database_name' => 'tenant_'.$project->code,
                        'status' => 'active',
                    ]
                );
                $project->update(['tenant_id' => $tenant->id]);
            } catch (\Throwable $e) {
                \Log::warning('Tenant auto-mapping in storeMultiTenancyAccount failed: '.$e->getMessage());
            }
        }

        $user = User::where('email', $request->email)
            ->orWhere('username', $request->username)
            ->first();

        $projectIds = [$project->id];

        if ($user) {
            $existingProjectIds = is_array($user->project_ids) ? $user->project_ids : json_decode($user->project_ids ?? '[]', true) ?? [];
            if (! in_array($project->id, $existingProjectIds)) {
                $existingProjectIds[] = $project->id;
            }

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'multi_tenancy',
                'level' => 2,
                'tenant_id' => $project->tenant_id ?? $user->tenant_id,
                'project_ids' => array_values(array_unique($existingProjectIds)),
                'status' => true,
            ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'multi_tenancy',
                'level' => 2,
                'tenant_id' => $project->tenant_id,
                'project_ids' => $projectIds,
                'email_verified_at' => now(),
                'status' => true,
            ]);
        }

        $user->roles()->syncWithoutDetaching([$roleModel->id]);

        $project->update([
            'admin_id' => $user->id,
            'project_admin_username' => $request->username,
            'project_admin_password' => bcrypt($request->password),
            'project_admin_password_plain' => encrypt($request->password),
            'password_updated_at' => now(),
            'password_updated_by' => auth()->id(),
        ]);

        return back()->with('alert', [
            'type' => 'success',
            'message' => "Đã cấp tài khoản quản lý Multi-Tenancy Control Center thành công cho dự án {$project->name}! Tài khoản: {$request->username} | Mật khẩu: {$request->password}",
        ]);
    }

    /**
     * Cập nhật / reset tài khoản quản lý của dự án từ route trực tiếp.
     */
    public function updateProjectAccount(Request $request, Project $project)
    {
        $request->merge(['project_id' => $project->id]);

        return $this->storeMultiTenancyAccount($request);
    }

    /**
     * Chuyển đổi trạng thái Multi-Tenancy của một dự án (Bật hoặc Tắt).
     */
    public function toggleMultiTenancyMode(Request $request, Project $project)
    {
        $isMultiTenancy = $request->has('is_multi_tenancy')
            ? $request->boolean('is_multi_tenancy')
            : ! $project->is_multi_tenancy;

        $project->update([
            'is_multi_tenancy' => $isMultiTenancy,
        ]);

        // Nếu bật Multi-Tenancy và dự án chưa có tenant_id, tự động tạo / map tenant
        if ($isMultiTenancy && ! $project->tenant_id) {
            try {
                $tenant = Tenant::firstOrCreate(
                    ['code' => $project->code],
                    [
                        'name' => $project->name,
                        'domain' => $project->external_domain ?: $project->code,
                        'database_name' => 'tenant_'.$project->code,
                        'status' => 'active',
                    ]
                );
                $project->update(['tenant_id' => $tenant->id]);
            } catch (\Throwable $e) {
                \Log::warning('Tenant mapping in toggleMultiTenancyMode failed: '.$e->getMessage());
            }
        }

        $statusText = $isMultiTenancy ? 'Dự án Multi-Tenancy (CMS Tenant)' : 'Dự án thông thường';

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Đã chuyển dự án \"{$project->name}\" thành {$statusText} thành công!",
                'is_multi_tenancy' => $isMultiTenancy,
            ]);
        }

        return back()->with('alert', [
            'type' => 'success',
            'message' => "Đã chuyển dự án \"{$project->name}\" thành {$statusText} thành công!",
        ]);
    }

    /**
     * Cập nhật hàng loạt (Batch Update) các dự án thuộc mô hình Multi-Tenancy.
     */
    public function batchUpdateMultiTenancyModes(Request $request)
    {
        $selectedIds = array_map('intval', (array) $request->input('multi_tenancy_project_ids', []));

        // Kích hoạt Multi-Tenancy cho các dự án được chọn
        Project::whereIn('id', $selectedIds)->update(['is_multi_tenancy' => true]);

        // Tự động map tenant cho các dự án vừa bật nếu chưa có
        $newlyEnabled = Project::whereIn('id', $selectedIds)->whereNull('tenant_id')->get();
        foreach ($newlyEnabled as $p) {
            try {
                $tenant = Tenant::firstOrCreate(
                    ['code' => $p->code],
                    [
                        'name' => $p->name,
                        'domain' => $p->external_domain ?: $p->code,
                        'database_name' => 'tenant_'.$p->code,
                        'status' => 'active',
                    ]
                );
                $p->update(['tenant_id' => $tenant->id]);
            } catch (\Throwable $e) {
                \Log::warning("Batch tenant mapping for project {$p->id} failed: ".$e->getMessage());
            }
        }

        // Chuyển các dự án không được chọn về dạng dự án thông thường
        Project::whereNotIn('id', $selectedIds)->update(['is_multi_tenancy' => false]);

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Đã cập nhật danh sách phân loại dự án Multi-Tenancy thành công!',
        ]);
    }
}
