<div class="panel panel-default search-filter-panel" style="border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.08); margin-bottom: 20px;">
  <div class="panel-heading" style="background-color: #f7f9fa; font-weight: bold; color: #2e5d69;">
    <i class="fa fa-filter"></i> Bộ Lọc Tìm Bạn Bốn Phương
  </div>
  <div class="panel-body">
    <form action="{{ route('ehenho.search.index') }}" method="GET" class="form-horizontal">
      <div class="row">
        <div class="col-sm-3" style="margin-bottom: 10px;">
          <label class="control-label" style="text-align: left; display: block;">Tôi muốn tìm:</label>
          <select name="gender" class="form-control">
            <option value="female" {{ request('gender') === 'female' ? 'selected' : '' }}>Tìm Nữ (Bạn gái)</option>
            <option value="male" {{ request('gender') === 'male' ? 'selected' : '' }}>Tìm Nam (Bạn trai)</option>
            <option value="all" {{ request('gender') === 'all' ? 'selected' : '' }}>Tất cả</option>
          </select>
        </div>

        <div class="col-sm-4" style="margin-bottom: 10px;">
          <label class="control-label" style="text-align: left; display: block;">Độ tuổi:</label>
          <div class="form-inline">
            <input type="number" name="age_min" value="{{ request('age_min', 18) }}" min="18" max="75" class="form-control" style="width: 45%;" placeholder="Từ" />
            <span>&nbsp;-&nbsp;</span>
            <input type="number" name="age_max" value="{{ request('age_max', 45) }}" min="18" max="75" class="form-control" style="width: 45%;" placeholder="Đến" />
          </div>
        </div>

        <div class="col-sm-3" style="margin-bottom: 10px;">
          <label class="control-label" style="text-align: left; display: block;">Tỉnh / Thành phố:</label>
          <select name="province" class="form-control">
            <option value="">-- Tất cả 63 tỉnh thành --</option>
            @foreach(\App\Models\Ehenho\Province::orderBy('name')->get() as $p)
              <option value="{{ $p->id }}" {{ (string)request('province') === (string)$p->id ? 'selected' : '' }}>
                {{ $p->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-sm-2" style="margin-bottom: 10px; padding-top: 25px;">
          <button type="submit" class="btn btn-danger btn-block" style="font-weight: bold;">
            <i class="fa fa-search"></i> Tìm bạn
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
