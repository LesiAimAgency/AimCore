<?php

namespace App\Services\FieldTypes;

use App\Services\FieldTypeService;

class RepeatableField extends BaseFieldType
{
    public function render(array $config, mixed $value = null): string
    {
        $fieldId = $this->getFieldId($config);
        $items = \is_array($value) ? $value : [];
        $maxItems = isset($config['max_items']) ? (int) $config['max_items'] : 0;
        $minItems = $config['min_items'] ?? 0;
        $subFields = $config['fields'] ?? [];
        $allowAdd = $config['allow_add'] ?? true;
        $allowDelete = $config['allow_delete'] ?? true;

        // If items are empty and default is provided, use default
        if (empty($items) && ! empty($config['default']) && \is_array($config['default'])) {
            $items = $config['default'];
        } elseif (! $allowAdd && ! empty($config['default']) && \is_array($config['default'])) {
            // When add is disabled and default exists, enforce fixed items structure
            $defaultItems = array_values($config['default']);
            $currentValues = array_values($items);
            $merged = [];
            $count = max(\count($defaultItems), (int) $minItems);
            for ($i = 0; $i < $count; $i++) {
                $def = $defaultItems[$i] ?? [];
                $cur = $currentValues[$i] ?? [];
                $merged[] = array_merge($def, \is_array($cur) ? $cur : []);
            }
            $items = $merged;
        }

        // Generate template for JavaScript
        $templateHtml = $allowAdd ? $this->renderRepeatableItem($config['name'], '__INDEX__', [], $subFields, $allowDelete) : '';
        $templateHtml = str_replace(["\n", "\r"], ['', ''], $templateHtml);
        $templateEncoded = htmlspecialchars($templateHtml, ENT_QUOTES, 'UTF-8');

        $fieldHtml = "<div class=\"repeatable-field\" data-max-items=\"{$maxItems}\" data-min-items=\"{$minItems}\">";

        // Items container with template stored in data attribute
        $fieldHtml .= "<div id=\"{$fieldId}_container\" class=\"space-y-4 mb-4\" data-template=\"{$templateEncoded}\">";

        foreach ($items as $index => $item) {
            $fieldHtml .= $this->renderRepeatableItem($config['name'], $index, $item, $subFields, $allowDelete);
        }

        // Add empty item if no items exist and min_items > 0
        if (empty($items) && $minItems > 0) {
            for ($i = 0; $i < $minItems; $i++) {
                $fieldHtml .= $this->renderRepeatableItem($config['name'], $i, [], $subFields, $allowDelete);
            }
        }

        $fieldHtml .= '</div>';

        // Add button - only if allow_add is true
        if ($allowAdd) {
            $fieldHtml .= "<button type=\"button\" onclick=\"addRepeatableItem('{$fieldId}', '{$config['name']}')\" class=\"inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors\">";
            $fieldHtml .= '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>';
            $fieldHtml .= 'Thêm mục';
            $fieldHtml .= '</button>';
        }

        $fieldHtml .= '</div>';

        return $this->renderFieldWrapper($config, $fieldHtml);
    }

    protected function renderRepeatableItem(string $fieldName, int|string $index, array $item, array $subFields, bool $allowDelete = true): string
    {
        $displayIndex = \is_int($index) ? $index + 1 : $index;
        $isExpanded = ($index === 0 || $index === '0') ? 'true' : 'false';

        $html = '<div x-data="{ expanded: '.$isExpanded.' }" class="repeatable-item border border-gray-200 rounded-lg bg-white shadow-sm mb-4 overflow-hidden">';

        // Header (Clickable to toggle)
        $html .= '<div class="flex justify-between items-center p-4 cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors" @click="expanded = !expanded">';
        $html .= '<h4 class="font-semibold text-gray-700 flex items-center gap-2">';
        $html .= '<svg class="w-4 h-4 transition-transform duration-200" :class="expanded ? \'rotate-180\' : \'\'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
        $itemLabel = "Mục {$displayIndex}";
        if (! empty($item['text'])) {
            $itemLabel .= ' <span class="text-xs font-normal text-gray-500">('.htmlspecialchars((string) $item['text'], ENT_QUOTES, 'UTF-8').')</span>';
        } elseif (! empty($item['title'])) {
            $itemLabel .= ' <span class="text-xs font-normal text-gray-500">('.htmlspecialchars((string) $item['title'], ENT_QUOTES, 'UTF-8').')</span>';
        }
        $html .= "{$itemLabel}</h4>";

        if ($allowDelete) {
            $html .= '<button type="button" onclick="removeRepeatableItem(this)" @click.stop class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 text-sm font-medium transition-colors bg-white px-2 py-1 rounded border border-red-200 shadow-sm">';
            $html .= '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>';
            $html .= 'Xoá';
            $html .= '</button>';
        }
        $html .= '</div>';

        // Body (Collapsible)
        $html .= '<div x-show="expanded" style="display: '.($isExpanded === 'true' ? 'block' : 'none').';" class="p-4 border-t border-gray-200">';
        $html .= '<div class="grid grid-cols-1 gap-5">';

        foreach ($subFields as $subField) {
            $subFieldName = "{$fieldName}[{$index}][{$subField['name']}]";
            $subFieldValue = $item[$subField['name']] ?? ($subField['default'] ?? '');

            $html .= '<div class="col-span-1">';
            $html .= $this->renderSubField($subField, $subFieldName, $subFieldValue);
            $html .= '</div>';
        }

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    protected function renderSubField(array $fieldConfig, string $fieldName, mixed $value): string
    {
        $fieldType = $fieldConfig['type'] ?? 'text';
        $fieldConfig['name'] = $fieldName;

        $fieldTypeService = app(FieldTypeService::class);
        $fieldHandler = $fieldTypeService->get($fieldType);

        if ($fieldHandler) {
            return $fieldHandler->render($fieldConfig, $value);
        }

        return (new TextField)->render($fieldConfig, $value);
    }

    public function validate(mixed $value, array $rules): bool
    {
        if (! \is_array($value)) {
            return false;
        }

        $maxItems = isset($this->config['max_items']) ? (int) $this->config['max_items'] : 0;
        $minItems = $this->config['min_items'] ?? 0;

        if (($maxItems > 0 && \count($value) > $maxItems) || \count($value) < $minItems) {
            return false;
        }

        $subFields = $this->config['fields'] ?? [];
        foreach ($value as $item) {
            if (! \is_array($item)) {
                return false;
            }

            foreach ($subFields as $subField) {
                $subFieldValue = $item[$subField['name']] ?? null;
                $subFieldRules = explode('|', $subField['validation'] ?? '');

                if (! $this->validateSubField($subFieldValue, $subFieldRules, $subField)) {
                    return false;
                }
            }
        }

        return parent::validate($value, $rules);
    }

    protected function validateSubField(mixed $value, array $rules, array $fieldConfig): bool
    {
        $fieldType = $fieldConfig['type'] ?? 'text';

        return match ($fieldType) {
            'text' => (new TextField)->validate($value, $rules),
            'textarea' => (new TextareaField)->validate($value, $rules),
            'select' => (new SelectField($fieldConfig))->validate($value, $rules),
            'checkbox' => (new CheckboxField)->validate($value, $rules),
            default => true,
        };
    }

    public static function getTypeName(): string
    {
        return 'repeatable';
    }
}
