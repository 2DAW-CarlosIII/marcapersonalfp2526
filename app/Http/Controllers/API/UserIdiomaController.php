<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdiomaResource;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    // Métodos para manejar las solicitudes relacionadas con los idiomas
    public function index(Request $request)
    {
        // Obtener todos los idiomas

    }

    public function show(Idioma $idioma, User $user)
    {
        // Obtener un idioma específico
        return new IdiomaResource($idioma);
    }

    public function store(Request $request)
    {
        // Crear un nuevo idioma

    }

    public function update(Request $request, Idioma $idioma, User $user)
    {
        // Actualizar un idioma existente
        $idioma->update($request->validated());
        return new IdiomaResource($idioma);

    }

    public function destroy(Idioma $idioma, User $user)
    {
        // Eliminar un idioma
        $idioma->delete();
        return response()->noContent();

    }
}
