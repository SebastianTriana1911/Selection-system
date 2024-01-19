<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacante extends FormRequest{
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
            'codigo' => 'required|unique:vacantes,codigo|min:8|max:8',
            'num_vacante' => 'required|min:1',
            'meses_experiencia' => 'min:1',
            'salario' => 'required',
            'puntos' => 'required|min:0',
        ];
    }

    public function messages(){
        return [
            'codigo.required' => 'Obligatorio',
            'codigo.unique' => 'Ya existe',
            'codigo.min' => 'Minimo 8',
            'codigo.max' => 'Maximo 8',
            'num_vacante.required' => 'Obligatorio',
            'num_vacante.min' => 'Minimo 1',
            'meses_experiencia.min' => 'Minimo 1',
            'salario.required' => 'Obligatorio',
            'puntos.required' => 'Obligatorio',
            'puntos.min' => 'Minimo 0',
        ];
    }
}
