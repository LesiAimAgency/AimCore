<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\HostingProfile;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Task;
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

            $query = Project::with(['admin'])->latest();

            // Lọc dự án theo user (ai được đưa vào dự án nào thì thấy dự án đó)
            $query->where(function ($q) use ($user) {
                $q->where('admin_id', $user->id)
                    ->orWhere('created_by', $user->id)
                    ->orWhereJsonContains('employee_ids', $user->id);

                if (! empty($user->project_ids)) {
                    $q->orWhereIn('id', $user->project_ids);
                }

                $taskProjectIds = Task::where('dev_id', $user->id)->distinct()->pluck('project_id')->toArray();
                if (! empty($taskProjectIds)) {
                    $q->orWhereIn('id', $taskProjectIds);
                }
            });

            $projects = $query->get();
            $projectIds = $projects->pluck('id')->toArray();

            // Lọc activities theo danh sách projects của user
            $todayActivities = ActivityLog::whereDate('created_at', today())
                ->whereIn('project_id', $projectIds)
                ->count();

            $recentActivities = ActivityLog::with(['user', 'project'])
                ->whereIn('project_id', $projectIds)
                ->latest()
                ->take(10)
                ->get();

            $hostingProfiles = HostingProfile::all();

            return view('superadmin.dashboard.multi-tenancy', compact(
                'projects',
                'todayActivities',
                'recentActivities',
                'hostingProfiles'
            ));

        } catch (\Exception $e) {
            \Log::error('MultiTenancy dashboard error: '.$e->getMessage());

            // Fallback data nếu có lỗi
            $projects = collect();
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
}
