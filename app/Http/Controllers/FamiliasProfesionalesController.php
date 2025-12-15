<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProfesional;
use Illuminate\Http\Request;

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
}
