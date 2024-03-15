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
            'titulado' => 'string|min:8',
            'institucion' => 'string|min:8',
        ];
    }

    public function messages(){
        return [
            'titulado.string' => 'Debe ser texto',
            'titulado.min' => 'minimo 8 caracteres',
            'institucion.string'=> 'Debe ser texto',
            'institucion.min' => 'minimo 8 caracteres',
        ];
    }
}
