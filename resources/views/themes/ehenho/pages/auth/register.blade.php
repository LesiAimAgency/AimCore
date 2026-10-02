@extends('themes.ehenho.layouts.app')

@section('title', 'Đăng Ký Hồ Sơ Mới - eHenho.com')

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

<div class="container" style="background-color:#FFF; padding-top:20px; padding-bottom:64px">
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 text-center">
          <h3 class="text-success" style="font-weight:bold">
            Đăng Ký Hồ Sơ Mới
          </h3>
          <p style="font-size:1.0em">
            Tạo một hồ sơ mới để đối tượng hẹn hò có thể tìm thấy bạn và để bạn chủ động nhận &amp; gửi tin nhắn đến họ trên eHenho. Đã có hồ sơ trên eHenho rồi?
            <a href="{{ route('ehenho.login') }}">Đăng nhập ở đây</a>.
          </p>
        </div>
      </div>

      @if($errors->any())
      <div class="row" style="margin-top: 10px;">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul style="margin-bottom: 0; padding-left: 20px;">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      @endif

      <form accept-charset="utf-8" action="{{ route('ehenho.register.submit') }}" class="signup" id="signup_form" method="post" name="form">
        @csrf
        <div class="col-sm-8 col-sm-offset-2" style="background-color:#FAFCFF; padding:26px 15px 25px 15px; margin-top:10px; border:1px solid #ADCEFF; border-radius: 18px">
          
          <!-- SECTION 1: TÀI KHOẢN ĐĂNG NHẬP -->
          <h4 style="color: #2e5d69; font-weight: bold; margin-bottom: 18px;">
            TÀI KHOẢN ĐĂNG NHẬP
          </h4>

          <div class="row" style="margin-bottom: 12px;">
            <div class="fieldWrapper">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Địa chỉ email</b>
                </span>
              </div>
              <div class="col-xs-9 col-md-5">
                <input class="required pl-text textinput textInput form-control" id="id_email" maxlength="120" name="email" placeholder="Địa chỉ email" required style="height:32px;" title="Địa chỉ email của bạn" type="email" value="{{ old('email') }}" />
              </div>
              <div class="col-xs-9 col-xs-offset-3 col-md-3 col-md-offset-0 ptop-six">
                <span class="pr_htext" style="color: gray; font-size: 12px;">
                  (Không hiển thị trên hồ sơ.)
                </span>
              </div>
              <div class="col-xs-9 col-xs-offset-3 col-md-8 col-md-offset-4 ptop-six" style="margin-top: 4px;">
                <span class="pr_htext text-left" style="color: #666; font-size: 12px;">
                  Bạn chưa có địa chỉ email? Hãy vào <a href="https://www.gmail.com" target="_blank">Google Gmail</a> để tạo địa chỉ email cho bạn.
                </span>
              </div>
            </div>
          </div>

          <div class="row" style="margin-bottom: 15px;">
            <div class="fieldWrapper">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Mật khẩu</b>
                </span>
              </div>
              <div class="col-xs-9 col-md-5">
                <input class="required pl-text textinput textInput form-control" id="id_password" maxlength="128" name="password" placeholder="Mật khẩu" required style="height:32px;" title="Mật khẩu mới" type="password" />
              </div>
              <div class="col-xs-9 col-xs-offset-3 col-md-3 col-md-offset-0 ptop-six">
                <a style="text-decoration:none">
                  <span id="mask-pw" style="cursor:pointer; color: #008BC7;">
                    <i aria-hidden="true" class="fa fa-eye" id="mask-pw-i"></i>
                    Hiện
                  </span>
                </a>
              </div>
            </div>
          </div>

          <hr style="border-top: 1px solid #d5e5f5; margin: 20px 0;" />

          <!-- SECTION 2: THÔNG TIN CƠ BẢN -->
          <h4 style="color: #2e5d69; font-weight: bold; margin-bottom: 18px;">
            THÔNG TIN CƠ BẢN
          </h4>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Tên</b>
                </span>
              </div>
              <div class="col-xs-9 col-md-5">
                <input class="required pl-text textinput textInput form-control" id="id_name" maxlength="120" minlength="2" name="name" placeholder="Tên" required style="height:32px;" title="Tên của bạn" type="text" value="{{ old('name') }}" />
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Ngày sinh</b>
                </span>
              </div>
              <div class="col-xs-9 col-md-5">
                <div style="display:table; width:100%;">
                  <div style="width:26% !important; display:table-cell; padding-right: 4px;">
                    <select class="customselectdatewidget form-control" id="id_dob_day" name="dob_day" style="width: 100%; font-size:90%; height:32px">
                      @for($d = 1; $d <= 31; $d++)
                        <option value="{{ $d }}" {{ old('dob_day', 15) == $d ? 'selected' : '' }}>{{ $d }}</option>
                      @endfor
                    </select>
                  </div>
                  <div style="width:41% !important; display:table-cell; padding-right: 4px;">
                    <select class="customselectdatewidget form-control" id="id_dob_month" name="dob_month" style="width: 100%; font-size:90%; height:32px">
                      @for($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}" {{ old('dob_month', 6) == $m ? 'selected' : '' }}>Tháng {{ $m }}</option>
                      @endfor
                    </select>
                  </div>
                  <div style="width:33% !important; display:table-cell;">
                    <select class="customselectdatewidget form-control" id="id_dob_year" name="dob_year" style="width: 100%; font-size:90%; height:32px">
                      @for($y = 2008; $y >= 1957; $y--)
                        <option value="{{ $y }}" {{ old('dob_year', 1998) == $y ? 'selected' : '' }}>{{ $y }}</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-9 col-xs-offset-3 col-md-3 col-md-offset-0 ptop-six">
                <span class="pr_htext" style="color: gray; font-size: 12px;">
                  (Không hiển thị trên hồ sơ, để tính tuổi.)
                </span>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Tôi là</b>
                </span>
              </div>
              <div class="col-xs-6 col-md-4">
                <select class="pl-text select form-control" id="id_gender" name="gender" required style="height:32px;">
                  <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam tìm nữ</option>
                  <option value="female" {{ old('gender', 'female') == 'female' ? 'selected' : '' }}>Nữ tìm nam</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Hôn nhân</b>
                </span>
              </div>
              <div class="col-xs-7 col-sm-6 col-md-5">
                <select class="pl-text select form-control" id="id_marital_status" name="marital_status" required style="height:32px;">
                  <option value="single" {{ old('marital_status', 'single') == 'single' ? 'selected' : '' }}>Độc thân</option>
                  <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Ly dị</option>
                  <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Ở góa</option>
                  <option value="in-relationship" {{ old('marital_status') == 'in-relationship' ? 'selected' : '' }}>Đang có người yêu</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Mục tiêu</b>
                </span>
              </div>
              <div class="col-xs-8 col-sm-7 col-md-6">
                <select class="pl-text select form-control" id="id_look_for" name="look_for" required style="height:32px;">
                  <option value="marriage" {{ old('look_for') == 'marriage' ? 'selected' : '' }}>Tìm người để kết hôn</option>
                  <option value="long-term-love" {{ old('look_for', 'long-term-love') == 'long-term-love' ? 'selected' : '' }}>Tìm người yêu lâu dài</option>
                  <option value="short-term-love" {{ old('look_for') == 'short-term-love' ? 'selected' : '' }}>Tìm người yêu ngắn hạn</option>
                  <option value="chat-or-intimate-friends" {{ old('look_for') == 'chat-or-intimate-friends' ? 'selected' : '' }}>Tìm bạn tâm sự</option>
                  <option value="new-friends" {{ old('look_for') == 'new-friends' ? 'selected' : '' }}>Tìm bạn bè mới</option>
                  <option value="life-mate" {{ old('look_for') == 'life-mate' ? 'selected' : '' }}>Tìm bạn đời</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Chiều cao</b>
                </span>
              </div>
              <div class="col-xs-4 col-md-3">
                <select class="select form-control" id="id_height" name="height" required style="height:32px;font-size:90%">
                  @for($h = 130; $h <= 199; $h++)
                    <option value="{{ $h }}" {{ old('height', 165) == $h ? 'selected' : '' }}>{{ $h }}</option>
                  @endfor
                </select>
              </div>
              <div class="col-xs-5 col-md-5 ptop-six">
                <span style="color:gray"><small><i>(cm)</i></small></span>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Cân nặng</b>
                </span>
              </div>
              <div class="col-xs-4 col-md-3">
                <select class="select form-control" id="id_weight" name="weight" required style="height:32px;font-size:90%">
                  @for($w = 30; $w <= 150; $w++)
                    <option value="{{ $w }}" {{ old('weight', 52) == $w ? 'selected' : '' }}>{{ $w }}</option>
                  @endfor
                </select>
              </div>
              <div class="col-xs-5 col-md-5 ptop-six">
                <span style="color:gray"><small><i>(kg)</i></small></span>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Học vấn</b>
                </span>
              </div>
              <div class="col-xs-7 col-sm-6 col-md-5">
                <select class="pl-text select form-control" id="id_education" name="education" required style="height:32px;">
                  <option value="GRA" {{ old('education') == 'GRA' ? 'selected' : '' }}>Phổ thông</option>
                  <option value="VCA" {{ old('education') == 'VCA' ? 'selected' : '' }}>Trung cấp</option>
                  <option value="ASO" {{ old('education') == 'ASO' ? 'selected' : '' }}>Cao đẳng</option>
                  <option value="BAC" {{ old('education', 'BAC') == 'BAC' ? 'selected' : '' }}>Đại học</option>
                  <option value="MAS" {{ old('education') == 'MAS' ? 'selected' : '' }}>Cao học</option>
                  <option value="AMA" {{ old('education') == 'AMA' ? 'selected' : '' }}>Trên cao học</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Nơi ở</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-8 col-md-5">
                <select class="pl-text select form-control" id="id_province" name="province" required style="height:32px;">
                  <option value="ho-chi-minh" {{ old('province') == 'ho-chi-minh' ? 'selected' : '' }}>Hồ Chí Minh</option>
                  <option value="ha-noi" {{ old('province') == 'ha-noi' ? 'selected' : '' }}>Hà Nội</option>
                  <option value="da-nang" {{ old('province') == 'da-nang' ? 'selected' : '' }}>Đà Nẵng</option>
                  <option value="hai-phong" {{ old('province') == 'hai-phong' ? 'selected' : '' }}>Hải Phòng</option>
                  <option value="can-tho" {{ old('province') == 'can-tho' ? 'selected' : '' }}>Cần Thơ</option>
                  <option value="an-giang">An Giang</option>
                  <option value="ba-ria-vung-tau">Bà Rịa - Vũng Tàu</option>
                  <option value="bac-giang">Bắc Giang</option>
                  <option value="bac-kan">Bắc Kạn</option>
                  <option value="bac-lieu">Bạc Liêu</option>
                  <option value="bac-ninh">Bắc Ninh</option>
                  <option value="ben-tre">Bến Tre</option>
                  <option value="binh-dinh">Bình Định</option>
                  <option value="binh-duong">Bình Dương</option>
                  <option value="binh-phuoc">Bình Phước</option>
                  <option value="binh-thuan">Bình Thuận</option>
                  <option value="ca-mau">Cà Mau</option>
                  <option value="cao-bang">Cao Bằng</option>
                  <option value="dak-lak">Đắk Lắk</option>
                  <option value="dak-nong">Đắk Nông</option>
                  <option value="dien-bien">Điện Biên</option>
                  <option value="dong-nai">Đồng Nai</option>
                  <option value="dong-thap">Đồng Tháp</option>
                  <option value="gia-lai">Gia Lai</option>
                  <option value="ha-giang">Hà Giang</option>
                  <option value="ha-nam">Hà Nam</option>
                  <option value="ha-tinh">Hà Tĩnh</option>
                  <option value="hai-duong">Hải Dương</option>
                  <option value="hau-giang">Hậu Giang</option>
                  <option value="hoa-binh">Hòa Bình</option>
                  <option value="hung-yen">Hưng Yên</option>
                  <option value="khanh-hoa">Khánh Hòa</option>
                  <option value="kien-giang">Kiên Giang</option>
                  <option value="kon-tum">Kon Tum</option>
                  <option value="lai-chau">Lai Châu</option>
                  <option value="lam-dong">Lâm Đồng</option>
                  <option value="lang-son">Lạng Sơn</option>
                  <option value="lao-cai">Lào Cai</option>
                  <option value="long-an">Long An</option>
                  <option value="nam-dinh">Nam Định</option>
                  <option value="nghe-an">Nghệ An</option>
                  <option value="ninh-binh">Ninh Bình</option>
                  <option value="ninh-thuan">Ninh Thuận</option>
                  <option value="phu-tho">Phú Thọ</option>
                  <option value="phu-yen">Phú Yên</option>
                  <option value="quang-binh">Quảng Bình</option>
                  <option value="quang-nam">Quảng Nam</option>
                  <option value="quang-ngai">Quảng Ngãi</option>
                  <option value="quang-ninh">Quảng Ninh</option>
                  <option value="quang-tri">Quảng Trị</option>
                  <option value="soc-trang">Sóc Trăng</option>
                  <option value="son-la">Sơn La</option>
                  <option value="tay-ninh">Tây Ninh</option>
                  <option value="thai-binh">Thái Bình</option>
                  <option value="thai-nguyen">Thái Nguyên</option>
                  <option value="thanh-hoa">Thanh Hóa</option>
                  <option value="hue">Thừa Thiên Huế</option>
                  <option value="tien-giang">Tiền Giang</option>
                  <option value="tra-vinh">Trà Vinh</option>
                  <option value="tuyen-quang">Tuyên Quang</option>
                  <option value="vinh-long">Vĩnh Long</option>
                  <option value="vinh-phuc">Vĩnh Phúc</option>
                  <option value="yen-bai">Yên Bái</option>
                  <option disabled="disabled">-----------------</option>
                  <option value="united-states" {{ old('province') == 'united-states' ? 'selected' : '' }}>Mỹ</option>
                  <option value="canada" {{ old('province') == 'canada' ? 'selected' : '' }}>Canada</option>
                  <option value="australia" {{ old('province') == 'australia' ? 'selected' : '' }}>Úc</option>
                  <option value="germany" {{ old('province') == 'germany' ? 'selected' : '' }}>Đức</option>
                  <option value="england" {{ old('province') == 'england' ? 'selected' : '' }}>Anh</option>
                  <option value="france" {{ old('province') == 'france' ? 'selected' : '' }}>Pháp</option>
                  <option value="finland" {{ old('province') == 'finland' ? 'selected' : '' }}>Phần Lan</option>
                  <option value="japan" {{ old('province') == 'japan' ? 'selected' : '' }}>Nhật</option>
                  <option value="south-korea" {{ old('province') == 'south-korea' ? 'selected' : '' }}>Hàn Quốc</option>
                </select>

                <!-- District Dropdown -->
                <div style="display:table; width:100%; margin-top:6px;">
                  <select class="pl-text select form-control" id="id_district" name="district" style="height:32px;">
                    <option value="">-- Đang nạp danh sách Quận / Huyện... --</option>
                  </select>
                  <span id="loading_district_drop_down" style="display:none; color:#2e5d69; font-size:12px; margin-top:4px;">
                    <i class="fa fa-spinner fa-spin"></i> Đang tải quận/huyện...
                  </span>
                </div>

                <!-- Ward Dropdown (optional) -->
                <div style="display:table; width:100%; margin-top:6px;">
                  <select class="pl-text select form-control" id="id_ward" name="ward" style="height:32px; display:none;">
                    <option value="">-- Chọn Phường / Xã / Thị trấn --</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-9 col-xs-offset-3 col-md-3 col-md-offset-0 ptop-six">
                <span class="pr_htext" id="vietnam_notice" style="color: gray; font-size: 12px;">
                  (Nếu bạn ở ngoài Việt Nam thì vui lòng chọn Mỹ, Canada, Úc...)
                </span>
                <span class="pr_htext" id="foreign_notice" style="display:none; color:#3F7E8F; font-size: 12px;">
                  <i class="fa fa-globe"></i> Quốc gia ngoài Việt Nam
                </span>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Tiêu đề hồ sơ</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <input class="required pl-text textinput textInput form-control" id="id_headline" maxlength="120" minlength="2" name="headline" placeholder="Vd: 'Em mộc mạc' 'Anh chân thành' 'Em chung tình'..." required style="height:32px;" title="Tiêu đề hồ sơ của bạn" type="text" value="{{ old('headline') }}" />
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Về tôi</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <textarea class="pl-text textarea form-control" cols="80" id="id_i_am" name="i_am" placeholder="Giới thiệu thêm về bạn như cuộc sống, ước mơ, hay bất cứ điều gì riêng có ở bạn. Ghi số điện thoại liên lạc Zalo Facebook của bạn (nếu muốn)." required rows="6">{{ old('i_am') }}</textarea>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 15px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Tìm người</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <textarea class="pl-text textarea form-control" cols="80" id="id_my_match" name="my_match" placeholder="Bạn tìm người như thế nào?" required rows="6">{{ old('my_match') }}</textarea>
              </div>
            </div>
          </div>

          <hr style="border-top: 1px solid #d5e5f5; margin: 20px 0;" />

          <!-- SECTION 3: THÔNG TIN CHI TIẾT HƠN -->
          <h4 style="color: #2e5d69; font-weight: bold; margin-bottom: 18px;">
            THÔNG TIN CHI TIẾT HƠN
          </h4>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Dáng người</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_appearance2_0" name="appearance2_0" style="height:32px;">
                  <option value="0">-Chọn một Dáng người-</option>
                  <option value="1" {{ old('appearance2_0') == '1' ? 'selected' : '' }}>Cân đối</option>
                  <option value="2" {{ old('appearance2_0') == '2' ? 'selected' : '' }}>Cao lớn</option>
                  <option value="3" {{ old('appearance2_0') == '3' ? 'selected' : '' }}>Mảnh mai</option>
                  <option value="4" {{ old('appearance2_0') == '4' ? 'selected' : '' }}>Mũm mỉm</option>
                  <option value="5" {{ old('appearance2_0') == '5' ? 'selected' : '' }}>Nhỏ nhắn</option>
                  <option value="6" {{ old('appearance2_0') == '6' ? 'selected' : '' }}>Tầm thước</option>
                  <option value="7" {{ old('appearance2_0') == '7' ? 'selected' : '' }}>Thấp đậm</option>
                  <option value="8" {{ old('appearance2_0') == '8' ? 'selected' : '' }}>Vạm vỡ</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Sở thích</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_interest2_0" name="interest2_0" style="height:32px;">
                  <option value="0">-Chọn một Sở thích chính-</option>
                  <option value="1">Ẩm thực (tín đồ ẩm thực)</option>
                  <option value="2">Chăm sóc gia đình</option>
                  <option value="3">Chơi môn thể thao ngoài trời (đá bóng, tennis, chạy bộ...)</option>
                  <option value="4">Chơi môn thể thao trong nhà (aerobic, bóng bàn, thể dục...)</option>
                  <option value="5">Công nghệ (hi-tech)</option>
                  <option value="6">Công việc &amp; sự nghiệp</option>
                  <option value="7">Dã ngoại (picnic)</option>
                  <option value="8">Đọc sách nhiều</option>
                  <option value="9">Du lịch</option>
                  <option value="10">Gym</option>
                  <option value="11">Hoạt động từ thiện, thiện nguyện</option>
                  <option value="12">Học hành &amp; phát triển bản thân</option>
                  <option value="13">Nấu ăn</option>
                  <option value="14">Nghệ thuật</option>
                  <option value="15">Nữ công gia chánh</option>
                  <option value="16">Nuôi thú cưng</option>
                  <option value="17">Phượt</option>
                  <option value="18">Thích nơi yên tĩnh</option>
                  <option value="19">Thích tụ tập bạn bè</option>
                  <option value="20">Thiên nhiên cây cỏ</option>
                  <option value="21">Thiền</option>
                  <option value="22">Thời trang (tín đồ thời trang)</option>
                  <option value="23">Văn học</option>
                  <option value="24">Văn nghệ</option>
                  <option value="25">Xem phim nhiều</option>
                  <option value="26">Yoga</option>
                  <option value="27">Sở thích khác</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Tính cách</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_personality2_0" name="personality2_0" style="height:32px;">
                  <option value="0">-Chọn một Tính cách chính-</option>
                  <option value="1">Chân thành</option>
                  <option value="2">Chung thủy</option>
                  <option value="3">Dễ gần</option>
                  <option value="4">Dịu dàng</option>
                  <option value="5">Điềm đạm</option>
                  <option value="6">Đơn giản</option>
                  <option value="7">Hiền</option>
                  <option value="8">Khéo léo</option>
                  <option value="9">Khó đoán</option>
                  <option value="10">Kín đáo</option>
                  <option value="11">Lạnh lùng</option>
                  <option value="12">Mạnh mẽ</option>
                  <option value="13">Mơ mộng</option>
                  <option value="14">Ngọt ngào</option>
                  <option value="15">Nhân hậu</option>
                  <option value="16">Phức tạp</option>
                  <option value="17">Rụt rè</option>
                  <option value="18">Sôi nổi</option>
                  <option value="19">Tham vọng</option>
                  <option value="20">Thật thà</option>
                  <option value="21">Thực tế</option>
                  <option value="22">Trầm tính</option>
                  <option value="23">Vui vẻ</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Lối sống</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_way_of_life" name="way_of_life" style="height:32px;">
                  <option value="0">-Chọn một Lối sống chính-</option>
                  <option value="1">An nhàn</option>
                  <option value="2">Bình dân</option>
                  <option value="3">Chan hòa tình yêu thương</option>
                  <option value="4">Chơi thể thao thường xuyên</option>
                  <option value="5">Có đạo</option>
                  <option value="8">Đa văn hóa</option>
                  <option value="9">Đi công tác xa thường xuyên</option>
                  <option value="10">Đi du lịch thường xuyên</option>
                  <option value="11">Điều độ/ Mực thước</option>
                  <option value="12">Độc lập/ Không phụ thuộc vào ai</option>
                  <option value="13">Gần gũi chan hòa với thiên nhiên</option>
                  <option value="14">Giản dị</option>
                  <option value="17">Há miệng chờ sung rụng</option>
                  <option value="19">Hai lúa</option>
                  <option value="20">Hay phiêu lưu mạo hiểm</option>
                  <option value="21">Hiện đại</option>
                  <option value="22">Khép kín</option>
                  <option value="24">Không cố định nghề nghiệp</option>
                  <option value="25">Không theo khuôn khổ</option>
                  <option value="26">Lạc quan yêu đời</option>
                  <option value="27">Làm việc đầu tắt mặt tối</option>
                  <option value="28">Lãng mạn thi vị</option>
                  <option value="29">Lành mạnh</option>
                  <option value="30">Lập dị</option>
                  <option value="32">Luôn nỗ lực vươn lên</option>
                  <option value="34">Năng động</option>
                  <option value="36">Người ăn thuần chay/ Ăn chay trường</option>
                  <option value="39">Phức tạp</option>
                  <option value="40">Quẩn quanh trong nhà</option>
                  <option value="43">Sống có khát vọng &amp; hoài bão</option>
                  <option value="44">Sống lý trí</option>
                  <option value="46">Sống tình cảm</option>
                  <option value="47">Sống tự do/ Muốn làm gì thì làm</option>
                  <option value="48">Sống về đêm</option>
                  <option value="53">Thụ hưởng những gì đang có/ Hưởng thụ</option>
                  <option value="54">Thực tế</option>
                  <option value="58">Trí thức</option>
                  <option value="60">Truyền thống</option>
                  <option value="61">Tự lập/ Tự thân</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Qúy giá nhất</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_most_valued" name="most_valued" style="height:32px;">
                  <option value="0">-Chọn cái Qúy giá nhất đối với bạn-</option>
                  <option value="2">Bạn đời</option>
                  <option value="3">Bản thân mình</option>
                  <option value="4">Cha mẹ</option>
                  <option value="5">Con cái</option>
                  <option value="35">Công danh &amp; sự nghiệp</option>
                  <option value="6">Của cải vật chất</option>
                  <option value="7">Danh dự &amp; uy tín</option>
                  <option value="8">Danh vọng &amp; địa vị</option>
                  <option value="9">Đạo đức</option>
                  <option value="11">Đức hạnh</option>
                  <option value="12">Gia đình</option>
                  <option value="13">Gia đình &amp; người thân</option>
                  <option value="14">Hạnh phúc</option>
                  <option value="17">Lao động chân chính</option>
                  <option value="18">Lẽ sống</option>
                  <option value="19">Lòng chung thủy</option>
                  <option value="20">Lòng nhân hậu</option>
                  <option value="28">Người yêu</option>
                  <option value="29">Niềm tin &amp; ý chí</option>
                  <option value="30">Niềm vui mỗi ngày</option>
                  <option value="34">Sự bình yên</option>
                  <option value="37">Sức khỏe</option>
                  <option value="40">Thời gian</option>
                  <option value="43">Tình cảm &amp; tình yêu</option>
                  <option value="45">Tình yêu thương</option>
                  <option value="46">Trải nghiệm sống</option>
                  <option value="47">Tri kỷ/ Bạn tâm giao</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Nghề nghiệp</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_occupation2_0" name="occupation2_0" style="height:32px;">
                  <option value="0">-Chọn một Lĩnh vực nghề nghiệp-</option>
                  <option value="1">Buôn bán-thương mại</option>
                  <option value="2">Chủ doanh nghiệp</option>
                  <option value="3">Công nhân (kỹ thuật, giản đơn...)</option>
                  <option value="4">Công nhân viên chức</option>
                  <option value="5">Dạy học (giáo viên, giảng viên...)</option>
                  <option value="6">Du lịch-nhà hàng-khách sạn</option>
                  <option value="7">IT (lập trình, mạng, đồ họa...)</option>
                  <option value="8">Kế toán</option>
                  <option value="9">Kỹ sư</option>
                  <option value="10">Làm đẹp (làm tóc, nail, spa...)</option>
                  <option value="11">Lao động tự do</option>
                  <option value="12">Marketing-bán hàng</option>
                  <option value="13">May mặc-sản xuất hàng thời trang</option>
                  <option value="14">Môi giới (bất động sản, bảo hiểm...)</option>
                  <option value="15">Mỹ thuật-kiến trúc</option>
                  <option value="16">Nghệ sĩ</option>
                  <option value="17">Nhân viên văn phòng</option>
                  <option value="18">Nội trợ</option>
                  <option value="19">Sinh viên</option>
                  <option value="20">Tài chính-ngân hàng</option>
                  <option value="21">Thiết kế-tạo mẫu</option>
                  <option value="22">Vận chuyển (lái xe, shipper...)</option>
                  <option value="23">Vận động viên</option>
                  <option value="24">Xây dựng</option>
                  <option value="25">Y-dược (bác sĩ, dược sĩ, điều dưỡng...)</option>
                  <option value="26">Nghề nghiệp khác</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Tôn giáo</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_religion2_0" name="religion2_0" style="height:32px;">
                  <option value="0">-Chọn một-</option>
                  <option value="1">Không có Đạo</option>
                  <option value="2">Đạo Cơ Đốc giáo</option>
                  <option value="3">Đạo Phật</option>
                  <option value="4">Đạo Thiên Chúa</option>
                  <option value="5">Đạo Tin lành</option>
                  <option value="6">Đạo khác</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Hút thuốc</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_smoking2_0" name="smoking2_0" style="height:32px;">
                  <option value="0">-Chọn một-</option>
                  <option value="1">Không hút thuốc</option>
                  <option value="2">Chỉ hút xã giao</option>
                  <option value="3">Hút thuốc ít</option>
                  <option value="4">Hút thuốc nhiều</option>
                  <option value="5">Hút thuốc rất nhiều</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 12px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Uống rượu bia</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_drinking2_0" name="drinking2_0" style="height:32px;">
                  <option value="0">-Chọn một-</option>
                  <option value="1">Không uống rượu bia</option>
                  <option value="2">Chỉ uống xã giao</option>
                  <option value="3">Uống ít thôi</option>
                  <option value="4">Uống nhiều</option>
                  <option value="5">Uống rất nhiều</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mtop-ten" style="margin-bottom: 25px;">
            <div class="fieldWrapper form-group">
              <div class="col-xs-3 col-md-4 text-right ptop-six">
                <span class="labtext">
                  <b>Con cái</b>
                </span>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-7">
                <select class="pl-text select form-control" id="id_children2_0" name="children2_0" style="height:32px;">
                  <option value="0">-Chọn một-</option>
                  <option value="1">Chưa có</option>
                  <option value="2">Đã có &amp; Đang sống cùng</option>
                  <option value="3">Đã có &amp; Không sống cùng</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="row">
            <div class="col-xs-9 col-xs-offset-3 col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-4">
              <button class="btn btn-lg btn-block btn-success btn-sc-cus" id="id_submit" name="btnsubmit" type="submit" value="Đăng ký" style="font-weight: bold; font-size: 1.2em; padding: 10px;">
                Đăng ký!
              </button>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('themes/ehenho/js/drop_down.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // Show / Hide password
    $("#mask-pw").click(function(event) {
      var icon = $("#mask-pw-i");
      if (icon.hasClass("fa-eye-slash")) {
        icon.removeClass("fa-eye-slash").addClass("fa-eye");
        $("#mask-pw").html('&nbsp;<i id="mask-pw-i" class="fa fa-eye"></i>&nbsp;Hiện');
        $("#id_password").attr("type", "password");
      } else {
        icon.removeClass("fa-eye").addClass("fa-eye-slash");
        $("#mask-pw").html('&nbsp;<i id="mask-pw-i" class="fa fa-eye-slash"></i>&nbsp;Che');
        $("#id_password").attr("type", "text");
      }
    });

    // Date of birth bounds check
    function daysInMonth(month, year) {
      return new Date(year, month, 0).getDate();
    }

    $("#id_dob_month, #id_dob_year").change(function() {
      var y = parseInt($("#id_dob_year").val());
      var m = parseInt($("#id_dob_month").val());
      var days = daysInMonth(m, y);
      var curDay = parseInt($("#id_dob_day").val());

      $("#id_dob_day option").show();
      for (var d = 29; d <= 31; d++) {
        if (d > days) {
          $("#id_dob_day option[value='" + d + "']").hide();
        }
      }
      if (curDay > days) {
        $("#id_dob_day").val(days);
      }
    });
  });
</script>
@endpush
