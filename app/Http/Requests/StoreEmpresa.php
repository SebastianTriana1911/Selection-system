<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresa extends FormRequest
{
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
            'nit' => 'required|unique:empresas,nit',
            'nombre' => 'required',
            'telefono' => 'required|min:8|max:10',
            'correo_electronico' => 'required|unique:empresas,correo_electronico',
            'responsable_legal' => 'required|min:5',
            'direccion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nit.required' => 'Campo obligatorio.',
            'nit.unique' => 'Ya existe ese nit.',
            'nombre.required' => 'Campo obligatorio.',
            'telefono.required' => 'Campo obligatorio.',
            'telefono.min' => 'Pocos caracteres.',
            'telefono.max' => 'Muchos caracteres.',
            'correo_electronico.required' => 'Campo obligatorio.',
            'correo_electronico.unique' => 'Ya existe ese email.',
            'responsable_legal.required' => 'Campo obligatorio.',
            'responsable_legal.min' => 'Pocos caracteres.',
            'direccion.required' => 'Campo obligatorio.',
        ];
    }
}
