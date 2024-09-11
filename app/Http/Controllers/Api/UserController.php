<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): JsonResponse{
        $users = User::paginate(2);
        return response()->json([
            'status'=>true,
            'users'=>$users,
        ],200);
    }

    public function logout(User $user):JsonResponse{
        try{
            $user-> tokens()->delete();

            return response()->json([
                'status'=>true,
                'message'=>'Deslogado com sucesso',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=> 'Não deslogado.',
            ],500);
        }
        
    }
}
