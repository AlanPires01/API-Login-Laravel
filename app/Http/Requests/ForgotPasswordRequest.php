<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ForgotPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            "status"=>false,
            "errors"=> $validator->errors(),
        ],422));
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
        ];
    }

    public function messages(): array
    {
        return[
            'email.required'=>'Campo e-mail é obrigatório!',
            'email.email'=>'Necessário enviar e-mail válido!',
        ];
    }
}
