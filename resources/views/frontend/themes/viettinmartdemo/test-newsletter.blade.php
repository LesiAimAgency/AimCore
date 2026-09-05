<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Newsletter Widget</title>
    
    {{-- Giả lập CSS Ekomart cho test --}}
    <style>
        .footersubscribe-form {
            display: flex;
            gap: 10px;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        
        .footersubscribe-form input[type="email"] {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .rts-btn.btn-primary {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            white-space: nowrap;
        }
        
        .rts-btn.btn-primary:hover {
            background: #0056b3;
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 40px 20px;
            background: #f5f5f5;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        .widget-demo {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .widget-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Test Newsletter Widget</h1>
        
        <div class="widget-demo">
            <div class="widget-title">1. Newsletter Widget (Ekomart Style)</div>
            @php
                $newsletterWidget = new \App\Widgets\Types\NewsletterWidget();
                $config = [
                    'placeholder_text' => 'Your email address',
                    'button_text' => 'Subscribe',
                    'success_message' => 'Cảm ơn bạn đã đăng ký nhận tin!'
                ];
                $widget = new \App\Models\Widget();
            @endphp
            
            {!! $newsletterWidget::render($config, $widget) !!}
        </div>
        
        <div class="widget-demo">
            <div class="widget-title">2. Form Widget (Newsletter với Ekomart Style)</div>
            @php
                $formWidget = new \App\Widgets\Types\FormWidget();
                $formTemplate = \App\Models\FormTemplate::where('name', 'Đăng Ký Nhận Tin')->first();
                $config = [
                    'title' => 'Đăng ký nhận tin khuyến mãi',
                    'form_template_id' => $formTemplate?->id,
                    'show_title' => true,
                    'button_text' => 'Đăng ký ngay',
                    'success_message' => 'Cảm ơn! Bạn sẽ nhận được email khuyến mãi sớm nhất.',
                    'form_style' => 'ekomart'
                ];
            @endphp
            
            {!! $formWidget::render($config, $widget) !!}
        </div>
        
        <div class="widget-demo">
            <div class="widget-title">3. Form Widget (Contact Form - Default Style)</div>
            @php
                $contactTemplate = \App\Models\FormTemplate::where('name', 'Form Liên Hệ')->first();
                $config = [
                    'title' => 'Liên hệ với chúng tôi',
                    'form_template_id' => $contactTemplate?->id,
                    'show_title' => true,
                    'button_text' => 'Gửi tin nhắn',
                    'success_message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.',
                    'form_style' => 'card'
                ];
            @endphp
            
            {!! $formWidget::render($config, $widget) !!}
        </div>
        
        <div style="margin-top: 40px; padding: 20px; background: #e3f2fd; border-radius: 8px;">
            <h3>Hướng dẫn sử dụng:</h3>
            <ol>
                <li><strong>NewsletterWidget:</strong> Tự động sử dụng form template "Đăng Ký Nhận Tin" với style Ekomart</li>
                <li><strong>FormWidget với form_style="ekomart":</strong> Có thể dùng cho bất kỳ form nào nhưng render theo style Ekomart</li>
                <li><strong>FormWidget với style khác:</strong> Sử dụng layout tùy chỉnh</li>
            </ol>
            
            <p><strong>Lưu ý:</strong> Khi submit form, dữ liệu sẽ được lưu vào database và có thể xem trong admin panel.</p>
        </div>
    </div>
</body>
</html>