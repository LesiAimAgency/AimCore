<?php

namespace App\Services\FieldTypes;

class SelectField extends BaseFieldType
{
    public function render(array $config, mixed $value = null): string
    {
        $attributes = $this->getFieldAttributes($config, $value);
        $isMultiple = (bool) ($config['multiple'] ?? false);
        $selectedValue = $value ?? $config['default'] ?? ($isMultiple ? [] : '');

        if ($isMultiple) {
            $attributes['multiple'] = 'multiple';
            if (! str_ends_with($attributes['name'] ?? '', '[]')) {
                $attributes['name'] = ($attributes['name'] ?? '').'[]';
            }
            $attributes['size'] = $config['size'] ?? 5;
            $attributes['class'] = 'w-full px-3 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 text-sm shadow-sm';
        } else {
            $attributes['class'] .= ' appearance-none bg-white';
        }

        $options = $config['options'] ?? [];
        $optionsHtml = '';

        // Add empty option if not required and not multiple
        if (! $isMultiple && ! ($config['required'] ?? false)) {
            $optionsHtml .= '<option value="">-- Chọn --</option>';
        }

        foreach ($options as $optionValue => $optionLabel) {
            // Support both key-value format and array format
            if (\is_array($optionLabel)) {
                $optionValue = $optionLabel['value'] ?? $optionValue;
                $optionLabel = $optionLabel['label'] ?? $optionValue;
            }
            if ($isMultiple) {
                $selected = in_array((string) $optionValue, array_map('strval', (array) $selectedValue), true) ? ' selected' : '';
            } else {
                $selected = ((string) $optionValue === (string) $selectedValue) ? ' selected' : '';
            }
            $optionsHtml .= '<option value="'.htmlspecialchars((string) $optionValue)."\"{$selected}>".htmlspecialchars((string) $optionLabel).'</option>';
        }

        if ($isMultiple) {
            $fieldHtml = '<div class="space-y-1">';
            $fieldHtml .= '<select'.$this->renderAttributes($attributes).">{$optionsHtml}</select>";
            $fieldHtml .= '<p class="text-[11px] text-gray-400">Giữ phím Ctrl (hoặc Cmd trên Mac) để chọn nhiều mục</p>';
            $fieldHtml .= '</div>';
        } else {
            $fieldHtml = '<div class="relative">';
            $fieldHtml .= '<select'.$this->renderAttributes($attributes).">{$optionsHtml}</select>";
            $fieldHtml .= '<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">';
            $fieldHtml .= '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
            $fieldHtml .= '</div>';
            $fieldHtml .= '</div>';
        }

        return $this->renderFieldWrapper($config, $fieldHtml);
    }

    public function validate(mixed $value, array $rules): bool
    {
        // If value is empty and not required, it's valid
        if (empty($value)) {
            return true;
        }

        // Get options from config if available
        $options = $this->config['options'] ?? [];

        // Support both key-value format ['100vh' => 'Full Screen'] and array format [['value' => '100vh', 'label' => 'Full Screen']]
        $validValues = [];
        foreach ($options as $key => $option) {
            if (\is_array($option)) {
                $validValues[] = (string) ($option['value'] ?? $key);
            } else {
                $validValues[] = (string) $key;
            }
        }

        // Filter out empty placeholder options when checking if any valid options exist
        $nonEmptyOptions = array_filter($validValues, fn ($v) => $v !== '');

        // If no options or only empty placeholder option defined, skip strict option validation
        if (empty($nonEmptyOptions)) {
            return true;
        }

        if (\is_array($value)) {
            foreach ($value as $v) {
                if ($v !== '' && ! \in_array((string) $v, $validValues, true)) {
                    return false;
                }
            }

            return true;
        }

        return \in_array((string) $value, $validValues, true);
    }

    /**
     * Set config for validation
     */
    public function setConfig(array $config): self
    {
        $this->config = $config;

        return $this;
    }

    public static function getTypeName(): string
    {
        return 'select';
    }
}
