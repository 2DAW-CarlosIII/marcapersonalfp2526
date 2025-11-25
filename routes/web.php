<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::get('/', function () {
<<<<<<< HEAD
    return view('welcome');
});

Route::get('hola', function()
{
    return '¡Hola mundo!';
=======
    return view('home');
});
=======
Route::get('/', [HomeController::class, 'getHome']);
>>>>>>> c9e1976cd8207c87daae5a5f955e8e899160e80f

// ----------------------------------------
Route::get('login', function () {
    return view('auth.login');
});
Route::get('logout', function () {
    return "Logout usuario";
>>>>>>> e6b53c483049c183d0912b88bb5d2f14776b17ca
});

Route::any('foo/bar', function()
{
    return '¡Hola mundo!';
});

<<<<<<< HEAD
// Funcion de prueba para saludar (con restriccion de solo letras y con el ? hacemos que sea opcional)
Route::get('saluda/{nombre?}', function($nombre = 'paloma')
{
    return '¡Hola ' . $nombre . '!';
}) ->where('nombre', '[A-Za-z]+');

// Función para sumar dos números (con restriccion de solo números)
Route::get('/suma/{num1}/{num2}', function($num1, $num2)
{
    $suma = $num1 + $num2;
    return "La suma de $num1 y $num2 es =  $suma";
})
->where(array('num1' => '[0-9]+', 'num2' => '[0-9]+'));

// Rutas
Route::get('/', function()
{
    return "Pantalla principal";
});

Route::get('login', function()
{
    return "Login usuario";
});
Route::get('logout', function()
{
    return "Logout usuario";
=======
// ----------------------------------------
Route::prefix('proyectos')->group(function () {
    Route::get('/', [ProyectosController::class, 'getIndex']);

    Route::get('create', [ProyectosController::class, 'getCreate']);

    Route::get('show/{id}', [ProyectosController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('edit/{id}', [ProyectosController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::post('store', [ProyectosController::class, 'store']);

<<<<<<< HEAD
    Route::get('/edit/{id}', function ($id) {
        return view('proyectos.edit', array('id'=>$id));
    }) -> where('id', '[0-9]+');
>>>>>>> e6b53c483049c183d0912b88bb5d2f14776b17ca
=======
    Route::put('update/{id}', [ProyectosController::class, 'update'])->where('id', '[0-9]+');
>>>>>>> c9e1976cd8207c87daae5a5f955e8e899160e80f
});

Route::get('familias-profesionales/show/{id}', function($id)
{
    return "Vista detalle proyecto $id";
})->where('id', '[0-9]+');

Route::get('familias-profesionales/create', function()
{
    return "Añadir proyecto";
})->where('id', '[0-9]+');

Route::get('familias-profesionales/edit/{id}', function($id)
{
    return "Modificar proyecto $id";
})->where('id', '[0-9]+');

Route::get('perfil/{id?}', function($id)
{
    if($id){
        return "Visualizar el perfil de $id";
    } else {
        return "Visualizar el perfil propio";
    }
})->where('id', '[0-9]+');
