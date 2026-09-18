@extends('superadmin.layouts.app')
@section('title', 'Sửa Dự án | Super Admin')
@section('page-title', 'Chỉnh sửa Dự án: ' . $project->name)

@section('content')
<div class="px-1 sm:px-6 py-3 sm:py-8 w-full max-w-7xl mx-auto">
    <div class="mb-4 sm:mb-6">
        <a href="{{ route('superadmin.projects.index') }}" class="text-gray-500 hover:text-[#001B4E] inline-flex items-center transition-colors text-xs sm:text-sm">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Quay lại danh sách
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
            <strong class="font-bold">Lỗi!</strong>
            <span class="block sm:inline">Vui lòng kiểm tra lại thông tin bên dưới.</span>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('superadmin.projects.update', $project) }}" id="edit-form">
        @csrf @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
            <!-- Main Content (2 cols) -->
            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                <!-- Basic Info Card -->
                <div class="bg-white rounded-xl shadow-xs p-4 sm:p-6 border border-gray-100">
                    <div class="flex justify-between items-center mb-4 border-b pb-2">
                        <h3 class="font-bold text-gray-800 flex items-center text-sm sm:text-base">
                            <svg class="w-5 h-5 mr-2 text-[#001B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Thông tin Dự án
                        </h3>
                        <span class="text-xs font-semibold text-gray-400">ID: #{{ $project->id }}</span>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-form.label value="Mã Dự án" required="true" />
                                <x-form.input name="code" id="project_code_input" :value="old('code', $project->code)" placeholder="VD: DA001-CONGTY" required="true" class="font-mono font-medium" />
                                <p class="text-[11px] text-gray-500 mt-1">Quy chuẩn: <strong>DA + 3 số (001 &rarr; 999, &ge;1000) + Tên công ty / khách hàng</strong> (VD: DA001-LE-SI)</p>
                                @error('code')
                                    <x-form.error :message="$message" />
                                @enderror
                            </div>
                            <div>
                                <x-form.label value="Tên Dự án" required="true" />
                                <x-form.input name="name" id="project_name_input" :value="old('name', $project->name)" required="true" />
                            </div>
                        </div>
                        
                        <div>
                            <x-form.label value="Subdomain" required="true" />
                            <x-form.input name="subdomain" :value="old('subdomain', $project->subdomain)" required="true" placeholder="localhost/project-code hoặc employee.domain.com/contract-code" />
                            <p class="text-[11px] text-gray-500 mt-1 italic">Ví dụ: localhost/HD01 (local) hoặc sivgt.domain.com/HD01</p>
                        </div>
                        
                        <!-- Chọn Loại Dự án -->
                        <div class="grid grid-cols-1 gap-6 pt-4 border-t border-gray-100">
                            <div>
                                <x-form.label value="Phân loại dự án" required="true" />
                                <x-form.select name="project_type" id="project_type_select" required="true">
                                   
                                    <option value="design" {{ old('project_type', $project->project_type ?? ($project->department_id == 2 ? 'website' : 'design')) == 'design' ? 'selected' : '' }}>Thiết kế (Design)</option>
                                    <option value="website" {{ old('project_type', $project->project_type ?? ($project->department_id == 2 ? 'website' : 'design')) == 'website' ? 'selected' : '' }}>Lập trình Website</option>
                                </x-form.select>
                            </div>
                        </div>

                        <!-- Cấu hình Multi-Tenancy -->
                        @php
                            $isMtActive = (bool) old('is_multi_tenancy', $project->is_multi_tenancy);
                        @endphp
                        <div id="multi_tenancy_card" class="p-4 sm:p-5 rounded-xl border transition-all duration-200 mt-4 {{ $isMtActive ? 'bg-gradient-to-r from-purple-50 via-indigo-50/40 to-purple-50 border-purple-300 ring-2 ring-purple-100 shadow-xs' : 'bg-gray-50/80 border-gray-200' }}">
                            <div class="flex items-start justify-between gap-4">
                                <label for="is_multi_tenancy_toggle" class="flex items-start gap-3.5 cursor-pointer flex-1 select-none">
                                    <div class="pt-0.5">
                                        <input type="hidden" name="is_multi_tenancy" value="0">
                                        <input type="checkbox" name="is_multi_tenancy" id="is_multi_tenancy_toggle" value="1" 
                                            {{ $isMtActive ? 'checked' : '' }} 
                                            class="w-5 h-5 text-purple-600 rounded border-gray-300 focus:ring-purple-500 cursor-pointer"
                                            onchange="handleMultiTenancyToggle(this)">
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2.5 flex-wrap">
                                            <span class="font-bold text-sm sm:text-base text-gray-900">Kích hoạt mô hình Multi-Tenancy (CMS Tenant)</span>
                                            
                                            <!-- Dynamic Badge -->
                                            <span id="mt_status_badge" class="px-2.5 py-0.5 text-xs font-bold rounded-full border inline-flex items-center gap-1.5 transition-all {{ $isMtActive ? 'bg-purple-100 text-purple-800 border-purple-200' : 'bg-gray-200 text-gray-600 border-gray-300' }}">
                                                <svg id="mt_badge_check" class="w-3.5 h-3.5 {{ $isMtActive ? 'text-purple-600 inline' : 'hidden' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                <span id="mt_badge_dot" class="w-1.5 h-1.5 rounded-full {{ $isMtActive ? 'hidden' : 'bg-gray-400 inline-block' }}"></span>
                                                <span id="mt_badge_text">{{ $isMtActive ? 'Đang kích hoạt Multi-Tenancy' : 'Chưa kích hoạt (Dự án thường)' }}</span>
                                            </span>
                                        </div>
                                        <p id="mt_helper_text" class="text-xs leading-relaxed mt-1.5 transition-colors {{ $isMtActive ? 'text-purple-800 font-medium' : 'text-gray-500' }}">
                                            {{ $isMtActive ? '✓ Dự án này đang được phân loại là Multi-Tenancy và hiển thị trên Multi-Tenancy Control Center với CMS riêng.' : 'Bật tuỳ chọn này nếu dự án cần quản lý trên Multi-Tenancy Control Center, có CMS riêng và cấp quyền cho khách hàng / quản trị viên website riêng. Nếu là dự án thông thường của Agency (thiết kế, nội bộ, marketing...), vui lòng bỏ chọn để không hiển thị trên bảng Multi-Tenancy.' }}
                                        </p>
                                    </div>
                                </label>

                                @if($project->is_multi_tenancy)
                                    <a href="{{ route('superadmin.multi-tenancy.index') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1 text-xs font-semibold text-purple-700 bg-white hover:bg-purple-100 border border-purple-200 px-3 py-1.5 rounded-lg shadow-2xs transition-colors shrink-0" title="Đi tới màn hình điều hành Multi-Tenancy">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        <span>Xem trên MT Hub</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100 mt-4">


                            <div>
                                <x-form.label value="Khách hàng" />
                                <select name="customer_id" id="customer_id_select" class="w-full rounded-lg border-gray-300 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50 border px-4 py-2">
                                    <option value="">-- Không chọn / Chưa có khách hàng --</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id', $project->customer_id) == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }} {{ $customer->phone ? ' - ' . $customer->phone : '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <x-form.error :message="$message" />
                                @enderror
                                <div class="mt-2 text-xs text-gray-500">
                                    Nếu chưa có, vui lòng <a href="{{ route('superadmin.customers.create') }}" class="text-blue-600 hover:underline" target="_blank">thêm khách hàng mới</a>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Form Container -->
                        <div id="dynamic-form-container" class="space-y-4 pt-4 mt-4 border-t border-gray-100 hidden">
                            <h4 class="font-semibold text-gray-700 text-sm mb-4">Thông tin Dịch vụ bổ sung</h4>
                            <div id="dynamic-fields-wrapper" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Fields will be rendered here by JS -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Requirements Card -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 border-b pb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#001B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                        Thông tin triển khai & Ghi chú
                    </h3>
                    
                    <div class="space-y-6">
                        
                        {{--
                        <div>
                            <x-form.label value="Môi trường triển khai" />
                            <x-form.textarea name="environment" :value="old('environment', $project->environment)" rows="3" placeholder="Thông tin server, domain, database..." />
                        </div>
                        --}}
                        
                        <div>
                            <x-form.label value="Ghi chú khác" />
                            <x-form.rich-editor name="notes" :value="old('notes', $project->notes)" placeholder="Các ghi chú bổ sung..." />
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar (1 col) -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Config Card -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 border-b pb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#001B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Phân công & Quản lý
                    </h3>
                    
                    <div class="space-y-4">
                        {{-- 
                        <div>
                            <x-form.label value="Nhân sự phụ trách (PM)" required="true" />
                            <select name="employee_id" required 
                                    class="w-full rounded-lg border-gray-300 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50 text-sm">
                                <option value="">-- Chọn Quản lý dự án --</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" 
                                    {{ old('employee_id', $project->admin_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }} - {{ ucfirst($employee->position ?? 'staff') }}
                                </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <x-form.error :message="$message" />
                            @enderror
                        </div>

                        <div>
                            <x-form.label value="Lập trình viên (Devs)" />
                            <select name="dev_ids[]" multiple 
                                    class="w-full rounded-lg border-gray-300 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50 text-sm" size="5">
                                @foreach($devs as $dev)
                                <option value="{{ $dev->id }}" 
                                    {{ in_array($dev->id, old('dev_ids', array_diff($project->employee_ids ?? [], [$project->admin_id]))) ? 'selected' : '' }}>
                                    {{ $dev->name }} - {{ ucfirst($dev->position ?? 'dev') }}
                                </option>
                                @endforeach
                            </select>
                            <p class="text-[11px] text-gray-500 mt-1">Giữ Ctrl (Windows) hoặc Cmd (Mac) để chọn nhiều</p>
                            @error('dev_ids')
                                <x-form.error :message="$message" />
                            @enderror
                        </div>
                        --}}
                        
                        <div>
                            <x-form.label value="Trạng thái" />
                            <x-form.select name="status" :value="old('status', $project->status)" :options="[
                                'pending' => 'Pending (Đang chờ)', 
                                'active' => 'Active (Hoạt động)', 
                                'assigned' => 'Assigned (Đã phân Dev)', 
                                'in_progress' => 'In Progress (Đang làm)', 
                                'on_hold' => 'On Hold (Tạm ngưng)', 
                                'error' => 'Error (Có lỗi)',
                                'completed' => 'Completed (Hoàn thành)'
                            ]" />
                        </div>
                        
                        <div class="pt-2 border-t border-gray-100 mt-4">
                            <x-form.label value="Giá trị Dự án (VNĐ)" />
                            <input type="text" id="contract_value_display" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50" placeholder="VD: 1.000.000" value="{{ old('contract_value', $project->contract_value) }}">
                            <input type="hidden" name="contract_value" id="contract_value" value="{{ old('contract_value', $project->contract_value) }}">
                        </div>

                        {{-- Quỹ Gold Dự Án --}}
                        @if(config('features.gold_enabled'))
                        <div class="pt-3 border-t border-gray-100">
                            <div class="flex items-center justify-between mb-1">
                                <x-form.label value="Quỹ Điểm Thưởng Gold Dự Án" />
                                <span class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full border border-amber-200">
                                    <svg class="w-3 h-3 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" fill="#FBBF24"/><text x="10" y="13" font-size="8" font-weight="bold" fill="#78350F" text-anchor="middle">G</text></svg>
                                    Gold Pool
                                </span>
                            </div>
                            <x-form.input name="total_gold" :value="old('total_gold', $project->total_gold ?? 0)" type="number" min="0" step="50" placeholder="VD: 2000" />
                            
                            {{-- Chi tiết phân bổ quỹ Gold --}}
                            <div class="mt-2.5 p-3 bg-gradient-to-br from-amber-50/80 to-yellow-50/80 border border-amber-200 rounded-lg text-xs space-y-1.5">
                                <div class="flex justify-between items-center text-gray-600">
                                    <span>Tổng quỹ Gold:</span>
                                    <span class="font-bold text-gray-900">{{ number_format($project->total_gold ?? 0) }} Gold</span>
                                </div>
                                <div class="flex justify-between items-center text-gray-600">
                                    <span>Đã phân bổ cho Tasks:</span>
                                    <span class="font-semibold text-amber-800">{{ number_format($project->allocatedGold()) }} Gold</span>
                                </div>
                                <div class="flex justify-between items-center pt-1 border-t border-amber-200/60">
                                    <span class="font-medium text-emerald-800">Còn khả dụng:</span>
                                    <span class="font-bold text-emerald-700">{{ number_format($project->remainingGold()) }} Gold</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="grid grid-cols-2 gap-4 pt-2 border-t border-gray-100">
                            <div>
                                <x-form.label value="Ngày Bắt đầu" />
                                <x-form.input name="start_date" :value="old('start_date', $project->start_date?->format('Y-m-d'))" type="date" />
                            </div>
                            <div>
                                <x-form.label value="Deadline" />
                                <x-form.input name="deadline" :value="old('deadline', $project->deadline?->format('Y-m-d'))" type="date" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="pt-4 flex gap-3">
                    <x-form.button type="submit" class="flex-1 justify-center flex text-lg py-3 shadow-sm">
                        Cập nhật
                    </x-form.button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Truyền dữ liệu Department & Service Schema ra JS -->
<script>
    const departmentsData = @json($departments);
    const oldDepartmentId = "{{ old('department_id', $project->department_id) }}";
    const oldServiceId = "{{ old('service_id', $project->service_id) }}";
    const oldDynamicData = @json(old('dynamic_form_data', is_array($project->dynamic_form_data) ? $project->dynamic_form_data : json_decode($project->dynamic_form_data, true) ?? []));

    document.addEventListener('DOMContentLoaded', function() {
        const moneyDisplay = document.getElementById('contract_value_display');
        const moneyReal = document.getElementById('contract_value');
        if (moneyDisplay && moneyReal) {
            if (moneyReal.value) {
                moneyDisplay.value = new Intl.NumberFormat('vi-VN').format(moneyReal.value);
            }
            moneyDisplay.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, '');
                if (value === '') {
                    this.value = '';
                    moneyReal.value = '';
                    return;
                }
                this.value = new Intl.NumberFormat('vi-VN').format(value);
                moneyReal.value = value;
            });
        }
        
        const contractSelect = document.getElementById('contract_id_select');
        const customerSelect = document.getElementById('customer_id_select');
        const projectCodeInput = document.getElementById('project_code_input');
        const projectNameInput = document.getElementById('project_name_input');
        const btnGenerateCode = document.getElementById('btn_generate_code');
        const projectNum = {{ (int) ($projectNumber ?? 1) }};

        function formatStandardCode(rawName, num) {
            const padded = String(num).padStart(3, '0');
            let clean = '';
            if (rawName) {
                let namePart = rawName.split(' - ')[0] || rawName;
                clean = namePart
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                    .replace(/[^a-zA-Z0-9\s-]/g, '')
                    .trim()
                    .replace(/\s+/g, '-')
                    .toUpperCase();
            }
            return clean ? `DA${padded}-${clean}` : `DA${padded}`;
        }

        function getSelectedCustomerName() {
            if (!customerSelect || customerSelect.selectedIndex <= 0) return '';
            const selectedText = customerSelect.options[customerSelect.selectedIndex].textContent || '';
            return selectedText.trim();
        }

        if (btnGenerateCode) {
            btnGenerateCode.addEventListener('click', function() {
                const custName = getSelectedCustomerName() || (projectNameInput ? projectNameInput.value : '');
                projectCodeInput.value = formatStandardCode(custName, projectNum);
            });
        }

        if (customerSelect) {
            customerSelect.addEventListener('change', function() {
                const custName = getSelectedCustomerName();
                // Nếu người dùng chọn khách hàng mới và mã dự án đang có dạng DA... thì tự động cập nhật
                if (!projectCodeInput.value || /^DA\d+-.*$/i.test(projectCodeInput.value)) {
                    projectCodeInput.value = formatStandardCode(custName, projectNum);
                }
            });
        }

        if (contractSelect && customerSelect) {
            contractSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const customerId = selectedOption.getAttribute('data-customer-id');
                if (customerId) {
                    customerSelect.value = customerId;
                    customerSelect.dispatchEvent(new Event('change'));
                }
            });
        }

        const deptSelect = document.getElementById('department_select');
        const serviceSelect = document.getElementById('service_select');
        const dynamicContainer = document.getElementById('dynamic-form-container');
        const fieldsWrapper = document.getElementById('dynamic-fields-wrapper');

        function renderServices(departmentId, selectedServiceId = '') {
            if (!serviceSelect || !dynamicContainer || !fieldsWrapper) return;
            serviceSelect.innerHTML = '<option value="">-- Chọn Dịch vụ --</option>';
            serviceSelect.disabled = true;
            dynamicContainer.classList.add('hidden');
            fieldsWrapper.innerHTML = '';

            if (!departmentId) return;

            const dept = departmentsData.find(d => d.id == departmentId);
            if (dept && dept.services && dept.services.length > 0) {
                serviceSelect.disabled = false;
                dept.services.forEach(svc => {
                    const option = document.createElement('option');
                    option.value = svc.id;
                    option.textContent = svc.name;
                    if (svc.id == selectedServiceId) {
                        option.selected = true;
                    }
                    serviceSelect.appendChild(option);
                });
            }
        }

        function renderDynamicForm(serviceId) {
            if (!fieldsWrapper || !dynamicContainer || !deptSelect) return;
            fieldsWrapper.innerHTML = '';
            dynamicContainer.classList.add('hidden');

            if (!serviceId) return;

            const deptId = deptSelect.value;
            const dept = departmentsData.find(d => d.id == deptId);
            if (!dept) return;

            const service = dept.services.find(s => s.id == serviceId);
            if (!service || !service.form_schema || service.form_schema.length === 0) return;

            const schema = service.form_schema;
            dynamicContainer.classList.remove('hidden');

            schema.forEach(field => {
                const wrapper = document.createElement('div');
                
                const label = document.createElement('label');
                label.className = 'block font-medium text-sm text-gray-700 mb-1';
                label.innerHTML = `${field.label} ${field.required ? '<span class="text-red-500">*</span>' : ''}`;
                wrapper.appendChild(label);

                const value = oldDynamicData[field.name] || '';

                let input;
                const inputName = `dynamic_form_data[${field.name}]`;
                const inputClass = 'border-gray-300 focus:border-[#001B4E] focus:ring-[#001B4E] rounded-md shadow-sm block w-full sm:text-sm';

                if (field.type === 'textarea') {
                    input = document.createElement('textarea');
                    input.name = inputName;
                    input.className = inputClass;
                    input.rows = 3;
                    input.value = value;
                } else if (field.type === 'select') {
                    input = document.createElement('select');
                    input.name = inputName;
                    input.className = inputClass;
                    const options = field.options ? field.options.split(',').map(s => s.trim()) : [];
                    
                    const defaultOpt = document.createElement('option');
                    defaultOpt.value = '';
                    defaultOpt.textContent = '-- Chọn --';
                    input.appendChild(defaultOpt);

                    options.forEach(opt => {
                        const optionEl = document.createElement('option');
                        optionEl.value = opt;
                        optionEl.textContent = opt;
                        if (opt === value) optionEl.selected = true;
                        input.appendChild(optionEl);
                    });
                } else {
                    input = document.createElement('input');
                    input.type = field.type || 'text';
                    input.name = inputName;
                    input.className = inputClass;
                    input.value = value;
                }

                if (field.required) {
                    input.required = true;
                }

                wrapper.appendChild(input);
                fieldsWrapper.appendChild(wrapper);
            });
        }

        if (deptSelect) {
            deptSelect.addEventListener('change', function() {
                renderServices(this.value);
            });
        }

        if (serviceSelect) {
            serviceSelect.addEventListener('change', function() {
                renderDynamicForm(this.value);
            });
        }

        if (oldDepartmentId) {
            renderServices(oldDepartmentId, oldServiceId);
            if (oldServiceId) {
                renderDynamicForm(oldServiceId);
            }
        }
    });

    function handleMultiTenancyToggle(checkbox) {
        const card = document.getElementById('multi_tenancy_card');
        const badge = document.getElementById('mt_status_badge');
        const badgeCheck = document.getElementById('mt_badge_check');
        const badgeDot = document.getElementById('mt_badge_dot');
        const badgeText = document.getElementById('mt_badge_text');
        const helperText = document.getElementById('mt_helper_text');

        if (checkbox.checked) {
            card.className = 'p-4 sm:p-5 rounded-xl border transition-all duration-200 mt-4 bg-gradient-to-r from-purple-50 via-indigo-50/40 to-purple-50 border-purple-300 ring-2 ring-purple-100 shadow-xs';
            badge.className = 'px-2.5 py-0.5 text-xs font-bold rounded-full border inline-flex items-center gap-1.5 transition-all bg-purple-100 text-purple-800 border-purple-200';
            badgeCheck.classList.remove('hidden');
            badgeCheck.classList.add('inline');
            badgeDot.classList.add('hidden');
            badgeText.textContent = 'Đang kích hoạt Multi-Tenancy';
            helperText.className = 'text-xs leading-relaxed mt-1.5 transition-colors text-purple-800 font-medium';
            helperText.textContent = '✓ Dự án này đang được phân loại là Multi-Tenancy và hiển thị trên Multi-Tenancy Control Center với CMS riêng.';
        } else {
            card.className = 'p-4 sm:p-5 rounded-xl border transition-all duration-200 mt-4 bg-gray-50/80 border-gray-200';
            badge.className = 'px-2.5 py-0.5 text-xs font-medium rounded-full border inline-flex items-center gap-1.5 transition-all bg-gray-200 text-gray-600 border-gray-300';
            badgeCheck.classList.add('hidden');
            badgeCheck.classList.remove('inline');
            badgeDot.classList.remove('hidden');
            badgeText.textContent = 'Chưa kích hoạt (Dự án thường)';
            helperText.className = 'text-xs leading-relaxed mt-1.5 transition-colors text-gray-500';
            helperText.textContent = 'Bật tuỳ chọn này nếu dự án cần quản lý trên Multi-Tenancy Control Center, có CMS riêng và cấp quyền cho khách hàng / quản trị viên website riêng. Nếu là dự án thông thường của Agency (thiết kế, nội bộ, marketing...), vui lòng bỏ chọn để không hiển thị trên bảng Multi-Tenancy.';
        }
    }
</script>
@endsection
