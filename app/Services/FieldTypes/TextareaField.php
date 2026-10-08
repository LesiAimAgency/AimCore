<?php

namespace App\Services\FieldTypes;

class TextareaField extends BaseFieldType
{
    public function render(array $config, mixed $value = null): string
    {
        $attributes = $this->getFieldAttributes($config, $value);
        $attributes['rows'] = $config['rows'] ?? 4;
        $attributes['class'] .= ' resize-y';

        if (isset($config['max_length'])) {
            $attributes['maxlength'] = $config['max_length'];
        }

        if (is_array($value)) {
            $parts = [];
            foreach ($value as $item) {
                if (is_array($item)) {
                    $parts[] = $item['title'] ?? $item['name'] ?? $item['text'] ?? implode(' ', array_filter($item, 'is_scalar'));
                } elseif (is_scalar($item)) {
                    $parts[] = (string) $item;
                }
            }
            $value = implode(', ', array_filter(array_map('trim', $parts)));
        }

        $content = htmlspecialchars((string) ($value ?? $config['default'] ?? ''));
        $fieldHtml = '<textarea'.$this->renderAttributes($attributes).">{$content}</textarea>";

        return $this->renderFieldWrapper($config, $fieldHtml);
    }

    public function validate(mixed $value, array $rules): bool
    {
        $defaultRules = ['string'];

        return parent::validate($value, [...$defaultRules, ...$rules]);
    }

    public static function getTypeName(): string
    {
        return 'textarea';
    }
}
