<?php

namespace App\Http\Requests\CRM\Profile;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        return $request->user->id === auth()->id();
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
            'max' => 'The :attribute may not be greater than :max characters.'
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
            'email' => 'email address'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $user = $this->route('user');

            if ($this->name === $user->name) {
                $validator
                    ->errors()
                    ->add('name', 'Please provide a new name to update your profile.');
            }

            if ($this->surname === $user->surname) {
                $validator
                    ->errors()
                    ->add('surname', 'Please provide a new surname to update your profile.');
            }

            if ($this->email === $user->email) {
                $validator
                    ->errors()
                    ->add('email', 'Please provide a new email address to update your profile.');
            }
        });
    }
}
