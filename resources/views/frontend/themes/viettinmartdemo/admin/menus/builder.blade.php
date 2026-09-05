@extends('admin.layouts.app')
@section('title', 'Menu Builder')
@section('page-title', 'Menu Builder')
@section('page-subtitle', 'Bấm vào nhóm bên trái để thêm mục. Kéo thả để sắp xếp.')

@section('page-actions')
    <a href="{{ locale_route('admin.menus.index') }}" class="btn btn-secondary btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
    <button id="btn-save-menu" class="btn btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Lưu Menu
    </button>
@endsection

@section('content')

{{-- ── Top bar ── --}}
<div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;flex-wrap:wrap;">
    <span style="font-size:12px;font-weight:600;color:#64748b;white-space:nowrap;">Menu:</span>
    <div style="position:relative;flex:1;max-width:300px;">
        <select onchange="location.href=this.value"
            style="width:100%;border:1px solid #e2e8f0;border-radius:8px;padding:7px 32px 7px 12px;font-size:13px;font-weight:600;color:#1e293b;background:#fff;outline:none;cursor:pointer;appearance:none;-webkit-appearance:none;">
            @foreach($allMenus as $m)
                @php $mLoc = is_array($m->config) ? ($m->config['locale'] ?? 'vi') : 'vi'; @endphp
                <option value="{{ locale_route('admin.menus.edit', ['id' => $m->id, 'locale' => $mLoc]) }}"
                    {{ $m->id == $menu->id ? 'selected' : '' }}>
                    {{ $m->name }} ({{ strtoupper($mLoc) }})
                </option>
            @endforeach
        </select>
        <i class="fa-solid fa-chevron-down" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);font-size:10px;color:#94a3b8;pointer-events:none;"></i>
    </div>
    <div style="display:flex;gap:6px;margin-left:auto;">
        @foreach(['vi' => '🇻🇳 VI', 'en' => '🇬🇧 EN'] as $loc => $lbl)
            <a href="{{ locale_route('admin.menus.edit', ['id' => $menu->id, 'locale' => $loc]) }}"
               class="btn btn-sm {{ app()->getLocale() === $loc ? 'btn-primary' : 'btn-secondary' }}">{{ $lbl }}</a>
        @endforeach
    </div>
</div>

<div style="display:flex;gap:20px;align-items:flex-start;">

{{-- ══ LEFT PANEL ══ --}}
<div style="width:280px;flex-shrink:0;position:sticky;top:16px;display:flex;flex-direction:column;gap:6px;">

@php
$srcGroups = [
    [
        'id'    => 'g-custom',
        'label' => 'Liên kết tùy chỉnh',
        'icon'  => 'fa-link',
        'color' => '#6366f1',
        'bg'    => '#eef2ff',
        'open'  => true,
        'items' => [],
    ],
    [
        'id'    => 'g-pages',
        'label' => 'Trang tĩnh',
        'icon'  => 'fa-file-lines',
        'color' => '#2563eb',
        'bg'    => '#eff6ff',
        'open'  => false,
        'items' => $pages->map(fn($i) => ['id'=>$i['id'],'label'=>$i['label'],'url'=>$i['url'],'type'=>'page'])->values()->all(),
    ],
    [
        'id'    => 'g-product-cats',
        'label' => 'Danh mục sản phẩm',
        'icon'  => 'fa-tag',
        'color' => '#059669',
        'bg'    => '#ecfdf5',
        'open'  => false,
        'items' => $productCategories->map(fn($i) => ['id'=>$i['id'],'label'=>$i['label'],'url'=>$i['url'],'type'=>'category'])->values()->all(),
    ],
    [
        'id'    => 'g-post-cats',
        'label' => 'Danh mục bài viết',
        'icon'  => 'fa-folder-open',
        'color' => '#d97706',
        'bg'    => '#fffbeb',
        'open'  => false,
        'items' => $postCategories->map(fn($i) => ['id'=>$i['id'],'label'=>$i['label'],'url'=>$i['url'],'type'=>'category'])->values()->all(),
    ],
    [
        'id'    => 'g-posts',
        'label' => 'Bài viết',
        'icon'  => 'fa-pen-nib',
        'color' => '#7c3aed',
        'bg'    => '#f5f3ff',
        'open'  => false,
        'items' => $posts->map(fn($i) => ['id'=>$i['id'],'label'=>$i['label'],'url'=>$i['url'],'type'=>'post'])->values()->all(),
    ],
    [
        'id'    => 'g-products',
        'label' => 'Sản phẩm',
        'icon'  => 'fa-box',
        'color' => '#ea580c',
        'bg'    => '#fff7ed',
        'open'  => false,
        'items' => $products->map(fn($i) => ['id'=>$i['id'],'label'=>$i['label'],'url'=>$i['url'],'type'=>'product'])->values()->all(),
    ],
    [
        'id'    => 'g-channels',
        'label' => 'Our Channel',
        'icon'  => 'fa-youtube',
        'color' => '#ef4444',
        'bg'    => '#fee2e2',
        'open'  => false,
        'items' => [],
    ],
];
@endphp

@foreach($srcGroups as $g)
<div class="src-card">
    {{-- Header --}}
    <button type="button" class="src-hdr" data-gid="{{ $g['id'] }}">
        <span class="src-ico" style="background:{{ $g['bg'] }};color:{{ $g['color'] }};"><i class="fa-solid {{ $g['icon'] }}"></i></span>
        <span class="src-lbl">{{ $g['label'] }}</span>
        @if($g['id'] !== 'g-custom')
            <span class="src-cnt">{{ count($g['items']) }}</span>
        @endif
        <i class="fa-solid fa-chevron-down src-chv" style="transform:rotate({{ $g['open'] ? '180' : '0' }}deg);"></i>
    </button>
    {{-- Body --}}
    <div class="src-body" id="body-{{ $g['id'] }}" style="display:{{ $g['open'] ? 'block' : 'none' }};">
        @if($g['id'] === 'g-custom')
            <div style="padding:12px;">
                <div style="margin-bottom:8px;">
                    <label class="form-label">Nhãn hiển thị</label>
                    <input type="text" id="custom-label" class="form-input" placeholder="Ví dụ: Trang chủ">
                </div>
                <div style="margin-bottom:10px;">
                    <label class="form-label">URL</label>
                    <input type="text" id="custom-url" class="form-input" placeholder="/ hoặc https://...">
                </div>
                <button id="btn-add-custom" class="btn btn-primary btn-sm" style="width:100%;justify-content:center;">
                    <i class="fa-solid fa-plus"></i> Thêm vào Menu
                </button>
            </div>
        @elseif($g['id'] === 'g-channels')
            <div style="padding:12px;">
                <div style="margin-bottom:8px;">
                    <label class="form-label">Tên Channel</label>
                    <input type="text" id="channel-label" class="form-input" placeholder="Ví dụ: YouTube">
                </div>
                <div style="margin-bottom:8px;">
                    <label class="form-label">URL</label>
                    <input type="text" id="channel-url" class="form-input" placeholder="https://...">
                </div>
                <div style="margin-bottom:8px;">
                    <label class="form-label">Icon (FontAwesome)</label>
                    <input type="text" id="channel-icon" class="form-input" placeholder="fa-brands fa-youtube">
                </div>
                <div style="margin-bottom:10px;">
                    <label class="form-label">Hình ảnh (URL)</label>
                    <div style="display:flex;gap:5px;">
                        <input type="text" id="channel-image" class="form-input" placeholder="URL hình ảnh..." oninput="updateImgPreview('channel-image_preview', this.value)">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="MB.pickMedia('channel-image')">
                            <i class="fa-solid fa-image"></i> Chọn ảnh
                        </button>
                    </div>
                    <div id="channel-image_preview" style="margin-top:6px;"></div>
                </div>
                <button id="btn-add-channel" class="btn btn-primary btn-sm" style="width:100%;justify-content:center;">
                    <i class="fa-solid fa-plus"></i> Thêm vào Menu
                </button>
            </div>
        @else
            <div style="padding:7px 8px;border-bottom:1px solid #f1f5f9;">
                <div style="position:relative;">
                    <i class="fa-solid fa-magnifying-glass" style="position:absolute;left:8px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:11px;pointer-events:none;"></i>
                    <input type="text" class="src-search" data-gid="{{ $g['id'] }}" placeholder="Tìm kiếm..."
                        style="width:100%;border:1px solid #e2e8f0;border-radius:7px;padding:6px 8px 6px 26px;font-size:12px;outline:none;background:#f8fafc;box-sizing:border-box;">
                </div>
            </div>
            <div class="src-list" id="list-{{ $g['id'] }}">
                @forelse($g['items'] as $item)
                <div class="src-item"
                     data-type="{{ $item['type'] }}"
                     data-id="{{ $item['id'] }}"
                     data-label="{{ e($item['label']) }}"
                     data-url="{{ $item['url'] }}">
                    <i class="fa-solid {{ $g['icon'] }}" style="color:{{ $g['color'] }};font-size:11px;flex-shrink:0;"></i>
                    <span>{{ $item['label'] }}</span>
                    <button class="btn-add-src" title="Thêm vào menu"><i class="fa-solid fa-plus"></i></button>
                </div>
                @empty
                <p style="text-align:center;color:#94a3b8;font-size:12px;padding:12px 0;">Không có mục nào.</p>
                @endforelse
            </div>
        @endif
    </div>
</div>
@endforeach

</div>{{-- /left --}}

{{-- ══ RIGHT: Menu Tree ══ --}}
<div style="flex:1;min-width:0;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fa-solid fa-sitemap" style="margin-right:6px;"></i>Cấu trúc Menu</span>
            <span style="font-size:11px;color:#94a3b8;">Kéo <i class="fa-solid fa-grip-vertical" style="font-size:10px;"></i> để sắp xếp · Kéo vào trong để tạo menu con</span>
        </div>
        <div class="card-body" style="padding:16px;min-height:180px;">
            <div id="menu-tree"></div>
            <div id="menu-empty" style="display:none;text-align:center;padding:36px 0;color:#94a3b8;">
                <i class="fa-solid fa-list-ul" style="font-size:22px;display:block;margin-bottom:8px;"></i>
                <span style="font-size:13px;">Chưa có mục nào. Thêm từ panel bên trái.</span>
            </div>
        </div>
    </div>
</div>

</div>{{-- /flex --}}

{{-- Edit Modal --}}
<div id="editModal" x-data="{ show: false }" x-show="show" x-cloak class="fixed inset-0 z-[99990] flex items-center justify-center p-4" @keydown.window.escape="show = false">
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="show = false"></div>
    
    {{-- Modal Content --}}
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-[420px] overflow-hidden" @click.stop>
        <div style="padding:24px;">
            <h3 style="font-size:15px;font-weight:700;margin-bottom:16px;color:#0f172a;">Chỉnh sửa mục menu</h3>
            <input type="hidden" id="edit-key">
            <div style="display:flex;flex-direction:column;gap:12px;">
                <div><label class="form-label">Nhãn hiển thị</label><input type="text" id="edit-label" class="form-input"></div>
                <div><label class="form-label">URL</label><input type="text" id="edit-url" class="form-input"></div>
                <div><label class="form-label">Icon (FontAwesome)</label><input type="text" id="edit-icon" class="form-input"></div>
                <div>
                    <label class="form-label">Hình ảnh (URL)</label>
                    <div style="display:flex;gap:5px;">
                        <input type="text" id="edit-image" class="form-input" placeholder="URL hình ảnh..." oninput="updateImgPreview('edit-image_preview', this.value)">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="MB.pickMedia('edit-image')">
                            <i class="fa-solid fa-image"></i> Chọn ảnh
                        </button>
                    </div>
                    <div id="edit-image_preview" style="margin-top:6px;"></div>
                </div>
                <div>
                    <label class="form-label">Mở trong</label>
                    <select id="edit-target" class="form-select">
                        <option value="_self">Cùng tab</option>
                        <option value="_blank">Tab mới</option>
                    </select>
                </div>
            </div>
            <div style="margin-top:20px;display:flex;justify-content:flex-end;gap:10px;">
                <button type="button" @click="show = false" class="btn btn-secondary">Hủy</button>
                <button type="button" id="btn-save-edit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    dialog::backdrop { background:rgba(15,23,42,.45);backdrop-filter:blur(4px); }

    /* Source cards */
    .src-card { border:1px solid #e2e8f0;border-radius:10px;overflow:hidden;background:#fff;box-shadow:0 1px 3px rgba(15,23,42,.04); }
    .src-hdr {
        width:100%;display:flex;align-items:center;gap:9px;
        padding:10px 12px;background:#fff;border:none;cursor:pointer;text-align:left;
        transition:background .12s;
    }
    .src-hdr:hover { background:#f8fafc; }
    .src-ico { width:28px;height:28px;border-radius:7px;display:flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0; }
    .src-lbl { flex:1;font-size:12.5px;font-weight:600;color:#1e293b; }
    .src-cnt { font-size:10.5px;font-weight:700;background:#f1f5f9;color:#64748b;padding:2px 7px;border-radius:20px;flex-shrink:0; }
    .src-chv { font-size:10px;color:#94a3b8;flex-shrink:0;transition:transform .2s; }
    .src-body { border-top:1px solid #f1f5f9;background:#fafafa; }
    .src-list { padding:5px 7px;max-height:240px;overflow-y:auto; }
    .src-list::-webkit-scrollbar { width:3px; }
    .src-list::-webkit-scrollbar-thumb { background:#e2e8f0;border-radius:3px; }

    /* Source items */
    .src-item { display:flex;align-items:center;gap:8px;padding:6px 7px;border-radius:6px;font-size:12.5px;color:#334155;transition:background .1s;margin-bottom:1px; }
    .src-item:hover { background:#f1f5f9; }
    .src-item span { flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap; }
    .btn-add-src { width:20px;height:20px;border-radius:5px;border:1px solid #e2e8f0;background:#fff;color:#64748b;font-size:9px;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .12s; }
    .btn-add-src:hover { background:#2563eb;color:#fff;border-color:#2563eb; }

    /* Menu tree */
    .menu-tree-root, .menu-children { list-style:none;padding:0;margin:0; }
    .menu-children { margin-left:28px;margin-top:4px;padding-left:10px;border-left:2px dashed #e2e8f0; }
    .menu-item-wrap { margin-bottom:5px; }
    .menu-item-row { display:flex;align-items:center;gap:8px;background:#fff;border:1px solid #e2e8f0;border-radius:9px;padding:8px 12px;transition:box-shadow .15s,border-color .15s; }
    .menu-item-row:hover { border-color:#cbd5e1;box-shadow:0 2px 8px rgba(0,0,0,.05); }
    .menu-drag-handle { color:#cbd5e1;cursor:grab;font-size:13px;padding:2px 3px;flex-shrink:0; }
    .menu-drag-handle:active { cursor:grabbing; }
    .menu-type-badge { font-size:9px;font-weight:700;padding:2px 6px;border-radius:4px;background:#f1f5f9;color:#64748b;flex-shrink:0;text-transform:uppercase;letter-spacing:.03em; }
    .menu-item-label { flex:1;font-size:13px;font-weight:600;color:#1e293b;overflow:hidden;text-overflow:ellipsis;white-space:nowrap; }
    .menu-item-url { font-size:11px;color:#94a3b8;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:140px; }
    .menu-item-actions { display:flex;gap:4px;flex-shrink:0; }

    /* Sortable */
    .sortable-ghost > .menu-item-row { opacity:.35;background:#eff6ff !important;border:1.5px dashed #3b82f6 !important; }
    .sortable-chosen > .menu-item-row { box-shadow:0 8px 24px rgba(0,0,0,.12) !important;border-color:#3b82f6 !important; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
(function () {
    'use strict';

    /* ── DATA ── */
    var menuItems = @json($items);

    function normalize(arr) {
        return (arr || []).map(function(it) {
            return {
                key:      it.key      || uid(),
                type:     it.type     || 'custom',
                label:    it.label    || '',
                url:      it.url      || '#',
                icon:     it.icon     || '',
                image:    it.image    || '',
                target:   it.target   || '_self',
                children: normalize(it.children || [])
            };
        });
    }
    menuItems = normalize(menuItems);

    function uid() { return 'k' + Math.random().toString(36).substr(2,9); }
    function esc(s) { return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }

    /* ── ACCORDION ── */
    document.querySelectorAll('.src-hdr').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var gid  = this.dataset.gid;
            var body = document.getElementById('body-' + gid);
            var chv  = this.querySelector('.src-chv');
            if (!body) return;

            var opening = body.style.display === 'none';
            body.style.display = opening ? 'block' : 'none';
            chv.style.transform = opening ? 'rotate(180deg)' : 'rotate(0deg)';

            if (opening) {
                var s = body.querySelector('.src-search');
                if (s) setTimeout(function(){ s.focus(); }, 60);
            }
        });
    });

    /* ── SEARCH ── */
    document.querySelectorAll('.src-search').forEach(function(inp) {
        inp.addEventListener('input', function() {
            var q    = this.value.toLowerCase();
            var list = document.getElementById('list-' + this.dataset.gid);
            if (!list) return;
            list.querySelectorAll('.src-item').forEach(function(row) {
                var lbl = (row.dataset.label || '').toLowerCase();
                row.style.display = lbl.includes(q) ? '' : 'none';
            });
        });
    });

    /* ── RENDER TREE ── */
    function renderTree() {
        var root  = document.getElementById('menu-tree');
        var empty = document.getElementById('menu-empty');
        root.innerHTML = '';

        if (!menuItems.length) {
            empty.style.display = 'block';
            return;
        }
        empty.style.display = 'none';

        var ul = makeList(menuItems, true);
        root.appendChild(ul);
        makeSortable(ul);
    }

    function makeList(items, isRoot) {
        var ul = document.createElement('ul');
        ul.className = isRoot ? 'menu-tree-root' : 'menu-children';
        items.forEach(function(it) { ul.appendChild(makeItem(it)); });
        return ul;
    }

    function makeItem(it) {
        var li = document.createElement('li');
        li.className = 'menu-item-wrap';
        li.dataset.key = it.key;

        var row = document.createElement('div');
        row.className = 'menu-item-row';
        row.innerHTML =
            '<span class="menu-drag-handle" title="Kéo để sắp xếp"><i class="fa-solid fa-grip-vertical"></i></span>' +
            '<span class="menu-type-badge">' + esc(it.type) + '</span>' +
            (it.icon ? '<i class="' + esc(it.icon) + '" style="margin:0 4px;font-size:12px;color:#64748b;"></i>' : '') +
            (it.image ? '<img src="' + esc(it.image) + '" style="width:16px;height:16px;object-fit:contain;margin:0 4px;border-radius:2px;">' : '') +
            '<span class="menu-item-label">' + esc(it.label) + '</span>' +
            '<span class="menu-item-url">' + esc(it.url) + '</span>' +
            '<div class="menu-item-actions">' +
                '<button class="act-btn edit" onclick="MB.edit(\'' + it.key + '\')" title="Sửa"><i class="fa-solid fa-pen"></i></button>' +
                '<button class="act-btn del"  onclick="MB.del(\'' + it.key + '\')"  title="Xóa"><i class="fa-solid fa-trash"></i></button>' +
            '</div>';
        li.appendChild(row);

        var childUl = makeList(it.children, false);
        li.appendChild(childUl);
        makeSortable(childUl);

        return li;
    }

    /* ── SORTABLE ── */
    function makeSortable(ul) {
        Sortable.create(ul, {
            group:             { name: 'menu', pull: true, put: true },
            animation:         180,
            handle:            '.menu-drag-handle',
            ghostClass:        'sortable-ghost',
            chosenClass:       'sortable-chosen',
            fallbackTolerance: 5,
            onEnd:             function() { syncDOM(); }
        });
    }

    /* ── SYNC DOM → DATA ── */
    function syncDOM() {
        var rootUl = document.querySelector('#menu-tree > ul.menu-tree-root');
        if (rootUl) menuItems = readUl(rootUl);
    }

    function readUl(ul) {
        var result = [];
        ul.querySelectorAll(':scope > li.menu-item-wrap').forEach(function(li) {
            var key     = li.dataset.key;
            var orig    = findItem(menuItems, key) || {};
            var childUl = li.querySelector(':scope > ul.menu-children');
            result.push({
                key:      key,
                type:     orig.type   || 'custom',
                label:    orig.label  || '',
                url:      orig.url    || '#',
                icon:     orig.icon   || '',
                image:    orig.image  || '',
                target:   orig.target || '_self',
                children: childUl ? readUl(childUl) : []
            });
        });
        return result;
    }

    function findItem(arr, key) {
        for (var i = 0; i < arr.length; i++) {
            if (arr[i].key === key) return arr[i];
            var f = findItem(arr[i].children || [], key);
            if (f) return f;
        }
        return null;
    }

    /* ── PUBLIC API ── */
    window.MB = {
        edit: function(key) {
            syncDOM();
            var it = findItem(menuItems, key);
            if (!it) return;
            document.getElementById('edit-key').value    = key;
            document.getElementById('edit-label').value  = it.label;
            document.getElementById('edit-url').value    = it.url;
            document.getElementById('edit-icon').value   = it.icon || '';
            document.getElementById('edit-image').value  = it.image || '';
            updateImgPreview('edit-image_preview', it.image);
            document.getElementById('edit-target').value = it.target || '_self';
            // Use Alpine to show the modal
            const modal = document.getElementById('editModal');
            if (modal.__x) modal.__x.$data.show = true;
            else modal.style.display = 'flex'; // fallback
        },
        pickMedia: function(inputId) {
            if (typeof openMediaPicker === 'function') {
                openMediaPicker(inputId, function(url) {
                    updateImgPreview(inputId + '_preview', url);
                });
            } else {
                // Fallback nếu modal không hoạt động
                const win = window.open('{{ locale_route('admin.media.index') }}?target=' + inputId, 'MediaManager', 'width=1200,height=800');
            }
        },
        del: function(key) {
            if (!confirm('Xóa mục này?')) return;
            syncDOM();
            (function rm(arr) {
                for (var i = 0; i < arr.length; i++) {
                    if (arr[i].key === key) { arr.splice(i,1); return true; }
                    if (rm(arr[i].children||[])) return true;
                }
            })(menuItems);
            renderTree();
        }
    };

    /* ── SAVE EDIT ── */
    document.getElementById('btn-save-edit').addEventListener('click', function() {
        var key = document.getElementById('edit-key').value;
        (function upd(arr) {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i].key === key) {
                    arr[i].label  = document.getElementById('edit-label').value;
                    arr[i].url    = document.getElementById('edit-url').value;
                    arr[i].icon   = document.getElementById('edit-icon').value;
                    arr[i].image  = document.getElementById('edit-image').value;
                    arr[i].target = document.getElementById('edit-target').value;
                    return true;
                }
                if (upd(arr[i].children||[])) return true;
            }
        })(menuItems);
        // Hide modal
        const modal = document.getElementById('editModal');
        if (modal.__x) modal.__x.$data.show = false;
        else modal.style.display = 'none';
        
        renderTree();
    });

    /* ── ADD FROM SOURCE ── */
    function addItem(type, label, url, icon = '', image = '') {
        syncDOM();
        menuItems.push({ key: uid(), type: type, label: label, url: url, icon: icon, image: image, target: '_self', children: [] });
        renderTree();
    }

    document.querySelectorAll('.btn-add-src').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var row = this.closest('.src-item');
            addItem(row.dataset.type, row.dataset.label, row.dataset.url);
        });
    });

    document.getElementById('btn-add-custom').addEventListener('click', function() {
        var label = document.getElementById('custom-label').value.trim();
        var url   = document.getElementById('custom-url').value.trim();
        if (!label) {
            window.adminToast('Lỗi', 'Vui lòng nhập nhãn hiển thị.', 'error');
            document.getElementById('custom-label').focus();
            return;
        }
        addItem('custom', label, url || '#');
        document.getElementById('custom-label').value = '';
        document.getElementById('custom-url').value   = '';
    });

    document.getElementById('btn-add-channel').addEventListener('click', function() {
        var label = document.getElementById('channel-label').value.trim();
        var url   = document.getElementById('channel-url').value.trim();
        var icon  = document.getElementById('channel-icon').value.trim();
        var img   = document.getElementById('channel-image').value.trim();
        if (!label) {
            window.adminToast('Lỗi', 'Vui lòng nhập tên channel.', 'error');
            document.getElementById('channel-label').focus();
            return;
        }
        addItem('channel', label, url || '#', icon, img);
        document.getElementById('channel-label').value = '';
        document.getElementById('channel-url').value   = '';
        document.getElementById('channel-icon').value  = '';
        document.getElementById('channel-image').value = '';
        updateImgPreview('channel-image_preview', '');
    });

    /* ── SAVE MENU ── */
    document.getElementById('btn-save-menu').addEventListener('click', function() {
        syncDOM();
        var btn = this;
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang lưu...';

        fetch('{{ locale_route('admin.menus.update', $menu->id) }}', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept':       'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                items:  menuItems,
                locale: '{{ app()->getLocale() }}',
                name:   '{{ addslashes($menu->name) }}',
                area:   '{{ addslashes($menu->area) }}'
            })
        })
        .then(function(r){ return r.json(); })
        .then(function(d){
            if (d.success) window.adminToast('Thành công', 'Menu đã được lưu.', 'success');
            else           window.adminToast('Lỗi', 'Không thể lưu menu.', 'error');
        })
        .catch(function(){ window.adminToast('Lỗi', 'Lỗi kết nối.', 'error'); })
        .finally(function(){
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Lưu Menu';
        });
    });

    /* ── INIT ── */
    renderTree();

})();
</script>
@endpush


