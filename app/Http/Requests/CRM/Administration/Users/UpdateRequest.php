<?php

namespace App\Http\Requests\CRM\Administration\Users;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', User::class);
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

        /* Setting up dynamic rules for password fields depending on whether the password is been changed */
        $passwordRules = [];
        $passwordConfirmationRules = [];
        if (isset($request->change_password)) {
            $passwordRules = [
                'required',
                'string',
                'min:8',
                'max:24',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
                'confirmed'
            ];

            $passwordConfirmationRules = [
                'required',
                'string',
                'min:8',
                'max:24',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/'
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
                'unique:users,email,' . $this->route('user')->id,
                'min:4',
                'max:48'
            ],
            'password' => $passwordRules,
            'password_confirmation' => $passwordConfirmationRules
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
            'password_confirmation' => 'password confirmation',
        ];
    }
}
