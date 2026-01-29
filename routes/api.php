<?php

use App\Http\Controllers\API\CicloController;
use App\Http\Controllers\API\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            $user = $request->user();
            $user->fullName = $user->nombre . ' ' . $user->apellidos;
            return $user;
        });

        Route::apiResource('ciclos', CicloController::class);
    });

    // EMITIR NUEVO TOKEN.
    Route::post('tokens', [TokenController::class, 'store']);
    // ELIMINAR TOKEN DEL USUARIO ATENTICADO.
    Route::delete('tokens', [TokenController::class, 'destroy'])->middleware('auth:sanctum');

});
