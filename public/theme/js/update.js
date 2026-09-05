/* 
   =========================================
   EXCLUSIVE QUICK VIEW (QV) LOGIC 
   =========================================
*/

// Avoid redeclaration conflicts
if (typeof window.qvAction === 'undefined') {
    window.qvAction = {
        init: function () {
            this.bindEvents();
        },

    bindEvents: function () {
        // Delegate Thumbnail Switching (Improved Single Image Engine)
        $(document).on('click', '.qv-thumb-item', function () {
            const imgUrl = $(this).data('img');
            const mainImg = $('#qv-main-img');
            const mainZoom = $('#qv-main-zoom');

            $(this).addClass('active').siblings().removeClass('active');

            // Subtle transition effect
            mainImg.fadeOut(100, function () {
                $(this).attr('src', imgUrl).fadeIn(200);
                mainZoom.css('background-image', 'url(' + imgUrl + ')');
            });
        });

        // Close Modal Event (Improved for qv-modal-wrapper)
        $(document).on('click', '.qv-close-btn, .product-details-close-btn', function (e) {
            $('#quick-view-modal-container').find('.product-details-popup-wrapper').removeClass('popup');
            const overlay = $('#anywhere-home');
            overlay.removeClass('bgshow').css({
                'display': 'none',
                'opacity': '0',
                'visibility': 'hidden',
                'pointer-events': 'none'
            });
            setTimeout(function() {
                $('#quick-view-modal-container').empty().hide();
            }, 300);
            $('body').css('overflow', '');
        });

        // Close on anywhere-home overlay click
        $(document).on('click', '#anywhere-home', function() {
            $('#quick-view-modal-container').find('.product-details-popup-wrapper').removeClass('popup');
            const overlay = $('#anywhere-home');
            overlay.removeClass('bgshow').css({
                'display': 'none',
                'opacity': '0',
                'visibility': 'hidden',
                'pointer-events': 'none'
            });
            setTimeout(function() {
                $('#quick-view-modal-container').empty().hide();
            }, 300);
            $('body').css('overflow', '');
        });

        // Prevent closing when clicking inside content
        $(document).on('click', '.qv-modal-content', function (e) {
            e.stopPropagation();
        });

        // Quantity Controls (Supports Modal and Card)
        $(document).on('click', '.qv-qty-btn', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const container = $(this).closest('.quantity-edit, .qv-quantity-control');
            const input = container.find('.qv-qty-input');
            let val = parseInt(input.val());

            if ($(this).hasClass('qv-plus')) {
                val++;
            } else if (val > 1) {
                val--;
            }
            input.val(val < 10 ? '0' + val : val);
        });
    },

    zoom: function (event) {
        const zoomer = event.currentTarget;
        let offsetX, offsetY;

        // Safe offset calculation for mouse and touch
        if (event.offsetX !== undefined && event.offsetY !== undefined) {
            offsetX = event.offsetX;
            offsetY = event.offsetY;
        } else if (event.touches && event.touches[0]) {
            // Touch support fallback
            const rect = zoomer.getBoundingClientRect();
            offsetX = event.touches[0].clientX - rect.left;
            offsetY = event.touches[0].clientY - rect.top;
        } else {
            return; // Not a valid event for zooming
        }

        const x = offsetX / zoomer.offsetWidth * 100;
        const y = offsetY / zoomer.offsetHeight * 100;
        zoomer.style.backgroundPosition = x + '% ' + y + '%';
    }
    };
}

// Main Global Action Handler
if (typeof window.cwAction === 'undefined') {
    window.cwAction = {
    // QUICK VIEW TRIGGER (FIXED)
    quickView: function (productId) {
        console.log('[QV] quickView called with id:', productId);
        const modalContainer = $('#quick-view-modal-container');

        // Show loading if you want, but AJAX is fast
        $.ajax({
            url: window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/quick-view/' + productId : '/quick-view/' + productId,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log('[QV] response:', response);
                if (response && response.html) {
                    modalContainer.html(response.html).show();
                    const wrapper = modalContainer.find('.product-details-popup-wrapper');
                    wrapper.css({
                        'position': 'fixed',
                        'top': '0',
                        'left': '0',
                        'width': '100vw',
                        'height': '100vh',
                        'z-index': '9999',
                        'display': 'flex',
                        'align-items': 'center',
                        'justify-content': 'center',
                        'visibility': 'visible',
                        'opacity': '1',
                        'background': 'rgba(0,0,0,0.7)',
                        'transform': 'none'
                    });
                    
                    // Show overlay properly
                    const overlay = $('#anywhere-home');
                    overlay.addClass('bgshow').css({
                        'display': 'block',
                        'opacity': '0.7',
                        'visibility': 'visible',
                        'pointer-events': 'auto'
                    });
                    
                    $('body').css('overflow', 'hidden');
                    console.log('[QV] modal injected, wrapper:', modalContainer.find('.product-details-popup-wrapper').length);
                    console.log('[QV] container in DOM:', document.getElementById('quick-view-modal-container') !== null);
                    console.log('[QV] container display:', $('#quick-view-modal-container').css('display'));
                    console.log('[QV] container visibility:', $('#quick-view-modal-container').css('visibility'));
                    console.log('[QV] wrapper parent:', modalContainer.find('.product-details-popup-wrapper').parent().attr('id'));
                    setTimeout(function() {
                        console.log('[QV] delayed rect:', modalContainer.find('.product-details-popup-wrapper')[0] && modalContainer.find('.product-details-popup-wrapper')[0].getBoundingClientRect());
                    }, 100);
                    console.log('[QV] wrapper visibility:', modalContainer.find('.product-details-popup-wrapper').css('visibility'));
                    console.log('[QV] wrapper opacity:', modalContainer.find('.product-details-popup-wrapper').css('opacity'));
                    console.log('[QV] wrapper z-index:', modalContainer.find('.product-details-popup-wrapper').css('z-index'));
                    console.log('[QV] wrapper rect:', modalContainer.find('.product-details-popup-wrapper')[0].getBoundingClientRect());
                } else {
                    Swal.fire('Lỗi!', 'Dữ liệu sản phẩm trống.', 'error');
                }
            },
            error: function (xhr) {
                console.error("QuickView Error:", xhr.status, xhr.responseText);
                Swal.fire('Lỗi!', 'Không thể tải thông tin sản phẩm.', 'error');
            }
        });
    },

    addWishlist: function (id, btn) {
        const $btn = $(btn);
        
        // Kiểm tra nếu đã có trong wishlist (đã active)
        const icon = $btn.find('i');
        if (icon.hasClass('fa-solid')) {
            Swal.fire({
                title: 'Thông báo',
                text: 'Sản phẩm đã có trong danh sách yêu thích',
                icon: 'info',
                timer: 1500,
                showConfirmButton: false
            });
            return;
        }
        
        $.ajax({
            url: window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/wishlist/add' : '/wishlist/add',
            method: 'POST',
            data: {
                product_id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Update UI count
                $('.wishlist .number').text(response.count);

                // Update TẤT CẢ các nút wishlist của cùng product_id trên toàn trang
                $('[onclick*="addWishlist(' + id + ',"]').each(function() {
                    const $thisBtn = $(this);
                    const $thisIcon = $thisBtn.find('i');
                    $thisIcon.removeClass('fa-light').addClass('fa-solid').css('color', '#fff');
                    $thisBtn.css('background', '#629d23');
                    $thisBtn.addClass('wishlist-active');
                });
                
                // Update cho Alpine.js click handlers
                $('[x-data]').find('.single-action').each(function() {
                    const clickAttr = $(this).attr('@click');
                    if (clickAttr && clickAttr.includes('addWishlist(' + id + ',')) {
                        const $thisIcon = $(this).find('i');
                        $thisIcon.removeClass('fa-light').addClass('fa-solid').css('color', '#fff');
                        $(this).css('background', '#629d23');
                        $(this).addClass('wishlist-active');
                    }
                });
                
                Swal.fire({
                    title: 'Thành công!',
                    text: response.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            },
            error: function () {
                Swal.fire('Lỗi!', 'Không thể thêm vào danh sách yêu thích.', 'error');
            }
        });
    },

    removeWishlist: function (id, callback) {
        $.ajax({
            url: window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/wishlist/remove' : '/wishlist/remove',
            method: 'POST',
            data: {
                product_id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Update UI count
                $('.wishlist .number').text(response.count);

                // Reset TẤT CẢ các nút wishlist của cùng product_id về trạng thái ban đầu
                $('[onclick*="addWishlist(' + id + ',"]').each(function() {
                    const $thisBtn = $(this);
                    const $thisIcon = $thisBtn.find('i');
                    $thisIcon.removeClass('fa-solid').addClass('fa-light').css('color', '');
                    $thisBtn.css('background', '');
                    $thisBtn.removeClass('wishlist-active');
                });
                
                // Reset cho Alpine.js click handlers
                $('[x-data]').find('.single-action').each(function() {
                    const clickAttr = $(this).attr('@click');
                    if (clickAttr && clickAttr.includes('addWishlist(' + id + ',')) {
                        const $thisIcon = $(this).find('i');
                        $thisIcon.removeClass('fa-solid').addClass('fa-light').css('color', '');
                        $(this).css('background', '');
                        $(this).removeClass('wishlist-active');
                    }
                });
                
                if (callback && typeof callback === 'function') {
                    callback(response);
                }
            },
            error: function () {
                Swal.fire('Lỗi!', 'Không thể xóa khỏi danh sách yêu thích.', 'error');
            }
        });
    },

    addCompare: function (id, btn) {
        const $btn = $(btn);
        const i18n = (window.VTM_I18N && window.VTM_I18N.compare) ? window.VTM_I18N.compare : {};
        const t = (key, fallback) => i18n[key] || fallback;

        $.ajax({
            url: window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/compare/add' : '/compare/add',
            method: 'POST',
            data: {
                product_id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Update UI count
                $('.compare .number').text(response.count);

                const icon = $btn.find('i');
                icon.removeClass('fa-light').addClass('fa-solid').css('color', '#fff');
                $btn.css('background', '#629d23');

                if (response.count >= 2) {
                    Swal.fire({
                        title: t('openingModal', 'Opening compare...'),
                        text: response.message,
                        icon: 'success',
                        timer: 1000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    }).then(() => {
                        cwAction.openCompareModal();
                    });
                } else {
                    Swal.fire({
                        title: t('addSuccess', 'Added to compare!'),
                        text: response.message,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                }
            },
            error: function () {
                Swal.fire({ icon: 'error', text: t('errorText', 'Unable to add to compare list.') });
            }
        });
    },

    openCompareModal: function () {
        // Load modal HTML if not exists
        const modalContainer = $('#compare-modal-container');
        
        if (modalContainer.children().length === 0) {
            // Create modal inline
            const modalHTML = `@include('shop.partials.compare_modal')`;
            modalContainer.html(modalHTML);
        }
        
        // Show modal
        modalContainer.show();
        setTimeout(() => {
            $('#compare-modal-wrapper').addClass('active');
        }, 10);
        
        // Load data
        cwAction.loadCompareData();
        
        // Prevent body scroll
        $('body').css('overflow', 'hidden');
    },

    loadCompareData: function () {
        const modalBody = $('#compare-modal-body');
        const i18n = (window.VTM_I18N && window.VTM_I18N.compare) ? window.VTM_I18N.compare : {};
        const t = (key, fallback) => i18n[key] || fallback;

        // Show loading
        modalBody.html(`
            <div class="compare-loading">
                <i class="fa-solid fa-spinner fa-spin"></i>
                <p>${t('loading', 'Loading...')}</p>
            </div>
        `);

        // Fetch compare data
        const base = window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl : '';
        $.get(base + '/compare/data', function(response) {
            if (response.status === 'empty' || response.products.length === 0) {
                modalBody.html(`
                    <div class="compare-empty">
                        <i class="fa-solid fa-arrows-retweet"></i>
                        <h4>${t('emptyList', 'Compare list is empty')}</h4>
                        <p>${t('emptyListDesc', 'Add at least 2 products to compare')}</p>
                    </div>
                `);
                $('#compare-count').text('0');
                return;
            }

            // Update count
            $('#compare-count').text(response.count);

            // Build table
            let tableHTML = '<div class="compare-table-wrapper"><table class="compare-table">';

            // Header row
            tableHTML += `<thead><tr><th>${t('colSpec', 'Specification')}</th>`;
            response.products.forEach(product => {
                tableHTML += `
                    <th>
                        <div class="compare-product-header">
                            <button class="compare-product-remove" onclick="cwAction.removeFromCompareModal(${product.id})">
                                <i class="fa-solid fa-xmark"></i> ${t('removeBtn', 'Remove')}
                            </button>
                            <a href="${product.url}">
                                <img src="${product.thumbnail_url}" alt="${product.name}" class="compare-product-image">
                                <h4 class="compare-product-name">${product.name}</h4>
                            </a>
                        </div>
                    </th>
                `;
            });
            tableHTML += '</tr></thead><tbody>';

            // Price row
            tableHTML += `<tr><td>${t('colPrice', 'Price')}</td>`;
            response.products.forEach(product => {
                tableHTML += `<td class="text-center">
                    <span class="compare-price">${product.formatted_price}</span>
                    ${product.has_discount ? `<span class="compare-old-price">${product.old_price.toLocaleString('vi-VN')}đ</span>` : ''}
                </td>`;
            });
            tableHTML += '</tr>';

            // Category row
            tableHTML += `<tr><td>${t('colCategory', 'Category')}</td>`;
            response.products.forEach(product => {
                tableHTML += `<td class="text-center">${product.category}</td>`;
            });
            tableHTML += '</tr>';

            // SKU row
            tableHTML += `<tr><td>${t('colSku', 'SKU')}</td>`;
            response.products.forEach(product => {
                tableHTML += `<td class="text-center">${product.sku}</td>`;
            });
            tableHTML += '</tr>';

            // Unit row
            tableHTML += `<tr><td>${t('colUnit', 'Unit')}</td>`;
            response.products.forEach(product => {
                tableHTML += `<td class="text-center">${product.unit}</td>`;
            });
            tableHTML += '</tr>';

            // Stock row
            tableHTML += `<tr><td>${t('colStock', 'Stock Status')}</td>`;
            response.products.forEach(product => {
                const stockStatus = product.stock > 0
                    ? `<span style="color: #16a34a; font-weight: 600;">${t('inStock', 'In Stock')}</span>`
                    : `<span style="color: #dc2626; font-weight: 600;">${t('outOfStock', 'Out of Stock')}</span>`;
                tableHTML += `<td class="text-center">${stockStatus}</td>`;
            });
            tableHTML += '</tr>';

            // Description row
            tableHTML += `<tr><td>${t('colDescription', 'Description')}</td>`;
            response.products.forEach(product => {
                tableHTML += `<td><div class="compare-description">${product.short_description}</div></td>`;
            });
            tableHTML += '</tr>';

            // Action row
            tableHTML += `<tr><td>${t('colAction', 'Action')}</td>`;
            response.products.forEach(product => {
                if (product.has_contact_price) {
                    tableHTML += `<td class="text-center">
                        <a href="tel:${window.VTM_CONFIG?.phone || ''}" class="rts-btn btn-primary btn-sm">
                            <i class="fa-solid fa-phone"></i> ${t('contactBtn', 'Contact')}
                        </a>
                    </td>`;
                } else {
                    tableHTML += `<td class="text-center">
                        <button onclick="cart.add(${product.id}, this)" class="rts-btn btn-primary btn-sm">
                            <i class="fa-solid fa-cart-shopping"></i> ${t('addToCartBtn', 'Add to Cart')}
                        </button>
                    </td>`;
                }
            });
            tableHTML += '</tr>';

            tableHTML += '</tbody></table></div>';

            modalBody.html(tableHTML);
        }).fail(function() {
            modalBody.html(`
                <div class="compare-empty">
                    <i class="fa-solid fa-exclamation-triangle" style="color: #f59e0b;"></i>
                    <h4>${t('errorLoad', 'Unable to load data')}</h4>
                    <p>${t('errorLoadDesc', 'Please try again later')}</p>
                </div>
            `);
        });
    },

    removeFromCompareModal: function(productId) {
        const i18n = (window.VTM_I18N && window.VTM_I18N.compare) ? window.VTM_I18N.compare : {};
        const t = (key, fallback) => i18n[key] || fallback;

        Swal.fire({
            title: t('confirmTitle', 'Confirm Remove'),
            text: t('confirmText', 'Are you sure you want to remove this product?'),
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: t('removeBtn', 'Remove'),
            cancelButtonText: t('cancel', 'Cancel'),
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#64748b'
        }).then((result) => {
            if (result.isConfirmed) {
                const base = window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl : '';
                $.ajax({
                    url: base + '/compare/remove',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Update count in header
                        $('.compare .number').text(response.count);

                        // Reload compare data
                        cwAction.loadCompareData();

                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire({ icon: 'error', text: t('errorRetry', 'An error occurred. Please try again.') });
                    }
                });
            }
        });
    }
    };
}

// Global Cart Handler
if (typeof window.cart === 'undefined') {
    window.cart = {
    add: function (productId, buttonElement = null, quantity = null) {
        let $btn;
        
        // Handle button element parameter
        if (buttonElement && typeof buttonElement === 'object' && buttonElement.tagName) {
            $btn = $(buttonElement);
        } else {
            // Fallback to body if no valid button element
            $btn = $('body');
        }

        const originalHtml = $btn.html();

        // Auto-detect quantity from nearby input if not explicitly provided
        if (quantity === null || quantity === undefined) {
            const container = $btn.closest('.cart-counter-action, .quantity-edit, .qv-cta-group, .product-card, .qv-quantity-control, .contents');
            const qtyInput = container.find('.qv-qty-input, .input');
            quantity = qtyInput.length ? parseInt(qtyInput.val()) : 1;
        }

        $btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i>');

        const requestData = {
            product_id: productId,
            qty: quantity,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        return $.ajax({
            url: window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/gio-hang/them' : '/gio-hang/them',
            method: 'POST',
            data: requestData,
            success: function (response) {
                // Update cart counts in UI
                $('.cart .number, .shopping-cart-number').each(function () {
                    $(this).text(response.count);
                });

                // Show success message
                Swal.fire({
                    title: 'Thành công!',
                    text: 'Sản phẩm đã được thêm vào giỏ hàng',
                    icon: 'success',
                    timer: 2500,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timerProgressBar: true,
                    background: '#fff',
                    color: '#333',
                    iconColor: '#28a745',
                    customClass: {
                        container: 'swal-no-nice-select'
                    },
                    didOpen: () => {
                        // Remove nice-select elements from SweetAlert
                        document.querySelectorAll('.swal2-container .nice-select').forEach(el => el.remove());
                    }
                });

                cart.updateDropdown();
            },
            error: function(xhr, status, error) {
                let errorMessage = 'Có lỗi xảy ra khi thêm vào giỏ hàng';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                Swal.fire({
                    title: 'Lỗi!',
                    text: errorMessage,
                    icon: 'error',
                    timer: 4000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timerProgressBar: true,
                    background: '#fff',
                    color: '#333',
                    iconColor: '#dc3545'
                });
            },
            complete: function () {
                $btn.prop('disabled', false).html(originalHtml);
            }
        });
    },

    remove: function (rowId) {
        $.ajax({
            url: window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/gio-hang/xoa' : '/gio-hang/xoa',
            method: 'POST',
            data: {
                rowId: rowId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                cart.updateDropdown();
                // Update header counts
                $.get(window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/gio-hang/so-luong' : '/gio-hang/so-luong', function (data) {
                    $('.cart .number').text(data.count);
                });
            }
        });
    },

    updateDropdown: function () {
        const dropdownContainer = $('.cart-dropdown-container');
        if (dropdownContainer.length) {
            $.get(window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl + '/gio-hang/dropdown' : '/gio-hang/dropdown', function (html) {
                dropdownContainer.html(html);
            });
        }
    }
    };
}

// Initialize on Load
$(document).ready(function () {
    if (typeof window.qvAction !== 'undefined') {
        window.qvAction.init();
    }

    // Initialize Bootstrap tabs for mobile menu
    if (typeof bootstrap !== 'undefined' && bootstrap.Tab) {
        // Ensure tab functionality works
        const tabTriggerList = [].slice.call(document.querySelectorAll('#side-bar [data-bs-toggle="tab"]'));
        tabTriggerList.map(function (tabTriggerEl) {
            return new bootstrap.Tab(tabTriggerEl);
        });
    }

    // Manual tab switching for mobile menu (fallback)
    $(document).on('click', '#nav-home-tab', function(e) {
        e.preventDefault();
        console.log('Home tab clicked');
        
        // Update tab buttons
        $('#nav-home-tab').addClass('active').attr('aria-selected', 'true');
        $('#nav-profile-tab').removeClass('active').attr('aria-selected', 'false');
        
        // Update tab content
        $('#nav-home').addClass('show active').removeClass('fade');
        $('#nav-profile').removeClass('show active').addClass('fade');
        
        // Force display
        setTimeout(() => {
            $('#nav-home').css('display', 'block');
            $('#nav-profile').css('display', 'none');
        }, 50);
    });

    $(document).on('click', '#nav-profile-tab', function(e) {
        e.preventDefault();
        console.log('Category tab clicked');
        
        // Update tab buttons
        $('#nav-profile-tab').addClass('active').attr('aria-selected', 'true');
        $('#nav-home-tab').removeClass('active').attr('aria-selected', 'false');
        
        // Update tab content
        $('#nav-profile').addClass('show active').removeClass('fade');
        $('#nav-home').removeClass('show active').addClass('fade');
        
        // Force display
        setTimeout(() => {
            $('#nav-profile').css('display', 'block');
            $('#nav-home').css('display', 'none');
        }, 50);
        
        // Debug: Log category items
        const categoryItems = $('#nav-profile .menu-item');
        console.log('Category items found:', categoryItems.length);
        categoryItems.each(function(i, item) {
            console.log('Category ' + i + ':', $(item).find('span').text());
        });
    });

    // Delegate Add to Cart clicks (Modern approach)
    $(document).on('click', '.add-to-cart', function (e) {
        e.preventDefault();
        const id = $(this).data('product-id');
        cart.add(id, this);
    });

    // Mobile Menu Toggle
    // Mobile Menu Activation
    $(document).on('click', '.menu-btn', function(e) {
        e.preventDefault();
        console.log('Mobile menu clicked');
        $('#side-bar').addClass('show');
        const overlay = $('#anywhere-home');
        overlay.addClass('bgshow').css({
            'display': 'block',
            'opacity': '0.7',
            'visibility': 'visible',
            'pointer-events': 'auto'
        });
    });

    $(document).on('click', '.close-icon-menu, #anywhere-home', function(e) {
        e.preventDefault();
        $('#side-bar').removeClass('show');
        const overlay = $('#anywhere-home');
        overlay.removeClass('bgshow').css({
            'display': 'none',
            'opacity': '0',
            'visibility': 'hidden',
            'pointer-events': 'none'
        });
    });

    // Language/Currency Dropdown on Mobile
    $(document).on('click', '.language-hover > a', function(e) {
        if ($(window).width() < 992) {
            e.preventDefault();
            $(this).next('.category-sub-menu').slideToggle();
        }
    });

    $.get('/gio-hang/so-luong', function (data) {
        $('.cart .number').text(data.count);
    });
    
    // Load wishlist state và update UI cho các sản phẩm đã có trong wishlist
    $.get('/wishlist/ids', function (data) {
        if (data.ids && data.ids.length > 0) {
            data.ids.forEach(function(productId) {
                // Update tất cả nút wishlist của product này
                $('[onclick*="addWishlist(' + productId + ',"]').each(function() {
                    const $thisBtn = $(this);
                    const $thisIcon = $thisBtn.find('i');
                    $thisIcon.removeClass('fa-light').addClass('fa-solid').css('color', '#fff');
                    $thisBtn.css('background', '#629d23');
                    $thisBtn.addClass('wishlist-active');
                });
                
                // Update cho Alpine.js click handlers
                $('[x-data]').find('.single-action').each(function() {
                    const clickAttr = $(this).attr('@click');
                    if (clickAttr && clickAttr.includes('addWishlist(' + productId + ',')) {
                        const $thisIcon = $(this).find('i');
                        $thisIcon.removeClass('fa-light').addClass('fa-solid').css('color', '#fff');
                        $(this).css('background', '#629d23');
                        $(this).addClass('wishlist-active');
                    }
                });
            });
        }
    });
});

// Windows Global Helpers (Legacy & Shortcut)
window.zoom = function (e) { qvAction.zoom(e); }
window.quickView = function (id) { cwAction.quickView(id); }
window.addWishlist = function (id, btn) { cwAction.addWishlist(id, btn); }
window.removeWishlist = function (id, callback) { cwAction.removeWishlist(id, callback); }
window.addCompare = function (id, btn) { cwAction.addCompare(id, btn); }
window.openCompareModal = function () { cwAction.openCompareModal(); }
window.closeCompareModal = function () {
    $('#compare-modal-wrapper').removeClass('active');
    setTimeout(() => {
        $('#compare-modal-container').hide();
    }, 300);
    $('body').css('overflow', '');
};

// Header Search Suggest - Enhanced with multilingual support
$(document).ready(function () {
    // Function to initialize search suggest for any input/dropdown pair
    function initSearchSuggest(inputId, dropdownId) {
        const searchInput = document.getElementById(inputId);
        const resultsDropdown = document.getElementById(dropdownId);
        
        if (!searchInput || !resultsDropdown) return;

        let timeout = null;

        searchInput.addEventListener('input', function () {
            clearTimeout(timeout);
            const query = this.value.trim();
            if (query.length < 2) { 
                resultsDropdown.style.display = 'none'; 
                return; 
            }

            // Show loading state
            resultsDropdown.innerHTML = '<div class="search-loading" style="padding:15px;text-align:center;color:#666;"><i class="fa-solid fa-spinner fa-spin"></i> Đang tìm kiếm...</div>';
            resultsDropdown.style.display = 'block';

            timeout = setTimeout(() => {
                const base = window.VTM_CONFIG ? window.VTM_CONFIG.baseUrl : '';
                const currentLocale = document.documentElement.lang || 'vi';
                
                fetch(base + '/search-suggest?q=' + encodeURIComponent(query))
                    .then(r => r.json())
                    .then(data => {
                        if (!data.length) { 
                            resultsDropdown.innerHTML = '<div class="search-empty" style="padding:15px;text-align:center;color:#999;">Không tìm thấy sản phẩm nào</div>';
                            return; 
                        }
                        
                        resultsDropdown.innerHTML = data.map(p => `
                            <a href="${p.url}" style="display:flex;align-items:center;padding:12px 15px;border-bottom:1px solid #f5f5f5;text-decoration:none;transition:all 0.2s ease;" 
                               onmouseover="this.style.background='#f8fafc';this.style.transform='translateX(2px)'" 
                               onmouseout="this.style.background='';this.style.transform='translateX(0)'">
                                <div style="flex:1;">
                                    ${p.category ? `<span style="display:block;font-size:11px;color:#999;text-transform:uppercase;margin-bottom:2px;">${p.category}</span>` : ''}
                                    <span style="display:block;font-size:14px;font-weight:600;color:#333;margin-bottom:4px;">${p.name}</span>
                                    <div style="display:flex;align-items:center;gap:8px;">
                                        <span style="font-size:14px;font-weight:700;color:var(--color-primary);">${p.formatted_price}</span>
                                        ${p.has_discount ? `<span style="font-size:12px;color:#999;text-decoration:line-through;">${p.formatted_old_price}</span>` : ''}
                                        ${p.has_discount ? `<span style="font-size:11px;background:#e74c3c;color:#fff;padding:2px 6px;border-radius:3px;">-${p.discount_percent}%</span>` : ''}
                                    </div>
                                </div>
                                <img src="${p.thumbnail_url}" 
                                     style="width:50px;height:50px;object-fit:contain;margin-left:15px;border:1px solid #eee;border-radius:4px;transition:all 0.2s ease;" 
                                     alt="${p.name}"
                                     onmouseover="this.style.borderColor='#2563eb';this.style.transform='scale(1.05)'"
                                     onmouseout="this.style.borderColor='#eee';this.style.transform='scale(1)'">
                            </a>
                        `).join('');
                        resultsDropdown.style.display = 'block';
                    })
                    .catch(err => {
                        console.error('Search suggest error:', err);
                        resultsDropdown.innerHTML = '<div class="search-error" style="padding:15px;text-align:center;color:#e74c3c;">Có lỗi xảy ra khi tìm kiếm</div>';
                    });
            }, 300);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!searchInput.contains(e.target) && !resultsDropdown.contains(e.target)) {
                resultsDropdown.style.display = 'none';
            }
        });

        // Show dropdown on focus if there are results
        searchInput.addEventListener('focus', function () {
            if (this.value.trim().length >= 2 && resultsDropdown.children.length > 0) {
                resultsDropdown.style.display = 'block';
            }
        });

        // Hide dropdown on blur (with delay to allow clicking on results)
        searchInput.addEventListener('blur', function () {
            setTimeout(() => {
                resultsDropdown.style.display = 'none';
            }, 200);
        });

        // Handle keyboard navigation
        let selectedIndex = -1;
        searchInput.addEventListener('keydown', function(e) {
            const items = resultsDropdown.querySelectorAll('a');
            
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                selectedIndex = Math.min(selectedIndex + 1, items.length - 1);
                updateSelection(items);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                selectedIndex = Math.max(selectedIndex - 1, -1);
                updateSelection(items);
            } else if (e.key === 'Enter' && selectedIndex >= 0) {
                e.preventDefault();
                items[selectedIndex].click();
            } else if (e.key === 'Escape') {
                resultsDropdown.style.display = 'none';
                selectedIndex = -1;
            }
        });

        function updateSelection(items) {
            items.forEach((item, index) => {
                if (index === selectedIndex) {
                    item.style.background = '#f0f9ff';
                    item.style.borderLeft = '3px solid var(--color-primary)';
                } else {
                    item.style.background = '';
                    item.style.borderLeft = '';
                }
            });
        }
    }

    // Initialize search suggest for header form
    initSearchSuggest('header-search-input', 'search-results-dropdown');
    
    // Initialize search suggest for mobile menu form
    initSearchSuggest('search-input', 'menu-search-results-dropdown');
});
