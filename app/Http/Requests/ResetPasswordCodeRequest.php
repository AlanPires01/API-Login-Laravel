<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email"=>'required|email',
            "code"=>'required',
            "password"=>'required|min:6',
        ];
    }

    public function messages(): array
    {
        return[
            'email.required'=> 'Campo e-mail é obrigatório!',
            'email.email'=>'Necessário enviar e-email válido!',
            'code.required'=>'Campo código é obrigatório!',
            'password.required'=>'Campo senha é obrigatório!',
            'password.min'=>'A senha deve ter no mínimo :min caracteres!',
        ];
    }

 

}
