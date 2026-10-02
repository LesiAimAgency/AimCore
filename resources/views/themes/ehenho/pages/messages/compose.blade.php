@extends('themes.ehenho.layouts.account')

@section('title', 'Soạn tin nhắn cho ' . ($recipient->profile?->display_name ?: $recipient->name) . ' - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold;">
    <i class="fa fa-envelope"></i> Gửi Tin Nhắn Làm Quen
  </div>

  <div class="panel-body" style="padding: 25px;">
    @php
      $recipientProfile = $recipient->profile;
      $avatar = $recipientProfile?->avatar_url ? asset($recipientProfile->avatar_url) : asset('themes/ehenho/images/df_picture.png');
    @endphp

    <div class="well well-sm" style="background-color: #f9fbfd; border-color: #d8e5f2; display: flex; align-items: center; margin-bottom: 20px;">
      <img src="{{ $avatar }}" class="img-circle" style="width: 50px; height: 50px; object-fit: cover; margin-right: 15px;">
      <div>
        <h4 style="margin: 0 0 4px 0; color: #008BC7; font-weight: bold;">
          {{ $recipientProfile?->display_name ?: $recipient->name }}
        </h4>
        <span class="text-muted" style="font-size: 13px;">
          {{ $recipientProfile?->age ? $recipientProfile->age . ' tuổi' : '' }}
          {{ $recipientProfile?->province_name ? '• ' . $recipientProfile->province_name : '' }}
          {{ $recipientProfile?->marital_status ? '• ' . $recipientProfile->marital_status : '' }}
        </span>
      </div>
    </div>

    <form action="{{ route('ehenho.messages.store') }}" method="POST">
      @csrf
      <input type="hidden" name="recipient_id" value="{{ $recipient->id }}">

      <div class="form-group">
        <label for="subject">Tiêu đề tin nhắn:</label>
        <input type="text" name="subject" id="subject" class="form-control" placeholder="Ví dụ: Chào bạn, mình muốn làm quen..." value="{{ old('subject', 'Chào bạn, mình muốn làm quen!') }}">
      </div>

      <div class="form-group">
        <label for="body">Nội dung tin nhắn: <span class="text-danger">*</span></label>
        <textarea name="body" id="body" class="form-control" rows="6" placeholder="Viết vài dòng giới thiệu bản thân một cách lịch sự, chân thành..." required>{{ old('body') }}</textarea>
      </div>

      <div class="alert alert-info" style="font-size: 13px;">
        <i class="fa fa-lightbulb-o"></i> <strong>Gợi ý:</strong> Một lời chào hỏi lịch sự, nhắc đến điểm chung trong sở thích hoặc quan điểm sống sẽ giúp bạn nhận được phản hồi nhanh hơn gấp 3 lần!
      </div>

      <div style="margin-top: 25px;">
        <button type="submit" class="btn btn-success btn-lg btn-sc-cus">
          <i class="fa fa-paper-plane"></i> Gửi Tin Nhắn Ngay
        </button>
        <a href="{{ route('ehenho.profile.show', $recipientProfile?->slug ?: $recipientProfile?->id ?: $recipient->id) }}" class="btn btn-default btn-lg" style="margin-left: 10px;">
          Quay lại hồ sơ
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
