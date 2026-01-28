<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaResource;
use App\Models\User;
use Illuminate\Http\Request;

class IdiomasUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user_id)
    {
        return $user_id->idiomas()->orderBy('english_name')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $user_id)
    {
        $user_id->idiomas()->attach($request->idioma_id);
        return response()->json(null, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id, $idiomaId)
    {
        $idioma = $user_id->idiomas()->where('id', $idiomaId)->firstOrFail();
        return new IdiomaResource($idioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id, $idiomaId)
    {
        $idioma = $user_id->idiomas()->where('id', $idiomaId)->firstOrFail();
        $user_id->idiomas()->updateExistingPivot($idiomaId, $request->all());
        return new IdiomaResource($idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $idiomaId)
    {
        $user_id->idiomas()->detach($idiomaId);
        return response()->json(null, 204);
    }
}
