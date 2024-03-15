<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCargo extends FormRequest{
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
            'habilidad' => 'min:10',
            'competencia' => 'min:10',
        ];
    }

    public function messages(){
        return [
            'cargo.required' => "Campo obligatorio",
            'cargo.min' => "Pocos caracteres",
            'habilidad.min' => "Pocos caracteres",
            'competencia.min' => "Pocos caracteres",
        ];
    }
}
