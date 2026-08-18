<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PerformanceService;
use App\Models\User;

class PerformanceController extends Controller
{
    protected $performanceService;

    public function __construct(PerformanceService $performanceService)
    {
        $this->performanceService = $performanceService;
    }

    public function index()
    {
        // Default view or dashboard for performance
        return redirect()->route('superadmin.performance.ranking');
    }

    public function ranking(Request $request)
    {
        $period = $request->input('period', 'month');
        $ranking = $this->performanceService->getRanking($period);
        
        $top3 = $ranking->take(3);
        $others = $ranking->slice(3);

        return view('superadmin.performance.ranking', compact('ranking', 'top3', 'others', 'period'));
    }

    public function gold()
    {
        if (!config('features.gold_enabled')) {
            abort(404, 'Tính năng Gold đã bị vô hiệu hóa.');
        }

        $ranking = $this->performanceService->getGoldRanking();
        
        return view('superadmin.performance.gold', compact('ranking'));
    }
    
    public function report(Request $request)
    {
        $user = auth()->user();
        $isAdminOrPm = $user->isSuperAdmin() || $user->level <= 1 || $user->role === 'project_manager' || $user->role === 'super_admin' || $user->hasRole(['super_admin', 'project_manager']);
        
        // Mặc định xem báo cáo của chính mình
        $targetUserId = $user->id;

        // Nếu là Admin/PM và có query string user_id, cho phép xem người khác
        if ($isAdminOrPm && $request->filled('user_id')) {
            $targetUserId = $request->input('user_id');
        }

        $period = $request->input('period', 'month'); // month, week, year, all

        $targetUser = User::findOrFail($targetUserId);
        $reportData = $this->performanceService->getPersonalReport($targetUserId, $period);
        
        // Lấy danh sách nhân viên để Admin chọn
        $users = [];
        if ($isAdminOrPm) {
            $users = User::where('status', true)->get();
        }

        return view('superadmin.performance.report', array_merge($reportData, [
            'targetUser' => $targetUser,
            'period' => $period,
            'users' => $users,
            'isAdminOrPm' => $isAdminOrPm
        ]));
    }
}
