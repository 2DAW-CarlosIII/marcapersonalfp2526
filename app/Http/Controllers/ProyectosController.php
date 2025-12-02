<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
/*     Modificar el método getIndex() para que obtenga toda la lista de proyectos desde la base de datos usando el modelo Proyecto y que se pase a la vista ese listado.
Modificar el método getShow() para que obtenga el proyecto pasado por parámetro usando el método findOrFail() y se pase a la vista dicho proyecto.
Modificar el método getEdit() para que obtenga el proyecto pasado por parámetro usando el método findOrFail() y se pase a la vista dicho proyecto. */
    public function getIndex()
    {
        return view('proyectos.index')
            ->with('proyectos', Proyecto:: ) ;
    }

    public function getShow($id)
    {
        return view('proyectos.show')
            ->with('proyecto', self::$arrayProyectos[$id])
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function getEdit($id)
    {
        return view('proyectos.edit')
            ->with('proyecto', self::$arrayProyectos[$id])
            ->with('id', $id);
    }



}
