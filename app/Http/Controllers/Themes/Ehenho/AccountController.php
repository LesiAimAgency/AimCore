<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function password(): View
    {
        return view('themes.ehenho.pages.account.password');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (! Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function settings(): View
    {
        $user = auth()->user();

        return view('themes.ehenho.pages.account.settings', compact('user'));
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        return back()->with('success', 'Đã lưu thiết lập tài khoản thành công!');
    }

    public function emails(): View
    {
        $user = auth()->user();

        return view('themes.ehenho.pages.account.emails', compact('user'));
    }
}
