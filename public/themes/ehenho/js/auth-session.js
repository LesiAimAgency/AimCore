/**
 * eHenho Client-Side Authentication & Session Manager
 * Handles login state, user menu toggles, and seamless navigation
 * between public and authenticated pages.
 */
(function() {
    function initAuth() {
        if (typeof jQuery === 'undefined') {
            setTimeout(initAuth, 50);
            return;
        }

        var $ = jQuery;
        $(document).ready(function() {
            var isLoggedIn = localStorage.getItem('ehenho_logged_in') === 'true';
            var userName = localStorage.getItem('ehenho_user') || 'le si';
            var userEmail = localStorage.getItem('ehenho_email') || 'lesi20061998@gmail.com';

            // 1. Pre-fill login dropdown and login page fields for quick demo
            var $loginInput = $('#id_login, input[name="login"]');
            var $pwInput = $('#id_password, input[name="password"]');
            if ($loginInput.length && !$loginInput.val()) {
                $loginInput.val('lesi20061998@gmail.com');
            }
            if ($pwInput.length && !$pwInput.val()) {
                $pwInput.val('12345678');
            }

            // Password show/hide toggle support
            $('#mask-pw-dd, #mask-pw, #id_show_hide').on('click', function(e) {
                e.preventDefault();
                var $pw = $('#id_password');
                if ($pw.attr('type') === 'password') {
                    $pw.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                    $(this).contents().filter(function() { return this.nodeType === 3; }).replaceWith(' Che');
                } else {
                    $pw.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                    $(this).contents().filter(function() { return this.nodeType === 3; }).replaceWith(' Hiện');
                }
            });

            // 2. Handle Login Form Submit (Dropdown or Login Page)
            $('#login_form, form.login, form[action*="login.html"], form[action="/accounts/login/"]').on('submit', function(e) {
                e.preventDefault();
                var enteredEmail = $loginInput.val() || 'lesi20061998@gmail.com';
                
                localStorage.setItem('ehenho_logged_in', 'true');
                localStorage.setItem('ehenho_user', 'le si');
                localStorage.setItem('ehenho_email', enteredEmail);

                // Quick feedback
                var $btn = $(this).find('button[type="submit"], input[type="submit"]');
                $btn.prop('disabled', true).text('Đang đăng nhập...');
                
                setTimeout(function() {
                    window.location.href = 'my-profile.html';
                }, 400);
                return false;
            });

            // 3. Handle Logout action
            $('.btn-exit, .exit-link, #exit-form').on('click submit', function(e) {
                e.preventDefault();
                localStorage.removeItem('ehenho_logged_in');
                localStorage.removeItem('ehenho_user');
                localStorage.removeItem('ehenho_email');
                window.location.href = 'index.html';
                return false;
            });

            // 4. If logged in and page is a public page with guest navbar, inject member navbar
            var isAuthPage = window.location.pathname.indexOf('inbox.html') !== -1 ||
                             window.location.pathname.indexOf('sent.html') !== -1 ||
                             window.location.pathname.indexOf('message-view.html') !== -1 ||
                             window.location.pathname.indexOf('my-profile.html') !== -1 ||
                             window.location.pathname.indexOf('upload-profile-pic.html') !== -1 ||
                             window.location.pathname.indexOf('profile-edit.html') !== -1 ||
                             window.location.pathname.indexOf('profile-options.html') !== -1 ||
                             window.location.pathname.indexOf('liked-profiles.html') !== -1 ||
                             window.location.pathname.indexOf('bookmarked-profiles.html') !== -1 ||
                             window.location.pathname.indexOf('blocked-profiles.html') !== -1 ||
                             window.location.pathname.indexOf('contactbook-profiles.html') !== -1 ||
                             window.location.pathname.indexOf('password-change.html') !== -1 ||
                             window.location.pathname.indexOf('email-manager.html') !== -1 ||
                             window.location.pathname.indexOf('logout.html') !== -1;

            if (isLoggedIn && !isAuthPage) {
                // Remove Guest Signup & Login links
                $('.signup-btn').closest('li').remove();
                $('.login-btn, .login-dropdown').closest('li.dropdown, li').remove();

                // Add Badges if not present
                if ($('.notification-toggle').length === 0) {
                    var badges = '<li><span class="hidden-xs">&nbsp;&nbsp;</span>' +
                        '<a class="notification-toggle" href="inbox.html" title="Tin nhắn">' +
                        '<i aria-hidden="true" class="fa fa-comments" style="font-size:1.4em;"></i> ' +
                        '<span class="badge badge-notify-zero new-msg-num" style="background-color:#5cb85c;">1</span></a></li>' +
                        '<li><a class="notification-toggle" href="liked-profiles.html" title="Likes nhận">' +
                        '<i aria-hidden="true" class="fa fa-heart fa-fww" style="font-size:1.3em;"></i> ' +
                        '<span class="badge badge-notify-zero new-msg-num">0</span></a></li>';
                    $('.navbar-rightt.pull-right.no-collapse').prepend(badges);
                }

                // Add Member Dropdown if not present
                if ($('.dropdown-toggle:contains("le si")').length === 0) {
                    var dropdown = '<li class="dropdown">' +
                        '<a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">' +
                        '<i class="glyphicon glyphicon-user" style="font-size:1.2em;"></i> ' + userName + ' <span class="caret"></span></a>' +
                        '<ul class="dropdown-menu">' +
                        '<li><a href="my-profile.html"><i class="fa fa-file-text-o fa-fw"></i>&nbsp; Hồ sơ của tôi</a></li>' +
                        '<li><a href="upload-profile-pic.html"><i class="fa fa-file-image-o fa-fw"></i>&nbsp; Tải hình đại diện</a></li>' +
                        '<li><a href="profile-edit.html"><i class="fa fa-edit fa-fw"></i>&nbsp; Cập nhật hồ sơ</a></li>' +
                        '<li><a href="profile-options.html"><i class="fa fa-check-square-o fa-fw"></i>&nbsp; Tùy chọn</a></li>' +
                        '<li class="divider" role="separator"></li>' +
                        '<li><a href="bookmarked-profiles.html"><i class="fa fa-star fa-fw"></i>&nbsp; Hồ sơ đã đánh dấu</a></li>' +
                        '<li><a href="blocked-profiles.html"><i class="fa fa-times-circle-o fa-fw"></i>&nbsp; Người đã chặn</a></li>' +
                        '<li class="divider" role="separator"></li>' +
                        '<li><a href="contactbook-profiles.html"><i class="fa fa-list-alt fa-fw"></i>&nbsp; Danh bạ</a></li>' +
                        '<li class="divider" role="separator"></li>' +
                        '<li><a href="password-change.html"><i class="fa fa-key fa-fw"></i>&nbsp; Đổi mật khẩu</a></li>' +
                        '<li><a href="email-manager.html"><i class="fa fa-envelope-o fa-fw"></i>&nbsp; Quản lý Email</a></li>' +
                        '<li class="divider" role="separator"></li>' +
                        '<li><a class="exit-link" href="logout.html"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Thoát</a></li>' +
                        '</ul></li>';
                    $('#navbar .navbar-right').append(dropdown);
                }
            }
        });
    }

    initAuth();
})();
