@extends('superadmin.layouts.app')

@section('title', 'Quản lý Khách hàng | Super Admin')
@section('page-title', 'Khách hàng')

@section('content')
<div class="px-6 py-8 w-full max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-[#001B4E]">Danh sách Khách hàng</h1>
            <p class="text-gray-500 mt-1">Quản lý thông tin cá nhân và doanh nghiệp</p>
        </div>
        <div>
            <a href="{{ route('superadmin.customers.create') }}" class="px-6 py-3 bg-[#001B4E] text-white rounded-lg hover:bg-[#002D80] font-medium inline-flex items-center transition-colors shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Thêm Khách hàng mới
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
        <form action="{{ route('superadmin.customers.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên, email, sđt, mst..." class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50">
            </div>
            <div class="flex-1">
                <select name="type" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50">
                    <option value="">-- Phân loại --</option>
                    <option value="individual" {{ request('type') == 'individual' ? 'selected' : '' }}>Cá nhân</option>
                    <option value="company" {{ request('type') == 'company' ? 'selected' : '' }}>Doanh nghiệp</option>
                </select>
            </div>
            <div>
                <button type="submit" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium">Lọc</button>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">ID</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">Tên / Phân loại</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">Thông tin liên hệ</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($customers as $customer)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $customer->id }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-[#001B4E]">{{ $customer->name }}</div>
                            <div class="text-xs mt-1 {{ $customer->type === 'company' ? 'text-blue-600 font-semibold' : 'text-gray-500' }}">
                                {{ $customer->type === 'company' ? 'Doanh nghiệp' : 'Cá nhân' }}
                            </div>
                            @if($customer->type === 'company' && $customer->tax_code)
                            <div class="text-xs text-gray-600 mt-1">MST: {{ $customer->tax_code }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex items-center text-gray-600 mb-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                @if($customer->phone)
                                    <a href="tel:{{ $customer->phone }}" class="hover:text-blue-600 hover:underline">{{ $customer->phone }}</a>
                                @else
                                    Chưa cập nhật
                                @endif
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                @if($customer->email)
                                    <a href="mailto:{{ $customer->email }}" class="hover:text-blue-600 hover:underline">{{ $customer->email }}</a>
                                @else
                                    Chưa cập nhật
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('superadmin.customers.edit', $customer) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Chỉnh sửa">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                <form action="{{ route('superadmin.customers.destroy', $customer) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Xóa">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            Chưa có dữ liệu khách hàng nào.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($customers->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $customers->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
