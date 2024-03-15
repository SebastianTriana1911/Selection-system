<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidatoEducacion extends FormRequest{
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
            'institucion' => 'required',
            'titulado' => 'required',
            'año_inicio' => 'required',
            'año_finalizacion' => 'required',
        ];
    }

    public function messages(){
        return [
            'institucion.required' => 'Campo obligatorio.',
            'titulado.required' => 'Campo obligatorio.',
            'año_inicio.required' => 'Campo obligatorio.',
            'año_finalizacion.required' => 'Campo obligatorio.'
        ];
    }
}
