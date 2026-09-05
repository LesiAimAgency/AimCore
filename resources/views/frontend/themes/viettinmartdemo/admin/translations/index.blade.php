@extends('admin.layouts.app')
@section('title', 'Quản lý bản dịch')
@section('page-title', 'Quản lý bản dịch')
@section('page-subtitle', 'Dịch trực tiếp nội dung sang các ngôn ngữ khác')

@section('content')

{{-- Bộ lọc --}}
<form method="GET" class="card mb-4">
    <div class="card-body" style="display:flex;gap:10px;flex-wrap:wrap;align-items:flex-end;">
        <div>
            <label class="form-label">Ngôn ngữ đích</label>
            <select name="locale" onchange="this.form.submit()" class="form-select" style="min-width:140px;">
                @foreach($languages as $lang)
                <option value="{{ $lang->code }}" {{ $locale === $lang->code ? 'selected' : '' }}>
                    {{ $lang->name }} ({{ strtoupper($lang->code) }})
                </option>
                @endforeach
            </select>
        </div>
        <div style="flex:1;min-width:200px;">
            <label class="form-label">search</label>
            <input type="text" name="search" value="{{ $search }}" class="form-input"
                   placeholder="Tìm theo field hoặc nội dung...">
        </div>
        <input type="hidden" name="locale" value="{{ $locale }}">
        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-magnifying-glass"></i> Tìm
        </button>
    </div>
</form>

@if($translations->isEmpty())
<div class="card">
    <div class="card-body" style="text-align:center;padding:60px 20px;color:#94a3b8;">
        <i class="fa-solid fa-language" style="font-size:40px;opacity:.3;display:block;margin-bottom:12px;"></i>
        <p style="font-size:14px;font-weight:600;color:#64748b;">Chưa có bản dịch nào cho ngôn ngữ này</p>
        <p style="font-size:13px;margin-top:6px;">Bản dịch được tạo tự động khi bạn lưu nội dung có hỗ trợ đa ngôn ngữ.</p>
    </div>
</div>
@else
<form action="{{ locale_route('admin.translations.bulk') }}" method="POST" id="bulk-form">
    @csrf
    <div class="card" style="overflow:hidden;">
        <div class="card-header" style="justify-content:space-between;flex-wrap:wrap;gap:8px;">
            <p style="font-size:13px;font-weight:700;color:#374151;">
                Bản dịch — <span style="color:#2563eb;">{{ strtoupper($locale) }}</span>
                <span class="badge badge-blue" style="margin-left:6px;">{{ $translations->total() }}</span>
            </p>
            <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                {{-- Nút dịch tự động toàn trang --}}
                <button type="button" class="btn btn-secondary btn-sm" id="btn-translate-all"
                        title="Tự động dịch tất cả ô trống trên trang này">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    <span id="translate-all-label">Dịch tự động trang này</span>
                </button>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-floppy-disk"></i> Lưu tất cả
                </button>
            </div>
        </div>

        {{-- Thanh trạng thái dịch --}}
        <div id="translate-status" style="display:none;padding:10px 16px;background:#eff6ff;border-bottom:1px solid #dbeafe;font-size:13px;color:#1d4ed8;font-weight:600;">
            <i class="fa-solid fa-spinner fa-spin me-2"></i>
            <span id="translate-status-text">Đang dịch...</span>
        </div>

        <table style="width:100%;border-collapse:collapse;">
            <thead>
                <tr style="background:#f8fafc;border-bottom:1.5px solid #f1f5f9;">
                    <th class="tbl-th" style="width:30px;">
                        <input type="checkbox" id="check-all" title="Chọn tất cả" style="cursor:pointer;">
                    </th>
                    <th class="tbl-th" style="width:150px;">Loại</th>
                    <th class="tbl-th" style="width:130px;">Field</th>
                    <th class="tbl-th">Nội dung gốc</th>
                    <th class="tbl-th">Bản dịch ({{ strtoupper($locale) }})</th>
                    <th class="tbl-th" style="width:80px;text-align:center;">Dịch</th>
                </tr>
            </thead>
            <tbody>
                @foreach($translations as $tr)
                @php $original = $tr->translatable?->getRawOriginal($tr->field) ?? ''; @endphp
                <tr class="tbl-tr" data-id="{{ $tr->id }}">
                    <td class="tbl-td">
                        <input type="checkbox" class="row-check" value="{{ $tr->id }}" style="cursor:pointer;">
                    </td>
                    <td class="tbl-td">
                        <span class="badge badge-blue" style="font-size:11px;">
                            {{ class_basename($tr->translatable_type) }}
                            @if($tr->translatable_id)
                                <span style="opacity:.6;">#{{ $tr->translatable_id }}</span>
                            @endif
                        </span>
                    </td>
                    <td class="tbl-td">
                        <code style="font-size:12px;color:#64748b;">{{ $tr->field }}</code>
                    </td>
                    <td class="tbl-td" style="color:#64748b;font-size:13px;max-width:220px;">
                        <span class="original-text" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ $original }}</span>
                    </td>
                    <td class="tbl-td">
                        <textarea name="translations[{{ $tr->id }}]"
                                  class="form-textarea translation-input"
                                  rows="2"
                                  data-id="{{ $tr->id }}"
                                  style="width:100%;resize:vertical;">{{ $tr->value }}</textarea>
                    </td>
                    <td class="tbl-td" style="text-align:center;">
                        <button type="button" class="act-btn btn-translate-row"
                                data-id="{{ $tr->id }}"
                                data-original="{{ e($original) }}"
                                title="Dịch tự động dòng này">
                            <i class="fa-solid fa-language"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($translations->hasPages())
        <div style="padding:14px 16px;border-top:1.5px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
            {{ $translations->links() }}
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-floppy-disk"></i> Lưu tất cả
            </button>
        </div>
        @endif
    </div>
</form>
@endif
@endsection

@push('scripts')
<script>
const AUTO_TRANSLATE_URL = '{{ locale_route('admin.translations.auto-translate') }}';
const CSRF = '{{ csrf_token() }}';
const TARGET_LOCALE = '{{ $locale }}';
// Lấy locale mặc định (ngôn ngữ nguồn) từ PHP
const SOURCE_LOCALE = '{{ $defaultLocale ?? 'vi' }}';

// ── Checkbox chọn tất cả ──
document.getElementById('check-all')?.addEventListener('change', function () {
    document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
});

// ── Dịch 1 dòng ──
document.querySelectorAll('.btn-translate-row').forEach(btn => {
    btn.addEventListener('click', async function () {
        const id       = this.dataset.id;
        const original = this.dataset.original;
        const textarea = document.querySelector(`textarea[data-id="${id}"]`);
        if (!original.trim()) return;

        const icon = this.querySelector('i');
        icon.className = 'fa-solid fa-spinner fa-spin';
        this.disabled = true;

        try {
            const res  = await fetchTranslate({ text: original, source: SOURCE_LOCALE, target: TARGET_LOCALE });
            if (res.translated !== undefined) {
                textarea.value = res.translated;
                textarea.style.borderColor = '#22c55e';
                setTimeout(() => textarea.style.borderColor = '', 1500);
            } else {
                alert(res.error || 'Lỗi dịch thuật');
            }
        } catch (e) {
            alert('Không thể kết nối dịch vụ dịch thuật.');
        }

        icon.className = 'fa-solid fa-language';
        this.disabled = false;
    });
});

// ── Dịch tất cả trang (ưu tiên ô trống, hoặc các ô được check) ──
document.getElementById('btn-translate-all')?.addEventListener('click', async function () {
    // Lấy IDs được check, nếu không có thì lấy tất cả ô trống
    const checked = [...document.querySelectorAll('.row-check:checked')].map(cb => parseInt(cb.value));
    const emptyRows = [...document.querySelectorAll('.translation-input')]
        .filter(ta => !ta.value.trim())
        .map(ta => parseInt(ta.dataset.id));

    const ids = checked.length > 0 ? checked : emptyRows;

    if (ids.length === 0) {
        alert('Không có ô nào cần dịch (tất cả đã có nội dung). Hãy chọn checkbox các dòng muốn dịch lại.');
        return;
    }

    if (!confirm(`Sẽ tự động dịch ${ids.length} mục sang ${TARGET_LOCALE.toUpperCase()}. Tiếp tục?`)) return;

    const statusBar  = document.getElementById('translate-status');
    const statusText = document.getElementById('translate-status-text');
    const label      = document.getElementById('translate-all-label');
    this.disabled    = true;
    label.textContent = 'Đang dịch...';
    statusBar.style.display = 'block';
    statusText.textContent  = `Đang dịch ${ids.length} mục...`;

    try {
        const res = await fetchTranslate({ ids, source: SOURCE_LOCALE, target: TARGET_LOCALE });

        if (res.results) {
            let count = 0;
            Object.entries(res.results).forEach(([id, value]) => {
                const ta = document.querySelector(`textarea[data-id="${id}"]`);
                if (ta) { ta.value = value; count++; }
            });
            statusText.innerHTML = `<i class="fa-solid fa-circle-check me-1" style="color:#16a34a"></i> ${res.message}`;
            statusBar.style.background = '#f0fdf4';
            statusBar.style.borderColor = '#bbf7d0';
            statusBar.style.color = '#15803d';
        } else {
            statusText.textContent = res.error || 'Có lỗi xảy ra.';
            statusBar.style.background = '#fef2f2';
            statusBar.style.color = '#dc2626';
        }
    } catch (e) {
        statusText.textContent = 'Không thể kết nối dịch vụ dịch thuật.';
        statusBar.style.background = '#fef2f2';
        statusBar.style.color = '#dc2626';
    }

    this.disabled = false;
    label.textContent = 'Dịch tự động trang này';
});

// ── Helper fetch ──
async function fetchTranslate(payload) {
    const res = await fetch(AUTO_TRANSLATE_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': CSRF,
        },
        body: JSON.stringify(payload),
    });
    return res.json();
}
</script>
@endpush

