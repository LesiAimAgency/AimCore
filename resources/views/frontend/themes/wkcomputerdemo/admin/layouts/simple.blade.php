<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') | {{ setting('site_name', 'Workspace') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { font-family: Inter, sans-serif; margin: 0; background: #f1f5f9; }
        .admin-container { display: flex; height: 100vh; }
        .admin-sidebar { width: 250px; background: #0f172a; color: #fff; padding: 20px; position: relative; }
        .admin-main { flex: 1; padding: 20px; overflow-y: auto; }
        .admin-header { background: #fff; padding: 15px 20px; border-bottom: 1px solid #e2e8f0; margin-bottom: 20px; }
        .simple-nav-link { display: block; color: #fff; text-decoration: none; padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,.1); }
    </style>
</head>
<body>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div style="margin-bottom:30px;">
                <h2 style="margin:0;font-size:18px;">One Page Admin</h2>
                <p style="margin:5px 0 0;font-size:12px;opacity:.7;">{{ setting('site_name', 'Workspace') }}</p>
            </div>

            <nav>
                <a href="{{ route('admin.dashboard') }}" class="simple-nav-link"><i class="fas fa-gauge"></i> Dashboard</a>
                <a href="{{ route('admin.widgets.index') }}" class="simple-nav-link"><i class="fas fa-layer-group"></i> Workspace</a>
                <a href="{{ route('admin.contact-submissions.index') }}" class="simple-nav-link"><i class="fas fa-inbox"></i> Leads</a>
            </nav>

            <div style="position:absolute;bottom:20px;">
                <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" style="background:#dc2626;color:#fff;border:0;padding:8px 16px;border-radius:6px;cursor:pointer;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="admin-main">
            <div class="admin-header">
                <h1 style="margin:0;font-size:24px;color:#1f2937;">@yield('page-title', 'Dashboard')</h1>
            </div>

            @if(session('success'))
                <div style="background:#f0fdf4;color:#15803d;padding:12px 16px;border-radius:8px;margin-bottom:20px;border:1px solid #bbf7d0;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background:#fef2f2;color:#dc2626;padding:12px 16px;border-radius:8px;margin-bottom:20px;border:1px solid #fecaca;">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
