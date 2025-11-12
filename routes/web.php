<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function()
{
    return view('home');
});
 route::get('/home/{nombre}', function($nombre)
{
    return view('home', ['nombre' => $nombre]);
});

Route::get('/login', function()
{
    return 'Login usuario';
});

Route::get('/logout', function()
{
    return 'Logout usuario';
});

Route::get('/proyectos', function()
{
    return 'Listado proyectos';
});

Route::get('/proyectos/show/{id}', function($id)
{
    if (isset($id) && is_numeric($id)) {
    return 'Detalle del proyecto: ' . $id;
    } else {
        return 'ID de proyecto no válido';
    }
})->where('id', '[0-9]+');

Route::get('proyectos/edit/{id}', function($id)
{
    if (isset($id) && is_numeric($id)) {
    return 'Editar proyecto: ' . $id;
    } else {
        return 'ID de proyecto no válido';
    }
})->where('id', '[0-9]+');

Route::get('perfil/{id}', function($id)
{
    if (isset($id) && is_numeric($id)) {
    return 'Perfil del usuario: ' . $id;
    } else {
        return 'ID de usuario no válido';
    }
})->where('id', '[0-9]+');
