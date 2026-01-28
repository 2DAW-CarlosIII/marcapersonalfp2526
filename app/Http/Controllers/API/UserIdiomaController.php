<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;

class UserIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $idiomas = $user->idiomas()->get();
        return response()->json($idiomas);
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $idioma = Idioma::findOrFail($request->idioma_id);
        $user->idiomas()->attach($idioma);
        return response()->json(['message' => 'Idioma añadido correctamente'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $idioma)
    {
        $user->idiomas()->detach($idioma);
        return response()->json(['message' => 'Idioma eliminado correctamente'], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
