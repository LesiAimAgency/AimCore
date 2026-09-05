<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_setting('site_name', 'VietTin Mart') }} — Đang bảo trì</title>
    <link rel="stylesheet" href="{{ asset('theme/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
</head>
<body>
<div class="rts-error-area rts-section-gap" style="min-height:100vh;display:flex;align-items:center;justify-content:center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <i class="fa-solid fa-screwdriver-wrench" style="font-size:64px;color:#f59e0b;margin-bottom:24px;display:block;"></i>
                <h1 style="font-size:32px;font-weight:800;margin-bottom:16px;">Website đang bảo trì</h1>
                <p style="font-size:16px;color:#64748b;margin-bottom:32px;line-height:1.7;">
                    Chúng tôi đang nâng cấp hệ thống để phục vụ bạn tốt hơn.<br>
                    Vui lòng quay lại sau ít phút.
                </p>
                @if(get_setting('maintenance_message'))
                    <p style="font-size:14px;color:#94a3b8;padding:16px;background:#f8fafc;border-radius:12px;border:1px solid #e2e8f0;">
                        {{ get_setting('maintenance_message') }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
