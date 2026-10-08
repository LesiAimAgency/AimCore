<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2ThemeWidget extends BaseWidget
{
    public static string $label = 'INBETWEEN V2 Master Theme Landing';

    public static string $description = 'Hiển thị trọn vẹn toàn bộ landing page đẳng cấp cho INBETWEEN V2';

    public static string $icon = 'cube';

    public function render(): string
    {
        return view('widgets.inbetween_v2.theme', [
            'widget' => $this,
            'settings' => $this->settings,
        ])->render();
    }
}
