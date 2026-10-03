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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
                    ->orWhere('province_name', 'like', "%{$search}%")
                    ->orWhere('district_name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($gender = $request->input('gender')) {
            $query->where('gender', $gender);
        }

        if ($province = $request->input('province')) {
            $query->where(function ($q) use ($province) {
                $q->where('province_name', 'like', "%{$province}%")
                    ->orWhere('province_id', $province);
            });
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
            'slug' => 'nullable|string|max:150|unique:profiles,slug,'.$profile->id,
            'headline' => 'nullable|string|max:255',
            'target_type' => 'nullable|string|max:100',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|between:18,99',
            'birthday' => 'nullable|date',
            'province_id' => 'nullable|exists:provinces,id',
            'province_name' => 'nullable|string|max:100',
            'district_name' => 'nullable|string|max:150',
            'marital_status' => 'nullable|string|max:100',
            'occupation' => 'nullable|string|max:150',
            'height' => 'nullable|string|max:50',
            'weight' => 'nullable|string|max:50',
            'education' => 'nullable|string|max:100',
            'body_type' => 'nullable|string|max:100',
            'interests' => 'nullable|string|max:2000',
            'personality' => 'nullable|string|max:150',
            'lifestyle' => 'nullable|string|max:150',
            'precious' => 'nullable|string|max:150',
            'religion' => 'nullable|string|max:100',
            'smoking' => 'nullable|string|max:100',
            'drinking' => 'nullable|string|max:100',
            'children' => 'nullable|string|max:100',
            'about_me' => 'nullable|string|max:10000',
            'looking_for' => 'nullable|string|max:10000',
            'privacy_option' => 'nullable|string|max:255',
            'status' => 'required|in:active,pending,blocked',
            'is_featured' => 'nullable',
            'is_online' => 'nullable',
            'last_active_at' => 'nullable|date',
            'avatar_url' => 'nullable|string|max:500',
            'avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ]);

        if (! empty($validated['province_id'])) {
            $province = Province::find($validated['province_id']);
            $validated['province_name'] = $province?->name ?? ($validated['province_name'] ?? null);
        } elseif (! empty($validated['province_name'])) {
            $matchedProv = Province::where('name', $validated['province_name'])->first();
            if ($matchedProv) {
                $validated['province_id'] = $matchedProv->id;
            }
        }

        if (empty($validated['slug']) && ! empty($validated['display_name'])) {
            $validated['slug'] = Str::slug($validated['display_name']).'-'.$profile->id;
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_online'] = $request->boolean('is_online');

        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $destinationPath = public_path('themes/ehenho/images/avatars');
            if (! File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $filename = 'avatar_'.($profile->user_id ?: 'admin_'.$profile->id).'_'.time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $validated['avatar_url'] = 'themes/ehenho/images/avatars/'.$filename;
        }
        unset($validated['avatar_file']);

        $profile->update($validated);

        return redirect()->route('project.admin.ehenho.profiles.edit', ['projectCode' => $projectCode, 'id' => $profile->id])
            ->with('success', 'Đã cập nhật toàn bộ thông tin hồ sơ thành công!');
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

        $connections = SocialConnection::with(['user', 'targetProfile'])->latest('id')->paginate(20);
        $totalConnections = SocialConnection::count();
        $totalBlocks = SocialConnection::where('relation_type', 'block')->count();
        $totalLikes = SocialConnection::where('relation_type', 'like')->count();
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
