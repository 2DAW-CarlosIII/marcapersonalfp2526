<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProfesional;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FamiliasProfesionalesController extends Controller
{


    public function getIndex()
    {
        $familias_profesionales = FamiliaProfesional::all();
        return view('familiasProfesionales.index')
            ->with('familiasProfesionales', $familias_profesionales);
    }

    public function getShow($id)
    {
        $familias_profesionales = FamiliaProfesional::findOrFail($id);
        return view('familiasProfesionales.show')
            ->with('familiaProfesional', $familias_profesionales)
            ->with('id', $id);
    }

    public function getCreate()
    {

        return view('familiasProfesionales.create');
    }

    public function getEdit($id)
    {
        $familias_profesionales = FamiliaProfesional::findOrFail($id);
        return view('familiasProfesionales.edit')
            ->with('familiaProfesional',  $familias_profesionales);
    }

    public function putEdit(Request $request, $id): RedirectResponse
    {
        $familiaProfesional = FamiliaProfesional::findOrFail($id);

        $datosEditados = $request->all();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', ['disk' => 'public']);
            $datosEditados['imagen'] = $familiaProfesional->imagen = $path;
        }

        $familiaProfesional->update($datosEditados);
        return redirect()->action([self::class, 'getShow'], ['id' => $familiaProfesional->id]);
    }
};
