<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfesion extends FormRequest{
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
            'titulado' => 'required|min:8',
            'institucion' => 'required|min:8',
        ];
    }

    public function messages(){
        return [
            'titulado.required' => 'Campo obligatorio.',
            'titulado.min' => 'Pocos caracteres.',
            'institucion.required'=> 'Campo obligatorio.',
            'institucion.min' => 'Pocos caracteres.',
        ];
    }
}
