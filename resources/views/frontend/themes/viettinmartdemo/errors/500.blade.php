@extends('errors.layout')

@section('title', __('common.error') . ' máy chủ')
@section('code', '500')
@section('color-start', '#ef4444')
@section('color-end', '#991b1b')
@section('message')
    Đã có lỗi xảy ra từ phía hệ thống. <br>
    Đội ngũ kỹ thuật {{ __('common.of') }} chúng tôi đã được thông báo và đang xử lý.
@endsection
