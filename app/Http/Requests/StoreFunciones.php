<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFunciones extends FormRequest{
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
            'funcion' => 'required|min:8',
            'descripcion' => 'required|min:10'
        ];
    }

    public function messages(){
        return [
            'funcion.required' => 'Obligatorio',
            'funcion.min' => 'Pocos caracteres',
            'descripcion.required' => 'Obligatorio',
            'descripcion.min' => 'Pocos caracteres'
        ];
    }
}
