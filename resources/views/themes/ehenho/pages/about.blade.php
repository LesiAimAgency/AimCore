@extends('themes.ehenho.layouts.app')

@section('title', 'Giới thiệu về eHenho - Hẹn hò Online & Tìm bạn Bốn phương')
@section('meta_description', 'eHenho.com là mạng xã hội hẹn hò trực tuyến, tìm bạn bốn phương, tìm người yêu hoàn toàn miễn phí và an toàn.')

@section('content')
<header class="text-center" style="background-color: #FCF8E3; color:#8A6D3B; padding-top:6px; padding-bottom:6px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span style="font-size:1.0em" title="Lưu ý">
          <i aria-hidden="true" class="fa fa-info-circle"></i>
          eHenho.com 100% Miễn Phí!
        </span>
      </div>
    </div>
  </div>
</header>

<div class="container cont-sb-loc">
  <a class="b-button" href="{{ route('ehenho.search.index') }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn bốn phương theo Tỉnh Thành
  </a>
  <a class="b-button" href="{{ route('ehenho.search.by_age') }}">
    <span class="glyphicon glyphicon-heart"></span> Tìm bạn theo Độ tuổi
  </a>
</div>

<div class="container" style="background-color:#FFF; padding-top:20px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-0">
      <h1 class="text-success" style="font-size: 26px; font-weight: bold; margin-bottom: 20px;">
        Giới thiệu về eHenho.com
      </h1>

      <div style="font-size:1.05em; line-height:1.7em; color: #333;">
        <p class="lead" style="color: #2e5d69; font-weight: 500;">
          Chào mừng bạn đến với <strong>eHenho.com</strong> – Trang web hẹn hò online, kết bạn, tìm bạn bốn phương hàng đầu với sứ mệnh kết nối những trái tim đồng điệu một cách nghiêm túc, văn minh và hoàn toàn miễn phí.
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          <i class="fa fa-check-circle" style="color: #5cb85c;"></i> 1. Sứ mệnh của chúng tôi
        </h3>
        <p>
          Trong nhịp sống hiện đại bận rộn, việc tìm kiếm một người bạn tri kỷ, một người yêu lý tưởng hay một bạn đời nghiêm túc để đi đến hôn nhân trở nên khó khăn hơn. eHenho ra đời nhằm xóa bỏ mọi khoảng cách địa lý, mang lại một không gian kết nối thân thiện, an toàn và dễ sử dụng cho người Việt trên khắp mọi miền đất nước cũng như cộng đồng người Việt tại hải ngoại (Mỹ, Canada, Úc, Nhật, Pháp...).
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          <i class="fa fa-heart" style="color: #d9534f;"></i> 2. 100% Miễn phí & Độc lập
        </h3>
        <p>
          Tại eHenho, mọi tính năng cơ bản như đăng ký hồ sơ, tìm kiếm hồ sơ theo tiêu chí (độ tuổi, giới tính, tỉnh thành, mục đích hẹn hò), gửi và nhận tin nhắn trò chuyện đều được cung cấp <strong>hoàn toàn miễn phí</strong>. Bạn không cần phải trả các khoản phí ẩn để kết nối với những người bạn quan tâm.
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          <i class="fa fa-shield" style="color: #337ab7;"></i> 3. An toàn, riêng tư & văn minh
        </h3>
        <p>
          Chúng tôi coi trọng sự tôn trọng và văn hóa giao tiếp. Mọi hồ sơ có hành vi quấy rối, ngôn từ thô tục, quảng cáo, lừa đảo hoặc vi phạm thuần phong mỹ tục sẽ bị khóa vĩnh viễn. Người dùng có toàn quyền chặn hoặc báo cáo các đối tượng vi phạm.
        </p>

        <h3 style="color: #008BC7; font-size: 18px; margin-top: 25px;">
          <i class="fa fa-envelope" style="color: #f0ad4e;"></i> 4. Thông tin liên hệ
        </h3>
        <p>
          Mọi thắc mắc, đóng góp ý kiến hoặc phản ánh vi phạm, xin vui lòng gửi email về:
          <a href="mailto:hi@ehenho.com" style="color: #008BC7; font-weight: bold;">hi@ehenho.com</a>.
        </p>

        <div style="margin-top: 35px; padding: 20px; background-color: #f9f9f9; border-radius: 6px; border: 1px solid #eee;">
          <h4>Bạn chưa có tài khoản?</h4>
          <p>Tham gia cộng đồng hàng nghìn thành viên đang tìm kiếm nửa kia ngay hôm nay!</p>
          <a href="{{ route('ehenho.register') }}" class="btn btn-success btn-lg">
            <i class="fa fa-user-plus"></i> Đăng Ký Tài Khoản Miễn Phí
          </a>
        </div>
      </div>
    </div>

    <!-- Quick Navigation Sidebar -->
    <div class="col-sm-4" style="margin-top: 20px;">
      <div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <div class="panel-heading" style="background-color: #f5f5f5; font-weight: bold;">
          Liên Kết Nhanh
        </div>
        <div class="list-group">
          <a href="{{ route('ehenho.terms') }}" class="list-group-item">
            <i class="fa fa-file-text-o text-muted"></i> Điều khoản sử dụng
          </a>
          <a href="{{ route('ehenho.privacy') }}" class="list-group-item">
            <i class="fa fa-lock text-muted"></i> Chính sách bảo mật
          </a>
          <a href="{{ route('ehenho.search.index') }}" class="list-group-item">
            <i class="fa fa-search text-muted"></i> Tìm bạn bốn phương
          </a>
          <a href="{{ route('ehenho.search.by_age') }}" class="list-group-item">
            <i class="fa fa-calendar text-muted"></i> Tìm bạn theo độ tuổi
          </a>
          <a href="{{ route('ehenho.login') }}" class="list-group-item">
            <i class="fa fa-sign-in text-muted"></i> Đăng nhập hệ thống
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
