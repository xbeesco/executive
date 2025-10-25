<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormController
{
    public function submit(Request $request, Form $form)
    {
        abort_if($form->status !== 'active', 404);

        $rules = [];
        foreach ($form->fields as $field) {
            if ($field['required'] ?? false) {
                $rules[$field['slug']] = 'required';
            } else {
                $rules[$field['slug']] = 'nullable';
            }

            $rules[$field['slug']] .= match ($field['type'] ?? 'text') {
                'email' => '|email',
                'number' => '|numeric',
                default => '',
            };
        }

        $validated = $request->validate($rules);

        FormSubmission::create([
            'form_id' => $form->id,
            'data' => $validated,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $settings = $form->settings ?? [];
        $redirectUrl = $settings['redirect_url'] ?? '/thank-you';
        $successMessage = $settings['success_message'] ?? 'Thank you for your submission!';

        return redirect($redirectUrl)->with('success', $successMessage);
    }
}
