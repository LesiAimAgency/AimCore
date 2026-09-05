@extends('admin.layouts.app')

@section('title', 'Tin nhắn liên hệ')
@section('page-title', 'Tin nhắn liên hệ')

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="card-title">Danh sách tin nhắn ({{ $submissions->total() }})</span>
        </div>
        
        <div class="card-body p-0">
            @if($submissions->count() > 0)
                <div class="tbl-wrap">
                    <table style="width:100%;border-collapse:collapse;">
                        <thead class="tbl-head">
                            <tr>
                                <th class="tbl-th">Tên</th>
                                <th class="tbl-th contact-email-col">Email</th>
                                <th class="tbl-th">Chủ đề</th>
                                <th class="tbl-th contact-time-col" style="width: 150px;">Thời gian</th>
                                <th class="tbl-th" style="width: 100px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $submission)
                                <tr class="tbl-tr">
                                    <td class="tbl-td">{{ $submission->data['name'] ?? 'N/A' }}</td>
                                    <td class="tbl-td contact-email-col">{{ $submission->data['email'] ?? 'N/A' }}</td>
                                    <td class="tbl-td">{{ Str::limit($submission->data['subject'] ?? 'Không có chủ đề', 50) }}</td>
                                    <td class="tbl-td contact-time-col">{{ $submission->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="tbl-td">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ locale_route('admin.contact-submissions.show', $submission) }}" 
                                               class="act-btn view" title="Xem chi tiết">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            
                                            <form method="POST" action="{{ locale_route('admin.contact-submissions.destroy', $submission) }}" 
                                                  style="display: inline;" onsubmit="return confirm('Xác nhận xóa tin nhắn này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="act-btn del" title="Xóa">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div style="padding: 20px;">
                    {{ $submissions->links() }}
                </div>
            @else
                <div style="text-align: center; padding: 40px;">
                    <i class="fa-solid fa-inbox" style="font-size: 48px; color: #94a3b8; margin-bottom: 15px;"></i>
                    <p style="color: #64748b;">Chưa có tin nhắn liên hệ nào.</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
/* Responsive table for contact submissions */
@media (max-width: 768px) {
    .contact-email-col {
        display: none;
    }
    .contact-time-col {
        width: 80px !important;
        font-size: 11px;
    }
    .tbl-td {
        padding: 8px 12px !important;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .tbl-wrap {
        overflow-x: auto;
    }
    .act-btn {
        width: 24px !important;
        height: 24px !important;
        font-size: 10px !important;
    }
}

/* Fix button display issues */
.act-btn {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-decoration: none !important;
}

.act-btn i {
    display: block !important;
}
</style>
@endpush
