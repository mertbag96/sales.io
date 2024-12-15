<?php

namespace App\Http\Requests\CRM\Administration\Companies;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role_id == 1;
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
                'unique:companies,name,' . $this->route('company')->id,
                'min:4',
                'max:64'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:companies,email,' . $this->route('company')->id,
                'min:4',
                'max:48'
            ],
            'phone' => [
                'required',
                'string',
                'unique:companies,phone,' . $this->route('company')->id,
                'min:10',
                'max:13',
                'regex:/^(\+90|0)?[5-9]\d{2}\d{3}\d{4}$/'
            ],
            'website' => [
                'required',
                'url',
                'unique:companies,website,' . $this->route('company')->id
            ],
            'address' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[a-zA-Z0-9\s,.#\-\/]+$/'
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
            'regex' => 'Please provide a valid :attribute.',
            'url' => 'Please provide a valid :attribute.'
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
            'email' => 'email address',
            'phone' => 'phone number',
            'website' => 'website',
            'address' => 'address'
        ];
    }
}
