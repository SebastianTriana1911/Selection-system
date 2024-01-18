<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCargo extends FormRequest{
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
            'cargo' => 'required|min:10',
            'ocupacion_id' => 'required',
            'habilidad' => 'min:10',
            'competencia' => 'min:10',
        ];
    }

    public function messages(){
        return [
            'cargo.required' => "Obligatorio",
            'cargo.min' => "Minimo 10 caracteres",
            'ocupacion_id.required' => "Obligatorio",
            'habilidad.min' => "Pocos caracter",
            'competencia.min' => "Pocos caracter",
        ];
    }
}
