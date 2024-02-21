<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TourController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/usuarios', [UserController::class, 'index']);
Route::post('/editar_usuario', [UserController::class, 'update']);
Route::post('/registrar_usuario', [UserController::class, 'create']);
Route::delete('/delete_usuario/{id}', [UserController::class, 'destroy']);

Route::get('/tours', [TourController::class, 'index']);
Route::post('/registrar_tour', [TourController::class, 'create']);
Route::post('/editar_tour', [TourController::class, 'update']);
Route::delete('/delete_tour/{id}', [TourController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
