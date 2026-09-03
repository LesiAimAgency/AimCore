<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($locale = null, $slug = null)
    {
        // Handle both localized and non-localized routes
        if ($slug === null) {
            $slug = $locale;
            $locale = null;
        }

        $page = Post::pages()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
        if ($page->template && view()->exists("frontend.templates.{$page->template}")) {
            return view("frontend.templates.{$page->template}", compact('page'));
        }

        return view('frontend.page', compact('page'));
    }

    public function contact($locale = null)
    {
        return view('frontend.contact');
    }

    public function contactSubmit(Request $request, $projectCode = null, $locale = null)
    {
        // Detect INBETWEEN drawer form (uses full_name, phone, company, social_link fields)
        $isDrawerForm = $request->has('full_name') || $request->input('form_source') === 'contact_drawer';

        if ($isDrawerForm) {
            return $this->inbetweenContactSubmit($request);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'message.required' => 'Vui lòng nhập nội dung.',
        ]);

        FormSubmission::create([
            'form_name' => 'contact',
            'data' => [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'service' => $validated['service'] ?? null,
                'message' => $validated['message'],
            ],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending',
            'tenant_id' => session('current_tenant_id'),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.']);
        }

        return back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.');
    }

    /**
     * Handle INBETWEEN contact drawer form submissions (full_name, phone, company, social_link, message).
     */
    protected function inbetweenContactSubmit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'company' => 'nullable|string|max:255',
            'social_link' => 'nullable|string|max:500',
            'message' => 'nullable|string|max:5000',
        ], [
            'full_name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
        ]);

        FormSubmission::create([
            'form_name' => 'inbetween_contact',
            'data' => [
                'full_name' => $validated['full_name'],
                'phone' => $validated['phone'],
                'company' => $validated['company'] ?? null,
                'social_link' => $validated['social_link'] ?? null,
                'message' => $validated['message'] ?? null,
                'source' => $request->input('form_source', 'inbetween'),
            ],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending',
            'tenant_id' => session('current_tenant_id'),
        ]);

        return response()->json(['success' => true, 'message' => 'Cảm ơn bạn! Chúng tôi sẽ liên hệ sớm nhất.']);
    }
}
