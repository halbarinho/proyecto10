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
                'unique:users,email',
            ],
            'password' => [
                'required',
                'min:6',
                'max:50',

            ],
            'password_confirmation' => [
                'required',
                'min:6',
                'max:50',
                'same:password',

            ],
            'user_type' => [
                'required',
            ],
            'speciality' => [
                'required_if:user_type,docente',
                'nullable', //AÑADO PARA QUE NO ME DE ERROR SI EL USER ES ESTUDIANTE
                'string',
                'max:50',
            ],
            'date_of_birth' => [
                'required_if:user_type,estudiante',
                'nullable',
                'date',
                'max:50',
            ],
            'history' => [
                'required_if:user_type,estudiante',
                'nullable',
                'string',
                'max:50',
            ],
            'phone_number' => [
                'string',
                'max:20'
            ],
            'class_id' => [
                'string',
                'nullable'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'El titulo es requerido',

        ];
    }
}
