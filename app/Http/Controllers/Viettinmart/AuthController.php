<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Đăng nhập thành công!',
                    'redirect' => session()->pull('url.intended', locale_route('home')),
                ]);
            }

            return redirect()->intended(locale_route('home'))->with('success', 'Đăng nhập thành công!');
        }

        if ($request->expectsJson()) {
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
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()],
        ]);

        $user = User::create([
            'name' => sanitize_user_input($request->name),
            'email' => $request->email, // Email already validated
            'password' => $request->password, // Laravel 11/12 'hashed' cast will handle this automatically
        ]);

        Auth::login($user);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký tài khoản thành công! Chào mừng bạn đến với VietTinMart.',
                'redirect' => locale_route('home'),
            ]);
        }

        return redirect(locale_route('home'))->with('success', 'Đăng ký tài khoản thành công! Chào mừng bạn đến với VietTinMart.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng xuất thành công!',
                'redirect' => locale_route('home'),
            ]);
        }

        return redirect(locale_route('home'))->with('success', 'Đăng xuất thành công!');
    }

    public function profile()
    {
        $user = Auth::user();
        if (! $user) {
            return redirect(locale_route('login'))
                ->with('info', 'Vui lòng đăng nhập để xem thông tin tài khoản.');
        }

        $orders = $user->orders()->with('items')->latest()->take(10)->get();

        return view('account.profile', compact('user', 'orders'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if (! $user) {
            return redirect(locale_route('login'))
                ->with('info', 'Vui lòng đăng nhập để cập nhật thông tin.');
        }

        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'province_code' => 'nullable|string',
            'ward_code' => 'nullable|string',
            'address_detail' => 'nullable|string',
        ];

        // Password change logic
        if ($request->filled('password')) {
            $rules['current_password'] = [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (! Hash::check($value, $user->password)) {
                        $fail('Mật khẩu hiện tại không chính xác.');
                    }
                },
            ];
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $request->validate($rules);

        $data = [
            'name' => sanitize_user_input($request->name),
            'email' => $request->email, // Email already validated
            'phone' => sanitize_user_input($request->phone),
            'address' => sanitize_user_input($request->address),
            'province_code' => sanitize_user_input($request->province_code),
            'ward_code' => sanitize_user_input($request->ward_code),
            'address_detail' => sanitize_user_input($request->address_detail),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Cập nhật thông tin thành công!']);
        }

        return back()->with('success', 'Cập nhật thông tin thành công!');
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);

        return view('account.orders', compact('orders'));
    }

    public function orderDetail(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);

        // Redirect to profile page since we handle order details via AJAX now
        return redirect(locale_route('profile'))->with('info', 'Vui lòng xem chi tiết đơn hàng trong trang tài khoản.');
    }

    public function orderDetailAjax(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);
        $order->load(['items.product', 'statusHistories']);

        $html = view('account.partials.order-detail-content', compact('order'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
}
