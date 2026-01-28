<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\IdiomaResource;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Idioma::query();

        return IdiomaResource::collection($query->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idioma = json_decode($request->getContent(), true);

        $idioma = Idioma::create($idioma);

        return new IdiomaResource($idioma);
    }

    /**
     * Display the specified resource.
     */
    public function show(Idioma $idioma)
    {
        return new IdiomaResource($idioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idioma $idioma)
    {
        $idiomaData = json_decode($request->getContent(), true);
        $idioma->update($idiomaData);

        return new IdiomaResource($idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idioma $idioma)
    {
        try {
            $idioma->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
