---
description: "Guidelines for standardizing Blade form components across the project"
---

# Form Standardization Rule

To ensure consistent UI rendering (borders, padding, focus rings, error states) across the entire application, **you must use the built-in Blade components for form inputs** instead of writing raw HTML tags (like `<input>`, `<select>`, `<textarea>`).

## Blade Components
The project provides several Blade components located in `resources/views/components/form/`:
- `<x-form.label>`
- `<x-form.input>`
- `<x-form.select>`
- `<x-form.textarea>`
- `<x-form.error>`

## Guidelines

### 1. Inputs
**Do NOT use:**
```html
<input type="text" name="title" class="border border-gray-300 rounded ...">
```
**Instead use:**
```blade
<x-form.input name="title" :value="old('title')" placeholder="..." />
```

### 2. Selects
The `<x-form.select>` component supports slots, meaning you can place `<option>` tags inside it.

**Do NOT use:**
```html
<select name="type" class="border border-gray-300 ...">
    <option value="1">One</option>
</select>
```
**Instead use:**
```blade
<x-form.select name="type">
    <option value="">-- Chọn --</option>
    @foreach($items as $item)
        <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected' : '' }}>
            {{ $item->name }}
        </option>
    @endforeach
</x-form.select>
```
*Note: The component automatically injects the standard styling classes (`w-full rounded-lg border border-gray-300 px-4 py-2 ...`). Do not append them manually.*

### 3. Textareas
**Do NOT use:**
```html
<textarea name="note" class="border border-gray-300 ...">{{ old('note') }}</textarea>
```
**Instead use:**
```blade
<x-form.textarea name="note" :value="old('note')" rows="3" />
```

### 4. Form Errors
Components like `input`, `select`, and `textarea` typically render their own errors natively using `@error($name) <x-form.error :message="$message" /> @enderror`.
If you need to render an error manually outside the component, use:
```blade
@error('field_name')
    <x-form.error :message="$message" />
@enderror
```
