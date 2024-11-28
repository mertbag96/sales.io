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
                'string'
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
            'email.required' => 'The :attribute field is required.',
            'email.string' => 'Please provide a valid :attribute.',
            'email.email' => 'Please provide a valid :attribute.',
            'email.max' => 'Please provide a valid :attribute.',
            'password.required' => 'The :attribute field is required.',
            'password.string' => 'Please provide a valid :attribute.'
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
            'email' => 'email',
            'password' => 'password'
        ];
    }
}
