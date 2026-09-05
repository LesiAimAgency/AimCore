<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\ModalForm;
use App\Models\ModalFormSubmission;
use Illuminate\Http\Request;

class ModalFormController extends Controller
{
    public function submit(Request $request, ModalForm $modalForm)
    {
        // Validate based on form fields
        $rules = [];
        foreach ($modalForm->fields as $field) {
            $fieldRules = [];

            if ($field['required'] ?? false) {
                $fieldRules[] = 'required';
            }

            switch ($field['type']) {
                case 'email':
                    $fieldRules[] = 'email';
                    break;
                case 'number':
                    $fieldRules[] = 'numeric';
                    break;
                case 'tel':
                    $fieldRules[] = 'string';
                    break;
                default:
                    $fieldRules[] = 'string';
            }

            if (! empty($fieldRules)) {
                $rules[$field['name']] = implode('|', $fieldRules);
            }
        }

        $validatedData = $request->validate($rules);

        // Sanitize all string data to prevent XSS
        $sanitizedData = sanitize_json_data($validatedData);

        // Save submission
        ModalFormSubmission::create([
            'modal_form_id' => $modalForm->id,
            'data' => $sanitizedData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'submitted_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Form đã được gửi thành công!',
        ]);
    }

    public function getActiveModal(Request $request)
    {
        $modal = ModalForm::where('is_active', true)->first();

        if (! $modal) {
            return response()->json(['modal' => null]);
        }

        // Check if should show based on frequency
        $sessionKey = "modal_shown_{$modal->id}";
        $cookieKey = "modal_shown_{$modal->id}";

        switch ($modal->show_frequency) {
            case 'once_per_session':
                if (session()->has($sessionKey)) {
                    return response()->json(['modal' => null]);
                }
                session()->put($sessionKey, true);
                break;

            case 'once_per_day':
                if ($request->cookie($cookieKey)) {
                    return response()->json(['modal' => null]);
                }
                cookie()->queue($cookieKey, true, 24 * 60); // 24 hours
                break;

            case 'once_per_week':
                if ($request->cookie($cookieKey)) {
                    return response()->json(['modal' => null]);
                }
                cookie()->queue($cookieKey, true, 7 * 24 * 60); // 7 days
                break;
        }

        return response()->json([
            'modal' => [
                'id' => $modal->id,
                'config' => $modal->config,
                'trigger_type' => $modal->trigger_type,
                'trigger_delay' => $modal->trigger_delay,
                'trigger_scroll' => $modal->trigger_scroll,
            ],
        ]);
    }
}
