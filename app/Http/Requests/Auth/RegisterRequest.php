<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:48'
            ],
            'surname' => [
                'required',
                'string',
                'max:48'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'min:8',
                'max:24',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&#]/'
            ],
            'check' => [
                'accepted'
            ]
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
            'name.required' => __('auth.name_required'),
            'name.string' => __('auth.name_string'),
            'name.max' => __('auth.name_max'),
            'surname.required' => __('auth.surname_required'),
            'surname.string' => __('auth.surname_string'),
            'surname.max' => __('auth.surname_max'),
            'email.required' => __('auth.email_required'),
            'email.string' => __('auth.email_regex'),
            'email.email' => __('auth.email_regex'),
            'email.max' => __('auth.email_regex'),
            'email.unique' => __('auth.email_unique'),
            'password.required' => __('auth.password_required'),
            'password.min' => __('auth.password_min'),
            'password.max' => __('auth.password_max'),
            'password.regex' => __('auth.password_regex'),
            'check.accepted' => __('auth.check_accepted')
        ];
    }
}
