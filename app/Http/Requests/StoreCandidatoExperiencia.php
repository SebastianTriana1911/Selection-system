<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatoExperiencia extends FormRequest{
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
            'certificacion_laboral' => 'required',
            'descripcion' => 'required|min:10'
        ];
    }

    public function messages(){
        return [
            'nombre_empresa.required' => 'Campo obligatorio',
            'nombre_empresa.min' => 'Pocos caracteres',
            'año_inicio.required' => 'Campo obligatorio',
            'año_finalizacion.required' => 'Campo obligatorio',
            'meses.required' => 'Campo obligatorio',
            'meses.min' => 'Minimo 1 mes de experiencia',
            'certificacion_laboral.required' => 'Campo obligatorio',
            'descripcion.required' => 'Campo obligatorio',
            'descripcion.min' => 'Pocos caracteres'
        ];
    }
}
