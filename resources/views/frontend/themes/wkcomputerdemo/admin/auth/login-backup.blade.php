<!DOCTYPE html>
<html lang="vi" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ setting('site_name', 'Workspace') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/admin-complete.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { font-family: Inter, "Segoe UI", sans-serif; margin: 0; }
        .login-container { min-height: 100vh; background: #020617; display: flex; align-items: center; justify-content: center; padding: 1rem; }
        .login-card { width: 100%; max-width: 24rem; }
        .logo-section { text-align: center; margin-bottom: 2rem; }
        .logo-icon { display: inline-flex; align-items: center; justify-content: center; width: 4rem; height: 4rem; background: #2563eb; border-radius: 1rem; box-shadow: 0 25px 50px -12px rgba(37, 99, 235, .35); margin-bottom: 1rem; }
        .logo-icon i { color: #fff; font-size: 1.5rem; }
        .logo-title { font-size: 1.5rem; font-weight: 700; color: #fff; margin: 0; }
        .logo-subtitle { color: #94a3b8; font-size: .875rem; margin: .25rem 0 0; }
        .form-card { background: #0f172a; border-radius: 1rem; padding: 2rem; border: 1px solid #1e293b; box-shadow: 0 25px 50px -12px rgba(0,0,0,.25); }
        .error-message { display: flex; align-items: flex-start; gap: .75rem; background: rgba(239,68,68,.1); border: 1px solid rgba(239,68,68,.3); color: #f87171; font-size: .875rem; padding: .75rem 1rem; border-radius: .75rem; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1.25rem; }
        .form-label { display: block; font-size: .875rem; font-weight: 500; color: #cbd5e1; margin-bottom: .375rem; }
        .form-label i { color: #475569; margin-right: .375rem; }
        .form-input { width: 100%; background: #1e293b; border: 1px solid #334155; color: #fff; font-size: .875rem; border-radius: .75rem; padding: .75rem 1rem; transition: all .15s; }
        .form-input::placeholder { color: #475569; }
        .form-input:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,.5); }
        .checkbox-group { display: flex; align-items: center; gap: .5rem; margin-bottom: 1.25rem; }
        .checkbox-label { font-size: .875rem; color: #94a3b8; cursor: pointer; }
        .submit-btn { width: 100%; background: #2563eb; color: #fff; font-weight: 600; font-size: .875rem; padding: .75rem; border-radius: .75rem; display: flex; align-items: center; justify-content: center; gap: .5rem; border: 0; cursor: pointer; }
        .submit-btn:hover { background: #1d4ed8; }
        .footer-text { text-align: center; font-size: .75rem; color: #475569; margin-top: 1.5rem; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-section">
                <div class="logo-icon"><i class="fa-solid fa-layer-group"></i></div>
                <h1 class="logo-title">{{ setting('site_name', 'Workspace') }}</h1>
                <p class="logo-subtitle">One Page Admin</p>
            </div>

            <div class="form-card">
                @if($errors->any())
                    <div class="error-message">
                        <i class="fa-solid fa-circle-xmark"></i>
                        <span>@foreach($errors->all() as $e){{ $e }}@endforeach</span>
                    </div>
                @endif

                <form method="POST" action="{{ locale_route('admin.login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label"><i class="fa-solid fa-envelope"></i>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@workspace.local" class="form-input">
                    </div>
                    <div class="form-group">
                        <label class="form-label"><i class="fa-solid fa-lock"></i>Password</label>
                        <input type="password" name="password" required placeholder="********" class="form-input">
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="checkbox-label">Remember me</label>
                    </div>
                    <button type="submit" class="submit-btn">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </button>
                </form>
            </div>

            <p class="footer-text">&copy; {{ date('Y') }} {{ setting('site_name', 'Workspace') }}.</p>
        </div>
    </div>
</body>
</html>
