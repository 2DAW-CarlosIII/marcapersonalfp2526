<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaResource;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return IdiomaResource::collection(
            Idioma::orderBy($request->sort ?? 'id', $request->order ?? 'asc')
            ->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idioma = new Idioma();
        $idioma->alpha2 = $request->alpha2;
        $idioma->alpha3t = $request->alpha3t;
        $idioma->alpha3b = $request->alpha3b;
        $idioma->english_name = $request->english_name;
        $idioma->native_name = $request->native_name;
        $idioma->save();

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
