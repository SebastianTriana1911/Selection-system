<?php
// StoreLogin funcionara como las validaciones que se haran a 
// la hora de logearse

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogin extends FormRequest{
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
