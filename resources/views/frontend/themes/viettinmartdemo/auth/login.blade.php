@extends('layouts.app')

@section('title', __('common.login'))

@section('body_class', 'login-page')

@section('content')
    <div class="rts-register-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="registration-wrapper-1">
                      
                        <div class="logo-area mb--0 text-center">
                              <img src="http://127.0.0.1:8000/media-files/media/viettinmart-logo-tach-nen-1774681112-1775614627.png" alt="VIETTIN MART" class="logo mb--20" style="max-height: 200px; width: auto;">
                        </div>
                        <h3 class="title animated fadeIn text-center">{{ Lang('auth_login_title') }}</h3>
                        <form id="loginForm" action="{{ locale_route('login') }}" method="POST" class="registration-form">
                            @csrf
                            <div class="input-wrapper">
                                <label for="email">{{ Lang('auth_login_email') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="input-wrapper">
                                <label for="password">{{ Lang('auth_login_password') }}</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="form-check mb-4 mt-2">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small" for="remember" style="color: var(--color-body);">{{ Lang('auth_login_remember') }}</label>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger p-2 mb-3 small">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <button type="submit" class="rts-btn btn-primary w-100" id="loginBtn">
                                <span class="btn-text">{{ Lang('auth_login_btn') }}</span>
                                <span class="btn-loading d-none">
                                    <i class="fa-solid fa-spinner fa-spin me-2"></i>Đang đăng nhập...
                                </span>
                            </button>
                                <p class="mt--20">{{ Lang('auth_login_no_account') }} <a href="{{ locale_route('register') }}">{{ Lang('auth_login_register_link') }}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show flash messages with SweetAlert
        @if(session('success'))
            Swal.fire({
                title: 'Thành công!',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Lỗi!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Đóng'
            });
        @endif

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const btn = document.getElementById('loginBtn');
            const btnText = btn.querySelector('.btn-text');
            const btnLoading = btn.querySelector('.btn-loading');
            const formData = new FormData(form);
            
            // Show loading state
            btn.disabled = true;
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Thành công!',
                        text: data.message,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = data.redirect;
                    });
                } else {
                    Swal.fire({
                        title: 'Lỗi đăng nhập!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Thử lại'
                    });
                }
            })
            .catch(error => {
                console.error('Login error:', error);
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Có lỗi xảy ra khi đăng nhập. Vui lòng thử lại.',
                    icon: 'error',
                    confirmButtonText: 'Đóng'
                });
            })
            .finally(() => {
                // Reset button state
                btn.disabled = false;
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
            });
        });
    </script>
@endsection
