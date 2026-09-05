@extends('admin.layouts.app')
@section('title', 'Chi tiết Đánh giá')
@section('page-title', 'Chi tiết Đánh giá')
@section('page-subtitle', __('common.view') . ' và trả lời đánh giá của khách hàng')

@section('page-actions')
    <a href="{{ locale_route('admin.reviews.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
@endsection

@section('content')
<div style="display:flex;gap:24px;flex-wrap:wrap;align-items:flex-start;">
    
    {{-- Cột trái (Thông tin đánh giá) --}}
    <div style="flex:1;min-width:300px;display:flex;flex-direction:column;gap:24px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nội dung đánh giá</h3>
            </div>
            <div class="card-body">
                <div style="display:flex;gap:15px;margin-bottom:20px;">
                    <div style="flex:1;">
                        <p style="font-size:12px;color:#64748b;margin-bottom:4px;">Khách hàng</p>
                        <p style="font-size:14px;font-weight:600;color:#0f172a;">{{ $review->customer_name ?: 'Ẩn danh' }}</p>
                        <p style="font-size:13px;color:#475569;">{{ $review->customer_email }}</p>
                    </div>
                    <div style="flex:1;">
                        <p style="font-size:12px;color:#64748b;margin-bottom:4px;">Thời gian</p>
                        <p style="font-size:13px;color:#0f172a;">{{ $review->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>
                </div>

                <div style="display:flex;gap:15px;margin-bottom:20px;">
                    <div style="flex:1;">
                        <p style="font-size:12px;color:#64748b;margin-bottom:4px;">Đánh giá sao</p>
                        <div style="color:#fbbf24;font-size:14px;">
                            @for($i=1; $i<=5; $i++)
                                <i class="{{ $i <= $review->rating ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                            @endfor
                            <span style="color:#64748b;font-size:13px;margin-left:5px;">({{ $review->rating }}/5)</span>
                        </div>
                    </div>
                    @if($review->ip_address)
                    <div style="flex:1;">
                        <p style="font-size:12px;color:#64748b;margin-bottom:4px;">IP Address</p>
                        <p style="font-size:13px;color:#0f172a;">{{ $review->ip_address }}</p>
                    </div>
                    @endif
                </div>

                <div style="padding:15px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;">
                    @if($review->title)
                    <h4 style="font-size:15px;font-weight:700;color:#1e293b;margin-bottom:8px;">{{ $review->title }}</h4>
                    @endif
                    <p style="font-size:14px;color:#334155;line-height:1.6;white-space:pre-wrap;">{{ $review->comment }}</p>
                </div>
                
                @if($review->images && is_array($review->images) && count($review->images) > 0)
                <div style="margin-top:20px;">
                    <p style="font-size:12px;font-weight:600;color:#64748b;margin-bottom:10px;">Hình ảnh đính kèm</p>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        @foreach($review->images as $img)
                            <a href="{{ asset($img) }}" target="_blank">
                                <img src="{{ asset($img) }}" alt="Review image" style="width:80px;height:80px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;">
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Cột phải (Trả lời và Cập nhật) --}}
    <div style="width:340px;display:flex;flex-direction:column;gap:24px;flex-shrink:0;">
        <form action="{{ locale_route('admin.reviews.update', $review) }}" method="POST" class="card">
            @csrf @method('PUT')
            <div class="card-header">
                <h3 class="card-title">Xử lý & Phản hồi</h3>
            </div>
            
            <div class="card-body">
                <div style="margin-bottom:16px;">
                    <label class="form-label">Trạng thái</label>
                    <select name="status" class="form-select @error('status') border-red-500 @enderror">
                        <option value="pending" {{ old('status', $review->status) === 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                        <option value="approved" {{ old('status', $review->status) === 'approved' ? 'selected' : '' }}>Đã duyệt</option>
                        <option value="spam" {{ old('status', $review->status) === 'spam' ? 'selected' : '' }}>Spam</option>
                    </select>
                    @error('status') <p class="form-hint text-red-500">{{ $message }}</p> @enderror
                </div>

                <div style="margin-bottom:20px;">
                    <label class="form-label">Phản hồi của QTV</label>
                    <textarea name="reply" rows="5" class="form-textarea @error('reply') border-red-500 @enderror" placeholder="Nhập câu trả lời của bạn, sẽ hiển thị công khai dưới đánh giá...">{{ old('reply', $review->reply) }}</textarea>
                    <p class="form-hint">Để trống nếu không muốn trả lời.</p>
                    @error('reply') <p class="form-hint text-red-500">{{ $message }}</p> @enderror
                </div>

                <div style="padding-top:16px;border-top:1px solid #e2e8f0;">
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                        Lưu thông tin
                    </button>
                </div>
            </div>
        </form>

        {{-- Đối tượng được đánh giá --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Đánh giá cho</h3>
            </div>
            <div class="card-body">
                @if($review->product)
                    <div style="display:flex;gap:12px;align-items:center;">
                        <div style="width:60px;height:60px;border-radius:8px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;overflow:hidden;">
                            @if($review->product->thumbnail)
                                <img src="{{ asset($review->product->thumbnail) }}" style="width:100%;height:100%;object-fit:cover;">
                            @else
                                <i class="fa-solid fa-box text-gray-400"></i>
                            @endif
                        </div>
                        <div style="flex:1;">
                            <span class="badge badge-blue mb-1">Sản phẩm</span>
                            <a href="{{ locale_route('admin.products.edit', $review->product_id) }}" target="_blank" style="font-size:13px;font-weight:600;color:#2563eb;text-decoration:none;display:block;">{{ $review->product->name }}</a>
                        </div>
                    </div>
                @elseif($review->post)
                    <div style="display:flex;gap:12px;align-items:center;">
                        <div style="width:60px;height:60px;border-radius:8px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;overflow:hidden;">
                            @if($review->post->thumbnail)
                                <img src="{{ asset($review->post->thumbnail) }}" style="width:100%;height:100%;object-fit:cover;">
                            @else
                                <i class="fa-solid fa-newspaper text-gray-400"></i>
                            @endif
                        </div>
                        <div style="flex:1;">
                            <span class="badge badge-purple mb-1">Bài viết</span>
                            <a href="{{ locale_route('admin.posts.edit', $review->post_id) }}" target="_blank" style="font-size:13px;font-weight:600;color:#7c3aed;text-decoration:none;display:block;">{{ $review->post->title }}</a>
                        </div>
                    </div>
                @else
                    <p style="font-size:13px;color:#64748b;">Không tìm thấy đối tượng.</p>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection

