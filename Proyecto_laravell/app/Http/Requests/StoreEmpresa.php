<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresa extends FormRequest{
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
            'nit' => 'required|unique:empresas,nit',
            'nombre' => 'required',
            'direccion' => 'required',
            'municipio_id' => 'required'
        ];
    }

    public function messages(){
        return[
            'nit.required' => 'Obligatorio',
            'nit.unique' => 'Ya existe',
            'nombre.required' => 'Obligatorio',
            'direccion.required' => 'Obligatorio',
            'minicipio_id.required' => 'Obligatorio'
        ];
    }
}
