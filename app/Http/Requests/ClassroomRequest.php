<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //RECORDAR AUTORIZAR PONIENDO VALO A TRUE
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
            'class_name' => [
                'required',
                'unique:classrooms,class_name',
                'string',
                'min:3',
                'max:25',
            ],
            'user_id' => 'nullable',
            'stage_id' => 'required|integer|',
            'level_id' => 'required|integer|',
        ];
    }

    public function messages(): array
    {
        return [
            'class_name.required' => 'El nombre de la clase es obligatorio.',
            'class_name.unique' => 'El nombre de la clase ya existe, prueba con otro.',
            'class_name.string' => 'El nombre de la clase debe ser una cadena.',
            'class_name.min' => 'El nombre de la clase debe tener una longitud mínima de 3.',
            'class_name.max' => 'El nombre de la clase debe tener una longitud máxima de 25.',

            'user_id.nullable' => '',

            'stage_id.required' => 'La etapa formativa es obligatoria.',
            'stage_id.integer' => 'El valor introducido no es válido.',

            'level_id.required' => 'El curso es obligatorio.',
            'level_id.integer' => 'El valor introducido no es válido.',


        ];
    }
}
