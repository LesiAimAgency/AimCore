@extends('superadmin.layouts.app')

@section('title', 'Tạo Hợp đồng mới | Super Admin')
@section('page-title', 'Thêm Hợp đồng mới')

@section('content')
<div class="px-1 sm:px-6 py-3 sm:py-8 w-full max-w-7xl mx-auto">
    <div class="mb-4 sm:mb-6">
        <a href="{{ route('superadmin.contracts.index') }}" class="text-gray-500 hover:text-[#001B4E] inline-flex items-center transition-colors text-xs sm:text-sm">
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

    <form action="{{ route('superadmin.contracts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
            <!-- Main Content (2 cols) -->
            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                <!-- Basic Info Card -->
                <div class="bg-white rounded-xl shadow-xs p-4 sm:p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 border-b pb-2 flex items-center text-sm sm:text-base">
                        <svg class="w-5 h-5 mr-2 text-[#001B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Thông tin cơ bản
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <x-form.label value="Tên hợp đồng" required="true" />
                            <x-form.input name="title" :value="old('title')" required="true" placeholder="VD: Thiết kế Website Bán hàng..." />
                        </div>
                        
                        <div>
                            <x-form.label value="Mã hợp đồng" />
                            <x-form.input name="contract_code" :value="old('contract_code')" placeholder="VD: 0101.2026..." />
                        </div>
                        
                        <div>
                            <x-form.label value="Khách hàng" required="true" />
                            <select name="customer_id" class="w-full rounded-lg border-gray-300 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50 border px-4 py-2" required>
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


                        <div>
                            <x-form.label value="Giá trị hợp đồng (VNĐ)" />
                            <x-form.input name="contract_value" :value="old('contract_value', 0)" type="number" step="1000" min="0" />
                        </div>
                        
                        <div>
                            <x-form.label value="Yêu cầu Kỹ thuật & Tính năng" />
                            <x-form.rich-editor name="technical_requirements" :value="old('technical_requirements')" />
                        </div>

                        <div>
                            <x-form.label value="Các tính năng chính" />
                            <x-form.rich-editor name="features" :value="old('features')" />
                        </div>

                        <div>
                            <x-form.label value="Ghi chú chi tiết" />
                            <x-form.rich-editor name="description" :value="old('description')" />
                        </div>
                    </div>
                </div>

                <!-- Web Resources Card -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100" id="web-resources-card">
                    <h3 class="font-bold text-gray-800 mb-4 border-b pb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#001B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        Tài nguyên Web (Domain & Hosting)
                    </h3>
                    
                    <div class="flex items-center mb-4">
                        <input type="checkbox" name="has_client_resources" id="has_client_resources_checkbox" value="1" {{ old('client_resource_details') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 border px-4 py-2">
                        <label for="has_client_resources_checkbox" class="ml-2 font-medium text-gray-900 cursor-pointer">Có đính kèm Tài nguyên Web (Domain, Hosting...)?</label>
                    </div>

                    <div id="web-resources-fields" class="space-y-4 {{ old('client_resource_details') ? '' : 'hidden' }}">
                        <x-form.label value="Chi tiết Tài khoản / Nguồn tài nguyên" />
                        <x-form.rich-editor name="client_resource_details" :value="old('client_resource_details')" />
                        <p class="text-xs text-gray-500 mt-1 italic">Vui lòng cung cấp link đăng nhập, user, pass nếu có...</p>
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
                        Phân loại & Thời gian
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <x-form.label value="Nhóm dịch vụ" required="true" />
                            <x-form.select name="service_type" required="true" id="service_type" :options="[
                                'website' => 'Thiết kế website',
                                'publication' => 'Thiết kế ấn phẩm',
                                'branding' => 'Thiết kế nhận diện thương hiệu',
                                'social_media' => 'Sản xuất nội dung mạng xã hội',
                            ]" :value="old('service_type', 'website')" />
                        </div>
                        
                        <div>
                            <x-form.label value="Trạng thái" required="true" />
                            <x-form.select name="status" required="true" :options="[
                                'pending' => 'Đang chờ ký / Setup',
                                'active' => 'Đang tiến hành',
                                'completed' => 'Đã hoàn thành',
                                'cancelled' => 'Đã hủy',
                            ]" :value="old('status', 'pending')" />
                        </div>
                        
                        <div class="pt-2 border-t">
                            <x-form.label value="Ngày bắt đầu" />
                            <x-form.input type="date" name="start_date" :value="old('start_date', date('Y-m-d'))" />
                        </div>
                        
                        <div>
                            <x-form.label value="Ngày kết thúc (Dự kiến)" />
                            <x-form.input type="date" name="end_date" :value="old('end_date')" />
                        </div>
                    </div>
                </div>
                
                <!-- Attachments Card -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 border-b pb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#001B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                        </svg>
                        Chứng từ & Hình ảnh
                    </h3>
                    
                    <div>
                        <x-form.label value="Upload Hình chụp Hợp đồng (nhiều ảnh)" />
                        <input type="file" name="attachment_files[]" multiple accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#001B4E] file:text-white hover:file:bg-[#002D80] cursor-pointer border rounded-lg border-gray-300 p-2 mt-1">
                        <p class="text-xs text-gray-500 mt-2">Định dạng JPG, PNG. Tối đa 5MB/ảnh.</p>
                    </div>
                </div>
                
                <div class="pt-4">
                    <x-form.button type="submit" class="w-full justify-center flex text-lg py-3">
                        Lưu Hợp Đồng Mới
                    </x-form.button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const webCheckbox = document.getElementById('has_client_resources_checkbox');
        const webFields = document.getElementById('web-resources-fields');
        
        if (webCheckbox && webFields) {
            webCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    webFields.classList.remove('hidden');
                } else {
                    webFields.classList.add('hidden');
                }
            });
        }
    });
</script>
@endsection
