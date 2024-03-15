<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidato extends FormRequest
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
    public function rules(): array{
        return [
            'num_documento' => 'required|max:11|min:7|unique:users',
            'tipo_documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'perfil_ocupacional' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'num_documento.required' => 'Campo obligatorio',
            'num_documento.min' => 'Pocos caracteres',
            'num_documento.max' => 'Muchos caracteres',
            'num_documento.unique' => 'Ya existe ese documento',
            'tipo_documento.required' => 'Campo obligatorio',
            'nombre.required' => 'Campo obligatorio',
            'apellido.required' => 'Campo obligatorio',
            'email.required' => 'Campo obligatorio',
            'email.unique' => 'Ya existe ese email',
            'password.required' => 'Campo obligatorio',
            'fecha_nacimiento.required' => 'Campo obligatorio',
            'direccion.required' => 'Campo obligatorio',
            'telefono.required' => 'Campo obligatorio',
            'perfil_ocupacional.required' => 'Campo obligatorio',
            'perfil_ocupacional.min' => 'Pocos caracteres'
        ];
    }
}
