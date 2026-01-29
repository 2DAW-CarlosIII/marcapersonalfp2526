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
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $idioma_id)
    {
        $user->idiomas()->detach($idioma_id);
        return response()->json(null, 204);
    }
}
