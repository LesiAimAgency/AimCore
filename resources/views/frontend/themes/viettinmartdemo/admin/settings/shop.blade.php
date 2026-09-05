@extends('admin.layouts.app')
@section('title', 'Cấu hình ' . __('common.shop'))
@section('page-title', 'Cấu hình ' . __('common.shop'))
@section('page-subtitle', 'Bộ lọc sản phẩm, danh mục, thuộc tính hiển thị ngoài shop')

@section('page-actions')
    <a href="{{ locale_route('admin.settings.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left text-xs"></i> Quay lại
    </a>
@endsection

@section('content')
@php
    $map        = $settings->pluck('value', 'key');
    $filterType = $map['price_filter_type'] ?? 'presets';
    $rawPresets = $map['price_presets'] ?? [];
    $presets    = is_array($rawPresets) ? $rawPresets : (json_decode($rawPresets, true) ?: []);
    $sliderMax  = (int) ($map['price_slider_max'] ?? 50000000);
    $showCategoryFilter = filter_var($map['show_category_filter'] ?? true, FILTER_VALIDATE_BOOLEAN);
    $rawAttrConfig = $map['attribute_filter_config'] ?? '[]';
    $attrConfig    = is_array($rawAttrConfig) ? $rawAttrConfig : (json_decode($rawAttrConfig, true) ?: []);
    $attrConfigMap = collect($attrConfig)->keyBy('id');
@endphp

<form action="{{ locale_route('admin.settings.group.update', 'shop') }}" method="POST"
      x-data="shopSettingsForm()" x-init="init()">
    @csrf @method('PUT')

    {{-- Tab Navigation --}}
    <div class="flex gap-1 mb-6 bg-white rounded-2xl p-1.5 border border-slate-100 shadow-sm w-fit">
        <button type="button" @click="tab='price'"
            :class="tab==='price' ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-500 hover:text-slate-700'"
            class="px-5 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-wider transition-all duration-200 flex items-center gap-2">
            <i class="fa-solid fa-tags"></i> Bộ lọc giá
        </button>
        <button type="button" @click="tab='category'"
            :class="tab==='category' ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-500 hover:text-slate-700'"
            class="px-5 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-wider transition-all duration-200 flex items-center gap-2">
            <i class="fa-solid fa-sitemap"></i> Danh mục
        </button>
        <button type="button" @click="tab='attributes'"
            :class="tab==='attributes' ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-500 hover:text-slate-700'"
            class="px-5 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-wider transition-all duration-200 flex items-center gap-2">
            <i class="fa-solid fa-sliders"></i> Thuộc tính
        </button>
        <button type="button" @click="tab='badges'"
            :class="tab==='badges' ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-slate-500 hover:text-slate-700'"
            class="px-5 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-wider transition-all duration-200 flex items-center gap-2">
            <i class="fa-solid fa-certificate"></i> Huy hiệu
        </button>
    </div>

    @php
        if (!function_exists('_murl_shop')) {
            function _murl_shop(?string $p, string $d = ''): string {
                if (!$p) return $d ? asset($d) : '';
                if (str_contains($p, '://')) return $p;
                if (str_starts_with($p, 'media/')) return \Illuminate\Support\Facades\Storage::disk('public')->url($p);
                return asset($p);
            }
        }
    @endphp

    <div class="grid gap-5" style="grid-template-columns:1fr 360px;align-items:start;">

        {{-- LEFT COLUMN --}}
        <div class="flex flex-col gap-5">

            {{-- ══ TAB: BỘ LỌC GIÁ ══ --}}
            <div x-show="tab==='price'" x-cloak class="flex flex-col gap-5">

                <div class="card">
                    <div class="card-header"><span class="card-title">Kiểu bộ lọc giá</span></div>
                    <div class="card-body">
                        <input type="hidden" name="settings[price_filter_type]" x-model="filterType">
                        <div class="flex gap-2 flex-wrap">
                            <button type="button" @click="filterType='presets'"
                                :class="filterType==='presets' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:border-slate-300'"
                                class="px-4 py-2.5 rounded-xl border-2 text-[11px] font-black uppercase tracking-wide cursor-pointer transition-all flex items-center gap-2">
                                <i class="fa-solid fa-tags"></i> Mốc giá nhanh
                            </button>
                            <button type="button" @click="filterType='slider'"
                                :class="filterType==='slider' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:border-slate-300'"
                                class="px-4 py-2.5 rounded-xl border-2 text-[11px] font-black uppercase tracking-wide cursor-pointer transition-all flex items-center gap-2">
                                <i class="fa-solid fa-sliders"></i> Slider kéo thả
                            </button>
                            <button type="button" @click="filterType='both'"
                                :class="filterType==='both' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:border-slate-300'"
                                class="px-4 py-2.5 rounded-xl border-2 text-[11px] font-black uppercase tracking-wide cursor-pointer transition-all flex items-center gap-2">
                                <i class="fa-solid fa-layer-group"></i> Cả hai
                            </button>
                        </div>
                        <p class="form-hint mt-3">Sản phẩm có giá = 0 hoặc null sẽ bị ẩn khỏi kết quả lọc giá.</p>
                    </div>
                </div>

                <div class="card" x-show="filterType==='presets' || filterType==='both'">
                    <div class="card-header">
                        <span class="card-title">Mốc giá nhanh (Presets)</span>
                        <button type="button" @click="addPreset()" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-plus"></i> Thêm mốc
                        </button>
                    </div>
                    <div class="card-body flex flex-col gap-3">
                        <textarea name="settings[price_presets]" class="hidden" x-ref="jsonInput"></textarea>
                        <template x-if="presets.length===0">
                            <p class="text-center text-slate-400 text-xs py-5">Chưa có mốc nào. Nhấn "Thêm mốc" để bắt đầu.</p>
                        </template>
                        <template x-for="(preset, idx) in presets" :key="idx">
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <div class="flex items-center gap-2 mb-3">
                                    <i class="fa-solid fa-grip-vertical text-slate-300 shrink-0"></i>
                                    <input type="text" class="form-input flex-1" x-model="preset.label" @input="syncJson()" placeholder="Tên mốc (vd: Dưới 500k)">
                                    <button type="button" @click="removePreset(idx)"
                                        class="shrink-0 w-8 h-8 rounded-xl border border-red-200 bg-red-50 text-red-500 text-xs cursor-pointer flex items-center justify-center hover:bg-red-500 hover:text-white transition-all">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-[10px] font-bold text-slate-500">Từ: <span class="text-blue-600" x-text="fmtPrice(preset.min)"></span></span>
                                    <span class="text-[10px] font-bold text-slate-500">Đến: <span class="text-blue-600" x-text="preset.max > 0 ? fmtPrice(preset.max) : '∞'"></span></span>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[9px] text-slate-400 pointer-events-none">từ ₫</span>
                                        <input type="text" inputmode="numeric" class="form-input pl-8 text-xs"
                                            :value="fmtInput(preset.min)"
                                            @input="preset.min = parsePrice($event.target.value); $event.target.value = fmtInput(preset.min); syncJson();"
                                            @focus="$event.target.select()">
                                    </div>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[9px] text-slate-400 pointer-events-none">đến ₫</span>
                                        <input type="text" inputmode="numeric" class="form-input pl-8 text-xs"
                                            :value="fmtInput(preset.max)"
                                            @input="preset.max = parsePrice($event.target.value); $event.target.value = fmtInput(preset.max); syncJson();"
                                            @focus="$event.target.select()"
                                            placeholder="0=∞">
                                    </div>
                                </div>
                            </div>
                        </template>
                        <p class="form-hint"><i class="fa-solid fa-circle-info text-blue-500 mr-1"></i>Khách có thể chọn nhiều mốc cùng lúc. "Đến ₫" = 0 nghĩa là không giới hạn trên.</p>
                    </div>
                </div>

                <div class="card" x-show="filterType==='slider' || filterType==='both'">
                    <div class="card-header"><span class="card-title">Cấu hình Slider kéo thả</span></div>
                    <div class="card-body flex flex-col gap-4">
                        <div>
                            <label class="form-label">Giá tối đa của slider (₫)</label>
                            <div class="flex items-center gap-3">
                            <input type="text" inputmode="numeric" class="form-input w-36"
                                :value="fmtInput(sliderMax)"
                                @input="sliderMax = parsePrice($event.target.value); $event.target.value = fmtInput(sliderMax);"
                                @focus="$event.target.select()">
                            </div>
                            <p class="form-hint" x-text="'Hiện tại: ' + fmtPrice(sliderMax)"></p>
                            <input type="hidden" name="settings[price_slider_max]" x-model="sliderMax">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ══ TAB: DANH MỤC ══ --}}
            <div x-show="tab==='category'" x-cloak class="flex flex-col gap-5">

                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Hiển thị bộ lọc danh mục</span>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <span class="text-[10px] font-bold text-slate-500 uppercase">Bật/Tắt</span>
                            <div class="relative">
                                <input type="hidden" name="settings[show_category_filter]" value="0">
                                <input type="checkbox" name="settings[show_category_filter]" value="1"
                                    {{ $showCategoryFilter ? 'checked' : '' }}
                                    class="sr-only peer" id="toggle-cat">
                                <label for="toggle-cat"
                                    class="w-11 h-6 bg-slate-200 peer-checked:bg-blue-600 rounded-full cursor-pointer transition-colors duration-200 block after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-5"></label>
                            </div>
                        </label>
                    </div>
                    <div class="card-body">
                        <p class="form-hint">Khi bật, sidebar shop sẽ hiển thị danh sách danh mục để khách lọc sản phẩm.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><span class="card-title">Danh mục sản phẩm ({{ $categories->count() }})</span></div>
                    <div class="card-body">
                        @if($categories->isEmpty())
                            <div class="text-center py-8">
                                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-3 block"></i>
                                <p class="text-slate-400 text-sm">Chưa có danh mục nào.</p>
                                <a href="{{ locale_route('admin.categories.index', ['type' => 'product']) }}" class="btn btn-primary btn-sm mt-4">
                                    <i class="fa-solid fa-plus"></i> Quản lý danh mục
                                </a>
                            </div>
                        @else
                            <div class="flex flex-col gap-2">
                                @foreach($categories as $cat)
                                <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-slate-200 transition-all">
                                    <div class="flex items-center gap-3">
                                        @if($cat->image)
                                            <img src="{{ $cat->image_url }}" class="w-8 h-8 rounded-lg object-cover">
                                        @else
                                            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                                <i class="fa-solid fa-folder text-blue-500 text-xs"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-bold text-slate-700">{{ $cat->name }}</p>
                                            @if($cat->parent_id)
                                                <p class="text-[10px] text-slate-400">Danh mục con</p>
                                            @else
                                                <p class="text-[10px] text-slate-400">Danh mục gốc</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="badge {{ $cat->is_active ? 'badge-green' : 'badge-gray' }}">
                                            {{ $cat->is_active ? 'Hiện' : 'Ẩn' }}
                                        </span>
                                        <a href="{{ locale_route('admin.categories.index', ['type' => 'product']) }}" class="act-btn edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-4 pt-4 border-t border-slate-100">
                                <a href="{{ locale_route('admin.categories.index', ['type' => 'product']) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa-solid fa-arrow-right"></i> Quản lý tất cả danh mục
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ══ TAB: THUỘC TÍNH ══ --}}
            <div x-show="tab==='attributes'" x-cloak class="flex flex-col gap-5">

                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Cấu hình thuộc tính bộ lọc</span>
                        <span class="badge badge-blue">{{ $attributes->count() }} thuộc tính</span>
                    </div>
                    <div class="card-body">
                        <p class="form-hint mb-4">
                            <i class="fa-solid fa-circle-info text-blue-500 mr-1"></i>
                            Bật thuộc tính để hiển thị ngoài sidebar shop. Chọn kiểu hiển thị phù hợp với từng loại dữ liệu.
                        </p>

                        {{-- Hidden input lưu toàn bộ config --}}
                        <textarea name="settings[attribute_filter_config]" class="hidden" x-ref="attrJsonInput"></textarea>

                        @if($attributes->isEmpty())
                            <div class="text-center py-8">
                                <i class="fa-solid fa-sliders text-3xl text-slate-300 mb-3 block"></i>
                                <p class="text-slate-400 text-sm">Chưa có thuộc tính nào.</p>
                                <a href="{{ locale_route('admin.attributes.create') }}" class="btn btn-primary btn-sm mt-4">
                                    <i class="fa-solid fa-plus"></i> Tạo thuộc tính
                                </a>
                            </div>
                        @else
                            <div class="flex flex-col gap-3">
                                @foreach($attributes as $attr)
                                @php
                                    $cfg = $attrConfigMap->get($attr->id, null);
                                    $enabled = $cfg ? (bool)($cfg['enabled'] ?? false) : false;
                                    $displayType = $cfg['display_type'] ?? 'checkbox';
                                @endphp
                                <div class="border border-slate-200 rounded-2xl overflow-hidden"
                                     data-attr-row data-attr-id="{{ $attr->id }}"
                                     x-data="{ enabled: {{ $enabled ? 'true' : 'false' }}, displayType: '{{ $displayType }}' }"
                                     @change="syncAttrJson()">

                                    {{-- Header row --}}
                                    <div class="flex items-center gap-3 p-4 bg-white">
                                        {{-- Toggle --}}
                                        <div class="relative shrink-0">
                                            <input type="checkbox" :id="'attr-toggle-{{ $attr->id }}'"
                                                x-model="enabled" @change="syncAttrJson()"
                                                class="sr-only peer">
                                            <label :for="'attr-toggle-{{ $attr->id }}'"
                                                class="w-10 h-5 bg-slate-200 peer-checked:bg-blue-600 rounded-full cursor-pointer transition-colors block relative after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-5"></label>
                                        </div>

                                        {{-- Attr info --}}
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-black text-slate-800">{{ $attr->name }}</p>
                                            <p class="text-[10px] text-slate-400 mt-0.5">
                                                {{ $attr->values->count() }} giá trị
                                                @if($attr->values->isNotEmpty())
                                                    &nbsp;·&nbsp;
                                                    <span class="text-slate-500">
                                                        {{ $attr->values->take(4)->pluck('value')->join(', ') }}{{ $attr->values->count() > 4 ? '...' : '' }}
                                                    </span>
                                                @endif
                                            </p>
                                        </div>

                                        {{-- Filterable badge --}}
                                        @if($attr->is_filterable)
                                            <span class="badge badge-green shrink-0">Filterable</span>
                                        @else
                                            <span class="badge badge-gray shrink-0">Không lọc</span>
                                        @endif

                                        <a href="{{ locale_route('admin.attributes.edit', $attr) }}" class="act-btn edit shrink-0">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>

                                    {{-- Display type selector — chỉ hiện khi enabled --}}
                                    <div x-show="enabled" x-collapse
                                         class="border-t border-slate-100 bg-slate-50 px-4 py-3">
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-2">Kiểu hiển thị ngoài bộ lọc</p>
                                        <div class="flex gap-2 flex-wrap">

                                            {{-- SELECT --}}
                                            <button type="button" @click="displayType='select'; syncAttrJson()"
                                                :class="displayType==='select' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:border-blue-300'"
                                                class="flex items-center gap-2 px-3 py-2 rounded-xl border-2 text-[10px] font-black uppercase tracking-wide transition-all cursor-pointer">
                                                <i class="fa-solid fa-caret-down"></i>
                                                <span>Select</span>
                                                <span class="opacity-60 font-normal normal-case">Dropdown chọn 1</span>
                                            </button>

                                            {{-- CHECKBOX --}}
                                            <button type="button" @click="displayType='checkbox'; syncAttrJson()"
                                                :class="displayType==='checkbox' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:border-blue-300'"
                                                class="flex items-center gap-2 px-3 py-2 rounded-xl border-2 text-[10px] font-black uppercase tracking-wide transition-all cursor-pointer">
                                                <i class="fa-solid fa-square-check"></i>
                                                <span>Checkbox</span>
                                                <span class="opacity-60 font-normal normal-case">Chọn nhiều</span>
                                            </button>

                                            {{-- BUTTON --}}
                                            <button type="button" @click="displayType='button'; syncAttrJson()"
                                                :class="displayType==='button' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:border-blue-300'"
                                                class="flex items-center gap-2 px-3 py-2 rounded-xl border-2 text-[10px] font-black uppercase tracking-wide transition-all cursor-pointer">
                                                <i class="fa-solid fa-grip"></i>
                                                <span>Button</span>
                                                <span class="opacity-60 font-normal normal-case">Nút bấm trực quan</span>
                                            </button>
                                        </div>

                                        {{-- Mini preview --}}
                                        <div class="mt-3 p-3 bg-white rounded-xl border border-slate-100">
                                            <p class="text-[9px] text-slate-400 uppercase font-bold mb-2">Preview — {{ $attr->name }}</p>

                                            {{-- Preview: select --}}
                                            <div x-show="displayType==='select'">
                                                <select class="form-select text-xs py-1.5" disabled>
                                                    <option>-- Chọn {{ $attr->name }} --</option>
                                                    @foreach($attr->values->take(5) as $val)
                                                        <option>{{ $val->value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Preview: checkbox --}}
                                            <div x-show="displayType==='checkbox'" class="flex flex-col gap-1.5">
                                                @foreach($attr->values->take(5) as $val)
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="checkbox" disabled class="w-3.5 h-3.5 rounded accent-blue-600">
                                                    <span class="text-xs text-slate-600">{{ $val->value }}</span>
                                                </label>
                                                @endforeach
                                                @if($attr->values->count() > 5)
                                                    <p class="text-[10px] text-slate-400">+{{ $attr->values->count() - 5 }} giá trị khác...</p>
                                                @endif
                                            </div>

                                            {{-- Preview: button --}}
                                            <div x-show="displayType==='button'" class="flex flex-wrap gap-1.5">
                                                @foreach($attr->values->take(8) as $val)
                                                    @if($val->color_code)
                                                        <span class="w-6 h-6 rounded-full border-2 border-white shadow cursor-pointer"
                                                              style="background:{{ $val->color_code }}"
                                                              title="{{ $val->value }}"></span>
                                                    @else
                                                        <span class="px-2.5 py-1 rounded-lg border border-slate-200 bg-slate-50 text-[10px] font-bold text-slate-600 cursor-pointer hover:border-blue-400 hover:text-blue-600 transition-all">
                                                            {{ $val->value }}
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-4 pt-4 border-t border-slate-100">
                                <a href="{{ locale_route('admin.attributes.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa-solid fa-arrow-right"></i> Quản lý tất cả thuộc tính
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ══ TAB: HUY HIỆU (BADGES) ══ --}}
            <div x-show="tab==='badges'" x-cloak class="flex flex-col gap-5">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Cấu hình Huy hiệu sản phẩm</span>
                    </div>
                    <div class="card-body">
                        <p class="form-hint mb-6">Bạn có thể tải lên hình ảnh huy hiệu (PNG/SVG) hoặc để trống để sử dụng thiết kế mặc định bằng CSS.</p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Best Seller Badge --}}
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <label class="text-[10px] font-black uppercase text-slate-400 mb-3 block">Bán chạy (Best Seller)</label>
                                <div class="flex gap-2 mb-3">
                                    <input type="text" name="settings[badge_best_seller_img]" id="badge_best_seller_img"
                                        value="{{ $map['badge_best_seller_img'] ?? '' }}"
                                        class="form-input text-xs py-2" placeholder="URL ảnh...">
                                    <button type="button" onclick="openMediaPicker('badge_best_seller_img')"
                                        class="bg-blue-600 text-white px-3 rounded-xl active:scale-95 transition-all outline-none border-none">
                                        <i class="fa-solid fa-image"></i>
                                    </button>
                                </div>
                                <div class="flex items-center justify-center p-4 bg-white rounded-xl border border-dashed border-slate-200 min-h-[100px]">
                                    @if(!empty($map['badge_best_seller_img']))
                                        <img src="{{ _murl_shop($map['badge_best_seller_img']) }}" class="max-h-16 object-contain">
                                    @else
                                        <div class="text-center">
                                            <span class="px-2 py-1 bg-red-600 text-white text-[10px] font-bold rounded uppercase">Hot</span>
                                            <p class="text-[9px] text-slate-400 mt-2 italic">(CSS Mặc định)</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Featured Badge --}}
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <label class="text-[10px] font-black uppercase text-slate-400 mb-3 block">Nổi bật (Featured)</label>
                                <div class="flex gap-2 mb-3">
                                    <input type="text" name="settings[badge_featured_img]" id="badge_featured_img"
                                        value="{{ $map['badge_featured_img'] ?? '' }}"
                                        class="form-input text-xs py-2" placeholder="URL ảnh...">
                                    <button type="button" onclick="openMediaPicker('badge_featured_img')"
                                        class="bg-blue-600 text-white px-3 rounded-xl active:scale-95 transition-all outline-none border-none">
                                        <i class="fa-solid fa-image"></i>
                                    </button>
                                </div>
                                <div class="flex items-center justify-center p-4 bg-white rounded-xl border border-dashed border-slate-200 min-h-[100px]">
                                    @if(!empty($map['badge_featured_img']))
                                        <img src="{{ _murl_shop($map['badge_featured_img']) }}" class="max-h-16 object-contain">
                                    @else
                                        <div class="text-center">
                                            <span class="px-2 py-1 bg-blue-600 text-white text-[10px] font-bold rounded uppercase">New</span>
                                            <p class="text-[9px] text-slate-400 mt-2 italic">(CSS Mặc định)</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Discount Badge --}}
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <label class="text-[10px] font-black uppercase text-slate-400 mb-3 block">Giảm giá (Discount)</label>
                                <div class="flex gap-2 mb-3">
                                    <input type="text" name="settings[badge_discount_img]" id="badge_discount_img"
                                        value="{{ $map['badge_discount_img'] ?? '' }}"
                                        class="form-input text-xs py-2" placeholder="URL ảnh...">
                                    <button type="button" onclick="openMediaPicker('badge_discount_img')"
                                        class="bg-blue-600 text-white px-3 rounded-xl active:scale-95 transition-all outline-none border-none">
                                        <i class="fa-solid fa-image"></i>
                                    </button>
                                </div>
                                <div class="flex items-center justify-center p-4 bg-white rounded-xl border border-dashed border-slate-200 min-h-[100px]">
                                    @if(!empty($map['badge_discount_img']))
                                        <img src="{{ _murl_shop($map['badge_discount_img']) }}" class="max-h-16 object-contain">
                                    @else
                                        <div class="text-center">
                                            <span class="px-2 py-1 bg-orange-500 text-white text-[10px] font-bold rounded uppercase">-25%</span>
                                            <p class="text-[9px] text-slate-400 mt-2 italic">(CSS Mặc định)</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- end LEFT --}}

        {{-- RIGHT COLUMN — Preview + Save --}}
        <div class="flex flex-col gap-5" style="position:sticky;top:80px;">

            {{-- Save button --}}
            <button type="submit" class="btn btn-primary w-full">
                <i class="fa-solid fa-floppy-disk"></i> Lưu cấu hình
            </button>

            {{-- Preview card — thay đổi theo tab --}}
            <div class="card">
                <div class="card-header"><span class="card-title">Xem trước bộ lọc</span></div>
                <div class="card-body flex flex-col gap-4">

                    {{-- Price preview --}}
                    <div x-show="tab==='price'">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-3">Khách hàng sẽ thấy:</p>

                        <div x-show="filterType==='presets' || filterType==='both'" class="mb-4">
                            <p class="text-[10px] font-bold text-slate-500 mb-2 uppercase">Mốc giá nhanh</p>
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-3 py-1.5 rounded-full bg-blue-600 text-white text-[11px] font-bold">Tất cả</span>
                                <template x-for="p in presets" :key="p.label">
                                    <span class="px-3 py-1.5 rounded-full border border-slate-200 bg-white text-[11px] font-semibold text-slate-600"
                                          x-text="p.label || '(chưa đặt tên)'"></span>
                                </template>
                                <template x-if="presets.length===0">
                                    <span class="text-xs text-slate-400 italic">Chưa có mốc nào</span>
                                </template>
                            </div>
                        </div>

                        <div x-show="filterType==='slider' || filterType==='both'">
                            <p class="text-[10px] font-bold text-slate-500 mb-2 uppercase">Slider kéo thả</p>
                            <div class="flex justify-between text-[10px] text-slate-400 mt-1">
                                <span>0₫</span>
                                <span x-text="fmtPrice(sliderMax)"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Category preview --}}
                    <div x-show="tab==='category'">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-3">Sidebar danh mục:</p>
                        <div class="flex flex-col gap-1">
                            @foreach($categories->take(6) as $cat)
                            <div class="flex items-center justify-between py-1.5 px-2 rounded-lg hover:bg-slate-50 transition-all">
                                <span class="text-xs text-slate-600 font-medium">{{ $cat->name }}</span>
                                <span class="text-[10px] text-slate-400">{{ $cat->products()->count() }}</span>
                            </div>
                            @endforeach
                            @if($categories->count() > 6)
                                <p class="text-[10px] text-slate-400 px-2 mt-1">+{{ $categories->count() - 6 }} danh mục khác...</p>
                            @endif
                            @if($categories->isEmpty())
                                <p class="text-xs text-slate-400 italic">Chưa có danh mục</p>
                            @endif
                        </div>
                    </div>

                    {{-- Attributes preview --}}
                    <div x-show="tab==='attributes'">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-3">Thuộc tính đã bật:</p>
                        <div class="flex flex-col gap-2" id="attr-preview-list">
                            <template x-for="a in attrConfigs.filter(x=>x.enabled)" :key="a.id">
                                <div class="flex items-center justify-between py-1.5 px-2 bg-blue-50 rounded-lg">
                                    <span class="text-xs font-bold text-blue-700" x-text="a.name"></span>
                                    <span class="text-[9px] px-2 py-0.5 rounded-full font-black uppercase"
                                          :class="{
                                            'bg-purple-100 text-purple-700': a.display_type==='select',
                                            'bg-green-100 text-green-700': a.display_type==='checkbox',
                                            'bg-orange-100 text-orange-700': a.display_type==='button'
                                          }"
                                          x-text="a.display_type"></span>
                                </div>
                            </template>
                            <template x-if="attrConfigs.filter(x=>x.enabled).length===0">
                                <p class="text-xs text-slate-400 italic">Chưa bật thuộc tính nào</p>
                            </template>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Stats card --}}
            <div class="card">
                <div class="card-header"><span class="card-title">Tổng quan</span></div>
                <div class="card-body">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-blue-50 rounded-2xl p-3 text-center">
                            <p class="text-2xl font-black text-blue-600">{{ $categories->count() }}</p>
                            <p class="text-[9px] font-bold text-blue-400 uppercase mt-0.5">Danh mục</p>
                        </div>
                        <div class="bg-purple-50 rounded-2xl p-3 text-center">
                            <p class="text-2xl font-black text-purple-600">{{ $attributes->count() }}</p>
                            <p class="text-[9px] font-bold text-purple-400 uppercase mt-0.5">Thuộc tính</p>
                        </div>
                        <div class="bg-green-50 rounded-2xl p-3 text-center">
                            <p class="text-2xl font-black text-green-600">{{ $attributes->where('is_filterable', true)->count() }}</p>
                            <p class="text-[9px] font-bold text-green-400 uppercase mt-0.5">Có thể lọc</p>
                        </div>
                        <div class="bg-orange-50 rounded-2xl p-3 text-center">
                            <p class="text-2xl font-black text-orange-600">{{ collect($attrConfig)->where('enabled', true)->count() }}</p>
                            <p class="text-[9px] font-bold text-orange-400 uppercase mt-0.5">Đang hiện</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- end RIGHT --}}

    </div>{{-- end grid --}}
</form>

@endsection

@push('scripts')
<script>
function shopSettingsForm() {
    return {
        tab: 'price',
        filterType: '{{ $filterType }}',
        presets: @json($presets),
        sliderMax: {{ $sliderMax }},
        attrConfigs: @json($attrConfigData),

        init() {
            this.syncJson();
            this.syncAttrJson();

            // Sync each attr row's x-data back to attrConfigs on change
            this.$watch('attrConfigs', () => this.syncAttrJson());
        },

        // ── Price presets ──
        addPreset() {
            this.presets.push({ label: '', min: 0, max: 0 });
            this.syncJson();
        },
        removePreset(idx) {
            this.presets.splice(idx, 1);
            this.syncJson();
        },
        syncJson() {
            const clean = this.presets.filter(p => p.label.trim() !== '');
            this.$refs.jsonInput.value = JSON.stringify(clean);
        },

        // ── Attribute config ──
        syncAttrJson() {
            // Collect state from each attr row's x-data via DOM
            const rows = document.querySelectorAll('[data-attr-row]');
            const result = [];
            rows.forEach(row => {
                const comp = Alpine.$data(row);
                if (comp) {
                    result.push({
                        id:           parseInt(row.dataset.attrId),
                        enabled:      comp.enabled,
                        display_type: comp.displayType,
                    });
                    // Sync back to attrConfigs for preview
                    const found = this.attrConfigs.find(a => a.id === parseInt(row.dataset.attrId));
                    if (found) {
                        found.enabled      = comp.enabled;
                        found.display_type = comp.displayType;
                    }
                }
            });
            if (this.$refs.attrJsonInput) {
                this.$refs.attrJsonInput.value = JSON.stringify(result);
            }
        },

        fmtPrice(v) {
            v = parseInt(v) || 0;
            if (v >= 1000000) return (v / 1000000).toFixed(v % 1000000 ? 1 : 0).replace('.0','') + 'tr';
            if (v >= 1000)    return (v / 1000).toFixed(v % 1000 ? 1 : 0).replace('.0','') + 'k';
            return v + '₫';
        },

        // Hiển thị số có dấu phẩy khi >= 4 chữ số (vd: 1,000 / 10,000 / 1,000,000)
        fmtInput(v) {
            v = parseInt(v) || 0;
            if (v === 0) return '';
            return v.toLocaleString('en-US');
        },

        // Parse chuỗi có dấu phẩy về số nguyên
        parsePrice(s) {
            return parseInt(String(s).replace(/,/g, '')) || 0;
        }
    };
}
</script>
@endpush

