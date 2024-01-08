<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructor extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            'num_documento' => 'required|max:11|min:7|unique:users',
            'tipo_documento' => 'required',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'genero' => 'required',
            'estado_civil' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    public function messages(){
        return [
            'num_documento.required' => 'Obligatorio',
            'num_documento.max:11' => 'Debe ser menos de 11',
            'num_documento.min:7' => 'Debe ser mas de 7',
            'num_documento.unique' => 'Ya existe',
            'tipo_documento.required' => 'Obligatorio',
            'nombre.required' => 'Obligatorio',
            'nombre.string' => 'No se aceptan numeros',
            'apellido.required' => 'Obligatorio',
            'apellido.string' => 'No se aceptan numeros',
            'genero.required' => 'Obligatorio',
            'estado_civil.required' => 'Obligatorio',
            'email.required' => 'Obligatorio',
            'email.email' => 'Debe ser un email',
            'email.unique' => 'Ya existe',
            'password.required' => 'Obligatorio',
        ];
    }
}
