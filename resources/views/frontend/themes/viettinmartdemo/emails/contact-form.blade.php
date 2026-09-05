<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tin nhắn liên hệ mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #2563eb;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f8fafc;
            padding: 30px;
            border: 1px solid #e2e8f0;
        }
        .footer {
            background: #1e293b;
            color: #94a3b8;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            border-radius: 0 0 8px 8px;
        }
        .info-row {
            margin-bottom: 15px;
            padding: 10px;
            background: white;
            border-radius: 6px;
            border-left: 4px solid #2563eb;
        }
        .label {
            font-weight: bold;
            color: #475569;
            margin-bottom: 5px;
        }
        .value {
            color: #1e293b;
        }
        .message-content {
            background: white;
            padding: 20px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            white-space: pre-wrap;
            font-family: inherit;
        }
        .meta-info {
            font-size: 12px;
            color: #64748b;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin: 0; font-size: 24px;">📧 Tin nhắn liên hệ mới</h1>
        <p style="margin: 5px 0 0 0; opacity: 0.9;">Từ website {{ setting('site_name', 'VietTinMart') }}</p>
    </div>

    <div class="content">
        <div class="info-row">
            <div class="label">👤 Họ và tên:</div>
            <div class="value">{{ $name }}</div>
        </div>

        <div class="info-row">
            <div class="label">📧 Email:</div>
            <div class="value">
                <a href="mailto:{{ $email }}" style="color: #2563eb; text-decoration: none;">{{ $email }}</a>
            </div>
        </div>

        <div class="info-row">
            <div class="label">📝 Chủ đề:</div>
            <div class="value">{{ $subject }}</div>
        </div>

        <div class="info-row">
            <div class="label">💬 Nội dung tin nhắn:</div>
            <div class="message-content">{{ $message }}</div>
        </div>

        <div class="meta-info">
            <strong>Thông tin bổ sung:</strong><br>
            🕒 Thời gian: {{ $submitted_at }}<br>
            🌐 IP Address: {{ $ip_address }}<br>
            🔗 Nguồn: Form liên hệ trên website
        </div>
    </div>

    <div class="footer">
        <p style="margin: 0;">
            Email này được gửi tự động từ hệ thống website {{ setting('site_name', 'VietTinMart') }}<br>
            Vui lòng không trả lời email này. Để trả lời khách hàng, hãy gửi email trực tiếp đến: {{ $email }}
        </p>
    </div>
</body>
</html>