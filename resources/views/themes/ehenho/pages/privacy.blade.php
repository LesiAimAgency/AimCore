@extends('themes.ehenho.layouts.app')

@section('title', !empty($page?->meta_title) ? $page->meta_title : ($page?->title ?? 'Chính sách bảo mật - eHenho.com'))
@section('meta_description', !empty($page?->meta_description) ? $page->meta_description : ($page?->excerpt ?? 'Chính sách bảo mật và quyền riêng tư thông tin cá nhân của người dùng tại eHenho.com.'))

@section('content')
<header class="text-center" style="background-color: #FCF8E3; color:#8A6D3B; padding-top:6px; padding-bottom:6px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span style="font-size:1.0em" title="Lưu ý">
          <i aria-hidden="true" class="fa fa-info-circle"></i>
          eHenho.com 100% Miễn Phí & Bảo Vệ Riêng Tư Người Dùng!
        </span>
      </div>
    </div>
  </div>
</header>

<div class="container cont-sb-loc">
  <a class="b-button" href="{{ route('ehenho.search.index') }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn bốn phương theo Tỉnh Thành
  </a>
  <a class="b-button" href="{{ route('ehenho.terms') }}">
    <span class="glyphicon glyphicon-file"></span> Điều khoản sử dụng
  </a>
</div>

<div class="container" style="background-color:#FFF; padding-top:20px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-0">
      <h1 class="text-success" style="font-size: 26px; font-weight: bold; margin-bottom: 20px;">
        {{ $page->title ?? 'Chính sách bảo mật thông tin' }}
      </h1>

      @if(!empty($page?->content))
        <div class="dynamic-page-content" style="font-size:1.05em; line-height:1.7em; color: #333;">
          {!! $page->content !!}
        </div>
      @else
      <div style="font-size:1.05em; line-height:1.7em; color: #333;">
        <p class="lead" style="color: #2e5d69;">
          eHenho cam kết tôn trọng và bảo vệ tuyệt đối sự riêng tư của mọi người dùng khi tham gia kết bạn, hẹn hò trên nền tảng của chúng tôi.
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          1. Thu thập thông tin cá nhân
        </h3>
        <p>
          Khi bạn tạo hồ sơ, chúng tôi thu thập các thông tin cần thiết phục vụ cho việc ghép đôi và tìm bạn, bao gồm: Tên hiển thị, Địa chỉ email, Độ tuổi, Giới tính, Tỉnh/Thành phố sinh sống, Sở thích cá nhân, Tiêu chí tìm kiếm và Hình ảnh đại diện do bạn chủ động tải lên.
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          2. Sử dụng thông tin
        </h3>
        <p>
          Thông tin của bạn được sử dụng để:
        </p>
        <ul>
          <li>Hiển thị hồ sơ công khai trên hệ thống tìm kiếm người dùng (trừ email và mật khẩu).</li>
          <li>Gửi thông báo về tin nhắn mới hoặc các cập nhật quan trọng từ hệ thống.</li>
          <li>Ngăn chặn các hành vi gian lận, spam, quấy rối và đảm bảo an toàn cho cộng đồng.</li>
        </ul>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          3. Bảo mật mật khẩu và dữ liệu
        </h3>
        <p>
          Mật khẩu tài khoản của bạn được mã hóa một chiều (Bcrypt / Argon2) theo tiêu chuẩn bảo mật hiện đại nhất, đảm bảo ngay cả quản trị viên hệ thống cũng không thể đọc được mật khẩu của bạn. Bạn nên bảo quản mật khẩu cá nhân cẩn thận và không chia sẻ cho bất kỳ ai.
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          4. Không chia sẻ cho bên thứ ba
        </h3>
        <p>
          Chúng tôi cam kết <strong>không bán, trao đổi hoặc chia sẻ</strong> thông tin cá nhân của bạn cho bất kỳ đơn vị quảng cáo hoặc bên thứ ba nào, trừ khi có yêu cầu hợp pháp từ cơ quan thực thi pháp luật.
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          5. Quyền chỉnh sửa và xóa thông tin
        </h3>
        <p>
          Bạn có toàn quyền truy cập mục <strong>Quản lý tài khoản</strong> để chỉnh sửa thông tin cá nhân, thay đổi ảnh đại diện hoặc ẩn hồ sơ của mình bất kỳ lúc nào bạn muốn.
        </p>
      </div>
      @endif
    </div>

    <div class="col-sm-4" style="margin-top: 20px;">
      <div class="panel panel-default">
        <div class="panel-heading" style="font-weight: bold; background-color: #f5f5f5;">
          Quy Định & Pháp Lý
        </div>
        <div class="list-group">
          <a href="{{ route('ehenho.privacy') }}" class="list-group-item active">
            <i class="fa fa-lock"></i> Chính sách bảo mật
          </a>
          <a href="{{ route('ehenho.terms') }}" class="list-group-item">
            <i class="fa fa-file-text-o text-muted"></i> Điều khoản sử dụng
          </a>
          <a href="{{ route('ehenho.about') }}" class="list-group-item">
            <i class="fa fa-question-circle text-muted"></i> Giới thiệu về eHenho
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
