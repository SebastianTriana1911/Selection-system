<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuperUsuario extends FormRequest{
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
            'num_documento.max' => 'Maximo 11',
            'num_documento.min' => 'Minimo 7',
            'num_documento.unique' => 'Ya existe',
            'tipo_documento.required' => 'Obligatorio',
            'nombre.required' => 'Obligatorio',
            'apellido.required' => 'Obligatorio',
            'estado_civil.required' => 'Obligatorio',
            'email.required' => 'Obligatorio',
            'email.email' => 'Asegurese que es un email',
            'email.unique' => 'Ya existe',
            'password.required' => 'Obligatorio'
        ];
    }
}
