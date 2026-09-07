<div style="margin-bottom:8px;" x-data="colorPicker('{{ $value }}')">
    <label class="form-label">{{ $label }}</label>
    <div style="display:flex;align-items:center;background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:5px 10px 5px 5px;gap:8px;transition:border-color .15s;" onfocusin="this.style.borderColor='#3b82f6'" onfocusout="this.style.borderColor='#e2e8f0'">
        <div style="position:relative;width:32px;height:32px;flex-shrink:0;border-radius:6px;overflow:hidden;border:1px solid #e2e8f0;">
            <input type="color" x-model="hex" @input="updateFromHex()"
                   style="position:absolute;inset:0;width:150%;height:150%;margin:-25%;cursor:pointer;border:none;padding:0;outline:none;">
        </div>
        <input type="text" name="{{ $name }}" x-model="hex" @input="updateFromHex()"
               placeholder="#000000"
               style="flex:1;background:transparent;border:none;padding:0;font-size:12px;font-weight:700;color:#0f172a;outline:none;text-transform:uppercase;letter-spacing:.05em;">
        <div style="display:flex;align-items:center;gap:4px;opacity:.5;">
            <span style="font-size:9px;color:#94a3b8;">R</span><span style="font-size:10px;font-weight:700;color:#0f172a;" x-text="r"></span>
            <span style="font-size:9px;color:#94a3b8;margin-left:3px;">G</span><span style="font-size:10px;font-weight:700;color:#0f172a;" x-text="g"></span>
            <span style="font-size:9px;color:#94a3b8;margin-left:3px;">B</span><span style="font-size:10px;font-weight:700;color:#0f172a;" x-text="b"></span>
        </div>
    </div>
</div>
