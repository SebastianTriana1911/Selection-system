<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducacionVacante extends FormRequest{
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
            'puntos' => 'required|min:1|max:10',
            'titulado' => 'required|min:5'
        ];
    }

    public function messages(){
        return [
            'puntos.required' => 'Campo obligatorio.',
            'puntos.min' => 'Pocos caracteres.',
            'puntos.max' => 'Muchos caracteres.',
            'titulado.required' => 'Campo obligatorio.',
            'titulado.min' => 'Pocos caracteres.'
        ];
    }
}
