@extends('admin.layouts.app')
@section('title', 'Quản lý đại lý')
@section('page-title', 'Đại lý')
@section('page-subtitle', 'Quản lý hệ thống đại lý phân phối và doanh thu')

@section('page-actions')
<a href="{{ locale_route('admin.agents.create') }}" class="btn btn-primary">
    <i class="fa-solid fa-plus"></i> Thêm đại lý
</a>
@endsection

@section('content')

{{-- Filters --}}
<div class="card" style="padding:16px 20px;margin-bottom:20px; border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
    <form method="GET" style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;">
        <div style="position:relative;flex:1;min-width:240px;">
            <i class="fa-solid fa-magnifying-glass" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;"></i>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Tìm tên, mã, SĐT, khu vực..."
                   class="form-input" style="padding-left:36px; border-radius:10px; height:40px;">
        </div>
        <select name="type" class="form-select" style="width:160px; border-radius:10px; height:40px;">
            <option value="">Tất cả loại</option>
            @foreach($types as $key => $label)
                <option value="{{ $key }}" {{ request('type') === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <select name="status" class="form-select" style="width:160px; border-radius:10px; height:40px;">
            <option value="">Trạng thái</option>
            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Đang hoạt động</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Ngừng hoạt động</option>
        </select>
        <button type="submit" class="btn btn-primary" style="height:40px; border-radius:10px; padding:0 20px;">
            <i class="fa-solid fa-filter"></i> Lọc
        </button>
        @if(request()->hasAny(['search','type','status']))
            <a href="{{ locale_route('admin.agents.index') }}" class="btn btn-secondary" style="height:40px; border-radius:10px; display:flex; align-items:center;">
                <i class="fa-solid fa-xmark"></i> Xóa lọc
            </a>
        @endif
    </form>
</div>

<div class="card overflow-hidden" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
    <div class="tbl-wrap">
        <table style="width:100%;border-collapse:separate;border-spacing:0;">
            <thead style="background:#f8fafc;">
                <tr>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Đại lý</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Liên hệ</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Khu vực</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">Loại</th>
                    <th class="tbl-th" style="text-align:right; padding:16px; border-bottom:1px solid #f1f5f9;">Doanh thu</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">Trạng thái</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agents as $agent)
                <tr class="tbl-tr">
                    <td class="tbl-td" style="padding:16px;">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;color:#fff;flex-shrink:0;box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);">
                                {{ strtoupper(mb_substr($agent->name, 0, 1)) }}
                            </div>
                            <div>
                                <a href="{{ locale_route('admin.agents.show', $agent) }}" style="font-size:14px;font-weight:700;color:#1e293b;text-decoration:none;display:block;margin-bottom:2px;" class="hover:text-blue-600">
                                    {{ $agent->name }}
                                </a>
                                <div style="display:flex;align-items:center;gap:6px;">
                                    @if($agent->code)
                                        <span style="font-size:10px;background:#e0f2fe;color:#0369a1;padding:2px 8px;border-radius:6px;font-weight:700;text-transform:uppercase;">{{ $agent->code }}</span>
                                    @endif
                                    @if($agent->contact_person)
                                        <span style="font-size:11px;color:#64748b;display:flex;align-items:center;gap:4px;">
                                            <i class="fa-solid fa-user" style="font-size:10px;"></i> {{ $agent->contact_person }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="tbl-td" style="padding:16px;">
                        @if($agent->phone)
                            <a href="tel:{{ $agent->phone }}" style="font-size:13px;color:#334155;text-decoration:none;display:flex;align-items:center;gap:6px;font-weight:600;">
                                <i class="fa-solid fa-phone" style="font-size:11px;color:#10b981;"></i> {{ $agent->phone }}
                            </a>
                        @endif
                        @if($agent->email)
                            <p style="font-size:11px;color:#94a3b8;margin-top:4px;display:flex;align-items:center;gap:6px;">
                                <i class="fa-solid fa-envelope" style="font-size:10px;"></i> {{ $agent->email }}
                            </p>
                        @endif
                    </td>
                    <td class="tbl-td" style="padding:16px;">
                        <span style="font-size:13px;color:#475569;display:flex;align-items:center;gap:6px;">
                            <i class="fa-solid fa-location-dot" style="font-size:11px;color:#94a3b8;"></i>
                            {{ Str::limit($agent->region ?: '—', 30) }}
                        </span>
                    </td>
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        <span class="badge badge-orange" style="border-radius:20px; padding:4px 12px;">{{ $agent->type_name }}</span>
                    </td>
                    <td class="tbl-td" style="text-align:right; padding:16px;">
                        <div style="text-align:right;">
                            <p style="font-size:14px;font-weight:800;color:#0f172a;margin-bottom:2px;">{{ number_format($agent->orders_sum_total ?: 0, 0, ',', '.') }}₫</p>
                            <a href="{{ locale_route('admin.orders.index') }}?search={{ urlencode($agent->name) }}"
                               style="font-size:11px;font-weight:600;color:#2563eb;text-decoration:none;background:#eff6ff;padding:2px 8px;border-radius:6px;">
                                {{ $agent->orders_count }} đơn hàng
                            </a>
                        </div>
                    </td>
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        <div style="display:flex; justify-content:center;">
                            <button type="button" 
                                    onclick="toggleAgentStatus({{ $agent->id }}, this)"
                                    class="status-toggle {{ $agent->is_active ? 'active' : '' }}"
                                    title="Click để {{ $agent->is_active ? 'vô hiệu hóa' : 'kích hoạt' }}"
                                    style="width:42px; height:22px; border-radius:20px; background:#e2e8f0; border:none; position:relative; cursor:pointer; transition:all .3s ease; padding:0;">
                                <div style="width:16px; height:16px; border-radius:50%; background:#fff; position:absolute; top:3px; left:{{ $agent->is_active ? '23px' : '3px' }}; transition:all .3s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"></div>
                                <style>
                                    .status-toggle.active { background: #10b981 !important; }
                                </style>
                            </button>
                        </div>
                    </td>
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:8px;">
                            <a href="{{ locale_route('admin.agents.show', $agent) }}" class="act-btn view" style="width:34px; height:34px; border-radius:10px;" title="Xem chi tiết">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ locale_route('admin.agents.edit', $agent) }}" class="act-btn edit" style="width:34px; height:34px; border-radius:10px;" title="Chỉnh sửa">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ locale_route('admin.agents.destroy', $agent) }}" method="POST"
                                  onsubmit="return confirm('Xóa đại lý {{ addslashes($agent->name) }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="act-btn del" style="width:34px; height:34px; border-radius:10px;" title="Xóa">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:80px;color:#94a3b8;">
                        <div style="width:64px;height:64px;background:#f8fafc;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <i class="fa-solid fa-handshake-slash" style="font-size:28px;opacity:.3;"></i>
                        </div>
                        <p style="font-size:15px;font-weight:600;color:#64748b;">Không tìm thấy đại lý nào</p>
                        <p style="font-size:13px;margin-top:4px;">Thử điều chỉnh bộ lọc hoặc thêm đại lý mới</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($agents->hasPages())
    <div style="padding:20px;border-top:1px solid #f1f5f9;background:#fcfcfc;">{{ $agents->links() }}</div>
    @endif
</div>

@push('scripts')
<script>
function toggleAgentStatus(id, btn) {
    const dot = btn.querySelector('div');
    const isActive = btn.classList.contains('active');
    
    // UI update immediately
    btn.classList.toggle('active');
    dot.style.left = isActive ? '3px' : '23px';
    
    fetch(`{{ url('admin/agents') }}/${id}/toggle-status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            adminToast('Thành công', data.message, 'success');
        } else {
            // Revert if failed
            btn.classList.toggle('active');
            dot.style.left = isActive ? '23px' : '3px';
            adminToast('Lỗi', 'Không thể cập nhật trạng thái', 'error');
        }
    })
    .catch(err => {
        // Revert
        btn.classList.toggle('active');
        dot.style.left = isActive ? '23px' : '3px';
        adminToast('Lỗi', 'Có lỗi xảy ra', 'error');
    });
}
</script>
@endpush
@endsection

