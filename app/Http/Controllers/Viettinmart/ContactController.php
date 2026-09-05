<?php

namespace App\Http\Controllers\Viettinmart;

use App\Mail\ContactAutoReplyMail;
use App\Mail\ContactFormMail;
use App\Models\Agent;
use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $locations = Agent::active()->orderBy('name')->get();
        $primaryLocation = $locations->first();

        return view('contact.index', compact('locations', 'primaryLocation'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:10',
        ]);

        // Lưu form submission vào database
        $sanitizedData = [
            'name' => sanitize_user_input($request->name),
            'email' => $request->email, // Email is already validated
            'subject' => sanitize_user_input($request->subject),
            'message' => sanitize_user_input($request->message),
            'type' => 'contact',
        ];

        FormSubmission::create([
            'data' => $sanitizedData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'source' => 'contact_page',
            'submitted_at' => now(),
        ]);

        // Gửi email thông báo và auto-reply (nếu cấu hình)
        try {
            // Gửi email thông báo cho admin - Use sanitized data
            if (setting('contact_email_enabled', false) && setting('admin_email')) {
                Mail::to(setting('admin_email'))->send(new ContactFormMail($sanitizedData));
            }

            // Gửi email xác nhận cho khách hàng
            if (setting('contact_auto_reply', false)) {
                Mail::to($request->email)->send(new ContactAutoReplyMail($sanitizedData['name'], $sanitizedData['subject']));
            }
        } catch (\Exception $e) {
            \Log::error('Contact form email error: '.$e->getMessage());
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi trong vòng 24 giờ.',
            ]);
        }

        return back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi trong vòng 24 giờ.');
    }
}
