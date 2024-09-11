<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/',[LoginController::class,'login'])->name('login');//POST -> http://127.0.0.1:8000/api/-{"email":"maria@example.com","password":"senha123"}

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/users',[UserController::class,'index']);//GET - http://127.0.0.1:8000/api/users?page=2
    Route::post('/logout/{user}',[UserController::class,'logout']);//GET - http://127.0.0.1:8000/api/logout/1

});

