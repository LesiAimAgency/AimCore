@extends('layouts.app')

@section('title', __('common.register') . ' tài khoản')

@section('content')
    <div class="rts-register-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="registration-wrapper-1">
                        <div class="logo-area mb--0 text-center">
                            <img src="http://127.0.0.1:8000/media-files/media/viettinmart-logo-tach-nen-1774681112-1775614627.png" alt="VIETTIN MART" class="logo mb--20" style="max-height: 200px; width: auto;">
                        </div>
                        <h3 class="title animated fadeIn text-center">{{ Lang('auth_register_title') }}</h3>
                        <form id="registerForm" action="{{ locale_route('register') }}" method="POST" class="registration-form">
                            @csrf
                            <div class="input-wrapper">
                                <label for="name">{{ Lang('auth_register_name') }}</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="input-wrapper">
                                <label for="email">{{ Lang('auth_register_email') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="input-wrapper">
                                <label for="password">{{ Lang('auth_register_password') }}</label>
                                <input type="password" id="password" name="password" required>
                                <small class="text-muted">Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ cái, số và ký tự đặc biệt</small>
                            </div>
                            <div class="input-wrapper">
                                <label for="password_confirmation">{{ Lang('auth_register_confirm') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger p-2 mb-3 small">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <button type="submit" class="rts-btn btn-primary w-100" id="registerBtn">
                                <span class="btn-text">{{ Lang('auth_register_btn') }}</span>
                                <span class="btn-loading d-none">
                                    <i class="fa-solid fa-spinner fa-spin me-2"></i>Đang đăng ký...
                                </span>
                            </button>
                                <p class="mt--20">{{ Lang('auth_register_has_account') }} <a href="{{ locale_route('login') }}">{{ Lang('auth_register_login_link') }}</a></p>
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

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const btn = document.getElementById('registerBtn');
            const btnText = btn.querySelector('.btn-text');
            const btnLoading = btn.querySelector('.btn-loading');
            const formData = new FormData(form);
            
            // Validate password confirmation
            const password = form.querySelector('#password').value;
            const passwordConfirm = form.querySelector('#password_confirmation').value;
            
            if (password !== passwordConfirm) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Mật khẩu xác nhận không khớp.',
                    icon: 'error',
                    confirmButtonText: 'Đóng'
                });
                return;
            }
            
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
                        title: 'Chào mừng!',
                        text: data.message,
                        icon: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = data.redirect;
                    });
                } else {
                    let errorMessage = 'Có lỗi xảy ra khi đăng ký.';
                    if (data.errors) {
                        errorMessage = Object.values(data.errors).flat().join('\n');
                    } else if (data.message) {
                        errorMessage = data.message;
                    }
                    
                    Swal.fire({
                        title: 'Lỗi đăng ký!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'Thử lại'
                    });
                }
            })
            .catch(error => {
                console.error('Register error:', error);
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.',
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
