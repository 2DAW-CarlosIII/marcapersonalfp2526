<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
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
     * Display the specified resource.
     */
    public function show(User $user, $idioma_id)
    {
        return $user->idiomas()->findOrFail($idioma_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $idioma_id)
    {
       $user->idiomas()->detach($idioma_id);
        $user->idiomas()->attach($request->idioma_id);
        return response()->json($user, 200);
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
