<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfesion extends FormRequest{
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
            'titulado' => 'required|string|min:8',
            'institucion' => 'required|string|min:8',
            'documento' => 'required'
        ];
    }

    public function messages(){
        return [
            'titulado.required' => 'Obligatorio',
            'titulado.string' => 'Debe ser texto',
            'titulado.min' => 'minimo 8 caracteres',
            'institucion.required' => 'Obligatorio',
            'institucion.string'=> 'Debe ser texto',
            'institucion.min' => 'minimo 8 caracteres',
            'documento' => 'Obligatorio'
        ];
    }
}
