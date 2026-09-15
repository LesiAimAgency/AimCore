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

        // Tất cả tài khoản có role nội bộ mới vào được SuperAdmin
        if ($user->canAccessSuperAdmin()) {
            return $next($request);
        }

        abort(403, 'Bạn không có quyền truy cập SuperAdmin. Chỉ tài khoản có vai trò nội bộ mới được phép truy cập.');
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
