@props([
  'name' => 'password',
  'id' => 'id_password',
  'label' => 'Mật khẩu',
  'placeholder' => 'Nhập mật khẩu',
  'required' => true
])

<div class="form-group password-toggle-group" style="position: relative;">
  @if($label)
    <label for="{{ $id }}" class="control-label">{{ $label }}</label>
  @endif
  <div class="input-group">
    <input type="password" 
           name="{{ $name }}" 
           id="{{ $id }}" 
           class="form-control c-password" 
           placeholder="{{ $placeholder }}" 
           {{ $required ? 'required' : '' }} 
           autocomplete="current-password" />
    <span class="input-group-addon mask-toggle-btn" id="mask-pw" style="cursor:pointer; background:#eee;" title="Ẩn/Hiện">
      <i class="fa fa-eye-slash" aria-hidden="true"></i> Hiện
    </span>
  </div>
</div>
