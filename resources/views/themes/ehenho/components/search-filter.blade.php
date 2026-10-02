@props(['provinces' => null])

@php
  $provinceList = $provinces ?: \App\Models\Ehenho\Province::orderBy('name')->get();
@endphp

<div class="panel panel-default search-filter-panel" style="border: 1px solid #dcdcdc; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); margin-bottom: 20px;">
  <div class="panel-heading" style="background-color: #f7f9fa; font-weight: bold; color: #2e5d69; border-bottom: 1px solid #e5e5e5; font-size: 15px;">
    <i class="fa fa-filter" style="color: #00CAD6;"></i> Bộ Lọc Tìm Bạn Bốn Phương
  </div>
  <div class="panel-body" style="padding: 15px;">
    <form action="{{ route('ehenho.search.index') }}" method="GET" class="form-horizontal" id="search_filter_form">
      <div class="row">
        <!-- Gender -->
        <div class="col-sm-3 col-xs-12" style="margin-bottom: 12px;">
          <label class="control-label" style="text-align: left; display: block; font-weight: 600; color: #444; font-size: 13px;">
            <i class="fa fa-venus-mars text-primary"></i> Tôi muốn tìm:
          </label>
          <select name="gender" class="form-control" style="border-radius: 4px;">
            <option value="female" {{ request('gender') === 'female' ? 'selected' : '' }}>Tìm Nữ (Bạn gái)</option>
            <option value="male" {{ request('gender') === 'male' ? 'selected' : '' }}>Tìm Nam (Bạn trai)</option>
            <option value="all" {{ request('gender') === 'all' || !request('gender') ? 'selected' : '' }}>Tất cả</option>
          </select>
        </div>

        <!-- Age Range -->
        <div class="col-sm-3 col-xs-12" style="margin-bottom: 12px;">
          <label class="control-label" style="text-align: left; display: block; font-weight: 600; color: #444; font-size: 13px;">
            <i class="fa fa-calendar text-danger"></i> Độ tuổi:
          </label>
          <div class="input-group" style="width: 100%;">
            <input type="number" name="age_min" value="{{ request('age_min', 18) }}" min="18" max="80" class="form-control" style="width: 48%; float: left; border-radius: 4px 0 0 4px;" placeholder="Từ" />
            <input type="number" name="age_max" value="{{ request('age_max', 55) }}" min="18" max="80" class="form-control" style="width: 52%; float: left; border-radius: 0 4px 4px 0;" placeholder="Đến" />
          </div>
        </div>

        <!-- Province -->
        <div class="col-sm-3 col-xs-12" style="margin-bottom: 12px;">
          <label class="control-label" style="text-align: left; display: block; font-weight: 600; color: #444; font-size: 13px;">
            <i class="fa fa-map-marker text-success"></i> Nơi ở (Tỉnh thành):
          </label>
          <select name="province" class="form-control" style="border-radius: 4px;">
            <option value="">-- Toàn quốc --</option>
            @foreach($provinceList as $p)
              <option value="{{ $p->id }}" {{ (string)request('province') === (string)$p->id ? 'selected' : '' }}>
                {{ $p->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Looking For / Target -->
        <div class="col-sm-3 col-xs-12" style="margin-bottom: 12px;">
          <label class="control-label" style="text-align: left; display: block; font-weight: 600; color: #444; font-size: 13px;">
            <i class="fa fa-heart text-danger"></i> Mục tiêu tìm kiếm:
          </label>
          <select name="looking_for" class="form-control" style="border-radius: 4px;">
            <option value="">-- Mọi mục tiêu --</option>
            <option value="ket_hon" {{ request('looking_for') === 'ket_hon' ? 'selected' : '' }}>Tìm người để kết hôn</option>
            <option value="nguoi_yeu" {{ request('looking_for') === 'nguoi_yeu' ? 'selected' : '' }}>Tìm người yêu lâu dài</option>
            <option value="ban_doi" {{ request('looking_for') === 'ban_doi' ? 'selected' : '' }}>Tìm bạn đời nghiêm túc</option>
            <option value="tam_su" {{ request('looking_for') === 'tam_su' ? 'selected' : '' }}>Tìm bạn tâm sự</option>
            <option value="ban_be" {{ request('looking_for') === 'ban_be' ? 'selected' : '' }}>Tìm bạn bè mới</option>
          </select>
        </div>
      </div>

      <div class="row" style="margin-top: 5px; padding-top: 8px; border-top: 1px dashed #eee;">
        <!-- Marital Status -->
        <div class="col-sm-4 col-xs-12" style="margin-bottom: 8px;">
          <label style="font-weight: 600; color: #555; font-size: 13px;">Tình trạng hôn nhân:</label>
          <select name="marital_status" class="form-control" style="border-radius: 4px;">
            <option value="">-- Tất cả tình trạng --</option>
            <option value="doc_than" {{ request('marital_status') === 'doc_than' ? 'selected' : '' }}>Độc thân</option>
            <option value="ly_di" {{ request('marital_status') === 'ly_di' ? 'selected' : '' }}>Ly dị</option>
            <option value="o_goa" {{ request('marital_status') === 'o_goa' ? 'selected' : '' }}>Ở góa</option>
          </select>
        </div>

        <!-- Keyword -->
        <div class="col-sm-4 col-xs-12" style="margin-bottom: 8px;">
          <label style="font-weight: 600; color: #555; font-size: 13px;">Từ khóa / Tên gọi:</label>
          <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Nhập tên hoặc từ khóa..." style="border-radius: 4px;" />
        </div>

        <!-- Checkbox Has Photo & Submit -->
        <div class="col-sm-4 col-xs-12" style="padding-top: 22px;">
          <label class="checkbox-inline" style="font-size: 13px; font-weight: 600; color: #444; margin-right: 15px; margin-top: 5px;">
            <input type="checkbox" name="has_photo" value="1" {{ request('has_photo') ? 'checked' : '' }} /> Có hình đại diện
          </label>
          <button type="submit" class="btn btn-success btn-sc-cus pull-right" style="font-weight: bold; padding: 6px 18px; border-radius: 4px;">
            <i class="fa fa-search"></i> Lọc kết quả
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
