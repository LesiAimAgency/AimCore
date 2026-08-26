<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helpers\SuperAdminLogHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\StoreMyTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MyTaskController extends Controller
{
    /**
     * Display the "Công việc của tôi & Điều phối" dashboard.
     */
    public function index(Request $request): View
    {
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $pendingQuery = Task::pending()
            ->with(['project', 'creator', 'assignedUser']);

        $completedQuery = Task::completed()
            ->with(['project', 'creator', 'assignedUser']);

        // Phân quyền dữ liệu
        if (! $isAdminOrPm) {
            $pendingQuery->where(function ($q) use ($user) {
                $q->where('user_id', $user->id)
                    ->orWhere('assigned_to', $user->id);
            });

            $completedQuery->where(function ($q) use ($user) {
                $q->where('user_id', $user->id)
                    ->orWhere('assigned_to', $user->id);
            });
        }

        // Lấy danh sách tasks
        $pendingTasks = $pendingQuery->orderBy('position')->get()
            ->map(fn (Task $t) => $this->transformTask($t, $user, $isAdminOrPm))
            ->toArray();

        $completedTasks = $completedQuery->orderByDesc('completed_at')->get()
            ->map(fn (Task $t) => $this->transformTask($t, $user, $isAdminOrPm))
            ->toArray();

        // Danh sách dự án & Danh sách nhân viên theo phòng ban (Ẩn hoàn toàn tài khoản root)
        $projects = Project::with('tasks')->orderBy('name')->get(['id', 'name', 'total_gold'])->map(function (Project $p) {
            return [
                'id' => $p->id,
                'name' => $p->name,
                'total_gold' => (int) ($p->total_gold ?? 1000),
                'remaining_gold' => $p->remainingGold(),
            ];
        });
        $users = User::where('status', true)
            ->where('email', '!=', 'admin@example.com')
            ->orderBy('name')
            ->get(['id', 'name', 'email', 'role', 'department', 'level', 'gold']);

        $pendingCount = count($pendingTasks);
        $completedCount = count($completedTasks);
        $overdueCount = collect($pendingTasks)->filter(function ($t) {
            return ! empty($t['deadline_raw']) && $t['deadline_raw'] < today()->toDateString();
        })->count();

        $departments = [
            'Quản lý dự án',
            'Thiết kế website',
            'Thiết kế',
        ];

        return view('superadmin.my-tasks.index', compact(
            'pendingCount',
            'completedCount',
            'overdueCount',
            'pendingTasks',
            'completedTasks',
            'projects',
            'users',
            'departments',
            'isAdminOrPm'
        ));
    }

    /**
     * Realtime Sync state endpoint for My Tasks (Super High Performance - Cache-First).
     */
    public function sync(Request $request): JsonResponse
    {
        $lastChange = Cache::get('my_tasks_last_change', [
            'time' => 0,
            'user_id' => 0,
            'user_name' => '',
            'action' => 'init',
            'message' => '',
        ]);

        $serverVersion = (int) ($lastChange['time'] ?? 0);
        $clientVersion = (int) $request->input('v', 0);

        // 1. NẾU CHƯA CÓ THAY ĐỔI: Phản hồi ngay từ RAM Cache, KHÔNG QUERY DATABASE (0 SQL queries)
        if ($clientVersion > 0 && $clientVersion >= $serverVersion) {
            return response()->json([
                'success' => true,
                'has_changed' => false,
                'server_version' => $serverVersion,
            ]);
        }

        // 2. KHI CÓ THAY ĐỔI THỰC TẾ (PM kéo thả, tạo mới, duyệt việc, v.v.):
        // Cache kết quả theo User + Version để nếu nhiều nhân viên cùng sync chỉ query DB đúng 1 lần
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $cacheKey = "my_tasks_payload_user_{$user->id}_v_{$serverVersion}";

        $cachedData = Cache::remember($cacheKey, 3600, function () use ($user, $isAdminOrPm) {
            $pendingQuery = Task::pending()->with(['project', 'creator', 'assignedUser']);
            $completedQuery = Task::completed()->with(['project', 'creator', 'assignedUser']);

            if (! $isAdminOrPm) {
                $pendingQuery->where(function ($q) use ($user) {
                    $q->where('user_id', $user->id)
                        ->orWhere('assigned_to', $user->id);
                });

                $completedQuery->where(function ($q) use ($user) {
                    $q->where('user_id', $user->id)
                        ->orWhere('assigned_to', $user->id);
                });
            }

            $pendingTasks = $pendingQuery->orderBy('position')->get()
                ->map(fn (Task $t) => $this->transformTask($t, $user, $isAdminOrPm))
                ->values();

            $completedTasks = $completedQuery->orderByDesc('completed_at')->get()
                ->map(fn (Task $t) => $this->transformTask($t, $user, $isAdminOrPm))
                ->values();

            return [
                'pendingTasks' => $pendingTasks,
                'completedTasks' => $completedTasks,
                'pendingCount' => $pendingTasks->count(),
                'completedCount' => $completedTasks->count(),
            ];
        });

        return response()->json([
            'success' => true,
            'has_changed' => true,
            'server_version' => $serverVersion,
            'last_change' => $lastChange,
            'pendingTasks' => $cachedData['pendingTasks'],
            'completedTasks' => $cachedData['completedTasks'],
            'user_gold' => (int) $user->fresh()->gold,
            'pendingCount' => $cachedData['pendingCount'],
            'completedCount' => $cachedData['completedCount'],
        ]);
    }

    /**
     * Server-Sent Events (SSE) Stream for Instant Realtime Task Sync.
     */
    public function stream(Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $lastVersion = (int) $request->input('last_version', 0);

        return response()->stream(function () use ($lastVersion) {
            // Close session lock to prevent blocking parallel user requests
            if (session_status() === PHP_SESSION_ACTIVE) {
                session_write_close();
            }

            if (function_exists('apache_setenv')) {
                @apache_setenv('no-gzip', '1');
            }
            @ini_set('zlib.output_compression', '0');
            @ini_set('implicit_flush', '1');
            while (ob_get_level() > 0) {
                ob_end_flush();
            }
            flush();

            $clientVersion = $lastVersion;
            $maxTime = 25; // 25s per connection, browser will auto-reconnect
            $startTime = time();

            while (time() - $startTime < $maxTime) {
                if (connection_aborted()) {
                    break;
                }

                $lastChange = Cache::get('my_tasks_last_change', [
                    'time' => 0,
                    'user_id' => 0,
                    'user_name' => '',
                    'action' => 'init',
                    'message' => '',
                ]);

                $serverVersion = (int) ($lastChange['time'] ?? 0);

                if ($serverVersion > $clientVersion) {
                    echo "event: task_updated\n";
                    echo 'data: '.json_encode([
                        'server_version' => $serverVersion,
                        'last_change' => $lastChange,
                    ])."\n\n";
                    flush();
                    $clientVersion = $serverVersion;
                } else {
                    echo ": ping\n\n";
                    flush();
                }

                usleep(400000); // 400ms sleep check
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache, no-transform',
            'Connection' => 'keep-alive',
            'X-Accel-Buffering' => 'no',
        ]);
    }

    /**
     * Store a new personal or assigned task.
     */
    public function store(StoreMyTaskRequest $request): JsonResponse
    {
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $assignedTo = ($isAdminOrPm && $request->filled('assigned_to')) ? (int) $request->assigned_to : $user->id;
        $priority = $request->input('priority', 'medium');
        // Chỉ cấp Quản lý trở lên hoặc Root mới có quyền gán Gold
        $gold = ($isAdminOrPm && $request->filled('gold')) ? max(0, (int) $request->gold) : 0;

        // Logic trạng thái duyệt & nhận việc
        $approvalStatus = $isAdminOrPm || ($assignedTo === $user->id) ? 'approved' : 'pending';
        $acceptanceStatus = ($assignedTo === $user->id) ? 'accepted' : 'pending';

        $nextPosition = Task::pending()->where('user_id', $user->id)->max('position') + 1;

        $task = Task::create([
            'user_id' => $user->id,
            'assigned_to' => $assignedTo,
            'title' => $request->title,
            'description' => $request->description,
            'project_id' => $request->project_id,
            'gold' => $gold,
            'gold_awarded' => false,
            'deadline' => $request->deadline,
            'start_date' => $request->start_date ?? today(),
            'status' => 'todo',
            'priority' => $priority,
            'approval_status' => $approvalStatus,
            'acceptance_status' => $acceptanceStatus,
            'position' => $nextPosition,
        ]);

        $task->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('create', "{$user->name} vừa tạo công việc: {$task->title}", [$task->assigned_to]);

        return response()->json([
            'success' => true,
            'message' => 'Đã tạo công việc thành công.',
            'task' => $this->transformTask($task, $user, $isAdminOrPm),
        ]);
    }

    /**
     * Update an existing task.
     */
    public function update(Request $request, int $task): RedirectResponse|JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $this->authorizeTaskEdit($taskModel, $user, $isAdminOrPm);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
            'gold' => ['nullable', 'integer', 'min:0'],
            'priority' => ['nullable', 'string', 'in:low,medium,high,urgent'],
            'description' => ['nullable', 'string'],
            'deadline' => ['required', 'date'],
        ], [
            'title.required' => 'Vui lòng nhập tên công việc.',
            'project_id.required' => 'Vui lòng chọn dự án.',
            'project_id.exists' => 'Dự án không tồn tại.',
            'deadline.required' => 'Vui lòng chọn deadline.',
            'deadline.date' => 'Deadline không hợp lệ.',
        ]);

        // Chỉ Quản lý / Root mới được cập nhật số gold, nhân sự cấp dưới giữ nguyên gold ban đầu
        $gold = $isAdminOrPm
            ? (isset($validated['gold']) ? max(0, (int) $validated['gold']) : (int) ($taskModel->gold ?? 0))
            : (int) ($taskModel->gold ?? 0);

        $updateData = [
            'title' => $validated['title'],
            'project_id' => $validated['project_id'],
            'deadline' => $validated['deadline'],
            'description' => $validated['description'] ?? $taskModel->description,
            'gold' => $gold,
        ];

        if (isset($validated['priority'])) {
            $updateData['priority'] = $validated['priority'];
        }

        // Chỉ Quản lý mới có quyền điều phối nhân sự khác
        if (isset($validated['assigned_to']) && $isAdminOrPm) {
            $newAssignedTo = (int) $validated['assigned_to'];
            $updateData['assigned_to'] = $newAssignedTo;
            // Nếu thay đổi người được giao hoặc công việc từng bị từ chối, reset trạng thái và ưu tiên lên đầu
            if ($newAssignedTo !== (int) $taskModel->assigned_to || $taskModel->acceptance_status === 'rejected') {
                $updateData['acceptance_status'] = ($newAssignedTo === $user->id) ? 'accepted' : 'pending';
                $updateData['approval_status'] = 'approved';
                $updateData['position'] = 1;
                $updateData['rejection_reason'] = null;

                Task::where('user_id', $taskModel->user_id)
                    ->where('id', '!=', $taskModel->id)
                    ->increment('position');
            }
        }

        $taskModel->update($updateData);
        $taskModel->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('update', "{$user->name} vừa cập nhật công việc: {$taskModel->title}", [$taskModel->assigned_to]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã cập nhật công việc thành công.',
                'task' => $this->transformTask($taskModel, $user, $isAdminOrPm),
            ]);
        }

        return redirect()->route('superadmin.my-tasks.index')
            ->with('success', 'Đã cập nhật công việc thành công.');
    }

    /**
     * Delete a task.
     */
    public function destroy(int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $this->authorizeTaskEdit($taskModel, $user, $isAdminOrPm);

        $taskTitle = $taskModel->title;
        $taskModel->delete();

        $this->recalculatePositions($taskModel->user_id);

        $this->recordTaskChange('delete', "{$user->name} vừa xóa công việc: {$taskTitle}", [$taskModel->assigned_to]);

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa công việc thành công.',
        ]);
    }

    /**
     * Admin/PM Duyệt task (Approve).
     */
    public function approve(int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();

        if (! $this->isUserAdminOrPm($user)) {
            abort(403, 'Chỉ Quản trị viên và Quản lý dự án mới có quyền duyệt task.');
        }

        $taskModel->update([
            'approval_status' => 'approved',
            'rejection_reason' => null,
        ]);
        $taskModel->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('approve', "Quản lý {$user->name} vừa duyệt công việc: {$taskModel->title}", [$taskModel->assigned_to]);

        return response()->json([
            'success' => true,
            'message' => 'Đã duyệt công việc thành công!',
            'task' => $this->transformTask($taskModel, $user, true),
        ]);
    }

    /**
     * Admin/PM Từ chối duyệt task (Reject Approval).
     */
    public function rejectApproval(Request $request, int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();

        if (! $this->isUserAdminOrPm($user)) {
            abort(403, 'Chỉ Quản trị viên và Quản lý dự án mới có quyền từ chối duyệt task.');
        }

        $taskModel->update([
            'approval_status' => 'rejected',
            'rejection_reason' => $request->input('reason', 'Không được duyệt bởi Admin/PM'),
        ]);
        $taskModel->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('reject_approval', "Quản lý {$user->name} đã từ chối duyệt: {$taskModel->title}", [$taskModel->assigned_to]);

        return response()->json([
            'success' => true,
            'message' => 'Đã từ chối duyệt công việc.',
            'task' => $this->transformTask($taskModel, $user, true),
        ]);
    }

    /**
     * Người được giao việc chấp nhận task (Accept).
     */
    public function accept(int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();

        if ($taskModel->assigned_to !== $user->id && ! $this->isUserAdminOrPm($user)) {
            abort(403, 'Bạn không phải là người được giao công việc này.');
        }

        $taskModel->update([
            'acceptance_status' => 'accepted',
            'status' => 'in_progress',
            'rejection_reason' => null,
        ]);
        $taskModel->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('accept', "Nhân sự {$user->name} đã nhận việc: {$taskModel->title}", array_unique(array_filter([$taskModel->user_id, $taskModel->assigned_to])));

        return response()->json([
            'success' => true,
            'message' => 'Đã chấp nhận và nhận việc thành công!',
            'task' => $this->transformTask($taskModel, $user, $this->isUserAdminOrPm($user)),
        ]);
    }

    /**
     * Admin/PM điều phối lại công việc cho nhân sự khác (Reassign).
     */
    public function reassign(Request $request, int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();

        if (! $this->isUserAdminOrPm($user)) {
            return response()->json([
                'success' => false,
                'message' => 'Chỉ Quản trị viên và Quản lý dự án mới có quyền điều phối lại công việc.',
            ], 403);
        }

        $validated = $request->validate([
            'assigned_to' => ['required', 'integer', 'exists:users,id'],
        ], [
            'assigned_to.required' => 'Vui lòng chọn nhân sự mới tiếp nhận công việc.',
            'assigned_to.exists' => 'Nhân sự không tồn tại.',
        ]);

        $newAssignee = User::findOrFail($validated['assigned_to']);

        // Đưa công việc được điều phối lại lên vị trí số 1 (đầu danh sách)
        Task::where('user_id', $taskModel->user_id)
            ->where('id', '!=', $taskModel->id)
            ->increment('position');

        $taskModel->update([
            'assigned_to' => $newAssignee->id,
            'acceptance_status' => ($newAssignee->id === $user->id) ? 'accepted' : 'pending',
            'approval_status' => 'approved',
            'status' => 'todo',
            'position' => 1,
            'rejection_reason' => null,
        ]);

        $taskModel->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('reassign', "Quản lý {$user->name} đã điều phối lại công việc: {$taskModel->title} cho {$newAssignee->name}", array_unique(array_filter([$taskModel->user_id, $taskModel->assigned_to, $newAssignee->id])));

        return response()->json([
            'success' => true,
            'message' => "Đã điều phối lại công việc cho {$newAssignee->name} thành công!",
            'task' => $this->transformTask($taskModel, $user, true),
        ]);
    }

    /**
     * Người được giao việc từ chối task (Decline).
     */
    public function decline(Request $request, int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();

        if ($taskModel->assigned_to !== $user->id && ! $this->isUserAdminOrPm($user)) {
            abort(403, 'Bạn không phải là người được giao công việc này.');
        }

        $taskModel->update([
            'acceptance_status' => 'rejected',
            'rejection_reason' => $request->input('reason', 'Nhân sự từ chối nhận việc'),
        ]);
        $taskModel->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('decline', "Nhân sự {$user->name} đã từ chối việc: {$taskModel->title}", array_unique(array_filter([$taskModel->user_id, $taskModel->assigned_to])));

        return response()->json([
            'success' => true,
            'message' => 'Đã từ chối nhận công việc.',
            'task' => $this->transformTask($taskModel, $user, $this->isUserAdminOrPm($user)),
        ]);
    }

    /**
     * Reorder tasks.
     */
    public function reorder(Request $request): JsonResponse
    {
        $request->validate([
            'items' => ['required', 'array'],
            'items.*' => ['integer'],
        ]);

        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);
        $ids = $request->items;

        // Ensure tasks belong to current user or user is admin/pm
        if (! $isAdminOrPm) {
            $count = Task::pending()
                ->whereIn('id', $ids)
                ->where(function ($q) use ($user) {
                    $q->where('user_id', $user->id)
                        ->orWhere('assigned_to', $user->id);
                })
                ->count();

            if ($count !== count($ids)) {
                abort(403, 'Một số công việc không hợp lệ hoặc không thuộc về bạn.');
            }
        }

        DB::transaction(function () use ($ids) {
            foreach ($ids as $position => $id) {
                Task::where('id', $id)->update(['position' => $position + 1]);
            }
        });

        $this->recordTaskChange('reorder', ($isAdminOrPm ? "Quản lý {$user->name}" : "Nhân sự {$user->name}").' vừa điều chỉnh lại thứ tự ưu tiên của các công việc.', []);

        return response()->json([
            'success' => true,
            'message' => 'Đã cập nhật thứ tự công việc.',
        ]);
    }

    /**
     * Mark task as completed (pending manager gold approval).
     */
    public function complete(int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $this->authorizeTaskEdit($taskModel, $user, $isAdminOrPm);

        if ($taskModel->completed_at !== null) {
            return response()->json([
                'success' => false,
                'message' => 'Công việc đã được hoàn thành trước đó.',
            ], 422);
        }

        $taskModel->update([
            'completed_at' => now(),
            'status' => 'completed',
            'gold_awarded' => false,
        ]);

        $this->recalculatePositions($taskModel->user_id);
        $taskModel->load(['project', 'creator', 'assignedUser']);

        $this->recordTaskChange('complete', "Nhân sự {$user->name} vừa báo cáo hoàn thành: {$taskModel->title}", array_unique(array_filter([$taskModel->user_id, $taskModel->assigned_to])));

        return response()->json([
            'success' => true,
            'message' => 'Đã đánh dấu hoàn thành công việc!',
            'task' => $this->transformTask($taskModel, $user, $isAdminOrPm),
            'gold_amount' => (int) ($taskModel->gold ?? 0),
            'gold_awarded' => false,
        ]);
    }

    /**
     * Manager/Admin approves completed task and awards gold to assignee.
     */
    public function approveGold(int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        if (! $isAdminOrPm) {
            return response()->json([
                'success' => false,
                'message' => 'Chỉ Quản lý dự án hoặc Super Admin mới có quyền duyệt nghiệm thu và trao Gold.',
            ], 403);
        }

        if ($taskModel->completed_at === null) {
            return response()->json([
                'success' => false,
                'message' => 'Công việc chưa được báo cáo hoàn thành.',
            ], 422);
        }

        if ($taskModel->gold_awarded) {
            return response()->json([
                'success' => false,
                'message' => 'Công việc này đã được duyệt trao Gold trước đó.',
            ], 422);
        }

        $goldAmount = (int) ($taskModel->gold ?? 0);
        $recipientId = $taskModel->assigned_to ?? $taskModel->user_id;

        if ($goldAmount <= 0 || ! $recipientId) {
            return response()->json([
                'success' => false,
                'message' => 'Công việc không có điểm thưởng Gold để trao.',
            ], 422);
        }

        DB::transaction(function () use ($taskModel, $goldAmount, $recipientId) {
            User::where('id', $recipientId)->increment('gold', $goldAmount);
            $taskModel->update(['gold_awarded' => true]);
        });

        $taskModel->load(['project', 'creator', 'assignedUser']);
        $freshUser = User::find($user->id);
        $recipient = User::find($recipientId);

        $this->recordTaskChange('approve_gold', "Quản lý {$user->name} đã duyệt trao thưởng +{$goldAmount} Gold cho {$recipient?->name}!", [$recipient?->id ?? 0]);

        return response()->json([
            'success' => true,
            'message' => "Đã duyệt nghiệm thu và cộng +{$goldAmount} Gold cho nhân sự {$recipient?->name}!",
            'task' => $this->transformTask($taskModel, $user, $isAdminOrPm),
            'user_gold' => $freshUser?->gold ?? 0,
            'gold_amount' => $goldAmount,
            'gold_awarded' => true,
        ]);
    }

    /**
     * Restore completed task and revoke gold if awarded.
     */
    public function restore(int $task): JsonResponse
    {
        $taskModel = Task::findOrFail($task);
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $this->authorizeTaskEdit($taskModel, $user, $isAdminOrPm);

        if ($taskModel->completed_at === null) {
            return response()->json([
                'success' => false,
                'message' => 'Công việc chưa hoàn thành.',
            ], 422);
        }

        $goldRevoked = false;
        $goldAmount = (int) ($taskModel->gold ?? 0);
        $recipientId = $taskModel->assigned_to ?? $taskModel->user_id;

        DB::transaction(function () use ($taskModel, $goldAmount, $recipientId, &$goldRevoked) {
            // Nếu đã từng thưởng gold khi complete/duyệt, hoàn lại
            if ($taskModel->gold_awarded && $goldAmount > 0 && $recipientId) {
                $targetUser = User::find($recipientId);
                if ($targetUser) {
                    $targetUser->decrement('gold', min($targetUser->gold, $goldAmount));
                }
                $goldRevoked = true;
            }

            $nextPosition = Task::pending()->where('user_id', $taskModel->user_id)->max('position') + 1;

            $taskModel->update([
                'completed_at' => null,
                'status' => 'in_progress',
                'gold_awarded' => false,
                'position' => $nextPosition,
            ]);
        });

        $taskModel->load(['project', 'creator', 'assignedUser']);

        $freshUser = User::find($user->id);

        $this->recordTaskChange('restore', "Quản lý {$user->name} đã khôi phục công việc: {$taskModel->title}", [$taskModel->assigned_to]);

        return response()->json([
            'success' => true,
            'message' => $goldRevoked
                ? "Đã khôi phục công việc và thu hồi {$goldAmount} Gold."
                : 'Đã khôi phục công việc.',
            'task' => $this->transformTask($taskModel, $user, $isAdminOrPm),
            'user_gold' => $freshUser?->gold ?? 0,
        ]);
    }

    /**
     * Ghi nhận sự thay đổi dữ liệu để realtime sync cho các nhân sự khác.
     */
    protected function recordTaskChange(string $action, string $message, array $involvedUsers = []): void
    {
        $user = auth()->user();
        Cache::put('my_tasks_last_change', [
            'time' => (int) (microtime(true) * 1000),
            'user_id' => $user?->id ?? 0,
            'user_name' => $user?->name ?? 'Hệ thống',
            'action' => $action,
            'message' => $message,
            'involved_users' => $involvedUsers,
        ], 3600);

        // Đẩy thẳng vào System Logs (Log 7 ngày)
        SuperAdminLogHelper::logActivity('MyTask: '.$message, [
            'action' => $action,
            'ip' => request()->ip(),
        ]);
    }

    /**
     * Return JSON list of completed tasks.
     */
    public function completed(Request $request): JsonResponse
    {
        $user = auth()->user();
        $isAdminOrPm = $this->isUserAdminOrPm($user);

        $query = Task::completed()->with(['project', 'creator', 'assignedUser']);

        if (! $isAdminOrPm) {
            $query->where(function ($q) use ($user) {
                $q->where('user_id', $user->id)
                    ->orWhere('assigned_to', $user->id);
            });
        }

        $tasks = $query->orderByDesc('completed_at')
            ->get()
            ->map(fn (Task $t) => $this->transformTask($t, $user, $isAdminOrPm));

        return response()->json([
            'success' => true,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Transform Task model to array payload for Alpine UI.
     */
    private function transformTask(Task $t, User $user, bool $isAdminOrPm): array
    {
        $isAssignee = ($t->assigned_to === $user->id);
        $isCreator = ($t->user_id === $user->id);

        return [
            'id' => $t->id,
            'title' => $t->title,
            'description' => $t->description,
            'project' => $t->project?->name,
            'project_id' => $t->project_id,
            'user_id' => $t->user_id,
            'creator_name' => $t->creator?->name ?? 'N/A',
            'assigned_to' => $t->assigned_to,
            'assignee_name' => $t->assignedUser?->name ?? $t->creator?->name ?? 'Chưa giao',
            'assignee_department' => $t->assignedUser?->department ?? 'N/A',
            'gold' => (int) ($t->gold ?? 0),
            'gold_awarded' => (bool) $t->gold_awarded,
            'start_date' => $t->start_date?->format('d/m/Y'),
            'deadline' => $t->deadline?->format('d/m'),
            'deadline_full' => $t->deadline?->format('d/m/Y'),
            'deadline_raw' => $t->deadline?->toDateString(),
            'position' => $t->position,
            'status' => $t->status,
            'priority' => $t->priority ?? 'medium',
            'approval_status' => $t->approval_status ?? 'approved',
            'acceptance_status' => $t->acceptance_status ?? 'accepted',
            'rejection_reason' => $t->rejection_reason,
            'completed_at' => $t->completed_at?->format('d/m/Y H:i'),
            'can_approve' => $isAdminOrPm && ($t->approval_status === 'pending'),
            'can_accept' => ($isAssignee || $isAdminOrPm) && ($t->acceptance_status === 'pending'),
            'is_my_task' => $isAssignee || $isCreator,
        ];
    }

    /**
     * Check if user is SuperAdmin or Project Manager.
     */
    private function isUserAdminOrPm(User $user): bool
    {
        return $user->isManager()
            || $user->isSuperAdmin()
            || $user->level <= 1
            || $user->role === 'project_manager'
            || $user->role === 'super_admin'
            || $user->hasRole(['super_admin', 'project_manager', 'manager']);
    }

    /**
     * Authorize editing a task.
     */
    private function authorizeTaskEdit(Task $task, User $user, bool $isAdminOrPm): void
    {
        if ($isAdminOrPm) {
            return;
        }

        if ($task->user_id !== $user->id && $task->assigned_to !== $user->id) {
            abort(403, 'Bạn không có quyền thao tác trên công việc này.');
        }
    }

    /**
     * Recalculate sequential positions.
     */
    private function recalculatePositions(int $userId): void
    {
        $tasks = Task::pending()
            ->where('user_id', $userId)
            ->orderBy('position')
            ->get();

        DB::transaction(function () use ($tasks) {
            foreach ($tasks as $index => $task) {
                $task->update(['position' => $index + 1]);
            }
        });
    }
}
