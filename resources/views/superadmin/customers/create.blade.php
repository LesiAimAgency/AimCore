@extends('superadmin.layouts.app')

@section('title', 'Thêm Khách hàng mới | Super Admin')
@section('page-title', 'Thêm Khách hàng')

@section('content')
<div class="px-6 py-8 w-full max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-bold text-[#001B4E]">Thêm Khách hàng mới</h1>
        <a href="{{ route('superadmin.customers.index') }}" class="text-gray-500 hover:text-[#001B4E] inline-flex items-center transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Quay lại
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('superadmin.customers.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <x-form.label>Loại khách hàng</x-form.label>
                        <x-form.select name="type" :options="['individual' => 'Cá nhân', 'company' => 'Doanh nghiệp']" :value="old('type', 'individual')" />
                    </div>

                    <!-- Individual Fields -->
                    <div class="individual-fields md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6 p-5 bg-blue-50/30 rounded-xl border border-blue-100">
                        <h3 class="text-sm font-bold text-[#001B4E] mb-2 md:col-span-2 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Thông Tin Cá Nhân
                        </h3>
                        <div>
                            <x-form.label>Họ và tên <span class="text-red-500">*</span></x-form.label>
                            <x-form.input name="name" :value="old('name')" placeholder="VD: Nguyễn Văn A" />
                        </div>
                        <div>
                            <x-form.label>Số điện thoại</x-form.label>
                            <x-form.input name="phone" :value="old('phone')" placeholder="VD: 0912345678" />
                        </div>
                        <div class="md:col-span-2">
                            <x-form.label>CCCD / Ngày cấp / Nơi cấp</x-form.label>
                            <x-form.input name="id_card_details" :value="old('id_card_details')" placeholder="VD: 079201012345 - 01/01/2021 - Cục CS QLHC..." />
                        </div>
                        <div class="md:col-span-2">
                            <x-form.label>Email</x-form.label>
                            <x-form.input type="email" name="email" :value="old('email')" placeholder="VD: email@example.com" />
                        </div>
                        <div class="md:col-span-2">
                            <x-form.label>Địa chỉ</x-form.label>
                            <x-form.input name="address" :value="old('address')" placeholder="Nhập địa chỉ" />
                        </div>
                    </div>

                    <!-- Company Fields -->
                    <div class="company-fields md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6 p-5 bg-blue-50/30 rounded-xl border border-blue-100" style="display: none;">
                        <h3 class="text-sm font-bold text-[#001B4E] mb-2 md:col-span-2 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Thông Tin Công Ty
                        </h3>
                        <div>
                            <x-form.label>Tên Công ty <span class="text-red-500">*</span></x-form.label>
                            <x-form.input name="name" :value="old('name')" placeholder="VD: Công ty TNHH ABC" />
                        </div>
                        <div>
                            <x-form.label>Mã số thuế</x-form.label>
                            <x-form.input name="tax_code" :value="old('tax_code')" placeholder="VD: 0101234567" />
                        </div>
                        <div class="md:col-span-2">
                            <x-form.label>Địa chỉ</x-form.label>
                            <x-form.input name="address" :value="old('address')" placeholder="Nhập địa chỉ công ty" />
                        </div>
                        <div>
                            <x-form.label>Số điện thoại</x-form.label>
                            <x-form.input name="phone" :value="old('phone')" placeholder="VD: 0912345678" />
                        </div>
                        <div>
                            <x-form.label>Email</x-form.label>
                            <x-form.input type="email" name="email" :value="old('email')" placeholder="VD: email@example.com" />
                        </div>
                        <div>
                            <x-form.label>Đại diện</x-form.label>
                            <x-form.input name="representative_name" :value="old('representative_name')" placeholder="Người đại diện pháp luật" />
                        </div>
                        <div>
                            <x-form.label>Chức vụ</x-form.label>
                            <x-form.input name="representative_title" :value="old('representative_title')" placeholder="VD: Giám đốc" />
                        </div>
                        <div>
                            <x-form.label>SĐT Cá nhân (Đại diện)</x-form.label>
                            <x-form.input name="representative_phone" :value="old('representative_phone')" placeholder="VD: 0912345678" />
                        </div>
                        <div>
                            <x-form.label>CCCD / Ngày cấp / Nơi cấp</x-form.label>
                            <x-form.input name="id_card_details" :value="old('id_card_details')" placeholder="VD: 079201012345 - 01/01/2021..." />
                        </div>
                    </div>
                </div>

                <div>
                    <x-form.label>Ghi chú</x-form.label>
                    <x-form.textarea name="note" :value="old('note')" rows="3" placeholder="Ghi chú thêm về khách hàng..." />
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('superadmin.customers.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Hủy</a>
                <button type="submit" class="px-6 py-2 bg-[#001B4E] text-white rounded-lg hover:bg-[#002D80] transition-colors shadow-sm font-medium">Lưu Khách hàng</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.querySelector('select[name="type"]');
    const companyFields = document.querySelector('.company-fields');
    const individualFields = document.querySelector('.individual-fields');
    
    // Inputs
    const companyInputs = companyFields.querySelectorAll('input, select, textarea');
    const individualInputs = individualFields.querySelectorAll('input, select, textarea');
    
    function toggleFields() {
        if (typeSelect.value === 'company') {
            companyFields.style.display = 'grid';
            individualFields.style.display = 'none';
            
            // Toggle required and disabled states
            companyInputs.forEach(el => el.disabled = false);
            individualInputs.forEach(el => el.disabled = true);
        } else {
            companyFields.style.display = 'none';
            individualFields.style.display = 'grid';
            
            companyInputs.forEach(el => el.disabled = true);
            individualInputs.forEach(el => el.disabled = false);
        }
    }
    
    typeSelect.addEventListener('change', toggleFields);
    toggleFields(); // Initial run
});
</script>
@endsection
