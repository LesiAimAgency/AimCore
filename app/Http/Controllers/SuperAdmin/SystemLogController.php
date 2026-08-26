<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SystemLogController extends Controller
{
    /**
     * Check if user has permission to view logs.
     */
    private function checkPermission()
    {
        $user = Auth::user();
        if (! $user) {
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
        $files = File::glob($logPath.'/checklog-*.log');

        $logs = [];
        foreach ($files as $file) {
            $logs[] = [
                'name' => basename($file),
                'size' => round(File::size($file) / 1024, 2).' KB',
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
        if (! preg_match('/^checklog-\d{4}-\d{2}-\d{2}\.log$/', $filename)) {
            abort(404, 'File log không tồn tại hoặc không hợp lệ.');
        }

        $file = storage_path('logs/'.$filename);

        if (! File::exists($file)) {
            abort(404, 'File log không tồn tại.');
        }

        return response()->download($file);
    }

    public function show($filename)
    {
        $this->checkPermission();

        // Ensure the filename is valid and safe
        if (! preg_match('/^checklog-\d{4}-\d{2}-\d{2}\.log$/', $filename)) {
            abort(404, 'File log không tồn tại hoặc không hợp lệ.');
        }

        $file = storage_path('logs/'.$filename);

        if (! File::exists($file)) {
            abort(404, 'File log không tồn tại.');
        }

        $content = File::get($file);

        $parsedLogs = [];
        $lines = explode(PHP_EOL, $content);
        foreach ($lines as $line) {
            if (empty(trim($line))) {
                continue;
            }

            // Log format: [2026-08-19 10:20:20] local.INFO: Action: Tên hành động | User: Bui Trung (ID: 1) | Changes: {"key":"value"}
            preg_match('/^\[(.*?)\] (.*?): Action: (.*?) \| User: (.*?) \| Changes: (.*)$/', $line, $matches);

            if (count($matches) === 6) {
                $parsedLogs[] = [
                    'time' => $matches[1],
                    'level' => $matches[2],
                    'action' => trim($matches[3]),
                    'user' => trim($matches[4]),
                    'changes' => json_decode(trim($matches[5]), true) ?: trim($matches[5]),
                    'raw' => $line,
                ];
            } else {
                $parsedLogs[] = [
                    'raw' => $line,
                ];
            }
        }
        $parsedLogs = array_reverse($parsedLogs); // Hiện log mới nhất lên đầu

        return view('superadmin.logs.show', compact('filename', 'content', 'parsedLogs'));
    }

    public function destroy($filename)
    {
        $this->checkPermission();

        // Ensure the filename is valid and safe
        if (! preg_match('/^checklog-\d{4}-\d{2}-\d{2}\.log$/', $filename)) {
            abort(404, 'File log không tồn tại hoặc không hợp lệ.');
        }

        $file = storage_path('logs/'.$filename);

        if (! File::exists($file)) {
            abort(404, 'File log không tồn tại.');
        }

        File::delete($file);

        return redirect()->route('superadmin.logs.index')->with('alert', [
            'type' => 'success',
            'message' => 'Đã xóa file log '.$filename.' thành công!',
        ]);
    }
}
