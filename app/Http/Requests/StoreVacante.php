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
            'meses_experiencia' => 'required',
            'salario' => 'required',
            'puntos' => 'required|min:0',
            'titulado' => 'required'
        ];
    }

    public function messages(){
        return [
            'codigo.required' => 'Campo obligatorio.',
            'codigo.unique' => 'Ya existe ese codigo.',
            'codigo.min' => 'Pocos caracteres.',
            'codigo.max' => 'Muchos caracteres.',
            'num_vacante.required' => 'Campo obligatorio.',
            'num_vacante.min' => 'Pocos caracteres.',
            'meses_experiencia.required' => 'Campo obligatorio.',
            'salario.required' => 'Campo obligatorio.',
            'puntos.required' => 'Campo obligatorio.',
            'puntos.min' => 'Minimo 0.',
            'titulado.required' => 'Campo obligatorio.',
        ];
    }
}
