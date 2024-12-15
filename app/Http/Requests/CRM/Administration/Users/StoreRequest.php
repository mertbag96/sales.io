<?php

namespace App\Http\Requests\CRM\Administration\Users;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /* Authorize Admins & Managers */
        return in_array(auth()->user()->role_id, [1, 2]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        /* Setting up dynamic rules for company depending on the user role */
        $companyRules = [];

        if (!in_array($request->role, [0, 1])) {
            $companyRules = [
                'required',
                'integer',
                'min:1'
            ];
        }

        return [
            'role' => [
                'required',
                'integer',
                'min:1'
            ],
            'company' => $companyRules,
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
            'role.min' => 'The :attribute is required.',
            'company.min' => 'The :attribute is required.',
            'regex' => 'The :attribute must include at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'confirmed' => 'The passwords do not match.'
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
            'role' => 'role',
            'company' => 'company',
            'name' => 'name',
            'surname' => 'surname',
            'email' => 'email address',
            'password' => 'password',
            'password_confirmation' => 'password confirmation'
        ];
    }
}