<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\FormSubmission;
use App\Models\FormTemplate;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    public function submit(Request $request, FormTemplate $formTemplate)
    {
        // Validate based on form fields
        $rules = [];
        foreach ($formTemplate->fields as $field) {
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
        FormSubmission::create([
            'form_template_id' => $formTemplate->id,
            'modal_form_id' => null,
            'data' => $sanitizedData,
            'source' => $request->input('source', 'widget'),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'submitted_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Form đã được gửi thành công!',
        ]);
    }
}
