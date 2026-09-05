@extends('admin.layouts.app')
@section('title', 'Thêm đại lý')
@section('page-title', 'Thêm đại lý mới')

@section('page-actions')
<a href="{{ locale_route('admin.agents.index') }}" class="btn btn-secondary btn-sm">
    <i class="fa-solid fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<form action="{{ locale_route('admin.agents.store') }}" method="POST">
    @csrf
    <div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start;">

        {{-- Cột trái --}}
        <div style="display:flex;flex-direction:column;gap:16px;">
            <div class="card">
                <div class="card-header"><span class="card-title">Thông tin đại lý</span></div>
                <div class="card-body" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                    <div style="grid-column:1/-1;">
                        <label class="form-label">Tên đại lý / Công ty *</label>
                        <input type="text" name="name" class="form-input" value="{{ old('name') }}" required placeholder="VD: Công ty TNHH ABC">
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Mã đại lý</label>
                        <input type="text" name="code" class="form-input" value="{{ old('code') }}" placeholder="VD: DL001">
                        @error('code')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Loại đại lý *</label>
                        <select name="type" class="form-select" required>
                            @foreach($types as $key => $label)
                                <option value="{{ $key }}" {{ old('type') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-input" value="{{ old('phone') }}" placeholder="0901234567">
                    </div>
                    <div>
                        <label class="form-label">Email liên hệ</label>
                        <input type="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="agent@example.com">
                    </div>

                    {{-- NEW: Liên kết tài khoản --}}
                    <div style="grid-column:1/-1; background:#f8fafc; padding:16px; border-radius:12px; border:1px dashed #e2e8f0;">
                        <label class="form-label" style="color:#1e293b; font-weight:700; margin-bottom:8px; display:flex; align-items:center; gap:8px;">
                            <i class="fa-solid fa-user-shield text-blue-500"></i> Liên kết tài khoản hệ thống
                        </label>
                        <select name="user_id" class="form-select" style="background:#fff; border-radius:10px; height:42px;">
                            <option value="">-- Không liên kết tài khoản --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        <p style="font-size:11px; color:#64748b; margin-top:8px;">* Chọn tài khoản để đại lý có thể đăng nhập vào hệ thống.</p>
                        @error('user_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Người liên hệ</label>
                        <input type="text" name="contact_person" class="form-input" value="{{ old('contact_person') }}" placeholder="Họ tên người phụ trách">
                    </div>
                    <div style="grid-column:1/-1; margin-bottom:10px;">
                        <label class="form-label" style="margin-bottom:8px;">Khu vực phụ trách (Tỉnh/Thành, Quận/Huyện)</label>
                        <x-address-selector 
                            container-class="grid grid-cols-1 md:grid-cols-2 gap-4"
                            col-class=""
                            select-class="form-select"
                            :required="false"
                        />
                    </div>
                    <div style="grid-column:1/-1;">
                        <label class="form-label">Địa chỉ</label>
                        <textarea name="address" class="form-textarea" rows="2" placeholder="Địa chỉ đầy đủ">{{ old('address') }}</textarea>
                    </div>
                    <div style="grid-column:1/-1;">
                        <label class="form-label">Ghi chú nội bộ</label>
                        <textarea name="notes" class="form-textarea" rows="3" placeholder="Ghi chú về đại lý này...">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cột phải --}}
        <div style="display:flex;flex-direction:column;gap:16px;">
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                <i class="fa-solid fa-save"></i> Lưu đại lý
            </button>
        </div>
    </div>
</form>
@endsection

