<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\SocialConnection;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function likes(): View
    {
        $userId = auth()->id();
        $myProfileIds = Profile::where('user_id', $userId)->pluck('id')->toArray();

        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'like')
            ->whereNotIn('target_profile_id', $myProfileIds)
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Người Bạn Đã Thích';
        $activeTab = 'likes';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function bookmarks(): View
    {
        $userId = auth()->id();
        $myProfileIds = Profile::where('user_id', $userId)->pluck('id')->toArray();

        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'bookmark')
            ->whereNotIn('target_profile_id', $myProfileIds)
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Hồ Sơ Bạn Đã Lưu';
        $activeTab = 'bookmarks';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function blocked(): View
    {
        $userId = auth()->id();
        $myProfileIds = Profile::where('user_id', $userId)->pluck('id')->toArray();

        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'block')
            ->whereNotIn('target_profile_id', $myProfileIds)
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Danh Sách Người Bị Chặn';
        $activeTab = 'blocked';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function contacts(): View
    {
        $userId = auth()->id();
        $myProfileIds = Profile::where('user_id', $userId)->pluck('id')->toArray();

        $targetIds = SocialConnection::where('user_id', $userId)
            ->where('relation_type', 'contact')
            ->whereNotIn('target_profile_id', $myProfileIds)
            ->pluck('target_profile_id');

        $profiles = Profile::whereIn('id', $targetIds)->paginate(16);
        $pageTitle = 'Danh Bạ Kết Nối Của Bạn';
        $activeTab = 'contacts';

        return view('themes.ehenho.pages.social.index', compact('profiles', 'pageTitle', 'activeTab'));
    }

    public function toggle(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'type' => 'required|in:like,bookmark,block,contact',
        ]);

        $userId = auth()->id();
        $profileId = (int) $validated['profile_id'];
        $type = $validated['type'];

        $targetProfile = Profile::findOrFail($profileId);
        $myProfileIds = Profile::where('user_id', $userId)->pluck('id')->toArray();

        if (($targetProfile->user_id && (int) $targetProfile->user_id === (int) $userId) || in_array($profileId, $myProfileIds, true)) {
            $errMessage = 'Bạn không thể tự chặn hoặc tương tác trên chính hồ sơ của mình.';
            if ($request->wantsJson()) {
                return response()->json(['status' => 'error', 'message' => $errMessage], 422);
            }

            return back()->with('error', $errMessage);
        }

        // The person who is blocked cannot unblock or interact with the blocker
        if ($targetProfile->user_id) {
            $isBlockedByTarget = SocialConnection::where('user_id', $targetProfile->user_id)
                ->whereIn('target_profile_id', $myProfileIds)
                ->where('relation_type', 'block')
                ->exists();

            if ($isBlockedByTarget) {
                $errMessage = 'Bạn đã bị người này chặn nên không thể tương tác hoặc mở chặn (chỉ người chặn mới có quyền mở chặn).';
                if ($request->wantsJson()) {
                    return response()->json(['status' => 'error', 'message' => $errMessage], 403);
                }

                return back()->with('error', $errMessage);
            }
        }

        $existing = SocialConnection::where('user_id', $userId)
            ->where('target_profile_id', $profileId)
            ->where('relation_type', $type)
            ->first();

        if ($existing) {
            $existing->delete();
            $status = 'removed';
            $msg = match ($type) {
                'like' => 'Đã bỏ thích hồ sơ.',
                'bookmark' => 'Đã bỏ lưu hồ sơ khỏi danh sách quan tâm.',
                'block' => 'Đã bỏ chặn hồ sơ này thành công.',
                default => 'Đã hủy '.$type,
            };
        } else {
            SocialConnection::create([
                'project_id' => $this->getCurrentProjectId(),
                'user_id' => $userId,
                'target_profile_id' => $profileId,
                'relation_type' => $type,
                'created_at' => now(),
            ]);
            $status = 'added';
            $msg = match ($type) {
                'like' => 'Đã thích hồ sơ này!',
                'bookmark' => 'Đã lưu hồ sơ vào danh sách quan tâm!',
                'block' => 'Đã chặn hồ sơ này thành công. Người này sẽ không thể liên lạc với bạn.',
                default => 'Đã thêm vào '.$type,
            };
        }

        if ($request->wantsJson()) {
            return response()->json(['status' => $status, 'message' => $msg]);
        }

        return back()->with('success', $msg);
    }

    private function getCurrentProjectId(): int
    {
        if (app()->bound('current_project_id')) {
            return (int) app('current_project_id');
        }

        if (session()->has('current_project_id')) {
            return (int) session('current_project_id');
        }

        $project = Project::where('code', 'ehenho')->first();

        return $project ? $project->id : 16;
    }
}
