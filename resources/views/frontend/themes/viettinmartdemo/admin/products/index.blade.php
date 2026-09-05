@extends('admin.layouts.app')
@section('title', __('common.products'))
@section('page-title', 'Danh sách sản phẩm')
@section('page-subtitle', 'Quản lý toàn bộ sản phẩm trong cửa hàng')
@section('page-actions')
    @if(auth()->user()->isAdmin() || auth()->user()->isManager() || auth()->user()->isWebAdmin())
    <a href="{{ locale_route('admin.products.trash') }}" class="btn btn-secondary">
        <i class="fa-solid fa-trash-can"></i> Thùng rác
    </a>
    <a href="{{ locale_route('admin.products.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus-circle"></i> Thêm sản phẩm mới
    </a>
    @endif
@endsection

@section('content')
    <div x-data="productTable()" class="relative">
        {{-- Bộ lọc --}}
        <form method="GET" action="{{ locale_route('admin.products.index') }}" class="card mb-4">
            <div class="p-4 flex flex-wrap gap-3 items-end">
                {{-- Language Switcher — đặt ở filter bar vì liên quan đến xem tên SP theo ngôn ngữ --}}
                @if($activeLanguages->count() > 1)
                <div>
                    <label class="form-label">Ngôn ngữ</label>
                    <div class="flex gap-1 bg-slate-100 p-1 rounded-xl">
                        @foreach($activeLanguages as $lang)
                            <a href="{{ locale_route('admin.products.index', ['locale' => $lang->code] + request()->except('locale', 'page')) }}"
                               class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold transition-all {{ request('locale', $defaultLocale) === $lang->code ? 'bg-white shadow text-blue-600' : 'text-slate-500 hover:text-slate-700' }}">
                                @if($lang->flag_emoji)<span>{{ $lang->flag_emoji }}</span>@endif
                                {{ strtoupper($lang->code) }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="w-px h-9 bg-slate-200 self-end mb-1"></div>
                @endif
                <div class="flex-1 min-w-[220px]">
                    <label class="form-label">Tìm kiếm</label>
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Tên, SKU, Barcode..."
                            class="form-input pl-9">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 text-xs"></i>
                    </div>
                </div>
                <div class="w-52" x-data="{ open: false }">
                    <label class="form-label">Chuyên mục</label>
                    <div class="relative">
                        <button type="button" @click="open = !open" 
                                class="form-input text-left shadow-sm border-slate-100 flex items-center justify-between w-full h-[42px] bg-white group hover:border-blue-400 transition-all">
                            <span class="truncate text-sm font-bold text-slate-700">
                                @php
                                    $selectedCats = (array) request('category_ids', []);
                                    $countSelected = count($selectedCats);
                                @endphp
                                @if($countSelected > 0)
                                    {{ $countSelected }} danh mục đã chọn
                                @else
                                    Tất cả danh mục
                                @endif
                            </span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-300 group-hover:text-blue-500 transition-colors"></i>
                        </button>
                        
                        <div x-show="open" 
                             @click.away="open = false" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             style="display:none;"
                             class="absolute top-full left-0 right-0 mt-3 bg-white border border-slate-100 rounded-[24px] shadow-2xl z-[100] max-h-[400px] overflow-hidden flex flex-col">
                            
                            <div class="p-4 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                                <span class="text-[10px] font-black uppercase text-slate-400 tracking-widest pl-1">Chọn chuyên mục</span>
                                <button type="button" @click="open = false" class="text-blue-600 text-[10px] font-black uppercase tracking-tighter hover:underline">Xong</button>
                            </div>

                            <div class="overflow-y-auto custom-scroll p-2 flex-1">
                                @foreach($categories as $cat)
                                    <label class="flex items-center gap-3 p-3 hover:bg-blue-50/50 rounded-xl cursor-pointer transition-all group/cat">
                                        <div class="relative flex items-center justify-center">
                                            <input type="checkbox" name="category_ids[]" value="{{ $cat->id }}" 
                                                   {{ in_array($cat->id, $selectedCats) ? 'checked' : '' }}
                                                   class="peer w-5 h-5 rounded-lg border-slate-200 text-blue-600 focus:ring-blue-100 appearance-none bg-white border checked:bg-blue-600 checked:border-blue-600 transition-all">
                                            <i class="fa-solid fa-check absolute text-white text-[10px] opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none"></i>
                                        </div>
                                        <span class="text-xs font-bold text-slate-600 group-hover/cat:text-blue-700 transition-colors">{{ $cat->label_indented }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @if($countSelected > 0)
                                <div class="p-3 border-t border-slate-50 text-center">
                                    <a href="{{ locale_route('admin.products.index', request()->except('category_ids')) }}" class="text-[9px] font-black uppercase text-rose-500 hover:text-rose-600 transition-colors">
                                        <i class="fa-solid fa-rotate-left mr-1"></i> Xóa bộ lọc mục
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-44">
                    <label class="form-label">Trạng thái</label>
                    <select name="status" class="form-select">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Đang công khai</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Bản nháp</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Tạm ẩn</option>
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i> Lọc
                    </button>
                    @if(request()->hasAny(['search', 'category_id', 'category_ids', 'status']))
                        <a href="{{ locale_route('admin.products.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                    @endif
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-header border-b border-slate-50">
                <h3 class="card-title">Hệ thống kho vận ({{ $counts['all'] }})</h3>
                <div class="flex items-center gap-3">
                    @if(auth()->user()->isAdmin() || auth()->user()->isManager() || auth()->user()->isWebAdmin())
                    {{-- Quick Tabs --}}
                    <div class="flex bg-slate-100 p-1.5 rounded-2xl gap-1">
                        <a href="{{ locale_route('admin.products.index') }}"
                            class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ !request()->routeIs('*.trash') ? 'bg-white shadow-sm text-blue-600' : 'text-slate-400 hover:text-slate-600' }}">
                            Đang bán
                        </a>
                        <a href="{{ locale_route('admin.products.trash') }}"
                            class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request()->routeIs('*.trash') ? 'bg-white shadow-sm text-rose-600' : 'text-slate-400 hover:text-slate-600' }}">
                            Thùng rác ({{ $counts['trashed'] }})
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="overflow-x-auto custom-scroll">
                <table class="w-full min-w-[1200px]">
                    <thead>
                        <tr class="bg-slate-50/50">
                            @if(auth()->user()->isAdmin() || auth()->user()->isManager())
                            <th class="tbl-th w-14 text-center">
                                <input type="checkbox" @change="toggleAll($event)" :checked="allSelected"
                                    class="w-5 h-5 rounded-lg border-slate-200 text-blue-600 focus:ring-blue-100">
                            </th>
                            @endif
                            <th class="tbl-th w-[400px]">Chi tiết sản phẩm</th>
                            <th class="tbl-th">Phân loại</th>
                            <th class="tbl-th w-44">Thương vụ & Giá</th>
                            <th class="tbl-th w-32">Lưu kho</th>
                            <th class="tbl-th w-32 text-center">Ưu tiên</th>
                            <th class="tbl-th w-44 text-center">Hiển thị</th>
                            @if(auth()->user()->isAdmin() || auth()->user()->isManager() || auth()->user()->isWebAdmin())
                            <th class="tbl-th w-24 text-right pr-10">Thao tác</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 bg-white">
                        @forelse($products as $product)
                                <tr class="group transition-all hover:bg-slate-50/30"
                                    :class="selected.includes({{ $product->id }}) ? 'bg-blue-50/40' : ''">
                                    @if(auth()->user()->isAdmin() || auth()->user()->isManager())
                                    <td class="tbl-td text-center">
                                        <input type="checkbox" value="{{ $product->id }}" x-model="selected"
                                            class="w-5 h-5 rounded-lg border-slate-200 text-blue-600 group-hover:scale-110 transition-transform">
                                    </td>
                                    @endif
                                <td class="tbl-td">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-lg border border-slate-100 overflow-hidden bg-white flex-shrink-0">
                                            @if($product->thumbnail_url)
                                                <img src="{{ $product->thumbnail_url }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-200 bg-slate-50">
                                                    <i class="fa-solid fa-box text-lg"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ locale_route('admin.products.edit', $product) }}"
                                                class="text-[15px] font-black text-slate-900 group-hover:text-blue-600 transition-colors block leading-tight mb-2 line-clamp-2 uppercase tracking-tighter">{{ $product->translate('name', $locale) ?: $product->name }}</a>

                                            {{-- Indicator bản dịch --}}
                                            @if($activeLanguages->count() > 1)
                                            <div class="flex gap-1 mb-2">
                                                @foreach($activeLanguages as $lang)
                                                    @php
                                                        $hasTranslation = $lang->is_default || $product->translations->where('locale', $lang->code)->where('field', 'name')->whereNotNull('value')->where('value', '!=', '')->isNotEmpty();
                                                    @endphp
                                                    <span class="px-1.5 py-0.5 rounded text-[9px] font-black uppercase {{ $hasTranslation ? 'bg-green-100 text-green-600' : 'bg-slate-100 text-slate-300' }}" title="{{ $hasTranslation ? 'Đã dịch' : 'Chưa dịch' }}">
                                                        {{ strtoupper($lang->code) }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            @endif

                                            <div class="flex flex-wrap gap-2" x-data="{ 
                                                    isFeatured: {{ $product->is_featured ? 'true' : 'false' }},
                                                    isFavorite: {{ $product->is_favorite ? 'true' : 'false' }},
                                                    isBestSeller: {{ $product->is_best_seller ? 'true' : 'false' }},
                                                    async toggle(key) {
                                                        @if(auth()->user()->isAdmin() || auth()->user()->isManager())
                                                        this[key] = !this[key];
                                                        const fieldMap = { 'isFeatured': 'is_featured', 'isFavorite': 'is_favorite', 'isBestSeller': 'is_best_seller' };
                                                        const fieldName = fieldMap[key];
                                                        try {
                                                            await fetch('{{ locale_route('admin.products.quick-update', $product->id) }}', {
                                                                method: 'PATCH',
                                                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                                                                body: JSON.stringify({ [fieldName]: this[key] })
                                                            });
                                                        } catch (e) { adminToast(__('common.error'), 'Không thể cập nhật!', 'error'); }
                                                        @endif
                                                    }
                                                }">
                                                <span @click="toggle('isFeatured')"
                                                    :class="isFeatured ? 'bg-amber-50 text-amber-600 border-amber-100' : 'bg-slate-50 text-slate-300 border-slate-100'"
                                                    class="px-2.5 py-0.5 rounded-lg text-[9px] font-black uppercase border {{ auth()->user()->isStoreManager() ? '' : 'cursor-pointer hover:scale-105' }} transition-all select-none tracking-widest">
                                                    <i class="fa-solid fa-star mr-1"></i> Nổi bật
                                                </span>
                                                <span @click="toggle('isFavorite')"
                                                    :class="isFavorite ? 'bg-rose-50 text-rose-600 border-rose-100' : 'bg-slate-50 text-slate-300 border-slate-100'"
                                                    class="px-2.5 py-0.5 rounded-lg text-[9px] font-black uppercase border {{ auth()->user()->isStoreManager() ? '' : 'cursor-pointer hover:scale-105' }} transition-all select-none tracking-widest">
                                                    <i class="fa-solid fa-heart mr-1"></i> Yêu thích
                                                </span>
                                                <span @click="toggle('isBestSeller')"
                                                    :class="isBestSeller ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-slate-50 text-slate-300 border-slate-100'"
                                                    class="px-2.5 py-0.5 rounded-lg text-[9px] font-black uppercase border {{ auth()->user()->isStoreManager() ? '' : 'cursor-pointer hover:scale-105' }} transition-all select-none tracking-widest">
                                                    <i class="fa-solid fa-crown mr-1"></i> Bán chạy
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="tbl-td">
                                    @if($product->categories->count() > 0)
                                        <div class="flex flex-wrap gap-1 max-w-[150px]">
                                            @foreach($product->categories->take(5) as $cat)
                                                <span class="px-1.5 py-0.5 bg-slate-100 text-[9px] font-black text-slate-500 uppercase tracking-tighter rounded-md whitespace-nowrap">{{ $cat->translate('name', $locale) ?: $cat->name }}</span>
                                            @endforeach
                                            @if($product->categories->count() > 5)
                                                <span class="px-1.5 py-0.5 bg-blue-50 text-[9px] font-black text-blue-500 uppercase tracking-tighter rounded-md">+{{ $product->categories->count() - 5 }}</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-[10px] font-black text-slate-200 tracking-widest uppercase">Không
                                            có</span>
                                    @endif
                                </td>
                                <td class="tbl-td">
                                    <div class="flex flex-col leading-none"
                                        x-data="{ editing: false, price: {{ (float) $product->price }} }">
                                        <div x-show="!editing" @if(auth()->user()->isAdmin() || auth()->user()->isManager()) @click="editing = true" @endif
                                            class="{{ auth()->user()->isStoreManager() ? '' : 'cursor-pointer group/price' }} flex items-center">
                                            <span class="text-[16px] font-black text-blue-600 tracking-tighter"
                                                x-text="new Intl.NumberFormat('vi-VN').format(price)"></span>
                                            @if(!auth()->user()->isStoreManager())
                                            <small
                                                class="text-[10px] ml-1 font-black uppercase text-blue-300 opacity-0 group-hover/price:opacity-100 transition-opacity"><i
                                                    class="fa-solid fa-pen-to-square"></i></small>
                                            @endif
                                        </div>
                                        @if(!auth()->user()->isStoreManager())
                                        <input x-show="editing" type="number" x-model="price" @click.away="editing = false"
                                            @keydown.enter="editing = false; quickUpdate({{ $product->id }}, {price: price})"
                                            class="form-input w-24 py-1 px-2 text-[14px] font-black text-blue-600 border-blue-200">
                                        @endif
                                        @if($product->compare_price > $product->price)
                                            <span
                                                class="text-[11px] text-slate-300 line-through font-bold mt-1">{{ number_format((float) $product->compare_price, 0, ',', '.') }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="tbl-td">
                                    <div class="flex items-center gap-1.5"
                                        x-data="{ editing: false, stock: {{ $product->stock }} }">
                                        <span
                                            class="w-2.5 h-2.5 rounded-full {{ $product->stock > 5 ? 'bg-green-500' : 'bg-rose-500 shadow-lg shadow-rose-500/30 animate-pulse' }}"></span>
                                        <div x-show="!editing" @if(auth()->user()->isAdmin() || auth()->user()->isManager()) @click="editing = true" @endif
                                            class="{{ auth()->user()->isStoreManager() ? '' : 'cursor-pointer group/stock' }} flex items-center">
                                            <span class="text-[14px] font-black text-slate-700 tracking-tight"
                                                x-text="stock"></span>
                                            @if(!auth()->user()->isStoreManager())
                                            <small
                                                class="text-[10px] ml-1 font-black uppercase text-slate-300 opacity-0 group-hover/stock:opacity-100 transition-opacity"><i
                                                    class="fa-solid fa-pen-to-square"></i></small>
                                            @endif
                                        </div>
                                        @if(!auth()->user()->isStoreManager())
                                        <input x-show="editing" type="number" x-model="stock" @click.away="editing = false"
                                            @keydown.enter="editing = false; quickUpdate({{ $product->id }}, {stock: stock})"
                                            class="form-input w-16 py-1 px-2 text-[14px] font-black text-slate-700 border-slate-200">
                                        @endif
                                    </div>
                                </td>
                                <td class="tbl-td text-center">
                                    <div x-data="{ editing: false, sort: {{ $product->sort_order ?? 0 }} }">
                                        <div x-show="!editing" @if(auth()->user()->isAdmin() || auth()->user()->isManager()) @click="editing = true" @endif class="{{ auth()->user()->isStoreManager() ? '' : 'cursor-pointer' }}">
                                            <span
                                                class="text-[12px] font-black text-slate-400 bg-slate-100/50 px-3 py-1.5 rounded-xl border border-slate-100 hover:border-slate-300 transition-colors">#<span
                                                    x-text="sort"></span></span>
                                        </div>
                                        @if(!auth()->user()->isStoreManager())
                                        <input x-show="editing" type="number" x-model="sort" @click.away="editing = false"
                                            @keydown.enter="editing = false; quickUpdate({{ $product->id }}, {sort_order: sort})"
                                            class="form-input w-14 py-1 px-2 text-[12px] font-bold text-center border-slate-200">
                                        @endif
                                    </div>
                                </td>
                                <td class="tbl-td text-center">
                                    @if($product->status === 'active')
                                        <span class="badge badge-green">Hoạt động</span>
                                    @elseif($product->status === 'draft')
                                        <span class="badge badge-gray">Bản nháp</span>
                                    @else
                                        <span class="badge badge-red">Tạm ẩn</span>
                                    @endif
                                </td>
                                @if(auth()->user()->isAdmin() || auth()->user()->isManager() || auth()->user()->isWebAdmin())
                                <td class="tbl-td text-right pr-6">
                                    <div class="flex items-center justify-end gap-2 opacity-100 transition-all">
                                        <button type="button" 
                                                @click="qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' + encodeURIComponent('{{ url($product->slug) }}'); qrProductName = '{{ addslashes($product->translate('name', $locale) ?: $product->name) }}'; qrModalOpen = true"
                                                class="act-btn" 
                                                title="Mã QR">
                                            <i class="fa-solid fa-qrcode"></i>
                                        </button>
                                        <a href="{{ locale_route('admin.products.edit', $product) }}" class="act-btn edit"
                                            title="Sửa">
                                            <i class="fa-solid fa-pen-nib"></i>
                                        </a>
                                        <form action="{{ locale_route('admin.products.destroy', $product) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Xóa vĩnh viễn?')"
                                                class="act-btn del" title="Xóa">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="tbl-td text-center py-32">
                                    <div class="flex flex-col items-center gap-4 text-slate-200">
                                        <i class="fa-solid fa-box-open text-6xl opacity-20"></i>
                                        <p class="text-[10px] font-black uppercase tracking-[0.3em]">Kho hàng đang trống</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($products->hasPages())
                <div class="p-4 border-t border-slate-50">
                    {{ $products->links() }}
                </div>
            @endif

            {{-- Floating Bulk Action Bar --}}
            <div x-show="selected.length > 0" style="display:none;"
                :style="{ display: selected.length > 0 ? 'flex' : 'none' }"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-y-full opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-full opacity-0"
                class="fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900/90 backdrop-blur-md text-white px-5 py-3 rounded-2xl shadow-2xl z-[1000] flex items-center gap-4 border border-white/10 min-w-[400px]">

                <div class="flex flex-col flex-shrink-0">
                    <span class="text-[9px] font-bold uppercase text-slate-400 tracking-wider mb-0.5">Đã chọn</span>
                    <div class="flex items-center gap-1.5">
                        <span class="text-xl font-bold text-blue-400" x-text="selected.length"></span>
                        <span class="text-xs text-slate-400">mục</span>
                    </div>
                </div>

                <div class="h-8 w-px bg-white/10"></div>

                <button @click="bulkModalOpen = true"
                    class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-sliders"></i> Thiết lập hàng loạt
                </button>

                <div class="h-8 w-px bg-white/10"></div>

                <button @click="bulkDelete()"
                    class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-400 hover:bg-rose-500 hover:text-white transition-all flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-trash-can text-sm"></i>
                </button>

                <button @click="selected = []; allSelected = false"
                    class="text-slate-500 hover:text-white transition-colors p-1">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        {{-- BULK EDIT MODAL --}}
        <div x-show="bulkModalOpen" @open-bulk-modal.window="bulkModalOpen = true" style="display:none;"
            class="fixed inset-0 z-[10001] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm">

            <div @click.away="bulkModalOpen = false"
                class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl overflow-hidden flex flex-col max-h-[85vh]">

                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Sửa hàng loạt</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Cập nhật cho <span class="text-blue-600" x-text="selected.length"></span> mục đã chọn</p>
                    </div>
                    <button @click="bulkModalOpen = false" class="act-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="p-5 overflow-y-auto flex-1 custom-scroll">
                    <div class="grid grid-cols-2 gap-5">
                        {{-- Common Fixes --}}
                        <div class="space-y-4">
                            <div>
                                <label class="form-label">Trạng thái mới</label>
                                <select id="m-bulk-status" class="form-select">
                                    <option value="">Giữ nguyên hiện tại</option>
                                    <option value="active">Công khai trực tuyến</option>
                                    <option value="inactive">Tạm ẩn khỏi gian hàng</option>
                                    <option value="draft">Chuyển thành bản nháp</option>
                                </select>
                            </div>

                            {{-- Promotions --}}
                            <div class="card">
                                <div class="card-header"><span class="card-title">Gắn thẻ khuyến mãi</span></div>
                                <div class="card-body" style="display:flex;flex-direction:column;gap:8px;">
                                    <div style="display:flex;align-items:center;justify-content:space-between;gap:8px;">
                                        <div style="display:flex;align-items:center;gap:8px;">
                                            <div style="width:28px;height:28px;border-radius:8px;background:#fef3c7;color:#d97706;display:flex;align-items:center;justify-content:center;font-size:11px;flex-shrink:0;">
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <span style="font-size:12px;font-weight:600;color:#1e293b;">Nổi bật</span>
                                        </div>
                                        <select id="m-bulk-featured" class="form-select" style="width:140px;">
                                            <option value="">Giữ nguyên</option>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>
                                    <div style="display:flex;align-items:center;justify-content:space-between;gap:8px;">
                                        <div style="display:flex;align-items:center;gap:8px;">
                                            <div style="width:28px;height:28px;border-radius:8px;background:#fee2e2;color:#dc2626;display:flex;align-items:center;justify-content:center;font-size:11px;flex-shrink:0;">
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                            <span style="font-size:12px;font-weight:600;color:#1e293b;">Yêu thích</span>
                                        </div>
                                        <select id="m-bulk-favorite" class="form-select" style="width:140px;">
                                            <option value="">Giữ nguyên</option>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>
                                    <div style="display:flex;align-items:center;justify-content:space-between;gap:8px;">
                                        <div style="display:flex;align-items:center;gap:8px;">
                                            <div style="width:28px;height:28px;border-radius:8px;background:#dbeafe;color:#2563eb;display:flex;align-items:center;justify-content:center;font-size:11px;flex-shrink:0;">
                                                <i class="fa-solid fa-crown"></i>
                                            </div>
                                            <span style="font-size:12px;font-weight:600;color:#1e293b;">Bán chạy</span>
                                        </div>
                                        <select id="m-bulk-bestseller" class="form-select" style="width:140px;">
                                            <option value="">Giữ nguyên</option>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><span class="card-title">Thay đổi giá bán</span></div>
                                <div class="card-body" style="display:flex;flex-direction:column;gap:8px;">
                                    <select id="m-bulk-price-rule" class="form-select">
                                        <option value="fixed">Gán giá cố định</option>
                                        <option value="inc_amount">+ Theo số tiền (VNĐ)</option>
                                        <option value="dec_amount">- Theo số tiền (VNĐ)</option>
                                        <option value="inc_percent">+ Theo phần trăm (%)</option>
                                        <option value="dec_percent">- Theo phần trăm (%)</option>
                                    </select>
                                    <input type="number" id="m-bulk-price" placeholder="Nhập giá trị..." class="form-input">
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><span class="card-title">Thay đổi kho hàng</span></div>
                                <div class="card-body" style="display:flex;flex-direction:column;gap:8px;">
                                    <select id="m-bulk-stock-rule" class="form-select">
                                        <option value="fixed">Gán số lượng cố định</option>
                                        <option value="inc">+ Thêm vào kho hiện tại</option>
                                        <option value="dec">- Trừ khỏi kho hiện tại</option>
                                    </select>
                                    <input type="number" id="m-bulk-stock" placeholder="Số lượng..." class="form-input">
                                </div>
                            </div>
                        </div>

                        {{-- Category Picker --}}
                        <div class="flex flex-col h-full">
                            <label class="form-label mb-2">Gán thêm vào danh mục</label>
                            <div class="card overflow-y-auto custom-scroll" style="height:320px;">
                                <div class="card-body" style="padding:8px;">
                                @foreach($categories as $cat)
                                    <label class="flex items-center gap-2 p-2 hover:bg-slate-50 rounded-lg cursor-pointer border-b border-slate-50 last:border-0">
                                        <input type="checkbox" name="bulk_category[]" value="{{ $cat->id }}"
                                            class="w-4 h-4 rounded border-slate-200 text-blue-600">
                                        <span style="font-size:12px;color:#475569;">{{ $cat->label_indented }}</span>
                                    </label>
                                @endforeach
                                </div>
                            </div>
                            <p class="form-hint mt-2">* Sản phẩm sẽ được gán thêm vào các mục được tick chọn.</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 border-t border-slate-100 bg-white flex items-center justify-end gap-3">
                    <button @click="bulkModalOpen = false" class="btn btn-secondary">Hủy bỏ</button>
                    <button @click="bulkActionFromModal()" class="btn btn-primary">
                        Xác nhận cập nhật h.loạt
                    </button>
                </div>
            </div>
        </div>
        {{-- QR CODE MODAL --}}
        <div x-show="qrModalOpen" style="display:none;"
            class="fixed inset-0 z-[10002] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm">
            <div @click.away="qrModalOpen = false" 
                class="bg-white rounded-2xl shadow-2xl w-full max-w-xs overflow-hidden">
                <div class="p-5 text-center">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-sm font-bold text-slate-900">QR Sản phẩm</h4>
                        <button @click="qrModalOpen = false" class="act-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    
                    <div class="bg-slate-50 p-4 rounded-xl mb-4 inline-block">
                        <img :src="qrUrl" class="w-[180px] h-[180px] mx-auto rounded-lg border border-slate-100" alt="QR Code">
                    </div>
                    
                    <h5 class="text-xs font-bold text-slate-700 mb-1 line-clamp-1" x-text="qrProductName"></h5>
                    <p class="text-[10px] text-slate-400 mb-4">Quét để xem chi tiết sản phẩm</p>
                    
                    <div class="flex flex-col gap-2">
                        <button @click="downloadQr()" class="btn btn-primary" style="justify-content:center;">
                            <i class="fa-solid fa-download"></i> Tải mã QR
                        </button>
                        <button @click="qrModalOpen = false" class="btn btn-secondary" style="justify-content:center;">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- End of productTable scope --}}
@endsection

@push('scripts')
    <script>
        function productTable() {
            return {
                selected: [],
                allSelected: false,
                productNames: @json($products->mapWithKeys(function($product) use ($locale) {
                    return [$product->id => $product->translate('name', $locale) ?: $product->name];
                })),

                bulkModalOpen: false,
                qrModalOpen: false,
                qrUrl: '',
                qrProductName: '',

                getProductName(id) {
                    return this.productNames[id] || 'Mặt hàng #' + id;
                },

                removeSelected(id) {
                    this.selected = this.selected.filter(i => i !== id);
                },

                toggleAll(e) {
                    const ids = @json($products->pluck('id'));
                    this.selected = e.target.checked ? ids : [];
                },

                async quickUpdate(id, data) {
                    const url = `{{ locale_route('admin.products.quick-update', ':id') }}`.replace(':id', id);
                    try {
                        const response = await fetch(url, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify(data)
                        });
                        const result = await response.json();
                        if (result.success) {
                            adminToast('Thành công', 'Cập nhật thành công!', 'success');
                        } else {
                            alert(result.message || 'Lỗi cập nhật nhanh');
                        }
                    } catch (error) { console.error(error); }
                },

                async bulkActionFromModal() {
                    const status = document.getElementById('m-bulk-status').value;
                    const price = document.getElementById('m-bulk-price').value;
                    const priceRule = document.getElementById('m-bulk-price-rule').value;
                    const stock = document.getElementById('m-bulk-stock').value;
                    const stockRule = document.getElementById('m-bulk-stock-rule').value;
                    const featured = document.getElementById('m-bulk-featured').value;
                    const favorite = document.getElementById('m-bulk-favorite').value;
                    const bestseller = document.getElementById('m-bulk-bestseller').value;

                    const catInputs = document.querySelectorAll('input[name="bulk_category[]"]:checked');
                    const categoryIds = Array.from(catInputs).map(cb => cb.value);

                    if (!status && !price && !stock && categoryIds.length === 0 && !featured && !favorite && !bestseller) {
                        return alert('Vui lòng chọn ít nhất một thông tin cần thay đổi');
                    }

                    if (!confirm(`Áp dụng thay đổi cho ${this.selected.length} sản phẩm?`)) return;

                    try {
                        const response = await fetch('{{ locale_route('admin.products.bulk-update') }}', {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({
                                ids: this.selected,
                                status: status,
                                price: price,
                                price_rule: priceRule,
                                stock: stock,
                                stock_rule: stockRule,
                                is_featured: featured,
                                is_favorite: favorite,
                                is_best_seller: bestseller,
                                category_ids: categoryIds
                            })
                        });
                        const result = await response.json();
                        if (result.success) {
                            window.location.reload();
                        } else {
                            alert(result.message || 'Lôi cập nhật hàng loạt');
                        }
                    } catch (error) { console.error(error); }
                },

                async downloadQr() {
                    try {
                        const response = await fetch(this.qrUrl);
                        const blob = await response.blob();
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = `qr-${this.qrProductName.toLowerCase().replace(/\s+/g, '-')}.png`;
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                        document.body.removeChild(a);
                    } catch (error) {
                        console.error('Error downloading QR:', error);
                        window.open(this.qrUrl, '_blank');
                    }
                },

                async bulkDelete() {
                    if (!confirm(`Chuyển ${this.selected.length} sản phẩm đã chọn vào thùng rác?`)) return;
                    try {
                        const res = await fetch('{{ locale_route('admin.products.bulk-delete') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({ ids: this.selected })
                        });
                        const data = await res.json();
                        if (data.success) {
                            window.location.reload();
                        } else {
                            alert(data.message || 'Có lỗi xảy ra.');
                        }
                    } catch (error) {
                        console.error('Bulk delete error:', error);
                        alert('Có lỗi xảy ra khi xóa.');
                    }
                }
            }
        }
    </script>
@endpush
