<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'password' => [
                'required',
            ],
        ];
    }

    /**
     * Get the custom validation messages for the request.
     *
     * @return array<string, string> An array where the keys are validation rules
     *                              (e.g., 'email.required') and the values are
     *                              custom error messages.
     */
    public function messages(): array
    {
        return [
            'email.required' => __('auth.email_required'),
            'email.string' => __('auth.email_regex'),
            'email.email' => __('auth.email_regex'),
            'email.max' => __('auth.email_regex'),
            'password.required' => __('auth.password_required')
        ];
    }
}
