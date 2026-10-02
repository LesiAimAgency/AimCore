<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function show(string $id): View
    {
        $profile = Profile::where('slug', $id)
            ->orWhere('id', (int) $id)
            ->firstOrFail();

        $relatedProfiles = Profile::where('status', 'active')
            ->where('id', '!=', $profile->id)
            ->where('gender', $profile->gender)
            ->latest()
            ->take(6)
            ->get();

        return view('themes.ehenho.pages.profile.detail', compact('profile', 'relatedProfiles'));
    }

    public function myProfile(): View
    {
        $user = auth()->user();
        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'display_name' => $user->name ?: explode('@', $user->email)[0],
                'age' => 24,
                'gender' => 'female',
                'status' => 'active',
            ]
        );

        return view('themes.ehenho.pages.account.my_profile', compact('profile', 'user'));
    }

    public function edit(): View
    {
        $user = auth()->user();
        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'display_name' => $user->name ?: explode('@', $user->email)[0],
                'age' => 24,
                'gender' => 'female',
                'status' => 'active',
            ]
        );
        $provinces = Province::orderBy('name')->get();

        return view('themes.ehenho.pages.account.profile_edit', compact('profile', 'provinces'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $validated = $request->validate([
            'display_name' => 'required|string|max:150',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:18|max:90',
            'province_id' => 'nullable|exists:ehenho_provinces,id',
            'marital_status' => 'nullable|string|max:100',
            'occupation' => 'nullable|string|max:150',
            'height' => 'nullable|string|max:50',
            'education' => 'nullable|string|max:100',
            'about_me' => 'nullable|string|max:3000',
            'looking_for' => 'nullable|string|max:3000',
            'interests' => 'nullable|string|max:1000',
        ]);

        if (! empty($validated['province_id'])) {
            $province = Province::find($validated['province_id']);
            $validated['province_name'] = $province?->name;
        }

        $profile = Profile::where('user_id', $user->id)->first();
        if ($profile) {
            $profile->update($validated);
        } else {
            $validated['user_id'] = $user->id;
            Profile::create($validated);
        }

        return redirect()->route('ehenho.account.my_profile')->with('success', 'Cập nhật hồ sơ thành công!');
    }

    public function avatarUpload(): View
    {
        $user = auth()->user();
        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
            ['display_name' => $user->name ?: 'Member', 'status' => 'active']
        );

        return view('themes.ehenho.pages.account.avatar_upload', compact('profile'));
    }

    public function saveAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $user = auth()->user();
        $file = $request->file('avatar');

        $destinationPath = public_path('themes/ehenho/images/avatars');
        if (! File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $filename = 'avatar_'.$user->id.'_'.time().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $avatarUrl = 'themes/ehenho/images/avatars/'.$filename;

        Profile::updateOrCreate(
            ['user_id' => $user->id],
            ['avatar_url' => $avatarUrl]
        );

        return redirect()->route('ehenho.account.my_profile')->with('success', 'Tải lên ảnh đại diện thành công!');
    }
}
