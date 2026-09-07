<?php

namespace App\Http\Controllers\Wkcomputer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wkcomputer\WkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Đăng nhập thành công!',
                    'redirect' => session()->pull('url.intended', route('home')),
                ]);
            }

            return redirect()->intended(route('home'))->with('success', 'Đăng nhập thành công!');
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Email hoặc mật khẩu không đúng.',
            ], 422);
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = User::create([
            'name' => trim(strip_tags((string) $request->name)),
            'email' => trim($request->email),
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký tài khoản thành công! Chào mừng bạn đến với WKcomputer.',
                'redirect' => route('home'),
            ]);
        }

        return redirect()->route('home')->with('success', 'Đăng ký tài khoản thành công!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng xuất thành công!',
                'redirect' => route('home'),
            ]);
        }

        return redirect()->route('home')->with('success', 'Đăng xuất thành công!');
    }

    public function profile()
    {
        $user = Auth::user();
        $orders = WkOrder::where('user_id', Auth::id())->with('items')->latest()->take(10)->get();

        return view('account.profile', compact('user', 'orders'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
        ];

        $request->validate($rules);

        $user->update([
            'name' => trim(strip_tags((string) $request->name)),
            'email' => trim($request->email),
            'phone' => trim(strip_tags((string) $request->phone)),
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Cập nhật thông tin thành công!']);
        }

        return back()->with('success', 'Cập nhật thông tin thành công!');
    }

    public function orders()
    {
        $orders = WkOrder::where('user_id', Auth::id())->latest()->paginate(10);

        return view('account.orders', compact('orders'));
    }

    public function orderDetail(WkOrder $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);
        $order->load('items.product');

        return view('account.order-detail', compact('order'));
    }

    public function orderDetailAjax(WkOrder $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);
        $order->load('items.product');
        $html = view('account.partials.order-detail-content', compact('order'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
}
