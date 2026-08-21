<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Jobs\DeployProjectJob;
use App\Models\DeploymentHistory;
use App\Models\HostingProfile;
use App\Models\Project;
use Illuminate\Http\Request;

class HostingDeployController extends Controller
{
    public function index()
    {
        $profiles = HostingProfile::with('project')->latest()->paginate(20);

        return view('superadmin.hosting.index', compact('profiles'));
    }

    public function create(Request $request)
    {
        $projects = Project::orderBy('name')->get();
        $selectedProjectId = $request->query('project_id');

        return view('superadmin.hosting.form', compact('projects', 'selectedProjectId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'panel_type' => 'required|in:cpanel,directadmin,manual',
            'hostname' => 'required|string|max:255',
            'port' => 'required|integer',
            'cpanel_username' => 'required|string|max:255',
            'api_token' => 'required|string',
            'public_html_path' => 'nullable|string|max:255',
            'db_prefix' => 'nullable|string|max:255',
        ]);

        if (empty($validated['public_html_path'])) {
            $validated['public_html_path'] = 'public_html';
        }

        HostingProfile::create($validated);

        return redirect()->route('superadmin.hosting.index')->with('success', 'Hosting profile created successfully.');
    }

    public function edit(HostingProfile $profile)
    {
        $projects = Project::orderBy('name')->get();

        return view('superadmin.hosting.form', compact('profile', 'projects'));
    }

    public function update(Request $request, HostingProfile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'panel_type' => 'required|in:cpanel,directadmin,manual',
            'hostname' => 'required|string|max:255',
            'port' => 'required|integer',
            'cpanel_username' => 'required|string|max:255',
            'api_token' => 'nullable|string', // nullable for update
            'public_html_path' => 'nullable|string|max:255',
            'db_prefix' => 'nullable|string|max:255',
        ]);

        if (empty($validated['api_token'])) {
            unset($validated['api_token']);
        }

        if (empty($validated['public_html_path'])) {
            $validated['public_html_path'] = 'public_html';
        }

        $profile->update($validated);

        return redirect()->route('superadmin.hosting.index')->with('success', 'Hosting profile updated successfully.');
    }

    public function destroy(HostingProfile $profile)
    {
        $profile->delete();

        return redirect()->route('superadmin.hosting.index')->with('success', 'Hosting profile deleted successfully.');
    }

    public function testConnection(HostingProfile $profile)
    {
        try {
            $client = \App\Services\Hosting\HostingClientFactory::make($profile);
            $client->testConnection();
            return back()->with('success', 'Connection test passed! API is working correctly.');
        } catch (\Exception $e) {
            return back()->with('error', 'Connection test failed: ' . $e->getMessage());
        }
    }

    // --- DEPLOYMENT ACTIONS ---

    public function deployView(DeploymentHistory $history)
    {
        $profile = $history->hostingProfile;
        $project = $history->project;
        $latestHistory = $history; // Keep the variable name for the view

        return view('superadmin.hosting.deploy', compact('profile', 'latestHistory', 'project'));
    }

    public function triggerDeployMultiTenancy(Request $request, Project $project)
    {
        $validated = $request->validate([
            'hosting_profile_id' => 'required|exists:hosting_profiles,id',
            'domain' => 'required|string|max:255',
        ]);

        $profile = HostingProfile::findOrFail($validated['hosting_profile_id']);
        
        // Cập nhật external_domain cho Project
        $project->update([
            'external_domain' => $validated['domain'],
        ]);

        $history = \App\Models\DeploymentHistory::create([
            'project_id' => $project->id,
            'hosting_profile_id' => $profile->id,
            'deployed_by' => auth()->id(),
            'status' => 'pending',
            'started_at' => now(),
            // Cập nhật sau: deployment_history cũng có thể lưu cấu hình domain tùy chỉnh
        ]);

        return redirect()->route('superadmin.hosting.deploy', $history);
    }

    public function deployLogs(DeploymentHistory $history)
    {
        $logs = $history->logs()->orderBy('id')->get();

        return response()->json([
            'status' => $history->status,
            'logs' => $logs,
        ]);
    }

    public function runDeploy(DeploymentHistory $history, \App\Services\Hosting\DeploymentService $service)
    {
        if ($history->status !== 'pending') {
            return response()->json(['status' => 'error', 'message' => 'Deployment already running or finished.']);
        }

        set_time_limit(0);
        ignore_user_abort(true);

        try {
            $service->runExistingDeploy($history);
            return response()->json(['status' => 'success', 'message' => 'Deployment finished.']);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Deployment error via HTTP: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
