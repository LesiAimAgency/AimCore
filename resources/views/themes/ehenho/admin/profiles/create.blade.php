@extends('cms.layouts.app')

@section('title', 'Thêm Thành Viên Mới - eHenho')
@section('page-title', 'Thêm Thành Viên Hồ Sơ Hẹn Hò Mới')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<div class="p-4 sm:p-6 max-w-7xl mx-auto space-y-6">

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

    <form method="POST" action="{{ route('project.admin.ehenho.profiles.store', $projectCode) }}" enctype="multipart/form-data" id="create_profile_form">
        @csrf

        <!-- Sticky Header Bar -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 sm:p-5 mb-6 sticky top-4 z-20">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 font-bold flex items-center justify-center text-lg shadow-sm">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-base font-bold text-slate-900 m-0">Tạo Thành Viên Mới</h2>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700">
                                Đầy đủ thông tin đăng ký + Ảnh đại diện
                            </span>
                        </div>
                        <p class="text-xs text-slate-400 m-0">Tự động khởi tạo tài khoản đăng nhập User và hồ sơ hẹn hò Profile tương ứng.</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="px-3 py-2 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-600 text-xs font-semibold transition">
                        Quay lại danh sách
                    </a>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-sm inline-flex items-center gap-1.5">
                        <i class="fa-solid fa-check text-xs"></i>
                        <span>Lưu & Tạo Thành Viên</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- CỘT TRÁI (2/3): DỮ LIỆU ĐĂNG KÝ -->
            <div class="lg:col-span-2 space-y-6">

                <!-- PHẦN 1: TÀI KHOẢN ĐĂNG NHẬP -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-key text-blue-600 text-sm"></i>
                            <h3 class="text-sm font-bold text-slate-900 m-0">1. Tài Khoản Đăng Nhập (Bắt buộc)</h3>
                        </div>
                        <span class="text-[11px] text-slate-400 font-medium">Dùng để thành viên đăng nhập eHenho</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Địa chỉ Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: thanhvien@gmail.com">
                            <span class="text-[10px] text-slate-400 mt-1 block">Email là duy nhất, không trùng với thành viên khác.</span>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Mật khẩu <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="input_password" value="{{ old('password', '123456') }}" required minlength="6" class="w-full pl-3 pr-10 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Tối thiểu 6 ký tự">
                                <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600 text-xs">
                                    <i class="fa-solid fa-eye" id="toggle_pw_icon"></i>
                                </button>
                            </div>
                            <span class="text-[10px] text-slate-400 mt-1 block">Mặc định: 123456 (có thể thay đổi).</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Tên đăng nhập (Username) <span class="text-slate-400 font-normal">(tùy chọn, để trống sẽ tự sinh theo tên)</span>
                        </label>
                        <input type="text" name="username" value="{{ old('username') }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-mono focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: nguyen_van_a">
                    </div>
                </div>

                <!-- PHẦN 2: THÔNG TIN CƠ BẢN -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-id-card text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">2. Thông Tin Cơ Bản (Theo mẫu Đăng ký)</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Tên / Tên hiển thị <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="input_name" value="{{ old('name') }}" required minlength="2" maxlength="150" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none font-medium" placeholder="VD: Mai Lan, Hoàng Nam, Peter...">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Slug URL <span class="text-slate-400 font-normal">(tùy chọn)</span>
                            </label>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-mono focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Để trống hệ thống sẽ tự sinh slug">
                        </div>
                    </div>

                    <!-- Ngày sinh / Tuổi -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-100 space-y-2">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-slate-700 m-0">
                                Ngày sinh &amp; Tuổi <span class="text-red-500">*</span>
                            </label>
                            <span class="text-[11px] text-slate-500 font-medium" id="computed_age_text">Tuổi tính toán: <strong>26 tuổi</strong></span>
                        </div>
                        <div class="grid grid-cols-3 sm:grid-cols-4 gap-2">
                            <div>
                                <select name="dob_day" id="id_dob_day" class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    @for($d = 1; $d <= 31; $d++)
                                        <option value="{{ $d }}" {{ old('dob_day', 15) == $d ? 'selected' : '' }}>Ngày {{ $d }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <select name="dob_month" id="id_dob_month" class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    @for($m = 1; $m <= 12; $m++)
                                        <option value="{{ $m }}" {{ old('dob_month', 6) == $m ? 'selected' : '' }}>Tháng {{ $m }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <select name="dob_year" id="id_dob_year" class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    @for($y = 2008; $y >= 1950; $y--)
                                        <option value="{{ $y }}" {{ old('dob_year', 1998) == $y ? 'selected' : '' }}>Năm {{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-span-3 sm:col-span-1">
                                <input type="number" name="age" id="id_age_override" value="{{ old('age', 26) }}" min="18" max="99" class="w-full px-2.5 py-1.5 border border-slate-200 rounded-lg text-xs bg-white font-bold text-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Tuổi">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Giới tính (Tôi là) <span class="text-red-500">*</span></label>
                            <select name="gender" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="female" {{ old('gender', 'female') === 'female' ? 'selected' : '' }}>Nữ (Nữ tìm nam)</option>
                                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Nam (Nam tìm nữ)</option>
                                <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Khác</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Hôn nhân <span class="text-red-500">*</span></label>
                            <select name="marital_status" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                @foreach($maritalStatusMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('marital_status', 'single') === $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Mục tiêu tìm kiếm <span class="text-red-500">*</span></label>
                            <select name="look_for" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none font-semibold text-rose-600">
                                @foreach($lookForMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('look_for', 'long-term-love') === $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Chiều cao (cm) <span class="text-red-500">*</span></label>
                            <select name="height" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                @for($h = 130; $h <= 199; $h++)
                                    <option value="{{ $h }}" {{ old('height', 165) == $h ? 'selected' : '' }}>{{ $h }} cm</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Cân nặng (kg) <span class="text-red-500">*</span></label>
                            <select name="weight" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                @for($w = 30; $w <= 150; $w++)
                                    <option value="{{ $w }}" {{ old('weight', 52) == $w ? 'selected' : '' }}>{{ $w }} kg</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Học vấn <span class="text-red-500">*</span></label>
                            <select name="education" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                @foreach($educationMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('education', 'BAC') === $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Nơi ở & Quận huyện -->
                    <div class="space-y-3 pt-2 border-t border-slate-100">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Nơi ở (Quốc gia / Tỉnh thành) <span class="text-red-500">*</span></label>
                                <select name="province" id="id_province" required onchange="onProvinceChange(this)" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    <optgroup label="── 🌏 QUỐC GIA QUỐC TẾ ──">
                                        <option value="japan" {{ old('province') === 'japan' ? 'selected' : '' }}>🇯🇵 Nhật Bản (Nhật)</option>
                                        <option value="usa" {{ old('province') === 'usa' ? 'selected' : '' }}>🇺🇸 USA – Mỹ</option>
                                        <option value="australia" {{ old('province') === 'australia' ? 'selected' : '' }}>🇦🇺 Úc (Australia)</option>
                                        <option value="canada" {{ old('province') === 'canada' ? 'selected' : '' }}>🇨🇦 Canada</option>
                                        <option value="germany" {{ old('province') === 'germany' ? 'selected' : '' }}>🇩🇪 Đức (Germany)</option>
                                        <option value="south-korea" {{ old('province') === 'south-korea' ? 'selected' : '' }}>🇰🇷 Hàn Quốc</option>
                                        <option value="taiwan" {{ old('province') === 'taiwan' ? 'selected' : '' }}>🇹🇼 Đài Loan</option>
                                        <option value="england" {{ old('province') === 'england' ? 'selected' : '' }}>🇬🇧 Anh (UK)</option>
                                        <option value="france" {{ old('province') === 'france' ? 'selected' : '' }}>🇫🇷 Pháp (France)</option>
                                        <option value="singapore" {{ old('province') === 'singapore' ? 'selected' : '' }}>🇸🇬 Singapore</option>
                                        <option value="other-country" {{ old('province') === 'other-country' ? 'selected' : '' }}>Quốc gia khác</option>
                                    </optgroup>
                                    <optgroup label="── 🇻🇳 TỈNH / THÀNH PHỐ VIỆT NAM ──">
                                        <option value="ho-chi-minh" {{ old('province', 'ho-chi-minh') === 'ho-chi-minh' ? 'selected' : '' }}>TP. Hồ Chí Minh</option>
                                        <option value="ha-noi" {{ old('province') === 'ha-noi' ? 'selected' : '' }}>Hà Nội</option>
                                        <option value="da-nang" {{ old('province') === 'da-nang' ? 'selected' : '' }}>Đà Nẵng</option>
                                        <option value="hai-phong" {{ old('province') === 'hai-phong' ? 'selected' : '' }}>Hải Phòng</option>
                                        <option value="can-tho" {{ old('province') === 'can-tho' ? 'selected' : '' }}>Cần Thơ</option>
                                        <option value="binh-duong" {{ old('province') === 'binh-duong' ? 'selected' : '' }}>Bình Dương</option>
                                        <option value="dong-nai" {{ old('province') === 'dong-nai' ? 'selected' : '' }}>Đồng Nai</option>
                                        <option value="ba-ria-vung-tau" {{ old('province') === 'ba-ria-vung-tau' ? 'selected' : '' }}>Bà Rịa - Vũng Tàu</option>
                                        @foreach($provinces->filter(fn($p) => !in_array($p->id, [68, 64, 65, 66, 67])) as $prov)
                                            @php $slugProv = \Illuminate\Support\Str::slug($prov->name); @endphp
                                            @if(!in_array($slugProv, ['ho-chi-minh', 'ha-noi', 'da-nang', 'hai-phong', 'can-tho', 'binh-duong', 'dong-nai', 'ba-ria-vung-tau']))
                                                <option value="{{ $slugProv }}" {{ old('province') === $slugProv ? 'selected' : '' }}>
                                                    {{ preg_replace('/^(Tỉnh|Thành phố)\s+/u', '', $prov->name) }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>

                            <!-- Quận Huyện -->
                            <div id="district_box">
                                <label class="block text-xs font-bold text-slate-700 mb-1">
                                    Quận / Huyện / Thị xã
                                    <span id="district_subtext" class="text-slate-400 font-normal">(thuộc tỉnh thành)</span>
                                </label>
                                <select name="district" id="id_district" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    <option value="">-- Chọn Quận / Huyện / Thị xã --</option>
                                </select>
                                <input type="text" name="district_custom" id="id_district_custom" style="display:none;" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Tokyo - Shinjuku, Osaka, California...">
                            </div>
                        </div>

                        <!-- Checkbox gán chuyên mục Nổi bật ở Nhật -->
                        <div id="japan_feature_box" class="p-3 bg-slate-50 border border-slate-200 rounded-xl transition-all">
                            <label class="flex items-start gap-2.5 cursor-pointer">
                                <input type="hidden" name="is_in_japan" value="0">
                                <input type="checkbox" id="is_in_japan_checkbox" name="is_in_japan" value="1" {{ old('is_in_japan') ? 'checked' : '' }} onchange="toggleJapanStatus(this.checked)" class="mt-0.5 w-4 h-4 text-rose-600 rounded border-slate-300 focus:ring-rose-500">
                                <div class="flex-1">
                                    <span class="text-xs font-bold text-slate-800 flex items-center gap-1.5">
                                        <span>🇯🇵</span> Gán hồ sơ này vào chuyên mục "Tìm bạn bốn phương ở Nhật" (/tim-ban-bon-phuong-o-nhat)
                                    </span>
                                    <div class="flex flex-wrap items-center gap-1 mt-1.5" id="japan_city_chips">
                                        <span class="text-[10px] text-slate-400 font-semibold">Chọn nhanh:</span>
                                        <button type="button" onclick="setJapanCity('Tokyo - Shinjuku')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Tokyo</button>
                                        <button type="button" onclick="setJapanCity('Osaka')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Osaka</button>
                                        <button type="button" onclick="setJapanCity('Nagoya - Aichi')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Nagoya</button>
                                        <button type="button" onclick="setJapanCity('Yokohama - Kanagawa')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Yokohama</button>
                                        <button type="button" onclick="setJapanCity('Fukuoka')" class="px-2 py-0.5 bg-white border border-rose-200 text-rose-700 hover:bg-rose-100 rounded text-[10px] font-semibold transition">Fukuoka</button>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Tiêu đề hồ sơ & Nội dung -->
                    <div class="space-y-4 pt-2 border-t border-slate-100">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Tiêu đề hồ sơ (Headline) <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="headline" value="{{ old('headline') }}" required maxlength="120" minlength="2" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: 'Em mộc mạc', 'Anh chân thành', 'Em chung tình', 'Tìm bạn trăm năm'...">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Về tôi (Giới thiệu bản thân) <span class="text-red-500">*</span>
                            </label>
                            <textarea name="i_am" rows="4" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none leading-relaxed" placeholder="Giới thiệu thêm về bạn như cuộc sống, ước mơ, quan điểm hay bất cứ điều gì riêng có ở bạn...">{{ old('i_am') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">
                                Tìm người (Mẫu người tìm kiếm) <span class="text-red-500">*</span>
                            </label>
                            <textarea name="my_match" rows="3" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none leading-relaxed" placeholder="Bạn tìm người như thế nào? Tiêu chuẩn tính cách, ngoại hình, lối sống...">{{ old('my_match') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- PHẦN 3: THÔNG TIN CHI TIẾT HƠN -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-sliders text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">3. Thông Tin Chi Tiết Hơn (Theo mẫu Đăng ký)</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Dáng người (Ngoại hình)</label>
                            <select name="appearance2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một Dáng người -</option>
                                @foreach($appearanceMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('appearance2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nghề nghiệp</label>
                            <select name="occupation2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn Lĩnh vực nghề nghiệp -</option>
                                @foreach($occupationMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('occupation2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Sở thích chính</label>
                            <select name="interest2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một Sở thích chính -</option>
                                @foreach($interestMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('interest2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tính cách chính</label>
                            <select name="personality2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một Tính cách chính -</option>
                                @foreach($personalityMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('personality2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Lối sống chính</label>
                            <select name="way_of_life" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một Lối sống chính -</option>
                                @foreach($wayOfLifeMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('way_of_life') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Quý giá nhất đối với bạn</label>
                            <select name="most_valued" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn cái Quý giá nhất -</option>
                                @foreach($mostValuedMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('most_valued') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tôn giáo</label>
                            <select name="religion2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một -</option>
                                @foreach($religionMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('religion2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Hút thuốc</label>
                            <select name="smoking2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một -</option>
                                @foreach($smokingMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('smoking2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Uống rượu bia</label>
                            <select name="drinking2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một -</option>
                                @foreach($drinkingMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('drinking2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Con cái</label>
                            <select name="children2_0" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="0">- Chọn một -</option>
                                @foreach($childrenMap as $code => $label)
                                    <option value="{{ $code }}" {{ old('children2_0') == $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CỘT PHẢI (1/3): ẢNH ĐẠI DIỆN & CÀI ĐẶT QUẢN TRỊ -->
            <div class="space-y-6">

                <!-- ẢNH ĐẠI DIỆN (AVATAR) -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-camera text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">Ảnh Đại Diện (Avatar)</h3>
                    </div>

                    <div class="text-center">
                        <div class="inline-block relative">
                            <img id="avatar-preview-img" src="{{ asset('themes/ehenho/images/df_picture.png') }}" alt="Xem trước ảnh đại diện" class="w-36 h-36 object-cover rounded-2xl border-4 border-slate-100 shadow-md mx-auto">
                            <div id="avatar-badge" class="absolute bottom-1 right-1 bg-slate-300 w-4 h-4 rounded-full border-2 border-white" title="Chưa chọn ảnh"></div>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-2">Xem trước ảnh đại diện</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Tải file ảnh đại diện từ máy tính
                        </label>
                        <input type="file" name="avatar_file" id="avatar_file_input" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-slate-200 rounded-xl p-1">
                        <span class="text-[10px] text-slate-400 mt-1 block">Định dạng JPG, PNG, WEBP. Tối đa 5MB.</span>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Hoặc dán đường dẫn ảnh (URL)
                        </label>
                        <input type="text" name="avatar_url" id="avatar_url_input" value="{{ old('avatar_url') }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-mono focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="https://... hoặc themes/ehenho/images/...">
                    </div>
                </div>

                <!-- CÀI ĐẶT TRẠNG THÁI & QUẢN TRỊ -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                        <i class="fa-solid fa-shield-halved text-blue-600 text-sm"></i>
                        <h3 class="text-sm font-bold text-slate-900 m-0">Thiết Lập Quản Trị</h3>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Trạng thái hồ sơ <span class="text-red-500">*</span></label>
                        <select name="status" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs font-bold focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }} class="text-emerald-600 font-bold">Hoạt động bình thường</option>
                            <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }} class="text-amber-600 font-bold">Chờ duyệt</option>
                            <option value="blocked" {{ old('status') === 'blocked' ? 'selected' : '' }} class="text-red-600 font-bold">Khóa tài khoản</option>
                        </select>
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300 focus:ring-blue-500">
                            <div>
                                <span class="text-xs font-bold text-slate-800">Hồ sơ nổi bật (Featured)</span>
                                <p class="text-[11px] text-slate-400 m-0">Ưu tiên xuất hiện đầu danh sách và trang chủ</p>
                            </div>
                        </label>
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Quyền riêng tư (Privacy Option)
                        </label>
                        <input type="text" name="privacy_option" value="{{ old('privacy_option', 'Chỉ nhận tin nhắn từ hồ sơ có hình đại diện.') }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="VD: Chỉ nhận tin nhắn từ hồ sơ có hình đại diện.">
                    </div>
                </div>

                <!-- Card Submit Button -->
                <div class="bg-emerald-50 rounded-2xl border border-emerald-200 p-5 text-center space-y-3">
                    <p class="text-xs text-emerald-800 font-medium m-0">Nhấn nút bên dưới để tạo ngay tài khoản đăng nhập và hồ sơ hẹn hò cho thành viên mới.</p>
                    <button type="submit" class="w-full py-2.5 px-4 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition shadow-md flex items-center justify-center gap-2">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Lưu & Tạo Thành Viên Mới</span>
                    </button>
                    <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="block text-xs text-slate-500 hover:text-slate-700 font-semibold">
                        &larr; Hủy & quay lại danh sách
                    </a>
                </div>

            </div>

        </div>
    </form>

</div>

<script>
    function togglePasswordVisibility() {
        const input = document.getElementById('input_password');
        const icon = document.getElementById('toggle_pw_icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Auto-calculate age from day, month, year
    function calculateAge() {
        const d = parseInt(document.getElementById('id_dob_day').value) || 1;
        const m = parseInt(document.getElementById('id_dob_month').value) || 1;
        const y = parseInt(document.getElementById('id_dob_year').value) || 1998;

        const today = new Date();
        let age = today.getFullYear() - y;
        const birthDateThisYear = new Date(today.getFullYear(), m - 1, d);
        if (today < birthDateThisYear) {
            age--;
        }
        if (age < 18) age = 18;

        const ageInput = document.getElementById('id_age_override');
        if (ageInput) ageInput.value = age;
        const ageText = document.getElementById('computed_age_text');
        if (ageText) ageText.innerHTML = `Tuổi tính toán: <strong>${age} tuổi</strong>`;
    }

    document.getElementById('id_dob_day')?.addEventListener('change', calculateAge);
    document.getElementById('id_dob_month')?.addEventListener('change', calculateAge);
    document.getElementById('id_dob_year')?.addEventListener('change', calculateAge);

    // Japan checkbox toggle
    function toggleJapanStatus(checked) {
        const provSelect = document.getElementById('id_province');
        const distBox = document.getElementById('district_box');
        const distCustom = document.getElementById('id_district_custom');
        const distSelect = document.getElementById('id_district');
        const box = document.getElementById('japan_feature_box');

        if (checked) {
            if (provSelect) provSelect.value = 'japan';
            if (distSelect) distSelect.style.display = 'none';
            if (distCustom) {
                distCustom.style.display = 'block';
                if (!distCustom.value) distCustom.value = 'Tokyo - Shinjuku, Nhật Bản';
            }
            if (box) {
                box.classList.remove('bg-slate-50', 'border-slate-200');
                box.classList.add('bg-rose-50/70', 'border-rose-200');
            }
        } else {
            if (provSelect && provSelect.value === 'japan') {
                provSelect.value = 'ho-chi-minh';
                onProvinceChange(provSelect);
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
        const distCustom = document.getElementById('id_district_custom');
        if (distCustom) {
            distCustom.value = city + ', Nhật Bản';
        }
    }

    // Provinces and Districts JSON cache
    let cachedProvinces = null;
    const FOREIGN_SLUGS = ['japan', 'usa', 'australia', 'canada', 'germany', 'south-korea', 'taiwan', 'england', 'france', 'singapore', 'other-country'];

    const SLUG_TO_PROV_CODE = {
        "ho-chi-minh": 79, "ha-noi": 1, "da-nang": 48, "hai-phong": 31, "can-tho": 92,
        "an-giang": 89, "ba-ria-vung-tau": 77, "bac-giang": 24, "bac-kan": 6, "bac-lieu": 95,
        "bac-ninh": 27, "ben-tre": 83, "binh-dinh": 52, "binh-duong": 74, "binh-phuoc": 70,
        "binh-thuan": 60, "ca-mau": 96, "cao-bang": 4, "dak-lak": 66, "dak-nong": 67,
        "dien-bien": 11, "dong-nai": 75, "dong-thap": 87, "gia-lai": 64, "ha-giang": 2,
        "ha-nam": 35, "ha-tinh": 42, "hai-duong": 30, "hau-giang": 93, "hoa-binh": 17,
        "hung-yen": 33, "khanh-hoa": 56, "kien-giang": 91, "kon-tum": 62, "lai-chau": 12,
        "lam-dong": 68, "lang-son": 20, "lao-cai": 10, "long-an": 80, "nam-dinh": 36,
        "nghe-an": 40, "ninh-binh": 37, "ninh-thuan": 58, "phu-tho": 25, "phu-yen": 54,
        "quang-binh": 44, "quang-nam": 49, "quang-ngai": 51, "quang-ninh": 22, "quang-tri": 45,
        "soc-trang": 94, "son-la": 14, "tay-ninh": 72, "thai-binh": 34, "thai-nguyen": 19,
        "thanh-hoa": 38, "hue": 46, "tien-giang": 82, "tra-vinh": 84, "tuyen-quang": 8,
        "vinh-long": 86, "vinh-phuc": 26, "yen-bai": 15
    };

    async function loadProvincesData() {
        if (cachedProvinces) return cachedProvinces;
        try {
            const res = await fetch('/themes/ehenho/js/vietnam_provinces.json');
            if (res.ok) {
                cachedProvinces = await res.json();
                return cachedProvinces;
            }
        } catch (e) {
            console.warn('Could not load local provinces JSON:', e);
        }
        return null;
    }

    async function onProvinceChange(select) {
        const val = select.value;
        const isForeign = FOREIGN_SLUGS.includes(val);
        const distSelect = document.getElementById('id_district');
        const distCustom = document.getElementById('id_district_custom');
        const distSubtext = document.getElementById('district_subtext');
        const japanCb = document.getElementById('is_in_japan_checkbox');

        if (japanCb) {
            japanCb.checked = (val === 'japan');
            const box = document.getElementById('japan_feature_box');
            if (box) {
                if (val === 'japan') {
                    box.classList.remove('bg-slate-50', 'border-slate-200');
                    box.classList.add('bg-rose-50/70', 'border-rose-200');
                } else {
                    box.classList.remove('bg-rose-50/70', 'border-rose-200');
                    box.classList.add('bg-slate-50', 'border-slate-200');
                }
            }
        }

        if (isForeign) {
            distSelect.style.display = 'none';
            distCustom.style.display = 'block';
            distSubtext.textContent = '(Thành phố / Khu vực nước ngoài)';
            if (val === 'japan') {
                distCustom.placeholder = 'VD: Tokyo - Shinjuku, Osaka...';
            } else if (val === 'usa') {
                distCustom.placeholder = 'VD: California, Texas, New York...';
            } else {
                distCustom.placeholder = 'VD: Khu vực / Thành phố sinh sống...';
            }
            return;
        }

        distSelect.style.display = 'block';
        distCustom.style.display = 'none';
        distSubtext.textContent = '(thuộc tỉnh thành)';

        const provCode = SLUG_TO_PROV_CODE[val];
        const data = await loadProvincesData();
        distSelect.innerHTML = '<option value="">-- Chọn Quận / Huyện / Thị xã --</option>';

        if (data && provCode) {
            const matchedProv = data.find(p => p.code === provCode);
            if (matchedProv && matchedProv.districts) {
                matchedProv.districts.forEach(d => {
                    const opt = document.createElement('option');
                    opt.value = d.name;
                    opt.textContent = d.name;
                    distSelect.appendChild(opt);
                });
            }
        }
    }

    // Avatar preview
    document.getElementById('avatar_file_input')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                document.getElementById('avatar-preview-img').src = evt.target.result;
                const badge = document.getElementById('avatar-badge');
                if (badge) {
                    badge.classList.remove('bg-slate-300');
                    badge.classList.add('bg-emerald-500');
                    badge.title = 'Đã chọn ảnh';
                }
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('avatar_url_input')?.addEventListener('input', function(e) {
        const url = e.target.value.trim();
        if (url && (url.startsWith('http://') || url.startsWith('https://'))) {
            document.getElementById('avatar-preview-img').src = url;
            const badge = document.getElementById('avatar-badge');
            if (badge) {
                badge.classList.remove('bg-slate-300');
                badge.classList.add('bg-emerald-500');
            }
        }
    });

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        calculateAge();
        const provSelect = document.getElementById('id_province');
        if (provSelect) {
            onProvinceChange(provSelect);
        }
    });
</script>
@endsection
