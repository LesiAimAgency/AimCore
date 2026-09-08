<div class="wk-footer-col {{ $config['col_class'] ?? '' }}">
    @if(!empty($title))
        <h4>{{ $title }}</h4>
    @endif

    @if($type === 'contact')
        <p style="font-size:13px;color:#9ca3af;line-height:1.6;margin-bottom:16px;">
            Hệ thống bán lẻ thiết bị công nghệ chính hãng hàng đầu Việt Nam. Chuyên cung cấp laptop, máy tính, linh kiện và phụ kiện công nghệ với chất lượng đảm bảo và dịch vụ chuyên nghiệp.
        </p>
        <div style="font-size:13px;display:flex;flex-direction:column;gap:8px;color:#9ca3af;margin-bottom:16px;">
            <div><i class="fas fa-map-marker-alt" style="color:var(--wk-primary);margin-right:8px;width:14px;"></i>123 Đường Công Nghệ, Quận IT, TP.HCM</div>
            <div><i class="fas fa-phone-alt" style="color:var(--wk-primary);margin-right:8px;width:14px;"></i>1900 xxxx</div>
            <div><i class="fas fa-envelope" style="color:var(--wk-primary);margin-right:8px;width:14px;"></i>support@WKcomputer.vn</div>
        </div>
        <div class="wk-footer-socials">
            <a href="#" class="wk-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="wk-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="#" class="wk-social-btn" title="TikTok"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="wk-social-btn" title="Zalo"><i class="fas fa-comment"></i></a>
        </div>
    @elseif($type === 'menu')
        <ul class="wk-footer-links">
            @if(isset($menuItems) && $menuItems->isNotEmpty())
                @foreach($menuItems as $item)
                    <li><a href="{{ $item->url ?? '#' }}"><i class="fas fa-angle-right"></i>{{ $item->title ?? $item->name }}</a></li>
                @endforeach
            @else
                <li><a href="/chinh-sach-thanh-toan"><i class="fas fa-angle-right"></i>Chính sách thanh toán</a></li>
                <li><a href="/chinh-sach-van-chuyen"><i class="fas fa-angle-right"></i>Chính sách vận chuyển</a></li>
                <li><a href="/chinh-sach-bao-mat-thong-tin"><i class="fas fa-angle-right"></i>Chính sách bảo mật</a></li>
                <li><a href="/gioi-thieu-cong-ty"><i class="fas fa-angle-right"></i>Giới thiệu công ty</a></li>
            @endif
        </ul>
    @elseif($type === 'newsletter')
        <p style="font-size:12px;color:#9ca3af;margin-bottom:12px;line-height:1.5;">Nhận ngay voucher 200k và thông tin khuyến mãi độc quyền!</p>
        <div class="wk-footer-newsletter">
            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Nhập email của bạn..." required>
                <button type="submit" class="wk-btn wk-btn-primary wk-btn-block" style="font-size:12px;padding:10px;">
                    <i class="fas fa-paper-plane"></i> Đăng ký
                </button>
            </form>
        </div>
    @else
        <div class="wk-footer-custom-content">
            {!! $config['content'] ?? '' !!}
        </div>
    @endif
</div>
