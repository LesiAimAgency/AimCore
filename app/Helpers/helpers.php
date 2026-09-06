<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('setting')) {
    function setting($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('settings');
        }

        if (is_array($key)) {
            foreach ($key as $k => $v) {
                set_config($k, $v);
            }

            return true;
        }

        $value = get_config($key, $default);

        // Return arrays for complex settings like watermark
        if (is_array($value)) {
            return $value;
        }

        return $value;
    }
}

if (! function_exists('setting_string')) {
    function setting_string($key, $default = '')
    {
        $value = setting($key, $default);

        if (is_string($value)) {
            return $value;
        }

        if (is_array($value)) {
            return $default;
        }

        if (is_null($value) || $value === '') {
            return $default;
        }

        return (string) $value;
    }
}

if (! function_exists('trans_db')) {
    function trans_db($key, $replace = [], $locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        $translations = setting('translations', []);
        if (is_string($translations)) {
            $translations = json_decode($translations, true) ?: [];
        }

        if (is_array($translations)) {
            foreach ($translations as $trans) {
                if (isset($trans['key']) && $trans['key'] === $key) {
                    $text = $trans['values'][$locale] ?? ($trans['values']['vi'] ?? null);
                    if (! empty($text)) {
                        foreach ($replace as $search => $value) {
                            $text = str_replace(":$search", $value, $text);
                        }

                        return $text;
                    }
                }
            }
        }

        return $key;
    }
}

if (! function_exists('current_project')) {
    function current_project()
    {
        return request()->attributes->get('project');
    }
}

if (! function_exists('can_project')) {
    function can_project($module, $action = 'view')
    {
        $project = current_project();
        if (! $project) {
            return true; // Default admin panel
        }

        return $project->hasPermission($module, $action);
    }
}

if (! function_exists('render_menu')) {
    function render_menu($location = 'header')
    {
        $menu = null;
        try {
            $menu = Menu::where('location', $location)
                ->where('is_active', true)
                ->with(['items' => function ($query) {
                    $query->whereNull('parent_id')->with('children')->orderBy('order');
                }])
                ->first();
        } catch (Exception $e) {
            // Bỏ qua lỗi nếu bảng menus không tồn tại
        }

        if (! $menu || $menu->items->isEmpty()) {
            return '';
        }

        return view('components.menu-simple', compact('menu'))->render();
    }
}

if (! function_exists('menu_item_url')) {
    function menu_item_url($item)
    {
        if ($item->url) {
            return $item->url;
        }

        if ($item->linkable) {
            switch ($item->linkable_type) {
                case 'App\\Models\\Post':
                    return route('frontend.page', $item->linkable->slug ?? $item->linkable->id);
                case 'App\\Models\\ProductCategory':
                    return route('frontend.category', $item->linkable->slug ?? $item->linkable->id);
                default:
                    return '#';
            }
        }

        return '#';
    }
}

if (! function_exists('setting_json')) {
    function setting_json(string $key, array $default = []): array
    {
        $value = setting($key);
        if (empty($value)) {
            return $default;
        }
        if (is_array($value)) {
            return $value;
        }

        return json_decode($value, true) ?? $default;
    }
}

if (! function_exists('seo_enabled')) {
    function seo_enabled(string $type, string $feature): bool
    {
        $config = setting_json("seo_{$type}_config", []);
        if (isset($config[$feature])) {
            return (bool) $config[$feature];
        }

        return true;
    }
}

if (! function_exists('locale_route')) {
    function locale_route($name, $params = [])
    {
        // Ensure it has project prefix if it's not already prefixed
        if (! str_starts_with($name, 'project.')) {
            $name = 'project.'.$name;
        }

        if (! Route::has($name)) {
            $cleanName = str_replace('project.', '', $name);
            if (Route::has($cleanName)) {
                $name = $cleanName;
            } else {
                return '#';
            }
        }

        if (! is_array($params)) {
            $params = ['slug' => $params];
        } elseif (isset($params[0]) && ! isset($params['slug'])) {
            $params['slug'] = $params[0];
            unset($params[0]);
        }

        $projectCode = request()->route('projectCode')
            ?? (session('current_project')['code'] ?? (session('current_project')->code ?? null));

        if ($projectCode && ! isset($params['projectCode'])) {
            $params['projectCode'] = $projectCode;
        }

        try {
            return route($name, $params);
        } catch (Throwable $e) {
            return '#';
        }
    }
}
if (! function_exists('Lang')) {
    function Lang($key, $replace = [], $locale = null, $fallback = true)
    {
        $locale = $locale ?: app()->getLocale();

        // 1. Check custom database translation
        $dbTrans = trans_db($key, $replace, $locale);
        if ($dbTrans !== $key && ! empty($dbTrans)) {
            return $dbTrans;
        }

        // 2. Check frontend.{key}
        $frontendKey = "frontend.{$key}";
        if (trans()->has($frontendKey, $locale)) {
            return trans($frontendKey, $replace, $locale);
        }

        // 3. Check common.{key}
        $commonKey = "common.{$key}";
        if (trans()->has($commonKey, $locale)) {
            return trans($commonKey, $replace, $locale);
        }

        // 4. Check footer.{key}
        $footerKey = "footer.{$key}";
        if (trans()->has($footerKey, $locale)) {
            return trans($footerKey, $replace, $locale);
        }

        // 5. Check direct key
        if (trans()->has($key, $locale)) {
            return trans($key, $replace, $locale);
        }

        // 6. Fallback to Vietnamese ('vi') if current locale is not 'vi'
        if ($fallback && $locale !== 'vi') {
            return Lang($key, $replace, 'vi', false);
        }

        return $key;
    }
}
if (! function_exists('resolve_image')) {
    function resolve_image($name, $default = null)
    {
        if (empty($name)) {
            return $default ? asset($default) : asset('theme/images/logo/logo-01.svg');
        }
        if (Str::contains($name, '://')) {
            return $name;
        }
        if (str_starts_with($name, 'theme/') || str_starts_with($name, 'storage/') || str_starts_with($name, 'assets/') || str_starts_with($name, 'media/')) {
            return asset($name);
        }

        $dbKey = match ($name) {
            'logo' => 'site_logo',
            'favicon' => 'site_favicon',
            default => "image_{$name}"
        };
        $dbValue = setting($dbKey);
        if ($dbValue) {
            if (Str::contains($dbValue, '://')) {
                return $dbValue;
            }
            if (str_starts_with($dbValue, 'media/')) {
                return Storage::disk('public')->url($dbValue);
            }

            return asset($dbValue);
        }
        if ($default) {
            if (Str::contains($default, '://') || str_starts_with($default, 'theme/') || str_starts_with($default, 'assets/') || str_starts_with($default, 'storage/')) {
                return asset($default);
            }

            return asset("frontend/themes/viettinmartdemo/assets/images/$default");
        }

        return asset('theme/images/logo/logo-01.svg');
    }
}
if (! function_exists('resolve_icon')) {
    function resolve_icon($name, $default = null)
    {
        $dbValue = setting('icon_'.$name);
        if ($dbValue) {
            if (Str::contains($dbValue, '://')) {
                return $dbValue;
            }
            if (str_starts_with($dbValue, 'media/')) {
                return Storage::disk('public')->url($dbValue);
            }
            if (str_contains($dbValue, 'fa-') && ! str_contains($dbValue, '/')) {
                return $dbValue;
            }

            return asset($dbValue);
        }

        if ($default) {
            if (Str::contains($default, '://') || str_starts_with($default, 'theme/') || str_starts_with($default, 'assets/') || str_starts_with($default, 'storage/')) {
                return asset($default);
            }
            if (str_contains($default, 'fa-') && ! str_contains($default, '/')) {
                return $default;
            }
            if (file_exists(public_path('theme/images/icons/'.$default))) {
                return asset('theme/images/icons/'.$default);
            }
        }

        return match ($name) {
            'user' => 'fa-light fa-user',
            'wishlist' => 'fa-regular fa-heart',
            'cart' => 'fa-sharp fa-regular fa-cart-shopping',
            'category', 'category_bar', 'bar-1' => 'theme/images/icons/bar-1.svg',
            'plus' => 'fa-regular fa-plus',
            'clock' => 'fa-regular fa-clock',
            'folder' => 'fa-regular fa-folder',
            'arrow-right' => 'fa-light fa-arrow-right',
            'arrow-left' => 'fa-light fa-arrow-left',
            default => 'fa-regular fa-circle',
        };
    }
}

if (! function_exists('media_url')) {
    function media_url($path, $default = '')
    {
        if (empty($path)) {
            return $default ? asset($default) : asset('theme/images/grocery/01.jpg');
        }

        // 1. Clean corrupt prefixes like /storage/https://... or hardcoded domains
        if (is_string($path)) {
            $path = preg_replace('#^/storage/https?://[^/]+#', '', $path);
            if (Str::contains($path, '127.0.0.1:8000') || Str::contains($path, 'viettinmart.vnglobaltech.com')) {
                $path = preg_replace('#^https?://[^/]+#', '', $path);
            }
        }

        if (Str::contains($path, '://')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/');

        // 2. Direct existence check in public_path
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        // 3. Check crossover between media-files and storage
        if (str_starts_with($cleanPath, 'storage/')) {
            $relativeMedia = preg_replace('#^storage/#', '', $cleanPath);
            // Check in public/media-files/...
            if (file_exists(public_path('media-files/' . $relativeMedia))) {
                return asset('media-files/' . $relativeMedia);
            }
            // Check in storage/app/public/...
            if (file_exists(storage_path('app/public/' . $relativeMedia))) {
                return asset($cleanPath);
            }
        } elseif (str_starts_with($cleanPath, 'media-files/')) {
            $relativeStorage = preg_replace('#^media-files/#', '', $cleanPath);
            // Check in public/storage/...
            if (file_exists(public_path('storage/' . $relativeStorage))) {
                return asset('storage/' . $relativeStorage);
            }
            // Check in storage/app/public/...
            if (file_exists(storage_path('app/public/' . $relativeStorage))) {
                return asset('storage/' . $relativeStorage);
            }
        } elseif (str_starts_with($cleanPath, 'media/')) {
            // Check in public/media-files/media/...
            if (file_exists(public_path('media-files/' . $cleanPath))) {
                return asset('media-files/' . $cleanPath);
            }
            // Check in public/storage/media/...
            if (file_exists(public_path('storage/' . $cleanPath))) {
                return asset('storage/' . $cleanPath);
            }
            // Check in storage/app/public/media/...
            if (file_exists(storage_path('app/public/' . $cleanPath))) {
                return Storage::disk('public')->url($cleanPath);
            }
        }

        // 4. Default asset or fallback
        if (! empty($default)) {
            return asset($default);
        }

        return asset($cleanPath);
    }
}
