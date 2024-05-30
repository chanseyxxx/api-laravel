<?php

use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/users', function (Request $request) {
//    return response()->json([
//        'status' => true,
//        'message' => "Listar Usuários",
//    ],200);
//});

//Route::get('/users',[UserController::class,'index']);
//Route::get('/users/{user}', [UserController::class , 'show']);

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']); // Listar todos os usuários
    Route::post('/', [UserController::class, 'store']); // Criar um novo usuário
    Route::get('/{user}', [UserController::class, 'show']); // Mostrar um usuário específico
    Route::put('/{user}', [UserController::class, 'update']); // Atualizar um usuário
    Route::delete('/{user}', [UserController::class, 'destroy']); // Excluir um usuário
});