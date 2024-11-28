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
                'max:50'
            ],
            'surname' => [
                'required',
                'string',
                'max:50'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
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
            'name.required' => 'The :attribute field is required.',
            'name.string' => 'Please provide a valid :attribute.',
            'name.max' => 'The :attribute must be maximum :max characters long.',
            'surname.required' => 'The :attribute field is required.',
            'surname.string' => 'Please provide a valid :attribute.',
            'surname.max' => 'The :attribute must be maximum :max characters long.',
            'email.required' => 'The :attribute field is required.',
            'email.string' => 'Please provide a valid :attribute.',
            'email.email' => 'Please provide a valid :attribute.',
            'email.max' => 'Please provide a valid :attribute.',
            'password.required' => 'The :attribute field is required.',
            'password.string' => 'Please provide a valid :attribute.',
            'password.min' => 'The :attribute must be at least :min characters long.',
            'password.max' => 'The :attribute must be maximum :max characters long.',
            'password.regex' => 'The :attribute must include at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'check.accepted' => 'You must accept the :attribute.'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string> An array where the keys are attribute names
     *                              (e.g., 'email') and the values are user-friendly
     *                              attribute labels (e.g., 'email').
     */
    public function attributes(): array
    {
        return [
            'name' => 'name',
            'surname' => 'surname',
            'email' => 'email',
            'password' => 'password',
            'check' => 'terms and conditions'
        ];
    }
}
