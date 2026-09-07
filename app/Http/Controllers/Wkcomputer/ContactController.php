<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $showroomsSetting = setting('showrooms', '[]');
        $locations = is_string($showroomsSetting) ? json_decode($showroomsSetting, true) : $showroomsSetting;
        $primaryLocation = is_array($locations) && count($locations) > 0 ? $locations[0] : null;

        return view('pages.contact', compact('locations', 'primaryLocation'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|min:5|max:2000',
        ]);

        $tenantId = session('current_tenant_id') ?? config('multitenancy.current_tenant_id', 4);
        $projectId = config('multitenancy.current_project_id', 14);

        FormSubmission::create([
            'project_id' => $projectId,
            'tenant_id' => $tenantId,
            'form_name' => 'Liên hệ',
            'data' => [
                'name' => strip_tags($request->name),
                'email' => $request->email,
                'subject' => strip_tags($request->subject ?? ''),
                'message' => strip_tags($request->message),
            ],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending',
            'source' => 'contact',
            'submitted_at' => now(),
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn bạn đã liên hệ! WKcomputer sẽ phản hồi sớm nhất có thể.',
            ]);
        }

        return back()->with('success', 'Cảm ơn bạn đã liên hệ! WKcomputer sẽ phản hồi sớm nhất có thể.');
    }
}
