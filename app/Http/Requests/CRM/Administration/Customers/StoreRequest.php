<?php

namespace App\Http\Requests\CRM\Administration\Customers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role_id === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:24'
            ],
            'surname' => [
                'required',
                'string',
                'min:2',
                'max:24'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users,email',
                'min:4',
                'max:48'
            ],
            'phone' => [
                'required',
                'string',
                'unique:companies,phone',
                'min:10',
                'max:13',
                'regex:/^(\+90|0)?[5-9]\d{2}\d{3}\d{4}$/'
            ],
            'address' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[a-zA-Z0-9\s,.#\-\/]+$/'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:24',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8',
                'max:24',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/'
            ]
        ];
    }

    /**
     * Get the validation error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'The :attribute is required.',
            'string' => 'Please provide a valid :attribute.',
            'email' => 'Please provide a valid :attribute.',
            'unique' => 'This :attribute is already in use.',
            'min' => 'The :attribute must be at least :min characters.',
            'max' => 'The :attribute may not be greater than :max characters.',
            'phone.regex' => 'Please provide a valid :attribute.',
            'address.regex' => 'Please provide a valid :attribute.',
            'password.regex' => 'The :attribute must include at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'password_confirmation.regex' => 'The :attribute must include at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'confirmed' => 'The passwords do not much.'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'name',
            'surname' => 'surname',
            'email' => 'email address',
            'phone' => 'phone number',
            'address' => 'address',
            'password' => 'password',
            'password_confirmation' => 'password confirmation',
        ];
    }
}
