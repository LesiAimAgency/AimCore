<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\FormSubmission;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Lưu newsletter subscription vào database
        FormSubmission::create([
            'data' => [
                'email' => $request->email,
                'type' => 'newsletter',
            ],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'source' => 'newsletter_form',
            'submitted_at' => now(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn bạn đã đăng ký nhận tin! Chúng tôi sẽ gửi những thông tin hữu ích nhất đến email của bạn.',
            ]);
        }

        return back()->with('success', 'Cảm ơn bạn đã đăng ký nhận tin! Chúng tôi sẽ gửi những thông tin hữu ích nhất đến email của bạn.');
    }
}
