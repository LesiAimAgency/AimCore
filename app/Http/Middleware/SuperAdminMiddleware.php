<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure we're using main database for superadmin
        $this->ensureMainDatabase();

        // Use web guard for superadmin (main database)
        if (! Auth::guard('web')->check()) {
            return redirect('/login');
        }

        $user = Auth::guard('web')->user();

        // Cho phép Manager (Quản lý) và Employee (Nhân viên) truy cập các route superadmin
        // Quyền hiển thị menu và chức năng sẽ được phân quyền cụ thể trong giao diện và controller.
        if ($user->isManager() || $user->isEmployee() || $user->level <= 2) {
            return $next($request);
        }

        abort(403, 'Bạn không có quyền truy cập SuperAdmin.');
    }

    /**
     * Ensure we're connected to main database
     */
    private function ensureMainDatabase(): void
    {
        if (app()->environment('testing')) {
            return;
        }

        if (Config::get('database.default') !== 'mysql') {
            DB::setDefaultConnection('mysql');
            Config::set('database.default', 'mysql');
        }
    }
}
