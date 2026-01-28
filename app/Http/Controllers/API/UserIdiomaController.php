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
        return IdiomaResource::collection($user->idiomas);
    }

    public function store(Request $request, User $user)
    {
        $user->idiomas()->attach($request->idioma_id);

        $idioma = Idioma::findOrFail($request->idioma_id);

        return new IdiomaResource($idioma);
    }

    public function show(User $user, Idioma $idioma)
    {
        return new IdiomaResource($idioma);
    }

    public function destroy(User $user, Idioma $idioma)
    {
        $user->idiomas()->detach($idioma->id);

        return response()->noContent();
    }
}
