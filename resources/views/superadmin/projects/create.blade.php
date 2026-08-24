@extends('superadmin.layouts.app')
@section('title', 'Tạo Dự án mới | Super Admin')
@section('page-title', 'Tạo Dự án từ Hợp đồng')

@section('content')
<div class="px-6 py-8 w-full max-w-7xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('superadmin.projects.index') }}" class="text-gray-500 hover:text-[#001B4E] inline-flex items-center transition-colors">
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

    <form method="POST" action="{{ route('superadmin.projects.store') }}" id="create-form">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content (2 cols) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info Card -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 border-b pb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#001B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Thông tin Dự án
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-form.label value="Mã Dự án" required="true" />
                                <x-form.input name="code" :value="old('code')" placeholder="VD: PRJ001" required="true" />
                            </div>
                            <div>
                                <x-form.label value="Tên Dự án" required="true" />
                                <x-form.input name="name" :value="old('name')" required="true" />
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-100 mt-4">
                            <x-form.label value="Phân loại dự án" required="true" />
                            <x-form.select name="project_type" id="project_type_select" required="true">
                                
                                <option value="design" {{ old('project_type') == 'design' ? 'selected' : '' }}>Thiết kế (Design)</option>
                                <option value="website" {{ old('project_type') == 'website' ? 'selected' : '' }}>Lập trình Website</option>
                            </x-form.select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100 mt-4">

                            
                            <div>
                                <x-form.label value="Khách hàng" required="true" />
                                <select name="customer_id" id="customer_id_select" required class="w-full rounded-lg border-gray-300 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50 border px-4 py-2">
                                    <option value="">-- Chọn khách hàng --</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
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
                      
                        <div id="website_options" class="hidden mt-4 p-4 bg-blue-50 border border-blue-100 rounded-lg">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" name="create_website_now" value="1" class="form-checkbox h-5 w-5 text-blue-600 rounded">
                                <span class="text-gray-700 font-medium">Khởi tạo ngay Website (Sử dụng Multi-Tenancy Control Center)</span>
                            </label>
                            <p class="text-xs text-gray-500 mt-1 ml-8">Hệ thống sẽ tự động cấp phát Subdomain, CMS Admin và kết nối vào hệ thống Tenancy.</p>
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
                            <x-form.textarea name="environment" :value="old('environment')" rows="3" placeholder="Thông tin Server, Domain, Database, FTP..." />
                        </div>
                        --}}
                        <div>
                            <x-form.label value="Ghi chú thêm" />
                            <x-form.rich-editor name="notes" :value="old('notes')" placeholder="Các ghi chú hoặc yêu cầu đặc biệt khác..." />
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
                            <x-form.label value="Admin phụ trách (PM)" required="true" />
                            <x-form.select name="employee_id" required="true">
                                <option value="">-- Chọn Admin --</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    [{{ $employee->code ?? 'N/A' }}] {{ $employee->name }}
                                </option>
                                @endforeach
                            </x-form.select>
                        </div>
                        
                        <div>
                            <x-form.label value="Developer phụ trách" />
                            <select name="dev_ids[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#001B4E] focus:ring-[#001B4E] sm:text-sm border px-4 py-2" style="min-height: 100px;">
                                @foreach($devs as $dev)
                                <option value="{{ $dev->id }}" {{ in_array($dev->id, old('dev_ids', [])) ? 'selected' : '' }}>
                                    [{{ $dev->code ?? 'N/A' }}] {{ $dev->name }}
                                </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1 italic">Nhấn giữ Ctrl/Cmd để chọn nhiều Dev</p>
                        </div>
                        --}}
                        
                        <div>
                            <x-form.label value="Trạng thái Dự án" />
                            <x-form.select name="status" :options="[
                                'pending' => 'Pending (Đang chờ)', 
                                'active' => 'Active (Hoạt động)', 
                                'assigned' => 'Assigned (Đã phân Dev)', 
                                'in_progress' => 'In Progress (Đang làm)', 
                                'on_hold' => 'On Hold (Tạm ngưng)', 
                                'error' => 'Error (Có lỗi)',
                                'completed' => 'Completed (Hoàn thành)'
                            ]" :value="old('status', 'pending')" />
                        </div>

                        <div class="pt-2 border-t border-gray-100 mt-4">
                            <x-form.label value="Giá trị Dự án (VNĐ)" />
                            <input type="text" id="contract_value_display" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50" placeholder="VD: 1.000.000" value="{{ old('contract_value') }}">
                            <input type="hidden" name="contract_value" id="contract_value" value="{{ old('contract_value') }}">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 pt-2 border-t border-gray-100 mt-4">
                            <div>
                                <x-form.label value="Ngày Bắt đầu" />
                                <x-form.input name="start_date" :value="old('start_date', now()->format('Y-m-d'))" type="date" />
                            </div>
                            <div>
                                <x-form.label value="Deadline" />
                                <x-form.input name="deadline" :value="old('deadline', now()->addMonth()->format('Y-m-d'))" type="date" />
                            </div>
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
                            <x-form.input name="total_gold" :value="old('total_gold', 1000)" type="number" min="0" step="50" placeholder="VD: 1000, 2000..." />
                            <p class="text-xs text-gray-400 mt-1">Tổng điểm thưởng Gold cấp cho dự án để thưởng cho các đầu việc hoàn thành.</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="pt-4">
                    <x-form.button type="submit" class="w-full justify-center flex text-lg py-3">
                        Tạo & Phân Phối
                    </x-form.button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Truyền dữ liệu Department & Service Schema ra JS -->
<script>
    const departmentsData = @json($departments);
    const oldDepartmentId = "{{ old('department_id', '') }}";
    const oldServiceId = "{{ old('service_id', '') }}";
    const oldDynamicData = @json(old('dynamic_form_data', []));

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
        if (contractSelect && customerSelect) {
            contractSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const customerId = selectedOption.getAttribute('data-customer-id');
                if (customerId) {
                    customerSelect.value = customerId;
                }
            });
        }

        const deptSelect = document.getElementById('department_select');
        const projectTypeSelect = document.getElementById('project_type_select');
        const websiteOptions = document.getElementById('website_options');
        if (projectTypeSelect) {
            projectTypeSelect.addEventListener('change', function() {
                if (this.value === 'website') {
                    websiteOptions.classList.remove('hidden');
                } else {
                    websiteOptions.classList.add('hidden');
                }
            });
            if (projectTypeSelect.value === 'website') {
                websiteOptions.classList.remove('hidden');
            }
        }
        const serviceSelect = document.getElementById('service_select');
        const dynamicContainer = document.getElementById('dynamic-form-container');
        const fieldsWrapper = document.getElementById('dynamic-fields-wrapper');

        // Hàm render options cho Service
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

        // Hàm render Dynamic Form dựa vào form_schema
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
                
                // Label
                const label = document.createElement('label');
                label.className = 'block font-medium text-sm text-gray-700 mb-1';
                label.innerHTML = `${field.label} ${field.required ? '<span class="text-red-500">*</span>' : ''}`;
                wrapper.appendChild(label);

                const value = oldDynamicData[field.name] || '';

                // Input
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
                    // Tách option bằng dấu phẩy
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

        // Sự kiện thay đổi
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

        // Khởi tạo nếu có old values (khi bị validation lỗi trả về)
        if (oldDepartmentId) {
            renderServices(oldDepartmentId, oldServiceId);
            if (oldServiceId) {
                renderDynamicForm(oldServiceId);
            }
        }
    });
</script>
@endsection
