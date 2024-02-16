<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidatoExperiencia extends FormRequest{

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
            'nombre_empresa' => 'required|min:5',
            'año_inicio' => 'required',
            'año_finalizacion' => 'required',
            'meses' => 'required|min:1',
            'descripcion' => 'required|min:10'
        ];
    }

    public function messages(){
        return [
            'nombre_empresa.required' => 'Obligatorio',
            'nombre_empresa.min' => 'Minimo 5 caracteres',
            'año_inicio.required' => 'Obligatorio',
            'año_finalizacion.required' => 'Obligatorio',
            'meses.required' => 'Obligatorio',
            'meses.min' => 'Minimo 1 mes de experiencia',
            'descripcion.required' => 'Obligatorio',
            'descripcion.min' => 'Minimo 10 caractedes'
        ];
    }
}
