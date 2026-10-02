<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Conversation;
use App\Models\Ehenho\Message;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use App\Models\Ehenho\SocialConnection;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    public function index(Request $request, string $projectCode): View
    {
        $project = Project::where('code', $projectCode)->first();

        $query = Profile::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('display_name', 'like', "%{$search}%")
                    ->orWhere('headline', 'like', "%{$search}%")
                    ->orWhere('province', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($gender = $request->input('gender')) {
            $query->where('gender', $gender);
        }

        if ($province = $request->input('province')) {
            $query->where('province', $province);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $profiles = $query->latest()->paginate(15)->withQueryString();

        $stats = [
            'total' => Profile::count(),
            'male' => Profile::where('gender', 'male')->count(),
            'female' => Profile::where('gender', 'female')->count(),
            'blocked' => Profile::where('status', 'blocked')->count(),
        ];

        $provinces = Province::orderBy('name')->get();

        return view('themes.ehenho.admin.profiles.index', compact(
            'profiles',
            'stats',
            'provinces',
            'project',
            'projectCode'
        ));
    }

    public function edit(string $projectCode, int $id): View
    {
        $project = Project::where('code', $projectCode)->first();
        $profile = Profile::findOrFail($id);
        $provinces = Province::orderBy('name')->get();

        return view('themes.ehenho.admin.profiles.edit', compact(
            'profile',
            'provinces',
            'project',
            'projectCode'
        ));
    }

    public function update(Request $request, string $projectCode, int $id): RedirectResponse
    {
        $profile = Profile::findOrFail($id);

        $validated = $request->validate([
            'display_name' => 'required|string|max:150',
            'age' => 'required|integer|between:18,90',
            'gender' => 'required|in:male,female,other',
            'province' => 'nullable|string',
            'headline' => 'nullable|string|max:255',
            'about_me' => 'nullable|string|max:10000',
            'status' => 'required|in:active,pending,blocked',
        ]);

        $profile->update($validated);

        return redirect()->route('project.admin.ehenho.profiles.index', $projectCode)
            ->with('success', 'Đã cập nhật hồ sơ thành viên thành công!');
    }

    public function toggleStatus(Request $request, string $projectCode, int $id): RedirectResponse
    {
        $profile = Profile::findOrFail($id);
        $profile->status = ($profile->status === 'blocked') ? 'active' : 'blocked';
        $profile->save();

        $statusText = ($profile->status === 'blocked') ? 'khóa' : 'kích hoạt lại';

        return back()->with('success', "Đã {$statusText} hồ sơ {$profile->display_name} thành công!");
    }

    public function destroy(string $projectCode, int $id): RedirectResponse
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('project.admin.ehenho.profiles.index', $projectCode)
            ->with('success', 'Đã xóa hồ sơ thành viên thành công!');
    }

    public function interactions(Request $request, string $projectCode): View
    {
        $project = Project::where('code', $projectCode)->first();

        $connections = SocialConnection::latest()->paginate(20);
        $totalConnections = SocialConnection::count();
        $totalBlocks = SocialConnection::where('type', 'block')->count();
        $totalLikes = SocialConnection::where('type', 'like')->count();
        $totalConversations = Conversation::count();
        $totalMessages = Message::count();

        return view('themes.ehenho.admin.interactions.index', compact(
            'connections',
            'totalConnections',
            'totalBlocks',
            'totalLikes',
            'totalConversations',
            'totalMessages',
            'project',
            'projectCode'
        ));
    }
}
