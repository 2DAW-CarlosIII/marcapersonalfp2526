<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{

    /*Modificar el método getIndex() para que obtenga toda la lista de proyectos desde la base de datos usando el modelo Proyecto y que se pase a la vista ese listado.
Modificar el método getShow() para que obtenga el proyecto pasado por parámetro usando el método findOrFail() y se pase a la vista dicho proyecto.
Modificar el método getEdit() para que obtenga el proyecto pasado por parámetro usando el método findOrFail() y se pase a la vista dicho proyecto.
*/

    public function getIndex()
    {
        $proyectos = Proyecto::all();

        return view('proyectos.index')
            ->with('proyectos', $proyectos);
    }

    public function getShow($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        return view('proyectos.show')
            ->with('proyecto', $proyecto);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        return view('proyectos.edit')
            ->with('proyecto', $proyecto);
    }

}
