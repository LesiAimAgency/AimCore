<?php

declare(strict_types=1);

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class RemoteWebsiteController extends Controller
{
    /**
     * Display all remote websites registered with VGT Core.
     */
    public function index(Request $request): View
    {
        $query = Project::query()
            ->with(['tokens' => function ($q) {
                $q->latest();
            }])
            ->orderByRaw('last_heartbeat_at IS NULL, last_heartbeat_at DESC');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('subdomain', 'like', "%{$search}%")
                    ->orWhere('external_domain', 'like', "%{$search}%")
                    ->orWhere('uuid', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === 'online') {
                $query->where('last_heartbeat_at', '>=', now()->subMinutes(10))
                    ->where('connection_status', '!=', 'revoked');
            } elseif ($status === 'offline') {
                $query->where(function ($q) {
                    $q->whereNull('last_heartbeat_at')
                        ->orWhere('last_heartbeat_at', '<', now()->subMinutes(10));
                });
            }
        }

        $projects = $query->paginate(20)->withQueryString();

        $stats = [
            'total' => Project::count(),
            'online' => Project::where('last_heartbeat_at', '>=', now()->subMinutes(10))
                ->where('connection_status', '!=', 'revoked')
                ->count(),
            'offline' => Project::where(function ($q) {
                $q->whereNull('last_heartbeat_at')
                    ->orWhere('last_heartbeat_at', '<', now()->subMinutes(10));
            })->count(),
            'recent_logs' => DB::table('remote_telemetry_logs')->count(),
        ];

        return view('superadmin.websites.index', compact('projects', 'stats'));
    }

    /**
     * Show detailed remote telemetry for a specific website.
     */
    public function show(Project $project): View
    {
        $project->load(['tokens' => function ($q) {
            $q->orderBy('created_at', 'desc');
        }]);

        $recentLogs = DB::table('remote_telemetry_logs')
            ->where('project_id', $project->id)
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get();

        return view('superadmin.websites.show', compact('project', 'recentLogs'));
    }

    /**
     * Rotate project token from SuperAdmin control panel.
     */
    public function rotateToken(Project $project): JsonResponse|RedirectResponse
    {
        // Revoke existing active tokens
        ProjectToken::where('project_id', $project->id)
            ->whereNull('revoked_at')
            ->update(['revoked_at' => now()]);

        // Issue fresh token
        $tokenData = $project->issueToken('superadmin_rotation');

        // Log audit event
        DB::table('remote_telemetry_logs')->insert([
            'project_id' => $project->id,
            'event_type' => 'token_rotated_by_superadmin',
            'ip_address' => request()->ip(),
            'payload' => json_encode(['token_prefix' => $tokenData['model']->token_prefix]),
            'status_code' => 200,
            'created_at' => now(),
        ]);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Project token rotated successfully.',
                'new_token' => $tokenData['token'],
            ]);
        }

        return back()->with('success', "Đã tạo token mới thành công! Token: {$tokenData['token']}");
    }

    /**
     * Revoke all remote tokens for this website (Disable access).
     */
    public function revokeToken(Project $project): JsonResponse|RedirectResponse
    {
        ProjectToken::where('project_id', $project->id)
            ->whereNull('revoked_at')
            ->update(['revoked_at' => now()]);

        $project->update(['connection_status' => 'revoked']);

        DB::table('remote_telemetry_logs')->insert([
            'project_id' => $project->id,
            'event_type' => 'tokens_revoked_by_superadmin',
            'ip_address' => request()->ip(),
            'payload' => json_encode(['reason' => 'Admin disabled remote access']),
            'status_code' => 200,
            'created_at' => now(),
        ]);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'All tokens revoked. Website remote access is disabled.',
            ]);
        }

        return back()->with('success', 'Đã thu hồi toàn bộ token. Website đã bị ngắt quyền kết nối từ xa.');
    }

    /**
     * Active Ping from VGT Core to remote website.
     */
    public function ping(Project $project): JsonResponse
    {
        $targetUrl = $project->remote_url ?: ($project->external_domain ? "https://{$project->external_domain}" : null);

        if (! $targetUrl) {
            return response()->json([
                'success' => false,
                'message' => 'No remote URL configured for this website.',
            ], 422);
        }

        $startTime = microtime(true);
        try {
            $response = Http::timeout(4)->get($targetUrl);
            $duration = round((microtime(true) - $startTime) * 1000);

            $isHealthy = $response->status() < 400;

            if ($isHealthy) {
                $project->update([
                    'connection_status' => 'online',
                    'last_heartbeat_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'status_code' => $response->status(),
                'response_time_ms' => $duration,
                'is_healthy' => $isHealthy,
                'message' => "Ping thành công tới {$targetUrl} (HTTP {$response->status()}, {$duration}ms)",
            ]);
        } catch (\Throwable $e) {
            $duration = round((microtime(true) - $startTime) * 1000);

            return response()->json([
                'success' => false,
                'response_time_ms' => $duration,
                'message' => "Không thể kết nối tới {$targetUrl}: {$e->getMessage()}",
            ], 502);
        }
    }
}
