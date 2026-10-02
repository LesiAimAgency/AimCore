@extends('themes.ehenho.layouts.account')

@section('title', 'Chỉnh sửa hồ sơ - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold;">
    <i class="fa fa-edit"></i> Chỉnh Sửa Hồ Sơ Hẹn Hò
  </div>

  <div class="panel-body" style="padding: 25px;">
    <form action="{{ route('ehenho.account.profile_update') }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="display_name">Tên hiển thị <span class="text-danger">*</span></label>
            <input type="text" name="display_name" id="display_name" class="form-control" value="{{ old('display_name', $profile->display_name) }}" required>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="gender">Giới tính <span class="text-danger">*</span></label>
            <select name="gender" id="gender" class="form-control" required>
              <option value="female" {{ old('gender', $profile->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
              <option value="male" {{ old('gender', $profile->gender) == 'male' ? 'selected' : '' }}>Nam</option>
              <option value="other" {{ old('gender', $profile->gender) == 'other' ? 'selected' : '' }}>Khác</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="age">Tuổi <span class="text-danger">*</span></label>
            <input type="number" name="age" id="age" class="form-control" min="18" max="90" value="{{ old('age', $profile->age) }}" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="province_id">Tỉnh / Thành phố</label>
            <select name="province_id" id="province_id" class="form-control">
              <option value="">-- Chọn Tỉnh / Thành phố --</option>
              @foreach($provinces as $prov)
                <option value="{{ $prov->id }}" {{ old('province_id', $profile->province_id) == $prov->id ? 'selected' : '' }}>
                  {{ $prov->name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="marital_status">Tình trạng hôn nhân</label>
            <select name="marital_status" id="marital_status" class="form-control">
              <option value="Độc thân" {{ old('marital_status', $profile->marital_status) == 'Độc thân' ? 'selected' : '' }}>Độc thân</option>
              <option value="Ly dị" {{ old('marital_status', $profile->marital_status) == 'Ly dị' ? 'selected' : '' }}>Ly dị</option>
              <option value="Ở góa" {{ old('marital_status', $profile->marital_status) == 'Ở góa' ? 'selected' : '' }}>Ở góa</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="occupation">Nghề nghiệp</label>
            <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Ví dụ: Nhân viên văn phòng, Kinh doanh..." value="{{ old('occupation', $profile->occupation) }}">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="height">Chiều cao (cm)</label>
            <input type="text" name="height" id="height" class="form-control" placeholder="Ví dụ: 165" value="{{ old('height', $profile->height) }}">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="education">Trình độ học vấn</label>
            <input type="text" name="education" id="education" class="form-control" placeholder="Ví dụ: Đại học, Cao đẳng..." value="{{ old('education', $profile->education) }}">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="interests">Sở thích cá nhân</label>
        <input type="text" name="interests" id="interests" class="form-control" placeholder="Ví dụ: Du lịch, Đọc sách, Nấu ăn, Xem phim..." value="{{ old('interests', $profile->interests) }}">
      </div>

      <div class="form-group">
        <label for="looking_for">Mục tiêu / Người tôi đang tìm kiếm</label>
        <input type="text" name="looking_for" id="looking_for" class="form-control" placeholder="Ví dụ: Tìm bạn gái nghiêm túc để đi đến hôn nhân..." value="{{ old('looking_for', $profile->looking_for) }}">
      </div>

      <div class="form-group">
        <label for="about_me">Giới thiệu bản thân chi tiết</label>
        <textarea name="about_me" id="about_me" class="form-control" rows="5" placeholder="Chia sẻ đôi nét về bản thân bạn, tính cách, quan niệm sống...">{{ old('about_me', $profile->about_me) }}</textarea>
      </div>

      <div style="margin-top: 25px;">
        <button type="submit" class="btn btn-success btn-lg btn-sc-cus">
          <i class="fa fa-save"></i> Cập Nhật Hồ Sơ
        </button>
        <a href="{{ route('ehenho.account.my_profile') }}" class="btn btn-default btn-lg" style="margin-left: 10px;">
          Hủy bỏ
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
