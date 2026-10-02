@extends('themes.ehenho.layouts.account')

@section('title', 'Hội thoại với ' . ($partner?->profile?->display_name ?: ($partner?->name ?: 'Thành viên')) . ' - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <!-- Partner Header -->
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold; display: flex; justify-content: space-between; align-items: center;">
    @php
      $partnerProfile = $partner?->profile;
      $partnerAvatar = $partnerProfile?->avatar_url ? asset($partnerProfile->avatar_url) : asset('themes/ehenho/images/df_picture.png');
    @endphp
    <div style="display: flex; align-items: center;">
      <a href="{{ route('ehenho.profile.show', $partnerProfile?->slug ?: $partnerProfile?->id ?: ($partner?->id ?? 1)) }}">
        <img src="{{ $partnerAvatar }}" alt="" class="img-circle" style="width: 38px; height: 38px; object-fit: cover; margin-right: 10px;">
      </a>
      <div>
        <a href="{{ route('ehenho.profile.show', $partnerProfile?->slug ?: $partnerProfile?->id ?: ($partner?->id ?? 1)) }}" style="color: #008BC7; font-size: 15px;">
          {{ $partnerProfile?->display_name ?: ($partner?->name ?: 'Thành viên eHenho') }}
        </a>
        <small class="text-muted" style="display: block; font-size: 11px;">
          {{ $partnerProfile?->age ? $partnerProfile->age . ' tuổi' : '' }} {{ $partnerProfile?->province_name ? '• ' . $partnerProfile->province_name : '' }}
        </small>
      </div>
    </div>

    <div>
      <a href="{{ route('ehenho.messages.inbox') }}" class="btn btn-default btn-xs">
        <i class="fa fa-arrow-left"></i> Trở về hộp thư
      </a>
    </div>
  </div>

  <div class="panel-body" style="padding: 20px;">
    <!-- Message Thread Stream -->
    <div class="message-stream" style="max-height: 480px; overflow-y: auto; padding: 10px; margin-bottom: 20px; background-color: #fcfcfc; border: 1px solid #f0f0f0; border-radius: 6px;">
      @foreach($messages as $msg)
        @php
          $isMine = ($msg->sender_id === auth()->id());
          $senderProfile = $msg->sender?->profile;
          $avatar = $senderProfile?->avatar_url ? asset($senderProfile->avatar_url) : asset('themes/ehenho/images/df_picture.png');
        @endphp

        <div style="margin-bottom: 18px; display: flex; {{ $isMine ? 'justify-content: flex-end;' : 'justify-content: flex-start;' }}">
          @if(!$isMine)
            <img src="{{ $avatar }}" class="img-circle" style="width: 36px; height: 36px; object-fit: cover; margin-right: 10px; align-self: flex-end;">
          @endif

          <div style="max-width: 75%; background-color: {{ $isMine ? '#dcf8c6' : '#fff' }}; border: 1px solid {{ $isMine ? '#c7e8b0' : '#e5e5e5' }}; border-radius: 8px; padding: 10px 14px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
            @if($msg->subject && $msg->subject !== 'Tin nhắn từ eHenho')
              <div style="font-weight: bold; font-size: 12px; color: #2e5d69; margin-bottom: 4px;">
                {{ $msg->subject }}
              </div>
            @endif
            <div style="font-size: 14px; line-height: 1.6em; color: #333; white-space: pre-line;">{{ $msg->body }}</div>
            <div style="font-size: 11px; color: #888; text-align: right; margin-top: 4px;">
              {{ $msg->created_at?->format('H:i d/m/Y') }}
              @if($isMine)
                <i class="fa {{ $msg->is_read ? 'fa-check-circle text-primary' : 'fa-check text-muted' }}"></i>
              @endif
            </div>
          </div>

          @if($isMine)
            <img src="{{ auth()->user()->profile?->avatar_url ? asset(auth()->user()->profile->avatar_url) : asset('themes/ehenho/images/df_picture.png') }}" class="img-circle" style="width: 36px; height: 36px; object-fit: cover; margin-left: 10px; align-self: flex-end;">
          @endif
        </div>
      @endforeach
    </div>

    <!-- Quick Reply Form -->
    <form action="{{ route('ehenho.messages.store') }}" method="POST">
      @csrf
      <input type="hidden" name="recipient_id" value="{{ $partner?->id }}">
      <input type="hidden" name="subject" value="Trả lời tin nhắn">

      <div class="form-group" style="margin-bottom: 10px;">
        <textarea name="body" class="form-control" rows="3" placeholder="Nhập nội dung trả lời cho {{ $partnerProfile?->display_name ?: ($partner?->name ?: 'bạn này') }}..." required style="resize: vertical;"></textarea>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-success btn-lg btn-sc-cus">
          <i class="fa fa-paper-plane"></i> Gửi Tin Nhắn
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
