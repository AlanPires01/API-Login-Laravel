<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/**
 * Class PasswordResetService
 * 
 * Esta classe fornece métodos para validar códigos de redefinição de senha.
 */
class ResetPasswordValidateCodeService
{

    /**
     * Valida o código de redefinição de senha.
     *
     * @param string $email O e-mail do usuário.
     * @param string $code O código de redefinição de senha fornecido pelo usuário.
     * @return array Um array contendo o status da validação e uma mensagem correspondente.
     */
    public function resetPasswordValidateCode($email, $code): array
    {

        // Recuperar o token do usuário
        $passwordResetTokens = DB::table('password_reset_tokens')->where('email', $email)->first();

        // Verificar se encontrou o usuário no banco de dados com token de redefinição de senha
        if(!$passwordResetTokens){

            // Salvar log
            Log::notice('Código não encontrado.', ['email' => $email]);

            return [
                'status' => false,
                'message' => 'Código não encontrado!',
            ];
        }

        // Validar o código enviado pelo usuário com o token salvo no banco de dados
        if(!Hash::check($code, $passwordResetTokens->token)){

            // Salvar log
            Log::notice('Código inválido.', ['email' => $email]);

            return [
                'status' => false,
                'message' => 'Código inválido!',
            ];
        }

        // Calcular a diferença em minutos entre o momento atual e o $createdAt
        $differenceInMinutes = Carbon::parse($passwordResetTokens->created_at)->diffInMinutes(Carbon::now());

        // Verificar se a diferença é maior que 60 minutos
        if($differenceInMinutes > 60){

            // Salvar log
            Log::notice('Código expirado.', ['email' => $email]);

            return [
                'status' => false,
                'message' => 'Código expirado!',
            ];

        }

        // Sucesso, token válido
        return [
            'status' => true,
            'message' => 'Código válido!',
        ];

        
    }

}