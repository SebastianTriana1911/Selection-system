<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOcupacion extends FormRequest{
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
            'nombre' => 'required|min:10',
            'descripcion' => 'required|min:10',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Obligatorio',
            'nombre.min' => 'Necesita mas de 10 caracteres',
            'descripcion.required' => 'Obligatorio',
            'descripcion.min' => 'Necesita mas de 10 caracteres',
        ];
    }
}
