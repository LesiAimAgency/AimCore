<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xác nhận liên hệ</title>
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
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            padding: 30px 20px;
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
            padding: 20px;
            text-align: center;
            font-size: 13px;
            border-radius: 0 0 8px 8px;
        }
        .greeting {
            font-size: 18px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 20px;
        }
        .message-box {
            background: white;
            padding: 25px;
            border-radius: 8px;
            border-left: 4px solid #2563eb;
            margin: 20px 0;
        }
        .contact-info {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .contact-info h4 {
            color: #1e293b;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .contact-item i {
            width: 20px;
            margin-right: 10px;
            color: #2563eb;
        }
        .highlight {
            background: #eff6ff;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #bfdbfe;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin: 0; font-size: 28px;">✅ Xác nhận liên hệ</h1>
        <p style="margin: 10px 0 0 0; opacity: 0.9; font-size: 16px;">{{ $siteName }}</p>
    </div>

    <div class="content">
        <div class="greeting">
            Xin chào {{ $customerName }},
        </div>

        <div class="message-box">
            {{ $message }}
        </div>

        <div class="highlight">
            <strong>📝 Chủ đề liên hệ của bạn:</strong><br>
            "{{ $customerSubject }}"
        </div>

        <p style="color: #64748b; font-size: 14px; margin: 20px 0;">
            Chúng tôi đã nhận được tin nhắn của bạn và sẽ xem xét cẩn thận. Đội ngũ hỗ trợ khách hàng sẽ liên hệ lại với bạn trong thời gian sớm nhất.
        </p>

        @if($contactEmail || $contactPhone)
        <div class="contact-info">
            <h4>📞 Thông tin liên hệ trực tiếp:</h4>
            
            @if($contactEmail)
            <div class="contact-item">
                <i>📧</i>
                <span>Email: <a href="mailto:{{ $contactEmail }}" style="color: #2563eb;">{{ $contactEmail }}</a></span>
            </div>
            @endif
            
            @if($contactPhone)
            <div class="contact-item">
                <i>📱</i>
                <span>Hotline: <a href="tel:{{ $contactPhone }}" style="color: #2563eb;">{{ $contactPhone }}</a></span>
            </div>
            @endif
        </div>
        @endif

        <p style="color: #64748b; font-size: 13px; margin-top: 25px; font-style: italic;">
            Nếu bạn có thắc mắc gấp, vui lòng liên hệ trực tiếp qua các thông tin trên.
        </p>
    </div>

    <div class="footer">
        <p style="margin: 0 0 10px 0; font-weight: bold;">
            Cảm ơn bạn đã tin tưởng {{ $siteName }}!
        </p>
        <p style="margin: 0; font-size: 12px; opacity: 0.8;">
            Email này được gửi tự động. Vui lòng không trả lời email này.<br>
            Để liên hệ, hãy sử dụng thông tin liên hệ được cung cấp ở trên.
        </p>
    </div>
</body>
</html>