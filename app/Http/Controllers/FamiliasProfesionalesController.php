<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProfesional;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FamiliasProfesionalesController extends Controller
{
    public function getIndex()
    {
        return view('familias-profesionales.index')
            ->with('familiasProfesionales', FamiliaProfesional::all());
    }

    public function getShow($id)
    {
        return view('familias-profesionales.show')
            ->with('familiasProfesionales', FamiliaProfesional::findOrFail($id))
            ->with('id', $id);

    }

    public function getCreate()
    {
        return view('familias-profesionales.create');
    }

    public function getEdit($id)
    {
        return view('familias-profesionales.edit')
            ->with('familiasProfesionales', FamiliaProfesional::findOrFail($id))
            ->with('id', $id);
    }

    public function store(Request $request): RedirectResponse
    {
        $familiaProfesional = FamiliaProfesional::create($request->all());
        return redirect()->action([self::class, 'getShow'], ['id' => $familiaProfesional->id]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $familiaProfesional = FamiliaProfesional::findOrFail($id);

        // TODO: Eliminar el imagen anterior si existiera
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', ['disk' => 'public']);
            $familiaProfesional->imagen = $path;
        }

        // El fichero se guarda por un lado
        $familiaProfesional->save();

        // Después el resto de atributos a excepción del fichero para que no se sobreescriba.
        $familiaProfesional->update($request->except('imagen'));
        return redirect()->action([self::class, 'getShow'], ['id' => $familiaProfesional->id]);
    }
}
