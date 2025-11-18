<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/', function () {
        return view('proyectos.index');
    });

    Route::get('create', function () {
        return view('proyectos.create');
    });

    Route::get('/show/{id}', function ($id) {
        return view('proyectos.show', array('id'=>$id));
    }) -> where('id', '[0-9]+');

    Route::get('/edit/{id}', function ($id) {
        return view('proyectos.edit', array('id'=>$id));
    }) -> where('id', '[0-9]+');
>>>>>>> e6b53c483049c183d0912b88bb5d2f14776b17ca
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
