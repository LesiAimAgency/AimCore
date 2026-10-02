<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Conversation;
use App\Models\Ehenho\Message;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\SocialConnection;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private function getCurrentProjectId(): ?int
    {
        return app()->bound('current_project_id')
            ? app('current_project_id')
            : (request()->attributes->get('project')?->id ?? (session('current_project_id') ?? null));
    }

    /**
     * Auto-heal any legacy messages missing conversation_id
     */
    private function autoHealOrphanMessages(): void
    {
        $orphans = Message::whereNull('conversation_id')->get();
        foreach ($orphans as $orphan) {
            $senderId = (int) $orphan->sender_id;
            $recipientId = (int) $orphan->recipient_id;

            $conversation = Conversation::where(function ($q) use ($senderId, $recipientId) {
                $q->where('user_one_id', $senderId)->where('user_two_id', $recipientId);
            })->orWhere(function ($q) use ($senderId, $recipientId) {
                $q->where('user_one_id', $recipientId)->where('user_two_id', $senderId);
            })->first();

            if (! $conversation) {
                $conversation = Conversation::create([
                    'project_id' => $this->getCurrentProjectId(),
                    'user_one_id' => $senderId,
                    'user_two_id' => $recipientId,
                    'last_message_at' => $orphan->created_at,
                ]);
            }
            $orphan->update(['conversation_id' => $conversation->id]);
        }
    }

    /**
     * Unified Zalo-like messaging inbox with conversations & chat pane
     */
    public function inbox(Request $request): View
    {
        $this->autoHealOrphanMessages();

        $userId = auth()->id();
        $conversations = Conversation::where('user_one_id', $userId)
            ->orWhere('user_two_id', $userId)
            ->with(['userOne.profile', 'userTwo.profile', 'messages' => fn ($q) => $q->latest('id')])
            ->orderBy('last_message_at', 'desc')
            ->get();

        // Attach partner details, latest snippet, and unread counts
        $conversations->each(function (Conversation $conv) use ($userId) {
            $partner = ($conv->user_one_id === $userId) ? $conv->userTwo : $conv->userOne;
            $conv->partner = $partner;
            $conv->partner_profile = $partner?->profile;
            $conv->partner_avatar = $conv->partner_profile?->avatar_url ? asset($conv->partner_profile->avatar_url) : asset('themes/ehenho/images/df_picture.png');
            $conv->last_message = $conv->messages->first();
            $conv->unread_count = Message::where('conversation_id', $conv->id)
                ->where('recipient_id', $userId)
                ->where('is_read', false)
                ->count();
        });

        // Determine active conversation
        $activeConversationId = (int) $request->input('conversation_id', 0);
        $activeConversation = null;

        if ($activeConversationId > 0) {
            $activeConversation = $conversations->firstWhere('id', $activeConversationId);
        }

        if (! $activeConversation && $conversations->isNotEmpty()) {
            $activeConversation = $conversations->first();
        }

        $activeMessages = collect();
        $partner = null;

        if ($activeConversation) {
            // Mark all unread messages from partner as read
            Message::where('conversation_id', $activeConversation->id)
                ->where('recipient_id', $userId)
                ->where('is_read', false)
                ->update(['is_read' => true, 'read_at' => now()]);

            $activeMessages = $activeConversation->messages()
                ->with(['sender.profile'])
                ->orderBy('id', 'asc')
                ->get();

            $partner = $activeConversation->partner;
        }

        return view('themes.ehenho.pages.messages.inbox', compact('conversations', 'activeConversation', 'activeMessages', 'partner'));
    }

    /**
     * Sent messages legacy redirect to unified inbox
     */
    public function sent(): RedirectResponse
    {
        return redirect()->route('ehenho.messages.inbox');
    }

    /**
     * Show/open a conversation - supports AJAX data retrieval or redirect to inbox
     */
    public function show(string $id, Request $request): View|JsonResponse|RedirectResponse
    {
        $userId = auth()->id();
        $convId = (int) $id;

        $conversation = Conversation::where('id', $convId)
            ->where(function ($q) use ($userId) {
                $q->where('user_one_id', $userId)->orWhere('user_two_id', $userId);
            })
            ->first();

        // If not found by conversation id, maybe it's a message id or partner user id
        if (! $conversation) {
            $message = Message::where('id', $convId)
                ->where(function ($q) use ($userId) {
                    $q->where('sender_id', $userId)->orWhere('recipient_id', $userId);
                })
                ->first();

            if ($message && $message->conversation_id) {
                $conversation = Conversation::find($message->conversation_id);
            }
        }

        if (! $conversation) {
            // Check if $convId is a partner user_id
            $partnerUser = User::find($convId);
            if ($partnerUser && $partnerUser->id !== $userId) {
                $conversation = Conversation::where(function ($q) use ($userId, $convId) {
                    $q->where('user_one_id', $userId)->where('user_two_id', $convId);
                })->orWhere(function ($q) use ($userId, $convId) {
                    $q->where('user_one_id', $convId)->where('user_two_id', $userId);
                })->first();

                if (! $conversation) {
                    $conversation = Conversation::create([
                        'project_id' => $this->getCurrentProjectId(),
                        'user_one_id' => $userId,
                        'user_two_id' => $convId,
                        'last_message_at' => now(),
                    ]);
                }
            }
        }

        if (! $conversation) {
            abort(404, 'Cuộc trò chuyện không tồn tại.');
        }

        // If AJAX request (e.g. clicking a conversation card in left list)
        if ($request->ajax() || $request->expectsJson()) {
            Message::where('conversation_id', $conversation->id)
                ->where('recipient_id', $userId)
                ->where('is_read', false)
                ->update(['is_read' => true, 'read_at' => now()]);

            $partner = ($conversation->user_one_id === $userId) ? $conversation->userTwo : $conversation->userOne;
            $partnerProfile = $partner?->profile;

            $messages = $conversation->messages()
                ->with(['sender.profile'])
                ->orderBy('id', 'asc')
                ->get()
                ->map(function ($msg) use ($userId) {
                    return [
                        'id' => $msg->id,
                        'sender_id' => $msg->sender_id,
                        'is_mine' => ($msg->sender_id === $userId),
                        'body' => $msg->body,
                        'time' => $msg->created_at?->format('H:i') ?? '',
                        'created_at_human' => $msg->created_at?->diffForHumans() ?? '',
                        'is_read' => (bool) $msg->is_read,
                    ];
                });

            return response()->json([
                'success' => true,
                'conversation_id' => $conversation->id,
                'partner' => [
                    'id' => $partner?->id,
                    'name' => $partnerProfile?->display_name ?: ($partner?->name ?: 'Thành viên'),
                    'avatar' => $partnerProfile?->avatar_url ? asset($partnerProfile->avatar_url) : asset('themes/ehenho/images/df_picture.png'),
                    'profile_url' => route('ehenho.profile.show', $partnerProfile?->slug ?: ($partnerProfile?->id ?: ($partner?->id ?? 1))),
                    'meta' => ($partnerProfile?->age ? $partnerProfile->age.' tuổi' : '').($partnerProfile?->province_name ? ' • '.$partnerProfile->province_name : ''),
                    'is_online' => (bool) ($partnerProfile?->is_online ?? true),
                ],
                'messages' => $messages,
            ]);
        }

        return redirect()->route('ehenho.messages.inbox', ['conversation_id' => $conversation->id]);
    }

    /**
     * Poll for incoming new messages in a conversation (Real-time AJAX)
     */
    public function poll(int $id, Request $request): JsonResponse
    {
        $userId = auth()->id();
        $lastId = (int) $request->input('last_id', 0);

        $conversation = Conversation::where('id', $id)
            ->where(function ($q) use ($userId) {
                $q->where('user_one_id', $userId)->orWhere('user_two_id', $userId);
            })
            ->firstOrFail();

        $newMessages = Message::where('conversation_id', $conversation->id)
            ->where('id', '>', $lastId)
            ->orderBy('id', 'asc')
            ->get();

        // Mark incoming messages as read
        Message::where('conversation_id', $conversation->id)
            ->where('recipient_id', $userId)
            ->where('id', '>', $lastId)
            ->where('is_read', false)
            ->update(['is_read' => true, 'read_at' => now()]);

        $formatted = $newMessages->map(function ($msg) use ($userId) {
            return [
                'id' => $msg->id,
                'sender_id' => $msg->sender_id,
                'is_mine' => ($msg->sender_id === $userId),
                'body' => $msg->body,
                'time' => $msg->created_at?->format('H:i') ?? '',
                'created_at_human' => $msg->created_at?->diffForHumans() ?? '',
                'is_read' => (bool) $msg->is_read,
            ];
        });

        $totalUnread = Message::where('recipient_id', $userId)->where('is_read', false)->count();

        return response()->json([
            'success' => true,
            'new_messages' => $formatted,
            'total_unread' => $totalUnread,
        ]);
    }

    /**
     * Compose view
     */
    public function compose(Request $request): View
    {
        $toUserId = (int) $request->input('to');
        $recipient = User::findOrFail($toUserId);

        return view('themes.ehenho.pages.messages.compose', compact('recipient'));
    }

    /**
     * Store and send message (Supports both AJAX and standard POST)
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string|max:5000',
        ]);

        $senderId = auth()->id();
        $recipientId = (int) $validated['recipient_id'];

        if ($senderId === $recipientId) {
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Không thể tự gửi tin nhắn cho chính mình.'], 422);
            }

            return back()->with('error', 'Không thể tự gửi tin nhắn cho chính mình.');
        }

        // Check if user is blocked (either sender blocked recipient, or recipient blocked sender)
        $recipientProfile = Profile::where('user_id', $recipientId)->first();
        $senderProfile = Profile::where('user_id', $senderId)->first();

        $senderBlockedRecipient = $recipientProfile && SocialConnection::where('user_id', $senderId)
            ->where('target_profile_id', $recipientProfile->id)
            ->where('relation_type', 'block')
            ->exists();

        $recipientBlockedSender = $senderProfile && SocialConnection::where('user_id', $recipientId)
            ->where('target_profile_id', $senderProfile->id)
            ->where('relation_type', 'block')
            ->exists();

        if ($senderBlockedRecipient || $recipientBlockedSender) {
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Không thể gửi tin nhắn vì người dùng này đã bị chặn.'], 403);
            }

            return back()->with('error', 'Không thể gửi tin nhắn vì người dùng này đã bị chặn.');
        }

        // Find or create conversation
        $conversation = Conversation::where(function ($q) use ($senderId, $recipientId) {
            $q->where('user_one_id', $senderId)->where('user_two_id', $recipientId);
        })->orWhere(function ($q) use ($senderId, $recipientId) {
            $q->where('user_one_id', $recipientId)->where('user_two_id', $senderId);
        })->first();

        if (! $conversation) {
            $conversation = Conversation::create([
                'project_id' => $this->getCurrentProjectId(),
                'user_one_id' => $senderId,
                'user_two_id' => $recipientId,
                'last_message_at' => now(),
            ]);
        } else {
            $conversation->update(['last_message_at' => now()]);
        }

        $message = Message::create([
            'project_id' => $this->getCurrentProjectId(),
            'conversation_id' => $conversation->id,
            'sender_id' => $senderId,
            'recipient_id' => $recipientId,
            'subject' => $validated['subject'] ?? 'Tin nhắn từ eHenho',
            'body' => $validated['body'],
            'is_read' => false,
        ]);

        if ($request->ajax() || $request->expectsJson()) {
            return response()->json([
                'success' => true,
                'conversation_id' => $conversation->id,
                'message' => [
                    'id' => $message->id,
                    'conversation_id' => $conversation->id,
                    'sender_id' => $senderId,
                    'recipient_id' => $recipientId,
                    'body' => $message->body,
                    'time' => $message->created_at?->format('H:i') ?? '',
                    'created_at_human' => 'Vừa xong',
                    'is_mine' => true,
                    'is_read' => false,
                ],
            ]);
        }

        return redirect()->route('ehenho.messages.inbox', ['conversation_id' => $conversation->id])
            ->with('success', 'Đã gửi tin nhắn thành công!');
    }

    /**
     * Delete message
     */
    public function destroy(int $id, Request $request): RedirectResponse|JsonResponse
    {
        $userId = auth()->id();
        $message = Message::where('id', $id)
            ->where(function ($q) use ($userId) {
                $q->where('sender_id', $userId)->orWhere('recipient_id', $userId);
            })
            ->firstOrFail();

        $message->delete();

        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Đã xóa tin nhắn.']);
        }

        return back()->with('success', 'Đã xóa tin nhắn.');
    }
}
