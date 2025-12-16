<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamiliasProfesionalesController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'getHome'])
    ->name('home');

// ----------------------------------------
Route::prefix('proyectos')->group(function () {
    Route::get('/', [ProyectosController::class, 'getIndex']);

    Route::get('show/{id}', [ProyectosController::class, 'getShow'])->where('id', '[0-9]+');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', [ProyectosController::class, 'getCreate']);
        Route::post('store', [ProyectosController::class, 'store']);
        Route::get('edit/{id}', [ProyectosController::class, 'getEdit'])
            ->where('id', '[0-9]+');
        Route::put('update/{id}', [ProyectosController::class, 'update'])
            ->where('id', '[0-9]+');
    });
});

Route::prefix('familias-profesionales')->group(function () {

    Route::get('/', [FamiliasProfesionalesController::class, 'getIndex'])->name('home');
    Route::get('show/{id}', [FamiliasProfesionalesController::class, 'getShow'])->where('id', '[0-9]+')->name('familias.show');

        Route::group(['middleware' => 'auth'], function (){
            Route::get('create', [FamiliasProfesionalesController::class, 'getCreate']);
            Route::get('edit/{id}', [FamiliasProfesionalesController::class, 'getEdit'])->where('id', '[0-9]+');
            Route::post('store', [FamiliasProfesionalesController::class, 'store']);
            Route::put('update/{id}', [FamiliasProfesionalesController::class, 'update'])->where('id', '[0-9]+');
            Route::post('/familias/create', [FamiliasProfesionalesController::class, 'postCreate'])->name('familias.postCreate');
        });
});


require __DIR__.'/auth.php';
