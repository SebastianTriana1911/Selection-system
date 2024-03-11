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
            'municipio_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nit.required' => 'Obligatorio',
            'nit.unique' => 'Ya existe',
            'nombre.required' => 'Obligatorio',
            'telefono.required' => 'Obligatorio',
            'telefono.min' => 'Mínimo 8 caracteres',
            'telefono.max' => 'Máximo 10 caracteres',
            'correo_electronico.required' => 'Obligatorio',
            'correo_electronico.unique' => 'Ya existe',
            'correo_electronico.email' => 'Tiene que ser un correo',
            'responsable_legal.required' => 'Obligatorio',
            'responsable_legal.min' => 'Minimo 5 caracteres',
            'direccion.required' => 'Obligatorio',
            'municipio_id.required' => 'Obligatorio'
        ];
    }
}
