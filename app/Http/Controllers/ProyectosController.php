<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function getIndex()
    {
        $proyecto =Proyecto::all();
        return view('proyectos.index')
            ->with('proyectos', $proyecto);
    }

    public function getShow($id)
    {
        $proyecto =Proyecto::findOrFail($id);
        return view('proyectos.show')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function getEdit($id)
    {
        $proyecto =Proyecto::findOrFail($id);
        return view('proyectos.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }



}
