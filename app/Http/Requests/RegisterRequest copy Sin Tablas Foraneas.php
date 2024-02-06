<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DniNieValidationRule;

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
            'dni' => [
                'required',
                // 'regex:/^((([XYZ])[0-9]{7}[A-Z])|([0-9]{8}[A-Z]))$/',
                new DniNieValidationRule(),
            ],
            'name' => [
                'required',
                'max:50',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',

            ],
            'last_name_1' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',
            ],

            'last_name_2' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',
            ],
            'gender' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'min:6',
                'max:50',
                //'confirmed',
            ],
            'confirmation_password' => [
                'required',
                'min:6',
                'max:50',
                'same:password',

            ]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El titulo es requerido',

        ];
    }
}
