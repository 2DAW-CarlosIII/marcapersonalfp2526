<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => Idioma::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idioma = Idioma::create($request->all());
        return response()->json($idioma, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $idioma = Idioma::findOrFail($id);
        return response()->json($idioma, 200);
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
        $idioma = Idioma::findOrFail($id);
        $idioma->update($request->all());
        return response()->json($idioma, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $idioma = Idioma::findOrFail($id);
        $idioma->delete();
        return response()->json(null, 204);
    }
}
