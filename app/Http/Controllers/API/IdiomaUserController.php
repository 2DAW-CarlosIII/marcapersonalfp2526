<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserIdioma;
use Illuminate\Http\Request;

class IdiomaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return response()->json($user->idiomas()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $idioma = $user->idiomas()->create($request->all());
        return response()->json($idioma, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserIdioma $userIdioma, User $user)
    {
        $user->idiomas()->detach($userIdioma);
        return response()->json(null, 204);
    }
}
