<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProfesional;
use Illuminate\Http\Request;

class FamiliasProfesionalesController extends Controller
{


    public function getIndex()
    {
        $familias_profesionales = FamiliaProfesional::all();
        return view('familias-profesionales.index')
            ->with('familiasProfesionales', $familias_profesionales);
    }

    public function getShow($id)
    {
        $familias_profesionales = FamiliaProfesional::findOrFail($id);
        return view('familias-profesionales.show')
            ->with('familias-profesionales', $familias_profesionales)
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('familias-profesionales.create');
    }

    public function getEdit($id)
    {
        $familias_profesionales = FamiliaProfesional::findOrFail($id);
        return view('familias-profesionales.edit')
            ->with('familiaProfesional',  $familias_profesionales);
    }

    public function store(Request $request)
    {
        $familiaProfesional  = new FamiliaProfesional();
        $familiaProfesional ->codigo = $request->input('codigo');
        $familiaProfesional ->nombre = $request->input('nombre');
        $familiaProfesional ->save();

        return redirect()->route('familias-profesionales.show', ['id' => $familiaProfesional->id]);
    }
    public function update(Request $request, $id)
    {
        $familiaProfesional  = FamiliaProfesional::findOrFail($id);
        $familiaProfesional ->codigo = $request->input('codigo');
        $familiaProfesional ->nombre = $request->input('nombre');

        if ($request->hasFile('imagen')){
            $path = $request->file('imagen')->store('imagenes', ['disk' => 'public']);
            $familiaProfesional->imagen = $path;
        }
        $familiaProfesional ->save();

        return redirect()->route('familias-profesionales.show', ['id' => $familiaProfesional->id]);
    }
};
