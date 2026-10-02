<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\SocialConnection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function likes(): View
    {
        $userId = auth()->id();
        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'like')
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Người Bạn Đã Thích';
        $activeTab = 'likes';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function bookmarks(): View
    {
        $userId = auth()->id();
        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'bookmark')
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Hồ Sơ Bạn Đã Lưu';
        $activeTab = 'bookmarks';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function blocked(): View
    {
        $userId = auth()->id();
        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'block')
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Danh Sách Người Bị Chặn';
        $activeTab = 'blocked';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function contacts(): View
    {
        $userId = auth()->id();
        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'contact')
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Danh Bạ Kết Nối Của Bạn';
        $activeTab = 'contacts';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function toggle(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'profile_id' => 'required|exists:ehenho_profiles,id',
            'type' => 'required|in:like,bookmark,block,contact',
        ]);

        $userId = auth()->id();
        $profileId = (int) $validated['profile_id'];
        $type = $validated['type'];

        $existing = SocialConnection::where('user_id', $userId)
            ->where('target_profile_id', $profileId)
            ->where('relation_type', $type)
            ->first();

        if ($existing) {
            $existing->delete();
            $status = 'removed';
            $msg = 'Đã hủy '.$type;
        } else {
            SocialConnection::create([
                'user_id' => $userId,
                'target_profile_id' => $profileId,
                'relation_type' => $type,
                'created_at' => now(),
            ]);
            $status = 'added';
            $msg = 'Đã thêm vào '.$type;
        }

        if ($request->wantsJson()) {
            return response()->json(['status' => $status, 'message' => $msg]);
        }

        return back()->with('success', $msg);
    }
}
