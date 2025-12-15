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
            ->with('familias_profesionales', $familias_profesionales);
    }

    public function getShow($id)
    {
        $familia_profesional = FamiliaProfesional::findOrFail($id);
        return view('familias-profesionales.show')
            ->with('familia_profesional', $familia_profesional);
    }

    public function getCreate()
    {
        return view('familias-profesionales.create');
    }

    public function getEdit($id)
    {
        $familia_profesional = FamiliaProfesional::findOrFail($id);
        return view('familias-profesionales.edit')
            ->with('familia_profesional', $familia_profesional);
    }

    public function store(Request $request)
    {
        $familiaProfesional = FamiliaProfesional::create($request->all());
        return redirect()->action([self::class, 'getShow'], ['id' => $familiaProfesional->id]);
    }



    public function update(Request $request, $id)
    {
        $familiaProfesional = FamiliaProfesional::findOrFail($id);
        $path = $request->file('imagen')->store('imagens', ['disk' => 'public']);
        $familiaProfesional->imagen = $path;
        $familiaProfesional->save();
        $familiaProfesional->update($request->except('imagen'));
        return redirect()->action([self::class, 'getShow'], ['id' => $familiaProfesional->id]);
    }

}
