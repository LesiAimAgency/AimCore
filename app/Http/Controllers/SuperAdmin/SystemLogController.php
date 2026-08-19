<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class SystemLogController extends Controller
{
    /**
     * Check if user has permission to view logs.
     */
    private function checkPermission()
    {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'Unauthorized access.');
        }

        // Only allow admin@example.com to view logs
        if ($user->email !== 'admin@example.com') {
            abort(403, 'Bạn không có quyền truy cập trang này. Chỉ tài khoản Root mới được phép.');
        }
    }

    public function index()
    {
        $this->checkPermission();

        $logPath = storage_path('logs');
        $files = File::glob($logPath . '/checklog-*.log');
        
        $logs = [];
        foreach ($files as $file) {
            $logs[] = [
                'name' => basename($file),
                'size' => round(File::size($file) / 1024, 2) . ' KB',
                'modified' => date('Y-m-d H:i:s', File::lastModified($file)),
            ];
        }

        // Sort by modified date descending
        usort($logs, function ($a, $b) {
            return strtotime($b['modified']) - strtotime($a['modified']);
        });

        return view('superadmin.logs.index', compact('logs'));
    }

    public function download($filename)
    {
        $this->checkPermission();

        // Ensure the filename is valid and safe
        if (!preg_match('/^checklog-\d{4}-\d{2}-\d{2}\.log$/', $filename)) {
            abort(404, 'File log không tồn tại hoặc không hợp lệ.');
        }

        $file = storage_path('logs/' . $filename);

        if (!File::exists($file)) {
            abort(404, 'File log không tồn tại.');
        }

        return response()->download($file);
    }
}
