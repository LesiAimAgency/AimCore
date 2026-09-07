@extends('admin.layouts.app')

@section('title', 'Sửa Dịch vụ')
@section('page-title', 'Sửa Dịch vụ')
@section('page-subtitle', $serviceCategory->name)

@section('page-actions')
<a href="{{ locale_route('admin.service-categories.index') }}" class="btn btn-ghost btn-sm">
    <i class="fa-solid fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<form action="{{ locale_route('admin.service-categories.update', $serviceCategory) }}" method="POST" style="display:flex;flex-direction:column;gap:16px;">
    @csrf
    @method('PUT')
    @include('admin.service-categories._form')
    <div style="display:flex;justify-content:flex-end;gap:10px;">
        <a href="{{ locale_route('admin.service-categories.index') }}" class="btn btn-secondary">Hủy</a>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi</button>
    </div>
</form>
@endsection
