<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectosController extends Controller
{
    public function getIndex()
    {
        return view('proyectos.index')
            ->with('proyectos', Proyecto::all());
    }

    public function getShow($id)
    {
        return view('proyectos.show')
            ->with('proyecto', Proyecto::findOrFail($id))
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function getEdit($id)
    {
        return view('proyectos.edit')
            ->with('proyecto', Proyecto::findOrFail($id))
            ->with('id', $id);
    }
}
