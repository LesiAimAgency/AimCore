@extends('admin.layouts.app')
@section('title', 'Đánh giá')
@section('page-title', 'Đánh giá & Bình luận')
@section('page-subtitle', 'Quản lý đánh giá từ người dùng')

@section('content')
{{-- Filters --}}
<form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;align-items:center;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm tên, email, nội dung..."
           class="form-input" style="width:260px;">
    
    <select name="rating" class="form-select" style="width:140px;">
        <option value="">Tất cả sao</option>
        @for($i=5; $i>=1; $i--)
            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} sao</option>
        @endfor
    </select>

    <select name="status" class="form-select" style="width:140px;">
        <option value="">Trạng thái</option>
        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Đã duyệt</option>
        <option value="spam" {{ request('status') === 'spam' ? 'selected' : '' }}>Spam</option>
    </select>

    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-magnifying-glass"></i> Lọc
    </button>
    @if(request()->hasAny(['search','rating','status']))
        <a href="{{ locale_route('admin.reviews.index') }}" class="btn btn-secondary btn-sm">Xóa lọc</a>
    @endif
</form>

<div class="tbl-wrap">
    <table style="width:100%;border-collapse:collapse;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 1px 3px rgba(15,23,42,.04);">
        <thead class="tbl-head">
            <tr>
                <th class="tbl-th">Khách hàng</th>
                <th class="tbl-th">Đánh giá</th>
                <th class="tbl-th">Sản phẩm/Bài viết</th>
                <th class="tbl-th">Trạng thái</th>
                <th class="tbl-th">Ngày tạo</th>
                <th class="tbl-th" style="width:80px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $review)
            <tr class="tbl-tr" style="border-bottom: 1px solid #f1f5f9;">
                <td class="tbl-td">
                    <p style="font-size:13.5px;font-weight:600;color:#0f172a;">{{ $review->customer_name ?: 'Ẩn danh' }}</p>
                    <p style="font-size:12px;color:#94a3b8;">{{ $review->customer_email }}</p>
                </td>
                <td class="tbl-td">
                    <div style="color:#fbbf24;font-size:11px;margin-bottom:4px;">
                        @for($i=1; $i<=5; $i++)
                            <i class="{{ $i <= $review->rating ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                        @endfor
                    </div>
                    @if($review->title)
                    <p style="font-size:13px;font-weight:600;color:#1e293b;margin-bottom:2px;">{{ $review->title }}</p>
                    @endif
                    <p style="font-size:13px;color:#475569;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ $review->comment }}</p>
                </td>
                <td class="tbl-td">
                    @if($review->product)
                        <span class="badge badge-blue mb-1">Sản phẩm</span><br>
                        <a href="{{ locale_route('admin.products.edit', $review->product_id) }}" target="_blank" style="font-size:12.5px;color:#2563eb;text-decoration:none;">{{ $review->product->name }}</a>
                    @elseif($review->post)
                        <span class="badge badge-purple mb-1">Bài viết</span><br>
                        <a href="{{ locale_route('admin.posts.edit', $review->post_id) }}" target="_blank" style="font-size:12.5px;color:#7c3aed;text-decoration:none;">{{ $review->post->title }}</a>
                    @else
                        <span style="color:#94a3b8;font-size:12px;">Không xác định</span>
                    @endif
                </td>
                <td class="tbl-td">
                    @if($review->status === 'approved')
                        <span class="badge badge-green">Đã duyệt</span>
                    @elseif($review->status === 'pending')
                        <span class="badge badge-yellow">Chờ duyệt</span>
                    @else
                        <span class="badge badge-red">Spam</span>
                    @endif
                </td>
                <td class="tbl-td">
                    <span style="font-size:12px;color:#94a3b8;">{{ $review->created_at->format('d/m/Y H:i') }}</span>
                </td>
                <td class="tbl-td">
                    <div style="display:flex;gap:4px;">
                        <a href="{{ locale_route('admin.reviews.edit', $review) }}" class="act-btn edit" title="Chi tiết">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ locale_route('admin.reviews.destroy', $review) }}" method="POST"
                              onsubmit="return confirm('Xóa đánh giá này?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="act-btn del" title="Xóa">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;padding:48px;color:#94a3b8;font-size:13px;">
                    <i class="fa-solid fa-star" style="font-size:28px;opacity:.2;display:block;margin-bottom:10px;"></i>
                    Chưa có đánh giá nào
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($reviews->hasPages())
<div style="margin-top:16px;">{{ $reviews->links() }}</div>
@endif
@endsection

