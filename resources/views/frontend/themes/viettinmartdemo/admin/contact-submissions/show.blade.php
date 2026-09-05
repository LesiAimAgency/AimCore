@extends('admin.layouts.app')

@section('title', 'Chi tiết tin nhắn liên hệ')
@section('page-title', 'Chi tiết tin nhắn liên hệ')

@section('page-actions')
    <a href="{{ locale_route('admin.contact-submissions.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
@endsection

@section('content')
    <div class="admin-grid">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Nội dung tin nhắn</span>
            </div>
            <div class="card-body">
                <div style="margin-bottom: 20px;">
                    <label class="form-label">Chủ đề</label>
                    <div style="padding: 12px; background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0;">
                        {{ $submission->data['subject'] ?? 'Không có chủ đề' }}
                    </div>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label class="form-label">Nội dung</label>
                    <div style="padding: 15px; background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0; min-height: 200px; white-space: pre-wrap; font-family: inherit;">{{ $submission->data['message'] ?? 'Không có nội dung' }}</div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <span class="card-title">Thông tin người gửi</span>
            </div>
            <div class="card-body">
                <div style="margin-bottom: 15px;">
                    <label class="form-label">Họ và tên</label>
                    <div style="padding: 8px; background: #f8fafc; border-radius: 6px;">
                        {{ $submission->data['name'] ?? 'N/A' }}
                    </div>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label class="form-label">Email</label>
                    <div style="padding: 8px; background: #f8fafc; border-radius: 6px;">
                        @if(isset($submission->data['email']))
                            <a href="mailto:{{ $submission->data['email'] }}" style="color: #2563eb; text-decoration: none;">
                                {{ $submission->data['email'] }}
                            </a>
                        @else
                            N/A
                        @endif
                    </div>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label class="form-label">Thời gian gửi</label>
                    <div style="padding: 8px; background: #f8fafc; border-radius: 6px;">
                        {{ $submission->created_at->format('d/m/Y H:i:s') }}
                        <br>
                        <small style="color: #64748b;">{{ $submission->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label class="form-label">Địa chỉ IP</label>
                    <div style="padding: 8px; background: #f8fafc; border-radius: 6px;">
                        {{ $submission->ip_address }}
                    </div>
                </div>

                @if(isset($submission->data['email']))
                    <div style="margin-top: 20px;">
                        <a href="mailto:{{ $submission->data['email'] }}?subject=Re: {{ urlencode($submission->data['subject'] ?? 'Liên hệ từ website') }}" 
                           class="btn btn-primary" style="width: 100%;">
                            <i class="fa-solid fa-reply"></i> Trả lời email
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.admin-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
}

@media (max-width: 768px) {
    .admin-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush
