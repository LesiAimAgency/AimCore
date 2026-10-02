@extends('themes.ehenho.layouts.account')

@section('title', 'Thư đã gửi - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold; display: flex; justify-content: space-between; align-items: center;">
    <span><i class="fa fa-paper-plane"></i> Thư Đã Gửi ({{ $messages->total() }})</span>
    <a href="{{ route('ehenho.messages.inbox') }}" class="btn btn-xs btn-default">
      <i class="fa fa-inbox"></i> Quay lại hộp thư đến
    </a>
  </div>

  <div class="panel-body" style="padding: 15px;">
    @forelse($messages as $msg)
      @php
        $recipientProfile = $msg->recipient?->profile;
        $recipientAvatar = $recipientProfile?->avatar_url ? asset($recipientProfile->avatar_url) : asset('themes/ehenho/images/df_picture.png');
      @endphp
      <div style="padding: 12px; border-bottom: 1px solid #eee; background-color: #fff; border-radius: 4px; margin-bottom: 6px;">
        <div class="row" style="display: flex; align-items: center;">
          <div class="col-xs-2 col-sm-1 text-center" style="padding: 0 5px;">
            <a href="{{ route('ehenho.profile.show', $recipientProfile?->slug ?: $recipientProfile?->id ?: $msg->recipient_id) }}">
              <img src="{{ $recipientAvatar }}" alt="" class="img-circle" style="width: 45px; height: 45px; object-fit: cover;">
            </a>
          </div>

          <div class="col-xs-7 col-sm-8">
            <div>
              <span class="text-muted" style="font-size: 13px;">Gửi đến:</span>
              <a href="{{ route('ehenho.profile.show', $recipientProfile?->slug ?: $recipientProfile?->id ?: $msg->recipient_id) }}" style="font-weight: bold; color: #008BC7; font-size: 14px;">
                {{ $recipientProfile?->display_name ?: ($msg->recipient?->name ?: 'Thành viên eHenho') }}
              </a>
              <span class="text-muted" style="font-size: 12px; margin-left: 10px;">
                {{ $msg->created_at?->diffForHumans() }}
              </span>
              @if($msg->is_read)
                <span class="label label-info" style="font-size: 10px; margin-left: 5px;">Đã đọc</span>
              @else
                <span class="label label-default" style="font-size: 10px; margin-left: 5px;">Chưa đọc</span>
              @endif
            </div>

            <div style="margin-top: 4px;">
              <a href="{{ route('ehenho.messages.show', $msg->conversation_id ?: $msg->id) }}" style="color: #333; text-decoration: none;">
                <span style="color: #2e5d69;">{{ $msg->subject ?: 'Tin nhắn hẹn hò' }}:</span>
                {{ \Illuminate\Support\Str::limit($msg->body, 90) }}
              </a>
            </div>
          </div>

          <div class="col-xs-3 col-sm-3 text-right">
            <a href="{{ route('ehenho.messages.show', $msg->conversation_id ?: $msg->id) }}" class="btn btn-sm btn-default">
              <i class="fa fa-eye"></i> Xem lại
            </a>
            <form action="{{ route('ehenho.messages.destroy', $msg->id) }}" method="POST" style="display: inline-block; margin-left: 4px;" onsubmit="return confirm('Bạn có chắc muốn xóa tin nhắn này?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-default" title="Xóa">
                <i class="fa fa-trash text-danger"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="text-center" style="padding: 50px 20px;">
        <i class="fa fa-paper-plane-o" style="font-size: 4em; color: #ccc; margin-bottom: 15px;"></i>
        <h4 style="color: #777;">Bạn chưa gửi tin nhắn nào</h4>
        <p class="text-muted">Chủ động làm quen bằng cách gửi tin nhắn cho những hồ sơ bạn yêu thích nhé.</p>
        <a href="{{ route('ehenho.search.index') }}" class="btn btn-success btn-sc-cus" style="margin-top: 10px;">
          <i class="fa fa-search"></i> Tìm bạn làm quen ngay
        </a>
      </div>
    @endforelse

    <div class="text-center" style="margin-top: 20px;">
      {{ $messages->links('themes.ehenho.components.pagination') }}
    </div>
  </div>
</div>
@endsection
