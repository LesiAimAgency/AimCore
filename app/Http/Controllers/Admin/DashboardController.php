<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectSetting;
use App\Models\User;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->getDashboardData(null);

        return view('cms.dashboard.index', $data);
    }

    /**
     * Super admin dashboard route.
     */
    public function superAdminDashboard(): View
    {
        $data = $this->getDashboardData(null);

        return view('cms.dashboard.index', $data);
    }

    public function projectDashboard(Request $request)
    {
        $project = $request->attributes->get('project');
        if (! $project && $request->route('projectCode')) {
            $project = Project::where('code', $request->route('projectCode'))->first();
        }

        $data = $this->getDashboardData($project);

        return view('cms.dashboard.index', $data);
    }

    /**
     * Build aggregated dashboard dataset for either single-project or global CMS.
     */
    private function getDashboardData(?Project $project = null): array
    {
        $projectId = $project?->id;
        $now = now();
        $todayStart = today()->startOfDay();

        // Base scoped queries
        $orderQuery = Order::withoutGlobalScopes();
        $productQuery = Product::withoutGlobalScopes();
        $userQuery = User::withoutGlobalScopes();

        if ($projectId) {
            $orderQuery->where(function ($q) use ($projectId) {
                $q->where('project_id', $projectId)->orWhere('tenant_id', $projectId);
            });
            $productQuery->where(function ($q) use ($projectId) {
                $q->where('project_id', $projectId)->orWhere('tenant_id', $projectId);
            });

            $userQuery->where(function ($q) use ($projectId, $project) {
                if ($project && $project->tenant_id) {
                    $q->where('tenant_id', $project->tenant_id);
                } elseif (Schema::hasColumn('users', 'tenant_id')) {
                    $q->where('tenant_id', $projectId);
                }

                $driver = DB::connection()->getDriverName();
                if ($driver === 'mysql' || $driver === 'mariadb') {
                    $q->orWhereJsonContains('project_ids', (int) $projectId)
                        ->orWhereJsonContains('project_ids', (string) $projectId);
                } else {
                    $q->orWhere('project_ids', 'like', '%"'.$projectId.'"%')
                        ->orWhere('project_ids', 'like', '%'.$projectId.'%');
                }

                if (Schema::hasColumn('users', 'project_id')) {
                    $q->orWhere('project_id', $projectId);
                }
            });
        }

        // Pipeline Metrics
        $pendingOrders = (clone $orderQuery)->where('status', 'pending')->count();
        $processingOrders = (clone $orderQuery)->where('status', 'processing')->count();
        $shippingOrders = (clone $orderQuery)->whereIn('status', ['shipping', 'shipped'])->count();
        $completedToday = (clone $orderQuery)->whereIn('status', ['completed', 'delivered'])
            ->where('updated_at', '>=', $todayStart)
            ->count();

        $hasAgentId = Schema::hasColumn('orders', 'agent_id');
        if ($hasAgentId) {
            $unassignedOrders = (clone $orderQuery)->whereNull('agent_id')->whereNotIn('status', ['cancelled', 'refunded'])->count();
        } else {
            $unassignedOrders = $pendingOrders;
        }

        // Revenue Metrics
        $todayRevenue = (float) (clone $orderQuery)->whereNotIn('status', ['cancelled', 'refunded'])
            ->where('created_at', '>=', $todayStart)
            ->sum('total_amount');

        $monthlyRevenue = (float) (clone $orderQuery)->whereNotIn('status', ['cancelled', 'refunded'])
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('total_amount');

        $totalRevenue = (float) (clone $orderQuery)->whereNotIn('status', ['cancelled', 'refunded'])
            ->sum('total_amount');

        $revenue3m = (float) (clone $orderQuery)->whereNotIn('status', ['cancelled', 'refunded'])
            ->where('created_at', '>=', $now->copy()->subMonths(3))
            ->sum('total_amount');

        $revenue6m = (float) (clone $orderQuery)->whereNotIn('status', ['cancelled', 'refunded'])
            ->where('created_at', '>=', $now->copy()->subMonths(6))
            ->sum('total_amount');

        // Order Counts
        $totalOrders = (clone $orderQuery)->count();
        $todayOrders = (clone $orderQuery)->where('created_at', '>=', $todayStart)->count();

        // Customer Counts
        $totalUsers = $userQuery->count();
        $totalCustomers = (clone $orderQuery)->whereNotNull('customer_email')->distinct('customer_email')->count('customer_email');
        if ($totalUsers === 0 && $totalCustomers > 0) {
            $totalUsers = $totalCustomers;
        }
        $newUsersToday = (clone $userQuery)->where('created_at', '>=', $todayStart)->count();

        // Product & Stock Metrics
        $totalProducts = (clone $productQuery)->count();
        $activeProducts = (clone $productQuery)->where('status', 'active')->count();
        $outOfStockProducts = (clone $productQuery)->where(function ($q) {
            $q->where('stock_quantity', '<=', 5)->orWhere('stock_status', 'out_of_stock');
        })->count();

        // Recent Orders
        $recentOrders = (clone $orderQuery)->latest()->take(6)->get();

        // Top Selling Products
        $topSelling = collect();
        try {
            $itemQuery = DB::table('order_items')
                ->join('orders', 'orders.id', '=', 'order_items.order_id')
                ->whereNotIn('orders.status', ['cancelled', 'refunded']);

            if ($projectId) {
                $itemQuery->where(function ($q) use ($projectId) {
                    $q->where('orders.project_id', $projectId)->orWhere('orders.tenant_id', $projectId);
                });
            }

            $topSelling = $itemQuery->select(
                'order_items.product_id',
                'order_items.product_name',
                DB::raw('SUM(order_items.quantity) as total_sold'),
                DB::raw('SUM(order_items.total_price) as revenue')
            )
                ->groupBy('order_items.product_id', 'order_items.product_name')
                ->orderByDesc('total_sold')
                ->take(5)
                ->get();
        } catch (\Throwable $e) {
            $topSelling = collect();
        }

        // Low stock items
        $lowSelling = (clone $productQuery)
            ->where(function ($q) {
                $q->where('stock_quantity', '<=', 5)->orWhere('stock_status', 'out_of_stock');
            })
            ->latest()
            ->take(5)
            ->get();

        // 7 Days Chart Data
        $revenueChart = collect();
        $ordersChart = collect();
        for ($i = 6; $i >= 0; $i--) {
            $day = now()->subDays($i);
            $dayStart = $day->copy()->startOfDay();
            $dayEnd = $day->copy()->endOfDay();
            $dayLabel = $day->format('d/m');

            $dayRev = (float) (clone $orderQuery)
                ->whereNotIn('status', ['cancelled', 'refunded'])
                ->whereBetween('created_at', [$dayStart, $dayEnd])
                ->sum('total_amount');

            $dayOrd = (int) (clone $orderQuery)
                ->whereBetween('created_at', [$dayStart, $dayEnd])
                ->count();

            $revenueChart->push([
                'date' => $dayLabel,
                'revenue' => $dayRev,
            ]);

            $ordersChart->push([
                'date' => $dayLabel,
                'orders' => $dayOrd,
            ]);
        }

        // Top Buyers for CRM care
        $topBuyers = collect();
        try {
            $topBuyers = (clone $orderQuery)
                ->whereNotIn('status', ['cancelled', 'refunded'])
                ->whereNotNull('customer_email')
                ->select(
                    'customer_name',
                    'customer_email',
                    'customer_phone',
                    DB::raw('COUNT(id) as order_count'),
                    DB::raw('SUM(total_amount) as total_spent'),
                    DB::raw('MAX(created_at) as last_order_at')
                )
                ->groupBy('customer_name', 'customer_email', 'customer_phone')
                ->orderByDesc('total_spent')
                ->take(5)
                ->get();
        } catch (\Throwable $e) {
            $topBuyers = collect();
        }

        // Centralized API Integration Indicators
        $apiIntegrations = [
            'ai' => false,
            'vietqr' => false,
            'ghn' => false,
            'telegram' => false,
        ];
        if ($projectId) {
            $apiIntegrations['ai'] = ! empty(ProjectSetting::get($projectId, 'api.openai_key')) || ! empty(ProjectSetting::get($projectId, 'api.gemini_key'));
            $apiIntegrations['vietqr'] = ! empty(ProjectSetting::get($projectId, 'api.vietqr_account_no'));
            $apiIntegrations['ghn'] = ! empty(ProjectSetting::get($projectId, 'api.ghn_token'));
            $apiIntegrations['telegram'] = ! empty(ProjectSetting::get($projectId, 'api.telegram_bot_token'));
        }

        $stats = [
            'unassigned_orders' => $unassignedOrders,
            'pending_orders' => $pendingOrders,
            'processing_orders' => $processingOrders,
            'shipping_orders' => $shippingOrders,
            'completed_today' => $completedToday,
            'monthly_revenue' => $monthlyRevenue,
            'total_revenue' => $totalRevenue,
            'revenue_3m' => $revenue3m,
            'revenue_6m' => $revenue6m,
            'today_revenue' => $todayRevenue,
            'total_orders' => $totalOrders,
            'today_orders' => $todayOrders,
            'total_customers' => $totalUsers,
            'total_products' => $totalProducts,
            'active_products' => $activeProducts,
            'out_of_stock_products' => $outOfStockProducts,
            'top_selling' => $topSelling,
            'low_selling' => $lowSelling,
            'top_buyers' => $topBuyers,
            'recent_orders' => $recentOrders,
            'api_integrations' => $apiIntegrations,
        ];

        return [
            // Flat variables for legacy view compatibility
            'today_orders' => $todayOrders,
            'today_revenue' => $todayRevenue,
            'total_revenue' => $totalRevenue,
            'monthly_revenue' => $monthlyRevenue,
            'out_of_stock_products' => $outOfStockProducts,
            'new_users_today' => $newUsersToday,
            'total_users' => $totalUsers,
            'total_products' => $totalProducts,
            'pending_orders' => $pendingOrders,
            'revenue_chart' => $revenueChart,
            'orders_chart' => $ordersChart,
            'order_status_chart' => collect(),
            'top_products' => $topSelling,
            'recent_orders' => $recentOrders,
            'device_chart' => $this->getDeviceChart(),
            'traffic_chart' => $this->getTrafficChart(),
            'visitor_stats' => $this->getVisitorStats(),
            'top_ips' => VisitorLog::getTopIPs(10),
            'currentProject' => $project,
            // Structured stats object for public_html pipeline & e-commerce cards
            'stats' => $stats,
        ];
    }

    private function getRevenueChart()
    {
        return collect();
    }

    private function getOrdersChart()
    {
        return collect();
    }

    private function getDeviceChart()
    {
        return Cache::remember('device_analytics', 300, function () {
            $totalVisits = VisitorLog::where('visited_at', '>=', now()->subDays(30))->count();

            if ($totalVisits == 0) {
                return collect([
                    ['device' => 'Desktop', 'percentage' => 45, 'color' => '#3B82F6'],
                    ['device' => 'Mobile', 'percentage' => 35, 'color' => '#10B981'],
                    ['device' => 'Tablet', 'percentage' => 20, 'color' => '#F59E0B'],
                ]);
            }

            $devices = VisitorLog::select(DB::raw('
                CASE 
                    WHEN user_agent LIKE "%Mobile%" OR user_agent LIKE "%Android%" OR user_agent LIKE "%iPhone%" THEN "Mobile"
                    WHEN user_agent LIKE "%Tablet%" OR user_agent LIKE "%iPad%" THEN "Tablet"
                    ELSE "Desktop"
                END as device_type,
                COUNT(*) as count
            '))
                ->where('visited_at', '>=', now()->subDays(30))
                ->groupBy('device_type')
                ->get();

            $colors = ['Desktop' => '#3B82F6', 'Mobile' => '#10B981', 'Tablet' => '#F59E0B'];

            return $devices->map(function ($device) use ($totalVisits, $colors) {
                return [
                    'device' => $device->device_type,
                    'percentage' => round(($device->count / $totalVisits) * 100),
                    'color' => $colors[$device->device_type] ?? '#6B7280',
                ];
            });
        });
    }

    private function getTrafficChart()
    {
        return Cache::remember('traffic_analytics', 300, function () {
            $totalVisits = VisitorLog::where('visited_at', '>=', now()->subDays(30))->count();

            if ($totalVisits == 0) {
                return collect([
                    ['source' => 'Direct', 'visitors' => 0, 'percentage' => 100],
                ]);
            }

            $sources = VisitorLog::select(DB::raw('
                CASE 
                    WHEN url LIKE "%utm_source=google%" OR user_agent LIKE "%Googlebot%" THEN "Google Search"
                    WHEN url LIKE "%utm_source=facebook%" OR url LIKE "%facebook%" THEN "Facebook"
                    WHEN url LIKE "%utm_source=%" THEN "Social Media"
                    WHEN url LIKE "%ref=%" THEN "Referral"
                    ELSE "Direct"
                END as source_type,
                COUNT(*) as count
            '))
                ->where('visited_at', '>=', now()->subDays(30))
                ->groupBy('source_type')
                ->orderBy('count', 'desc')
                ->get();

            return $sources->map(function ($source) use ($totalVisits) {
                return [
                    'source' => $source->source_type,
                    'visitors' => $source->count,
                    'percentage' => round(($source->count / $totalVisits) * 100),
                ];
            });
        });
    }

    private function getOrderStatusChart()
    {
        return [];
    }

    private function getTopProducts()
    {
        return collect();
    }

    private function getVisitorStats()
    {
        return VisitorLog::getTodayStats();
    }

    public function stats(Request $request)
    {
        $project = $request->attributes->get('project');
        $orderQuery = Order::withoutGlobalScopes();
        $productQuery = Product::withoutGlobalScopes();

        if ($project) {
            $orderQuery->where(function ($q) use ($project) {
                $q->where('project_id', $project->id)->orWhere('tenant_id', $project->id);
            });
            $productQuery->where(function ($q) use ($project) {
                $q->where('project_id', $project->id)->orWhere('tenant_id', $project->id);
            });
        }

        return response()->json([
            'orders_today' => (clone $orderQuery)->where('created_at', '>=', today()->startOfDay())->count(),
            'revenue_today' => (float) (clone $orderQuery)->whereNotIn('status', ['cancelled', 'refunded'])->where('created_at', '>=', today()->startOfDay())->sum('total_amount'),
            'products_out_of_stock' => (clone $productQuery)->where(function ($q) {
                $q->where('stock_quantity', '<=', 5)->orWhere('stock_status', 'out_of_stock');
            })->count(),
            'pending_orders' => (clone $orderQuery)->where('status', 'pending')->count(),
        ]);
    }
}
