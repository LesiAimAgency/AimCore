@php
    $isDomain = request()->getHost() === 'ehenho.local' || str_starts_with(request()->route()?->getName() ?? '', 'ehenho.domain.');
    $loginRoute = $isDomain && Route::has('ehenho.domain.login') ? route('ehenho.domain.login') : (Route::has('ehenho.login') ? route('ehenho.login') : url('/DA010/dang-nhap'));
    $registerRoute = $isDomain && Route::has('ehenho.domain.register') ? route('ehenho.domain.register') : (Route::has('ehenho.register') ? route('ehenho.register') : url('/DA010/dang-ky'));
    $messagesRoute = $isDomain && Route::has('ehenho.domain.chat_all.messages') ? route('ehenho.domain.chat_all.messages') : (Route::has('ehenho.chat_all.messages') ? route('ehenho.chat_all.messages') : url('/DA010/chat-all/messages'));
    $storeRoute = $isDomain && Route::has('ehenho.domain.chat_all.store') ? route('ehenho.domain.chat_all.store') : (Route::has('ehenho.chat_all.store') ? route('ehenho.chat_all.store') : url('/DA010/chat-all/messages'));
    $uploadRoute = $isDomain && Route::has('ehenho.domain.chat_all.upload') ? route('ehenho.domain.chat_all.upload') : (Route::has('ehenho.chat_all.upload') ? route('ehenho.chat_all.upload') : url('/DA010/chat-all/upload'));
    $pollRoute = $isDomain && Route::has('ehenho.domain.chat_all.poll') ? route('ehenho.domain.chat_all.poll') : (Route::has('ehenho.chat_all.poll') ? route('ehenho.chat_all.poll') : url('/DA010/chat-all/poll'));
    $readRoute = $isDomain && Route::has('ehenho.domain.chat_all.read') ? route('ehenho.domain.chat_all.read') : (Route::has('ehenho.chat_all.read') ? route('ehenho.chat_all.read') : url('/DA010/chat-all/read'));
    $profileRouteTemplate = $isDomain && Route::has('ehenho.domain.profile.show') 
        ? route('ehenho.domain.profile.show', '__SLUG__') 
        : (Route::has('ehenho.profile.show') ? route('ehenho.profile.show', '__SLUG__') : url('/DA010/ho-so/__SLUG__'));
    $isAuth = auth()->check();
@endphp

<!-- Inline Chat All Section for Homepage -->
<div class="chat-all-inline-container" style="margin-top: 0; margin-bottom: 20px; background: #fff; border-radius: 10px; border: 1px solid #e1e4e8; box-shadow: 0 3px 12px rgba(0,0,0,0.06); overflow: hidden;">
  
  <!-- Header Bar -->
  <div style="background: var(--eh-header-bg, #202020); color: #fff; padding: 12px 14px; display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--eh-theme-primary, #007cae); flex-wrap: wrap; gap: 8px;">
    <div style="display: flex; align-items: center; gap: 8px;">
      <i class="fa fa-comments" style="font-size: 20px; color: var(--eh-theme-primary, #007cae);"></i>
      <div>
        <h4 style="margin: 0; font-size: 15px; font-weight: bold; color: #fff; display: inline-flex; align-items: center; gap: 6px;">
          Chat All 
          <span class="label" style="background-color: var(--eh-theme-primary, #007cae); font-size: 11px; font-weight: normal; border-radius: 10px; padding: 2px 7px;">Trực tiếp</span>
        </h4>
        <div style="font-size: 11px; color: #bbb;">Giao lưu kết bạn trực tiếp cùng tất cả thành viên</div>
      </div>
    </div>
    <div>
      @if($isAuth)
        <span style="font-size: 11px; color: #5cb85c; font-weight: bold;">
          <i class="fa fa-circle" style="font-size: 8px;"></i> Đang hoạt động
        </span>
      @else
        <a href="{{ $loginRoute }}" style="font-size: 12px; color: #f0ad4e; font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
          <i class="fa fa-sign-in"></i> Đăng nhập để chat
        </a>
      @endif
    </div>
  </div>

  <!-- Messages & Chat Section (Cả khách vãng lai và thành viên đều xem được) -->
  <div class="chat-all-auth-card" style="display: flex; flex-direction: column; background: #f8fafc;">
    
    <!-- Messages List -->
    <div id="inlineChatMessagesList" style="height: 380px; overflow-y: auto; padding: 12px 14px; display: flex; flex-direction: column; gap: 10px;">
      <div id="inlineChatLoading" style="text-align: center; color: #888; padding: 40px 0;">
        <i class="fa fa-spinner fa-spin fa-2x"></i>
        <p style="font-size: 12px; margin-top: 8px;">Đang tải tin nhắn cộng đồng...</p>
      </div>
    </div>

    <!-- Bottom Chat Area -->
    @if($isAuth)
      <!-- Input Form cho thành viên đã đăng nhập -->
      <div style="padding: 10px 12px; background: #fff; border-top: 1px solid #e1e4e8;">
        <form id="inlineChatSendForm" style="margin: 0; display: flex; align-items: center; gap: 6px;">
        
          <input type="text" id="inlineChatTextInput" class="form-control" placeholder="Nhập tin nhắn..." maxlength="2000" autocomplete="off" style="border-radius: 18px; padding-left: 12px; padding-right: 12px; height: 34px; font-size: 13px;">
          <button type="submit" id="inlineChatSendBtn" class="btn btn-primary" style="border-radius: 18px; padding: 6px 14px; background-color: var(--eh-theme-primary, #007cae); border: none; font-weight: bold; display: flex; align-items: center; gap: 5px; flex-shrink: 0; font-size: 13px;">
            <i class="fa fa-paper-plane"></i> Gửi
          </button>
        </form>
      </div>
    @else
      <!-- Thanh kêu gọi đăng nhập cho khách chưa đăng nhập: Vẫn thấy tin nhắn, muốn chat thì bấm đăng nhập -->
      <div style="padding: 10px 12px; background: #fff; border-top: 1px solid #e1e4e8; display: flex; align-items: center; gap: 8px;">
        
        <a href="{{ $loginRoute }}" class="btn btn-primary" style="border-radius: 18px; padding: 6px 16px; background-color: var(--eh-theme-primary, #007cae); border: none; font-weight: bold; font-size: 13px; flex-shrink: 0; color: #fff; text-decoration: none; display: flex; align-items: center; gap: 5px;">
          <i class="fa fa-sign-in"></i> Đăng nhập
        </a>
        <a href="{{ $registerRoute }}" class="btn btn-default" style="border-radius: 18px; padding: 6px 14px; font-weight: bold; font-size: 13px; flex-shrink: 0; color: #e85151; text-decoration: none; display: flex; align-items: center; gap: 5px; border-color: #ddd;">
          Đăng ký
        </a>
      </div>
    @endif

  </div>

</div>

<style>
  .chat-all-msg-row {
    display: flex;
    align-items: flex-end;
    gap: 8px;
    margin-bottom: 10px;
  }
  .chat-all-msg-mine {
    justify-content: flex-end;
  }
  .chat-all-msg-mine .chat-all-bubble {
    background-color: var(--eh-theme-primary, #007cae);
    color: #fff;
    border-bottom-right-radius: 2px;
  }
  .chat-all-msg-other .chat-all-bubble {
    background-color: #fff;
    color: #333;
    border: 1px solid #e1e4e8;
    border-bottom-left-radius: 2px;
  }
  .chat-all-bubble {
    max-width: 100%;
    padding: 8px 12px;
    border-radius: 14px;
    font-size: 13px;
    line-height: 1.4;
    word-wrap: break-word;
    word-break: break-word;
  }
  .chat-all-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
  }
  .chat-all-sender-name {
    font-size: 11px;
    color: #555;
    margin-bottom: 3px;
    font-weight: 600;
    line-height: 1.2;
    transition: color 0.15s;
  }
  a.chat-all-sender-name:hover {
    color: var(--eh-theme-primary, #007cae) !important;
    text-decoration: underline !important;
  }
  .chat-all-sender-name.mine {
    color: var(--eh-theme-primary, #007cae);
    text-align: right;
  }
  .chat-all-time {
    font-size: 10px;
    color: #999;
    margin-top: 3px;
    text-align: right;
  }
  .chat-all-msg-mine .chat-all-time {
    color: rgba(255,255,255,0.85);
  }
</style>

@push('scripts')
<script>
(function() {
  function initInlineChat() {
    if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
      setTimeout(initInlineChat, 60);
      return;
    }
    $(document).ready(function() {
      var messagesUrl = "{{ $messagesRoute }}";
  var storeUrl = "{{ $storeRoute }}";
  var uploadUrl = "{{ $uploadRoute }}";
  var pollUrl = "{{ $pollRoute }}";
  var readUrl = "{{ $readRoute }}";
  var loginUrl = "{{ $loginRoute }}";
  var profileRouteTemplate = "{{ $profileRouteTemplate }}";

  function getProfileUrl(msg) {
    if (msg.sender_profile_url) {
      return msg.sender_profile_url;
    }
    var slug = msg.sender_slug || msg.profile_slug || msg.slug;
    if (slug) {
      return profileRouteTemplate.replace('__SLUG__', encodeURIComponent(slug));
    }
    return '';
  }
  
  var lastMessageId = 0;
  var pollTimer = null;

  // Load Messages from Backend
  function loadInlineMessages() {
    $.ajax({
      url: messagesUrl,
      type: 'GET',
      dataType: 'json',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      },
      success: function(res) {
        $('#inlineChatLoading').remove();
        if (res.success && res.messages) {
          $('#inlineChatMessagesList').empty();
          
          if (res.messages.length === 0) {
            $('#inlineChatMessagesList').html('<div id="inlineChatEmpty" style="text-align: center; color: #999; margin-top: 40px; font-size: 13px;"><i class="fa fa-comments-o fa-2x" style="color: #ccc; margin-bottom: 6px;"></i><p>Chưa có tin nhắn nào.<br>Hãy là người gửi tin nhắn đầu tiên!</p></div>');
          } else {
            res.messages.forEach(function(msg) {
              appendInlineMessage(msg);
              if (msg.id > lastMessageId) {
                lastMessageId = msg.id;
              }
            });
            scrollInlineToBottom();
          }
        }
      },
      error: function(xhr) {
        $('#inlineChatLoading').remove();
        if (xhr.status !== 401) {
          $('#inlineChatMessagesList').html('<div style="text-align: center; color: #d9534f; margin-top: 40px; font-size: 12px;"><i class="fa fa-exclamation-triangle"></i> Không thể tải tin nhắn. Vui lòng tải lại trang.</div>');
        }
      }
    });
  }

  // Poll for New Messages
  function pollInlineMessages() {
    $.ajax({
      url: pollUrl,
      type: 'GET',
      data: { last_id: lastMessageId },
      dataType: 'json',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      },
      success: function(res) {
        if (res.success && res.new_messages && res.new_messages.length > 0) {
          $('#inlineChatEmpty').remove();
          res.new_messages.forEach(function(msg) {
            appendInlineMessage(msg);
            if (msg.id > lastMessageId) {
              lastMessageId = msg.id;
            }
          });
          scrollInlineToBottom();
        }
      },
      error: function(xhr) {
        // Silent on polling failure
      }
    });
  }

  // Send Message
  $('#inlineChatSendForm').on('submit', function(e) {
    e.preventDefault();
    var text = $.trim($('#inlineChatTextInput').val());
    if (!text) return;

    $('#inlineChatSendBtn').prop('disabled', true);

    $.ajax({
      url: storeUrl,
      type: 'POST',
      data: { message: text },
      dataType: 'json',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(res) {
        $('#inlineChatSendBtn').prop('disabled', false);
        $('#inlineChatTextInput').val('').focus();
        if (res.success && res.message) {
          $('#inlineChatEmpty').remove();
          appendInlineMessage(res.message);
          if (res.message.id > lastMessageId) {
            lastMessageId = res.message.id;
          }
          scrollInlineToBottom();
        }
      },
      error: function(xhr) {
        $('#inlineChatSendBtn').prop('disabled', false);
        if (xhr.status === 401) {
          window.location.href = loginUrl;
        } else {
          alert('Không thể gửi tin nhắn. Vui lòng thử lại.');
        }
      }
    });
  });

  // Handle Attachment Upload
  $('#inlineChatAttachBtn').on('click', function() {
    $('#inlineChatFileInput').click();
  });

  $('#inlineChatFileInput').on('change', function() {
    var file = this.files[0];
    if (!file) return;

    if (file.size > 5 * 1024 * 1024) {
      alert('Tệp đính kèm không được vượt quá 5MB.');
      return;
    }

    var formData = new FormData();
    formData.append('file', file);
    formData.append('message', $('#inlineChatTextInput').val() || '');

    $('#inlineChatAttachBtn').html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

    $.ajax({
      url: uploadUrl,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(res) {
        $('#inlineChatAttachBtn').html('<i class="fa fa-paperclip"></i>').prop('disabled', false);
        $('#inlineChatFileInput').val('');
        $('#inlineChatTextInput').val('');
        if (res.success && res.message) {
          $('#inlineChatEmpty').remove();
          appendInlineMessage(res.message);
          if (res.message.id > lastMessageId) {
            lastMessageId = res.message.id;
          }
          scrollInlineToBottom();
        }
      },
      error: function(xhr) {
        $('#inlineChatAttachBtn').html('<i class="fa fa-paperclip"></i>').prop('disabled', false);
        $('#inlineChatFileInput').val('');
        if (xhr.status === 401) {
          window.location.href = loginUrl;
        } else {
          alert('Không thể tải tệp lên. Vui lòng thử lại.');
        }
      }
    });
  });

  function appendInlineMessage(msg) {
    var isMine = msg.is_mine;
    var rowClass = isMine ? 'chat-all-msg-row chat-all-msg-mine' : 'chat-all-msg-row chat-all-msg-other';
    var senderName = escapeHtml(msg.sender_name || 'Thành viên');
    var senderAvatar = escapeHtml(msg.sender_avatar || '{{ asset('themes/ehenho/images/df_picture.png') }}');
    var profileUrl = getProfileUrl(msg);
    
    var html = '<div class="' + rowClass + '" id="inlineChatMsg_' + msg.id + '">';
    
    if (!isMine) {
      if (profileUrl) {
        html += '<a href="' + escapeHtml(profileUrl) + '" target="_blank" title="' + senderName + '" style="display:inline-block; flex-shrink:0;">';
        html += '<img src="' + senderAvatar + '" alt="' + senderName + '" class="chat-all-avatar" style="cursor:pointer; transition:opacity 0.2s;" onmouseover="this.style.opacity=0.85" onmouseout="this.style.opacity=1">';
        html += '</a>';
      } else {
        html += '<img src="' + senderAvatar + '" alt="' + senderName + '" class="chat-all-avatar">';
      }

      html += '<div style="display: flex; flex-direction: column; max-width: 82%;">';
      if (profileUrl) {
        html += '<a href="' + escapeHtml(profileUrl) + '" target="_blank" class="chat-all-sender-name" style="text-decoration: none; color: #333; font-weight: 600; font-size: 11px; margin-bottom: 3px; display: inline-block;" title="Xem hồ sơ ' + senderName + '">' + senderName + '</a>';
      } else {
        html += '<span class="chat-all-sender-name">' + senderName + '</span>';
      }
    } else {
      html += '<div style="display: flex; flex-direction: column; align-items: flex-end; max-width: 82%;">';
      if (profileUrl) {
        html += '<a href="' + escapeHtml(profileUrl) + '" target="_blank" class="chat-all-sender-name mine" style="text-decoration: none; font-size: 11px; margin-bottom: 3px; display: inline-block;" title="Xem hồ sơ của bạn">' + senderName + ' <small style="font-size: 10px; color: #888; font-weight: normal;">(Bạn)</small></a>';
      } else {
        html += '<span class="chat-all-sender-name mine">' + senderName + ' <small style="font-size: 10px; color: #888; font-weight: normal;">(Bạn)</small></span>';
      }
    }

    html += '<div class="chat-all-bubble">';
    if (msg.attachment_url) {
      if (msg.attachment_type === 'image') {
        html += '<a href="' + escapeHtml(msg.attachment_url) + '" target="_blank"><img src="' + escapeHtml(msg.attachment_url) + '" style="max-width: 100%; max-height: 160px; border-radius: 8px; margin-bottom: 6px; display: block;"></a>';
      } else {
        html += '<div style="margin-bottom: 6px;"><a href="' + escapeHtml(msg.attachment_url) + '" target="_blank" style="color: inherit; text-decoration: underline;"><i class="fa fa-file-text-o"></i> Tệp đính kèm</a></div>';
      }
    }
    html += '<div>' + escapeHtml(msg.message) + '</div>';
    html += '<div class="chat-all-time">' + escapeHtml(msg.time) + '</div>';
    html += '</div>';

    html += '</div>'; // close flex-column

    html += '</div>'; // close row

    $('#inlineChatMessagesList').append(html);
  }

  function scrollInlineToBottom() {
    var container = $('#inlineChatMessagesList');
    container.scrollTop(container[0].scrollHeight);
  }

  function escapeHtml(text) {
    if (!text) return '';
    return $('<div>').text(text).html();
  }

  // Initialize
  loadInlineMessages();
  pollTimer = setInterval(pollInlineMessages, 3500);
    });
  }
  initInlineChat();
})();
</script>
@endpush
