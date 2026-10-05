@php
    $isDomain = request()->getHost() === 'ehenho.local' || str_starts_with(request()->route()?->getName() ?? '', 'ehenho.domain.');
    $loginRoute = $isDomain && Route::has('ehenho.domain.login') ? route('ehenho.domain.login') : (Route::has('ehenho.login') ? route('ehenho.login') : url('/ehenho/dang-nhap'));
    $registerRoute = $isDomain && Route::has('ehenho.domain.register') ? route('ehenho.domain.register') : (Route::has('ehenho.register') ? route('ehenho.register') : url('/ehenho/dang-ky'));
    $messagesRoute = $isDomain && Route::has('ehenho.domain.chat_all.messages') ? route('ehenho.domain.chat_all.messages') : (Route::has('ehenho.chat_all.messages') ? route('ehenho.chat_all.messages') : url('/ehenho/chat-all/messages'));
    $storeRoute = $isDomain && Route::has('ehenho.domain.chat_all.store') ? route('ehenho.domain.chat_all.store') : (Route::has('ehenho.chat_all.store') ? route('ehenho.chat_all.store') : url('/ehenho/chat-all/messages'));
    $uploadRoute = $isDomain && Route::has('ehenho.domain.chat_all.upload') ? route('ehenho.domain.chat_all.upload') : (Route::has('ehenho.chat_all.upload') ? route('ehenho.chat_all.upload') : url('/ehenho/chat-all/upload'));
    $pollRoute = $isDomain && Route::has('ehenho.domain.chat_all.poll') ? route('ehenho.domain.chat_all.poll') : (Route::has('ehenho.chat_all.poll') ? route('ehenho.chat_all.poll') : url('/ehenho/chat-all/poll'));
    $readRoute = $isDomain && Route::has('ehenho.domain.chat_all.read') ? route('ehenho.domain.chat_all.read') : (Route::has('ehenho.chat_all.read') ? route('ehenho.chat_all.read') : url('/ehenho/chat-all/read'));
    $profileRouteTemplate = $isDomain && Route::has('ehenho.domain.profile.show') 
        ? route('ehenho.domain.profile.show', '__SLUG__') 
        : (Route::has('ehenho.profile.show') ? route('ehenho.profile.show', '__SLUG__') : url('/ehenho/ho-so/__SLUG__'));
    $isAuth = auth()->check();
@endphp

<!-- Chat All Floating Launcher Button -->
<div id="chatAllLauncherWrapper" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050;">
  <button id="chatAllLauncherBtn" type="button" class="btn" style="background: linear-gradient(135deg, #007cae 0%, #005a82 100%); color: #fff; font-weight: bold; border-radius: 28px; padding: 10px 18px; box-shadow: 0 4px 14px rgba(0,0,0,0.25); display: flex; align-items: center; gap: 8px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.2s ease;">
    <i class="fa fa-comments" style="font-size: 18px;"></i>
    <span style="font-size: 14px; letter-spacing: 0.3px;">Chat All</span>
    <span id="chatAllBadge" class="badge" style="background-color: #e85151; color: #fff; display: none; margin-left: 4px; font-size: 11px;">0</span>
  </button>
</div>

<!-- Chat All Floating Window -->
<div id="chatAllWindow" style="display: none; position: fixed; bottom: 75px; right: 20px; width: 360px; max-width: calc(100vw - 30px); height: 490px; max-height: calc(100vh - 100px); background: #fff; border-radius: 12px; box-shadow: 0 8px 30px rgba(0,0,0,0.22); z-index: 1051; flex-direction: column; overflow: hidden; border: 1px solid #ddd; font-family: inherit;">
  
  <!-- Header -->
  <div style="background: var(--eh-header-bg, #202020); color: #fff; padding: 12px 16px; display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--eh-theme-primary, #007cae);">
    <div style="display: flex; align-items: center; gap: 8px;">
      <i class="fa fa-comments-o" style="font-size: 18px; color: var(--eh-theme-primary, #007cae);"></i>
      <div>
        <h4 style="margin: 0; font-size: 15px; font-weight: bold; color: #fff;">Chat All</h4>
        @if($isAuth)
          <small style="font-size: 11px; color: #d0ebf5;">
            <i class="fa fa-user-circle" style="color: #6edff6;"></i> {{ auth()->user()?->profile?->display_name ?: (auth()->user()?->name ?: 'Bạn') }}
          </small>
        @else
          <small style="font-size: 11px; color: #bbb;">Phòng trò chuyện cộng đồng</small>
        @endif
      </div>
    </div>
    <div>
      <button id="chatAllCloseBtn" type="button" class="btn btn-link" style="color: #fff; padding: 0 4px; font-size: 20px; line-height: 1; text-decoration: none;" title="Đóng">&times;</button>
    </div>
  </div>

  <!-- Chat Window Body: Cả khách vãng lai và thành viên đều xem được -->
  <div id="chatAllAuthBox" style="flex: 1; display: flex; flex-direction: column; overflow: hidden; background: #f4f6f9;">
    
    <!-- Messages Scroll Area -->
    <div id="chatAllMessagesList" style="flex: 1; overflow-y: auto; padding: 14px; display: flex; flex-direction: column; gap: 10px;">
      <div id="chatAllLoading" style="text-align: center; color: #888; padding: 20px 0;">
        <i class="fa fa-spinner fa-spin fa-2x"></i>
        <p style="font-size: 12px; margin-top: 8px;">Đang tải tin nhắn...</p>
      </div>
    </div>

    <!-- Bottom Bar -->
    @if($isAuth)
      <!-- Input Form cho thành viên đã đăng nhập -->
      <div style="padding: 10px; background: #fff; border-top: 1px solid #e1e4e8;">
        <form id="chatAllSendForm" style="margin: 0; display: flex; align-items: center; gap: 6px;">
          <input type="file" id="chatAllFileInput" accept="image/*,.pdf" style="display: none;">
          <button type="button" id="chatAllAttachBtn" class="btn btn-default btn-sm" title="Đính kèm tệp/hình ảnh" style="border-radius: 50%; width: 34px; height: 34px; padding: 0; display: flex; align-items: center; justify-content: center; color: #555;">
            <i class="fa fa-paperclip" style="font-size: 16px;"></i>
          </button>
          <input type="text" id="chatAllTextInput" class="form-control input-sm" placeholder="Nhập tin nhắn..." maxlength="2000" autocomplete="off" style="border-radius: 18px; padding-left: 12px; padding-right: 12px;">
          <button type="submit" id="chatAllSendBtn" class="btn btn-primary btn-sm" style="border-radius: 50%; width: 34px; height: 34px; padding: 0; display: flex; align-items: center; justify-content: center; background-color: var(--eh-theme-primary, #007cae); border: none;">
            <i class="fa fa-paper-plane" style="font-size: 13px;"></i>
          </button>
        </form>
      </div>
    @else
      <!-- Guest Bar: Chưa đăng nhập vẫn thấy tin nhắn, muốn chat thì click đăng nhập -->
      <div style="padding: 10px; background: #fff; border-top: 1px solid #e1e4e8; display: flex; align-items: center; gap: 6px;">
        <a href="{{ $loginRoute }}" style="flex: 1; text-decoration: none;">
          <div style="background: #f1f3f5; border: 1px solid #ced4da; border-radius: 18px; height: 34px; padding: 0 12px; display: flex; align-items: center; color: #777; font-size: 12px; cursor: pointer;">
            <i class="fa fa-lock" style="margin-right: 6px; color: #f0ad4e;"></i> Đăng nhập để chat...
          </div>
        </a>
        <a href="{{ $loginRoute }}" class="btn btn-primary btn-sm" style="border-radius: 18px; padding: 6px 14px; background-color: var(--eh-theme-primary, #007cae); border: none; font-weight: bold; font-size: 12px; flex-shrink: 0; color: #fff; text-decoration: none; display: flex; align-items: center; gap: 4px;">
          <i class="fa fa-sign-in"></i> Đăng nhập
        </a>
      </div>
    @endif

  </div>

</div>

<!-- Styles for Chat All -->
<style>
  #chatAllLauncherBtn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.3);
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
  .chat-all-avatar {
    width: 30px;
    height: 30px;
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

<!-- Script for Chat All -->
@push('scripts')
<script>
(function() {
  function initChatAllLauncher() {
    if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
      setTimeout(initChatAllLauncher, 60);
      return;
    }
    $(document).ready(function() {
      var isAuth = {{ $isAuth ? 'true' : 'false' }};
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
  
  var isOpen = false;
  var lastMessageId = 0;
  var pollTimer = null;
  var hasLoadedOnce = false;

  // Toggle Chat All Window
  $('#chatAllLauncherBtn').on('click', function(e) {
    e.preventDefault();
    if (!isOpen) {
      openChat();
    } else {
      closeChat();
    }
  });

  $('#chatAllCloseBtn').on('click', function(e) {
    e.preventDefault();
    closeChat();
  });

  function openChat() {
    $('#chatAllWindow').css('display', 'flex');
    isOpen = true;
    $('#chatAllBadge').hide().text('0');

    if (!hasLoadedOnce) {
      loadMessages();
    } else {
      scrollToBottom();
    }
    startPolling();
    if (isAuth) {
      markRead();
    }
  }

  function closeChat() {
    $('#chatAllWindow').hide();
    isOpen = false;
    stopPolling();
  }

  // Load Messages from Backend (Guests & Authenticated Users)
  function loadMessages() {
    $.ajax({
      url: messagesUrl,
      type: 'GET',
      dataType: 'json',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      },
      success: function(res) {
        $('#chatAllLoading').remove();
        if (res.success && res.messages) {
          hasLoadedOnce = true;
          $('#chatAllMessagesList').empty();
          
          if (res.messages.length === 0) {
            $('#chatAllEmptyState').remove();
            $('#chatAllMessagesList').html('<div id="chatAllEmptyState" style="text-align: center; color: #999; margin-top: 40px; font-size: 13px;"><i class="fa fa-comments-o fa-2x" style="color: #ccc; margin-bottom: 6px;"></i><p>Chưa có tin nhắn nào.<br>Hãy là người gửi tin nhắn đầu tiên!</p></div>');
          } else {
            res.messages.forEach(function(msg) {
              appendMessage(msg);
              if (msg.id > lastMessageId) {
                lastMessageId = msg.id;
              }
            });
            scrollToBottom();
          }
        }
      },
      error: function(xhr) {
        $('#chatAllLoading').remove();
        if (xhr.status !== 401) {
          $('#chatAllMessagesList').html('<div style="text-align: center; color: #d9534f; margin-top: 30px; font-size: 12px;"><i class="fa fa-exclamation-triangle"></i> Không thể tải tin nhắn. Vui lòng thử lại sau.</div>');
        }
      }
    });
  }

  // Poll for New Messages (Guests & Authenticated Users)
  function pollNewMessages() {
    if (!isOpen) return;

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
          $('#chatAllEmptyState').remove();
          res.new_messages.forEach(function(msg) {
            appendMessage(msg);
            if (msg.id > lastMessageId) {
              lastMessageId = msg.id;
            }
          });
          scrollToBottom();
        }
      },
      error: function(xhr) {
        // Silent on polling error
      }
    });
  }

  function startPolling() {
    stopPolling();
    pollTimer = setInterval(pollNewMessages, 3500);
  }

  function stopPolling() {
    if (pollTimer) {
      clearInterval(pollTimer);
      pollTimer = null;
    }
  }

  function markRead() {
    if (!isAuth) return;
    $.ajax({
      url: readUrl,
      type: 'POST',
      dataType: 'json',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  }

  // Handle Send Message (Authenticated Only)
  $('#chatAllSendForm').on('submit', function(e) {
    e.preventDefault();
    if (!isAuth) {
      handleUnauthenticated();
      return;
    }

    var text = $.trim($('#chatAllTextInput').val());
    if (!text) return;

    $('#chatAllSendBtn').prop('disabled', true);

    $.ajax({
      url: storeUrl,
      type: 'POST',
      data: {
        message: text
      },
      dataType: 'json',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(res) {
        $('#chatAllSendBtn').prop('disabled', false);
        $('#chatAllTextInput').val('').focus();
        if (res.success && res.message) {
          $('#chatAllEmptyState').remove();
          appendMessage(res.message);
          if (res.message.id > lastMessageId) {
            lastMessageId = res.message.id;
          }
          scrollToBottom();
        }
      },
      error: function(xhr) {
        $('#chatAllSendBtn').prop('disabled', false);
        if (xhr.status === 401) {
          handleUnauthenticated();
        } else {
          alert('Không thể gửi tin nhắn. Vui lòng kiểm tra kết nối.');
        }
      }
    });
  });

  // Handle Attachment Upload (Authenticated Only)
  $('#chatAllAttachBtn').on('click', function(e) {
    e.preventDefault();
    if (!isAuth) {
      handleUnauthenticated();
      return;
    }
    $('#chatAllFileInput').click();
  });

  $('#chatAllFileInput').on('change', function() {
    var file = this.files[0];
    if (!file) return;

    if (!isAuth) {
      handleUnauthenticated();
      return;
    }

    if (file.size > 5 * 1024 * 1024) {
      alert('Tệp đính kèm không được vượt quá 5MB.');
      return;
    }

    var formData = new FormData();
    formData.append('file', file);
    formData.append('message', $('#chatAllTextInput').val() || '');

    $('#chatAllAttachBtn').html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

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
        $('#chatAllAttachBtn').html('<i class="fa fa-paperclip"></i>').prop('disabled', false);
        $('#chatAllFileInput').val('');
        $('#chatAllTextInput').val('');
        if (res.success && res.message) {
          $('#chatAllEmptyState').remove();
          appendMessage(res.message);
          if (res.message.id > lastMessageId) {
            lastMessageId = res.message.id;
          }
          scrollToBottom();
        }
      },
      error: function(xhr) {
        $('#chatAllAttachBtn').html('<i class="fa fa-paperclip"></i>').prop('disabled', false);
        $('#chatAllFileInput').val('');
        if (xhr.status === 401) {
          handleUnauthenticated();
        } else {
          alert('Không thể tải tệp lên. Vui lòng thử lại.');
        }
      }
    });
  });

  // Append formatted message to DOM
  function appendMessage(msg) {
    var isMine = msg.is_mine;
    var rowClass = isMine ? 'chat-all-msg-row chat-all-msg-mine' : 'chat-all-msg-row chat-all-msg-other';
    var senderName = escapeHtml(msg.sender_name || 'Thành viên');
    var senderAvatar = escapeHtml(msg.sender_avatar || '{{ asset('themes/ehenho/images/df_picture.png') }}');
    var profileUrl = getProfileUrl(msg);
    
    var html = '<div class="' + rowClass + '" id="chatMsg_' + msg.id + '">';
    
    if (!isMine) {
      if (profileUrl) {
        html += '<a href="' + escapeHtml(profileUrl) + '" target="_blank" title="' + senderName + '" style="display:inline-block; flex-shrink:0;">';
        html += '<img src="' + senderAvatar + '" alt="' + senderName + '" class="chat-all-avatar" style="cursor:pointer; transition:opacity 0.2s;" onmouseover="this.style.opacity=0.85" onmouseout="this.style.opacity=1">';
        html += '</a>';
      } else {
        html += '<img src="' + senderAvatar + '" alt="' + senderName + '" class="chat-all-avatar">';
      }

      html += '<div style="display: flex; flex-direction: column; max-width: 78%;">';
      if (profileUrl) {
        html += '<a href="' + escapeHtml(profileUrl) + '" target="_blank" class="chat-all-sender-name" style="text-decoration: none; color: #333; font-weight: 600; font-size: 11px; margin-bottom: 3px; display: inline-block;" title="Xem hồ sơ ' + senderName + '">' + senderName + '</a>';
      } else {
        html += '<span class="chat-all-sender-name">' + senderName + '</span>';
      }
    } else {
      html += '<div style="display: flex; flex-direction: column; align-items: flex-end; max-width: 78%;">';
      if (profileUrl) {
        html += '<a href="' + escapeHtml(profileUrl) + '" target="_blank" class="chat-all-sender-name mine" style="text-decoration: none; font-size: 11px; margin-bottom: 3px; display: inline-block;" title="Xem hồ sơ của bạn">' + senderName + ' <small style="font-size: 10px; color: #888; font-weight: normal;">(Bạn)</small></a>';
      } else {
        html += '<span class="chat-all-sender-name mine">' + senderName + ' <small style="font-size: 10px; color: #888; font-weight: normal;">(Bạn)</small></span>';
      }
    }

    html += '<div class="chat-all-bubble">';
    if (msg.attachment_url) {
      if (msg.attachment_type === 'image') {
        html += '<a href="' + escapeHtml(msg.attachment_url) + '" target="_blank"><img src="' + escapeHtml(msg.attachment_url) + '" style="max-width: 100%; max-height: 180px; border-radius: 8px; margin-bottom: 6px; display: block;"></a>';
      } else {
        html += '<div style="margin-bottom: 6px;"><a href="' + escapeHtml(msg.attachment_url) + '" target="_blank" style="color: inherit; text-decoration: underline;"><i class="fa fa-file-text-o"></i> Tệp đính kèm</a></div>';
      }
    }
    html += '<div>' + escapeHtml(msg.message) + '</div>';
    html += '<div class="chat-all-time">' + escapeHtml(msg.time) + '</div>';
    html += '</div>'; // close bubble

    html += '</div>'; // close column wrapper

    if (isMine) {
      if (profileUrl) {
        html += '<a href="' + escapeHtml(profileUrl) + '" target="_blank" title="' + senderName + '" style="display:inline-block; flex-shrink:0;">';
        html += '<img src="' + senderAvatar + '" alt="' + senderName + '" class="chat-all-avatar" style="cursor:pointer; transition:opacity 0.2s;" onmouseover="this.style.opacity=0.85" onmouseout="this.style.opacity=1">';
        html += '</a>';
      } else {
        html += '<img src="' + senderAvatar + '" alt="' + senderName + '" class="chat-all-avatar">';
      }
    }

    html += '</div>'; // close row

    $('#chatAllMessagesList').append(html);
  }

  function scrollToBottom() {
    var container = $('#chatAllMessagesList');
    container.scrollTop(container[0].scrollHeight);
  }

  function handleUnauthenticated() {
    window.location.href = loginUrl;
  }

  function escapeHtml(text) {
    if (!text) return '';
    return $('<div>').text(text).html();
  }
    });
  }
  initChatAllLauncher();
})();
</script>
@endpush
