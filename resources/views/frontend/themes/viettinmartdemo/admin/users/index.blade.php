@extends('admin.layouts.app')
@section('title', 'Quản lý tài khoản')
@section('page-title', 'Người dùng')
@section('page-subtitle', 'Danh sách người dùng và phân quyền hệ thống')

@section('page-actions')
<div style="display:flex;gap:12px;align-items:center;">
    <span style="font-size:12px;color:#64748b; font-weight:600;">
        Tổng: <strong style="color:#0f172a;">{{ $users->total() }}</strong> tài khoản
    </span>
    <a href="{{ locale_route('admin.users.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Thêm tài khoản
    </a>
</div>
@endsection

@section('content')

{{-- Filters --}}
<div class="card" style="padding:16px 20px;margin-bottom:20px; border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
    <form method="GET" style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;">
        <div style="position:relative;flex:1;min-width:240px;">
            <i class="fa-solid fa-magnifying-glass" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;"></i>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Tìm tên, email, SĐT..."
                   class="form-input" style="padding-left:36px; border-radius:10px; height:40px;">
        </div>
        <select name="role" class="form-select" style="width:180px; border-radius:10px; height:40px;">
            <option value="">Tất cả vai trò</option>
            <option value="admin"         {{ request('role')==='admin' ? 'selected' : '' }}>Admin</option>
            <option value="manager"       {{ request('role')==='manager' ? 'selected' : '' }}>Quản lý</option>
            <option value="store_manager" {{ request('role')==='store_manager' ? 'selected' : '' }}>Quản lý cửa hàng</option>
            <option value="web_admin"     {{ request('role')==='web_admin' ? 'selected' : '' }}>Quản trị Website</option>
            <option value="user"          {{ request('role')==='user'  ? 'selected' : '' }}>Khách hàng</option>
        </select>
        <button type="submit" class="btn btn-primary" style="height:40px; border-radius:10px; padding:0 20px;">
            <i class="fa-solid fa-filter"></i> Lọc
        </button>
        @if(request()->hasAny(['search','role']))
            <a href="{{ locale_route('admin.users.index') }}" class="btn btn-secondary" style="height:40px; border-radius:10px; display:flex; align-items:center;">
                <i class="fa-solid fa-xmark"></i> Xóa lọc
            </a>
        @endif
    </form>
</div>

{{-- Table --}}
<div class="card overflow-hidden" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
    <div class="tbl-wrap">
        <table style="width:100%;border-collapse:separate;border-spacing:0;">
            <thead style="background:#f8fafc;">
                <tr>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Người dùng</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Liên hệ</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">Vai trò</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">Đơn hàng</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Ngày tạo</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="tbl-tr">
                    {{-- Avatar + tên --}}
                    <td class="tbl-td" style="padding:16px;">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#3b82f6,#8b5cf6);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;color:#fff;flex-shrink:0;box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);">
                                {{ strtoupper(mb_substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <a href="{{ locale_route('admin.users.show', $user) }}" style="font-size:14px;font-weight:700;color:#1e293b;text-decoration:none;display:block;margin-bottom:2px;" class="hover:text-blue-600">
                                    {{ $user->name }}
                                </a>
                                <p style="font-size:11px;color:#64748b;display:flex;align-items:center;gap:4px;">
                                    <i class="fa-solid fa-envelope" style="font-size:10px;"></i> {{ $user->email }}
                                </p>
                            </div>
                        </div>
                    </td>

                    {{-- SĐT --}}
                    <td class="tbl-td" style="padding:16px;">
                        @if($user->phone)
                            <a href="tel:{{ $user->phone }}" style="font-size:13px;color:#334155;text-decoration:none;display:flex;align-items:center;gap:6px;font-weight:600;">
                                <i class="fa-solid fa-phone" style="font-size:11px;color:#10b981;"></i> {{ $user->phone }}
                            </a>
                        @else
                            <span style="font-size:12px;color:#cbd5e1;">—</span>
                        @endif
                    </td>

                    {{-- Vai trò --}}
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        @php
                            $badgeClass = [
                                'admin'         => 'badge-red',
                                'manager'       => 'badge-purple',
                                'store_manager' => 'badge-orange',
                                'web_admin'     => 'badge-blue',
                            ][$user->role] ?? 'badge-gray';
                            
                            $icon = [
                                'admin'         => 'fa-shield-halved',
                                'manager'       => 'fa-user-tie',
                                'store_manager' => 'fa-shop',
                                'web_admin'     => 'fa-user-gear',
                            ][$user->role] ?? 'fa-user';
                        @endphp
                        <span class="badge {{ $badgeClass }}" style="border-radius:20px; padding:4px 12px; font-size:10.5px;">
                            <i class="fa-solid {{ $icon }}" style="font-size:9px; margin-right:4px;"></i> {{ $user->role_name }}
                        </span>
                    </td>

                    {{-- Số đơn --}}
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        @if($user->orders_count > 0)
                            <a href="{{ locale_route('admin.users.show', $user) }}"
                               style="display:inline-flex;align-items:center;gap:6px;font-size:14px;font-weight:800;color:#2563eb;text-decoration:none; background:#eff6ff; padding:4px 10px; border-radius:8px;">
                                <i class="fa-solid fa-bag-shopping" style="font-size:11px;"></i>
                                {{ $user->orders_count }}
                            </a>
                        @else
                            <span style="font-size:12px;color:#cbd5e1;">0</span>
                        @endif
                    </td>

                    {{-- Ngày tạo --}}
                    <td class="tbl-td" style="padding:16px;">
                        <span style="font-size:13px;color:#475569; font-weight:600;">{{ $user->created_at->format('d/m/Y') }}</span>
                        <span style="font-size:10px;color:#94a3b8;display:block;">{{ $user->created_at->diffForHumans() }}</span>
                    </td>

                    {{-- Thao tác --}}
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:8px;">
                            <a href="{{ locale_route('admin.users.show', $user) }}" class="act-btn view" style="width:34px; height:34px; border-radius:10px;" title="Xem hồ sơ">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ locale_route('admin.users.edit', $user) }}" class="act-btn edit" style="width:34px; height:34px; border-radius:10px;" title="Chỉnh sửa">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            @if($user->id !== auth()->id())
                            <form action="{{ locale_route('admin.users.destroy', $user) }}" method="POST"
                                  onsubmit="return confirmDelete('Xóa tài khoản {{ addslashes($user->name) }}?', () => this.submit())">
                                @csrf @method('DELETE')
                                <button type="submit" class="act-btn del" style="width:34px; height:34px; border-radius:10px;" title="Xóa">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:80px;color:#94a3b8;">
                        <div style="width:64px;height:64px;background:#f8fafc;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <i class="fa-solid fa-users-slash" style="font-size:28px;opacity:.3;"></i>
                        </div>
                        <p style="font-size:15px;font-weight:600;color:#64748b;">Không tìm thấy tài khoản nào</p>
                        <p style="font-size:13px;margin-top:4px;">Thử điều chỉnh bộ lọc hoặc thêm tài khoản mới</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
    <div style="padding:20px;border-top:1px solid #f1f5f9;background:#fcfcfc;">
        {{ $users->links() }}
    </div>
    @endif
</div>

@endsection

