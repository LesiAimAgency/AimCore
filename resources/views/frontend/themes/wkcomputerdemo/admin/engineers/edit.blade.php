@extends('admin.layouts.app')

@section('title', 'Sửa thông tin')
@section('page-title', 'Sửa thông tin')
@section('page-subtitle', $engineer->name)

@section('page-actions')
<a href="{{ route('admin.engineers.index') }}" class="btn btn-ghost btn-sm">
    <i class="fa-solid fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<form action="{{ route('admin.engineers.update', $engineer) }}" method="POST" style="display:flex;flex-direction:column;gap:16px;">
    @csrf
    @method('PUT')
    @include('admin.engineers._form')
    <div style="display:flex;justify-content:flex-end;gap:10px;">
        <a href="{{ route('admin.engineers.index') }}" class="btn btn-secondary">Hủy</a>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi</button>
    </div>
</form>
@endsection
