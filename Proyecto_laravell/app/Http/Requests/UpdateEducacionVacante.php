<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducacionVacante extends FormRequest{
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
            'puntos' => 'required|min:0',
        ];
    }

    public function messages(){
        return [
            'puntos.required' => 'Obligatorio',
            'puntos.min' => 'Minimo 0',
        ];
    }
}
