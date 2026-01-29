<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Idiomas_Users;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;

class IdiomasUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return $user->idiomas()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $user->idiomas()->attach($request->idioma_id);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Idioma $idioma)
    {
        return $user->idiomas()->where('idiomas.id', $idioma->id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, Idioma $idioma)
    {
        $user->idiomas()->detach($idioma->id);
        $user->idiomas()->attach($request->idioma_id);

        return response()->json($user->idiomas()->get());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Idioma $idioma)
    {
        $user->idiomas()->detach($idioma->id);

        return response()->noContent();
    }
}
