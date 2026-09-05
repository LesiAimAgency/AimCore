@extends('admin.layouts.app')

@section('title', 'Widget Management')
@section('page-title', 'Widget Builder')
@section('page-subtitle', 'Kéo & thả để xây dựng bố cục trang web hiện đại')

@push('styles')
    <!-- Sortable JS and Custom Style Inclusion -->
    <link rel="stylesheet" href="{{ asset('assets/admin/widget.css') }}?v={{ time() }}">
    <style>
        /* Small inline tweaks to fix layout within the existing admin app wrapper */
        .area-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .wb-wrap {
            display: flex;
            gap: 2rem;
            min-height: calc(100vh - 180px);
            align-items: flex-start;
        }

        .wb-left {
            width: 320px;
            flex-shrink: 0;
            position: sticky;
            top: 2rem;
            background: white;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            max-height: calc(100vh - 120px);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .wb-right {
            flex: 1;
            min-width: 0;
        }

        /* Collapsible Transition */
        .area-body {
            max-height: 2000px;
            overflow: visible;
            transition: all 0.3s ease-in-out;
        }

        .area-body.collapsed {
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
            overflow: hidden;
            border: none;
        }

        /* ── Modern Slide-over Drawer (wm-canvas) ── */
        .wm-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            visibility: hidden;
            transition: all 0.3s;
        }
        .wm-overlay.open {
            visibility: visible;
        }
        .wm-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(8px);
            opacity: 0;
            transition: opacity 0.4s ease-out;
        }
        .wm-overlay.open .wm-backdrop {
            opacity: 1;
        }
        .wm-box {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            max-width: 100%;
            background: white;
            box-shadow: -20px 0 50px -10px rgba(0,0,0,0.1);
            transform: translateX(100%);
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
        }
        .wm-overlay.open .wm-box {
            transform: translateX(0);
        }

        .wm-head {
            padding: 14px 20px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
        }

        .wm-body {
            flex: 1;
            overflow-y: auto;
            padding: 0;
            background: #f8fafc;
        }

        .wm-foot {
            padding: 12px 20px;
            background: white;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* ── Form Styling ── */
        .form-label-premium {
            font-size: 11px;
            font-weight: 900;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.75rem;
            display: block;
            padding-left: 0.25rem;
        }

        /* ── Lang Tabs ── */
        #wm-lang-tabs {
            display: flex !important;
        }
        .lang-tab {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            cursor: pointer;
            border: none;
            background: transparent;
            color: #94a3b8;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .lang-tab:hover { background: white; color: #475569; }
        .lang-tab.active { background: white; color: #1e40af; box-shadow: 0 1px 4px rgba(0,0,0,0.08); }
        .lang-tab .lang-flag { font-size: 14px; line-height: 1; }
        .lang-tab-default-badge {
            font-size: 8px;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 1px 5px;
            border-radius: 4px;
            font-weight: 900;
            letter-spacing: 0.05em;
        }
        /* Translation unsaved indicator */
        .lang-tab .unsaved-dot {
            width: 6px; height: 6px;
            background: #f59e0b;
            border-radius: 50%;
            display: none;
        }
        .lang-tab.has-unsaved .unsaved-dot { display: inline-block; }
    </style>
@endpush

@section('content')
    <div class="wb-wrap">

        {{-- 1. LEFT PANEL: Available Widgets --}}
        <aside class="wb-left">
            <div class="p-4 bg-white border-bottom">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fa-solid fa-shapes text-blue-600 text-lg"></i>
                    <h5 class="text-sm font-black text-slate-800 uppercase tracking-wider">Tiện ích sẵn có</h5>
                </div>
                <div class="relative">
                    <i
                        class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs text-xs"></i>
                    <input type="text" id="widget-search"
                        class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-8 pr-3 py-2 text-xs font-medium outline-none focus:ring-2 focus:ring-blue-500/10 focus:border-blue-500 transition-all"
                        placeholder="search widget...">
                </div>
            </div>

            <div class="flex-1 overflow-y-auto px-4 py-4 custom-scroll" id="available-widgets-list">
                @foreach($types as $typeKey => $type)
                    <div class="available-widget-item" data-type="{{ $typeKey }}" data-label="{{ $type['label'] }}">
                        <div class="widget-icon-box">
                            <i class="{{ $type['icon'] ?? 'fa-solid fa-layer-group' }} text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-[12px] font-black text-slate-800 truncate">{{ $type['label'] }}</div>
                            <div class="text-[10px] text-slate-400 font-medium truncate">{{ $type['description'] }}</div>
                        </div>
                        <i class="fa-solid fa-grip-vertical text-slate-300 text-[10px] handle cursor-grab"></i>
                    </div>
                @endforeach
            </div>

            <div class="p-4 bg-slate-50 border-t text-center">
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-relaxed">
                    Kéo & thả widget vào<br>khu vực bạn muốn hiển thị
                </p>
            </div>
        </aside>

        {{-- 2. RIGHT PANEL: Widget Areas --}}
        <main class="wb-right">
            <div class="area-grid">
                @foreach($widgetsByArea as $areaKey => $areaData)
                    <div class="area-card widget-card shadow-sm" data-area="{{ $areaKey }}">
                        {{-- Area Header (Toggle) --}}
                        <div class="area-header">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-600">
                                    <i class="fa-solid {{ $areaData['area']['icon'] ?? 'fa-table-cells-large' }} text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-black text-slate-800 tracking-tight">
                                        {{ $areaData['area']['label'] }}</div>
                                    <div class="text-[10px] text-slate-400 font-medium tracking-tight">
                                        {{ $areaData['area']['description'] ?? 'Quản lý widget trong khu vực này' }}</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span
                                    class="text-[9px] font-black text-slate-300 bg-slate-50 px-2 py-0.5 rounded-full uppercase tracking-tighter">
                                    {{ count($areaData['widgets']) }} items
                                </span>
                                @php $inactiveCount = collect($areaData['widgets'])->where('is_active', false)->count(); @endphp
                                @if($inactiveCount > 0)
                                <button onclick="activateAllInArea('{{ $areaKey }}', this)"
                                    style="font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.06em; padding:2px 8px; border-radius:20px; background:#fef9c3; color:#ca8a04; border:none; cursor:pointer;"
                                    title="Bật tất cả {{ $inactiveCount }} widget đang ẩn">
                                    <i class="fa-solid fa-bolt" style="margin-right:3px;"></i>Bật {{ $inactiveCount }} ẩn
                                </button>
                                @endif
                                <i
                                    class="fa-solid fa-chevron-down text-slate-300 text-xs transition-transform collapse-icon"></i>
                            </div>
                        </div>

                        {{-- Area Drop Zone --}}
                        <div class="area-body widget-drop-zone transition-all pb-6" data-area="{{ $areaKey }}">
                            {{-- Empty State --}}
                            <div class="empty-area-placeholder @if(count($areaData['widgets']) > 0) hidden @endif">
                                <i class="fa-solid fa-plus-circle me-2 opacity-50"></i> Thả Widget vào đây
                            </div>

                            @foreach($areaData['widgets'] as $widget)
                                <div class="placed-widget-item widget-card group" data-id="{{ $widget->id }}"
                                    data-type="{{ $widget->type }}">

                                    <i class="fa-solid fa-grip-vertical widget-handle"></i>

                                    <div
                                        class="w-7 h-7 rounded bg-blue-50 text-blue-500 flex items-center justify-center text-xs shrink-0">
                                        <i class="{{ $types[$widget->type]['icon'] ?? 'fa-solid fa-layer-group' }}"></i>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <div
                                            class="text-[11px] text-blue-600 font-black uppercase tracking-widest mb-0.5 opacity-60">
                                            {{ $types[$widget->type]['label'] ?? $widget->type }}</div>
                                        <div class="text-[12px] font-bold text-slate-800 truncate leading-tight">{{ $widget->name }}
                                        </div>
                                    </div>

                                    {{-- Active/Inactive badge — luôn hiển thị --}}
                                    <span class="widget-status-badge {{ $widget->is_active ? 'active' : 'inactive' }}"
                                          id="status-badge-{{ $widget->id }}"
                                          title="{{ $widget->is_active ? 'Đang hiển thị' : 'Đang ẩn — click để bật' }}"
                                          onclick="toggleWidget({{ $widget->id }}, this)"
                                          style="cursor:pointer; font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.08em; padding:2px 7px; border-radius:20px; white-space:nowrap; flex-shrink:0;
                                                 {{ $widget->is_active ? 'background:#dcfce7; color:#16a34a;' : 'background:#fee2e2; color:#dc2626;' }}">
                                        @if($widget->is_active)
                                            <i class="fa-solid fa-eye" style="margin-right:3px;"></i>Hiện
                                        @else
                                            <i class="fa-solid fa-eye-slash" style="margin-right:3px;"></i>Ẩn
                                        @endif
                                    </span>

                                    <div class="widget-actions opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="act-btn @if($widget->is_active) text-emerald-500 @endif" title="Bật/Tắt"
                                            id="toggle-btn-{{ $widget->id }}"
                                            onclick="toggleWidget({{ $widget->id }}, this)">
                                            <i class="fa-solid fa-power-off"></i>
                                        </button>
                                        <button class="act-btn" title="Cấu hình" onclick="openEditModal({{ $widget->id }})">
                                            <i class="fa-solid fa-sliders"></i>
                                        </button>
                                        <button class="act-btn" title="Nhân bản" onclick="cloneWidget({{ $widget->id }})">
                                            <i class="fa-regular fa-clone"></i>
                                        </button>
                                        <form action="{{ locale_route('admin.widgets.destroy', $widget) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="act-btn del"
                                                onclick="return confirm('Xóa Widget này?')" title="Xóa">>
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>

    {{-- ── Premium Config Drawer (Slide-over) ── --}}
    <div class="wm-overlay" id="wm-overlay">
        <div class="wm-backdrop" onclick="closeModal()"></div>
        <div class="wm-box">
            {{-- Drawer Header --}}
            <div class="wm-head">
                <div id="wm-modal-icon" class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white text-lg shadow-md border border-blue-400">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-base font-bold text-slate-900 leading-none mb-1" id="wm-modal-title">Widget Settings</h3>
                    <p id="wm-modal-subtitle" class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Hiệu chỉnh tham số và hiển thị</p>
                </div>
                {{-- Language Switcher Tabs --}}
                <div id="wm-lang-tabs" class="flex items-center gap-1 bg-slate-100 rounded-xl p-1" style="display:none!important;"></div>
                <button class="w-12 h-12 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-50 hover:text-rose-600 transition-all flex items-center justify-center text-xl group" onclick="closeModal()">
                    <i class="fa-solid fa-xmark transition-transform group-hover:rotate-90"></i>
                </button>
            </div>

            {{-- Drawer Body --}}
            <div class="wm-body custom-scroll" id="wm-body"></div>

            {{-- Drawer Footer --}}
            <div class="wm-foot">
                <div id="wm-delete-btn-wrap" style="display:none;">
                    <button class="btn btn-danger btn-sm" onclick="deleteFromModal()">
                        <i class="fa-solid fa-trash-can"></i> Xóa Widget
                    </button>
                </div>
                <div class="flex items-center gap-3 ml-auto">
                    <button class="btn btn-secondary" onclick="closeModal()">Hủy bỏ</button>
                    <button class="btn btn-primary" id="wm-save" onclick="submitModal()">
                        <i class="fa-solid fa-circle-check"></i> Lưu thay đổi
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @php
        $areasJson = [];
        foreach($widgetsByArea as $k => $v) $areasJson[$k] = $v['area']['label'];
        $categoriesJson = isset($categories) ? $categories->map(fn($c) => ['id' => $c->id, 'name' => $c->name])->values() : [];
        $campaignsJson = isset($campaigns) ? $campaigns->map(fn($c) => ['id' => $c->id, 'name' => $c->name, 'status' => $c->status])->values() : [];
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

    <script>
        // Global Config for External JS
        window.REORDER_URL = '{{ locale_route('admin.widgets.reorder') }}';
        window.STORE_URL = '{{ locale_route('admin.widgets.store') }}';
        window.TOGGLE_URL = '{{ url("/admin/widgets/{id}/toggle") }}';
        window.DATA_URL = '{{ url("/admin/widgets/{id}/data") }}';
        window.TRANSLATIONS_URL = '{{ url("/admin/widgets/{id}/translations") }}';
        window.CSRF_TOKEN = '{{ csrf_token() }}';
        const TYPES = @json($types);
        const AREAS = @json($areasJson);
        const CATEGORIES = @json($categoriesJson);
        const CAMPAIGNS = @json($campaignsJson);

        // Modal Global Vars
        let modalMode = null;
        let modalWidgetId = null;
        let modalWidgetArea = 'homepage';
        let modalWidgetType = null;

        // Lang state
        let langData = null;       // { default_locale, default_config, languages, translations }
        let currentLocale = null;  // locale đang active trong modal

        function escHtml(str) {
            if (!str) return '';
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }
    </script>

    <script src="{{ asset('assets/admin/widget.js') }}?v={{ time() }}"></script>

    <script>
        // Integration logic for Modal (kept from existing version)
        function openModal() {
            document.getElementById('wm-overlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            document.getElementById('wm-overlay').classList.remove('open');
            document.body.style.overflow = '';
        }

        function openEditModal(id) {
            modalMode = 'edit'; modalWidgetId = id;
            langData = null; currentLocale = null;
            document.getElementById('wm-delete-btn-wrap').style.display = 'block';
            document.getElementById('wm-lang-tabs').innerHTML = '';
            document.getElementById('wm-body').innerHTML = '<div class="text-center py-20 flex flex-col items-center gap-4"><div class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div><div class="text-xs font-black text-slate-400 uppercase tracking-widest">Đang tải cấu hình...</div></div>';
            openModal();

            Promise.all([
                fetch(DATA_URL.replace('{id}', id)).then(r => r.json()),
                fetch(TRANSLATIONS_URL.replace('{id}', id)).then(r => r.json()),
            ]).then(([data, tData]) => {
                const t = TYPES[data.type];
                modalWidgetArea = data.area;
                modalWidgetType = data.type;
                langData = tData;
                currentLocale = tData.default_locale;

                document.getElementById('wm-modal-title').textContent = data.name;
                document.getElementById('wm-modal-icon').innerHTML = `<i class="${t?.icon ?? 'fa-solid fa-puzzle-piece'}"></i>`;

                renderLangTabs(tData);
                renderModalForm(data);
            });
        }

        function renderLangTabs(tData) {
            const tabsEl = document.getElementById('wm-lang-tabs');
            if (!tData.languages || tData.languages.length <= 1) {
                tabsEl.style.display = 'none';
                return;
            }
            tabsEl.style.display = 'flex';
            tabsEl.innerHTML = tData.languages.map(lang => {
                const isDefault = lang.code === tData.default_locale;
                const flagHtml = lang.flag && !lang.flag.includes('/') && !lang.flag.includes('.')
                    ? `<span class="lang-flag">${lang.flag}</span>`
                    : '';
                return `<button class="lang-tab ${lang.code === currentLocale ? 'active' : ''}"
                    data-locale="${lang.code}"
                    onclick="switchLang('${lang.code}')">
                    ${flagHtml}
                    ${escHtml(lang.code.toUpperCase())}
                    ${isDefault ? '<span class="lang-tab-default-badge">Mặc định</span>' : ''}
                    <span class="unsaved-dot"></span>
                </button>`;
            }).join('');
        }

        function switchLang(locale) {
            if (locale === currentLocale) return;
            currentLocale = locale;

            // Update tab active state
            document.querySelectorAll('.lang-tab').forEach(t => {
                t.classList.toggle('active', t.dataset.locale === locale);
            });

            // Get config for this locale
            const isDefault = locale === langData.default_locale;
            const config = isDefault
                ? (langData.default_config ?? {})
                : (langData.translations[locale] ?? langData.default_config ?? {});

            // Re-render config fields with locale's data
            const mainWrap = document.getElementById('wm-config-main');
            const sideWrap = document.getElementById('wm-config-common');
            if (mainWrap) mainWrap.innerHTML = '';
            if (sideWrap) sideWrap.innerHTML = '';

            renderModalConfig(modalWidgetType, config);

            // Show/hide save button label based on locale
            const saveBtn = document.getElementById('wm-save');
            if (isDefault) {
                saveBtn.innerHTML = '<i class="fa-solid fa-circle-check me-2"></i> Lưu thay đổi';
            } else {
                saveBtn.innerHTML = `<i class="fa-solid fa-language me-2"></i> Lưu bản dịch (${locale.toUpperCase()})`;
            }
        }

        function toggleWidget(id, btn) {
            fetch(TOGGLE_URL.replace('{id}', id), {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': window.CSRF_TOKEN }
            })
                .then(r => r.json())
                .then(d => {
                    // Cập nhật nút power trong actions
                    const toggleBtn = document.getElementById('toggle-btn-' + id);
                    if (toggleBtn) toggleBtn.classList.toggle('text-emerald-500', d.is_active);

                    // Cập nhật badge luôn hiển thị
                    const badge = document.getElementById('status-badge-' + id);
                    if (badge) {
                        badge.className = 'widget-status-badge ' + (d.is_active ? 'active' : 'inactive');
                        badge.style.background = d.is_active ? '#dcfce7' : '#fee2e2';
                        badge.style.color = d.is_active ? '#16a34a' : '#dc2626';
                        badge.title = d.is_active ? 'Đang hiển thị' : 'Đang ẩn — click để bật';
                        badge.innerHTML = d.is_active
                            ? '<i class="fa-solid fa-eye" style="margin-right:3px;"></i>Hiện'
                            : '<i class="fa-solid fa-eye-slash" style="margin-right:3px;"></i>Ẩn';
                    }

                    if (window.adminToast) window.adminToast('Visibility', d.is_active ? 'Widget đã bật' : 'Widget đã tắt', 'success');
                });
        }

        function cloneWidget(id) {
            if (!confirm('Nhân bản widget này?')) return;
            fetch('{{ url("/admin/widgets") }}/' + id + '/clone', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': window.CSRF_TOKEN }
            }).then(() => location.reload());
        }

        function activateAllInArea(areaKey, btn) {
            // Lấy tất cả badge "Ẩn" trong area này
            const areaCard = document.querySelector(`.area-card[data-area="${areaKey}"]`);
            if (!areaCard) return;
            const inactiveBadges = areaCard.querySelectorAll('.widget-status-badge.inactive');
            if (!inactiveBadges.length) return;

            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin" style="margin-right:3px;"></i>Đang bật...';

            const promises = [];
            inactiveBadges.forEach(badge => {
                const id = badge.id.replace('status-badge-', '');
                promises.push(
                    fetch(TOGGLE_URL.replace('{id}', id), {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': window.CSRF_TOKEN }
                    }).then(r => r.json()).then(d => {
                        if (d.is_active) {
                            badge.className = 'widget-status-badge active';
                            badge.style.background = '#dcfce7';
                            badge.style.color = '#16a34a';
                            badge.title = 'Đang hiển thị';
                            badge.innerHTML = '<i class="fa-solid fa-eye" style="margin-right:3px;"></i>Hiện';
                            const toggleBtn = document.getElementById('toggle-btn-' + id);
                            if (toggleBtn) toggleBtn.classList.add('text-emerald-500');
                        }
                    })
                );
            });

            Promise.all(promises).then(() => {
                btn.style.display = 'none'; // Ẩn nút sau khi bật hết
                if (window.adminToast) window.adminToast('Done', 'Đã bật tất cả widget', 'success');
            });
        }

        function renderModalForm(data) {
            const areaOpts = Object.entries(AREAS).map(([k, v]) => `<option value="${k}" ${data.area === k ? 'selected' : ''}>${v}</option>`).join('');

            document.getElementById('wm-body').innerHTML = `
                <div class="flex h-full min-h-0">
                    <div class="w-1/2 p-5 bg-white overflow-y-auto border-r border-slate-100" id="wm-main-fields">
                        <div class="space-y-4 max-w-2xl mx-auto">
                            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                 <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2">Tên hiển thị nội bộ</label>
                                 <input type="text" id="wm-name" class="form-input" value="${escHtml(data.name || '')}" placeholder="Ví dụ: Banner Trang chủ">
                            </div>
                            <div id="wm-config-main" class="space-y-4"></div>
                        </div>
                    </div>
                    <aside class="w-1/2 p-5 bg-slate-50 overflow-y-auto" id="wm-config-side">
                             <div id="wm-config-common" class="space-y-4"></div>
                             <div class="bg-white p-4 rounded-xl border border-slate-100 mt-4">
                                 <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2">Vị trí hiển thị (Area)</label>
                                 <select id="wm-area" class="form-select">
                                     ${areaOpts}
                                 </select>
                             </div>
                        </div>
                    </aside>
                </div>
            `;
            renderModalConfig(data.type, data.config ?? {});
        }

        function renderModalConfig(type, config) {
            const mainWrap = document.getElementById('wm-config-main');
            const sideWrap = document.getElementById('wm-config-common');
            if (!mainWrap || !sideWrap) return;

            const t = TYPES[type];
            if (!t?.fields?.length) return;

            let target = mainWrap;
            t.fields.forEach(f => {
                if (f.type === 'tab_start' && f.key.includes('common')) {
                    target = sideWrap;
                    return;
                }
                if (f.type === 'tab_end') {
                    target = mainWrap;
                    return;
                }
                // Add field rendering logic here or use buildField from previous version
                // (I'll keep it abbreviated for brevity, assuming standard field types)
                target.appendChild(buildField(f, config[f.key] ?? f.default ?? null, 'config'));
            });
        }

        // Wrapper gọi media picker từ Alpine layout — không override window.openMediaPicker
        function wmOpenPicker(inputId) {
            if (typeof window.openMediaPicker === 'function') {
                window.openMediaPicker(inputId, function(url) {
                    const previewEl = document.getElementById(inputId + '_preview');
                    if (previewEl) {
                        previewEl.innerHTML = url
                            ? `<img src="${url}" class="w-full h-full object-cover rounded-xl">`
                            : `<i class="fa-solid fa-image text-slate-200 text-xl"></i>`;
                    }
                });
            }
        }

        function buildField(field, value, prefix) {
            const wrap = document.createElement('div');
            wrap.className = field.type === 'repeater' ? 'col-span-12' : 'bg-white p-4 rounded-xl border border-slate-100';
            const name = `${prefix}[${field.key}]`;

            if (field.type === 'repeater') {
                wrap.innerHTML = buildRepeater(field, value ?? [], prefix);
                initRepeater(wrap, field, prefix);
                return wrap;
            }

            let input = '';
            if (field.type === 'text' || field.type === 'image') {
                if (field.type === 'image') {
                    const inputId = 'img_' + name.replace(/[\[\]]/g, '_') + '_' + Math.random().toString(36).slice(2, 7);
                    input = `
                        <div class="flex gap-4">
                            <div id="${inputId}_preview" class="w-16 h-16 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center flex-shrink-0 overflow-hidden shadow-inner">
                                ${value ? `<img src="${escHtml(value)}" class="w-full h-full object-cover rounded-xl">` : `<i class="fa-solid fa-image text-slate-200 text-xl"></i>`}
                            </div>
                            <div class="flex-1 space-y-2">
                                <input type="text" id="${inputId}" name="${name}" class="w-full bg-slate-50 border border-slate-150 rounded-lg px-3 py-2.5 text-xs font-bold text-slate-700 outline-none focus:bg-white transition-all config-field" value="${escHtml(value ?? '')}" placeholder="URL ảnh hoặc chọn..."
                                    oninput="(function(el){const p=document.getElementById('${inputId}_preview');if(p)p.innerHTML=el.value?'<img src=\\''+el.value+'\\' class=\\'w-full h-full object-cover rounded-xl\\'>':'<i class=\\'fa-solid fa-image text-slate-200 text-xl\\'></i>';})(this)">
                                <button type="button" class="text-[10px] font-black text-blue-600 uppercase tracking-widest hover:text-blue-800" onclick="wmOpenPicker('${inputId}')">
                                    <i class="fa-solid fa-photo-film me-1"></i> Mở thư viện Media
                                </button>
                            </div>
                        </div>
                    `;
                } else {
                    input = `<input type="text" name="${name}" class="w-full bg-slate-50 border border-slate-150 rounded-lg px-4 py-3 text-sm font-bold text-slate-900 border-none outline-none focus:bg-white transition-all config-field" value="${escHtml(value ?? '')}" placeholder="${field.placeholder ?? ''}">`;
                }
            } else if (field.type === 'textarea' || field.type === 'html') {
                input = `<textarea name="${name}" class="w-full bg-slate-50 border-none outline-none font-bold text-sm p-4 rounded-xl focus:bg-white transition-all config-field" rows="${field.type === 'html' ? 10 : 4}" style="${field.type === 'html' ? 'font-family:monospace;' : ''}">${escHtml(value ?? '')}</textarea>`;
            } else if (field.type === 'number') {
                input = `<input type="number" name="${name}" class="w-full bg-slate-50 border border-slate-150 rounded-lg px-4 py-2 text-sm font-black text-slate-900 outline-none focus:bg-white transition-all config-field" value="${value ?? ''}">`;
            } else if (field.type === 'toggle') {
                const checked = value ? 'checked' : '';
                input = `<label class="flex items-center gap-4 cursor-pointer group">
                    <input type="hidden" name="${name}" value="0">
                    <input type="checkbox" name="${name}" value="1" ${checked} class="w-6 h-6 rounded-lg text-blue-600 border-slate-200 config-field">
                    <span class="text-xs font-black text-slate-500 uppercase tracking-widest group-hover:text-blue-600 transition-colors">${field.label}</span>
                </label>`;
                wrap.innerHTML = input;
                return wrap;
            } else if (field.type === 'color') {
                input = `<div class="flex items-center gap-3">
                    <input type="color" name="${name}" class="w-10 h-10 rounded-lg border-none p-0 cursor-pointer config-field" value="${value ?? '#ffffff'}">
                    <input type="text" class="flex-1 bg-slate-50 rounded-lg px-3 py-2 text-xs font-black text-slate-700 uppercase" value="${value ?? '#ffffff'}" oninput="this.previousElementSibling.value=this.value">
                </div>`;
            } else if (field.type === 'select') {
                const os = Object.entries(field.options ?? {}).map(([k, v]) => `<option value="${k}" ${value == k ? 'selected' : ''}>${v}</option>`).join('');
                input = `<select name="${name}" class="w-full bg-slate-50 border-none outline-none font-bold text-xs p-3 rounded-lg config-field">${os}</select>`;
            } else if (field.type === 'category_select') {
                const categories = CATEGORIES || [];
                if (field.multiple === false || field.single === true) {
                    const os = categories.map(c => `<option value="${c.id}" ${value == c.id ? 'selected' : ''}>${escHtml(c.name)}</option>`).join('');
                    input = `<select name="${name}" class="w-full bg-slate-50 border-none outline-none font-bold text-xs p-3 rounded-lg config-field"><option value="">Tất cả danh mục</option>${os}</select>`;
                } else {
                    const selectedIds = Array.isArray(value) ? value.map(String) : (value ? [String(value)] : []);
                    input = `<div class="p-4 bg-slate-50 rounded-xl space-y-2 max-h-48 overflow-y-auto custom-scroll">
                        ${categories.map(c => `
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" name="${name}[]" value="${c.id}" ${selectedIds.includes(String(c.id)) ? 'checked' : ''} class="w-4 h-4 rounded text-blue-600 border-slate-200 config-field">
                                <span class="text-xs font-bold text-slate-700 group-hover:text-blue-600 transition-colors uppercase tracking-tight">${escHtml(c.name)}</span>
                            </label>
                        `).join('')}
                    </div>`;
                }
            } else if (field.type === 'campaign_select') {
                const campaigns = CAMPAIGNS || [];
                const os = campaigns.map(c => `<option value="${c.id}" ${value == c.id ? 'selected' : ''}>${escHtml(c.name)} (${c.status})</option>`).join('');
                input = `<select name="${name}" class="w-full bg-slate-50 border-none outline-none font-bold text-xs p-3 rounded-lg config-field"><option value="">Tự động lấy chiến dịch mới nhất</option>${os}</select>`;
            } else if (field.type === 'box_model') {
                const m = value ?? {};
                input = `<div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest pl-1">Margin</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="${name}[margin_top]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.margin_top ?? ''}" placeholder="Top" title="Margin Top">
                                <input type="number" name="${name}[margin_right]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.margin_right ?? ''}" placeholder="Right" title="Margin Right">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="${name}[margin_bottom]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.margin_bottom ?? ''}" placeholder="Bottom" title="Margin Bottom">
                                <input type="number" name="${name}[margin_left]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.margin_left ?? ''}" placeholder="Left" title="Margin Left">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest pl-1">Padding</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="${name}[padding_top]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.padding_top ?? ''}" placeholder="Top" title="Padding Top">
                                <input type="number" name="${name}[padding_right]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.padding_right ?? ''}" placeholder="Right" title="Padding Right">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="${name}[padding_bottom]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.padding_bottom ?? ''}" placeholder="Bottom" title="Padding Bottom">
                                <input type="number" name="${name}[padding_left]" class="w-full bg-slate-50 rounded-lg p-2 text-xs font-black config-field" value="${m.padding_left ?? ''}" placeholder="Left" title="Padding Left">
                            </div>
                        </div>
                    </div>
                </div>`;
            }

            wrap.innerHTML = `<label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-3 pl-1">${field.label}</label>${input}`;
            return wrap;
        }

        function buildRepeater(field, rows, prefix) {
            const name = `${prefix}[${field.key}]`;
            return `
            <div class="repeater-wrap" data-field='${JSON.stringify(field)}' data-prefix="${prefix}">
                <div class="flex items-center justify-between mb-6">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest pl-1">${field.label}</label>
                    <button type="button" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 font-bold text-[10px] uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all repeater-add">
                        <i class="fa-solid fa-plus me-1"></i> Thêm mục mới
                    </button>
                </div>
                <div class="repeater-rows space-y-4">
                    ${(rows ?? []).map((row, i) => buildRepeaterRow(field, row, name, i)).join('')}
                </div>
            </div>`;
        }

        function buildRepeaterRow(field, data, name, idx) {
            const subFields = (field.fields ?? []).map(sf => {
                const val = data[sf.key] ?? sf.default ?? '';
                const subPrefix = `${name}[${idx}]`;
                const subName = `${subPrefix}[${sf.key}]`;
                
                let inp = '';
                if (sf.type === 'image') {
                    const sfId = 'rimg_' + subName.replace(/[\[\]]/g, '_') + '_' + Math.random().toString(36).slice(2, 7);
                    inp = `
                        <div class="flex gap-3">
                            <div id="${sfId}_preview" class="w-12 h-12 rounded-lg bg-white border border-slate-150 flex items-center justify-center flex-shrink-0 overflow-hidden shadow-sm">
                                ${val ? `<img src="${escHtml(val)}" class="w-full h-full object-cover">` : `<i class="fa-solid fa-image text-slate-200"></i>`}
                            </div>
                            <div class="flex-1 space-y-1">
                                <input type="text" id="${sfId}" name="${subName}" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-[11px] font-bold text-slate-700 outline-none config-field" value="${escHtml(val)}" placeholder="URL"
                                    oninput="(function(el){const p=document.getElementById('${sfId}_preview');if(p)p.innerHTML=el.value?'<img src=\\''+el.value+'\\' class=\\'w-full h-full object-cover\\'>':'<i class=\\'fa-solid fa-image text-slate-200\\'></i>';})(this)">
                                <button type="button" class="text-[9px] font-black text-blue-600 uppercase tracking-widest" onclick="wmOpenPicker('${sfId}')">Chọn Media</button>
                            </div>
                        </div>
                    `;
                } else if (sf.type === 'select') {
                    const opts = Object.entries(sf.options ?? {}).map(([k, v]) => `<option value="${k}" ${data[sf.key] == k ? 'selected' : ''}>${v}</option>`).join('');
                    inp = `<select name="${subName}" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-xs font-bold text-slate-700 outline-none config-field">${opts}</select>`;
                } else if (sf.type === 'category_select') {
                    const categories = CATEGORIES || [];
                    const os = categories.map(c => `<option value="${c.id}" ${data[sf.key] == c.id ? 'selected' : ''}>${escHtml(c.name)}</option>`).join('');
                    inp = `<select name="${subName}" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-xs font-bold text-slate-700 outline-none config-field"><option value="">Chọn danh mục</option>${os}</select>`;
                } else {
                    inp = `<input type="text" name="${subName}" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-xs font-bold text-slate-700 outline-none config-field" value="${escHtml(val)}" placeholder="${sf.label}">`;
                }
                return `<div class="space-y-1"><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">${sf.label}</label>${inp}</div>`;
            }).join('');

            return `<div class="repeater-row bg-slate-50/50 p-6 rounded-2xl border border-slate-150 relative group/row">
                <button type="button" class="repeater-remove w-8 h-8 rounded-lg bg-rose-50 text-rose-500 absolute -top-2 -right-2 shadow-sm border border-rose-100 flex items-center justify-center text-sm opacity-0 group-hover/row:opacity-100 transition-all hover:bg-rose-600 hover:text-white">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    ${subFields}
                </div>
            </div>`;
        }

        function initRepeater(wrap, field, prefix) {
            const name = `${prefix}[${field.key}]`;
            wrap.querySelector('.repeater-add').onclick = () => {
                const rows = wrap.querySelector('.repeater-rows');
                const idx = rows.querySelectorAll('.repeater-row').length;
                const div = document.createElement('div');
                div.innerHTML = buildRepeaterRow(field, {}, name, idx);
                rows.appendChild(div.firstElementChild);
                bindRemove(rows, name, field);
            };
            bindRemove(wrap.querySelector('.repeater-rows'), name, field);
        }

        function bindRemove(rows, name, field) {
            rows.querySelectorAll('.repeater-remove').forEach(btn => {
                btn.onclick = () => {
                    btn.closest('.repeater-row').remove();
                    reindexRepeater(rows, name);
                };
            });
        }

        function reindexRepeater(rows, name) {
            rows.querySelectorAll('.repeater-row').forEach((row, idx) => {
                row.querySelectorAll('.config-field').forEach(el => {
                    el.name = el.name.replace(/\[\d+\]/, `[${idx}]`);
                });
            });
        }

        function submitModal() {
            const isDefaultLocale = !langData || currentLocale === langData.default_locale;

            // For non-default locale: save translation only
            if (!isDefaultLocale) {
                saveLangTranslation(currentLocale);
                return;
            }

            // Default locale: full widget update
            const fd = new FormData();
            fd.append('_token', window.CSRF_TOKEN);
            fd.append('name', document.getElementById('wm-name')?.value || 'Unnamed');
            fd.append('area', document.getElementById('wm-area')?.value || modalWidgetArea);
            fd.append('_method', 'PUT');

            // Khởi tạo array rỗng cho tất cả category_select multi trước
            const initedArrayKeys = new Set();
            document.querySelectorAll('.config-field[type="checkbox"]').forEach(el => {
                if (!el.name) return;
                const match = el.name.match(/^config\[([^\]]+)\]\[\]$/);
                if (match && !initedArrayKeys.has(el.name.replace('[]', ''))) {
                    // Không append gì — FormData sẽ không có key này nếu không có checkbox checked
                    // Nhưng ta cần đảm bảo key tồn tại, dùng hidden input trick
                    initedArrayKeys.add(el.name.replace('[]', ''));
                }
            });

            document.querySelectorAll('.config-field').forEach(el => {
                if (el.type === 'checkbox') {
                    if (el.checked) fd.append(el.name, el.value);
                } else if (el.type === 'radio') {
                    if (el.checked) fd.append(el.name, el.value);
                } else {
                    fd.append(el.name, el.value);
                }
            });

            const url = '{{ url("/admin/widgets") }}/' + modalWidgetId;
            const btn = document.getElementById('wm-save');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Đang lưu...';

            fetch(url, {
                method: 'POST',
                body: fd,
                headers: { 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    if (window.adminToast) window.adminToast('Thành công', 'Đã lưu widget', 'success');
                    // Cập nhật tên widget trong danh sách không cần reload
                    const newName = document.getElementById('wm-name')?.value;
                    const newArea = document.getElementById('wm-area')?.value;
                    if (newName) {
                        const itemEl = document.querySelector(`.placed-widget-item[data-id="${modalWidgetId}"] .text-\\[12px\\]`);
                        if (itemEl) itemEl.textContent = newName;
                    }
                    // Reload lại data vào modal để phản ánh đúng dữ liệu đã lưu
                    Promise.all([
                        fetch(DATA_URL.replace('{id}', modalWidgetId)).then(r => r.json()),
                        fetch(TRANSLATIONS_URL.replace('{id}', modalWidgetId)).then(r => r.json()),
                    ]).then(([freshData, freshTData]) => {
                        langData = freshTData;
                        modalWidgetArea = freshData.area;
                        document.getElementById('wm-modal-title').textContent = freshData.name;
                        renderLangTabs(freshTData);
                        renderModalForm(freshData);
                    });
                } else {
                    alert('Lỗi: ' + (data.message || 'Không thể lưu.'));
                }
            })
            .catch(err => alert('Lỗi kết nối: ' + err.message))
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = '<i class="fa-solid fa-circle-check me-2"></i> Lưu thay đổi';
            });
        }

        function saveLangTranslation(locale) {
            const config = buildConfigObject();

            const btn = document.getElementById('wm-save');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Đang lưu...';

            fetch(TRANSLATIONS_URL.replace('{id}', modalWidgetId), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.CSRF_TOKEN,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ locale, config }),
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    // Update local cache
                    if (!langData.translations) langData.translations = {};
                    langData.translations[locale] = config;
                    // Remove unsaved dot
                    document.querySelector(`.lang-tab[data-locale="${locale}"] .unsaved-dot`)?.style.setProperty('display', 'none');
                    if (window.adminToast) window.adminToast('Đã lưu', `Bản dịch ${locale.toUpperCase()} đã được lưu`, 'success');
                    else alert(`Đã lưu bản dịch ${locale.toUpperCase()}`);
                } else {
                    alert('Lỗi: ' + (data.message || 'Không thể lưu bản dịch.'));
                }
            })
            .catch(err => alert('Lỗi kết nối: ' + err.message))
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = `<i class="fa-solid fa-language me-2"></i> Lưu bản dịch (${locale.toUpperCase()})`;
            });
        }

        function buildConfigObject() {
            const result = {};

            // Trước tiên, khởi tạo tất cả các key category_select thành [] rỗng
            // để đảm bảo khi không chọn gì vẫn lưu được array rỗng
            document.querySelectorAll('.config-field[type="checkbox"]').forEach(el => {
                if (!el.name) return;
                // Lấy key từ name dạng config[category_id][]
                const match = el.name.match(/^config\[([^\]]+)\]\[\]$/);
                if (match) {
                    const key = match[1];
                    if (!Array.isArray(result[key])) result[key] = [];
                }
            });

            document.querySelectorAll('.config-field').forEach(el => {
                if (!el.name) return;

                // Bỏ qua radio/checkbox không checked
                if (el.type === 'radio' && !el.checked) return;

                // Xử lý checkbox array: config[key][]
                if (el.type === 'checkbox') {
                    const arrMatch = el.name.match(/^config\[([^\]]+)\]\[\]$/);
                    if (arrMatch) {
                        // Đây là checkbox array (category_select multi)
                        if (el.checked) {
                            const key = arrMatch[1];
                            if (!Array.isArray(result[key])) result[key] = [];
                            result[key].push(el.value);
                        }
                        return; // Đã xử lý, bỏ qua phần dưới
                    }
                    // Checkbox đơn (toggle): nếu không checked thì skip
                    if (!el.checked) return;
                }

                // Parse name dạng config[key] hoặc config[key][idx][subkey]
                const parts = el.name.replace(/\]/g, '').split('[').slice(1); // bỏ prefix 'config'
                if (!parts.length) return;

                let obj = result;
                for (let i = 0; i < parts.length - 1; i++) {
                    const k = parts[i];
                    const nextIsIndex = !isNaN(parts[i + 1]) && parts[i + 1] !== '';
                    if (obj[k] === undefined) obj[k] = nextIsIndex ? [] : {};
                    obj = obj[k];
                }
                const lastKey = parts[parts.length - 1];
                if (Array.isArray(obj)) {
                    obj[parseInt(lastKey)] = el.value;
                } else {
                    obj[lastKey] = el.value;
                }
            });

            return result;
        }

        function deleteFromModal() {
            if (!confirm('Xóa Widget này vĩnh viễn?')) return;
            fetch('{{ url("/admin/widgets") }}/' + modalWidgetId, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': window.CSRF_TOKEN },
                body: (() => { const fd = new FormData(); fd.append('_method', 'DELETE'); return fd; })()
            }).then(() => location.reload());
        }
    </script>
@endpush
