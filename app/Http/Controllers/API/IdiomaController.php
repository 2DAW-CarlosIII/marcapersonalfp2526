<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdiomaResource;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    // Métodos para manejar las solicitudes relacionadas con los idiomas
    public function index(Request $request)
    {
        // Obtener todos los idiomas

        return IdiomaResource::collection(Idioma::all());
    }

    public function show(Idioma $idioma)
    {
        // Obtener un idioma específico
        return response()->json($idioma);
    }

    public function store(Request $request)
    {
        // Crear un nuevo idioma
        $idioma = Idioma::create($request->all());
        return response()->json($idioma, 201);

    }

    public function update(Request $request, Idioma $idioma)
    {
        // Actualizar un idioma existente
        $idioma->update($request->all());
        return response()->json($idioma);
    }

    public function destroy(Idioma $idioma)
    {
        // Eliminar un idioma
        $idioma->delete();
        return response()->noContent();
    }
}

