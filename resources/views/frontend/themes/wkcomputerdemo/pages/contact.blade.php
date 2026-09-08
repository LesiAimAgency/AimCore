@extends('layouts.app')
@section('title', 'Liên hệ - WKcomputer')
@section('content')

<div class="wk-breadcrumb">
    <div class="wk-container">
        <ol>
            <li><a href="{{ url('/wkcomputer') }}"><i class="fas fa-home"></i></a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">Liên hệ</li>
        </ol>
    </div>
</div>

<div style="background:#f0f2f5;padding:32px 0 48px;">
    <div class="wk-container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px;align-items:start;">

            {{-- Info --}}
            <div>
                <h1 style="font-size:24px;font-weight:800;color:#1e293b;margin:0 0 12px;">Liên Hệ Với Chúng Tôi</h1>
                <p style="color:#64748b;font-size:14px;line-height:1.7;margin:0 0 28px;">
                    Đội ngũ chuyên gia của WKcomputer luôn sẵn sàng hỗ trợ bạn. Hãy liên hệ với chúng tôi qua các kênh dưới đây.
                </p>

                <div style="display:flex;flex-direction:column;gap:14px;margin-bottom:28px;">
                    @foreach([
                        ['fas fa-map-marker-alt', 'var(--wk-primary)', '123 Đường Công Nghệ, Quận IT, TP.HCM'],
                        ['fas fa-phone-alt', '#2e7d32', '1900 xxxx (Tư vấn mua hàng)'],
                        ['fas fa-tools', 'var(--wk-secondary)', '1900 yyyy (Bảo hành, sửa chữa)'],
                        ['fas fa-envelope', '#e65100', 'support@WKcomputer.vn'],
                        ['fas fa-clock', '#6d4c41', 'Thứ 2 - Thứ 7: 08:00 - 21:00'],
                    ] as $c)
                    <div style="display:flex;align-items:flex-start;gap:12px;">
                        <div style="width:40px;height:40px;background:{{ $c[1] }}20;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="{{ $c[0] }}" style="color:{{ $c[1] }};"></i>
                        </div>
                        <div style="font-size:13px;color:#475569;padding-top:10px;">{{ $c[2] }}</div>
                    </div>
                    @endforeach
                </div>

                {{-- Map placeholder --}}
                <div style="background:#e2e8f0;border-radius:12px;height:240px;display:flex;align-items:center;justify-content:center;font-size:13px;color:#94a3b8;flex-direction:column;gap:10px;">
                    <i class="fas fa-map-marked-alt" style="font-size:40px;color:#cbd5e1;"></i>
                    <span>Bản đồ Google Maps</span>
                    <a href="https://maps.google.com" target="_blank" style="font-size:12px;color:var(--wk-primary);">Mở Google Maps →</a>
                </div>
            </div>

            {{-- Form --}}
            <div style="background:#fff;border-radius:16px;padding:32px;border:1px solid #f1f5f9;">
                <h2 style="font-size:18px;font-weight:700;margin:0 0 20px;color:#1e293b;">Gửi tin nhắn cho chúng tôi</h2>

                @if(session('success'))
                <div style="background:#e8f5e9;border:1px solid #a5d6a7;border-radius:8px;padding:12px 16px;margin-bottom:16px;font-size:13px;color:#2e7d32;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:14px;">
                        <div>
                            <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Họ tên *</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()?->name) }}" required
                                   placeholder="Nguyễn Văn A"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;outline:none;"
                                   onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                        <div>
                            <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Số điện thoại</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                   placeholder="0901234567"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;outline:none;"
                                   onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                    </div>
                    <div style="margin-bottom:14px;">
                        <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Email *</label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()?->email) }}" required
                               placeholder="email@example.com"
                               style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;outline:none;"
                               onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                    </div>
                    <div style="margin-bottom:14px;">
                        <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Chủ đề</label>
                        <select name="subject"
                                style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;outline:none;background:#fff;"
                                onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                            <option value="buy">Tư vấn mua hàng</option>
                            <option value="warranty">Bảo hành & sửa chữa</option>
                            <option value="order">Đơn hàng</option>
                            <option value="complaint">Khiếu nại</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>
                    <div style="margin-bottom:20px;">
                        <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Nội dung *</label>
                        <textarea name="message" rows="5" required
                                  placeholder="Nội dung tin nhắn của bạn..."
                                  style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;resize:vertical;outline:none;font-family:inherit;"
                                  onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="wk-btn wk-btn-primary wk-btn-block">
                        <i class="fas fa-paper-plane"></i> Gửi tin nhắn
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
