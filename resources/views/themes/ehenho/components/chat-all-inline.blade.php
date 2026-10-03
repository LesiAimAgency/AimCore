@php
    $isDomain = request()->getHost() === 'ehenho.local' || str_starts_with(request()->route()?->getName() ?? '', 'ehenho.domain.');
    $loginRoute = $isDomain && Route::has('ehenho.domain.login') ? route('ehenho.domain.login') : (Route::has('ehenho.login') ? route('ehenho.login') : url('/ehenho/dang-nhap'));
    $registerRoute = $isDomain && Route::has('ehenho.domain.register') ? route('ehenho.domain.register') : (Route::has('ehenho.register') ? route('ehenho.register') : url('/ehenho/dang-ky'));
    $messagesRoute = $isDomain && Route::has('ehenho.domain.chat_all.messages') ? route('ehenho.domain.chat_all.messages') : (Route::has('ehenho.chat_all.messages') ? route('ehenho.chat_all.messages') : url('/ehenho/chat-all/messages'));
    $storeRoute = $isDomain && Route::has('ehenho.domain.chat_all.store') ? route('ehenho.domain.chat_all.store') : (Route::has('ehenho.chat_all.store') ? route('ehenho.chat_all.store') : url('/ehenho/chat-all/messages'));
    $uploadRoute = $isDomain && Route::has('ehenho.domain.chat_all.upload') ? route('ehenho.domain.chat_all.upload') : (Route::has('ehenho.chat_all.upload') ? route('ehenho.chat_all.upload') : url('/ehenho/chat-all/upload'));
    $pollRoute = $isDomain && Route::has('ehenho.domain.chat_all.poll') ? route('ehenho.domain.chat_all.poll') : (Route::has('ehenho.chat_all.poll') ? route('ehenho.chat_all.poll') : url('/ehenho/chat-all/poll'));
    $readRoute = $isDomain && Route::has('ehenho.domain.chat_all.read') ? route('ehenho.domain.chat_all.read') : (Route::has('ehenho.chat_all.read') ? route('ehenho.chat_all.read') : url('/ehenho/chat-all/read'));
    $isAuth = auth()->check();
@endphp

<!-- Inline Chat All Section for Homepage -->
<div class="chat-all-inline-container" style="margin-top: 15px; margin-bottom: 20px; background: #fff; border-radius: 10px; border: 1px solid #e1e4e8; box-shadow: 0 3px 12px rgba(0,0,0,0.06); overflow: hidden;">
  
  <!-- Header Bar -->
  <div style="background: var(--eh-header-bg, #202020); color: #fff; padding: 12px 18px; display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--eh-theme-primary, #007cae);">
    <div style="display: flex; align-items: center; gap: 10px;">
      <i class="fa fa-comments" style="font-size: 20px; color: var(--eh-theme-primary, #007cae);"></i>
      <div>
        <h4 style="margin: 0; font-size: 16px; font-weight: bold; color: #fff; display: inline-flex; align-items: center; gap: 8px;">
          Chat All 
          <span class="label" style="background-color: var(--eh-theme-primary, #007cae); font-size: 11px; font-weight: normal; border-radius: 10px; padding: 2px 8px;">Trực tiếp</span>
        </h4>
        <div style="font-size: 12px; color: #bbb;">Giao lưu kết bạn trực tiếp cùng tất cả thành viên</div>
      </div>
    </div>
    <div>
      @if($isAuth)
        <span style="font-size: 12px; color: #5cb85c; font-weight: bold;">
          <i class="fa fa-circle" style="font-size: 9px;"></i> Đang hoạt động
        </span>
      @else
        <span style="font-size: 12px; color: #f0ad4e;">
          <i class="fa fa-lock"></i> Yêu cầu đăng nhập
        </span>
      @endif
    </div>
  </div>

  @if(! $isAuth)
    <!-- GUEST VIEW: Yêu cầu đăng nhập theo đúng quy tắc authentication -->
    <div class="chat-all-guest-card" style="padding: 35px 20px; text-align: center; background: #fdfdfd;">
      <div style="width: 58px; height: 58px; background: #eaf4f8; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 12px;">
        <i class="fa fa-lock" style="font-size: 26px; color: var(--eh-theme-primary, #007cae);"></i>
      </div>
      <h4 style="font-weight: bold; color: #333; margin: 0 0 8px 0;">Chat All</h4>
      <p style="color: #666; font-size: 15px; line-height: 1.6; margin-bottom: 20px;">
        Bạn cần đăng nhập để<br>sử dụng chức năng chat.
      </p>
      <div>
        <a href="{{ $loginRoute }}" class="btn btn-primary btn-lg" style="min-width: 180px; font-weight: bold; border-radius: 24px; padding: 9px 28px; background-color: var(--eh-theme-primary, #007cae); border: none; box-shadow: 0 4px 10px rgba(0,124,174,0.3);">
          <i class="fa fa-sign-in"></i> Đăng nhập
        </a>
      </div>
      <div style="margin-top: 14px; font-size: 13px; color: #888;">
        Chưa có tài khoản?
        <a href="{{ $registerRoute }}" style="color: #e85151; font-weight: bold; text-decoration: underline;">Đăng ký miễn phí</a>
      </div>
    </div>
  @else
    <!-- AUTHENTICATED USER VIEW: Chat trực tiếp ngay tại trang chủ -->
    <div class="chat-all-auth-card" style="display: flex; flex-direction: column; background: #f8fafc;">
      
      <!-- Messages List -->
      <div id="inlineChatMessagesList" style="height: 260px; overflow-y: auto; padding: 14px 18px; display: flex; flex-direction: column; gap: 10px;">
        <div id="inlineChatLoading" style="text-align: center; color: #888; padding: 40px 0;">
          <i class="fa fa-spinner fa-spin fa-2x"></i>
          <p style="font-size: 12px; margin-top: 8px;">Đang tải tin nhắn cộng đồng...</p>
        </div>
      </div>

      <!-- Input Form -->
      <div style="padding: 12px 16px; background: #fff; border-top: 1px solid #e1e4e8;">
        <form id="inlineChatSendForm" style="margin: 0; display: flex; align-items: center; gap: 8px;">
          <input type="file" id="inlineChatFileInput" accept="image/*,.pdf" style="display: none;">
          <button type="button" id="inlineChatAttachBtn" class="btn btn-default" title="Đính kèm tệp/ảnh" style="border-radius: 50%; width: 36px; height: 36px; padding: 0; display: flex; align-items: center; justify-content: center; color: #555;">
            <i class="fa fa-paperclip" style="font-size: 16px;"></i>
          </button>
          <input type="text" id="inlineChatTextInput" class="form-control" placeholder="Nhập tin nhắn để trò chuyện cùng mọi người..." maxlength="2000" autocomplete="off" style="border-radius: 20px; padding-left: 14px; padding-right: 14px; height: 36px;">
          <button type="submit" id="inlineChatSendBtn" class="btn btn-primary" style="border-radius: 20px; padding: 7px 18px; background-color: var(--eh-theme-primary, #007cae); border: none; font-weight: bold; display: flex; align-items: center; gap: 6px;">
            <i class="fa fa-paper-plane"></i> Gửi
          </button>
        </form>
      </div>

    </div>
  @endif

</div>

@if($isAuth)
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
        if (xhr.status === 401) {
          window.location.href = loginUrl;
        } else {
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
        if (xhr.status === 401) {
          clearInterval(pollTimer);
        }
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
    
    var html = '<div class="' + rowClass + '" id="inlineChatMsg_' + msg.id + '">';
    
    if (!isMine) {
      html += '<img src="' + escapeHtml(msg.sender_avatar) + '" alt="" class="chat-all-avatar">';
      html += '<div style="display: flex; flex-direction: column;">';
      html += '<span class="chat-all-sender-name">' + escapeHtml(msg.sender_name) + '</span>';
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

    if (!isMine) {
      html += '</div>';
    }

    html += '</div>';

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
@endif
