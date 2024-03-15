<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatoEducacion extends FormRequest{
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
            'institucion' => 'required|min:7',
            'titulado' => 'required|min:7',
            'documento' => 'required',
            'año_inicio' => 'required',
            'año_finalizacion' => 'required',
        ];
    }

    public function messages(){
        return [
            'institucion.required' => 'Campo obligatorio.',
            'institucion.min' => 'Pocos caracteres.',
            'titulado.required' => 'Campo obligatorio.',
            'titulado.min' => 'Pocos caracteres.',
            'documento.required' => 'Campo obligatorio.',
            'año_inicio.required' => 'Campo obligatorio.',
            'año_finalizacion.required' => 'Campo obligatorio.'
        ];
    }
}
