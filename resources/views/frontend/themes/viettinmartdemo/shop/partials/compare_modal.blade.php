{{-- Compare Modal --}}
<div class="compare-modal-wrapper" id="compare-modal-wrapper">
    <div class="compare-modal-overlay" onclick="closeCompareModal()"></div>
    <div class="compare-modal-content">
        <div class="compare-modal-header">
            <h3 class="compare-modal-title">
                <i class="fa-solid fa-arrows-retweet"></i>
                {{ __('compare_title') }} (<span id="compare-count">0</span>)
            </h3>
            <button class="compare-modal-close" onclick="closeCompareModal()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="compare-modal-body" id="compare-modal-body">
            <div class="compare-loading">
                <i class="fa-solid fa-spinner fa-spin"></i>
                <p>{{ __('compare_loading') }}</p>
            </div>
        </div>

        <div class="compare-modal-footer">
            <button class="rts-btn btn-secondary" onclick="closeCompareModal()">
                {{ __('swal_close') }}
            </button>
            <a href="{{ locale_route('shop.index') }}" class="rts-btn btn-primary">
                {{ __('compare_continue_shopping') }}
            </a>
        </div>
    </div>
</div>

<style>
.compare-modal-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.compare-modal-wrapper.active {
    opacity: 1;
    visibility: visible;
}

.compare-modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(4px);
}

.compare-modal-content {
    position: relative;
    background: white;
    border-radius: 16px;
    max-width: 1200px;
    width: 100%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    transform: scale(0.9);
    transition: transform 0.3s ease;
}

.compare-modal-wrapper.active .compare-modal-content {
    transform: scale(1);
}

.compare-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 30px;
    border-bottom: 2px solid #f1f5f9;
    background: #30a4d7;
    border-radius: 16px 16px 0 0;
}

.compare-modal-title {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    color: white;
    display: flex;
    align-items: center;
    gap: 10px;
}

.compare-modal-title i {
    font-size: 24px;
}

.compare-modal-close {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    color: white;
    font-size: 20px;
}

.compare-modal-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
}

.compare-modal-body {
    flex: 1;
    overflow-y: auto;
    padding: 30px;
}

.compare-loading {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    color: #64748b;
}

.compare-loading i {
    font-size: 48px;
    margin-bottom: 15px;
    color: #3b82f6;
}

.compare-loading p {
    font-size: 16px;
    margin: 0;
}

.compare-empty {
    text-align: center;
    padding: 60px 20px;
}

.compare-empty i {
    font-size: 80px;
    color: #e2e8f0;
    margin-bottom: 20px;
}

.compare-empty h4 {
    font-size: 20px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 10px;
}

.compare-empty p {
    font-size: 14px;
    color: #64748b;
    margin: 0;
}

.compare-table-wrapper {
    overflow-x: auto;
}

.compare-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    min-width: 600px;
}

.compare-table thead th {
    background: #f8fafc;
    padding: 20px 15px;
    text-align: center;
    font-weight: 600;
    color: #475569;
    border-bottom: 2px solid #e2e8f0;
    position: sticky;
    top: 0;
    z-index: 10;
}

.compare-table thead th:first-child {
    text-align: left;
    width: 180px;
    min-width: 180px;
}

.compare-table tbody tr {
    border-bottom: 1px solid #f1f5f9;
}

.compare-table tbody tr:last-child {
    border-bottom: none;
}

.compare-table tbody td {
    padding: 20px 15px;
    vertical-align: top;
}

.compare-table tbody td:first-child {
    font-weight: 600;
    color: #1e293b;
    background: #fafbfc;
}

.compare-product-header {
    text-align: center;
}

.compare-product-remove {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    background: #fee2e2;
    color: #dc2626;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-bottom: 15px;
    flex-direction: row;
}

.compare-product-remove:hover {
    background: #fecaca;
    transform: translateY(-2px);
}

.compare-product-image {
    width: 120px;
    height: 120px;
    object-fit: contain;
    margin: 0 auto 15px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 10px;
}

.compare-product-name {
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
    margin: 0;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.compare-product-name:hover {
    color: #3b82f6;
}

.compare-price {
    font-size: 18px;
    font-weight: 700;
    color: #dc2626;
}

.compare-old-price {
    font-size: 14px;
    color: #94a3b8;
    text-decoration: line-through;
    margin-left: 8px;
}

.compare-description {
    font-size: 13px;
    color: #64748b;
    line-height: 1.6;
    max-height: 100px;
    overflow-y: auto;
}

.compare-modal-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 30px;
    border-top: 2px solid #f1f5f9;
    background: #fafbfc;
    border-radius: 0 0 16px 16px;
}

/* Responsive */
@media (max-width: 768px) {
    .compare-modal-wrapper {
        padding: 10px;
    }
    
    .compare-modal-content {
        max-height: 95vh;
    }
    
    .compare-modal-header {
        padding: 15px 20px;
    }
    
    .compare-modal-title {
        font-size: 16px;
    }
    
    .compare-modal-body {
        padding: 20px 15px;
    }
    
    .compare-modal-footer {
        padding: 15px 20px;
        flex-direction: column;
        gap: 10px;
    }
    
    .compare-modal-footer .rts-btn {
        width: 100%;
    }
    
    .compare-table thead th:first-child {
        width: 120px;
        min-width: 120px;
    }
    
    .compare-product-image {
        width: 80px;
        height: 80px;
    }
    
    .compare-product-name {
        font-size: 12px;
    }
}

/* Scrollbar styling */
.compare-modal-body::-webkit-scrollbar,
.compare-description::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}

.compare-modal-body::-webkit-scrollbar-track,
.compare-description::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

.compare-modal-body::-webkit-scrollbar-thumb,
.compare-description::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

.compare-modal-body::-webkit-scrollbar-thumb:hover,
.compare-description::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>



