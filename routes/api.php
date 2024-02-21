<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ComentarioController;



Route::get('/usuarios', [UserController::class, 'index']);
Route::post('/editar_usuario', [UserController::class, 'update']);
Route::post('/registrar_usuario', [UserController::class, 'create']);
Route::delete('/delete_usuario/{id}', [UserController::class, 'destroy']);

Route::get('/tours', [TourController::class, 'index']);
Route::post('/registrar_tour', [TourController::class, 'create']);
Route::post('/editar_tour', [TourController::class, 'update']);
Route::delete('/delete_tour/{id}', [TourController::class, 'destroy']);

Route::get('/comentarios', [ComentarioController::class, 'index']);
Route::post('/registrar_comentario', [ComentarioController::class, 'create']);
Route::delete('/delete_comentario/{id}', [ComentarioController::class, 'destroy']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
