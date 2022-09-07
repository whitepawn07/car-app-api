<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum', )->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'doLogin']);
Route::post('register', [\App\Http\Controllers\Auth\AuthController::class, 'doRegister']);

Route::namespace('Car')->group(function() {
    Route::prefix('cars')->middleware('auth:sanctum')->group(function() {
        Route::get('/', [\App\Http\Controllers\Car\CarController::class,'index'])->withoutMiddleware('auth:sanctum');
        Route::get('{car}', [\App\Http\Controllers\Car\CarController::class,'show'])->withoutMiddleware('auth:sanctum');
        Route::put('{car}',[\App\Http\Controllers\Car\CarController::class,'update']);
        Route::delete('{car}',[\App\Http\Controllers\Car\CarController::class,'destroy']);
    });
});
//Route::namespace('Car')->apiResource('cars', \App\Http\Controllers\Car\CarController::class)->middleware('auth:sanctum');

