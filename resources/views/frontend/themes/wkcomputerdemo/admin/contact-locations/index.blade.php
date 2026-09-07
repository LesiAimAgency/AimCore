@extends('admin.layouts.app')
@section('title', 'Quản lý địa điểm liên hệ')
@section('page-title', 'Địa điểm liên hệ')
@section('page-subtitle', 'Quản lý thông tin các cửa hàng, chi nhánh, văn phòng')

@section('page-actions')
<a href="{{ route('admin.contact-locations.create') }}" class="btn btn-primary">
    <i class="fa-solid fa-plus"></i> Thêm địa điểm
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if($locations->isEmpty())
            <div class="text-center py-5">
                <i class="fa-solid fa-map-location-dot" style="font-size: 48px; color: #ddd; margin-bottom: 20px;"></i>
                <h5 style="color: #666; margin-bottom: 10px;">Chưa có địa điểm nào</h5>
                <p style="color: #999; font-size: 14px;">Thêm địa điểm đầu tiên để khách hàng có thể liên hệ</p>
                <a href="{{ route('admin.contact-locations.create') }}" class="btn btn-primary mt-3">
                    <i class="fa-solid fa-plus"></i> Thêm địa điểm đầu tiên
                </a>
            </div>
        @else
            <div class="tbl-wrap">
                <table style="width:100%;border-collapse:collapse;">
                    <thead class="tbl-head">
                        <tr>
                            <th class="tbl-th">Tên địa điểm</th>
                            <th class="tbl-th">Loại</th>
                            <th class="tbl-th">Địa chỉ</th>
                            <th class="tbl-th">Liên hệ</th>
                            <th class="tbl-th">Trạng thái</th>
                            <th class="tbl-th">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $location)
                        <tr class="tbl-tr">
                            <td class="tbl-td">
                                <div class="flex items-center gap-3">
                                    @if($location->image)
                                        <img src="{{ asset($location->image) }}" alt="{{ $location->name }}" 
                                             class="w-10 h-10 rounded object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded bg-gray-100 flex items-center justify-center">
                                            <i class="fa-solid fa-store text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold">{{ $location->name }}</div>
                                        @if($location->is_primary)
                                            <span class="badge badge-blue">Chính</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="tbl-td">
                                <span class="badge badge-gray">{{ $location->type_name }}</span>
                            </td>
                            <td class="tbl-td">
                                <div class="text-sm">{{ Str::limit($location->address, 50) }}</div>
                            </td>
                            <td class="tbl-td">
                                <div class="text-sm">
                                    @if($location->phone)
                                        <div><i class="fa-solid fa-phone text-xs mr-1"></i> {{ $location->phone }}</div>
                                    @endif
                                    @if($location->email)
                                        <div><i class="fa-solid fa-envelope text-xs mr-1"></i> {{ $location->email }}</div>
                                    @endif
                                </div>
                            </td>
                            <td class="tbl-td">
                                @if($location->is_active)
                                    <span class="badge badge-green">Hoạt động</span>
                                @else
                                    <span class="badge badge-red">Tạm dừng</span>
                                @endif
                            </td>
                            <td class="tbl-td">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.contact-locations.show', $location) }}" class="act-btn view">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.contact-locations.edit', $location) }}" class="act-btn edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.contact-locations.destroy', $location) }}" method="POST" 
                                          onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm này?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="act-btn del">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection