@extends('admin.layouts.app')

@section('title', 'Module Manager')
@section('page-title', 'Module Manager')
@section('page-subtitle', 'Bật / tắt các tính năng của website mà không cần sửa code')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Danh sách Module</span>
        <span style="font-size:12px;color:#64748b;">Thay đổi được áp dụng ngay lập tức</span>
    </div>
    <div class="card-body" style="padding:0;">
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1px;background:#f1f5f9;">
            @foreach($modules as $module)
            @php
                $colors = [
                    'blue'   => ['bg'=>'#eff6ff','icon'=>'#3b82f6','border'=>'#bfdbfe'],
                    'orange' => ['bg'=>'#fff7ed','icon'=>'#f97316','border'=>'#fed7aa'],
                    'purple' => ['bg'=>'#faf5ff','icon'=>'#a855f7','border'=>'#e9d5ff'],
                    'yellow' => ['bg'=>'#fefce8','icon'=>'#eab308','border'=>'#fef08a'],
                    'rose'   => ['bg'=>'#fff1f2','icon'=>'#f43f5e','border'=>'#fecdd3'],
                    'teal'   => ['bg'=>'#f0fdfa','icon'=>'#14b8a6','border'=>'#99f6e4'],
                    'green'  => ['bg'=>'#f0fdf4','icon'=>'#22c55e','border'=>'#bbf7d0'],
                    'red'    => ['bg'=>'#fff1f2','icon'=>'#ef4444','border'=>'#fecaca'],
                    'indigo' => ['bg'=>'#eef2ff','icon'=>'#6366f1','border'=>'#c7d2fe'],
                    'amber'  => ['bg'=>'#fffbeb','icon'=>'#f59e0b','border'=>'#fde68a'],
                    'cyan'   => ['bg'=>'#ecfeff','icon'=>'#06b6d4','border'=>'#a5f3fc'],
                    'slate'  => ['bg'=>'#f8fafc','icon'=>'#64748b','border'=>'#e2e8f0'],
                ];
                $c = $colors[$module['color']] ?? $colors['slate'];
            @endphp
            <div style="background:#fff;padding:20px 24px;display:flex;align-items:center;gap:16px;"
                 x-data="{ enabled: {{ $module['enabled'] ? 'true' : 'false' }}, loading: false }"
                 :class="enabled ? '' : 'opacity-60'">

                {{-- Icon --}}
                <div style="width:44px;height:44px;border-radius:12px;background:{{ $c['bg'] }};border:1px solid {{ $c['border'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="{{ $module['icon'] }}" style="color:{{ $c['icon'] }};font-size:18px;"></i>
                </div>

                {{-- Info --}}
                <div style="flex:1;min-width:0;">
                    <div style="display:flex;align-items:center;gap:8px;">
                        <p style="font-size:14px;font-weight:700;color:#0f172a;margin:0;">{{ $module['label'] }}</p>
                        @if(!empty($module['danger']))
                            <span class="badge badge-red" style="font-size:9px;">NGUY HIỂM</span>
                        @endif
                    </div>
                    <p style="font-size:12px;color:#64748b;margin:2px 0 0;line-height:1.4;">{{ $module['description'] }}</p>
                </div>

                {{-- Toggle --}}
                <button
                    @click="
                        loading = true;
                        fetch('{{ locale_route('admin.modules.toggle', $module['key']) }}', {
                            method: 'POST',
                            headers: {'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
                            body: JSON.stringify({ enabled: !enabled })
                        })
                        .then(r => r.json())
                        .then(d => {
                            if (d.success) {
                                enabled = !enabled;
                                adminToast(enabled ? 'Đã bật' : 'Đã tắt', d.message, 'success');
                            }
                        })
                        .finally(() => loading = false)
                    "
                    :disabled="loading"
                    style="position:relative;width:48px;height:26px;border-radius:999px;border:none;cursor:pointer;transition:background .2s;flex-shrink:0;"
                    :style="enabled ? 'background:#22c55e' : 'background:#cbd5e1'"
                    title="Bật/tắt module">
                    <span style="position:absolute;top:3px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.2);transition:left .2s;"
                          :style="enabled ? 'left:25px' : 'left:3px'"></span>
                    <span x-show="loading" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-spinner fa-spin" style="font-size:10px;color:#fff;"></i>
                    </span>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Info box --}}
<div style="margin-top:16px;padding:16px 20px;background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;display:flex;gap:12px;align-items:flex-start;">
    <i class="fa-solid fa-circle-info" style="color:#3b82f6;margin-top:2px;flex-shrink:0;"></i>
    <div style="font-size:13px;color:#1e40af;line-height:1.6;">
        <strong>Lưu ý:</strong> Tắt module sẽ ẩn tính năng đó khỏi frontend nhưng <strong>không xóa dữ liệu</strong>.
        Bật lại bất cứ lúc nào để khôi phục. Module <span style="color:#ef4444;font-weight:700;">Maintenance Mode</span> sẽ chặn toàn bộ khách truy cập.
    </div>
</div>

{{-- Maintenance message config --}}
<div class="card" style="margin-top:16px;" x-data="{ show: {{ module_enabled('maintenance') ? 'true' : 'false' }} }" x-show="show" x-cloak>
    <div class="card-header">
        <span class="card-title"><i class="fa-solid fa-triangle-exclamation" style="color:#ef4444;"></i> Cấu hình Maintenance Mode</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ locale_route('admin.modules.save-maintenance') }}">
            @csrf
            <label class="form-label">Thông báo hiển thị cho khách</label>
            <textarea name="maintenance_message" class="form-textarea" rows="3"
                      placeholder="Ví dụ: Website sẽ hoạt động trở lại lúc 10:00 ngày 01/01/2026">{{ get_setting('maintenance_message') }}</textarea>
            <p class="form-hint">Để trống sẽ dùng thông báo mặc định.</p>
            <div style="margin-top:12px;">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-floppy-disk"></i> Lưu thông báo
                </button>
            </div>
        </form>
    </div>
</div>

<div style="margin-top:16px;padding:16px 20px;background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;display:flex;gap:12px;align-items:flex-start;">
    <i class="fa-solid fa-circle-info" style="color:#3b82f6;margin-top:2px;flex-shrink:0;"></i>
    <div style="font-size:13px;color:#1e40af;line-height:1.6;">
        <strong>Lưu ý:</strong> Tắt module sẽ ẩn tính năng đó khỏi frontend nhưng <strong>không xóa dữ liệu</strong>.
        Bật lại bất cứ lúc nào để khôi phục. Module <span style="color:#ef4444;font-weight:700;">Maintenance Mode</span> sẽ chặn toàn bộ khách truy cập — admin vẫn truy cập bình thường.
    </div>
</div>
@endsection

