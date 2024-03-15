<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructor extends FormRequest{
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
            'num_documento' => 'required|max:11|min:7|unique:users',
            'nombre' => 'required',
            'apellido' => 'required',
            // Before_or_equal indicara que el usuario debera ingresar una
            // fecha igual o menor a la proporcionada
            'fecha_nacimiento' =>'required|before_or_equal:2010-01-01',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
    }

    public function messages(){
        return [
            'num_documento.required' => 'Campo obligatorio.',
            'num_documento.max' => 'Muchos caracteres.',
            'num_documento.min' => 'Pocos caracteres.',
            'num_documento.unique' => 'Ya existe ese documento.',
            'nombre.required' => 'Campo obligatorio.',
            'apellido.required' => 'Campo obligatorio.',
            'fecha_nacimiento.required' => 'Campo obligatorio.',
            'fecha_nacimiento.before_or_equal' => 'Debe ser menor a 2010-01-01.',
            'direccion.required' => 'Campo obligatorio.',
            'telefono.required' => 'Campo obligatorio.',
            'email.required' => 'Campo obligatorio.',
            'email.unique' => 'Ya existe ese email.',
            'password.required' => 'Campo obligatorio.',
        ];
    }
}
