<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaResource;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserIdiomaController extends Controller
{
    public function index(User $user)
    {
        return $user->idiomas()->get();
    }

    public function store(Request $request, User $user, Idioma $idioma)
    {
        $user->idiomas()->attach($request->idioma_id);

        return response()->json(null, 201);
    }

    public function show(User $user, Idioma $idioma)
    {
        $idioma = $user->idiomas()->findOrFail($idioma->id);

        return new IdiomaResource($idioma);
    }

    public function update(Request $request, User $user, Idioma $idioma)
    {
        $idioma = $user->idiomas()->findOrFail($idioma->id);
        $user->idiomas()->updateExistingPivot($idioma->id, $request->all());

        return new IdiomaResource($idioma);
    }

    public function destroy(User $user, Idioma $idioma)
    {
        $user->idiomas()->detach($idioma);

        return response()->json(null, 204);
    }
}
