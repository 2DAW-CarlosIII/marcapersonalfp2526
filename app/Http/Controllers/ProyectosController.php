<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

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
            -> with('proyecto', Proyecto::findOrFail($id))
            -> with('id', $id);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function getEdit($id)
    {
        return view('proyectos.edit')
            -> with('proyecto', Proyecto::findOrFail($id))
            -> with('id', $id);
    }

    public function putEdit(Request $request, $id) {
        $proyecto = Proyecto::findOrFail($id);

        $proyecto->nombre = $request->input('nombre');
        $proyecto->docente_id = $request->input('docente_id');
        $proyecto->dominio = $request->input('dominio');
        //$proyecto->metadatos = $request->input('metadatos');

        $proyecto->save();

        //return redirect()->action([ProyectosController::class, 'getShow'], ['id' => $id]);
        return view('proyectos.show')
            -> with('proyecto', $proyecto)
            -> with('id', $id);
    }
}
