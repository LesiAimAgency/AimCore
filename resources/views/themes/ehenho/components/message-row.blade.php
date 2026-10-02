@props(['message', 'type' => 'inbox'])

@php
  $otherUser = ($type === 'inbox') ? $message->sender : $message->recipient;
  $otherName = $otherUser?->name ?: ($otherUser?->email ?: 'Thành viên eHenho');
  $otherAvatar = $otherUser?->profile?->avatar_url ?: asset('themes/ehenho/images/df_picture.png');
@endphp

<tr style="background: {{ $message->is_read ? '#fff' : '#f9f9f9' }}; font-weight: {{ $message->is_read ? 'normal' : 'bold' }};">
  <td class="text-center ml-td" style="border-right:none; vertical-align: middle;">
    <a class="list-star ml-line" style="color: {{ $message->is_read ? '#ccc' : '#f0ad4e' }}; cursor:pointer;" title="Đánh dấu">
      <i aria-hidden="true" class="fa {{ $message->is_read ? 'fa-star-o' : 'fa-star' }}" style="font-size:1.2em;"></i>
    </a>
  </td>
  <td class="ml-td" nowrap="nowrap" style="border-left:none; border-right:none; width: 90px;">
    <a class="ml-mlink" href="{{ route('ehenho.messages.show', $message->conversation_id ?: $message->id) }}" style="text-decoration:none; display:block; padding:5px;">
      <div class="thumbnail" style="width:70px; height:70px; margin: 0 auto; overflow: hidden;">
        <img class="img-responsive center-block" src="{{ $otherAvatar }}" style="width:100%; height:100%; object-fit: cover;" alt="{{ $otherName }}" />
      </div>
    </a>
  </td>
  <td class="ml-td" style="border-left:none; border-right:none; padding-left:12px; vertical-align: middle;">
    <a class="ml-mlink" href="{{ route('ehenho.messages.show', $message->conversation_id ?: $message->id) }}" style="text-decoration:none; color:#275d8b; display:block;">
      <span style="color:#333; font-size: 1.05em; font-weight: bold;">
        {{ $otherName }}
      </span>
      <span style="font-size:0.85em; color:#777; margin-left: 8px;">
        {{ $message->created_at?->format('H:i d/m/Y') }}
      </span>
      <br />
      <span style="display:inline-block; margin-top:4px; color:#545454; font-size: 0.95em;">
        @if($message->subject)
          <strong>{{ $message->subject }}:</strong>
        @endif
        {{ Str::limit($message->body, 80) }}
      </span>
    </a>
  </td>
  <td class="text-right" style="vertical-align: middle; border-left:none; border-right:none; width: 120px;">
    <span style="font-size:85%; color:#808080">
      {{ $message->created_at?->diffForHumans() }}
    </span>
  </td>
  <td class="text-center ml-td" style="background:#f2f2f2; vertical-align: middle; width: 35px;">
    <form action="{{ route('ehenho.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tin nhắn này?');" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-link btn-xs" style="color: grey;" title="Xóa">
        <i aria-hidden="true" class="fa fa-times" style="font-size:1.2em;"></i>
      </button>
    </form>
  </td>
</tr>
