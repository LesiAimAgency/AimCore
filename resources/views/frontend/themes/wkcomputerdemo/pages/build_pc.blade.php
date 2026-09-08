@extends('layouts.app')

@section('title', 'Xây dựng cấu hình - WKcomputer')

@section('content')

<style>
    /* Hide default layout elements to make this a standalone app-like page */
    .wk-header, .wk-mobile-header, .wk-footer, .wk-bottom-nav { display: none !important; }
    /* Reset body padding if any */
    body { padding-bottom: 0 !important; }
</style>

<div class="wk-builder-page">
    <div class="wk-builder-header">
        <a href="{{ url('/wkcomputer') }}" class="back-btn"><i class="fas fa-arrow-left"></i></a>
        <h1>Xây Dựng Cấu Hình</h1>
        <button class="reset-btn" onclick="resetBuilder()"><i class="fas fa-sync-alt"></i> Làm lại</button>
    </div>

    <div class="wk-builder-layout">
        {{-- Left Column: Components List --}}
        <div class="wk-builder-main">
            <div class="wk-builder-progress">
                <span>Đã chọn: <strong id="builder-count">0</strong>/7 linh kiện</span>
            </div>

            <div class="wk-builder-list" id="builder-list">
                @php
                $components = [
                    ['id' => 'cpu', 'name' => 'CPU - Bộ Vi Xử Lý', 'icon' => 'fas fa-microchip'],
                    ['id' => 'mainboard', 'name' => 'Mainboard - Bo mạch chủ', 'icon' => 'fas fa-chess-board'],
                    ['id' => 'ram', 'name' => 'Ram - Bộ Nhớ Trong', 'icon' => 'fas fa-memory'],
                    ['id' => 'vga', 'name' => 'VGA - Card Màn Hình', 'icon' => 'fas fa-vr-cardboard'],
                    ['id' => 'storage', 'name' => 'Ổ cứng SSD', 'icon' => 'fas fa-hdd'],
                    ['id' => 'psu', 'name' => 'PSU - Nguồn máy tính', 'icon' => 'fas fa-plug'],
                    ['id' => 'case', 'name' => 'Case - Vỏ máy tính', 'icon' => 'fas fa-box'],
                ];
                @endphp
                @foreach($components as $comp)
                <div class="wk-builder-item" data-cat="{{ $comp['id'] }}">
                    <div class="wk-builder-item-name">{{ $comp['name'] }}</div>
                    
                    <div class="wk-builder-item-row">
                        <div class="wk-builder-item-icon">
                            <i class="{{ $comp['icon'] }}"></i>
                        </div>
                        
                        <div class="wk-builder-item-info">
                            <div class="wk-builder-item-selected" style="display:none;">
                                <img src="" alt="" class="selected-img">
                                <div class="selected-details">
                                    <div class="selected-name"></div>
                                    <div class="selected-price"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="wk-builder-item-action">
                            <button type="button" class="wk-btn-select" onclick="openProductSelector('{{ $comp['id'] }}', '{{ $comp['name'] }}')">
                                + Lựa chọn
                            </button>
                            <button type="button" class="wk-btn-edit" style="display:none;" onclick="openProductSelector('{{ $comp['id'] }}', '{{ $comp['name'] }}')">
                                Thay đổi
                            </button>
                            <button type="button" class="wk-btn-remove" style="display:none;" onclick="removeProduct('{{ $comp['id'] }}')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Right Column: Sticky Summary Sidebar --}}
        <aside class="wk-builder-sidebar">
            <div class="wk-builder-sidebar-card">
                <div class="wk-builder-sidebar-total">
                    <span>Tổng:</span>
                    <strong id="builder-total-price">0VND</strong>
                </div>
                <div class="wk-builder-sidebar-actions">
                    <button class="wk-btn-checkout" onclick="addToCartAll()">
                        Thêm vào giỏ hàng
                    </button>
                    <button class="wk-btn-sidebar-secondary" onclick="window.print()">
                        In cấu hình
                    </button>
                    <button class="wk-btn-sidebar-secondary" onclick="window.print()">
                        Tải về bản PDF
                    </button>
                </div>
            </div>
        </aside>
    </div>
</div>

{{-- Product Selector Modal (Bottom Sheet) --}}
<div class="wk-bottom-sheet" id="sheet-product-selector" style="z-index: 2005;">
    <div class="wk-bottom-sheet-header">
        <span id="selector-title">Chọn linh kiện</span>
        <button type="button" class="wk-bottom-sheet-close" onclick="closeProductSelector()"><i class="fas fa-times"></i></button>
    </div>
    <div class="wk-bottom-sheet-search" style="padding:12px 16px;border-bottom:1px solid #f1f5f9;background:#fff;flex-shrink:0;">
        <div style="position:relative;">
            <i class="fas fa-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;"></i>
            <input type="text" id="selector-search" placeholder="Tìm kiếm sản phẩm..." style="width:100%;padding:10px 10px 10px 36px;border:1px solid #e2e8f0;border-radius:8px;font-size:14px;background:#f8fafc;outline:none;">
        </div>
    </div>
    <div class="wk-bottom-sheet-content" id="selector-content" style="background:#f1f5f9;padding:12px;flex:1;overflow-y:auto;">
        <!-- Content loaded via AJAX -->
    </div>
</div>

@endsection

@push('scripts')
<script>
    let buildState = {};
    let currentSelectCat = null;
    let productsCache = {};

    function resetBuilder() {
        if(confirm('Bạn có chắc muốn làm lại từ đầu?')) {
            buildState = {};
            document.querySelectorAll('.wk-builder-item').forEach(el => {
                el.classList.remove('has-product');
                el.querySelector('.wk-builder-item-selected').style.display = 'none';
                el.querySelector('.wk-btn-select').style.display = 'inline-block';
                el.querySelector('.wk-btn-edit').style.display = 'none';
                el.querySelector('.wk-btn-remove').style.display = 'none';
            });
            updateSummary();
        }
    }

    function openProductSelector(catId, catName) {
        currentSelectCat = catId;
        document.getElementById('selector-title').innerText = 'Chọn ' + catName;
        const sheet = document.getElementById('sheet-product-selector');
        sheet.classList.add('open');
        document.body.style.overflow = 'hidden';

        loadProducts(catId);
    }

    function closeProductSelector() {
        document.getElementById('sheet-product-selector').classList.remove('open');
        document.body.style.overflow = '';
    }

    function loadProducts(catId) {
        const container = document.getElementById('selector-content');
        container.innerHTML = '<div style="text-align:center;padding:40px;color:#94a3b8;"><i class="fas fa-spinner fa-spin fa-2x"></i></div>';
        
        if (productsCache[catId]) {
            renderProducts(productsCache[catId]);
            return;
        }

        fetch(`{{ route('build_pc.api_products') }}?cat=${catId}`)
            .then(r => r.json())
            .then(res => {
                if(res.success) {
                    productsCache[catId] = res.data;
                    renderProducts(res.data);
                }
            });
    }

    function renderProducts(products) {
        const container = document.getElementById('selector-content');
        if(!products || products.length === 0) {
            container.innerHTML = '<div style="text-align:center;padding:40px;color:#94a3b8;">Không có sản phẩm nào.</div>';
            return;
        }

        let html = '';
        products.forEach(p => {
            html += `
                <div class="wk-product-card-modal">
                    <img src="${p.img}" alt="${p.name}">
                    <div class="wk-product-card-modal-info">
                        <div class="wk-product-card-modal-title">${p.name}</div>
                        <div class="wk-product-card-modal-price">${new Intl.NumberFormat('vi-VN').format(p.price)}₫</div>
                        <button class="wk-btn-select" onclick="selectProduct(${p.id}, '${p.name.replace(/'/g, "\\'")}', ${p.price}, '${p.img}')" style="width:100%;margin-top:8px;">
                            Thêm vào cấu hình
                        </button>
                    </div>
                </div>
            `;
        });
        container.innerHTML = html;
    }

    function selectProduct(id, name, price, img) {
        buildState[currentSelectCat] = { id, name, price, img };
        
        const row = document.querySelector(`.wk-builder-item[data-cat="${currentSelectCat}"]`);
        row.classList.add('has-product');
        
        row.querySelector('.selected-img').src = img;
        row.querySelector('.selected-name').innerText = name;
        row.querySelector('.selected-price').innerText = new Intl.NumberFormat('vi-VN').format(price) + '₫';
        
        row.querySelector('.wk-builder-item-selected').style.display = 'flex';
        row.querySelector('.wk-btn-select').style.display = 'none';
        row.querySelector('.wk-btn-edit').style.display = 'inline-block';
        row.querySelector('.wk-btn-remove').style.display = 'inline-block';

        updateSummary();
        closeProductSelector();
    }

    function removeProduct(catId) {
        delete buildState[catId];
        const row = document.querySelector(`.wk-builder-item[data-cat="${catId}"]`);
        row.classList.remove('has-product');
        row.querySelector('.wk-builder-item-selected').style.display = 'none';
        row.querySelector('.wk-btn-select').style.display = 'inline-block';
        row.querySelector('.wk-btn-edit').style.display = 'none';
        row.querySelector('.wk-btn-remove').style.display = 'none';
        updateSummary();
    }

    function updateSummary() {
        let count = Object.keys(buildState).length;
        let total = Object.values(buildState).reduce((sum, item) => sum + item.price, 0);

        document.getElementById('builder-count').innerText = count;
        document.getElementById('builder-total-price').innerText = new Intl.NumberFormat('vi-VN').format(total) + '₫';
    }

    function addToCartAll() {
        const items = Object.values(buildState).map(i => ({ id: i.id, qty: 1 }));
        if (items.length === 0) {
            alert('Vui lòng chọn ít nhất 1 linh kiện!');
            return;
        }

        const btn = document.querySelector('.wk-btn-checkout');
        const oldText = btn ? btn.innerText : '';
        if (btn) {
            btn.innerText = 'Đang thêm vào giỏ...';
            btn.disabled = true;
        }

        fetch('{{ route("cart.addMultiple") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ items: items })
        })
        .then(r => r.json())
        .then(res => {
            if (res.success) {
                window.location.href = res.redirect || '{{ route("cart.page") }}';
            } else {
                alert(res.message || 'Có lỗi xảy ra khi thêm vào giỏ hàng.');
                if (btn) {
                    btn.innerText = oldText;
                    btn.disabled = false;
                }
            }
        })
        .catch(() => {
            alert('Có lỗi xảy ra khi thêm vào giỏ hàng. Vui lòng thử lại.');
            if (btn) {
                btn.innerText = oldText;
                btn.disabled = false;
            }
        });
    }
</script>
@endpush
