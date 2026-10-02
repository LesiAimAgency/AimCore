<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('themes.ehenho.pages.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('ehenho.account.my_profile'))->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Địa chỉ email hoặc mật khẩu không chính xác.',
        ])->onlyInput('email');
    }

    public function showRegister(): View
    {
        $provinces = Province::orderBy('name')->get();

        return view('themes.ehenho.pages.auth.register', compact('provinces'));
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:18|max:80',
            'province_id' => 'nullable|exists:ehenho_provinces,id',
            'terms' => 'accepted',
        ], [
            'terms.accepted' => 'Bạn phải đồng ý với Điều khoản sử dụng của eHenho.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'level' => 1,
        ]);

        $provinceName = null;
        if (! empty($validated['province_id'])) {
            $province = Province::find($validated['province_id']);
            $provinceName = $province?->name;
        }

        Profile::create([
            'user_id' => $user->id,
            'display_name' => $validated['name'],
            'gender' => $validated['gender'],
            'age' => (int) $validated['age'],
            'province_id' => $validated['province_id'] ?? null,
            'province_name' => $provinceName,
            'status' => 'active',
            'is_online' => true,
            'last_active_at' => now(),
        ]);

        Auth::login($user);

        return redirect()->route('ehenho.account.profile_edit')->with('success', 'Đăng ký thành công! Hãy hoàn thiện hồ sơ của bạn.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ehenho.home')->with('success', 'Bạn đã đăng xuất thành công.');
    }

    public function showForgotPassword(): View
    {
        return view('themes.ehenho.pages.auth.password_reset');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        return back()->with('success', 'Nếu email của bạn tồn tại trong hệ thống, hướng dẫn đặt lại mật khẩu đã được gửi đi.');
    }
}
