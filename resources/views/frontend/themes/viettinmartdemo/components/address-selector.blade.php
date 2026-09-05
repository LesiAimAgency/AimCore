@props([
    'provinceName' => 'province_code',
    'districtName' => 'district_code',
    'wardName' => 'ward_code',
    'provinceLabelName' => 'province_name',
    'districtLabelName' => 'district_name',
    'wardLabelName' => 'ward_name',
    'selectedProvince' => null,
    'selectedDistrict' => null,
    'selectedWard' => null,
    'required' => true,
    'id' => null,
    'containerClass' => 'row g-3',
    'colClass' => 'col-md-6 mb-3',
    'selectClass' => 'form-select'
])

@php
    $id = $id ?? 'address-selector-' . Str::random(8);
    // Prioritize old() values, then passed props
    $valP = old($provinceName, $selectedProvince);
    $valD = old($districtName, $selectedDistrict);
    $valW = old($wardName, $selectedWard);
@endphp

<div class="address-selector-container {{ $containerClass }}" 
     id="{{ $id }}"
     data-initial-p="{{ $valP }}"
     data-initial-d="{{ $valD }}"
     data-initial-w="{{ $valW }}">
    
    <div class="{{ $colClass }}">
        <label class="form-label" for="province-{{ $id }}">Tỉnh / Thành phố{{ $required ? '*' : '' }}</label>
        <select id="province-{{ $id }}" 
                name="{{ $provinceName }}" 
                class="{{ $selectClass }} address-province-select" 
                {{ $required ? 'required' : '' }}>
            <option value="">Chọn Tỉnh / Thành phố</option>
        </select>
        <input type="hidden" name="{{ $provinceLabelName }}" class="address-province-name" value="{{ old($provinceLabelName) }}">
    </div>
    
    <div class="{{ $colClass }}">
        <label class="form-label" for="district-{{ $id }}">Quận / Huyện{{ $required ? '*' : '' }}</label>
        <select id="district-{{ $id }}" 
                name="{{ $districtName }}" 
                class="{{ $selectClass }} address-district-select" 
                {{ $required ? 'required' : '' }} 
                disabled>
            <option value="">Chọn Quận / Huyện</option>
        </select>
        <input type="hidden" name="{{ $districtLabelName }}" class="address-district-name" value="{{ old($districtLabelName) }}">
    </div>
    
    <div class="{{ $colClass }}">
        <label class="form-label" for="ward-{{ $id }}">Phường / Xã{{ $required ? '*' : '' }}</label>
        <select id="ward-{{ $id }}" 
                name="{{ $wardName }}" 
                class="{{ $selectClass }} address-ward-select" 
                {{ $required ? 'required' : '' }} 
                disabled>
            <option value="">Chọn Phường / Xã</option>
        </select>
        <input type="hidden" name="{{ $wardLabelName }}" class="address-ward-name" value="{{ old($wardLabelName) }}">
    </div>
</div>

@once
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            /* Aggressively hide any duplicate nice-select UI */
            .address-selector-container .nice-select {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
                pointer-events: none !important;
            }
            /* Hide the original select but keep it accessible for Select2 */
            .address-selector-container select {
                display: none !important;
            }

            .select2-container--default .select2-selection--single {
                height: 50px !important; 
                border: 1px solid #eeeeee !important; 
                border-radius: 6px !important;
                display: flex !important;
                align-items: center !important;
                background-color: #fff !important;
                transition: all 0.3s ease;
                position: relative !important;
            }
            .select2-container--default.select2-container--focus .select2-selection--single {
                border-color: var(--color-primary) !important;
                box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.1);
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 48px !important; 
                padding-left: 20px !important;
                padding-right: 40px !important;
                color: #2C3C28 !important;
                font-size: 15px !important;
                font-weight: 500 !important;
                width: 100% !important;
                text-align: left !important; /* Force left alignment */
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 48px !important;
                right: 15px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__clear {
                position: absolute !important;
                right: 45px !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
                margin-top: 0 !important;
                padding: 0 !important;
                font-size: 18px !important;
                color: #999 !important;
            }
            .select2-dropdown {
                border: 1px solid #eeeeee !important;
                border-radius: 8px !important;
                box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
                overflow: hidden !important;
                z-index: 9999 !important;
            }
            .select2-search__field {
                border-radius: 6px !important;
                border: 1px solid #eeeeee !important;
                padding: 10px 15px !important;
                margin-top: 5px !important;
            }
            .select2-results__option {
                padding: 10px 20px !important;
                font-size: 14px !important;
            }
            .select2-results__option--highlighted[aria-selected] {
                background-color: var(--color-primary) !important;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            (function() {
                let provincesDataCache = null;

                async function getProvincesData() {
                    if (provincesDataCache) return provincesDataCache;
                    try {
                        const response = await fetch('{{ asset("data/provinces.json") }}');
                        provincesDataCache = await response.json();
                        return provincesDataCache;
                    } catch (e) {
                        console.error("AddressSelector: Error loading data", e);
                        return [];
                    }
                }

                function initAddressSwitcher(container) {
                    const $container = $(container);
                    const $pSelect = $container.find('.address-province-select');
                    const $dSelect = $container.find('.address-district-select');
                    const $wSelect = $container.find('.address-ward-select');
                    const $pNameInput = $container.find('.address-province-name');
                    const $dNameInput = $container.find('.address-district-name');
                    const $wNameInput = $container.find('.address-ward-name');

                    // Get initial values from data attributes
                    let initialP = $container.data('initial-p');
                    let initialD = $container.data('initial-d');
                    let initialW = $container.data('initial-w');

                    function initSelect2(el, placeholder) {
                        const $el = $(el);
                        
                        // Destroy niceSelect if it was already initialized by theme's global script
                        if ($.fn.niceSelect && $el.next('.nice-select').length) {
                            $el.next('.nice-select').remove();
                            $el.css('display', 'block'); // niceSelect might have hidden it
                        }
                        
                        $el.select2({ 
                            placeholder: placeholder, 
                            width: '100%',
                            allowClear: true,
                            dropdownParent: $el.parent() // Ensure dropdown is scoped and positioned correctly
                        });
                    }

                    initSelect2($pSelect, "Chọn Tỉnh / Thành phố");
                    initSelect2($dSelect, "Chọn Quận / Huyện");
                    initSelect2($wSelect, "Chọn Phường / Xã");

                    getProvincesData().then(data => {
                        let options = '<option value=""></option>';
                        const normP = initialP ? String(initialP).trim().toLowerCase() : null;
                        
                        data.forEach(p => {
                            const normName = p.name ? String(p.name).trim().toLowerCase() : '';
                            let selected = (p.code == initialP || normName === normP) ? 'selected' : '';
                            options += `<option value="${p.code}" ${selected}>${p.name}</option>`;
                        });
                        $pSelect.html(options).trigger('change');
                    });

                    $pSelect.on('change', function() {
                        const pCode = $(this).val();
                        const pName = $(this).find('option:selected').text();
                        $pNameInput.val(pName);

                        console.log("AddressSelector: Province changed to", pCode, pName);

                        if (!pCode) {
                            $dSelect.html('<option value=""></option>').prop('disabled', true).trigger('change').trigger('change.select2');
                            return;
                        }

                        getProvincesData().then(data => {
                            const province = data.find(p => p.code == pCode);
                            let options = '<option value=""></option>';
                            
                            // Get target district from attribute or local initial var
                            let targetD = $container.attr('data-initial-d') || initialD;
                            const normD = targetD ? String(targetD).trim().toLowerCase() : null;
                            
                            console.log("AddressSelector: Looking for target district:", targetD, "in province", pCode);

                            if (province && province.districts) {
                                province.districts.forEach(d => {
                                    const normName = d.name ? String(d.name).trim().toLowerCase() : '';
                                    let isSelected = (d.code == targetD || String(d.code) == normD || normName === normD);
                                    let selectedAttr = isSelected ? 'selected' : '';
                                    options += `<option value="${d.code}" ${selectedAttr}>${d.name}</option>`;
                                    if (isSelected) console.log("AddressSelector: Found matching district:", d.name, d.code);
                                });
                            }
                            
                            $dSelect.prop('disabled', false).html(options).trigger('change').trigger('change.select2');
                            
                            // Clear targets after use
                            $container.removeAttr('data-initial-d');
                            initialD = null; 
                        });
                    });

                    $dSelect.on('change', function() {
                        const dCode = $(this).val();
                        const dName = $(this).find('option:selected').text();
                        $dNameInput.val(dName);
                        
                        console.log("AddressSelector: District changed to", dCode, dName);

                        if (!dCode) {
                            $wSelect.html('<option value=""></option>').prop('disabled', true).trigger('change').trigger('change.select2');
                            return;
                        }

                        getProvincesData().then(data => {
                            const pCode = $pSelect.val();
                            const province = data.find(p => p.code == pCode);
                            let options = '<option value=""></option>';
                            
                            // Get target ward from attribute or local initial var
                            let targetW = $container.attr('data-initial-w') || initialW;
                            const normW = targetW ? String(targetW).trim().toLowerCase() : null;
                            
                            console.log("AddressSelector: Looking for target ward:", targetW, "in district", dCode);

                            if (province && province.districts) {
                                const district = province.districts.find(d => d.code == dCode);
                                if (district && district.wards) {
                                    district.wards.forEach(w => {
                                        const normName = w.name ? String(w.name).trim().toLowerCase() : '';
                                        let isSelected = (w.code == targetW || String(w.code) == normW || normName === normW);
                                        let selectedAttr = isSelected ? 'selected' : '';
                                        options += `<option value="${w.code}" ${selectedAttr}>${w.name}</option>`;
                                        if (isSelected) console.log("AddressSelector: Found matching ward:", w.name, w.code);
                                    });
                                }
                            }
                            
                            $wSelect.prop('disabled', false).html(options).trigger('change').trigger('change.select2');
                            
                            // Clear targets after use
                            $container.removeAttr('data-initial-w');
                            initialW = null;
                        });
                    });

                    $wSelect.on('change', function() {
                        const wName = $(this).find('option:selected').text();
                        $wNameInput.val(wName);
                        
                        $container.trigger('address:changed', {
                            province: $pNameInput.val(),
                            district: $dNameInput.val(),
                            ward: wName
                        });
                    });
                }

                $(document).ready(function() {
                    $('.address-selector-container').each(function() {
                        initAddressSwitcher(this);
                    });
                });
            })();
        </script>
    @endpush
@endonce
