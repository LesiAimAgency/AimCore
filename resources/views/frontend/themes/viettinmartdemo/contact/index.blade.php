@extends('layouts.app')

@section('title', 'Liên hệ')

@push('head')
    {{-- reCAPTCHA Script --}}
    @if(setting('recaptcha_site_key'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
@endpush

@section('content')
    <x-breadcrumb :items="[
            ['label' => 'Liên hệ']
        ]" />

    <div class="rts-contact-main-wrapper-banner bg_image" style="background-image: url('{{ asset('theme/images/contact/01.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-banner-content text-center">
                        <h1 class="title">Liên hệ với chúng tôi</h1>
                        <p class="disc">Chúng tôi luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc của bạn về dịch vụ và sản phẩm.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-map-contact-area rts-section-gap2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-left-area-main-wrapper" style="max-height: 540px; overflow-y: auto; padding-right: 15px;">
                        <h2 class="title" style="font-size: 24px; margin-bottom: 20px;">Hệ thống đại lý</h2>
                        
                        @forelse($locations as $location)
                            <div class="location-single-card agent-card {{ $location->id == $primaryLocation?->id ? 'active' : '' }}" 
                                 data-address="{{ $location->address }}"
                                 style="cursor: pointer; transition: all 0.3s; padding: 15px; border-radius: 12px; border: 1px solid #edf2f7; margin-bottom: 15px; background: #fff;">
                                <div class="information">
                                    <h3 class="title" style="font-size: 16px; margin-bottom: 5px; color: var(--color-primary);">{{ $location->name }}</h3>
                                    <div style="display: flex; flex-direction: column; gap: 5px;">
                                        <p style="margin: 0; font-size: 13px;"><i class="fa-light fa-location-dot me-2"></i> {{ $location->address }}</p>
                                        <p style="margin: 0; font-size: 13px;"><i class="fa-light fa-phone me-2"></i> {{ $location->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">Chưa có đại lý nào được cập nhật.</div>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-8 pl--50 pl_sm--5 pl_md--5">
                    <div class="contact-map-area" style="position: relative;">
                        @php
                            $initialQuery = $primaryLocation ? ($primaryLocation->name . ', ' . $primaryLocation->address) : setting('contact_address', 'Hồ Chí Minh, Việt Nam');
                            $mapUrl = "https://maps.google.com/maps?q=" . urlencode($initialQuery) . "&t=&z=16&ie=UTF8&iwloc=&output=embed";
                        @endphp
                        
                        {{-- Custom Absolute Marker Picker --}}
                        <div class="map-picker-absolute" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -100%); z-index: 10; pointer-events: none; text-align: center;">
                            {{-- Dynamic Info Bubble --}}
                            <div id="mapInfoBubble" style="background: white; padding: 10px 15px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); margin-bottom: 8px; min-width: 180px; position: relative; pointer-events: auto;">
                                <h4 id="bubbleName" style="margin: 0; font-size: 14px; font-weight: 700; color: var(--color-primary);">{{ $primaryLocation?->name ?? 'VietTinMart' }}</h4>
                                <p id="bubblePhone" style="margin: 2px 0; font-size: 12px; color: #475569;"><i class="fa-solid fa-phone me-1"></i> {{ $primaryLocation?->phone }}</p>
                                <p id="bubbleAddress" style="margin: 2px 0; font-size: 11px; color: #64748b; line-height: 1.2;">{{ $primaryLocation?->address }}</p>
                                {{-- Small Triangle at bottom --}}
                                <div style="position: absolute; bottom: -8px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 8px solid transparent; border-right: 8px solid transparent; border-top: 8px solid white;"></div>
                            </div>

                            <i class="fa-solid fa-location-dot" style="font-size: 40px; color: #ef4444; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));"></i>
                            <div style="width: 10px; height: 10px; background: rgba(0,0,0,0.2); border-radius: 50%; margin: -5px auto 0; filter: blur(2px);"></div>
                        </div>

                        {{-- Interaction Blocker (Disables Drag/Zoom) --}}
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 5; background: transparent; cursor: default;"></div>

                        <iframe id="agentMap" src="{{ $mapUrl }}" width="100%" height="540" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        
                        <div id="mapLinkContainer" class="mt-3 text-end">
                            @if($primaryLocation)
                                <a id="bigMapLink" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($primaryLocation->name . ', ' . $primaryLocation->address) }}" 
                                   target="_blank" class="rts-btn btn-secondary btn-sm" style="padding: 8px 15px; font-size: 12px;">
                                    <i class="fa-solid fa-up-right-from-square me-2"></i> Xem trên Google Maps
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rts-contact-form-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg_light-1 contact-form-wrapper-bg">
                        <div class="row">
                            <div class="col-lg-7 pr--30 pr_md--10 pr_sm--5">
                                <div class="contact-form-wrapper-1">
                                    <h3 class="title mb--50 animated fadeIn">Gửi tin nhắn cho chúng tôi</h3>
                                    
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                                        </div>
                                    @endif

                                    <form id="contactForm" action="{{ locale_route('contact.send') }}" method="POST" class="contact-form-1">
                                        @csrf
                                        
                                        {{-- Anti-spam measures --}}
                                        {!! honeypot_fields() !!}
                                        {!! form_timestamp() !!}
                                        
                                        <div class="contact-form-wrapper--half-area">
                                            <div class="single">
                                                <input type="text" name="name" placeholder="Họ và tên*" value="{{ old('name') }}" required>
                                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="single">
                                                <input type="email" name="email" placeholder="Email*" value="{{ old('email') }}" required>
                                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="single-select">
                                            <input type="text" name="subject" placeholder="Chủ đề*" value="{{ old('subject') }}" required>
                                            @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <textarea name="message" placeholder="Nội dung tin nhắn..." required>{{ old('message') }}</textarea>
                                        @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                                        
                                        {{-- reCAPTCHA --}}
                                        <div class="mt-3">
                                            {!! recaptcha_field() !!}
                                            @error('captcha')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        
                                        <button type="submit" class="rts-btn btn-primary mt--20" id="contactBtn">
                                            <span class="btn-text">Gửi tin nhắn</span>
                                            <span class="btn-loading d-none">
                                                <i class="fa-solid fa-spinner fa-spin me-2"></i>Đang gửi...
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5 mt_md--30 mt_sm--30">
                                <div class="thumbnail-area">
                                    <img src="{{ asset('theme/images/contact/02.jpg') }}" alt="contact_form">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rts-shorts-service-area rts-section-gap bg_primary">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icon/icon-9.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">Giá tốt nhất</h4>
                            <p class="disc">Chúng tôi cung cấp giá cả cạnh tranh nhất thị trường.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icon/icon-10.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">Đổi trả 100%</h4>
                            <p class="disc">Chính sách đổi trả linh hoạt trong 30 ngày.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icon/icon-11.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">Giao hàng nhanh</h4>
                            <p class="disc">Giao hàng trong ngày tại khu vực nội thành.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icon/icon-12.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">Hỗ trợ 24/7</h4>
                            <p class="disc">Đội ngũ hỗ trợ khách hàng luôn sẵn sàng phục vụ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Show flash messages with SweetAlert
    @if(session('success'))
        Swal.fire({
            title: 'Thành công!',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 4000,
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

    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const btn = document.getElementById('contactBtn');
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
                    title: 'Cảm ơn bạn!',
                    text: data.message,
                    icon: 'success',
                    timer: 4000,
                    showConfirmButton: false
                });
                
                // Reset form
                form.reset();
            } else {
                let errorMessage = 'Có lỗi xảy ra khi gửi tin nhắn.';
                if (data.errors) {
                    errorMessage = Object.values(data.errors).flat().join('\n');
                } else if (data.message) {
                    errorMessage = data.message;
                }
                
                Swal.fire({
                    title: 'Lỗi!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'Thử lại'
                });
            }
        })
        .catch(error => {
            console.error('Contact form error:', error);
            Swal.fire({
                title: 'Lỗi!',
                text: 'Có lỗi xảy ra khi gửi tin nhắn. Vui lòng thử lại.',
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

    // Agent Map Interactivity
    document.querySelectorAll('.agent-card').forEach(card => {
        card.addEventListener('click', function() {
            // Update active state
            document.querySelectorAll('.agent-card').forEach(c => {
                c.classList.remove('active');
                c.style.background = '#fff';
                c.style.borderColor = '#edf2f7';
            });
            this.classList.add('active');
            this.style.background = '#f8fafc';
            this.style.borderColor = 'var(--color-primary)';

            // Update map
            const address = this.getAttribute('data-address');
            const phone = this.querySelector('p:last-child').innerText.replace(' ', ''); // Get phone from P tag
            const name = this.querySelector('.title').innerText;
            
            // Update Bubble Info
            document.getElementById('bubbleName').innerText = name;
            document.getElementById('bubblePhone').innerHTML = `<i class="fa-solid fa-phone me-1"></i> ${phone}`;
            document.getElementById('bubbleAddress').innerText = address;

            const mapIframe = document.getElementById('agentMap');
            const bigMapLink = document.getElementById('bigMapLink');
            
            const query = encodeURIComponent(`${name}, ${address}`);
            mapIframe.src = `https://maps.google.com/maps?q=${query}&t=&z=16&ie=UTF8&iwloc=&output=embed`;
            
            if (bigMapLink) {
                bigMapLink.href = `https://www.google.com/maps/search/?api=1&query=${query}`;
            }
            
            // Scroll to map on mobile
            if (window.innerWidth < 992) {
                mapIframe.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
</script>
@endpush

@push('styles')
<style>
.location-single-card {
    margin-bottom: 30px;
    padding: 0;
    border: none;
    background: transparent;
}

.location-single-card .icon {
    width: 50px;
    height: 50px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    margin-bottom: 20px;
}

.location-single-card .information h3.title {
    font-size: 20px;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 8px;
}

.location-single-card .information p {
    color: #64748b;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.contact-map-area iframe {
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.alert {
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background: #f0fdf4;
    color: #15803d;
    border: 1px solid #bbf7d0;
}

.text-danger {
    color: #dc2626;
    font-size: 12px;
    display: block;
    margin-top: 5px;
}
</style>
@endpush
