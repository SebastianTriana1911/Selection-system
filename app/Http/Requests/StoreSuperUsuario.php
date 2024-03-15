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
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'genero' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
    }

    public function messages(){
        return [
            'num_documento.required' => 'Campo obligatorio.',
            'num_documento.max' => 'Muchos caracteres.',
            'num_documento.min' => 'Pocos caracteres.',
            'num_documento.unique' => 'Ya existe ese documento.',
            'nombre.required' => 'Campo obligatorio.',
            'apellido.required' => 'Campo obligatorio.',
            'email.required' => 'Campo obligatorio.',
            'email.unique' => 'Ya existe ese email.',
            'password.required' => 'Campo obligatorio.'
        ];
    }
}
