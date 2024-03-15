<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOcupacion extends FormRequest{
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
            'codigo' => 'required|min:0',
            'nombre' => 'required|min:10',
            'descripcion' => 'required|min:10',
        ];
    }

    public function messages(){
        return [
            'codigo.required' => 'Campo obligatorio',
            'codigo.min' => 'Pocos caracteres',
            'nombre.required' => 'Campo obligatorio',
            'nombre.min' => 'Pocos caracteres',
            'descripcion.required' => 'Campo obligatorio',
            'descripcion.min' => 'Pocos caracteres',
        ];
    }
}
