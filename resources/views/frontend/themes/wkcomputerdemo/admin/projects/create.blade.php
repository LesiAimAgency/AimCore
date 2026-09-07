@extends('admin.layouts.app')

@section('title', 'Thêm Dự án mới')
@section('page-title', 'Thêm Dự án mới')
@section('page-subtitle', 'Thêm thông tin dự án hiển thị trên trang')

@section('page-actions')
<a href="{{ route('admin.projects.index') }}" class="btn btn-ghost btn-sm">
    <i class="fa-solid fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<form action="{{ route('admin.projects.store') }}" method="POST" style="display:flex;flex-direction:column;gap:16px;">
    @csrf
    @include('admin.projects._form')
    <div style="display:flex;justify-content:flex-end;gap:10px;">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Hủy</a>
        <button type="submit" class="btn btn-primary" @disabled($serviceCategories->isEmpty())>
            <i class="fa-solid fa-floppy-disk"></i> Lưu
        </button>
    </div>
</form>
@endsection
