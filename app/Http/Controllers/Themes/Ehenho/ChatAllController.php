<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Models\Ehenho\ChatAllMessage;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChatAllController extends Controller
{
    private function getCurrentProjectId(): ?int
    {
        return app()->bound('current_project_id')
            ? app('current_project_id')
            : (request()->attributes->get('project')?->id ?? (session('current_project_id') ?? null));
    }

    /**
     * Helper to return 401 unauthenticated response for Guest
     */
    private function unauthenticatedResponse(Request $request): JsonResponse|RedirectResponse
    {
        $loginUrl = Authenticate::resolveLoginUrl($request);

        if ($request->ajax() || $request->expectsJson()) {
            return response()->json([
                'success' => false,
                'authenticated' => false,
                'error' => 'Unauthenticated',
                'message' => 'Bạn cần đăng nhập để sử dụng chức năng chat.',
                'login_url' => $loginUrl,
            ], 401);
        }

        return redirect()->guest($loginUrl)->with('error', 'Bạn cần đăng nhập để sử dụng chức năng chat.');
    }

    /**
     * Check if current user is authenticated
     */
    private function checkAuth(Request $request): ?JsonResponse
    {
        if (! Auth::check()) {
            return $this->unauthenticatedResponse($request);
        }

        return null;
    }

    /**
     * Get recent messages for Chat All (Authenticated Only)
     */
    public function messages(Request $request): JsonResponse|RedirectResponse
    {
        if ($authCheck = $this->checkAuth($request)) {
            return $authCheck;
        }

        $userId = Auth::id();
        $projectId = $this->getCurrentProjectId();

        $messages = ChatAllMessage::with(['user.profile'])
            ->when($projectId, function ($q) use ($projectId) {
                $q->where(function ($sub) use ($projectId) {
                    $sub->whereNull('project_id')->orWhere('project_id', $projectId);
                });
            })
            ->latest('id')
            ->take(50)
            ->get()
            ->reverse()
            ->values()
            ->map(function (ChatAllMessage $msg) use ($userId) {
                return $this->formatMessage($msg, $userId);
            });

        // Mark as read in session
        session(['chat_all_last_read_at' => now()->toIso8601String()]);

        return response()->json([
            'success' => true,
            'authenticated' => true,
            'messages' => $messages,
            'current_user_id' => $userId,
        ]);
    }

    /**
     * Send a message to Chat All (Authenticated Only)
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        if ($authCheck = $this->checkAuth($request)) {
            return $authCheck;
        }

        $validated = $request->validate([
            'message' => 'required|string|min:1|max:2000',
        ]);

        $userId = Auth::id();
        $projectId = $this->getCurrentProjectId();

        $chatMessage = ChatAllMessage::create([
            'project_id' => $projectId,
            'user_id' => $userId,
            'message' => trim($validated['message']),
        ]);

        $chatMessage->load(['user.profile']);

        // Update read tracker
        session(['chat_all_last_read_at' => now()->toIso8601String()]);

        return response()->json([
            'success' => true,
            'message' => $this->formatMessage($chatMessage, $userId),
        ]);
    }

    /**
     * Upload an attachment to Chat All (Authenticated Only - Strict rejection for Guests)
     */
    public function uploadAttachment(Request $request): JsonResponse|RedirectResponse
    {
        // Strict server-side authentication check before ANY file handling
        if ($authCheck = $this->checkAuth($request)) {
            return $authCheck;
        }

        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf|max:5120',
            'message' => 'nullable|string|max:1000',
        ]);

        $file = $request->file('file');
        if (! $file || ! $file->isValid()) {
            return response()->json(['success' => false, 'message' => 'Tệp đính kèm không hợp lệ.'], 422);
        }

        $userId = Auth::id();
        $projectId = $this->getCurrentProjectId();

        $extension = $file->getClientOriginalExtension();
        $filename = 'chat_'.Str::random(16).'_'.time().'.'.$extension;
        $file->move(public_path('uploads/chat_all'), $filename);

        $attachmentUrl = asset('uploads/chat_all/'.$filename);
        $attachmentType = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'], true) ? 'image' : 'file';

        $chatMessage = ChatAllMessage::create([
            'project_id' => $projectId,
            'user_id' => $userId,
            'message' => $request->input('message') ? trim((string) $request->input('message')) : '[Hình ảnh/Tệp đính kèm]',
            'attachment_url' => $attachmentUrl,
            'attachment_type' => $attachmentType,
        ]);

        $chatMessage->load(['user.profile']);
        session(['chat_all_last_read_at' => now()->toIso8601String()]);

        return response()->json([
            'success' => true,
            'message' => $this->formatMessage($chatMessage, $userId),
        ]);
    }

    /**
     * Poll for new messages (Authenticated Only)
     */
    public function poll(Request $request): JsonResponse|RedirectResponse
    {
        if ($authCheck = $this->checkAuth($request)) {
            return $authCheck;
        }

        $userId = Auth::id();
        $lastId = (int) $request->input('last_id', 0);
        $projectId = $this->getCurrentProjectId();

        $newMessages = ChatAllMessage::with(['user.profile'])
            ->when($projectId, function ($q) use ($projectId) {
                $q->where(function ($sub) use ($projectId) {
                    $sub->whereNull('project_id')->orWhere('project_id', $projectId);
                });
            })
            ->where('id', '>', $lastId)
            ->orderBy('id', 'asc')
            ->take(50)
            ->get()
            ->map(function (ChatAllMessage $msg) use ($userId) {
                return $this->formatMessage($msg, $userId);
            });

        // Calculate unread count based on session read timestamp
        $lastRead = session('chat_all_last_read_at');
        $unreadCount = 0;
        if ($lastRead) {
            $unreadCount = ChatAllMessage::when($projectId, function ($q) use ($projectId) {
                $q->where(function ($sub) use ($projectId) {
                    $sub->whereNull('project_id')->orWhere('project_id', $projectId);
                });
            })
                ->where('created_at', '>', Carbon::parse($lastRead))
                ->where('user_id', '!=', $userId)
                ->count();
        }

        return response()->json([
            'success' => true,
            'new_messages' => $newMessages,
            'unread_count' => $unreadCount,
        ]);
    }

    /**
     * Mark Chat All as read (Authenticated Only)
     */
    public function markAsRead(Request $request): JsonResponse|RedirectResponse
    {
        if ($authCheck = $this->checkAuth($request)) {
            return $authCheck;
        }

        session(['chat_all_last_read_at' => now()->toIso8601String()]);

        return response()->json([
            'success' => true,
            'unread_count' => 0,
        ]);
    }

    /**
     * Format a message for frontend consumption
     */
    private function formatMessage(ChatAllMessage $msg, int $currentUserId): array
    {
        return [
            'id' => $msg->id,
            'user_id' => $msg->user_id,
            'is_mine' => ($msg->user_id === $currentUserId),
            'sender_name' => $msg->sender_name,
            'sender_avatar' => $msg->sender_avatar,
            'message' => $msg->message,
            'attachment_url' => $msg->attachment_url,
            'attachment_type' => $msg->attachment_type,
            'time' => $msg->created_at?->format('H:i') ?? '',
            'created_at_human' => $msg->created_at?->diffForHumans() ?? '',
        ];
    }
}
