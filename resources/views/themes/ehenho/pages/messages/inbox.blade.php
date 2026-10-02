@extends('themes.ehenho.layouts.account')

@section('title', 'Tin nhắn - eHenho.com')

@section('account_content')
<style>
  .zalo-container {
    background: #fff;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    overflow: hidden;
    height: 640px;
    display: flex;
  }
  .zalo-sidebar {
    width: 310px;
    border-right: 1px solid #e5e7eb;
    display: flex;
    flex-direction: column;
    background: #fafbfc;
    flex-shrink: 0;
  }
  .zalo-search-box {
    padding: 12px 14px;
    border-bottom: 1px solid #e5e7eb;
    background: #fff;
    position: relative;
  }
  .zalo-search-box input {
    width: 100%;
    padding: 7px 12px 7px 32px;
    border-radius: 20px;
    border: 1px solid #e2e8f0;
    font-size: 13px;
    background: #f8fafc;
    outline: none;
    transition: all 0.2s;
  }
  .zalo-search-box input:focus {
    background: #fff;
    border-color: #008BC7;
    box-shadow: 0 0 0 2px rgba(0,139,199,0.15);
  }
  .zalo-search-icon {
    position: absolute;
    left: 24px;
    top: 20px;
    color: #94a3b8;
    font-size: 13px;
  }
  .zalo-conv-list {
    flex: 1;
    overflow-y: auto;
    list-style: none;
    margin: 0;
    padding: 0;
  }
  .zalo-conv-item {
    display: flex;
    align-items: center;
    padding: 12px 14px;
    border-bottom: 1px solid #f1f5f9;
    cursor: pointer;
    transition: background 0.15s;
    text-decoration: none;
    color: inherit;
    position: relative;
  }
  .zalo-conv-item:hover {
    background: #f1f5f9;
  }
  .zalo-conv-item.active {
    background: #eaf4fb;
    border-left: 4px solid #008BC7;
  }
  .zalo-avatar-wrap {
    position: relative;
    width: 46px;
    height: 46px;
    margin-right: 12px;
    flex-shrink: 0;
  }
  .zalo-avatar-img {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    object-fit: cover;
    border: 1px solid #e2e8f0;
  }
  .zalo-status-dot {
    position: absolute;
    bottom: 1px;
    right: 1px;
    width: 11px;
    height: 11px;
    background: #10b981;
    border: 2px solid #fff;
    border-radius: 50%;
  }
  .zalo-conv-info {
    flex: 1;
    min-width: 0;
  }
  .zalo-conv-top {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    margin-bottom: 3px;
  }
  .zalo-conv-name {
    font-weight: 600;
    font-size: 14px;
    color: #1e293b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .zalo-conv-time {
    font-size: 11px;
    color: #94a3b8;
    margin-left: 6px;
    flex-shrink: 0;
  }
  .zalo-conv-snippet {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .zalo-conv-text {
    font-size: 12px;
    color: #64748b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .zalo-conv-badge {
    background: #ef4444;
    color: #fff;
    font-size: 10px;
    font-weight: bold;
    border-radius: 10px;
    padding: 1px 6px;
    margin-left: 6px;
    flex-shrink: 0;
  }
  
  /* Chat Pane */
  .zalo-chat-pane {
    flex: 1;
    display: flex;
    flex-direction: column;
    background: #fff;
    min-width: 0;
  }
  .zalo-chat-header {
    height: 60px;
    padding: 8px 18px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #fff;
    flex-shrink: 0;
  }
  .zalo-chat-partner-info {
    display: flex;
    align-items: center;
  }
  .zalo-chat-partner-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 12px;
  }
  .zalo-chat-partner-name {
    font-weight: 700;
    font-size: 15px;
    color: #008BC7;
    margin-bottom: 1px;
    display: block;
    text-decoration: none;
  }
  .zalo-chat-partner-meta {
    font-size: 11px;
    color: #64748b;
  }
  
  /* Message Stream */
  .zalo-stream {
    flex: 1;
    overflow-y: auto;
    padding: 16px 20px;
    background: #f8fafc;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }
  .zalo-msg-row {
    display: flex;
    align-items: flex-end;
    gap: 8px;
    max-width: 80%;
  }
  .zalo-msg-row.incoming {
    align-self: flex-start;
  }
  .zalo-msg-row.outgoing {
    align-self: flex-end;
    flex-direction: row-reverse;
  }
  .zalo-msg-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
  }
  .zalo-msg-bubble {
    padding: 9px 14px;
    font-size: 13.5px;
    line-height: 1.5;
    position: relative;
    word-break: break-word;
    box-shadow: 0 1px 2px rgba(0,0,0,0.04);
  }
  .zalo-msg-row.incoming .zalo-msg-bubble {
    background: #ffffff;
    color: #1e293b;
    border: 1px solid #e2e8f0;
    border-radius: 14px 14px 14px 2px;
  }
  .zalo-msg-row.outgoing .zalo-msg-bubble {
    background: #e0f2fe;
    color: #034f75;
    border: 1px solid #bae6fd;
    border-radius: 14px 14px 2px 14px;
  }
  .zalo-msg-time {
    font-size: 10px;
    color: #94a3b8;
    margin-top: 3px;
    text-align: right;
  }
  .zalo-msg-row.outgoing .zalo-msg-time {
    color: #0284c7;
  }

  /* Chat Input Area */
  .zalo-input-area {
    padding: 12px 16px;
    border-top: 1px solid #e5e7eb;
    background: #fff;
    flex-shrink: 0;
  }
  .zalo-input-form {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .zalo-textarea {
    flex: 1;
    height: 42px;
    border-radius: 22px;
    border: 1px solid #cbd5e1;
    padding: 10px 16px;
    font-size: 13.5px;
    resize: none;
    outline: none;
    background: #f8fafc;
    transition: all 0.2s;
  }
  .zalo-textarea:focus {
    background: #fff;
    border-color: #008BC7;
    box-shadow: 0 0 0 2px rgba(0,139,199,0.12);
  }
  .zalo-send-btn {
    height: 42px;
    padding: 0 20px;
    border-radius: 22px;
    background: #008BC7;
    color: #fff;
    border: none;
    font-weight: 600;
    font-size: 13.5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: background 0.15s;
    flex-shrink: 0;
  }
  .zalo-send-btn:hover {
    background: #0077aa;
  }
  .zalo-input-hint {
    font-size: 11px;
    color: #94a3b8;
    margin-top: 5px;
    padding-left: 6px;
  }

  /* Empty state */
  .zalo-empty-chat {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #94a3b8;
    padding: 40px;
    text-align: center;
  }

  @media (max-width: 768px) {
    .zalo-container {
      flex-direction: column;
      height: 700px;
    }
    .zalo-sidebar {
      width: 100%;
      height: 220px;
      border-right: none;
      border-bottom: 1px solid #e5e7eb;
    }
  }
</style>

<div class="zalo-container">
  <!-- Left Column: Conversations List -->
  <div class="zalo-sidebar">
    <div class="zalo-search-box">
      <i class="fa fa-search zalo-search-icon"></i>
      <input type="text" id="convSearchInput" placeholder="Tìm kiếm cuộc trò chuyện...">
    </div>

    <div class="zalo-conv-list" id="convListContainer">
      @forelse($conversations as $conv)
        @php
          $p = $conv->partner;
          $prof = $conv->partner_profile;
          $isActive = ($activeConversation && $activeConversation->id === $conv->id);
          $lastMsg = $conv->last_message;
          $isLastFromMe = ($lastMsg && $lastMsg->sender_id === auth()->id());
        @endphp
        <div class="zalo-conv-item {{ $isActive ? 'active' : '' }}" 
             data-conv-id="{{ $conv->id }}"
             data-partner-id="{{ $p?->id }}"
             data-partner-name="{{ strtolower($prof?->display_name ?: ($p?->name ?: '')) }}">
          <div class="zalo-avatar-wrap">
            <img src="{{ $conv->partner_avatar }}" alt="" class="zalo-avatar-img">
            <span class="zalo-status-dot"></span>
          </div>
          <div class="zalo-conv-info">
            <div class="zalo-conv-top">
              <span class="zalo-conv-name">
                {{ $prof?->display_name ?: ($p?->name ?: 'Thành viên eHenho') }}
              </span>
              <span class="zalo-conv-time" id="convTime-{{ $conv->id }}">
                {{ $lastMsg?->created_at?->diffForHumans(null, true) ?: '' }}
              </span>
            </div>
            <div class="zalo-conv-snippet">
              <span class="zalo-conv-text" id="convSnippet-{{ $conv->id }}">
                @if($lastMsg)
                  @if($isLastFromMe)<strong style="color:#008BC7;">Bạn:</strong> @endif
                  {{ \Illuminate\Support\Str::limit($lastMsg->body, 32) }}
                @else
                  <em class="text-muted">Bắt đầu trò chuyện</em>
                @endif
              </span>
              <span class="zalo-conv-badge" id="convBadge-{{ $conv->id }}" style="{{ $conv->unread_count > 0 ? '' : 'display: none;' }}">
                {{ $conv->unread_count }}
              </span>
            </div>
          </div>
        </div>
      @empty
        <div style="padding: 40px 15px; text-align: center; color: #94a3b8;">
          <i class="fa fa-comments-o" style="font-size: 2.5em; margin-bottom: 8px;"></i>
          <p style="font-size: 13px; margin: 0;">Chưa có cuộc trò chuyện nào.</p>
          <a href="{{ route('ehenho.search.index') }}" class="btn btn-xs btn-primary" style="margin-top: 10px; background-color: #008BC7; border-color: #0077aa;">
            Tìm bạn nhắn tin
          </a>
        </div>
      @endforelse
    </div>
  </div>

  <!-- Right Column: Active Chat Pane -->
  <div class="zalo-chat-pane">
    @if($activeConversation && $partner)
      @php
        $partnerProf = $partner->profile;
        $partnerAvatar = $partnerProf?->avatar_url ? asset($partnerProf->avatar_url) : asset('themes/ehenho/images/df_picture.png');
        $profileUrl = route('ehenho.profile.show', $partnerProf?->slug ?: ($partnerProf?->id ?: $partner->id));
      @endphp
      <!-- Chat Header -->
      <div class="zalo-chat-header" id="chatHeader">
        <div class="zalo-chat-partner-info">
          <a href="{{ $profileUrl }}" id="partnerProfileLink">
            <img src="{{ $partnerAvatar }}" alt="" class="zalo-chat-partner-avatar" id="partnerAvatarImg">
          </a>
          <div>
            <a href="{{ $profileUrl }}" class="zalo-chat-partner-name" id="partnerNameText">
              {{ $partnerProf?->display_name ?: ($partner->name ?: 'Thành viên eHenho') }}
            </a>
            <div class="zalo-chat-partner-meta" id="partnerMetaText">
              {{ $partnerProf?->age ? $partnerProf->age . ' tuổi' : '' }}
              {{ $partnerProf?->province_name ? '• ' . $partnerProf->province_name : '' }}
              • <span style="color: #10b981;"><i class="fa fa-circle" style="font-size: 8px;"></i> Đang trực tuyến</span>
            </div>
          </div>
        </div>

        <div>
          <a href="{{ $profileUrl }}" class="btn btn-sm btn-default" style="font-weight: 500; font-size: 12px; border-radius: 16px;">
            <i class="fa fa-user"></i> Xem hồ sơ
          </a>
        </div>
      </div>

      <!-- Message Stream -->
      <div class="zalo-stream" id="zaloMessageStream">
        @foreach($activeMessages as $msg)
          @php
            $isMine = ($msg->sender_id === auth()->id());
            $senderAvatar = $isMine 
              ? (auth()->user()->profile?->avatar_url ? asset(auth()->user()->profile->avatar_url) : asset('themes/ehenho/images/df_picture.png'))
              : $partnerAvatar;
          @endphp
          <div class="zalo-msg-row {{ $isMine ? 'outgoing' : 'incoming' }}" data-id="{{ $msg->id }}">
            @if(!$isMine)
              <img src="{{ $senderAvatar }}" alt="" class="zalo-msg-avatar">
            @endif
            <div>
              <div class="zalo-msg-bubble">
                {!! nl2br(e($msg->body)) !!}
              </div>
              <div class="zalo-msg-time">
                {{ $msg->created_at?->format('H:i') }}
                @if($isMine)
                  <i class="fa {{ $msg->is_read ? 'fa-check-circle text-primary' : 'fa-check' }}" style="margin-left: 3px;"></i>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Input Area -->
      <div class="zalo-input-area" id="zaloInputArea">
        <form id="zaloChatForm" class="zalo-input-form" autocomplete="off">
          @csrf
          <input type="hidden" id="chatPartnerId" value="{{ $partner->id }}">
          <input type="hidden" id="chatConvId" value="{{ $activeConversation->id }}">
          
          <textarea id="zaloMsgInput" class="zalo-textarea" placeholder="Nhập tin nhắn tới {{ $partnerProf?->display_name ?: $partner->name }}..." rows="1" required></textarea>
          
          <button type="submit" id="zaloSendBtn" class="zalo-send-btn">
            <i class="fa fa-paper-plane"></i> Gửi
          </button>
        </form>
        <div class="zalo-input-hint">
          <i class="fa fa-keyboard-o"></i> Nhấn <strong>Enter</strong> để gửi tin nhắn, <strong>Shift + Enter</strong> để xuống dòng.
        </div>
      </div>
    @else
      <div class="zalo-empty-chat" id="zaloEmptyState">
        <i class="fa fa-comments" style="font-size: 4em; color: #cbd5e1; margin-bottom: 12px;"></i>
        <h4 style="color: #475569; font-weight: 600;">Chào mừng bạn đến với mục Tin Nhắn</h4>
        <p style="max-width: 380px; font-size: 13.5px; color: #64748b;">
          Chọn một cuộc trò chuyện từ danh sách bên trái hoặc ghé thăm hồ sơ của bạn bè để bắt đầu trò chuyện kết đôi.
        </p>
        <a href="{{ route('ehenho.search.index') }}" class="btn btn-success btn-sc-cus" style="margin-top: 10px;">
          <i class="fa fa-search"></i> Khám phá thành viên hẹn hò
        </a>
      </div>
    @endif
  </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
  var currentConvId = {{ $activeConversation ? $activeConversation->id : 'null' }};
  var currentPartnerId = {{ $partner ? $partner->id : 'null' }};
  var lastMsgId = {{ $activeMessages->last()?->id ?? 0 }};
  var pollTimer = null;
  var isSending = false;

  // Auto scroll message stream to bottom
  function scrollToBottom(animate) {
    var stream = $('#zaloMessageStream');
    if (stream.length) {
      if (animate) {
        stream.animate({ scrollTop: stream[0].scrollHeight }, 200);
      } else {
        stream.scrollTop(stream[0].scrollHeight);
      }
    }
  }

  scrollToBottom(false);

  // Send message via AJAX
  $('#zaloChatForm').on('submit', function(e) {
    e.preventDefault();
    sendMessage();
  });

  // Handle Enter key (without Shift)
  $('#zaloMsgInput').on('keydown', function(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
      e.preventDefault();
      sendMessage();
    }
  });

  function sendMessage() {
    var body = $.trim($('#zaloMsgInput').val());
    if (!body || isSending || !currentPartnerId) {
      return;
    }

    isSending = true;
    var sendBtn = $('#zaloSendBtn');
    sendBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "{{ route('ehenho.messages.store') }}",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        recipient_id: currentPartnerId,
        body: body,
        subject: "Tin nhắn"
      },
      dataType: "json",
      success: function(res) {
        if (res.success && res.message) {
          var msg = res.message;
          lastMsgId = Math.max(lastMsgId, msg.id);

          // Append bubble to stream
          var html = '<div class="zalo-msg-row outgoing" data-id="' + msg.id + '">' +
                       '<div>' +
                         '<div class="zalo-msg-bubble">' + escapeHtml(msg.body).replace(/\n/g, '<br>') + '</div>' +
                         '<div class="zalo-msg-time">' + msg.time + ' <i class="fa fa-check" style="margin-left: 3px;"></i></div>' +
                       '</div>' +
                     '</div>';

          $('#zaloMessageStream').append(html);
          scrollToBottom(true);

          // Clear textarea & focus
          $('#zaloMsgInput').val('').focus();

          // Update left list snippet
          if (currentConvId) {
            $('#convSnippet-' + currentConvId).html('<strong style="color:#008BC7;">Bạn:</strong> ' + escapeHtml(msg.body.substring(0, 30)));
            $('#convTime-' + currentConvId).text(msg.created_at_human || 'Vừa xong');
            // Move this item to top of list
            var activeItem = $('.zalo-conv-item[data-conv-id="' + currentConvId + '"]');
            $('#convListContainer').prepend(activeItem);
          }
        }
      },
      error: function(xhr) {
        var err = xhr.responseJSON ? xhr.responseJSON.message : 'Lỗi gửi tin nhắn, vui lòng thử lại.';
        alert(err);
      },
      complete: function() {
        isSending = false;
        sendBtn.prop('disabled', false).html('<i class="fa fa-paper-plane"></i> Gửi');
      }
    });
  }

  // Real-time Polling for new messages
  function pollNewMessages() {
    if (!currentConvId) return;

    $.ajax({
      url: "{{ route('ehenho.messages.inbox') }}/hop-thu/" + currentConvId + "/poll",
      type: "GET",
      data: { last_id: lastMsgId },
      dataType: "json",
      success: function(res) {
        if (res.success && res.new_messages && res.new_messages.length > 0) {
          var hasNew = false;
          $.each(res.new_messages, function(i, msg) {
            if ($('.zalo-msg-row[data-id="' + msg.id + '"]').length === 0) {
              lastMsgId = Math.max(lastMsgId, msg.id);
              hasNew = true;

              var avatarUrl = $('#partnerAvatarImg').attr('src');
              var html = '';

              if (msg.is_mine) {
                html = '<div class="zalo-msg-row outgoing" data-id="' + msg.id + '">' +
                         '<div>' +
                           '<div class="zalo-msg-bubble">' + escapeHtml(msg.body).replace(/\n/g, '<br>') + '</div>' +
                           '<div class="zalo-msg-time">' + msg.time + ' <i class="fa fa-check" style="margin-left: 3px;"></i></div>' +
                         '</div>' +
                       '</div>';
              } else {
                html = '<div class="zalo-msg-row incoming" data-id="' + msg.id + '">' +
                         '<img src="' + avatarUrl + '" alt="" class="zalo-msg-avatar">' +
                         '<div>' +
                           '<div class="zalo-msg-bubble">' + escapeHtml(msg.body).replace(/\n/g, '<br>') + '</div>' +
                           '<div class="zalo-msg-time">' + msg.time + '</div>' +
                         '</div>' +
                       '</div>';

                // Update snippet on left panel
                $('#convSnippet-' + currentConvId).text(msg.body.substring(0, 32));
                $('#convTime-' + currentConvId).text(msg.created_at_human || 'Vừa xong');
                var activeItem = $('.zalo-conv-item[data-conv-id="' + currentConvId + '"]');
                $('#convListContainer').prepend(activeItem);
              }

              $('#zaloMessageStream').append(html);
            }
          });

          if (hasNew) {
            scrollToBottom(true);
          }
        }
      }
    });
  }

  // Start polling every 3 seconds
  pollTimer = setInterval(pollNewMessages, 3000);

  // Click on a conversation in the left list
  $(document).on('click', '.zalo-conv-item', function(e) {
    e.preventDefault();
    var convId = $(this).data('conv-id');
    if (convId === currentConvId) return;

    $('.zalo-conv-item').removeClass('active');
    $(this).addClass('active');

    // Hide badge
    $('#convBadge-' + convId).hide();

    // Show loading skeleton
    $('#zaloMessageStream').html('<div style="text-align:center; padding: 40px; color:#94a3b8;"><i class="fa fa-spinner fa-spin fa-2x"></i><p style="margin-top:10px; font-size:12px;">Đang tải tin nhắn...</p></div>');

    $.ajax({
      url: "{{ route('ehenho.messages.inbox') }}/hop-thu/" + convId,
      type: "GET",
      dataType: "json",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      success: function(res) {
        if (res.success) {
          currentConvId = res.conversation_id;
          currentPartnerId = res.partner.id;
          lastMsgId = 0;

          // Update header
          $('#partnerProfileLink, #partnerNameText').attr('href', res.partner.profile_url);
          $('#partnerAvatarImg').attr('src', res.partner.avatar);
          $('#partnerNameText').text(res.partner.name);
          $('#partnerMetaText').html(res.partner.meta + ' • <span style="color: #10b981;"><i class="fa fa-circle" style="font-size: 8px;"></i> ' + (res.partner.is_online ? 'Đang trực tuyến' : 'Hoạt động gần đây') + '</span>');
          $('#chatPartnerId').val(res.partner.id);
          $('#chatConvId').val(res.conversation_id);
          $('#zaloMsgInput').attr('placeholder', 'Nhập tin nhắn tới ' + res.partner.name + '...');

          // Render messages
          var streamHtml = '';
          $.each(res.messages, function(i, msg) {
            lastMsgId = Math.max(lastMsgId, msg.id);
            if (msg.is_mine) {
              streamHtml += '<div class="zalo-msg-row outgoing" data-id="' + msg.id + '">' +
                              '<div>' +
                                '<div class="zalo-msg-bubble">' + escapeHtml(msg.body).replace(/\n/g, '<br>') + '</div>' +
                                '<div class="zalo-msg-time">' + msg.time + ' <i class="fa ' + (msg.is_read ? 'fa-check-circle text-primary' : 'fa-check') + '" style="margin-left: 3px;"></i></div>' +
                              '</div>' +
                            '</div>';
            } else {
              streamHtml += '<div class="zalo-msg-row incoming" data-id="' + msg.id + '">' +
                              '<img src="' + res.partner.avatar + '" alt="" class="zalo-msg-avatar">' +
                              '<div>' +
                                '<div class="zalo-msg-bubble">' + escapeHtml(msg.body).replace(/\n/g, '<br>') + '</div>' +
                                '<div class="zalo-msg-time">' + msg.time + '</div>' +
                              '</div>' +
                            '</div>';
            }
          });

          $('#zaloMessageStream').html(streamHtml);
          scrollToBottom(false);
          $('#zaloMsgInput').focus();

          // Push state to URL
          if (window.history && window.history.pushState) {
            window.history.pushState(null, '', '{{ route("ehenho.messages.inbox") }}?conversation_id=' + currentConvId);
          }
        }
      }
    });
  });

  // Client-side search in conversation list
  $('#convSearchInput').on('input', function() {
    var q = $.trim($(this).val().toLowerCase());
    $('.zalo-conv-item').each(function() {
      var name = $(this).data('partner-name') || '';
      if (!q || name.indexOf(q) !== -1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/&/g, '&amp;')
              .replace(/</g, '&lt;')
              .replace(/>/g, '&gt;')
              .replace(/"/g, '&quot;')
              .replace(/'/g, '&#039;');
  }
});
</script>
@endpush
@endsection
