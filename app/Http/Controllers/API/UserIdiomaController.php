<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user)
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
    public function show(Request $request, User $user)
    {
        return $user->idiomas()->findOrFail($request->idioma_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $user->idiomas()->detach($request->idioma_id);

        return response()->json(null, 204);
    }
}
