@extends('cms.layouts.app')

@section('title', 'Chỉnh sửa Hồ sơ Hẹn hò: ' . $profile->display_name . ' - eHenho')
@section('page-title', 'Chỉnh Sửa Hồ Sơ Hẹn Hò: ' . $profile->display_name)

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<div class="p-4 sm:p-6 max-w-7xl mx-auto space-y-6">

    {{-- Thông báo thành công --}}
    @if(session('success'))
    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span class="text-xs font-semibold">{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 text-sm">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    @endif

    {{-- Lỗi validation --}}
    @if($errors->any())
    <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl shadow-sm">
        <div class="flex items-center gap-2 mb-2 font-bold text-xs text-red-700">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span>Vui lòng kiểm tra lại các mục sau:</span>
        </div>
        <ul class="list-disc list-inside text-xs space-y-1 text-red-600">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('project.admin.ehenho.profiles.update', ['projectCode' => $projectCode, 'id' => $profile->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Sticky Header Bar -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 sm:p-5 mb-6 sticky top-4 z-20">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    @if($profile->avatar)
                        <img src="{{ $profile->avatar }}" alt="{{ $profile->display_name }}" class="w-12 h-12 rounded-full object-cover border-2 border-blue-500 shadow-sm">
                    @else
                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-lg shadow-sm">
                            {{ strtoupper(substr($profile->display_name ?? 'U', 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-base font-bold text-slate-900 m-0">{{ $profile->display_name }}</h2>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $profile->status === 'blocked' ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700' }}">
                                {{ $profile->status === 'blocked' ? 'Đã khóa' : ($profile->status === 'pending' ? 'Chờ duyệt' : 'Hoạt động') }}
                            </span>
                            @if($profile->is_featured)
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700">
                                    <i class="fa-solid fa-star text-[9px] mr-0.5"></i> Nổi bật
                                </span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-400 font-mono m-0">ID: #{{ $profile->id }} &bull; Slug: {{ $profile->slug }} &bull; {{ $profile->location_text }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ url('/DA010/ho-so/' . ($profile->slug ?: $profile->id)) }}" target="_blank" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold inline-flex items-center gap-1.5 transition">
                        <i class="fa-solid fa-arrow-up-right-from-square text-[11px]"></i>
                        <span>Xem ngoài web</span>
                    </a>
                    <button type="button" onclick="if(confirm('Bạn có chắc chắn muốn xóa vĩnh viễn hồ sơ {{ $profile->display_name }} và tài khoản liên kết? Hành động này không thể hoàn tác.')) document.getElementById('delete-profile-form').submit();" class="px-3 py-2 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-xs font-semibold inline-flex items-center gap-1.5 transition">
                        <i class="fa-solid fa-trash-can text-[11px]"></i>
                        <span>Xóa thành viên</span>
                    </button>
                    <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="px-3 py-2 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-600 text-xs font-semibold transition">
                        Quay lại danh sách
                    </a>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-sm inline-flex items-center gap-1.5">
                        <i class="fa-solid fa-floppy-disk text-xs"></i>
                        <span>Lưu thay đổi</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- CỘT TRÁI (2/3): DỮ LIỆU CHI TIẾT -->
            <div class="lg:col-span-2 space-y-6">

                <!-- 1. Thông tin hiển thị & Tiêu đề -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-id-card text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">1. Thông Tin Hiển Thị & Tiêu Đề</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tên hiển thị (Display Name) <span class="text-red-500">*</span></label>
                            <input type="text" name="display_name" value="{{ old('display_name', $profile->display_name) }}" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Marcus Nguyen, Kevin Dang...">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Slug URL</label>
                            <input type="text" name="slug" value="{{ old('slug', $profile->slug) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-mono focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Để trống hệ thống sẽ tự sinh slug">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Tiêu đề lớn / Mục tiêu tìm kiếm (Target Type)
                            <span class="text-slate-400 font-normal">(Hiển thị chữ đỏ lớn trên trang hồ sơ)</span>
                        </label>
                        <input type="text" name="target_type" list="target_type_list" value="{{ old('target_type', $profile->target_type) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none font-semibold text-red-600" placeholder="VD: Tìm bạn trăm năm, Tìm người yêu lâu dài, Nam tìm nữ...">
                        <datalist id="target_type_list">
                            <option value="Tìm bạn trăm năm">
                            <option value="Tìm người yêu lâu dài">
                            <option value="Tìm bạn đời nghiêm túc">
                            <option value="Nam tìm nữ">
                            <option value="Nữ tìm nam">
                            <option value="Tìm bạn tâm sự">
                            <option value="Kết bạn bốn phương">
                        </datalist>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Tiêu đề hồ sơ / Trích dẫn (Headline)
                            <span class="text-slate-400 font-normal">(Hiển thị trong danh sách và trích dẫn cạnh tên)</span>
                        </label>
                        <input type="text" name="headline" value="{{ old('headline', $profile->headline) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Tìm bạn trăm năm - Bạn nữ chân thật, chịu khó và biết chăm lo tổ ấm.">
                    </div>
                </div>

                <!-- 2. Thông tin cơ bản & Nhân thân -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-user text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">2. Thông Tin Cơ Bản & Nhân Thân</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Giới tính <span class="text-red-500">*</span></label>
                            <select name="gender" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="male" {{ old('gender', $profile->gender) === 'male' ? 'selected' : '' }}>Nam</option>
                                <option value="female" {{ old('gender', $profile->gender) === 'female' ? 'selected' : '' }}>Nữ</option>
                                <option value="other" {{ old('gender', $profile->gender) === 'other' ? 'selected' : '' }}>Khác</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tuổi <span class="text-red-500">*</span></label>
                            <input type="number" name="age" value="{{ old('age', $profile->age) }}" min="18" max="99" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Ngày sinh</label>
                            <input type="date" name="birthday" value="{{ old('birthday', $profile->birthday ? $profile->birthday->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tình trạng hôn nhân</label>
                            <input type="text" name="marital_status" list="marital_status_list" value="{{ old('marital_status', $profile->marital_status) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Độc thân, Ly dị, Đã ly hôn, Góa...">
                            <datalist id="marital_status_list">
                                <option value="Độc thân">
                                <option value="Ly dị">
                                <option value="Đã ly hôn">
                                <option value="Góa">
                                <option value="Đang ly thân">
                                <option value="Đã kết hôn">
                            </datalist>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Con cái</label>
                            <input type="text" name="children" list="children_list" value="{{ old('children', $profile->children) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Đã có 1 con, Chưa có, Đã có 2 con...">
                            <datalist id="children_list">
                                <option value="Chưa có">
                                <option value="Đã có 1 con">
                                <option value="Đã có 2 con">
                                <option value="Đã có 3 con trở lên">
                                <option value="Sống cùng con">
                                <option value="Con đã trưởng thành">
                            </datalist>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Chiều cao (cm)</label>
                            <input type="text" name="height" value="{{ old('height', $profile->height) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: 175">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Cân nặng (kg)</label>
                            <input type="text" name="weight" value="{{ old('weight', $profile->weight) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: 75">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Dáng người</label>
                            <input type="text" name="body_type" list="body_type_list" value="{{ old('body_type', $profile->body_type) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Cao lớn, Cân đối, Thon thả...">
                            <datalist id="body_type_list">
                                <option value="Cao lớn">
                                <option value="Cân đối">
                                <option value="Thon thả">
                                <option value="Đầy đặn">
                                <option value="Săn chắc">
                                <option value="Nhỏ nhắn">
                                <option value="Thể thao">
                            </datalist>
                        </div>
                    </div>
                </div>

                <!-- 3. Địa điểm & Nơi ở -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-location-dot text-blue-600 text-sm"></i>
                            <h3 class="text-sm font-bold text-slate-900 m-0">3. Nơi Ở & Địa Điểm Sinh Sống</h3>
                        </div>
                        <span class="text-[11px] text-slate-400 font-medium">Hỗ trợ lọc tự động theo chuyên mục Tỉnh thành / Quốc gia</span>
                    </div>

                    @php
                        $isJapan = (bool) (
                            $profile->province_id == 68 || 
                            str_contains($profile->province_name ?? '', 'Nhật') || 
                            str_contains($profile->province_name ?? '', 'Japan') ||
                            str_contains($profile->district_name ?? '', 'Tokyo') ||
                            str_contains($profile->district_name ?? '', 'Osaka')
                        );
                    @endphp

                    <!-- Checkbox / Toggle đặc biệt: Chuyên mục Tìm bạn bốn phương ở Nhật -->
                    <div id="japan_feature_box" class="p-4 rounded-xl border {{ $isJapan ? 'bg-rose-50/70 border-rose-200' : 'bg-slate-50 border-slate-200' }} transition-all">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="hidden" name="is_in_japan" value="0">
                            <input type="checkbox" id="is_in_japan_checkbox" name="is_in_japan" value="1" {{ old('is_in_japan', $isJapan) ? 'checked' : '' }} onchange="toggleJapanStatus(this.checked)" class="mt-0.5 w-4 h-4 text-rose-600 rounded border-slate-300 focus:ring-rose-500">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="text-xs font-bold text-slate-800 flex items-center gap-1.5">
                                        <span class="text-sm">🇯🇵</span> Tích chọn gán vào chuyên mục "Tìm bạn bốn phương ở Nhật" (/tim-ban-bon-phuong-o-nhat)
                                    </span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-rose-100 text-rose-700">Chuyên mục Hot</span>
                                </div>
                                <p class="text-[11px] text-slate-500 mt-1 m-0">
                                    Khi tích chọn, hệ thống tự động thiết lập quốc gia là <strong>Nhật Bản (Japan)</strong> và đưa hồ sơ này vào trang tìm kiếm <a href="{{ route('ehenho.search.o_nhat') }}" target="_blank" class="text-blue-600 underline font-semibold">/tim-ban-bon-phuong-o-nhat</a>.
                                </p>
                                
                                <div class="flex flex-wrap items-center gap-1.5 mt-2.5 pt-2 border-t border-rose-100/60" id="japan_city_chips">
                                    <span class="text-[10px] text-slate-500 font-bold">Gợi ý nhanh thành phố ở Nhật:</span>
                                    <button type="button" onclick="setJapanCity('Tokyo - Shinjuku')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Tokyo</button>
                                    <button type="button" onclick="setJapanCity('Osaka')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Osaka</button>
                                    <button type="button" onclick="setJapanCity('Nagoya - Aichi')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Nagoya</button>
                                    <button type="button" onclick="setJapanCity('Yokohama - Kanagawa')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Yokohama</button>
                                    <button type="button" onclick="setJapanCity('Fukuoka')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Fukuoka</button>
                                    <button type="button" onclick="setJapanCity('Chiba')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Chiba</button>
                                    <button type="button" onclick="setJapanCity('Saitama')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Saitama</button>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Quick Location Presets (8 Sub-location Bar Presets) -->
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <span class="block text-[11px] font-bold text-slate-600 mb-1.5">Chọn nhanh khu vực theo Sub-Location Bar:</span>
                        <div class="flex flex-wrap gap-1.5">
                            <button type="button" onclick="setPresetLocation(68, 'Nhật Bản (Japan)', 'Tokyo, Nhật Bản', true)" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-white border border-rose-300 text-rose-700 hover:bg-rose-50 shadow-xs transition flex items-center gap-1">
                                <span>🇯🇵</span> Nhật Bản
                            </button>
                            @php
                                $presetCities = [
                                    'Hà Nội' => 'Thành phố Hà Nội',
                                    'TP.HCM' => 'Thành phố Hồ Chí Minh',
                                    'Đà Nẵng' => 'Thành phố Đà Nẵng',
                                    'Bình Dương' => 'Tỉnh Bình Dương',
                                    'Cần Thơ' => 'Thành phố Cần Thơ',
                                    'Hải Phòng' => 'Thành phố Hải Phòng',
                                    'Đồng Nai' => 'Tỉnh Đồng Nai',
                                ];
                            @endphp
                            @foreach($presetCities as $shortName => $fullName)
                                @php
                                    $matched = $provinces->first(fn($p) => str_contains($p->name, $shortName));
                                @endphp
                                @if($matched)
                                    <button type="button" onclick="setPresetLocation({{ $matched->id }}, '{{ $matched->name }}', '{{ $shortName }}', false)" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 shadow-xs transition">
                                        {{ $shortName }}
                                    </button>
                                @endif
                            @endforeach
                            <button type="button" onclick="setPresetLocation(64, 'Hoa Kỳ (Mỹ)', 'California, USA', false)" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 shadow-xs transition">
                                🇺🇸 Mỹ
                            </button>
                            <button type="button" onclick="setPresetLocation(65, 'Úc (Australia)', 'Melbourne, Úc', false)" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 shadow-xs transition">
                                🇦🇺 Úc
                            </button>
                            <button type="button" onclick="setPresetLocation(66, 'Canada', 'Toronto, Canada', false)" class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 shadow-xs transition">
                                🇨🇦 Canada
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tỉnh / Thành phố / Quốc gia (Danh mục)</label>
                            <select name="province_id" id="province_id_select" onchange="onProvinceSelectChange(this)" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="">-- Chọn tỉnh thành / quốc gia --</option>
                                <optgroup label="🌏 Quốc gia Nước ngoài (Tìm bạn hải ngoại)">
                                    @foreach($provinces->filter(fn($p) => $p->type === 'quoc_gia' || in_array($p->code, ['JP', 'US', 'AU', 'CA', 'DE'])) as $prov)
                                        <option value="{{ $prov->id }}" {{ (string)old('province_id', $profile->province_id) === (string)$prov->id ? 'selected' : '' }}>
                                            {{ $prov->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="🇻🇳 Tỉnh / Thành phố Việt Nam">
                                    @foreach($provinces->filter(fn($p) => $p->type !== 'quoc_gia' && !in_array($p->code, ['JP', 'US', 'AU', 'CA', 'DE'])) as $prov)
                                        <option value="{{ $prov->id }}" {{ (string)old('province_id', $profile->province_id) === (string)$prov->id ? 'selected' : '' }}>
                                            {{ $prov->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Tên tỉnh/quốc gia tùy chỉnh (Hiển thị chi tiết)
                            </label>
                            <input type="text" name="province_name" id="province_name_input" value="{{ old('province_name', $profile->province_name) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Nhật Bản (Japan), Đức (Germany), Hoa Kỳ...">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Khu vực cụ thể / Quận Huyện / Thành phố (District)
                            <span class="text-slate-400 font-normal">(Hiển thị trong bảng thông số "Nơi ở")</span>
                        </label>
                        <input type="text" name="district_name" id="district_name_input" value="{{ old('district_name', $profile->district_name) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Tokyo - Shinjuku, Osaka, hoặc Quận 1, Cầu Giấy...">
                    </div>
                </div>

                <!-- 4. Công việc, Học vấn & Thói quen -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-briefcase text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">4. Nghề Nghiệp, Học Vấn & Lối Sống</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nghề nghiệp (Occupation)</label>
                            <input type="text" name="occupation" value="{{ old('occupation', $profile->occupation) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Kỹ sư cơ khí chính xác tại Berlin">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Trình độ học vấn (Education)</label>
                            <input type="text" name="education" list="education_list" value="{{ old('education', $profile->education) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Kỹ sư, Đại học, Thạc sĩ...">
                            <datalist id="education_list">
                                <option value="Kỹ sư">
                                <option value="Đại học">
                                <option value="Thạc sĩ">
                                <option value="Tiến sĩ">
                                <option value="Cao đẳng">
                                <option value="Trung cấp">
                                <option value="Phổ thông">
                            </datalist>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tôn giáo (Religion)</label>
                            <input type="text" name="religion" list="religion_list" value="{{ old('religion', $profile->religion) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Không đạo, Phật giáo...">
                            <datalist id="religion_list">
                                <option value="Không đạo">
                                <option value="Công giáo">
                                <option value="Phật giáo">
                                <option value="Tin lành">
                                <option value="Hòa Hảo">
                                <option value="Cao Đài">
                            </datalist>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Hút thuốc (Smoking)</label>
                            <input type="text" name="smoking" list="smoking_list" value="{{ old('smoking', $profile->smoking) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Không hút thuốc, Có hút thuốc...">
                            <datalist id="smoking_list">
                                <option value="Không hút thuốc">
                                <option value="Có hút thuốc">
                                <option value="Thỉnh thoảng">
                                <option value="Đang cai thuốc">
                            </datalist>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Uống rượu bia (Drinking)</label>
                            <input type="text" name="drinking" list="drinking_list" value="{{ old('drinking', $profile->drinking) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Uống bia Đức xã giao, Không uống...">
                            <datalist id="drinking_list">
                                <option value="Không uống">
                                <option value="Uống xã giao">
                                <option value="Uống bia Đức xã giao">
                                <option value="Thỉnh thoảng">
                            </datalist>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tính cách (Personality)</label>
                            <input type="text" name="personality" value="{{ old('personality', $profile->personality) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Chính trực, cần cù, sống tình nghĩa">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Lối sống (Lifestyle)</label>
                            <input type="text" name="lifestyle" value="{{ old('lifestyle', $profile->lifestyle) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Quy củ, ngăn nắp">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Quý giá nhất (Precious)</label>
                            <input type="text" name="precious" value="{{ old('precious', $profile->precious) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Tình cảm gia đình">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Sở thích (Interests)</label>
                        <input type="text" name="interests" value="{{ old('interests', $profile->interests) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Kỹ thuật ô tô, du lịch châu Âu, nấu ăn...">
                    </div>
                </div>

                <!-- 5. Nội dung chi tiết: Về tôi & Tìm người -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-pen-fancy text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">5. Lời Giới Thiệu Bản Thân & Mẫu Người Tìm Kiếm</h3>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Về tôi (About Me)
                            <span class="text-slate-400 font-normal">(Hiển thị ở dòng "Về tôi" trên trang chi tiết)</span>
                        </label>
                        <textarea name="about_me" rows="4" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none leading-relaxed" placeholder="Chia sẻ về cuộc sống, công việc, quan điểm sống...">{{ old('about_me', $profile->about_me) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Tìm người (Looking For)
                            <span class="text-slate-400 font-normal">(Hiển thị ở dòng chữ đỏ "Tìm người" trên trang chi tiết)</span>
                        </label>
                        <textarea name="looking_for" rows="3" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none leading-relaxed font-medium text-slate-800" placeholder="Tiêu chuẩn hoặc mẫu người mong muốn tìm kiếm...">{{ old('looking_for', $profile->looking_for) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Tùy chọn hiển thị / Quyền riêng tư (Privacy Option)
                        </label>
                        <input type="text" name="privacy_option" value="{{ old('privacy_option', $profile->privacy_option) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Chỉ nhận tin nhắn từ hồ sơ có hình đại diện.">
                    </div>
                </div>

            </div>

            <!-- CỘT PHẢI (1/3): AVATAR & CÀI ĐẶT TRẠNG THÁI -->
            <div class="space-y-6">

                <!-- Ảnh đại diện -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-camera text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">Ảnh Đại Diện (Avatar)</h3>
                    </div>

                    <div class="text-center">
                        <div class="inline-block relative">
                            <img id="avatar-preview-img" src="{{ $profile->avatar ?: asset('themes/ehenho/images/df_picture.png') }}" alt="{{ $profile->display_name }}" class="w-36 h-36 object-cover rounded-2xl border-4 border-slate-100 shadow-md mx-auto">
                            @if($profile->avatar)
                                <div class="absolute bottom-1 right-1 bg-emerald-500 w-4 h-4 rounded-full border-2 border-white" title="Đã có ảnh"></div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Tải ảnh đại diện mới từ máy</label>
                        <input type="file" name="avatar_file" id="avatar_file_input" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-slate-200 rounded-xl p-1">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Hoặc đường dẫn ảnh đại diện (URL)</label>
                        <input type="text" name="avatar_url" id="avatar_url_input" value="{{ old('avatar_url', $profile->avatar_url) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-mono focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: themes/ehenho/images/avatars/... hoặc https://...">
                    </div>
                </div>

                <!-- Thông tin Tài khoản Đăng nhập (User Account) -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-user-shield text-blue-600 text-sm"></i>
                            <h3 class="text-sm font-bold text-slate-900 m-0">Tài Khoản Đăng Nhập</h3>
                        </div>
                        @if($profile->user_id)
                            <a href="{{ route('project.admin.users.edit', ['projectCode' => $projectCode, 'user' => $profile->user_id]) }}" target="_blank" class="text-[11px] text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center gap-1" title="Quản lý chi tiết tài khoản">
                                <span>CMS User #{{ $profile->user_id }}</span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                            </a>
                        @endif
                    </div>

                    @if($profile->user)
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tên đăng nhập (Username)</label>
                            <input type="text" name="user_username" value="{{ old('user_username', $profile->user->username) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-mono focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: user_ehenho_123">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Email tài khoản</label>
                            <input type="email" name="user_email" value="{{ old('user_email', $profile->user->email) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: user@ehenho.local">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Đổi mật khẩu mới <span class="text-slate-400 font-normal">(để trống nếu không đổi)</span></label>
                            <input type="password" name="user_password" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Tối thiểu 6 ký tự">
                        </div>

                        <div class="p-2.5 bg-slate-50 rounded-xl text-[11px] text-slate-500 flex items-center justify-between">
                            <span>Vai trò: <strong class="text-slate-700 uppercase">{{ $profile->user->role ?? 'USER' }}</strong></span>
                            <span>Trạng thái: <strong class="{{ $profile->user->status ? 'text-emerald-600' : 'text-red-500' }}">{{ $profile->user->status ? 'Kích hoạt' : 'Bị khóa' }}</strong></span>
                        </div>
                    @else
                        <div class="p-3 bg-amber-50 rounded-xl text-xs text-amber-700">
                            <i class="fa-solid fa-triangle-exclamation mr-1"></i> Hồ sơ này chưa liên kết tài khoản User hệ thống.
                        </div>
                    @endif
                </div>

                <!-- Thiết lập trạng thái & thời gian -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-gear text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">Trạng Thái & Hiển Thị</h3>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Trạng thái hồ sơ <span class="text-red-500">*</span></label>
                        <select name="status" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-bold focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="active" {{ old('status', $profile->status) === 'active' ? 'selected' : '' }} class="text-emerald-600 font-bold">Hoạt động bình thường</option>
                            <option value="pending" {{ old('status', $profile->status) === 'pending' ? 'selected' : '' }} class="text-amber-600 font-bold">Chờ duyệt</option>
                            <option value="blocked" {{ old('status', $profile->status) === 'blocked' ? 'selected' : '' }} class="text-red-600 font-bold">Đã khóa tài khoản</option>
                        </select>
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" value="1" {{ (old('is_featured') !== null ? (string) old('is_featured') === '1' : (bool) $profile->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300 focus:ring-blue-500">
                            <div>
                                <span class="text-xs font-bold text-slate-800">Hồ sơ nổi bật (Featured)</span>
                                <p class="text-[11px] text-slate-400 m-0">Ưu tiên hiển thị trên trang chủ và đầu danh sách</p>
                            </div>
                        </label>
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Lần đăng nhập / hoạt động cuối
                            <span class="text-slate-400 font-normal">(Last active)</span>
                        </label>
                        <input type="datetime-local" name="last_active_at" value="{{ old('last_active_at', $profile->last_active_at ? $profile->last_active_at->format('Y-m-d\TH:i') : '') }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <p class="text-[11px] text-slate-400 mt-1">Định dạng hiển thị ngoài web: <strong>{{ $profile->last_active_at ? $profile->last_active_at->format('d/m/Y h:i a') : date('d/m/Y h:i a') }}</strong></p>
                    </div>
                </div>

                <!-- Card Lưu thay đổi -->
                <div class="bg-blue-50 rounded-2xl border border-blue-100 p-5 text-center space-y-3">
                    <p class="text-xs text-blue-800 font-medium m-0">Nhấn Lưu thay đổi để áp dụng ngay toàn bộ dữ liệu cập nhật cho hồ sơ này.</p>
                    <button type="submit" class="w-full py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition shadow-md flex items-center justify-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Lưu Thay Đổi Hồ Sơ</span>
                    </button>
                    <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="block text-xs text-slate-500 hover:text-slate-700 font-semibold">
                        &larr; Hủy & quay lại danh sách
                    </a>
                </div>

            </div>

        </div>
    </form>

    <form id="delete-profile-form" method="POST" action="{{ route('project.admin.ehenho.profiles.destroy', ['projectCode' => $projectCode, 'id' => $profile->id]) }}" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</div>

<script>
    function toggleJapanStatus(checked) {
        const provSelect = document.getElementById('province_id_select');
        const provInput = document.getElementById('province_name_input');
        const distInput = document.getElementById('district_name_input');
        const box = document.getElementById('japan_feature_box');

        if (checked) {
            if (provSelect) {
                provSelect.value = '68'; // 68 is Nhật Bản (Japan)
            }
            if (provInput) {
                provInput.value = 'Nhật Bản (Japan)';
            }
            if (distInput && (!distInput.value || distInput.value.trim() === '')) {
                distInput.value = 'Tokyo - Shinjuku, Nhật Bản';
            }
            if (box) {
                box.classList.remove('bg-slate-50', 'border-slate-200');
                box.classList.add('bg-rose-50/70', 'border-rose-200');
            }
        } else {
            if (provSelect && provSelect.value === '68') {
                provSelect.value = '';
            }
            if (provInput && (provInput.value === 'Nhật Bản (Japan)' || provInput.value.includes('Nhật'))) {
                provInput.value = '';
            }
            if (box) {
                box.classList.remove('bg-rose-50/70', 'border-rose-200');
                box.classList.add('bg-slate-50', 'border-slate-200');
            }
        }
    }

    function setJapanCity(city) {
        const cb = document.getElementById('is_in_japan_checkbox');
        if (cb && !cb.checked) {
            cb.checked = true;
            toggleJapanStatus(true);
        }
        const distInput = document.getElementById('district_name_input');
        if (distInput) {
            distInput.value = city + ', Nhật Bản';
        }
    }

    function setPresetLocation(provId, provName, distName, isJapan) {
        const provSelect = document.getElementById('province_id_select');
        const provInput = document.getElementById('province_name_input');
        const distInput = document.getElementById('district_name_input');
        const cb = document.getElementById('is_in_japan_checkbox');

        if (provSelect) provSelect.value = provId;
        if (provInput) provInput.value = provName;
        if (distInput) distInput.value = distName;
        if (cb) {
            cb.checked = isJapan;
            toggleJapanStatus(isJapan);
        }
    }

    function onProvinceSelectChange(select) {
        const selectedText = select.options[select.selectedIndex]?.text?.trim() || '';
        const provInput = document.getElementById('province_name_input');
        if (provInput && selectedText && !selectedText.startsWith('--')) {
            provInput.value = selectedText;
        }

        const isJapan = select.value === '68' || selectedText.includes('Nhật') || selectedText.includes('Japan');
        const cb = document.getElementById('is_in_japan_checkbox');
        if (cb) {
            cb.checked = isJapan;
            toggleJapanStatus(isJapan);
        }
    }

    document.getElementById('avatar_file_input')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                document.getElementById('avatar-preview-img').src = evt.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('avatar_url_input')?.addEventListener('input', function(e) {
        const url = e.target.value.trim();
        if (url && (url.startsWith('http://') || url.startsWith('https://'))) {
            document.getElementById('avatar-preview-img').src = url;
        }
    });
</script>
@endsection
