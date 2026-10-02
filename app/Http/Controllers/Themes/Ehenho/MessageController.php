<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Conversation;
use App\Models\Ehenho\Message;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function inbox(): View
    {
        $userId = auth()->id();
        $messages = Message::where('recipient_id', $userId)
            ->with(['sender.profile'])
            ->latest()
            ->paginate(15);

        return view('themes.ehenho.pages.messages.inbox', compact('messages'));
    }

    public function sent(): View
    {
        $userId = auth()->id();
        $messages = Message::where('sender_id', $userId)
            ->with(['recipient.profile'])
            ->latest()
            ->paginate(15);

        return view('themes.ehenho.pages.messages.sent', compact('messages'));
    }

    public function show(string $id): View
    {
        $userId = auth()->id();

        // Conversation ID or Message ID
        $conversation = Conversation::where('id', (int) $id)
            ->where(function ($q) use ($userId) {
                $q->where('user_one_id', $userId)->orWhere('user_two_id', $userId);
            })
            ->first();

        if ($conversation) {
            $messages = $conversation->messages()->with(['sender.profile', 'recipient.profile'])->get();
            $partnerId = ($conversation->user_one_id === $userId) ? $conversation->user_two_id : $conversation->user_one_id;
            $partner = User::find($partnerId);

            // Mark received messages as read
            Message::where('conversation_id', $conversation->id)
                ->where('recipient_id', $userId)
                ->where('is_read', false)
                ->update(['is_read' => true, 'read_at' => now()]);
        } else {
            // Find message directly
            $msg = Message::where('id', (int) $id)
                ->where(function ($q) use ($userId) {
                    $q->where('sender_id', $userId)->orWhere('recipient_id', $userId);
                })
                ->firstOrFail();

            $messages = collect([$msg]);
            $partnerId = ($msg->sender_id === $userId) ? $msg->recipient_id : $msg->sender_id;
            $partner = User::find($partnerId);

            if ($msg->recipient_id === $userId && ! $msg->is_read) {
                $msg->update(['is_read' => true, 'read_at' => now()]);
            }
        }

        return view('themes.ehenho.pages.messages.show', compact('messages', 'partner', 'conversation'));
    }

    public function compose(Request $request): View
    {
        $toUserId = (int) $request->input('to');
        $recipient = User::findOrFail($toUserId);

        return view('themes.ehenho.pages.messages.compose', compact('recipient'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string|max:5000',
        ]);

        $senderId = auth()->id();
        $recipientId = (int) $validated['recipient_id'];

        if ($senderId === $recipientId) {
            return back()->with('error', 'Không thể tự gửi tin nhắn cho chính mình.');
        }

        // Find or create conversation
        $conversation = Conversation::where(function ($q) use ($senderId, $recipientId) {
            $q->where('user_one_id', $senderId)->where('user_two_id', $recipientId);
        })->orWhere(function ($q) use ($senderId, $recipientId) {
            $q->where('user_one_id', $recipientId)->where('user_two_id', $senderId);
        })->first();

        if (! $conversation) {
            $conversation = Conversation::create([
                'user_one_id' => $senderId,
                'user_two_id' => $recipientId,
                'last_message_at' => now(),
            ]);
        } else {
            $conversation->update(['last_message_at' => now()]);
        }

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $senderId,
            'recipient_id' => $recipientId,
            'subject' => $validated['subject'] ?? 'Tin nhắn từ eHenho',
            'body' => $validated['body'],
            'is_read' => false,
        ]);

        return redirect()->route('ehenho.messages.inbox')->with('success', 'Đã gửi tin nhắn thành công!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $userId = auth()->id();
        $message = Message::where('id', $id)
            ->where(function ($q) use ($userId) {
                $q->where('sender_id', $userId)->orWhere('recipient_id', $userId);
            })
            ->firstOrFail();

        $message->delete();

        return back()->with('success', 'Đã xóa tin nhắn.');
    }
}
