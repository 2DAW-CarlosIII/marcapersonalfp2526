<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['data' => Idioma::all()]);
    }

    public function show(Idioma $idioma)
    {
        $idioma = Idioma::findOrFail($idioma->id);
        return response()->json($idioma);
    }

    public function store(Request $request)
    {
        $idioma = Idioma::create($request->all());
        return response()->json($idioma, 201);
    }

    public function update(Request $request, Idioma $idioma)
    {
        $idioma = Idioma::findOrFail($idioma->id);
        $idioma->update($request->all());
        return response()->json($idioma);
    }

    public function destroy(Idioma $idioma)
    {
        $idioma = Idioma::findOrFail($idioma->id);
        $idioma->delete();
        return response()->json(null, 204);
    }
}
