@php
    $captcha = simple_captcha();
@endphp

<div class="simple-captcha-wrapper">
    <label class="form-label">Security Question</label>
    <div class="flex items-center gap-3">
        <span class="text-sm font-medium">{{ $captcha['question'] }}</span>
        {!! $captcha['field'] !!}
    </div>
    @error('captcha_answer')
        <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror
</div>