@extends('superadmin.layouts.app')

@section('title', 'Cập nhật Khách hàng | Super Admin')
@section('page-title', 'Cập nhật Khách hàng')

@section('content')
<div class="px-6 py-8 w-full max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-bold text-[#001B4E]">Cập nhật Khách hàng #{{ $customer->id }}</h1>
        <a href="{{ route('superadmin.customers.index') }}" class="text-gray-500 hover:text-[#001B4E] inline-flex items-center transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Quay lại
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('superadmin.customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-form.label>Loại khách hàng</x-form.label>
                        <x-form.select name="type" :options="['individual' => 'Cá nhân', 'company' => 'Doanh nghiệp']" :value="old('type', $customer->type)" />
                    </div>

                    <div>
                        <x-form.label>Tên Khách hàng / Công ty <span class="text-red-500">*</span></x-form.label>
                        <x-form.input name="name" :value="old('name', $customer->name)" required="true" placeholder="VD: Nguyễn Văn A hoặc Công ty TNHH ABC" />
                    </div>

                    <div>
                        <x-form.label>Số điện thoại</x-form.label>
                        <x-form.input name="phone" :value="old('phone', $customer->phone)" placeholder="VD: 0912345678" />
                    </div>

                    <div>
                        <x-form.label>Email</x-form.label>
                        <x-form.input type="email" name="email" :value="old('email', $customer->email)" placeholder="VD: email@example.com" />
                    </div>

                    <div class="md:col-span-2">
                        <x-form.label>Địa chỉ</x-form.label>
                        <x-form.input name="address" :value="old('address', $customer->address)" placeholder="Nhập địa chỉ" />
                    </div>

                    <div class="md:col-span-2 company-fields bg-blue-50/30 p-5 rounded-xl border border-blue-100">
                        <h3 class="text-sm font-bold text-[#001B4E] mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Thông tin Pháp lý & Đại diện
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-form.label>Người đại diện</x-form.label>
                                <x-form.input name="representative_name" :value="old('representative_name', $customer->representative_name)" placeholder="Người đại diện pháp luật" />
                            </div>
                            
                            <div>
                                <x-form.label>Chức vụ</x-form.label>
                                <x-form.input name="representative_title" :value="old('representative_title', $customer->representative_title)" placeholder="VD: Giám đốc" />
                            </div>

                            <div class="md:col-span-2">
                                <x-form.label>Mã số thuế</x-form.label>
                                <x-form.input name="tax_code" :value="old('tax_code', $customer->tax_code)" placeholder="VD: 0101234567" />
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <x-form.label>Ghi chú</x-form.label>
                    <x-form.textarea name="note" :value="old('note', $customer->note)" rows="3" placeholder="Ghi chú thêm về khách hàng..." />
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
    const companyFields = document.querySelectorAll('.company-fields');
    
    function toggleFields() {
        if (typeSelect.value === 'company') {
            companyFields.forEach(el => el.style.display = 'block');
        } else {
            companyFields.forEach(el => el.style.display = 'none');
        }
    }
    
    typeSelect.addEventListener('change', toggleFields);
    toggleFields(); // Initial run
});
</script>
@endsection
