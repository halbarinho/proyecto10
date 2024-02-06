<?php

namespace App\Http\Requests;

use App\Rules\DniNieValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
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
                'unique:users,email,' . $this->user,
            ],
            'password' => [
                'required',
                'min:6',
                'max:50',
                //'confirmed',
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
        ];
    }
}
